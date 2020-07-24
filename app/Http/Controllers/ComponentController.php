<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use Illuminate\Support\Facades\{Gate};

class ComponentController extends Controller
{
    public function index()
    {
    	return view('componentes.index')
    		->with('title', 'Componentes')
    		->with('act_link', 'security');
    }

    public function crear()
    {
    	return view('componentes.create')
    		->with('title', 'Create Component')
    		->with('act_link', 'security')
    		->with('componentes', Component::where('Enabled','E')->get());
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|unique:Sec_Components,Name',
            'parent' => 'integer',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
            'IdComponent1' => (int) $request->parent,
        ];


        if (Component::create($data)) {
            $request->session()->flash('success', 'Component created successfully');
            return redirect('/componentes');
        }

    }

    public function get_list(Request $request)
    {
        $data['totalNotFiltered'] = Component::where('IdComponent','>', 0)->count();
        $rows = array();
        $data['rows'] = array();

        if (is_null($request->search)) {
            $data['total'] = $data['totalNotFiltered'];
            if ($request->offset > 0) {
                $rows = Component::where('IdComponent','>', 0)->offset($request->offset)->limit($request->limit)->get();
            }else{
                $rows = Component::where('IdComponent','>', 0)->limit($request->limit)->get();
            }
            
        }else{
            $search = '%'.trim($request->search).'%';
            $data['total'] = Component::where('Name','like', $search)->orWhere('Description','like', $search)->count();

            if ($request->offset > 0) {
                $rows = Component::where('Name','like', $search)->orWhere('Description','like', $search)->offset($request->offset)->limit($request->limit)->get();
            }else{
                $rows = Component::where('Name','like', $search)->orWhere('Description','like', $search)->limit($request->limit)->get();
            }
            
        }

        $puedeEditar = Gate::allows('tiene-permiso', 'Componentes+Editar');
        $puedeCambiarStatus = Gate::allows('tiene-permiso', 'Componentes+Cambiar Estado');

        foreach ($rows as $key) {
            $btnEdit = $puedeEditar ? '&nbsp;   <a href="'.url("/componentes/editar/{$key->IdComponent}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i></a>' : '';

            if ($puedeCambiarStatus) {
                $btnStatus = $key->Enabled == 'E' ? '<a href="'.url("/componentes/cambiar-estatus/{$key->IdComponent}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i></a>' : '<a href="'.url("/componentes/cambiar-estatus/{$key->IdComponent}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i></a>';
            }else{
                $btnStatus = $key->Enabled == 'E' ? '<button title="Componente Activo" class="btn btn-custon-four btn-success btn-xs disabled"><i class="far fa-check-circle" style="color: white;"></i></button>' : '<button title="Componente Inactivo" class="btn btn-custon-four btn-danger btn-xs disabled"><i class="fas fa-times-circle" style="color: white;"></i></button>';
            }
            
            $data['rows'][] = [
                'IdComponent' => $key->IdComponent,
                'Name'        => $key->Name,
                'Description' => $key->Description,
                'Parent'      => $key->IdComponent1 == 0 ? '' : Component::find($key->IdComponent1)->Name,
                'btns'        => $btnStatus . $btnEdit
            ];
            
        }

        return $data;

    }

    public function cambiar_estatus($id)
    {
        $componente = Component::find($id);
        if ($componente->Enabled == 'E') {
            $componente->Enabled = 'D';
        }else{
            $componente->Enabled = 'E';
        }

        if ($componente->save()) {
            request()->session()->flash('success', 'Component modify successfully');
            return redirect('/componentes');
            
        }

    }

    public function editar($id)
    {
        $componente = Component::find($id);
        $ids = explode(',', $this->printTree($componente));
        
        $componentes = Component::where('Enabled','E')->whereNotIn('IdComponent', $ids)->get();

        return view('componentes.edit')
            ->with('title', 'Edit Component')
            ->with('act_link', 'security')
            ->with('componente', $componente)
            ->with('componentes', $componentes);
    }

    public function edit($id)
    {
        $componente = Component::find($id);

        $rU = trim(strtolower(request()->name)) != trim(strtolower($componente->Name)) ? '|unique:Sec_Components,Name' : '';

        $validatedData = request()->validate([
            'name' => 'required|min:4'.$rU,
            'parent' => 'integer',
        ]);
        $componente->Name = ucwords(strtolower(trim(strip_tags(request()->name))));
        $componente->Description = is_null(request()->description) ? null : trim(strip_tags(request()->description));
        $componente->IdComponent1 = (int) request()->parent;
        if ($componente->save()) {
            request()->session()->flash('success', 'Component modify successfully');
            return redirect('/componentes');
            
        }
    }

    public function getChildren($parent){
        $children = Component::where('IdComponent1',$parent->IdComponent)->get();
        return $children;
    }

    public function printTree($root, $resp = ''){
        if ($resp == '') {
            $resp = $root->IdComponent;
        } else {
            $resp .= ','.$root->IdComponent;
        }
        
        
        $children = $this->getChildren($root);
        foreach ($children as $child) {
            $resp = $this->printTree($child,$resp);
        }

        return $resp;
    }
}
