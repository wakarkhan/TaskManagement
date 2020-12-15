<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


class AuthenticationController extends Controller
{
    public function index(Request $request)
    {

    	if ($request->session()->has('id')) {
		    return view('Dashboard.dashboard');
		}else{
			return view('Authentication.login');
		}
    }

    public function checkLogin(Request $request)
    {        
        try {
           echo $request->get('email_username');
        } catch (Exception $e) {
            echo $e;
        }
    }
}
