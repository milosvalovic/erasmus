<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsOrganizator
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
        if (Auth::user()->hasRole("organisator")) {
            return $next($request);
        }

        return redirect('/');
    }
}
