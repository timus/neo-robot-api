<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->role!=='admin') {
            return response()->json(['error' => 'sorry mechanics dont have this right.'], 401);
        }

        return $next($request);
    }
}
