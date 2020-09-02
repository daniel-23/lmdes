<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{
    User,
    UserParameter,
    AudUser,
    Company
};
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\{Mail,Hash};
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function index(Request $request, $company = null)
    {
        if (!is_null($company)) {
            $institucion = Company::select(['IdCompany'])->where('name',strip_tags( str_replace('-', ' ', $company)) )->first();
            if (is_null($institucion)) {
                abort(404);
            }
            setcookie('institucion', $institucion->IdCompany, time() + (86400 * 30), "/");
        }else{

            if (isset($_COOKIE['institucion'])) {

                setcookie('institucion', 0, time() + (86400 * 30), "/");
            }
        }

        return view('login.index');
    }

    public function login(Request $request)
    {

    	$validatedData = $request->validate([
    		'Email' => 'required',
    	]);

    	$email = trim(strtolower($request->Email));

    	$password = trim($request->Password);

    	$user = User::where('Email',$email)->first();


    	#Si no existe el usuario
    	if (is_null($user)) {
    		return redirect()->back()
    		 	->withErrors(['login' => 'Incorrect username and / or password'])
    		 	->withInput();
    	}


    	#Si el Status es diferente de A
    	if ($user->Status != 'A') {
    		$msj = $user->Status === 'I' ? 'User Inactive' : 'User blocked';
    		return redirect()->back()
    		 	->withErrors(['login' => $msj])
    		 	->withInput();
    	}

    	#Si ha realizado mas de 5 intentos se cambia el status
    	if (UserParameter::find(1)->SessionFailedAttempts > 0 && $user->Attemps >= UserParameter::find(1)->SessionFailedAttempts) {
    		$user->Status = 'B';
    		$user->save();
    		$msj='User blocked';
    		return redirect()->back()
    		 	->withErrors(['login' => $msj])
    		 	->withInput();
    	}


    	if (!Auth::attempt(['Email' => $email, 'password' => $password])) {
    		$user->Attemps ++;
    		$user->save();
    		#Si ha realizado mas de 5 intentos se cambia el status
	    	if (UserParameter::find(1)->SessionFailedAttempts > 0 && $user->Attemps >= UserParameter::find(1)->SessionFailedAttempts) {
	    		$user->Status = 'B';
	    		$user->save();
	    		$msj='User blocked';
	    		return redirect()->back()
	    		 	->withErrors(['login' => $msj])
	    		 	->withInput();
	    	}
    		return redirect()->back()
    		 	->withErrors(['login' => 'Incorrect username and / or password'])
    		 	->withInput();
    	}

    	$user->Attemps = 0;
    	$user->save();
        AudUser::create([
            'IdUser' => $user->IdUser,
            'IpConection' => request()->ip(),
            'IdEvent' => 2,
            'IdComponent' => 1,
            'SessionTime' => time(),
            'DateStartSession' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->intended('/');
    }


    public function reset_password()
    {
        return view('login.reset');
    }

    public function post_reset_password(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:filter',
        ]);
        $user = User::where('Email',$request->email)->first();

        if (is_null($user)) {
            return redirect('/reset-password')
                ->withErrors(['email' => 'Error'])
                ->withInput();
        }
        #$key = Hash::make('12345');
        $key = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789".uniqid());

        $user->RecoveryToken = $key;
        $user->save();

        $datos = ['key' => $key];
        Mail::to('danielbatlet@gmail.com')->send(new ResetPassword($datos));
        return redirect('/reset-password')
                ->withErrors(['email' => 'Se ha enviado un correo']);

        #return (new ResetPassword($datos))->render();

    }

    public function key_reset_password($key)
    {
        $user = User::where('RecoveryToken',urldecode($key))->first();
        return is_null($user) ? abort(404) : view('login.recovery')->with('user',$user);
    }

    public function post_key_reset_password(Request $request, $key)
    {

        $user = User::where('RecoveryToken',urldecode($key))->first();
        if (is_null($user)) {
            return abort(404);
        }
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
        

        #dd($request->all());

        $user->password = Hash::make(trim($request->password));
        $user->RecoveryToken = null;
        $user->Attemps = 0;
        $user->save();

        Auth::login($user);
        $request->session()->flash('success', 'Password recovery successfully');
        return redirect('/');
    }

    public function logout()
    {
        $user = Auth::user();
        AudUser::create([
            'IdUser' => $user->IdUser,
            'IpConection' => request()->ip(),
            'IdEvent' => 3,
            'IdComponent' => 1,
            'SessionTime' => time(),
            'DateEndSession' => date('Y-m-d H:i:s'),
        ]);
        Auth::logout();
        if (isset($_COOKIE['institucion']) && $_COOKIE['institucion'] != 0) {
            $institucion = Company::findOrFail((int) $_COOKIE['institucion']);
            $name = Str::slug($institucion->Name);
            return redirect("/$name/login");
        }else{
            return redirect()->route('login');
        }
    }
}
