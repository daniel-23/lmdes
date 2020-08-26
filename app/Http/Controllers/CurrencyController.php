<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
    	$currencies = Currency::all();

    	return view('monedas.index')
    		->with('title', 'Currencies')
    		->with('act_link', 'parameters_global')
    		->with('currencies', $currencies);
    }

    public function crear()
    {
    	return view('monedas.create')
    		->with('title', 'Crearte Currencie')
    		->with('act_link', 'parameters_global');
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Currencies,Name',
            'prefix'    => 'required',
            'symbol' => 'nullable|max:4'

        ]);

    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'Prefix' => strip_tags(trim($request->prefix)),
    		'Symbol' => strip_tags(trim($request->symbol)),
    	];
    	$currencie = Currency::create($data);
    	$request->session()->flash('success', 'Currency created successfully');
    	return redirect('/monedas');
    }

    public function editar($id)
    {
    	$currency = Currency::findOrFail($id);

    	return view('monedas.edit')
    		->with('title', 'Edit Currency')
    		->with('act_link', 'parameters_global')
    		->with('currency', $currency);
    }


    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_Currencies,Name,'.$id.',IdCurrency',
            'prefix'    => 'required',
            'symbol' => 'nullable|max:4'

        ]);
        $data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'Prefix' => strip_tags(trim($request->prefix)),
    		'Symbol' => strip_tags(trim($request->symbol)),
    	];
    	$currency = Currency::findOrFail($id);
    	$currency->update($data);

    	$request->session()->flash('success', 'Currency modify successfully');
    	return redirect('/monedas');
    	
    }
}
