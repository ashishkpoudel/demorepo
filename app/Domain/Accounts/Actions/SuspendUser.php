<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\Models\User;

use Carbon\Carbon;

class SuspendUser
{
    public function execute(User $user): bool
    {
        return $user->update(['suspended_at' => Carbon::now()->toDateTimeString()]);
    }
}
