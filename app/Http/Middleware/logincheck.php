<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincheck
{

    public function handle(Request $request, Closure $next)
    {
        $type = $request->session()->get('type');
        if(Auth::check() && $type == "admin" ){
            return redirect()->route('admin');
        }
        else if (Auth::check() && $type == "student"){
            return redirect()->route('student');
        }
        else if (Auth::check() && $type == "incharge"){
            return redirect()->route('incharge');
        }
        return $next($request);
    }
}
