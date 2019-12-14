<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdministratorAndOrganizator
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
        if (Auth::user()->hasRole("administrator") || Auth::user()->hasRole("organizator") ) {
            return $next($request);
        }

        return redirect('/');
    }
}
