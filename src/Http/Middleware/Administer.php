<?php

namespace Administer\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Administer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $method = null)
    {
        if (is_null($method) && ! $request->user()->administer) {
            return redirect('/');
        }

        if ($method == 'guest' && Auth::check()) {
            return redirect(route('administer.dashboard'));
        }

        if ($method == 'auth' && ! Auth::check()) {
            if (! $request->user()->administer) {
                return redirect('/');
            }

            return redirect(route('administer.login'));
        }

        return $next($request);
    }
}
