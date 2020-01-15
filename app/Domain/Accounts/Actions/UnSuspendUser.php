<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\Models\User;

class UnSuspendUser
{
    public function execute(User $user): bool
    {
        return $user->update(['suspended_at' => null]);
    }
}
