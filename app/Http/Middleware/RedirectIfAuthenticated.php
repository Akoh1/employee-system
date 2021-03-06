<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {
        case 'regularuser':
          // code...
          if(Auth::guard($guard)->check()) {
              return redirect(route('admins.index'));
          }
          break;

        default:
          // code...
          if(Auth::guard($guard)->check()) {
              return redirect(route('home.index'));
          }
          break;
      }


        return $next($request);
    }
}
