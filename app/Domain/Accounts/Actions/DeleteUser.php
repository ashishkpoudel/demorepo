<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\Models\User;

class DeleteUser
{
    public function execute(User $user): bool
    {
        return $user->delete();
    }
}
