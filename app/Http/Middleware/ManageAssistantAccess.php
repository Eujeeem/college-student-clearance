<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageAssistantAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $type = $request->session()->get('type');
        
        if($type == "admin"){
            return redirect()->route('admin');
        }        
        else if($type == "student"){
            return redirect()->route('student');
        }
        else if($type == "incharge"){
            return redirect()->route('assistant_incharge');
        }    
        return $next($request);
    }
}
