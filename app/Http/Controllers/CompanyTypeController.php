<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyType;

class CompanyTypeController extends Controller
{
    public function index()
    {
    	$company_types = CompanyType::all();

    	return view('company-types.index')
    		->with('title', 'Company Types')
    		->with('act_link', 'parameters')
    		->with('company_types', $company_types);
    }

    public function crear()
    {
    	return view('company-types.create')
    		->with('title', 'Create Company Type')
    		->with('act_link', 'parameters');
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_CompanyTypes,Name',
        ]);

    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    	];
    	$type = CompanyType::create($data);
    	$request->session()->flash('success', 'Company Type created successfully');
    	return redirect('/company-types');
    }

    public function editar($id)
    {
    	$type = CompanyType::findOrFail($id);

    	return view('company-types.edit')
    		->with('title', 'Edit Company Type')
    		->with('act_link', 'parameters')
    		->with('type', $type);
    }


    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3|unique:Cnf_CompanyTypes,Name,'.$id.',IdCompanyType',
        ]);

    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    	];
    	$type = CompanyType::findOrFail($id);

    	$type->update($data);

    	$request->session()->flash('success', 'Company Type modify successfully');
    	return redirect('/company-types');
    	
    }
}
