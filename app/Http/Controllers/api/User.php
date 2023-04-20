<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class User extends Controller
{
    public function signup_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'alpha', 'min:3', 'max:15'],
            'last_name' => ['required', 'alpha', 'min:3', 'max:15'],
            'username' => ['required', 'alpha_num', 'min:3', 'max:15', 'unique:'.USERS],
            'email' => ['required', 'email', 'unique:'.USERS],
            'password' => ['required', Password::min(6)->numbers()->mixedCase()],
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 406);
        } else {
            $inputs = $request->input();

            $key = Str::random(6);
            $key_expire = date('Y-m-d H:i:s', strtotime('+15 minutes'));

            $user_data = ['first_name' => ucfirst(strtolower($inputs['first_name'])),
                'last_name' => ucfirst(strtolower($inputs['last_name'])),
                'username' => strtolower($inputs['username']),
                'email' => $inputs['email'],
                'password' => Hash::make((trim($inputs['password']))),
                'dec_password' => trim($inputs['password']),
                'role_status' => 4,
                'forget_key' => $key,
                'expire_forget_key' => $key_expire,
                'user_block_status' => 0,
            ];

            $insert_id = DB::table(USERS)->insertGetId($user_data);

            if ($insert_id) {
                // Mail::to('trialnbt@gmail.com')->send(new UserSignupKey($user_data));
                return response(['status' => 'success', 'msg' => 'A Passcode has been sent on your email', 'data' => ['email' => $user_data['email'], 'username' => $inputs['username']]], 200);
            } else {
                return response(['status' => 'fail', 'msg' => 'Some error occured in registration'], 204);
            }
        }
    }

    public function otp_resend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 406);
        } else {
            $inputs = $request->input();

            $key = Str::random(6);
            $key_expire = date('Y-m-d H:i:s', strtotime('+15 minutes'));
            $resend_key_expire = date('Y-m-d H:i:s', strtotime('+1 minutes'));

            $user_data = ['forget_key' => $key,
                'expire_forget_key' => $key_expire,
                'resend_otp_time' => $resend_key_expire,
            ];

            $user_info = DB::table(USERS)->where('email', $inputs['email'])->first();

            if (!empty($user_info)) {
                if (strtotime($user_info->resend_otp_time) > time()) {
                    return response(['status' => 'fail', 'msg' => 'You can send new passcode after 1 minute']);
                } else {
                    $affected = DB::table(USERS)->where('email', $inputs['email'])->update($user_data);
                    $user_data['username'] = ucfirst($user_info->username);

                    if ($affected) {
                        // Mail::to('trialnbt@gmail.com')->send(new UserSignupKey($user_data));
                        return response(['status' => 'success', 'msg' => 'A new asscode has been sent on your email'], 200);
                    } else {
                        return response(['status' => 'fail', 'msg' => 'Some error occured in registration'], 204);
                    }
                }
            } else {
                return response(['status' => 'fail', 'msg' => 'No user found']);
            }
        }
    }

    public function verify_signup_key(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => ['required'],
            'email' => ['required', 'email'],
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 406);
        } else {
            $inputs = $request->input();
            // pre($inputs);

            $user_info = Users::where(['email' => $inputs['email'], 'forget_key' => $inputs['key']])->first(['ID', 'email', 'forget_key', 'expire_forget_key', 'username', 'role_status']);
            $current_time = date('Y-m-d H:i:s');

            if (!empty($user_info)) {
                if (strtotime($user_info->expire_forget_key) < strtotime($current_time)) {
                    return response(['status' => 'fail', 'msg' => 'Passcode has been expired']);
                } else {
                    $update_info = ['forget_key' => '',
                        'user_status' => 0,
                    ];
                    $affected = DB::table(USERS)->where('email', $inputs['email'])->update(['forget_key' => '', 'user_status' => 0]);

                    $session_data = ['userId' => $user_info->ID,
                        'username' => $user_info->username,
                        'email' => $user_info->email,
                        'role' => $user_info->role_status,
                        'logged_in' => true,
                        'token' => $user_info->createToken('sadsd')->plainTextToken,
                    ];

                    return response(['status' => 'success', 'data' => $session_data], 200);
                }
            } else {
                return response(['status' => 'fail', 'msg' => 'Invalid OTP']);
            }
        }
    }

    public function login_user(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = Users::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.'],
            ], 404);
        }
        // pre($user);
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
}
