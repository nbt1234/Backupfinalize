<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Settings extends Controller
{
    public function index()
    {
        $setting['paypal'] = DB::table(SETTING)->select('*')->where('type', 'paypal')->first();
        $setting['paypal']->details = json_decode($setting['paypal']->details, true);

        // pre($setting);
        return view('admin/setting/payment', $setting);
    }
    public function update_paypal(Request $request)
    {
        $request->validate([
            'paypal_client_id' => 'required',
            'paypal_secret_id' => 'required',
        ]);
        $inputs = $request->input();

        $detail = array('paypal_client_id' => $inputs['paypal_client_id'],
            'paypal_secret_id' => $inputs['paypal_secret_id'],
        );

        $data['details'] = json_encode($detail);

        if (isset($inputs['paypal_mode'])) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        $result = DB::table(SETTING)->where('type', 'paypal')->update($data);

        if ($result) {
            return redirect('finalize-site-admin/setting')->with('flash-success', 'paypal setting updated successfully');
        } else {
            return redirect('finalize-site-admin/setting')->with('flash-error', 'No changes in paypal setting');
        }
    }
}
