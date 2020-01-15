<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMeta extends Model
{
    use SoftDeletes;

    const TABLE = 'user_metas';

    protected $table = self::TABLE;

    protected $guarded = [
        'id'
    ];
}
