<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competency;
use App\Scale;


class CompetencyController extends Controller
{
    public function index()
    {
    	$competencies = Competency::where('IdCompetencyParent',0)->get();

    	return view('competencias.index')
    		->with('title', 'Competencies')
    		->with('act_link', '')
    		->with('competencies', $competencies)
            ->with('scales', Scale::where('Enabled','E')->get());;
    }

    public function crear()
    {
    	
        return view('competencias.create')
    		->with('title', 'Create Competency')
    		->with('act_link', '')
    		->with('scales', Scale::where('Enabled','E')->get());
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name' => 'required|min:4|unique:Cnf_Competencies,Name',
            'scale' => 'required|integer',
            'parent' => 'nullable|integer|exists:Cnf_Competencies,IdCompetency',
        ]);

        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'IdScale' => (int) $request->scale,
            'IdCompetencyParent' => is_null($request->parent) ? 0 : (int) $request->parent,
        ];


        if (Competency::create($data)) {
            $request->session()->flash('success', 'Competency created successfully');
            return redirect('/competencias');
        }
    }

    public function cambiar_estatus($id)
    {
        $competency = Competency::findOrFail($id);
        if ($competency->Enabled == 'E') {
            $competency->Enabled = 'D';
        }else{
            $competency->Enabled = 'E';
        }

        if ($competency->save()) {
            request()->session()->flash('success', 'Competency modify successfully');
            return redirect('/competencias');
            
        }
    }

    public function editar($id)
    {
        $competency = Competency::findOrFail($id);

        $ids = explode(',', $this->printTree($competency));

        $competencies = Competency::where('Enabled','E')->whereNotIn('IdCompetency', $ids)->get();
        $scales = Scale::where('Enabled','E')->get();

    	return view('competencias.edit')
    		->with('title', 'Edit Competency')
    		->with('act_link', '')
    		->with('scales', $scales)
    		->with('competencies', $competencies)
    		->with('competency', $competency);
    }

    public function edit(Request $request, $id)
    {
    	$competency = Competency::findOrFail($id);
    	$validatedData = $request->validate([
            'name'   => 'required|min:4|unique:Cnf_Competencies,Name,'.$id.',IdCompetency',
            'scale'  => 'required|integer',
            'parent' => 'nullable|integer|exists:Cnf_Competencies,IdCompetency',
        ]);
        $data = [
            'Name'               => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description'        => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'IdScale'            => (int) $request->scale,
            'IdCompetencyParent' => (int) $request->parent,
        ];

        $competency->update($data);
        $request->session()->flash('success', 'Competency modify successfully');
        return redirect('/competencias');
    }

    public function get_childs($id)
    {
        $competency = Competency::findOrFail($id);
        return Competency::where('IdCompetencyParent',$competency->IdCompetency)->get();
    }

    public function getChildren($parent){
        $children = Competency::where('IdCompetencyParent',$parent->IdCompetency)->get();
        return $children;
    }

    public function printTree($root, $resp = ''){
        if ($resp == '') {
            $resp = $root->IdCompetency;
        } else {
            $resp .= ','.$root->IdCompetency;
        }
        
        
        $children = $this->getChildren($root);
        foreach ($children as $child) {
            $resp = $this->printTree($child,$resp);
        }

        return $resp;
    }
}
