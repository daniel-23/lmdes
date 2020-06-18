<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Group,Course};

class GroupController extends Controller
{
    public function index()
    {

    	return view('grupos.index')
    		->with('title', 'Groups')
    		->with('act_link', 'security')
    		->with('groups', Group::all());
    }

    public function crear()
    {

    	return view('grupos.create')
    		->with('title', 'Create Group')
    		->with('act_link', 'security')
    		->with('groups', Group::all());
    }

    public function create(Request $request)
    {

    	$validatedData = $request->validate([
            'name' => 'required|min:4|unique:Sec_Groups,Name',
            'parent' => 'integer',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'IdGroupParent' => (int) $request->parent,
        ];


        if (Group::create($data)) {
            $request->session()->flash('success', 'Group created successfully');
            return redirect('/grupos');
        }
    }

    public function editar($id)
    {
    	$group = Group::findOrFail($id);
        $ids = explode(',', $this->printTree($group));

        $groups = Group::where('Enabled','E')->whereNotIn('IdGroup', $ids)->get();

        return view('grupos.edit')
            ->with('title', 'Edit Group')
            ->with('act_link', 'security')
            ->with('group', $group)
            ->with('groups', $groups);
    }

    public function edit(Request $request, $id)
    {
    	$group = Group::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|min:4|unique:Sec_Groups,Name,'.$id.',IdGroup',
            'parent' => 'integer',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'IdGroupParent' => (int) $request->parent,
        ];

        $group->update($data);

        $request->session()->flash('success', 'Group update successfully');
        return redirect('/grupos');
    }


    public function grupos_cursos($id)
    {
        $group = Group::findOrFail($id);

        return view('grupos.courses_index')
            ->with('title', 'Groups Courses')
            ->with('act_link', 'security')
            ->with('group', $group)
            ->with('courses', Course::where('Enabled','E')->get());
    }

    public function groups_courses(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $course = Course::findOrFail($request->course);

        if (is_null($group->courses()->where('Cnf_Courses.IdCourse',$course->IdCourse)->first())) {
            $group->courses()->attach($course->IdCourse);
            $request->session()->flash('success', 'Course attach successfully');
        }else{
            $request->session()->flash('success', 'Course already exist');
        }
        return redirect('/grupos/cursos/'.$id);

    }

    public function grupos_cursos_eliminar($id,$idp)
    {
        $group = Group::findOrFail($id);
        $group->courses()->wherePivot('IdCnf_Courses_has_Sec_Groups', $idp)->detach();
        request()->session()->flash('success', 'Course detach successfully');
        return redirect('/grupos/cursos/'.$id);
    }


    public function getChildren($parent){
        $children = Group::where('IdGroupParent',$parent->IdGroup)->get();
        return $children;
    }

    public function printTree($root, $resp = ''){
        if ($resp == '') {
            $resp = $root->IdGroup;
        } else {
            $resp .= ','.$root->IdGroup;
        }
        
        $children = $this->getChildren($root);
        foreach ($children as $child) {
            $resp = $this->printTree($child,$resp);
        }

        return $resp;
    }

    public function cambiar_estatus($id)
    {
        $group = Group::findOrFail($id);
        if ($group->Enabled == 'E') {
            $group->Enabled = 'D';
        }else{
            $group->Enabled = 'E';
        }

        if ($group->save()) {
            request()->session()->flash('success', 'Group modify successfully');
            return redirect('/grupos');
            
        }

    }

}
