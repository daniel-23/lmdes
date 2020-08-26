<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    User,
    Role,
    Group,
    UserParameter,
    AudUser,
    Company

};
use App\Http\Requests\UsuarioCrearRequest;
use Illuminate\Support\Facades\{
    Hash,
    DB,
    Gate
};

use Illuminate\Auth\Access\Response;

class UserController extends Controller
{
    public function index()
    {
        return view('usuarios.index')
    		->with('title', 'Users')
    		->with('act_link', 'security');
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

        $puedeEditar = Gate::allows('tiene-permiso', 'Usuarios+Editar');
        $puedeCambiarStatus = Gate::allows('tiene-permiso', 'Usuarios+Cambiar Estado');

        foreach ($rows as $key) {
            $btnEdit = $puedeEditar ? '&nbsp;   <a href="'.url("/usuarios/editar/{$key->IdUser}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i><a>' : '';

            if ($puedeCambiarStatus) {
                $btnStatus = $key->Status == 'A' ? '<a href="'.url("/usuarios/cambiar-estatus/{$key->IdUser}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>' : '<a href="'.url("/usuarios/cambiar-estatus/{$key->IdUser}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>';
            }else{
                $btnStatus = $key->Status == 'A' ? '<button  title="Usuario Activo" class="btn btn-custon-four btn-success btn-xs disabled"><i class="far fa-check-circle" style="color: white;"></i></button>' : '<button  title="Usuario Inactivo" class="btn btn-custon-four btn-danger btn-xs disabled"><i class="fas fa-times-circle" style="color: white;"></i></button>';
            }

            







            $data['rows'][] = [
                'IdUser' => $key->IdUser,
                'Name' => $key->Name . ' '. $key->LastName,
                'Email' => $key->Email,
                'Role' => $key->role_name,
                'btns' => $btnStatus . $btnEdit
            ];
            
        }
        return $data;
    }

    public function crear()
    {
    	return view('usuarios.create')
    		->with('title', 'Create User')
    		->with('act_link', 'security')
    		->with('roles', Role::where('IdRole','<',3)->get())
            ->with('groups', Group::where('Enabled','E')->get())
            ->with('companies', Company::select(['IdCompany','Name'])->where('Enabled','E')->get())
            ->with('PasswordStrength', UserParameter::find(1)->PasswordStrength);
    }

    public function create(Request $request)
    {

        $PasswordStrength = UserParameter::find(1)->PasswordStrength;
        $rule = 'required|confirmed';

        if ($PasswordStrength != 0) {
            switch ($PasswordStrength) {
                case 1:
                    $rule .= '|min:5';
                    break;
                case 2:
                    $rule .= "|min:6|regex:/^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
                    break;

                case 3:
                    $rule .= "|min:8|regex:/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
                    break;
            }
        }

        $validatedData = $request->validate([
            'name'       => 'required|string|min:3|max:200',
            'last_name'  => 'required|string|min:3|max:200',
            'email'      => 'required|email:filter|max:200|unique:Sec_Users,Email',
            'role'       => 'required|integer|exists:Sec_Roles,IdRole',
            'company_id' => 'exclude_if:role,1|integer|exists:Sec_Companies,IdCompany',
            'password'   => $rule,
        ]);


    	$data = array(
    		'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
    		'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
    		'Email' => trim(strtolower($request->email)),
    		'password' => $request->role == 1 ? Hash::make(trim($request->password)) : Hash::make(trim($request->password)),
            'IdCompany' => $request->role != 1 ? $request->company_id : 0,
    	);

        $user = User::create($data);
    	$user->roles()->attach($request->role);

        if ($request->role != 1) {
            select_company($request->company_id);
            config(['database.default' => 'institucion']);
            $user = User::create($data);
            $user->roles()->attach($request->role);
        }

        request()->session()->flash('success', 'User created successfully');
        return redirect('/usuarios');
    }

    public function editar($id)
    {
        $user = User::findOrFail($id);

        return view('usuarios.edit')
            ->with('title', 'Edit User')
            ->with('act_link', 'security')
            ->with('user', $user)
    		->with('roles', Role::where('Enabled','E')->get())
            ->with('groups', Group::where('Enabled','E')->get())
            ->with('companies', Company::select(['IdCompany','Name'])->where('Enabled','E')->get())
            ->with('PasswordStrength', UserParameter::find(1)->PasswordStrength);
    }

    public function edit(Request $request, $id)
    {
        $PasswordStrength = UserParameter::find(1)->PasswordStrength;
        $rule = 'nullable|confirmed';

        if ($PasswordStrength != 0) {
            switch ($PasswordStrength) {
                case 1:
                    $rule .= '|min:5';
                    break;
                case 2:
                    $rule .= "|min:6|regex:/^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
                    break;

                case 3:
                    $rule .= "|min:8|regex:/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
                    break;
            }
        }
        $validatedData = $request->validate([
            'name'       => 'required|string|min:3|max:200',
            'last_name'  => 'required|string|min:3|max:200',
            'email'      => 'required|email:filter|max:200|unique:Sec_Users,Email,'.$id.',IdUser',
            'role'       => 'required|integer|exists:Sec_Roles,IdRole',
            'company_id' => 'exclude_if:role,1|integer|exists:Sec_Companies,IdCompany',
            'password'   => $rule,
        ]);


        $data = array(
            'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
            'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
            'Email' => trim(strtolower($request->email)),
            'IdCompany' => $request->role != 1 ? (int)$request->company_id : 0,
        );

        if (!is_null($request->password) && trim($request->password) != '') {
            $data['password'] = Hash::make(trim($request->password));
        }


        $user = User::findOrFail($id);
        $user->roles()->detach();

        $userEmail = $user->Email;

        $user->update($data);
        $user->IdCompany = $data['IdCompany'];
        $user->save();
        $user->roles()->attach($request->role);


        if ($request->role != 1) {
            select_company($request->company_id);
            config(['database.default' => 'institucion']);
            
            $user = User::where('Email',$userEmail)->first();
            if (is_null($user)) {
                $user = User::create($data);
            }else{
                $user->roles()->detach();
                $user->update($data);
                $user->roles()->attach($request->role);
            }
            $user->IdCompany = $data['IdCompany'];
            $user->save();
        }

        request()->session()->flash('success', 'User modify successfully');
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
            ->with('act_link', 'security')
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
            ->with('act_link', 'security');
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

    public function editar_usuario_compania($idCompany, $idUser)
    {
        select_company($idCompany);
        config(['database.default' => 'institucion']);

        $user = User::findOrFail($idUser);
        $rolId = $user->roles()->first()->IdRole;

        return view('usuarios.edit_user_company')
            ->with('title', 'Edit User')
            ->with('act_link', 'security')
            ->with('user', $user)
            ->with('roles', Role::where([['Enabled','=','E'],['IdRole','>',1]])->get())
            ->with('groups', Group::where('Enabled','E')->get())
            ->with('rolId',$rolId)
            ->with('PasswordStrength', UserParameter::find(1)->PasswordStrength);
    }
}
