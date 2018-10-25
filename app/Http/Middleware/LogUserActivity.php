<?php

namespace App\Http\Middleware;
use Carbon\Carbon;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Cache;

use Closure;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('students')->check()){
            $expiresAt=Carbon::now()->addMinutes(4);
            Cache::put('user-online-'.Auth::guard('students')->user()->id,true,$expiresAt);
        }
        return $next($request);
    }
}
