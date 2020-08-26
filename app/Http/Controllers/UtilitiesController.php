<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Course,Module,Forum,ForumReply};
class UtilitiesController extends Controller
{
    public function agregar(Request $request, $id)
    {
    	switch ($request->resource) {
    		case 1:
    			$view = 'add_foro';
    			break;
    		
    		default:
    			$view = 'index';
    			break;
    	}
    	return view("utilidades.$view")
    		->with('title', 'Add Utility')
    		->with('act_link', 'parameters')
    		->with('course',Course::findOrFail($id))
    		->with('module',Module::findOrFail($request->module_id));
    }

    public function agregar_foro(Request $request,$id)
    {
    	$module = Module::findOrFail($id);
    	
    	$validatedData = $request->validate([
			'title'       => 'required|string|max:255',
			'description' => 'required|string',
		]);

    	$datos = [
			'Title'       => trim(strip_tags($request->title)),
			'Description' => trim(strip_tags($request->description,'<h1><h2><h3><h4><h5><p><span>')),
			'IdModule'    => $id,
		];

		if (Forum::create($datos)) {
			$request->session()->flash('success', 'Forum created successfully');
			return redirect()->route('cursos.info',$module->IdCourse);
		}
    }

    public function foros($id)
    {
        return view("utilidades.foros.view")
            ->with('title', 'Forum')
            ->with('act_link', 'parameters')
            ->with('forum',Forum::findOrFail($id));
    }

    public function agregar_comentario_foro(Request $request,$id)
    {
        $forum = Forum::findOrFail($id);

        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $datos = [
            'Title'       => trim(strip_tags($request->title)),
            'Description' => trim(strip_tags($request->description,'<h1><h2><h3><h4><h5><p><span>')),
            'IdUser'    => auth()->id(),
        ];

        if ($forum->replies()->create($datos)) {
            $request->session()->flash('success', 'Reply created successfully');
            return redirect("/utilidades/foros/$forum->IdForum");
        }
    }
}
