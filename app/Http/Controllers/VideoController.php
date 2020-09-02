<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Module, Video};
class VideoController extends Controller
{
    public function store(Request $request, Module $module)
    {
    	$validatedData = $request->validate([
    		'title'       => 'required|string|max:255',
    		'description' => 'nullable|string|max:500',
    		'url' => 'required|url',
    	]);
    	$video = new Video($validatedData);
		$video->IdModule = $module->IdModule;
		$video->IdUser   = auth()->id();

		if ($video->save()) {
			return redirect('/cursos/'.$module->course->IdCourse)->with('status', 'Video add successfully!');
		}

    	
    	
    }
}
