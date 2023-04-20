<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\;

use Illuminate\Support\Facades\DB;

class Faqs extends Controller
{
    public function index()
    {
        $result['all_info'] = DB::table(FAQ)->get();
        return view('admin/faqs/index', $result);
    }
    public function faq_page()
    {
        $result['cate'] = DB::table(CATE)->get();
        return view('admin/faqs/add-faq', $result);
    }
    public function add_faq(Request $request)
    {
        $request->validate([
            'heading' => 'required|min:5',
            'description' => 'required|min:5',
            'status' => 'required',
        ]);

        $inputs = $request->input();
        $data = [
            'heading' => $inputs['heading'],
            'content' => $inputs['description'],
            'status' => $inputs['status'],
        ];
       
        $result = DB::table(FAQ)->insert($data);

        if ($result) {
            return redirect('finalize-site-admin/faqs')->with('flash-success', 'FAQ added successfully');
        } else {
            return redirect('finalize-site-admin/faqs')->with('flash-error', 'Some error occured in adding FAQ');
        }
    }

    public function edit_faq($id = '')
    {
        $result['faq_info'] = DB::table(FAQ)->where('id', $id)->first();
        return view('admin/faqs/edit-faq', $result);
    }

    public function update_faq(Request $request, $id = '')
    {
        $request->validate([
            'heading' => 'required|min:5',
            'description' => 'required|min:5',
            'status' => 'required',
        ]);
        $inputs = $request->input();
        $data = ['heading' => $inputs['heading'],
            'content' => $inputs['description'],
            'status' => $inputs['status'],
        ];

        $affected = DB::table(FAQ)->where('id', $id)->update($data);

        if ($affected) {
            return redirect('finalize-site-admin/faqs')->with('flash-success', 'FAQ updated successfully');
        } else {
            return redirect('finalize-site-admin/faq-edit/'.$id)->with('flash-error', 'No changed occured');
        }
    }

    public function faq_status_change(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(FAQ)
            ->where('id', $request->input('id'))
            ->update(['status' => $status_val]);

        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function delete_faq($id = '')
    {
        $affected = DB::table(FAQ)->where('id', '=', $id)->delete();

        if ($affected) {
            return redirect('finalize-site-admin/faqs')->with('flash-success', 'FAQ deleted successfully');
        } else {
            return redirect('finalize-site-admin/faqs')->with('flash-error', 'Something went wrong, Please try again');
        }
    }
}
