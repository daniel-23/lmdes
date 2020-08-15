<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,UserParameter,Group,Role, UsrAddInfo,UsrAddHealthInfo};
use Illuminate\Support\Facades\{Hash, DB, Gate};
class StudentController extends Controller
{
    public function index()
    {
    	return view('estudiantes.index')
    	->with('title', 'Students')
    	->with('act_link', 'students')
        ->with('students',Role::where('name','Estudiante')->first()->users);
    }

    public function get_list(Request $request)
    {
    	$consulta = DB::table('Sec_Users')
    	->leftJoin('Sec_Users_has_Sec_Roles', 'Sec_Users.IdUser', '=', 'Sec_Users_has_Sec_Roles.IdUser')
    	->leftJoin('Sec_Roles', 'Sec_Users_has_Sec_Roles.IdRole', '=', 'Sec_Roles.IdRole')
    	->where('Sec_Roles.Name', '=', 'Estudiante')
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

        $puedeEditar = Gate::allows('tiene-permiso', 'Estudiantes+Editar');
        $puedeCambiarStatus = Gate::allows('tiene-permiso', 'Estudiantes+Cambiar Estado');

        foreach ($rows as $key) {
            $btnEdit = $puedeEditar ? '&nbsp;   <a href="'.url("/estudiantes/editar/{$key->IdUser}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i><a>' : '';

            if ($puedeCambiarStatus) {
                $btnStatus = $key->Status == 'A' ? '<a href="'.url("/estudiantes/cambiar-estatus/{$key->IdUser}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>' : '<a href="'.url("/estudiantes/cambiar-estatus/{$key->IdUser}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>';
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
    	return view('estudiantes.create')
    	->with('title', 'Students Create')
    	->with('act_link', 'students')
    	->with('PasswordStrength', UserParameter::find(1)->PasswordStrength)
    	->with('groups', Group::select(['IdGroup','Name'])->where('Enabled','E')->get());
    }

    public function create(Request $request)
    {
    	$PasswordStrength = UserParameter::find(1)->PasswordStrength;
        $rule = 'required|confirmed';
        $rol = Role::where('name','Estudiante')->first();

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
            'code'		 => 'required|max:20|unique:Sec_Users,Code',
            'password'   => $rule,
        ]);


    	$data = array(
    		'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
    		'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
    		'Email' => trim(strtolower($request->email)),
    		'Code' => trim(strtolower($request->code)),
    		'password' => Hash::make(trim($request->password)),
            'IdCompany' => $request->role != 1 ? (int)$request->company_id : 0,
    	);

        $user = User::create($data);
    	$user->roles()->attach($rol->IdRole);
    	$user->groups()->attach($request->groups);

        
        request()->session()->flash('success', 'Student created successfully');
        return redirect('/estudiantes');
    }

    public function editar($id)
    {
        $role = Role::where('Name','Estudiante')->first();
        $student = $role->users()->where('Sec_Users.IdUser',$id)->first();
        if (is_null($student)) {
            return abort('404');
        }
    	$groupsStudent = $student->groups()->select('Sec_Groups.IdGroup')->get();
    	return view('estudiantes.edit')
    	->with('title', 'Students Edit')
    	->with('act_link', 'students')
    	->with('PasswordStrength', UserParameter::find(1)->PasswordStrength)
    	->with('groups', Group::select(['IdGroup','Name'])->where('Enabled','E')->get())
    	->with('student',$student)
    	->with('groupsStudent',$groupsStudent);
    }

    public function edit(Request $request, $id)
    {
    	$student = User::findOrFail($id);
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
            'code'		 => 'required|max:20|unique:Sec_Users,Code,'.$id.',IdUser',
            'password'   => $rule,
        ]);


    	$data = array(
    		'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
    		'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
    		'Email' => trim(strtolower($request->email)),
    		'Code' => trim(strtolower($request->code)),
            'IdCompany' => $request->role != 1 ? (int)$request->company_id : 0,
    	);

    	if (!is_null($request->password)) {
    		$data['password'] = Hash::make(trim($request->password));
    	}

        $student->update($data);
        $student->groups()->detach();
    	$student->groups()->attach($request->groups);
    	request()->session()->flash('success', 'Student modify successfully');
        return redirect('/estudiantes');
    }

    public function edit_account(Request $request, $id)
    {
        $student = User::findOrFail($id);
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
            'code'       => 'required|max:20|unique:Sec_Users,Code,'.$id.',IdUser',
            'password'   => $rule,
        ]);


        $data = array(
            'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
            'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
            'Email' => trim(strtolower($request->email)),
            'Code' => trim(strtolower($request->code)),
        );

        if (!is_null($request->password)) {
            $data['password'] = Hash::make(trim($request->password));
        }

        $student->update($data);
        request()->session()->flash('success', 'Student modify successfully');
        return redirect()->back();
    }

    public function edit_additional(Request $request, $id)
    {
        $student = User::findOrFail($id);
        $validatedData = $request->validate([
            'gender'                    => 'required|max:1|in:M,F',
            'birthdate'                 => 'required|date',
            'height'                    => 'nullable|integer',
            'weight'                    => 'nullable|integer',
            'rh'                        => 'nullable|max:5|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'health_care_entity'        => 'nullable|string|max:100',
            'health_care_type'          => 'nullable|string|max:200',
            'health_care_contact_name'  => 'nullable|string|max:100',
            'health_care_contact_phone' => 'nullable|string|max:100',
            'photo'                     => 'nullable|image',
        ]);
        $data = array(
            'Gender' => $request->gender,
            'BirthDate' => $request->birthdate,
            'Height' => $request->height,
            'Weight' => $request->weight,
            'RH' => $request->rh,
            'HealthCareEntity' => trim(strip_tags($request->health_care_entity)),
            'HealthCareType' => trim(strip_tags($request->health_care_type)),
            'HealthCareContactName' => trim(strip_tags($request->health_care_contact_name)),
            'HealthCareContactPhone' => trim(strip_tags($request->health_care_contact_phone)),
        );
        if (count($request->file()) > 0) {
            $path = $request->file('photo')->store(
                'images/student', 'public'
            );
            $data['Photo'] = $path;
        }

        if (is_null($student->add_info)) {
            $student->add_info()->create($data);
        }else{
            $student->add_info->update($data);
        }
        request()->session()->flash('success', 'Student modify successfully');
        return redirect()->back();
    }

    public function edit_health(Request $request, $id)
    {

        $user = User::findOrFail($id);
        foreach ($user->health_info as $key) {
            UsrAddHealthInfo::destroy($key->IdAddHealthInfo);
        }
        if (!is_null($request->name)) {
            foreach ($request->name as $key => $value) {
                $user->health_info()->create([
                    'Name' => $value,
                    'HealthInfoType' => $request->type[$key],
                    'Description' => $request->description[$key],
                ]);
            }
        }
            
        request()->session()->flash('success', 'Student modify successfully');
        return redirect()->back();
        
    }

    public function perfil($id)
    {
        $student = User::findOrFail($id);
        $groupsStudent = $student->groups()->select('Sec_Groups.IdGroup')->get();
        return view('estudiantes.profile')
        ->with('title', 'Students Profile')
        ->with('act_link', 'students')
        ->with('student',$student);
    }


}
