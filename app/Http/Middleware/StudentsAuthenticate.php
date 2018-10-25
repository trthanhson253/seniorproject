<?php

namespace App\Http\Middleware;

use Closure;

class StudentsAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="students")
    {
        if(!Auth::guard($guard)->check()){
            return redirect('login');
        }
        return $next($request);
    }
}
