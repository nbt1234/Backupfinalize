<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Models\;

class Vendors extends Controller
{
    public function index()
    {
        $result['all_info'] = DB::table(VENDORS)->get();
        // pre($result);
        return view('admin/vendors/index', $result);
    }

    public function vendor_status_change(Request $request)
    {
        if ($request->input('status') == 'active') {
            $status_val = 0;
        }
        if ($request->input('status') == 'inactive') {
            $status_val = 1;
        }

        $affected = DB::table(VENDORS)
            ->where('ven_id', $request->input('id'))
            ->update(['vendor_status' => $status_val,'vendor_block_status'=>$status_val]);

        if ($affected) {
            echo 'success';
        } else {
            echo 'error';
        }
    }


}
