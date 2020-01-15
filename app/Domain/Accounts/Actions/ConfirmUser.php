<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\Models\User;

use Carbon\Carbon;

class ConfirmUser
{
    public function execute(User $user): bool
    {
        return $user->update([
            'confirmed_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
