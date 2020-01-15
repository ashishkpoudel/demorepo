<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\DTO\UserData;
use App\Domain\Accounts\Models\User;

class UpdateUser
{
    public function execute(User $user, UserData $userData): User
    {
        $user->first_name = $userData->firstName;
        $user->last_name = $userData->lastName;
        $user->email = $userData->email;
        $user->phone_number = $userData->phoneNumber;
        $user->save();

        return $user;
    }
}
