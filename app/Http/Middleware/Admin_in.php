<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_in
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $page = '')
    {
        if ($page != '' || $page != null) {
            if ($this->check_subadmin($page) == 'access-denied') {
                return redirect('access-denied');
            }
        }
        // dd($request->route()->uri);
        if ($request->session()->has('madminId')) {
            return $next($request);
        } else {
            return redirect('finalize-admin-login/login');
        }
    }
    public function check_subadmin($page_name = "")
    {
        if (session('role') == 2) {

            $user_id = session('madminId');
            $subadmin_data = DB::table(SUB_ACCESS)->where('subadmin', $user_id)->first();
            $subadmin_all_data = DB::table(USERS)->where('ID', $user_id)->first();
            if ($subadmin_all_data->user_status == 0) {
                $subadmin_info = json_decode($subadmin_data->fields, true);
                if (isset($subadmin_info) && !in_array($page_name, $subadmin_info)) {
                    return 'access-denied';
                }
            } else {
                return 'access-denied';
            }
        }
    }
    public function hello()
    {
        pre("inside hello");
    }
}
