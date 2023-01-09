<?php

namespace App\Http\Auth\Controllers;

use App\Http\Auth\Requests\LoginRequest;
use App\Http\Auth\Resources\SelfResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): SelfResource
    {
        $request->authenticate();

        $request->session()->regenerate();

        return SelfResource::make(
            $request->user()
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
