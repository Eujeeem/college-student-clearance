<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageAdminAccess
{

    public function handle(Request $request, Closure $next)
    {
        $type = $request->session()->get('type');

        if($type == "student"){
            return redirect()->route('student');
        }
        else if($type == "incharge"){
            return redirect()->route('incharge');
        }
        return $next($request);
    }
}
