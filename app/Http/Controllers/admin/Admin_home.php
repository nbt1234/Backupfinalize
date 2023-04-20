<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin_home extends Controller
{
	public function index()
	{
		if(!session('madminId')){
			return redirect('finalize-admin-login/login');
		}
		return view('admin/dashboard');

	}
}
