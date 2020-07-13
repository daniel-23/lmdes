<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Badge};

class BadgeController extends Controller
{
    public function index()
    {
    	return view('badges.index')
    		->with('title', 'Badges')
    		->with('act_link', 'adm_users')
    		->with('badges',Badge::orderBy('Name')->paginate(5));
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
			'name'        => 'required|min:3|unique:Cnf_Badges',
			'description' => 'nullable|string|max:255',
			'image'       => 'nullable|image',
    	]);

    	if (count($request->file()) > 0) {
	    	$path = $request->file('image')->store(
	    		'images', 'public'
	    	);
	    }

    	$data = [
    		'Name' => trim(strip_tags($request->name)),
    		'Description' => trim(strip_tags($request->description))
    	];
    	if (isset($path)) {
    		$data['Image'] = $path;
    	}

    	$badge = Badge::create($data);
    	$request->session()->flash('success', 'Badge created successfully');
        return redirect('/badges');

    }

    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
			'name'        => 'required|min:3|unique:Cnf_Badges,Name,'.$id.',IdBadge',
			'description' => 'nullable|string|max:255',
			'image'       => 'nullable|image',
    	]);

    	if (count($request->file()) > 0) {
	    	$path = $request->file('image')->store(
	    		'images', 'public'
	    	);
	    }

    	$data = [
    		'Name' => trim(strip_tags($request->name)),
    		'Description' => trim(strip_tags($request->description))
    	];
    	if (isset($path)) {
    		$data['Image'] = $path;
    	}

    	$badge = Badge::findOrFail($id);
    	$badge->update($data);
    	$request->session()->flash('success', 'Badge updated successfully');
        return redirect('/badges');

    }
}
