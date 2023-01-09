<?php

declare(strict_types=1);

namespace App\Domain\Auth\Actions;

use App\Domain\Auth\Data\UserData;
use App\Domain\Auth\Models\User;
use Hash;
use Illuminate\Auth\Events\Registered;

class CreateUser
{
    public static function run(UserData $data)
    {
        return app(static::class)->execute($data);
    }

    public function execute(UserData $data)
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        event(new Registered($user));

        return $user;
    }
}
