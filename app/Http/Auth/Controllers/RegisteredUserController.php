<?php

namespace App\Http\Auth\Controllers;

use App\Domain\Auth\Actions\CreateUser;
use App\Domain\Auth\Data\UserData;
use App\Http\Auth\Resources\SelfResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function store(UserData $data): SelfResource
    {
        $user = CreateUser::run($data);
        Auth::login($user);

        return SelfResource::make($user);
    }
}
