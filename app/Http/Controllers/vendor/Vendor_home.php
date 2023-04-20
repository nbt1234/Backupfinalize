<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Vendor_home extends Controller
{
    use Common_trait;

    public function index()
    {
        if (!session('mvenId')) {
            return redirect('vendor/login');
        }
        return view('vendor/dashboard');

    }
    public function edit()
    {
        if (!session('mvenId')) {
            return redirect('vendor/login');
        }
        $id = session('mvenId');
        $result['vendor_info'] = DB::table(VENDORS)->where(array('role_status' => 3, 'ven_id' => $id))->first();

        return view('vendor/profile/show', $result);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'bio' => 'required|max:500',
            'avatar' => 'mimes:jpg,jpeg,png',
            'email' => 'required|email|unique:' . VENDORS . ',email,' . session('mvenId') . ',ven_id',
            'username' => 'required|min:3|max:50|unique:' . VENDORS . ',username,' . session('mvenId') . ',ven_id',
            'mobile' => 'required|numeric',
        ], [
            'bio.max' => 'please remove some content',
        ]);
        $inputs = $request->input();
        $slug = $this->create_unique_slug($inputs['username'], VENDORS, 'ven_slug');
        $id = session('mvenId');

        if ($request->file('avatar') != '') {
            $avatar = time() . '-' . Str::of(md5(time() . $request->file('avatar')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('avatar')->extension();
            $request->file('avatar')->storeAs('vendor-assets/img/avatar', $avatar);

            $result = DB::table(VENDORS)->select('avatar', 'login_type')->where('ven_id', $id)->first();
            if ($result->avatar != '' && $result->login_type == 'email') {
                unlink('public/vendor-assets/img/avatar/' . $result->avatar);
            }
        }

        $data = array(
            'name' => ucfirst($inputs['name']),
            'username' => $inputs['username'],
            'email' => $inputs['email'],
            'ven_slug' => $slug,
            'bio' => $inputs['bio'],
            'mobile' => $inputs['mobile'],
        );
        isset($avatar) ? $data['avatar'] = $avatar : null;
        $result = DB::table(VENDORS)->where('ven_id', $id)->update($data);
        if ($result) {
            session(['ven_email' => $inputs['email']]);
            return redirect('vendor/edit-profile')->with('flash-success', 'Profile Update Successfully');
        } else {
            return redirect('vendor/edit-profile')->with('flash-error', 'No changed occured');
        }
    }
}
