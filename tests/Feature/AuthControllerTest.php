<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
// tests/Unit/AuthControllerTest.php
use App\Models\User;
use Tests\TestCase as TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * Test the login method with valid credentials.
     *
     * @return void
     */
    public function testLoginWithValidCredentials()
    {
        // Replace this with actual valid credentials for testing
        $validCredentials = [
            'email' => 'test@example.com',
            'password' => 'password'
        ];

        // Create a user with a password using Laravel's factory
        User::factory(\App\User::class)->create([
            'password' => bcrypt($validCredentials['password']),
        ]);

        // Send a POST request to the login endpoint with valid credentials
        $response = $this->post('/api/login', $validCredentials);

        // Assert that the response has a valid JSON structure
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);

        // Assert the response status code
        $response->assertStatus(200);
    }
    /**
     * Test the login method with invalid credentials.
     *
     * @return void
     */
    public function testLoginWithInvalidCredentials()
    {
        // Replace this with actual invalid credentials for testing
        $invalidCredentials = [
            'email' => 'nonexistent@example.com',
            'password' => 'invalidpassword'
        ];

        // Send a POST request to the login endpoint with invalid credentials
        $response = $this->post('/api/login', $invalidCredentials);

        // Assert that the response has an 'error' field and the correct status code
        $response->assertJson([
            'error' => 'Unauthorized'
        ])->assertStatus(401);
    }

}
