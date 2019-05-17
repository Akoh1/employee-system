<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
          return response()->json(['error' => 'unauthenticated.'], 401);
            // return route('login');
        }

        // $guard = array_get($this->auth->guards(), 0);
        //
        // switch ($guard) {
        //   case 'regularuser':
        //     // code...
        //     $login = 'regular.login';
        //     break;
        //
        //   default:
        //     // code...
        //     $login = 'login';
        //     break;
        // }

        return redirect(route('login'));
    }
}
