<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    public function index()
    {
    	return view('permisos.index')
    		->with('title', 'Permission')
    		->with('act_link', 'security');
    }

    public function crear()
    {
    	return view('permisos.create')
    		->with('title', 'Create Roles')
    		->with('act_link', 'security');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|unique:Sec_Permissions,Name',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
        ];

        if (Permission::create($data)) {
            $request->session()->flash('success', 'Permission created successfully');
            return redirect('/permisos');
            
        }

    }

    public function get_list(Request $request)
    {
        $data['totalNotFiltered'] = Permission::where('IdPermission','>', 0)->count();
        $rows = array();

        if (is_null($request->search)) {
            $data['total'] = $data['totalNotFiltered'];
            if ($request->offset > 0) {
                $rows = Permission::where('IdPermission','>', 0)->offset($request->offset)->limit($request->limit)->get();
            }else{
                $rows = Permission::where('IdPermission','>', 0)->limit($request->limit)->get();
            }
            
        }else{
            $search = '%'.trim($request->search).'%';
            $data['total'] = Permission::where('Name','like', $search)->orWhere('Description','like', $search)->count();

            if ($request->offset > 0) {
                $rows = Permission::where('Name','like', $search)->orWhere('Description','like', $search)->offset($request->offset)->limit($request->limit)->get();
            }else{
                $rows = Permission::where('Name','like', $search)->orWhere('Description','like', $search)->limit($request->limit)->get();
            }
            
        }

        foreach ($rows as $key) {
            $btnStatus = $key->Enabled == 'E' ? '<a href="'.url("/permisos/cambiar-estatus/{$key->IdPermission}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>' : '<a href="'.url("/permisos/cambiar-estatus/{$key->IdPermission}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>';
            $data['rows'][] = [
                'IdPermission' => $key->IdPermission,
                'Name' => $key->Name,
                'Description' => $key->Description,
                'btns' => $btnStatus . '&nbsp;   <a href="'.url("/permisos/editar/{$key->IdPermission}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i><a>'
            ];
            
        }

        return $data;

    }

    public function cambiar_estatus($id)
    {
        $permiso = Permission::find($id);
        if ($permiso->Enabled == 'E') {
            $permiso->Enabled = 'D';
        }else{
            $permiso->Enabled = 'E';
        }

        if ($permiso->save()) {
            request()->session()->flash('success', 'Permission modify successfully');
            return redirect('/permisos');
            
        }

    }

    public function editar($id)
    {
        $permiso = Permission::find($id);
        return view('permisos.edit')
            ->with('title', 'Edit Permission')
            ->with('act_link', 'security')
            ->with('permiso', $permiso);
    }

    public function edit($id)
    {
        $permiso = Permission::find($id);

        $rU = trim(strtolower(request()->name)) != trim(strtolower($permiso->Name)) ? '|unique:Sec_Permissions,Name' : '';

        $validatedData = request()->validate([
            'name' => 'required|min:4'.$rU,
        ]);
        $permiso->Name = ucwords(strtolower(trim(strip_tags(request()->name))));
        $permiso->Description = is_null(request()->description) ? null : trim(strip_tags(request()->description));
        if ($permiso->save()) {
            request()->session()->flash('success', 'Permission modify successfully');
            return redirect('/permisos');
            
        }
    }
}
