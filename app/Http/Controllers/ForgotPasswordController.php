<?php

namespace App\Http\Controllers;

// use App\Models\;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('front/forgot-password');

    }

    public function reset_password(Request $request)
    {

        $request->validate([
            'username' => 'required'
        ]);

        $inputs = $request->input();
        $otp = random_int(1000, 9999);

        $data = array(
            'email' => $inputs['username'],
            'otp' => $otp,
            'created_at' => date('Y-m-d H:i:s'),
        );

        Mail::to($data['email'])->send(new \App\Mail\ForgotPassword($otp));

        $data = DB::table(SIGNUP)->where('email', $data['email'])->update(['otp' => $data['otp'], 'created_at' => $data['created_at']]);

        if (empty($data)) {
            return back()->with('flash-error', 'please check your mail ');
        } else {
            $request->session()->flash('flash-success', 'send mail successfully');
            return redirect('password-reset-form');
        }
    }

    public function new_password(Request $request)
    {

        $request->validate([
            'otp' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $inputs = $request->input();

        $data = array(
            'otp' => $inputs['otp'],
            'password' => Hash::make($inputs['password']),
        );

        $value = DB::table(SIGNUP)->where('otp', $data['otp'])->get();

        $key_expire = date("Y-m-d H:i:s", strtotime("+1 minutes"));
        if (strtotime($value[0]->created_at) > strtotime($key_expire)) {

            DB::table(SIGNUP)->where('otp', $data['otp'])->update(['otp' => 0]);
            return back()->with('flash-error', ' OTP  Expired !');
        }

        $result = DB::table(SIGNUP)->where('otp', $data['otp'])->update(['password' => $data['password']]);
        DB::table(SIGNUP)->where('otp', $data['otp'])->update(['otp' => 0]);

        if ($result) {
            return redirect('/signin')->with('flash-success', 'Password Update successfully !');
        } else {
            return back()->with('flash-error', 'Invalid otp !');
        }

    }

}
