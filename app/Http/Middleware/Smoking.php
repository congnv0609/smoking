<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Smoking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(empty($request->header('accountId'))) {
            return response()->json(['message'=>'Unauthenticate'], 401);
        }
        return $next($request);
    }
}
