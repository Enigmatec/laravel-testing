<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Session;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_if_user_can_create()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make([
            'email' => 'admin@gmail.com'
        ]);
        $this->actingAs($user);
        $response = $this->post(route('register.user'), [
            'name' => 'iodsigfid',
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);

        $this->assertCount(1, User::all()); 
    }

    public function test_if_auth_user_can_view_all_user()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get(route('allUser'))
                    ->assertOk();
    }

    public function test_user_can_delete()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->delete(route('delete.user', $user->id))
                ->assertStatus(200);
    }

    public function test_if_name_is_required()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make([
            'email' => 'admin@gmail.com'
        ]);
        $this->actingAs($user);

        $data = [
            'name'  => 'Ade',
            'email' => 'email@gmail.com',
            'password'  => 'password'
        ];

        $response = $this->post(route('register.user'), array_merge($data, ['name' => '']));

        $response->assertSessionHasErrors('name');
        $this->assertCount(0, User::all());
    }
}
