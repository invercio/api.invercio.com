<?php

declare(strict_types=1);

namespace App\Domain\Auth\Listeners;

use App\Domain\Auth\Models\User;
use App\Domain\Auth\Notifications\LockedOut;
use Illuminate\Auth\Events\Lockout;

class UserLockedOut
{
    public function handle(Lockout $event): void
    {
        if ($user = User::firstWhere('email', $event->request->email)) {
            $user->notify(new LockedOut);
        }
    }
}
