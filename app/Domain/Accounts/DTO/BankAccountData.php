<?php

namespace App\Domain\Accounts\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class BankAccountData extends DataTransferObject
{
    /** @var string */
    public $bankName;

    /** @var string */
    public $accountNumber;
}
