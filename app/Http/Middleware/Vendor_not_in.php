<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Vendor_not_in
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
        if (!$request->session()->has('mvenId')) {
            return $next($request);
        }else{
            return redirect('vendor/dashboard');
        }
    }
}
