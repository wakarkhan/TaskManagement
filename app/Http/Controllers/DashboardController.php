<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


class DashboardController extends Controller
{
    public function index(Request $request)
    {

    	if ($request->session()->has('id')) {
		    return view('Dashboard.dashboard');
		}else{
			return view('Authentication.login');
		}
    }
}
