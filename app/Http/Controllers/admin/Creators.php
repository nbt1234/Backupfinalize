<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Creators extends Controller
{
    public function index()
    {
        $result['all_info'] = DB::table(CREATORS)->get();
        return view('admin/creators/index', $result);
    }

    public function creators_page()
    {
        return view('admin/creators/add-creators');
    }

    public function content_creators_add(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        $inputs = $request->input();

        $image = time() . '_' . Str::of(md5(time() . $request->file('imgs')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('imgs')->extension();
        $image_path = $request->file('imgs')->storeAs('admin-assets/img/pages/content-creators', $image);

        $data = array(
            'title' => $inputs['name'],
            'sub_title' => $inputs['content'],
            'imgs' => $image,
            'status' => $inputs['status'],
            'created_at' => date('Y:m:d H:i:s'),
        );

        $result = DB::table(CREATORS)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/creators')->with('flash-success', 'Content Creators  added Successfully');
        } else {
            return redirect()->back()->with('flash-error', 'Error in Add  Content Creators');
        }
    }

    public function edit_creators($id)
    {
        $result = DB::table(CREATORS)->where('id', $id)->first();

        return view('admin/creators/edit-creators')->with(compact('result'));

    }

    public function update_creators(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        $inputs = $request->input();
        $image = time() . '_' . Str::of(md5(time() . $request->file('imgs')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('imgs')->extension();
        $image_path = $request->file('imgs')->storeAs('admin-assets/img/pages/content-creators', $image);

        $data = array(
            'title' => $inputs['name'],
            'sub_title' => $inputs['content'],
            'imgs' => $image,
            'status' => $inputs['status'],
            'updated_at' => date('Y-m-d H:i:s'),
        );

     
        $result = DB::table(CREATORS)->where('id',$id)->update($data);
       
        if ($result) {
            return redirect('finalize-site-admin/creators')->with('flash-success', 'Content Creators  update Successfully');
        } else {
            return redirect()->back()->with('flash-error', 'Error in Add  Content Creators');
        }
     

    }

    public function delete_creators($id = '')
    {
        $affected = DB::table(CREATORS)->where('id', '=', $id)->delete();

        if ($affected) {
            return redirect('finalize-site-admin/creators')->with('flash-success', 'content creators deleted successfully');
        } else {
            return redirect('finalize-site-admin/creators')->with('flash-error', 'Something went wrong, Please try again');
        }
    }

}
