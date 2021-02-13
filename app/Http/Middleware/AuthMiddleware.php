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
        if(Auth::check()){
            $authRole = Auth::user()->role;

            if($role == 'Admin' && $authRole == 'Admin'){
                return $next($request);
            }else if($role == 'User' && $authRole == 'User'){
                return $next($request);
            }else if($authRole == 'Authenticated'){
                return $next($request);
            }
        }else if($role == 'guest'){
            return $next($request);
        }
        return back();
    }
}
