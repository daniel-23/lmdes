<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Country;

class StateController extends Controller
{
    public function index()
    {
    	$states = State::all();

    	return view('estados.index')
    		->with('title', 'States')
    		->with('act_link', 'parameters_global')
    		->with('states', $states);
    }

    public function crear()
    {
    	$countries = Country::where('Enabled','E')->get();

    	return view('estados.create')
    		->with('title', 'Create State')
    		->with('act_link', 'parameters_global')
    		->with('countries', $countries);
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3',
            'country_id'        => 'required|integer',
        ]);

    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'IdCountry' => $request->country_id,
    	];
    	$state = State::create($data);
    	$request->session()->flash('success', 'State created successfully');
    	return redirect('/estados');
    }

    public function editar($id)
    {
    	$state = State::findOrFail($id);
    	$countries = Country::where('Enabled','E')->get();

    	return view('estados.edit')
    		->with('title', 'Edit State')
    		->with('act_link', 'parameters_global')
    		->with('state', $state)
    		->with('countries', $countries);
    }

    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_States,Name,'.$id.',IdState',
            'country_id'        => 'required|integer',
        ]);
        $data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
            'IdCountry' => $request->country_id,
    	];
    	$state = State::findOrFail($id);
    	$state->update($data);

    	$request->session()->flash('success', 'State modify successfully');
    	return redirect('/estados');
    	
    }

    public function cambiar_estatus($id)
    {
        $state = State::findOrFail($id);
        if ($state->Enabled == 'E') {
            $state->Enabled = 'D';
        }else{
            $state->Enabled = 'E';
        }

        if ($state->save()) {
            request()->session()->flash('success', 'State modify successfully');
            return redirect('/estados');
            
        }
    }

    public function get_states_country($id)
    {
        return State::select(['IdState', 'Name'])->where('IdCountry',$id)->get();
    }
}
