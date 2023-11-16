<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request):$request  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::Check()){
            if(Auth::user()->role != 3){
                return $next($request);
            }else{
                return redirect('admin')->with('msgError', 'Bạn không được cấp quyền ');
            }
        }else{
            return redirect('admin')->with('msgError', 'Bạn không được cấp quyền ');
        }
        
    }
}
