<?php

namespace App\Domain\Accounts\Actions;

use App\Domain\Accounts\DTO\UserLoginData;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class UserLogin
{
    public function execute(UserLoginData $userLoginData): ?Authenticatable
    {
        $attempt = Auth::attempt([
            'email' => $userLoginData->email,
            'password' => $userLoginData->password
        ]);

        if ($attempt === true) {
            $user = Auth::user();
            $user->generateApiToken();
            return $user;
        }

        return null;
    }
}
