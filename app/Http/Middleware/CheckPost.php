<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPost
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
        if($request->isMethod('post')){
            return $next($request);
        }else{
            return response(['status'=>'error','msg'=>'Method not allowed'], 405);
        }
    }
}
