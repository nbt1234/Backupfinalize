<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

use App\Models\Users;

use Illuminate\Support\Facades\DB;


class Login extends Controller
{
	public function __construct(){
		$this->users = new Users();
	}

	public function check_login(Request $request)
	{
		$request->validate([
			'email'=> 'required|email',
			'password'=> 'required'
		]);


		$inputs = $request->input();
		$data = array('email' => $inputs['email'], 
			'password' => $inputs['password'],
		);
		
		$result = $this->users->admin_login_verify($data); 

		if($result == 'email'){
			$request->session()->flash('flash-error', 'Invalid email');
			return back()->withInput();

		}elseif($result == 'password'){
			$request->session()->flash('flash-error', 'Invalid password');
			return back()->withInput();
		}else{
			$request->session()->put($result);
			return redirect('finalize-site-admin/dashboard');
		}
	}

	public function logout(Request $request)
	{
		$request->session()->flush();
		return redirect('finalize-admin-login/login');
	}

	public function forget_password_insert(Request $request)
	{
		$request->validate([
			'email'=>'required|email'
		]);
		$key = Str::random(6);

		$key_expire = date("Y-m-d H:i:s", strtotime("+15 minutes"));

		$result = $this->users->forget_password($request->input('email'),$key,$key_expire);

		if ($result) {
			if ($result == 'email') {
				$request->session()->flash('flash-error','Email not found');
				return redirect('finalize-admin-login/forget-password');
			}else{
				$request->session()->put($result);
				$request->session()->flash('flash-success','A recovery key is sent on your email');
				return redirect('finalize-admin-login/forget-key');
			}
		} else {
			$request->session()->flash('flash-error','Some error occured in recoving password');
			return redirect('finalize-admin-login/forget-password');
		}
	}

	public function forget_key_verify(Request $request)
	{
		$request->validate([
			'key'=>'required'
		]);
		$email = $request->session()->get('forget_email');
		$where = array('email' => $email,
			'forget_key'=>$request->input('key')
		);

		$aaaa = date("Y-m-d H:i:s");

		$user_info = DB::table(USERS)->where($where)->first();

		if (!empty($user_info)) {
			if (strtotime($user_info->expire_forget_key) < strtotime(date("Y-m-d H:i:s"))) {
				$request->session()->flash('flash-error','Your key is expired');
				return redirect('finalize-admin-login/forget-key');
			}else{
				$request->session()->put(array('email' => $email));
				$request->session()->flash('flash-success','Enter new password');
				return redirect('finalize-admin-login/recover-password');
			}
		} else {
			$request->session()->flash('flash-error','Wrong key');
			return redirect('finalize-admin-login/forget-key');
		}
	}

	public function save_recover_password(Request $request)
	{
		$request->validate([
			'password' => ['required','confirmed', Password::min(6)->numbers()],
			'password_confirmation'=>'required'
		]);
		$email = $request->session()->get('forget_email');


		$password = array('password' => Hash::make(trim($request->input('password'))),
			'dec_password' => trim($request->input('password'))
		);

		$affected = DB::table(USERS)
		->where('email', $email)
		->update($password);

		if ($affected) {
			$request->session()->flush();
			$request->session()->flash('flash-success','Your password has changed');
			return redirect('finalize-admin-login/login');
		} else {
			$request->session()->flash('flash-error','Some error occured in updating password');
			return redirect('finalize-admin-login/recover-password');
		}
	}






}
