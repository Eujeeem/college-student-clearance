<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageStudentAccess
{

    public function handle(Request $request, Closure $next)
    {
        $type = $request->session()->get('type');

        if($type == "admin"){
            return redirect()->route('admin');
        }        
        else if($type == "incharge"){
            return redirect()->route('incharge');
        }  
        else if($type == "assistant"){
            return redirect()->route('assistant_incharge');
        }               
        return $next($request);
    }
}
