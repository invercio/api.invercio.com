<?php

namespace App\Http\Middleware\Auth;

use App\Http\Resources\Auth\SelfResource;
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
                return SelfResource::make($request->user());
            }
        }

        return $next($request);
    }
}
