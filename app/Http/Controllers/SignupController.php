<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use App\Models\;

class SignupController extends Controller
{
    public function index()
    {
        return view('front/sign-up');
    }

    public function sign_up(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:fnz_signup',
            'address' => 'required',
            'password' => 'required',
            'phone' => 'required|unique:fnz_signup|digits:10',
            'checkbox' => 'required'
        ]);

        $inputs = $request->input();

        $data = array(
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'address' => $inputs['address'],
            'password' => Hash::make($inputs['password']),
            'phone' => $inputs['phone'],

        );

            DB::table(SIGNUP)->insert($data);
            return back()->with('flash-success', 'registration successfully');

    }


      public function sign_out(Request $request)
    {
        $request->session()->forget('userId');
        return redirect('/home');
    }


}
