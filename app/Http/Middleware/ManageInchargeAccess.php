<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageInchargeAccess
{

    public function handle(Request $request, Closure $next)
    {
        $type = $request->session()->get('type');
        
        if($type == "admin"){
            return redirect()->route('admin');
        }        
        else if($type == "student"){
            return redirect()->route('student');
        }
        else if($type == "assistant"){
            return redirect()->route('assistant_incharge');
        }          
        return $next($request);
    }
}
