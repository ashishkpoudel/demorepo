<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\Models\{User, Role};

class AssignRoleToUser
{
    public function execute(User $user, Role $role): bool
    {
        if (!$user->ofRole($role->slug)->count()) {
            $user->roles()->attach($role);
            return true;
        }

        return false;
    }
}
