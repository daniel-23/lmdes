<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\{User,UserParameter,Role};
use Illuminate\Support\Facades\Hash;
class TeacherController extends Controller
{
    public function index()
    {
        return view('profesores.index')
    		->with('title', 'Teachers')
    		->with('act_link', '');
    }

    public function crear()
    {
        return view('profesores.create')
    		->with('title', 'Teachers Create')
    		->with('act_link', '')
            ->with('PasswordStrength', UserParameter::find(1)->PasswordStrength);
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
			'name'		=> 'required|min:3|max:100',
			'last_name'	=> 'required|min:3|max:100',
			'code'		=> 'nullable|max:20',
    		'email'		=> 'required|email:filter|unique:Sec_Users|max:100',
    		'password'	=> 'required|confirmed|min:6|regex:/^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',
	    ]);

	    $role = Role::findOrFail(3);

    	$data = array(
    		'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
    		'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
    		'Code' => trim(strip_tags($request->code)),
    		'Email' => trim(strtolower($request->email)),
    		'password' => Hash::make(trim($request->password))
    	);

    	$user = User::create($data);

    	$user->roles()->attach($role->IdRole);

    	request()->session()->flash('success', 'Teacher created successfully');
        return redirect('/profesores');
    }





    public function get_list(Request $request)
    {
        $consulta = DB::table('Sec_Users')
            ->leftJoin('Sec_Users_has_Sec_Roles', 'Sec_Users.IdUser', '=', 'Sec_Users_has_Sec_Roles.IdUser')
            ->leftJoin('Sec_Roles', 'Sec_Users_has_Sec_Roles.IdRole', '=', 'Sec_Roles.IdRole')
            ->select('Sec_Users.*', 'Sec_Roles.Name as role_name')->where('Sec_Roles.IdRole',3);
        $data['totalNotFiltered'] = $consulta->count();
        $data['rows'] = array();

        if (is_null($request->search)) {
            $data['total'] = $data['totalNotFiltered'];
            
        }else{
            $search = '%'.trim(strip_tags($request->search)).'%';
            $consulta
                ->where('Sec_Users.Name', 'like', $search)
                ->orWhere('Sec_Users.LastName', 'like', $search)
                ->orWhere('Sec_Users.Code', 'like', $search)
                ->orWhere('Sec_Users.Email', 'like', $search)
                ->orWhere('Sec_Roles.Name', 'like', $search);
            $data['total'] = $consulta->count();
        }
        if ($request->offset > 0) {
            $consulta->offset($request->offset);
        }
        $rows = $consulta->limit($request->limit)->get();  
        foreach ($rows as $key) {
            $btnStatus = $key->Status == 'A' ? '<a href="'.url("/usuarios/cambiar-estatus/{$key->IdUser}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>' : '<a href="'.url("/usuarios/cambiar-estatus/{$key->IdUser}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>';
            $data['rows'][] = [
                'IdUser' => $key->IdUser,
                'Code' => $key->Code,
                'Name' => $key->Name . ' '. $key->LastName,
                'Email' => $key->Email,
                'Role' => $key->role_name,
                'btns' => $btnStatus . '&nbsp;   <a href="'.url("/usuarios/editar/{$key->IdUser}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i><a>'
            ];
            
        }
        return $data;
    }
}
