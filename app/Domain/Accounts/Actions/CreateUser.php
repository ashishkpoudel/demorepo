<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\DTO\UserData;
use App\Domain\Accounts\Models\User;

use Illuminate\Support\Facades\Hash;

class CreateUser
{
    public function execute(UserData $userData): User
    {
        $user = new User;
        $user->first_name = $userData->firstName;
        $user->last_name = $userData->lastName;
        $user->email = $userData->email;
        $user->password = Hash::make($userData->password);
        $user->phone_number = $userData->phoneNumber;
        $user->save();

        return $user;
    }
}
