<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class Ven_login extends Controller
{
    use Common_trait;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function check_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $inputs = $request->input();
        $data = array(
            'email' => $inputs['email'],
            'password' => $inputs['password'],
        );

        $result = $this->users->vendor_login_verify($data);

        if ($result == 'email') {
            $request->session()->flash('flash-error', 'Invalid email');
            return back()->withInput();
        } elseif ($result == 'password') {
            $request->session()->flash('flash-error', 'Invalid password');
            return back()->withInput();
        } else {
            $request->session()->put($result);
            return redirect('vendor/dashboard');
        }
    }

    public function check_signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:' . VENDORS,
            'email' => 'required|email|unique:' . VENDORS,
            'password' => ['required', 'confirmed', Password::min(6)->numbers()],
            'password_confirmation' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png',
            'terms' => 'required',
        ]);

        $inputs = $request->input();

        $img_name = time() . '-' . Str::of(md5(time() . $request->file('img')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('img')->extension();

        $path = $request->file('img')->storeAs('vendor-assets/img/avatar', $img_name);
        $slug = $this->create_unique_slug($inputs['username'], VENDORS, 'ven_slug');

        $data = array(
            'name' => $inputs['name'],
            'username' => $inputs['username'],
            'email' => $inputs['email'],
            'avatar' => $img_name,
            'vendor_status' => 1,
            'login_type' => 'email',
            'password' => Hash::make(trim($inputs['password'])),
            'dec_password' => trim($inputs['password']),
            'ven_slug' => $slug,
            'role_status' => 3,
        );

        $result = DB::table(VENDORS)->insert($data);
        if ($result) {

            $data = array(
                'email' => trim($inputs['email']),
                'password' => trim($inputs['password']),
            );

            $result = $this->users->vendor_login_verify($data);

            $request->session()->put($result);
            return redirect('vendor/dashboard');
        } else {
            $request->session()->flash('flash-error', 'An Error occured');
            return back()->withInput();
        }
    }

    // public function social_login(Request $request)
    // {
    //     $inputs = $request->input();
    //     $slug = $this->create_unique_slug($inputs['username'], VENDORS, 'ven_slug');
    //     $ven_data = array(
    //         'email' => $inputs['email'],
    //         'ven_slug' => $slug,
    //         'name' => $inputs['name'],
    //         'username' => $inputs['username'],
    //         'avatar' => $inputs['img'],
    //         'google_id' => $inputs['id'],
    //         'vendor_status' => 1,
    //         'login_type' => 'google',
    //         'role_status' => 3,
    //     );

    //     $ven_info = DB::table(VENDORS)->where('email', $ven_data['email'])->first();
    //     if (!empty($ven_info)) {
    //         $session_array = array(
    //             'mvenId' => $ven_info->ven_id,
    //             'ven_email' => $ven_info->email,
    //             'ven_role' => $ven_info->role_status,
    //             'ven_loggedIn' => true,
    //         );
    //         $request->session()->put($session_array);
    //         echo "success";
    //     } else {
    //         $ven_result = DB::table(VENDORS)->insertGetID($ven_data);
    //         $session_array = array(
    //             'mvenId' => $ven_result,
    //             'ven_email' => $ven_data['email'],
    //             'ven_role' => 3,
    //             'ven_loggedIn' => true,
    //         );
    //         $request->session()->put($session_array);
    //         echo "success";
    //     }
    // }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleLogin(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $slug = $this->create_unique_slug($user->getName(), VENDORS, 'ven_slug');
        $ven_data = array(
            'email' => $user->email,
            'ven_slug' => $slug,
            'name' => $user->getName(),
            'username' => $user->getName(),
            'avatar' => $user->getAvatar(),
            'google_id' => $user->getId(),
            'vendor_status' => 1,
            'login_type' => 'google',
            'role_status' => 3,
        );

        $ven_info = DB::table(VENDORS)->where('email', $user->email)->first();
        if (!empty($ven_info)) {
            $session_array = array(
                'mvenId' => $ven_info->ven_id,
                'ven_email' => $ven_info->email,
                'ven_role' => $ven_info->role_status,
                'ven_loggedIn' => true,
            );
            $request->session()->put($session_array);
            return redirect('vendor/dashboard');
        } else {
            $ven_result = DB::table(VENDORS)->insertGetID($ven_data);
            $session_array = array(
                'mvenId' => $ven_result,
                'ven_email' => $user->email,
                'ven_role' => 3,
                'ven_loggedIn' => true,
            );
            $request->session()->put($session_array);
            return redirect('vendor/dashboard');
        }
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookLogin(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        $slug = $this->create_unique_slug($user->getName(), VENDORS, 'ven_slug');
        $ven_data = array(
            'email' => $user->getEmail(),
            'ven_slug' => $slug,
            'name' => $user->getName(),
            'username' => $user->getName(),
            'avatar' => $user->getAvatar(),
            'fb_id' => $user->getId(),
            'vendor_status' => 1,
            'login_type' => 'fb',
            'role_status' => 3,
        );

        $ven_info = DB::table(VENDORS)->where('email', $user->getEmail())->first();
        if (!empty($ven_info)) {
            $session_array = array(
                'mvenId' => $ven_info->ven_id,
                'ven_email' => $ven_info->email,
                'ven_role' => $ven_info->role_status,
                'ven_loggedIn' => true,
            );
            $request->session()->put($session_array);
            return redirect('vendor/dashboard');
        } else {
            $ven_result = DB::table(VENDORS)->insertGetID($ven_data);
            $session_array = array(
                'mvenId' => $ven_result,
                'ven_email' => $user->getEmail(),
                'ven_role' => 3,
                'ven_loggedIn' => true,
            );
            $request->session()->put($session_array);
            return redirect('vendor/dashboard');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('vendor/dashboard');
    }

    public function forget_password_insert(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $key = Str::random(6);

        $key_expire = date("Y-m-d H:i:s", strtotime("+30 minutes"));

        $result = $this->users->vendor_forget_password($request->input('email'), $key, $key_expire);
        if ($result) {
            if ($result == 'email') {
                $request->session()->flash('flash-error', 'Email not found');
                return redirect('vendor/forget-password');
            } else {
                $request->session()->put($result);
                $request->session()->flash('flash-success', 'A recovery key is sent on your email');
                return redirect('vendor/forget-key');
            }
        } else {
            $request->session()->flash('flash-error', 'Some error occured in recoving password');
            return redirect('vendor/forget-password');
        }
    }

    public function forget_key_verify(Request $request)
    {
        $request->validate([
            'key' => 'required',
        ]);
        $email = $request->session()->get('forget_email');
        $where = array(
            'email' => $email,
            'forget_key' => $request->input('key'),
        );

        $aaaa = date("Y-m-d H:i:s");

        $user_info = DB::table(VENDORS)->where($where)->first();

        if (!empty($user_info)) {
            if (strtotime($user_info->expire_forget_key) < strtotime(date("Y-m-d H:i:s"))) {
                $request->session()->flash('flash-error', 'Your key is expired');
                return redirect('vendor/forget-key');
            } else {
                $request->session()->put(array('email' => $email));
                $request->session()->flash('flash-success', 'Enter new password');
                return redirect('vendor/recover-password');
            }
        } else {
            $request->session()->flash('flash-error', 'Wrong key');
            return redirect('vendor/forget-key');
        }
    }

    public function save_recover_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(6)->numbers()],
            'password_confirmation' => 'required',
        ]);
        $email = $request->session()->get('forget_email');

        $password = array(
            'password' => Hash::make(trim($request->input('password'))),
            'dec_password' => trim($request->input('password')),
        );

        $affected = DB::table(VENDORS)
            ->where('email', $email)
            ->update($password);

        if ($affected) {
            $request->session()->flush();
            $request->session()->flash('flash-success', 'Your password has changed');
            return redirect('vendor/login');
        } else {
            $request->session()->flash('flash-error', 'Some error occured in updating password');
            return redirect('vendor/recover-password');
        }
    }

}
