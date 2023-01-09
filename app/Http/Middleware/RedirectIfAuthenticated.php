<?php

namespace App\Http\Middleware;

use App\Http\Auth\Resources\MeResource;
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
                return MeResource::make($request->user());
            }
        }

        return $next($request);
    }
}
