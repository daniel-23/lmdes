<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scale;

class ScaleController extends Controller
{
    public function index()
    {
    	$scales = Scale::all();

    	return view('escalas.index')
    		->with('title', 'Scales')
    		->with('act_link', 'parameters')
    		->with('scales', $scales);
    }

    public function crear()
    {
    	return view('escalas.create')
    		->with('title', 'Create Scale')
    		->with('act_link', 'parameters');
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Scales,Name',
            'description'        => 'required',
            'scale'        => 'nullable|min:5',
        ]);
    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'Description' => strip_tags(trim($request->name)),
    		'Scales' => strip_tags(trim($request->scale)),
    	];
    	$scale = Scale::create($data);
    	$request->session()->flash('success', 'Scale created successfully');
    	return redirect('/escalas');
    }

    public function editar($id)
    {
        $scale = Scale::findOrFail($id);
        return view('escalas.edit')
            ->with('title', 'Edit Scale')
            ->with('act_link', 'parameters')
            ->with('scale', $scale);
    }

    public function edit(Request $request, $id)
    {
        $scale = Scale::findOrFail($id);
        $validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Scales,Name,'.$id.',IdScale',
            'description'        => 'required',
            'scale'        => 'nullable|min:5',
        ]);
        $data = [
            'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
            'Description' => strip_tags(trim($request->name)),
            'Scales' => strip_tags(trim($request->scale)),
        ];
        $scale->update($data);
        $request->session()->flash('success', 'Scale modify successfully');
        return redirect('/escalas');
    }

    public function cambiar_estatus($id)
    {
        $scale = Scale::findOrFail($id);
        if ($scale->Enabled == 'E') {
            $scale->Enabled = 'D';
        }else{
            $scale->Enabled = 'E';
        }

        if ($scale->save()) {
            request()->session()->flash('success', 'Scale modify successfully');
            return redirect('/escalas');
            
        }

    }
}