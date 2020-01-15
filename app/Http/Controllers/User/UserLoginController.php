<?php

namespace App\Http\Controllers\User;

use App\Domain\Accounts\Actions\UserLogin;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\UserResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function __invoke(UserLoginRequest $request, UserLogin $userLogin)
    {
        $user = $userLogin->execute($request->loginData());

        if ($user !== null) {
            return $this->ok(UserResource::make($user));
        }

        return $this->unauthorized();
    }
}
