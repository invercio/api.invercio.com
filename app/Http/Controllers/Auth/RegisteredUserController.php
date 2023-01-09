<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Auth\Actions\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Resources\Auth\SelfResource;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function store(RegisterUserRequest $request): SelfResource
    {
        $user = CreateUser::run(
            $request->data()
        );

        Auth::login($user);

        return SelfResource::make($user);
    }
}
