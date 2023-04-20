<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Models\;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PaymentHistory extends Controller
{
	public function index()
	{
	   $result = DB::table(PAYMENT)->orderBy('id', 'DESC')->get();
	   return view('admin/payment/index')->with(compact('result'));
	}




}
