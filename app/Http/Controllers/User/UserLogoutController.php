<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class UserLogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();

        return $this->noContent();
    }
}
