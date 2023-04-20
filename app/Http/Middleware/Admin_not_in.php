<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin_not_in
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('madminId')) {
            return $next($request);
        }else{
            return redirect('finalize-site-admin/dashboard');
        }
    }
    
}
