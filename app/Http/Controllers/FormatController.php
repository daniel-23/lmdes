<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Format;
class FormatController extends Controller
{
    public function index()
    {
    	return view('formatos.index')
    		->with('title', 'Courses Format')
    		->with('act_link', 'parameters')
    		->with('formats', Format::all());
    }

    public function crear()
    {
    	return view('formatos.create')
    		->with('title', 'Create Courses Format')
    		->with('act_link', 'parameters');
    }

    public function create(Request $request)
    {

    	$validatedData = request()->validate([
            'name'        => 'required|min:4|unique:Cnf_Courses_Format,Name',
            'description' => 'nullable|min:4',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
        ];


        if (Format::create($data)) {
        	$request->session()->flash('success', 'Format created successfully');
        }
        return redirect('/cursos/formatos');
    }

    public function cambiar_estatus($id)
    {
        $format = Format::findOrFail($id);
        if ($format->Enabled == 'E') {
            $format->Enabled = 'D';
        }else{
            $format->Enabled = 'E';
        }
        if ($format->save()) {
            request()->session()->flash('success', 'Format modify successfully');
            return redirect('/cursos/formatos');
        }
    }

    public function editar($id)
    {

    	$format = Format::findOrFail($id);
       	return view('formatos.edit')
    		->with('title', 'Edit Courses Format')
    		->with('act_link', 'parameters')
    		->with('format', $format);

    }

    public function edit(Request $request, $id)
    {
    	$format = Format::findOrFail($id);
    	$validatedData = request()->validate([
            'name'        => 'required|min:4|unique:Cnf_Courses_Format,Name,'.$id.',IdCourseFormat',
            'description' => 'nullable|min:4',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
        ];

        $format->update($data);
        request()->session()->flash('success', 'Format modify successfully');
        return redirect('/cursos/formatos');

    }
}
