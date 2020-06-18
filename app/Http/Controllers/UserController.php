<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Group;
use App\UserParameter;
use App\AudUser;
use App\Http\Requests\UsuarioCrearRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class UserController extends Controller
{

    public function index()
    {
        return view('usuarios.index')
    		->with('title', 'Users')
    		->with('act_link', '');
    }
    public function get_list(Request $request)
    {
        $consulta = DB::table('Sec_Users')
            ->leftJoin('Sec_Users_has_Sec_Roles', 'Sec_Users.IdUser', '=', 'Sec_Users_has_Sec_Roles.IdUser')
            ->leftJoin('Sec_Roles', 'Sec_Users_has_Sec_Roles.IdRole', '=', 'Sec_Roles.IdRole')
            ->select('Sec_Users.*', 'Sec_Roles.Name as role_name');
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


    public function crear()
    {
    	return view('usuarios.create')
    		->with('title', 'Create User')
    		->with('act_link', '')
    		->with('roles', Role::where('Enabled','E')->get())
            ->with('groups', Group::where('Enabled','E')->get())
            ->with('PasswordStrength', UserParameter::find(1)->PasswordStrength);
    }

    public function create(UsuarioCrearRequest $request)
    {

        $PasswordStrength = UserParameter::find(1)->PasswordStrength;
        $rule = 'required|confirmed';
        $msj = '';

        if ($PasswordStrength != 0) {
            switch ($PasswordStrength) {
                case 1:
                    $rule .= '|min:5';
                    break;

                case 2:
                    $rule .= "|min:6|regex:/^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
                    $msj = "La :attribute debe tener minimo 6 caracteres, 1 mayuscula, 1 minuscula, 1 numero";
                    break;

                case 3:
                    $rule .= "|min:8|regex:/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
                    $msj = "La :attribute debe tener minimo 8 caracteres, 1 mayuscula, 1 minuscula, 1 numero, 1 caracter especial";
                    break;
            }
        }
        
        $validatedData = $request->validate([
            'password'          => $rule,
        ],[
            'password.regex' => $msj
        ]);


    	$role = Role::findOrFail($request->role);

    	$data = array(
    		'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
    		'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
    		'Code' => trim(strtolower(strip_tags($request->code))),
    		'Email' => trim(strtolower($request->email)),
    		'password' => Hash::make(trim($request->password))
    	);

    	$user = User::create($data);

    	$user->roles()->attach($role->IdRole);
        foreach ($request->group as $idg) {
            $user->groups()
            ->attach($idg, ['CreatedAt' => date('Y-m-d H:i:s'),'UpdateAt' => date('Y-m-d H:i:s'),]);
        }

    	request()->session()->flash('success', 'User created successfully');
        return redirect('/usuarios');
    }

    public function editar($id)
    {
        $user = User::findOrFail($id);

        return view('usuarios.edit')
            ->with('title', 'Edit User')
            ->with('act_link', '')
            ->with('user', $user)
    		->with('roles', Role::where('Enabled','E')->get())
            ->with('groups', Group::where('Enabled','E')->get())
            ->with('PasswordStrength', UserParameter::find(1)->PasswordStrength);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);


        $eU = trim(strtolower(request()->email)) != trim(strtolower($user->Email)) ? '' : '';
       

        $validatedData = request()->validate([
            'name'        => 'required|min:4|max:100',
            'last_name'    => 'required|min:4|max:100',
            'code'    => 'required|min:4|max:20|unique:Sec_Users,Code,'.$id.'IdUser',
            'email'         => 'required|email:filter|unique:Sec_Users,Email,'.$id.'IdUser',
            'role'         => 'required|integer',
            'group'      => 'required|array',
            'password'          => 'confirmed',
        ]);
        $data = array(
    		'Name' => trim(ucwords(strtolower(strip_tags(request()->name)))),
    		'LastName' => trim(ucwords(strtolower(strip_tags(request()->last_name)))),
    		'Code' => trim(strtolower(strip_tags(request()->code))),
    		'Email' => trim(strtolower(request()->email))
    	);

    	if (!is_null(request()->password) && trim(request()->password) != '') {
    		$data['password'] = Hash::make(trim(request()->password));
    	}


        $role = Role::findOrFail(request()->role);

        if ($user->update($data)) {
            request()->session()->flash('success', 'User modify successfully');    
        }

        $rolUser = $user->roles()->first()->IdRole ?? 0;

        if ($role->IdRole != $rolUser) {
            if ($rolUser != 0) {
                $user->roles()->detach($rolUser);
            }
        	
        	$user->roles()->attach($role->IdRole);
        }

        $user->groups()->detach();
        foreach (request()->group as $idg) {
            $user->groups()
            ->attach($idg, ['CreatedAt' => date('Y-m-d H:i:s'),'UpdateAt' => date('Y-m-d H:i:s'),]);
        }


        return redirect('/usuarios');
    }

    public function cambiar_estatus($id)
    {
        $user = User::findOrFail($id);
        if ($user->Status == 'A') {
            $user->Status = 'I';
        }else{
            $user->Status = 'A';
        }

        if ($user->save()) {
            request()->session()->flash('success', 'User modify successfully');
            return redirect('/usuarios');
            
        }

    }

    public function parametros()
    {
        $parameter = UserParameter::find(1);

        return view('usuarios.parameters')
            ->with('title', 'Users Parameters')
            ->with('act_link', '')
            ->with('parameter', $parameter);
    }

    public function parameters(Request $request)
    {


        $parameter = UserParameter::find(1);
        $validatedData = request()->validate([
            'SessionTime'           => 'required|integer',
            'PasswordStrength'      => 'required|integer',
            'ChangePassword'        => 'required|integer',
            'SessionFailedAttempts' => 'required|integer',
            'DisabledTime'          => 'required|integer',
        ]);
        $data = array(
            'SessionTime'           => (int) $request->SessionTime,
            'PasswordStrength'      => (int) $request->PasswordStrength,
            'ChangePassword'        => (int) $request->ChangePassword,
            'SessionFailedAttempts' => (int) $request->SessionFailedAttempts,
            'DisabledTime'          => (int) $request->DisabledTime,
            'Avatar'                => $request->Avatar
        );

        if ($parameter->update($data)) {
            request()->session()->flash('success', 'Parameters modify successfully');    
        }

        return redirect('/usuarios/parametros');
    }

    public function auditoria()
    {
        return view('usuarios.aud')
            ->with('title', 'Users Aud')
            ->with('act_link', '');
    }

    public function get_auditoria(Request $request)
    {
        $consulta = DB::table('Aud_Users')
            ->join('Sec_Users', 'Aud_Users.IdUser', '=', 'Sec_Users.IdUser')
            ->join('Aud_Events', 'Aud_Users.IdEvent', '=', 'Aud_Events.IdEvent')
            ->select('Aud_Users.*', 'Sec_Users.Name', 'Aud_Events.Description');

        $data['totalNotFiltered'] = $consulta->count();
        $data['rows'] = array();



        if (is_null($request->search)) {
            $data['total'] = $data['totalNotFiltered'];
            
        }else{
            $search = '%'.trim(strip_tags($request->search)).'%';
            $consulta
                ->where('Sec_Users.Name', 'like', $search)
                ->orWhere('Aud_Events.Description', 'like', $search)
                ->orWhere('Aud_Users.DateStartSession', 'like', $search)
                ->orWhere('Aud_Users.DateEndSession', 'like', $search)
                ->orWhere('Aud_Users.DateEvent', 'like', $search)
                ->orWhere('Aud_Users.IpConection', 'like', $search);


            $data['total'] = $consulta->count();
        }

        if ($request->offset > 0) {
            $consulta->offset($request->offset);
        }

        $rows = $consulta->limit($request->limit)->get();

        foreach ($rows as $key) {
            $data['rows'][] = [
                'IdAuditUser' => $key->IdAuditUser,
                'SessionTime' => $key->SessionTime,
                'DateStartSession' => $key->DateStartSession,
                'DateEndSession' => $key->DateEndSession,
                'DateEvent' => $key->DateEvent,
                'IpConection' => $key->IpConection,
                'IdEvent' => $key->IdEvent,
                'user_name' => $key->Name,
                'event_description' => $key->Description,
            ];
        }
        return $data;
    }
}
