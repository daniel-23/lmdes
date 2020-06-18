<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TimeZone;

class TimeZoneController extends Controller
{
    public function index()
    {
    	$zones = TimeZone::all();

    	return view('zonas-horarias.index')
    		->with('title', 'Times Zones')
    		->with('act_link', 'parameters')
    		->with('zones', $zones);
    }

    public function crear()
    {
    	return view('zonas-horarias.create')
    		->with('title', 'Crearte Time Zone')
    		->with('act_link', 'parameters');
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Timezones,Name',
            'prefix'    => 'required',

        ]);

    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'prefix' => strip_tags(trim($request->prefix)),
    	];
    	$zone = TimeZone::create($data);
    	$request->session()->flash('success', 'Time Zone created successfully');
    	return redirect('/zona-horaria');
    }

    public function editar($id)
    {
    	$zone = TimeZone::findOrFail($id);

    	return view('zonas-horarias.edit')
    		->with('title', 'Edit Time Zone')
    		->with('act_link', 'parameters')
    		->with('zone', $zone);
    }


    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Timezones,Name,'.$id.',IdTimeZone',
            'prefix'    => 'required',

        ]);
        $data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'prefix' => strip_tags(trim($request->prefix)),
    	];
    	$zone = TimeZone::findOrFail($id);
    	$zone->update($data);

    	$request->session()->flash('success', 'Time Zone modify successfully');
    	return redirect('/zona-horaria');
    	
    }
    
}
