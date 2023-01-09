<?php

declare(strict_types=1);

namespace App\Domain\Auth\Data;

use Spatie\LaravelData\Data;

class PasswordResetData extends Data
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly string $token,
    ) {
    }
}
