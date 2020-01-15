<?php

namespace Tests;

<<<<<<< HEAD
use App\Domain\Accounts\Models\User;

=======
>>>>>>> initial
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
<<<<<<< HEAD

    public function signIn(?User $user)
    {
        if (!$user instanceof User) {
            $user = factory(User::class)->create();
        }

        $this->actingAs($user, 'api');
    }

    public function signInAs(string $role)
    {
        $user = factory(User::class)->state($role)->create();

        $this->signIn($user);
    }
=======
>>>>>>> initial
}
