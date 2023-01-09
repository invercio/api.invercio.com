<?php

namespace App\Http\Auth\Middleware;

use App\Http\Auth\Resources\UserResource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return UserResource::make($request->user());
            }
        }

        return $next($request);
    }
}
