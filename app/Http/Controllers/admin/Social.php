<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Social extends Controller
{
    public function index()
    {
        $result = DB::table(SOCIAL_USER)->get();
        return view('admin/pages/social-user')->with(compact('result'));

    }

    public function editSocialUser(Request $request)
    {
        $request->validate([
            'facebook_url' => 'required',
            'twitter_url' => 'required',
            'linkedin_url' => 'required',
            'instagram_url' => 'required',
            'telegram_url' => 'required',
            'status' => 'required'
        ]);

        $inputs = $request->input();
 
        $data = array(
            'facebook_url' => $inputs['facebook_url'],
            'twitter_url' => $inputs['twitter_url'],
            'linkedin_url' => $inputs['linkedin_url'],
            'instagram_url' => $inputs['instagram_url'],
            'telegram_url' => $inputs['telegram_url'],
            'status' => $inputs['status']
        );
        
        $result = DB::table(SOCIAL_USER)->update($data);
       
     if ($result) {
            return redirect('finalize-site-admin/pages')->with('flash-success', 'social User  Edit Successfully');
        } else {
            return redirect()->back()->with('flash-error', 'Error in Add  Social User');
        }

    }
}