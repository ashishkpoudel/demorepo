<?php

namespace App\Domain\Accounts\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserLoginData extends DataTransferObject
{
    /** @var string */
    public $email;

    /** @var string */
    public $password;
}
