<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_new_user_has_been_created(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test109@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_login_successful(): void
    {
        $user = User::factory()->create();
 
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
 
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
