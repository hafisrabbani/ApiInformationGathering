<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuthMiddleware
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
        if(!$request->hasHeader('APP_SECREET_ACCESS') || base64_decode($request->header('APP_SECREET_ACCESS')) !== env('APP_SECREET_ACCESS')){
            return response('Access Denied', 401);
        }
        return $next($request);
    }
}
