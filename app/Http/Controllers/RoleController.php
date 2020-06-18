<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Component;
use App\Permission;
class RoleController extends Controller
{
    public function index()
    {
    	return view('roles.index')
    		->with('title', 'Roles')
    		->with('act_link', 'security');
    }

    public function crear()
    {
    	return view('roles.create')
    		->with('title', 'Create Role')
    		->with('act_link', 'security');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|unique:Sec_Roles,Name',
        ]);
        $data = [
            'Name' => ucwords(strtolower(trim(strip_tags($request->name)))),
            'Description' => is_null($request->description) ? null : trim(strip_tags($request->description)),
        ];

        if (Role::create($data)) {
            $request->session()->flash('success', 'Role created successfully');
            return redirect('/roles');
            
        }

    }

    public function get_list(Request $request)
    {
        $data['totalNotFiltered'] = Role::where('IdRole','>', 0)->count();
        $rows = array();

        if (is_null($request->search)) {
            $data['total'] = $data['totalNotFiltered'];
            if ($request->offset > 0) {
                $rows = Role::where('IdRole','>', 0)->offset($request->offset)->limit($request->limit)->get();
            }else{
                $rows = Role::where('IdRole','>', 0)->limit($request->limit)->get();
            }
            
        }else{
            $search = '%'.trim($request->search).'%';
            $data['total'] = Role::where('Name','like', $search)->orWhere('Description','like', $search)->count();

            if ($request->offset > 0) {
                $rows = Role::where('Name','like', $search)->orWhere('Description','like', $search)->offset($request->offset)->limit($request->limit)->get();
            }else{
                $rows = Role::where('Name','like', $search)->orWhere('Description','like', $search)->limit($request->limit)->get();
            }
            
        }

        foreach ($rows as $key) {
            $btnStatus = $key->Enabled == 'E' ? '<a href="'.url("/roles/cambiar-estatus/{$key->IdRole}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>' : '<a href="'.url("/roles/cambiar-estatus/{$key->IdRole}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>';

            $btnEdit = '&nbsp;   <a href="'.url("/roles/editar/{$key->IdRole}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i><a>';

            $btnPermissions = '&nbsp;   <a href="'.url("/roles/permisos/{$key->IdRole}").'" title="Administrar permisos del rol" class="btn btn-custon-four btn-warning btn-xs"><i class="fas fa-key" style="color: white;"></i><a>';
            
            $data['rows'][] = [
                'IdRole' => $key->IdRole,
                'Name' => $key->Name,
                'Description' => $key->Description,
                'btns' => $btnStatus . $btnEdit . $btnPermissions
            ];
            
        }

        return $data;

    }

    public function cambiar_estatus($id)
    {
        $role = Role::find($id);
        if ($role->Enabled == 'E') {
            $role->Enabled = 'D';
        }else{
            $role->Enabled = 'E';
        }

        if ($role->save()) {
            request()->session()->flash('success', 'Role modify successfully');
            return redirect('/roles');
            
        }

    }

    public function editar($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit')
            ->with('title', 'Edit Role')
            ->with('act_link', 'security')
            ->with('role', $role);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $rU = trim(strtolower(request()->name)) != trim(strtolower($role->Name)) ? '|unique:Sec_Roles,Name' : '';
        



        $validatedData = request()->validate([
            'name' => 'required|min:4'.$rU,
        ]);
        $role->Name = ucwords(strtolower(trim(strip_tags(request()->name))));
        $role->Description = is_null(request()->description) ? null : trim(strip_tags(request()->description));
        if ($role->save()) {
            request()->session()->flash('success', 'Role modify successfully');
            return redirect('/roles');
            
        }
    }

    public function permisos_index($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.permisos_index')
            ->with('title', 'Roles | Permissions')
            ->with('act_link', 'security')
            ->with('role', $role)
            ->with('component', Component::class);
    }

    public function permisos_crear($id)
    {
        $role = Role::find($id);
        $permissions = Permission::where('Enabled','E')->get();
        $components = Component::where('Enabled','E')->get();
        return view('roles.permisos_crear')
            ->with('title', 'Roles |Create Permission')
            ->with('act_link', 'security')
            ->with('role', $role)
            ->with('permissions', $permissions)
            ->with('components', $components);
    }

    public function permisos_create(Request $request,$id)
    {
        $validatedData = $request->validate([
            'permission' => 'required|integer',
            'component' => 'required|integer',
        ]);

        #dd($request->all());

        $role = Role::findOrFail($id);
        $permission = Permission::findOrFail($request->permission);
        $component = Component::findOrFail($request->component);

        foreach ($role->permissions as $permiso) {
            if ($permiso->IdPermission == trim($request->permission) && $permiso->pivot->IdComponent == trim($request->component)) {
                request()->session()->flash('success', 'Permission already exists');
                return redirect('/roles/permisos/'.$id);
            }
        }
        $role->permissions()->attach($permission, ['IdComponent' => $component->IdComponent]);
        request()->session()->flash('success', 'Permission add successfully');
        return redirect('/roles/permisos/'.$id);

        
    }

    public function permisos_eliminar($id,$idp)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->wherePivot('IdRolePermComponents', $idp)->detach();
        request()->session()->flash('success', 'Permission deleted successfully');
        return redirect('/roles/permisos/'.$id);
    }
}
