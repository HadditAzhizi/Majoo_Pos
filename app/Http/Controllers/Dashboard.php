<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class Dashboard extends Controller
{ 
	public function index()
	{
		return view('dashboard/index');
	}
}
