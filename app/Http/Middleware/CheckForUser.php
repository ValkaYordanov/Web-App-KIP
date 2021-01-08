<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckForUser
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
        if (Auth::check() && Auth::user()->getType() == 'normal') {
            return $next($request);
        }

        abort(403);

    }
}
