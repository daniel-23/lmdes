<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Competency;

class TemplateController extends Controller
{
    public function index()
    {
    	$templates = Template::all();

    	return view('plantillas.index')
    		->with('title', 'Templates')
    		->with('act_link', '')
    		->with('templates', $templates);
    }

    public function crear()
    {
    	$templates = Template::all();

    	return view('plantillas.create')
    		->with('title', 'Create Template')
    		->with('act_link', '')
    		->with('templates', $templates);
    }

    public function create(Request $request)
    {

    	$validatedData = $request->validate([
            'name' => 'required|min:4|unique:Cnf_Templates,Name',
            'limit_date' => 'required|date',
            'parent' => 'required|integer',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'LimitDate' => $request->limit_date,
            'IdTemplateParent' => (int) $request->parent,
        ];


        if (Template::create($data)) {
            $request->session()->flash('success', 'Template created successfully');
            return redirect('/plantillas');
        }
    }

    public function cambiar_estatus($id)
    {
        $template = Template::findOrFail($id);
        if ($template->Enabled == 'E') {
            $template->Enabled = 'D';
        }else{
            $template->Enabled = 'E';
        }

        if ($template->save()) {
            request()->session()->flash('success', 'Template modify successfully');
            return redirect('/plantillas');
            
        }
    }

    public function editar($id)
    {
        $plantilla = Template::findOrFail($id);

        $ids = explode(',', $this->printTree($plantilla));

        $templates = Template::where('Enabled','E')->whereNotIn('IdTemplate', $ids)->get();

    	return view('plantillas.edit')
    		->with('title', 'Edit Template')
    		->with('act_link', '')
    		->with('templates', $templates)
    		->with('plantilla', $plantilla);
    }

    public function edit(Request $request, $id)
    {
    	$template = Template::findOrFail($id);
    	$validatedData = $request->validate([
            'name' => 'required|min:4|unique:Cnf_Templates,Name,'.$id.',IdTemplate',
            'limit_date' => 'required|date',
            'parent' => 'required|integer',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'LimitDate' => $request->limit_date,
            'IdTemplateParent' => (int) $request->parent,
        ];

        $template->update($data);
        $request->session()->flash('success', 'Template modify successfully');
        return redirect('/plantillas');
    }

    public function competencias($id)
    {
    	$template = Template::findOrFail($id);


    	return view('plantillas.competencias_index')
    		->with('title', 'Template Competencies')
    		->with('act_link', '')
    		->with('template', $template)
    		->with('competencias', Competency::all() );
    }

    public function competencias_create(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'competency' => 'required|integer',
        ]);

    	$template = Template::findOrFail($id);
    	$competency = $template->competencies()->where('Cnf_Competencies.IdCompetency',$request->competency)->first();
    	if (is_null($competency)) {
    		$template->competencies()->attach($request->competency, ['Description' => $request->description]);
    		$request->session()->flash('success', 'Competency attach successfully');
    	}else{
    		$request->session()->flash('success', 'Competency already exist');

    	}
    	return redirect('/plantillas/competencias/'.$template->IdTemplate);
    	
    }

    public function competencias_delete($id,$idp)
    {
    	$template = Template::findOrFail($id);
    	$template->competencies()->wherePivot('IdCnf_Templates_has_Cnf_Compentencies', $idp)->detach();
    	request()->session()->flash('success', 'Competency detach successfully');
    	return redirect('/plantillas/competencias/'.$template->IdTemplate);
    }

    public function getChildren($parent){
        $children = Template::where('IdTemplateParent',$parent->IdTemplate)->get();
        return $children;
    }

    public function printTree($root, $resp = ''){
        if ($resp == '') {
            $resp = $root->IdTemplate;
        } else {
            $resp .= ','.$root->IdTemplate;
        }
        
        
        $children = $this->getChildren($root);
        foreach ($children as $child) {
            $resp = $this->printTree($child,$resp);
        }

        return $resp;
    }
}
