<?php

namespace App\Domain\Accounts\Models;

<<<<<<< HEAD
use App\Domain\Accounts\Enums\UserRole;
use App\Domain\Core\Traits\HasMeta;
use App\Domain\Accounts\QueryBuilders\UserBuilder;

use Illuminate\Database\Eloquent\SoftDeletes;
=======
use App\Domain\Accounts\QueryBuilders\UserBuilder;

>>>>>>> initial
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasMeta;

    use Notifiable, SoftDeletes;
=======
    use Notifiable;
>>>>>>> initial

    const TABLE = 'users';

    protected $table = self::TABLE;

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'api_token', 'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

<<<<<<< HEAD
    public function getFullNameAttribute()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    public function isSuspended()
    {
        return $this->suspended_at !== null;
    }

    public function isAdmin()
    {
        return $this->ofRole(UserRole::ADMIN())->exists();
    }

=======
>>>>>>> initial
    public function generateConfirmationCode()
    {
        $this->update(['confirmation_code' => Str::random(5)]);
    }

    public function generateApiToken()
    {
        $this->update(['api_token' => hash('sha256', Str::random(60))]);
    }

    public function revokeApiToken()
    {
        $this->update(['api_token' => null]);
    }

<<<<<<< HEAD
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

=======
>>>>>>> initial
    /**
     * @return Builder|UserBuilder
     */
    public static function query()
    {
        return parent::query();
    }

    public function newEloquentBuilder($query)
    {
        return new UserBuilder($query);
    }
}
