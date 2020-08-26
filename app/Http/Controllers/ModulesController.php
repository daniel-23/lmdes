<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Module, Course, CrsResource};
class ModulesController extends Controller
{
    public function crear($id)
    {

    	return view('modulos.crear')
    		->with('title', 'Agregar Módulo')
    		->with('act_link', 'parameters')
    		->with('course',Course::findOrFail($id))
            ->with('resources',CrsResource::where('IdCourse',$id)->get());
    }

    public function create(Request $request, $id)
    {
    	$course = Course::findOrFail($id);

    	$validatedData = $request->validate([
			'name'          => 'required|string|max:100',
			'description'   => 'required|string|max:100',
			'module_parent' => 'nullable|integer|exists:Crs_Modules,IdModule',
            #'resources'     => 'required|array',
    	]);

    	$datos = [
    		'Name' => trim(strip_tags($request->name)),
    		'Description'       => trim(strip_tags($request->description,'<h1><h2><h3><h4><h5><p><span>')),
    		'IdCourse' => $course->IdCourse,
    		'IdModuleParent' => $request->module_parent,
    	];

    	$module = Module::create($datos);
        #$module->crsResources()->attach($request->resources);
        $request->session()->flash('success', 'Module created successfully');
        return redirect()->route('cursos.info',$course->IdCourse);
    }

    public function editar($id)
    {
        $module = Module::findOrFail($id);
        return view('modulos.editar')
            ->with('title', 'Editar Módulo')
            ->with('act_link', 'parameters')
            ->with('module',$module)
            ->with('crsResources',$module->crsResources()->select('Crs_Resources.IdCrsResource')->get());
    }

    public function edit(Request $request, $id)
    {
        $module = Module::findOrFail($id);

        $validatedData = $request->validate([
            'name'          => 'required|string|max:100',
            'description'   => 'required|string|max:100',
            'module_parent' => 'nullable|integer|exists:Crs_Modules,IdModule',
            'resources'     => 'required|array',
        ]);

        $datos = [
            'Name' => trim(strip_tags($request->name)),
            'Description' => trim(strip_tags($request->description)),
            'IdModuleParent' => $request->module_parent,
        ];

        $module->update($datos);
        $module->crsResources()->detach();
        $module->crsResources()->attach($request->resources);
        $request->session()->flash('success', 'Module modify successfully');
        return redirect()->route('cursos.info',$module->IdCourse);
        dd($request->all());
    }
}
