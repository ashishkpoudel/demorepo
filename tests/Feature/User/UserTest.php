<?php

namespace Tests\Feature\User;

use App\Domain\Accounts\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_get_their_userinfo()
    {
        $this->signIn(null);

        $this->getJson(route('users.me'))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'full_name',
                    'first_name',
                    'last_name',
                    'email',
                    'phone_number',
                    'api_token'
                ]
            ]);
    }

    /** @test */
    public function admin_can_delete_user()
    {
        $this->signInAs('admin');

        $user = factory(User::class)->create();

        $this->delete(route('users.delete', $user->id))
            ->assertStatus(204);

        $this->assertSoftDeleted(User::TABLE, [
            'id' => $user->id
        ]);
    }

    /** @test */
    public function admin_can_suspend_user()
    {
        $this->signInAs('admin');

        $user = factory(User::class)->create();

        $this->post(route('users.suspend', $user->id))
            ->assertStatus(204);

        $this->assertTrue($user->refresh()->isSuspended());
    }

    /** @test */
    public function admin_can_unsuspend_a_suspended_user()
    {
        $this->signInAs('admin');

        $user = factory(User::class)->states('suspended')->create();

        $this->delete(route('users.unsuspend', $user->id))
            ->assertStatus(204);

        $this->assertFalse($user->refresh()->isSuspended());
    }
}
