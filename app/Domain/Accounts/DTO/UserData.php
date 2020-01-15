<?php

namespace App\Domain\Accounts\DTO;

use App\Domain\Accounts\Enums\UserRole;

use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var string */
    public $email;

    /** @var string */
    public $phoneNumber;

    /** @var string */
    public $password;

    /** @var UserRole */
    public $role;

    /** @var BankAccountData */
    public $bankAccount;
}
