<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\{
    Course,
    Category,
    Format,
    Language,
    Competency,
    Resource,
    CrsResource,
    Group
};

class CourseController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $rol = $user->roles()->first();
        
        if ($rol->Name == 'Estudiante') {
            $cursos = array();
            foreach ($user->groups as $group) {
                foreach ($group->courses as $curso) {
                    $cursos[] = $curso;
                }
            }
        }else{
            $cursos = Course::all();
        }
        
    	return view('cursos.index')
            ->with('title', 'Courses')
            ->with('act_link', '')
            ->with('courses', $cursos);
    }

    public function crear()
    {
    	return view('cursos.create')
    		->with('title', 'Create Course')
    		->with('act_link', '')
    		->with('categories', Category::where('Enabled','E')->get())
            ->with('formats', Format::where('Enabled','E')->get())
            ->with('competencies', Competency::where('Enabled','E')->get())
            ->with('languages', Language::all())
            ->with('resources', Resource::orderBy('Name')->get())
            ->with('grupos', Group::select(['IdGroup','Name'])->where('Enabled','E')->orderBy('Name')->get());
    }

    public function create(Request $request)
    {
        $validatedData = request()->validate([
            'name'              => 'required|min:4|unique:Cnf_Courses,Name',
            'short_name'        => 'required|min:4',
            'code'              => 'nullable|max:20',
            'category'          => 'required|integer',
            'description'       => 'nullable|min:4',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date',
            'format'            => 'required|integer',
            'modules_number'    => 'required|integer',
            'modules_format'    => 'nullable|min:4',
            'language'          => 'required|integer',
            'show_califications'=> 'required|max:1',
            'max_file_size'     => 'nullable|integer',
            'competencies'      => 'required|array',
            'image'             => 'nullable|image',
            'resources'         => 'required|array',
            'groups'            => 'required|array',
        ]);

        $data = [
            'ShortName'         => strip_tags(trim($request->short_name)),
            'Name'              => strip_tags(trim($request->name)),
            'IdCourseCategory'  => (int) $request->category,
            'Code'              => strtolower(strip_tags(trim($request->code))),
            'Description'       => trim(strip_tags($request->description,'<h1><h2><h3><h4><h5><p><span><img>')),
            'StartDate'         => $request->start_date,
            'EndDate'           => $request->end_date,
            'IdCourseFormat'    => (int) $request->format,
            'ModulesNumber'     => (int) $request->modules_number,
            'ModulesFormat'     => strip_tags(trim($request->modules_format)),
            'IdLanguage'        => (int) $request->language,
            'ShowCalifications' => $request->show_califications,
            'MaxFileSize'       => (int) $request->max_file_size,
            'IdCreatorUser'     => $request->user()->IdUser,
        ];

        if (count($request->file()) > 0) {
            $path = $request->file('image')->store(
                'images/courses', 'public'
            );
            $data['Image'] = $path;
        }
        $curso = Course::create($data);
        $curso->competencies()->attach($request->competencies);
        $curso->resources()->attach($request->resources);
        $curso->groups()->attach($request->groups);
        $request->session()->flash('success', 'Course created successfully');
        return redirect('/cursos');
    }

    public function editar($id)
    {
        $course = Course::findOrFail($id);
        $competenciesCourse = $course->competencies()->select('Cnf_Competencies.IdCompetency')->get();
        $resourcesCourse = $course->resources()->select('Crs_Resources.IdResource')->get();
        $groupsCourse = $course->groups()->select('Sec_Groups.IdGroup')->get();

        return view('cursos.edit')
            ->with('title', 'Edit Course')
            ->with('act_link', '')
            ->with('course',$course)
            ->with('categories', Category::where('Enabled','E')->get())
            ->with('formats', Format::where('Enabled','E')->get())
            ->with('languages', Language::all())
            ->with('competenciesCourse', $competenciesCourse)
            ->with('competencies', Competency::where('Enabled','E')->get())
            ->with('resources', Resource::orderBy('Name')->get())
            ->with('resourcesCourse', $resourcesCourse)
            ->with('groupsCourse',$groupsCourse)
            ->with('grupos', Group::select(['IdGroup','Name'])->where('Enabled','E')->orderBy('Name')->get());
    }

    public function edit(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $validatedData = request()->validate([
            'name'              => 'required|min:4|unique:Cnf_Courses,Name,'.$id.',IdCourse',
            'short_name'        => 'required|min:4',
            'code'              => 'nullable|max:20',
            'category'          => 'required|integer',
            'description'       => 'nullable|min:4',
            'start_date'        => 'required|date',
            'end_date'          => 'required|date',
            'format'            => 'required|integer',
            'modules_number'    => 'required|integer',
            'modules_format'    => 'nullable|min:4',
            'language'          => 'required|integer',
            'show_califications'=> 'required|max:1',
            'max_file_size'     => 'nullable|integer',
            'competencies'      => 'required|array',
            'image'             => 'nullable|image',
            'resources'         => 'required|array',
            'groups'            => 'required|array',
        ]);

        $data = [
            'ShortName'         => strip_tags(trim($request->short_name)),
            'Name'              => strip_tags(trim($request->name)),
            'IdCourseCategory'  => (int) $request->category,
            'Code'              => strtolower(strip_tags(trim($request->code))),
            'Description'       => trim(strip_tags($request->description,'<h1><h2><h3><h4><h5><p><span><img>')),
            'StartDate'         => $request->start_date,
            'EndDate'           => $request->end_date,
            'IdCourseFormat'    => (int) $request->format,
            'ModulesNumber'     => (int) $request->modules_number,
            'ModulesFormat'     => strip_tags(trim($request->modules_format)),
            'IdLanguage'        => (int) $request->language,
            'ShowCalifications' => $request->show_califications,
            'MaxFileSize'       => (int) $request->max_file_size,
        ];
        if (count($request->file()) > 0 && !is_null($request->file('image'))) {
            $path = $request->file('image')->store(
                'images/courses', 'public'
            );
            $data['Image'] = $path;
        }

        $course->update($data);
        $course->competencies()->detach();
        $course->competencies()->attach($request->competencies);

        $course->resources()->detach();
        $course->resources()->attach($request->resources);

        $course->groups()->detach();
        $course->groups()->attach($request->groups);


        $request->session()->flash('success', 'Course modify successfully');
        return redirect('/cursos');
    }

    public function cambiar_estatus($id)
    {
        $course = Course::findOrFail($id);
        if ($course->Enabled == 'E') {
            $course->Enabled = 'D';
        }else{
            $course->Enabled = 'E';
        }
        if ($course->save()) {
            request()->session()->flash('success', 'Course modify successfully');
            return redirect('/cursos');
        }
    }

    public function course_info($id)
    {
        $curso = Course::findOrFail($id);
        return view('cursos.info')
            ->with('title', 'Course Info')
            ->with('act_link', '')
            ->with('course',$curso)
            ->with('resources',CrsResource::where('IdCourse',$id)->get());
    }
}
