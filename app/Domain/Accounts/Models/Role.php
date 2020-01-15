<?php

namespace App\Domain\Accounts\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const TABLE = 'roles';

    protected $table = self::TABLE;

    protected $guarded = [
        'id'
    ];
}
