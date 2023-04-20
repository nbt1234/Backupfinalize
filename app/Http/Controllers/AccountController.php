<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AccountController extends Controller
{
	public function index()
	{
	 	$result = DB::table(ACCOUNT_PAGE)->get();
    	return view('front/account-info')->with(compact('result'));
	}



}
