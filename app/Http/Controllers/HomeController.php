<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserParameter;
use App\Company;

class HomeController extends Controller
{

    public function index()
    {
        return view('home')
    		->with('title', 'Home')
    		->with('act_link', '');
    }

    public function session_time()
    {
    	return UserParameter::find(1)->SessionTime;
    }

    public function set_language($lan)
    {
        session()->put('language', $lan);

        return back();

    }
}
