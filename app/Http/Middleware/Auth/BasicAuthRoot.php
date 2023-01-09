<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;

class BasicAuthRoot
{
    public function handle(Request $request, Closure $next)
    {
        $authenticationHasPassed = false;
        if ($request->header('PHP_AUTH_USER') && $request->header('PHP_AUTH_PW')) {
            $username = $request->header('PHP_AUTH_USER');
            $password = $request->header('PHP_AUTH_PW');

            if ($username === config('auth.basic-auth.username') && $password === config('auth.basic-auth.password')) {
                $authenticationHasPassed = true;
            }
        }

        if (! $authenticationHasPassed) {
            return response()->make('Invalid credentials.', 401, ['WWW-Authenticate' => 'Basic']);
        }

        return $next($request);
    }
}
