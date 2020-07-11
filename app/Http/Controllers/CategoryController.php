<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	return view('categorias.index')
    		->with('title', 'Courses Category')
    		->with('act_link', 'parameters')
    		->with('categories', Category::select('IdCourseCategory','Name','IdCourseCategoryParent')->get());
    }

    public function crear()
    {
    	return view('categorias.create')
    		->with('title', 'Create Courses Category')
    		->with('act_link', 'parameters')
    		->with('categories', Category::all());
    }

    public function create(Request $request)
    {

        $validatedData = request()->validate([
            'name'        => 'required|min:4|unique:Cnf_Courses_Categories,Name',
            'code'        => 'nullable|min:4',
            'description' => 'nullable|min:4',
            'color'       => 'nullable|min:7|max:10',
            'icon'        => 'required|min:4',
            'parent'      => 'required|integer'
        ]);

        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Code' => strtolower(trim(strip_tags($request->code))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'Color' => strtoupper(trim($request->color)),
            'Icon' => htmlentities(trim(strip_tags($request->icon,'<i>'))),
            'IdCourseCategoryParent' => (int) $request->parent,
        ];


        if (Category::create($data)) {
        	$request->session()->flash('success', 'Category created successfully');
        }
        return redirect('/cursos/categorias');
    }

    public function cambiar_estatus($id)
    {
        $category = Category::findOrFail($id);
        if ($category->Enabled == 'E') {
            $category->Enabled = 'D';
        }else{
            $category->Enabled = 'E';
        }
        if ($category->save()) {
            request()->session()->flash('success', 'Category modify successfully');
            return redirect('/cursos/categorias');
        }
    }

    public function editar($id)
    {

    	$categoria = Category::findOrFail($id);
    	$ids = explode(',', $this->printTree($categoria));
        
        $categories = Category::where('Enabled','E')->whereNotIn('IdCourseCategory', $ids)->get();
    	return view('categorias.edit')
    		->with('title', 'Edit Courses Category')
    		->with('act_link', 'parameters')
    		->with('categories', $categories)
    		->with('categoria', $categoria);

    }

    public function edit(Request $request, $id)
    {
    	$category = Category::findOrFail($id);
    	$validatedData = request()->validate([
            'name'        => 'required|min:4|unique:Cnf_Courses_Categories,Name,'.$id.',IdCourseCategory',
            'code'        => 'nullable|min:4',
            'description' => 'nullable|min:4',
            'color'       => 'nullable|min:7|max:10',
            'icon'        => 'required|min:4',
            'parent'      => 'required|integer'
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Code' => strtolower(trim(strip_tags($request->code))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'Color' => strtoupper(trim($request->color)),
            'Icon' => htmlentities(trim(strip_tags($request->icon,'<i>'))),
            'IdCourseCategoryParent' => (int) $request->parent,
        ];

        $category->update($data);
        request()->session()->flash('success', 'Category modify successfully');
        return redirect('/cursos/categorias');

    }







    public function getChildren($parent){
        $children = Category::where('IdCourseCategoryParent',$parent->IdCourseCategory)->get();
        return $children;
    }

    public function printTree($root, $resp = ''){
        if ($resp == '') {
            $resp = $root->IdCourseCategory;
        } else {
            $resp .= ','.$root->IdCourseCategory;
        }
        
        
        $children = $this->getChildren($root);
        foreach ($children as $child) {
            $resp = $this->printTree($child,$resp);
        }

        return $resp;
    }

    public function arbol()
    {
        $respuesta = '';
        $categoriasPadres = Category::where('IdCourseCategoryParent',0)->orderBy('Name')->get();
        foreach ($categoriasPadres as $categoriaPadre) {
            $hij1 = Category::where('IdCourseCategoryParent',$categoriaPadre->IdCourseCategory)->orderBy('Name')->get();
            if (count($hij1) == 0) {
                if ($respuesta == '') { $respuesta .= "{\"text\": \"".$categoriaPadre->Name."\"}"; } else { $respuesta .= ", {\"text\": \"".$categoriaPadre->Name."\"}"; }
            }else{
                if ($respuesta == '') {
                    $respuesta .= "{\"text\": \"".$categoriaPadre->Name."\",\"children\": [";
                } else {
                    $respuesta .= ", {\"text\": \"".$categoriaPadre->Name."\",\"children\": [";
                }


                foreach ($hij1 as $hijo) {

                    $hij2 = Category::where('IdCourseCategoryParent',$hijo->IdCourseCategory)->orderBy('Name')->get();
                    if (count($hij2) == 0) {
                        $respuesta .= "{\"text\": \"".$hijo->Name."\"},";
                    }else{
                        $respuesta .= "{\"text\": \"".$hijo->Name."\",\"children\": [";

                        foreach ($hij2 as $hijo2) {
                            $respuesta .= "{\"text\": \"".$hijo2->Name."\"},";
                        }
                        $respuesta .= "]}";
                    }
                }
                $respuesta .= "]}";
            }

        }
        #return "{\"core\" : {\"data\" : [$respuesta]}}";

        return "{'core' : { 'data' : [ {'text': 'Otra'}, { 'text': 'Resources', 'children': [ { 'text': 'css', 'children': [ { 'text': 'animate.css', 'icon': 'none' }, { 'text': 'bootstrap.css', 'icon': 'none' }, { 'text': 'main.css', 'icon': 'none' }, { 'text': 'style.css', 'icon': 'none' } ] } ] } ] } }";
        
    }

    public function get_for_name($name)
    {
        $categoria = Category::where('name',trim(strip_tags($name)))->first();
        $ids = explode(',', $this->printTree($categoria));
        
        $categories = Category::where('Enabled','E')->whereNotIn('IdCourseCategory', $ids)->get();

        return response()->json([
            'category' => $categoria,
            'categories' => $categories,
        ]);
    }


}
