<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FaqController extends Controller
{
	public function index()
	{
	   $result = DB::table(FAQ)->get();
	  	return view('front/faq')->with(compact('result'));
	}


}
