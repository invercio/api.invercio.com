<?php

declare(strict_types=1);

use App\Domain\Auth\Models\User;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\postJson;

it('should authenticate the user', function () {
    $user = User::factory()->create();

    $json = postJson(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertOk()->json();

    expect($json)
        ->name->toBe($user->name)
        ->email->toBe($user->email);

    assertAuthenticated();
});

it('should not authenticate user when providing a wrong password', function (string $password) {
    $user = User::factory()->create();

    postJson(route('login'), [
        'email' => $user->email,
        'password' => $password,
    ]);

    assertGuest();
})->with([
    'pwd',
    'passwrd',
    'wrong-password',
]);
