<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /*if (Auth::guard($guard)->check()) {
            return redirect('/mobility');
        }*/
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->hasRole("student")) {
                return redirect('/profil');
            } else if (Auth::user()->hasRole("organizator")) {
                return redirect('/dashboard');
            } else if (Auth::user()->hasRole("administrator")) {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
