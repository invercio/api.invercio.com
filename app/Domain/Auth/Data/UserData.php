<?php

declare(strict_types=1);

namespace App\Domain\Auth\Data;

readonly class UserData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
