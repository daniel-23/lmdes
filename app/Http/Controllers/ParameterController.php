<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParameterGeneral;
use App\ParameterCourse;
use Illuminate\Support\Facades\Validator;


class ParameterController extends Controller
{
    public function get_general()
    {
    	$paramater = ParameterGeneral::find(1);
    	return view('parametros.general')
    		->with('title', 'Parameters Generals')
    		->with('act_link', 'parameters')
    		->with('paramater', $paramater);
    }

    public function post_general(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'EmailSender' => 'nullable|email:filter',
    		'MaxSizeFile' => 'integer',
    		'ActivateNotifications' => ['max:1',Rule::in(['Y', 'N'])],
    	]);

        if ($validator->fails()) {
            return redirect('/par-general')
                        ->withErrors($validator)
                        ->withInput();
        }


    	$paramater = ParameterGeneral::find(1);

    	$paramater->update($request->all());
    	$request->session()->flash('success', 'Parameters modify successfully');
    	return redirect('/par-general');
    	
    }

    public function get_courses()
    {
        $paramater = ParameterCourse::find(1);

        return view('parametros.cursos')
            ->with('title', 'Paramaters Courses')
            ->with('act_link', 'parameters')
            ->with('paramater', $paramater);
    }

    public function post_courses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'MaxCoursesNumber' => 'integer',
            'CourseDuration' => 'integer',
            'MaxModulesNumber' => 'integer',
        ]);

        if ($validator->fails()) {
            return redirect('/par-courses')
                        ->withErrors($validator)
                        ->withInput();
        }


        $paramater = ParameterCourse::find(1);

        $paramater->update($request->all());
        $request->session()->flash('success', 'Parameters modify successfully');
        return redirect()->route('cursos');
        
    }
}
