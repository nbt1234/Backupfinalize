<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Subadmin extends Controller
{
    use Common_trait;

    public function index()
    {
        $result['subadmin'] = DB::table(USERS)->where('role_status', 2)->select('*')->get();
        return view('admin/subadmin/index', $result);

    }

    public function add_subadmin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|max:15',
            'mobile' => 'required|numeric',
            'status' => 'required',
            'avatar' => 'required|mimes:jpg,jpeg,png',
        ],
            [
                'content.min' => 'Add more content',
            ]);

        $inputs = $request->input();
        if ($_FILES['avatar']['name'] != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $request->file('avatar')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('avatar')->extension();
            $path = $request->file('avatar')->storeAs('admin-assets/img/avatar/', $img_name);
        }
        $data = array(
            'username' => $inputs['username'],
            'email' => $inputs['email'],
            'mobile' => trim($inputs['mobile']),
            'password' => Hash::make(trim($inputs['password'])),
            'dec_password' => $inputs['password'],
            'avatar' => $img_name,
            'role_status' => 2,
            'user_status' => $inputs['status'],
        );
        $result = DB::table(USERS)->insertGetId($data);
        DB::table(SUB_ACCESS)->insert(array('subadmin' => $result, 'created_by' => session('madminId'), 'fields' => '{}'));

        if ($result) {
            return redirect('finalize-site-admin/subadmin')->with('flash-success', 'Subadmin added successfully');
        } else {
            return redirect('finalize-site-admin/subadmin-page')->with('flash-error', 'Some error occured in adding subadmin');
        }
    }
    public function subadmin_access_ctrl($id = '')
    {
        $result['subadmin_data'] = DB::table(SUB_ACCESS)->where('subadmin', $id)->first();
        $result['id'] = $id;
        return view('admin/subadmin/subadmin_access', $result);
    }
    public function insert_subadmin_access(Request $request, $id = '')
    {

        $user_id = session('madminId');
        $inputs = $request->input();

        $subadmin_data = DB::table(SUB_ACCESS)->where('subadmin', $id)->get();

        if (!isset($inputs['fields'])) {
            $field_data = '{}';
        } else {
            $field_data = json_encode($inputs['fields'], JSON_FORCE_OBJECT);
        }

        $data = array(
            'subadmin' => $id,
            'fields' => $field_data,
            'created_by' => $user_id,
        );
        if (count($subadmin_data) > 0) {
            $result = DB::table(SUB_ACCESS)->where('subadmin', $id)->update($data);
        } else {
            $result = DB::table(SUB_ACCESS)->insert($data);
        }

        if ($result) {
            return redirect('finalize-site-admin/subadmin')->with('flash-success', 'Subadmin added successfully');
        } else {
            return redirect('finalize-site-admin/subadmin-access/' . $id)->with('flash-error', 'No changes occured');
        }
    }
    public function subadmin_status_change(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(USERS)
            ->where('ID', $request->input('id'))
            ->update(['user_status' => $status_val]);

        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
