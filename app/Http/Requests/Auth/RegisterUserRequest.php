<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Domain\Auth\Data\UserData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
    public function data(): UserData
    {
        return new UserData(...$this->validated());
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ];
    }
}
