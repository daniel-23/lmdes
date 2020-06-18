<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index()
    {
    	$countries = Country::all();

    	return view('paises.index')
    		->with('title', 'Countries')
    		->with('act_link', 'parameters')
    		->with('countries', $countries);
    }

    public function crear()
    {
    	return view('paises.create')
    		->with('title', 'Create Country')
    		->with('act_link', 'parameters');
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Countries,Name',
            'prefix'      => 'required|max:4',
        ]);

    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
            'Prefix' => strtoupper(trim($request->prefix))
    	];
    	$country = Country::create($data);
    	$request->session()->flash('success', 'Country created successfully');
    	return redirect('/paises');
    }

    public function editar($id)
    {
    	$country = Country::findOrFail($id);

    	return view('paises.edit')
    		->with('title', 'Edit Country')
    		->with('act_link', 'parameters')
    		->with('country', $country);
    }

    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Countries,Name,'.$id.',IdCountry',
            'prefix'      => 'required|max:4',

        ]);
        $data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
            'Prefix' => strtoupper(trim($request->prefix))
    	];
    	$country = Country::findOrFail($id);
    	$country->update($data);

    	$request->session()->flash('success', 'Country modify successfully');
    	return redirect('/paises');
    	
    }

    public function cambiar_estatus($id)
    {
        $country = Country::findOrFail($id);
        if ($country->Enabled == 'E') {
            $country->Enabled = 'D';
        }else{
            $country->Enabled = 'E';
        }

        if ($country->save()) {
            request()->session()->flash('success', 'Country modify successfully');
            return redirect('/paises');
            
        }

    }
}
