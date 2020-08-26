<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Http\Requests\IdiomaCrearRequest;


class LanguageController extends Controller
{
    public function index()
    {
    	$languages = Language::all();

    	return view('idiomas.index')
    		->with('title', 'Languages')
    		->with('act_link', 'parameters_global')
    		->with('languages', $languages);
    }

    public function crear()
    {
    	return view('idiomas.create')
    		->with('title', 'Create Language')
    		->with('act_link', 'parameters_global');
    }

    public function create(IdiomaCrearRequest $request)
    {
    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'RouteFIle' => strtolower(strip_tags(trim($request->route_file))),
    		'prefix' => strtolower(strip_tags(trim($request->prefix))),
    	];
    	$language = Language::create($data);
    	$request->session()->flash('success', 'Language created successfully');
    	return redirect('/idiomas');
    }

    public function editar($id)
    {
    	$language = Language::findOrFail($id);
    	return view('idiomas.edit')
    		->with('title', 'Edit Language')
    		->with('act_link', 'parameters_global')
    		->with('language', $language);
    }

    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Languages,Name,'.$id.',IdLanguage',
            'prefix'    => 'required',

        ]);
        $data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'RouteFIle' => strtolower(strip_tags(trim($request->route_file))),
    		'prefix' => strtolower(strip_tags(trim($request->prefix))),
    	];
    	$language = Language::findOrFail($id);
    	$language->update($data);

    	$request->session()->flash('success', 'Language modify successfully');
    	return redirect('/idiomas');
    	
    }
}
