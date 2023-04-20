<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

// use App\Models\;

class SigninController extends Controller
{
    public function index()
    {

        return view('front/sign-in');
    }

    public function sign_in(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $inputs = $request->input();

        $data = array(
            'email' => $inputs['username'],
            'password' => $inputs['password']

        );
        $result = DB::table(SIGNUP)->where('email', $data['email'])->first();
        if (!empty($result)) {
            if (Hash::check($data['password'], $result->password)) {
            $sessionLogin = array (
                            'userId' => $result->id,
                            'email'  => $result->email,
                            'loggedIn' => true
                           );

               Session::put($sessionLogin);
                return redirect('/home');
            } else {
                return back()->with('flash-error', 'Plz Check Your Password !');
            }
        } else {
            return back()->with('flash-error', 'Plz Check Your Email !');
        }

    }

}
