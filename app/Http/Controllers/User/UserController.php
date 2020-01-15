<?php

namespace App\Http\Controllers\User;

use App\Domain\Accounts\Models\User;
use App\Domain\Accounts\Actions\{CreateUser, UpdateUser, DeleteUser, SuspendUser, UnSuspendUser};
use App\Domain\Accounts\Policies\UserAuthPolicy;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Filters\UserFilter;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getAll(UserFilter $userFilter)
    {
        $this->authorize(UserAuthPolicy::VIEW, [User::class]);

        $users = User::query()->filter($userFilter)->paginate();

        return $this->ok(UserResource::collection($users));
    }

    public function create(UserRequest $request, CreateUser $createUser)
    {
        $createdUser = $createUser->execute($request->userData());

        return $this->created(UserResource::make($createdUser));
    }

    public function update($userId, UserRequest $request, UpdateUser $updateUser)
    {
        if (!$user = User::query()->find($userId)) {
            return $this->notFound('Could not find the requested user');
        }

        $updatedUser = $updateUser->execute($user, $request->userData());

        return $this->updated($updatedUser);
    }

    public function delete($userId, DeleteUser $deleteUser)
    {
        if (!$user = User::query()->find($userId)) {
            return $this->notFound('Could not find the requested user');
        }

        $this->authorize(UserAuthPolicy::DELETE, [User::class]);

        $deleteUser->execute($user);

        return $this->deleted();
    }

    public function suspend($userId, SuspendUser $suspendUser)
    {
        if (!$user = User::query()->find($userId)) {
            return $this->notFound('Could not find the requested user');
        }

        $this->authorize(UserAuthPolicy::SUSPEND, [User::class]);

        $suspendUser->execute($user);

        return $this->noContent();
    }

    public function unsuspend($userId, UnSuspendUser $unSuspendUser)
    {
        if (!$user = User::query()->find($userId)) {
            return $this->notFound('Could not find the requested user');
        }

        $this->authorize(UserAuthPolicy::UNSUSPEND, [User::class]);

        $unSuspendUser->execute($user);

        return $this->noContent();
    }

    public function me()
    {
        return $this->ok(UserResource::make(Auth::user()));
    }
}
