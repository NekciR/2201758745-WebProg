<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // dd($role);
        // dd(Auth::check());
        if(Auth::check()){
            $authRole = Auth::user()->role;

            if($role == 'Admin' && $authRole == 'Admin'){
                return $next($request);
            }else if($role == 'User' && $authRole == 'User'){
                return $next($request);
            }else if($role == 'Auth'){
                return $next($request);
            }
        }else if($role == 'Guest'){
            return $next($request);
        }

        return back();
    }
}
