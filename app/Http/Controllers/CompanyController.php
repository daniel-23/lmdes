<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyType;
use App\Http\Requests\CompanyCreateRequest;
use App\{
    Company,
    City,
    Currency,
    TimeZone,
    Language,
    Regional,
    User,
    Role
};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;




class CompanyController extends Controller
{
    public function index()
    {
    	return view('companies.index')
    		->with('title', 'Companies')
    		->with('act_link', 'parameters');
    }

    public function get_list(Request $request)
    {

        $consulta = DB::table('Sec_Companies')
            ->join('Cnf_CompanyTypes', 'Sec_Companies.IdCompanyType', '=', 'Cnf_CompanyTypes.IdCompanyType')
            ->select('Sec_Companies.*', 'Cnf_CompanyTypes.Name as Type');



        $data['totalNotFiltered'] = $consulta->count();
        $data['rows'] = array();



        if (is_null($request->search)) {
            $data['total'] = $data['totalNotFiltered'];
            
        }else{
            $search = '%'.trim(strip_tags($request->search)).'%';
            $consulta
                ->where('Sec_Companies.Name', 'like', $search)
                ->orWhere('Sec_Companies.Email', 'like', $search)
                ->orWhere('Sec_Companies.WebSite', 'like', $search)
                ->orWhere('Sec_Companies.Email', 'like', $search)
                ->orWhere('Sec_Companies.ContactName', 'like', $search)
                ->orWhere('Cnf_CompanyTypes.Name', 'like', $search);
            $data['total'] = $consulta->count();
        }

        if ($request->offset > 0) {
            $consulta->offset($request->offset);
        }

        $rows = $consulta->limit($request->limit)->get();
        

        foreach ($rows as $key) {
            $btnStatus = $key->Enabled == 'E' ? '<a href="'.url("/companies/cambiar-estatus/{$key->IdCompany}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>' : '<a href="'.url("/companies/cambiar-estatus/{$key->IdCompany}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>';

            $btnEdit = '&nbsp;   <a href="'.url("/companies/editar/{$key->IdCompany}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i><a>';

            $btnCnf = '&nbsp;   <a href="'.url("/companies/regional/{$key->IdCompany}").'" title="Regional" class="btn btn-custon-four btn-warning btn-xs"><i class="fas fa-cogs" style="color: white;"></i><a>';

            $btnUsers = '&nbsp;   <a href="'.url("/companies/{$key->IdCompany}/users").'" title="Usuarios" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-users" style="color: white;"></i><a>';

            $data['rows'][] = [
                'IdCompany' => $key->IdCompany,
                'Name' => $key->Name,
                'Type' => $key->Type,
                'Email' => $key->Email,
                'ContactName' => $key->ContactName,
                'WebSite' => "<a href=\"{$key->WebSite}\" target=\"_blanck\" class=\"btn btn-sm btn-info \">Ver</a>",
                'DatabaseName' => $key->DatabaseName,
                'btns' => $btnStatus . $btnEdit. $btnCnf . $btnUsers
            ];
            
        }

        return $data;

    }

    public function crear()
    {
    	$types = CompanyType::all();

    	return view('companies.create')
    		->with('title', 'Create Company')
    		->with('act_link', 'parameters')
    		->with('types', $types);
    }

    public function create(CompanyCreateRequest $request)
    {

        $data = [
    		'IdCompanyType' => (int) $request->type,
    		'Name' => ucwords(trim(strtolower(strip_tags($request->name)))),
    		'Email' => trim(strtolower($request->email)),
    		'WebSite' => trim($request->web_site),
    		'ContactName' => ucwords(trim(strtolower(strip_tags($request->contact_name)))),
    		'DatabaseName' => trim($request->db_name),
    		'DatabaseUser' => trim($request->db_user),
    		'DatabasePassword' => encrypt(trim($request->db_password)),
    		'MaxSizeFile' => (int) $request->max_size_file,
    		'MaxUsers' => (int) $request->max_users,
    		'MaxDiscSpace' => (int) $request->max_disc_space,
    	];

        $this->create_database(
            $data['DatabaseName'],
            $data['DatabaseUser'],
            trim($request->db_password)
        );

    	$company = Company::create($data);
    	request()->session()->flash('success', 'Company created successfully');
        return redirect('/companies');

    }

    private function create_database($db_name,$db_user,$db_password)
    {
        
        $server   = env('DB_HOST', '127.0.0.1');
        $port     = env('DB_PORT', 3306);
        $user     = env('DB_USERNAME', 'root');
        $password = env('DB_PASSWORD','root');

        $conexion =  mysqli_connect($server, $user, $password);
        if (!$conexion) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $crea_db = "CREATE DATABASE $db_name;";
        $sentencia = mysqli_prepare($conexion,$crea_db);

        if (mysqli_stmt_execute($sentencia)) {

            $crea_user = "CREATE USER '$db_user'@'localhost' identified by '$db_password';";

            $sentencia = mysqli_prepare($conexion,$crea_user);
            mysqli_stmt_execute($sentencia);

            $sentencia = mysqli_prepare($conexion,"GRANT ALL PRIVILEGES ON $db_name.* TO $db_user@localhost;");
            mysqli_stmt_execute($sentencia);

            $sentencia = mysqli_prepare($conexion,"FLUSH PRIVILEGES;");
            mysqli_stmt_execute($sentencia);

            mysqli_select_db( $conexion , $db_name );
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            $query = '';

            $sqlScript = file(base_path('storage/app/tablas.sql'));

            foreach ($sqlScript as $line)   {
                $startWith = substr(trim($line), 0 ,2);
                $endWith = substr(trim($line), -1 ,1);
                if (
                    empty($line)
                    || $startWith == '--'
                    || $startWith == '/*'
                    || $startWith == '//') {
                    continue;
                }

                $query = $query . $line;
                if ($endWith == ';') {
                    mysqli_query($conexion, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
                    $query= '';
                }
            }
        }
        mysqli_close($conexion);
    }

    public function editar($id)
    {
    	$company = Company::findOrFail($id);
    	$types = CompanyType::all();

    	return view('companies.edit')
    		->with('title', 'Edit Company')
    		->with('act_link', 'parameters')
    		->with('types', $types)
    		->with('company', $company);
    }

    public function edit(Request $request, $id)
    {
    	$company = Company::findOrFail($id);
    	$validatedData = request()->validate([
            'type'        => 'required|integer',
            'name'        => 'required|min:4|unique:Sec_Companies,Name,'.$id.',IdCompany',
            'email'       => 'required|email:filter|unique:Sec_Companies,Email,'.$id.',IdCompany',
            'web_site'    => 'nullable|url',
            'contact_name'=> 'required|min:4',
            'db_name'     => 'required',
            'db_user'     => 'required',
            'max_size_file'        => 'required|integer',
            'max_users'        => 'required|integer',
            'max_disc_space'        => 'required|integer',
        ]);

    	$data = [
    		'IdCompanyType' => (int) $request->type,
    		'Name' => ucwords(trim(strtolower(strip_tags($request->name)))),
    		'Email' => trim(strtolower($request->email)),
    		'WebSite' => trim($request->web_site),
    		'ContactName' => ucwords(trim(strtolower(strip_tags($request->contact_name)))),
    		'DatabaseName' => trim($request->db_name),
    		'DatabaseUser' => trim($request->db_user),
    		'MaxSizeFile' => (int) $request->max_size_file,
    		'MaxUsers' => (int) $request->max_users,
    		'MaxDiscSpace' => (int) $request->max_disc_space,
    	];
    	if (!is_null($request->db_password)) {
    		$data['DatabasePassword'] = encrypt(trim($request->db_password));
    	}
    	$company->update($data);
    	request()->session()->flash('success', 'Company modify successfully');
        return redirect('/companies');
    }

    public function cambiar_estatus($id)
    {
        $company = Company::findOrFail($id);
        if ($company->Enabled == 'E') {
            $company->Enabled = 'D';
        }else{
            $company->Enabled = 'E';
        }
        if ($company->save()) {
            request()->session()->flash('success', 'Company modify successfully');
            return redirect('/companies');
        }
    }

    public function regional_index($id)
    {
    	$company = Company::findOrFail($id);

    	return view('companies.regional_index')
    		->with('title', 'Regional')
    		->with('act_link', 'parameters')
    		->with('company', $company);
    }

    public function regional_crear($id)
    {
    	$company = Company::findOrFail($id);
    	$cities = City::where('Enabled','E')->get();
    	$currencies = Currency::all();
    	$timezones = TimeZone::all();
    	$languages = Language::all();

    	return view('companies.regional_create')
    		->with('title', 'Create Regional')
    		->with('act_link', 'parameters')
    		->with('company', $company)
    		->with('cities', $cities)
    		->with('currencies', $currencies)
    		->with('timezones', $timezones)
    		->with('languages', $languages);
    }

    public function regional_create(Request $request, $id)
    {
    	$company = Company::findOrFail($id);
    	$validatedData = request()->validate([
            'city'        => 'required|integer',
            'currency'    => 'required|integer',
            'timezone'    => 'required|integer',
            'language'    => 'required|integer',
        ]);

        $data = [
        	'IdCompany' => $company->IdCompany,
        	'IdCity' => (int) $request->city,
        	'IdCurrency' => (int) $request->currency,
        	'IdTimeZone' => (int) $request->timezone,
        	'IdLanguage' => (int) $request->language,
        ];

        $regional = Regional::create($data);
        request()->session()->flash('success', 'Regional create successfully');
        return redirect('/companies/regional/'.$company->IdCompany);
    }

    public function regional_delete($id)
    {
    	$regional = Regional::findOrFail($id);
    	$idc = $regional->IdCompany;
    	$regional->delete();
    	request()->session()->flash('success', 'Regional deleted successfully');
        return redirect('/companies/regional/'.$idc);

    }

    public function users($id)
    {
        /*select_company($id);
        echo '<pre>'; print_r(config('database')); echo '</pre>';
        $users = DB::connection('institucion')->select('select * from Sec_Users');
        
        dd($users);*/

        return view('companies.users')
            ->with('title', 'Companies')
            ->with('act_link', 'parameters')
            ->with('company', Company::findOrFail($id));
    }

    public function users_crear($id)
    {
        select_company($id);
        return view('companies.users_create')
            ->with('title', 'Companies')
            ->with('act_link', 'parameters')
            ->with('company', Company::findOrFail($id))
            ->with('roles', Role::where('IdRole', '>', '1')->get())
            ->with('groups', DB::connection('institucion')->select('SELECT IdGroup, Name FROM Sec_Groups'));
    }

    public function users_create(Request $request, $id)
    {
        select_company($id);
        config(['database.default' => 'institucion']);
        $validatedData = $request->validate([
            'name'      => 'required|min:4|max:100',
            'last_name' => 'required|min:4|max:100',
            'code'      => 'nullable|min:4|max:20|unique:Sec_Users,Code',
            'email'     => 'required|email:filter|unique:Sec_Users,Email',
            'role'      => 'required|integer|exists:Sec_Roles,IdRole',
            'group'     => 'nullable|array',
            'password'  => 'required|confirmed|min:6|regex:/^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',
        ]);

        $data = array(
            'Name' => trim(ucwords(strtolower(strip_tags($request->name)))),
            'LastName' => trim(ucwords(strtolower(strip_tags($request->last_name)))),
            'Code' => trim(strtolower(strip_tags($request->code))),
            'Email' => trim(strtolower($request->email)),
            'password' => Hash::make(trim($request->password))
        );


        $user = User::create($data);

        $user->roles()->attach($request->role);
        if (!is_null($request->group) && count($request->group) > 0) {
            foreach ($request->group as $idg) {
                $user->groups()->attach($idg, ['CreatedAt' => date('Y-m-d H:i:s'),'UpdateAt' => date('Y-m-d H:i:s'),]);
            }
        }
            

        $request->session()->flash('success', 'User created successfully');
        return redirect()->route('companies.users',$id);
    }

    public function users_get_list(Request $request,$id)
    {
        select_company($id);
        $consulta = DB::connection('institucion')->table('Sec_Users')
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
}
