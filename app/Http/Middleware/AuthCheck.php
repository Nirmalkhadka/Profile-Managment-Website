<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('loginId')){
            
            $request->session()->flash('LoginFirst','!!!You Have To Login First!!!');
            return redirect('login');
            // return back();
        }else{
            
            return $next($request);
        }
        
    }
}
