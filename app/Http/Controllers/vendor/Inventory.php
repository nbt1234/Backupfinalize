<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Models\;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Inventory extends Controller
{
	public function index()
	{
        $products = DB::table(PROD)->where('vendor_id', session('mvenId'))->get();
		foreach($products as $product):
			dd($products);
		endforeach;
    	$inventory = DB::table(INVEN)->get();
    	$result['all_info'] = DB::table(INVEN)->get();
        return view('vendor/products/index', $result);
	}

	public function add_(Request $request)
	{
		$request->validate([
			'name'=> 'required|min:4|max:20|unique:table_name',
			'img'=> 'required|mimes:jpg,jpeg,png',
			'status'=> 'required'
		]);

		$inputs = $request->input();
	}


}
