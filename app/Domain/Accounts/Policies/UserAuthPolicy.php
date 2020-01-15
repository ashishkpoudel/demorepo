<?php

namespace App\Domain\Accounts\Policies;

<<<<<<< HEAD
use App\Domain\Accounts\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserAuthPolicy
{
    use HandlesAuthorization;

    const CREATE = 'create';
    const UPDATE = 'update';
    const VIEW = 'view';
    const DELETE = 'delete';
    const SUSPEND = 'suspend';
    const UNSUSPEND = 'unsuspend';

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id || $user->isAdmin();
    }

    public function view(User $user)
    {
        return $user->isAdmin();
    }

    public function delete(User $user)
    {
        return $user->isAdmin();
    }

    public function suspend(User $user)
    {
        return $user->isAdmin();
    }

    public function unsuspend(User $user)
    {
        return $user->isAdmin();
    }
=======
class UserAuthPolicy
{

>>>>>>> initial
}
