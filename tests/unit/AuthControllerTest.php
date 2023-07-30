<?php

namespace Tests\Feature;

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

    public function testLoginHttpStatusCode()
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

        // Assert the response status code
        $response->assertStatus(200);

        // Assert that the response has a valid JSON structure
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);

    }
    public function testLogoutHttpStatusCode()
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

        // Assert the response status code
        $response->assertStatus(200);

        // Assert that the response has a valid JSON structure
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);

        // Send a POST request to the logout endpoint with valid credentials
        $response = $this->post('/api/logout', $validCredentials);

        // Assert the response status code
        $response->assertStatus(200);

        // Assert that the response has a valid JSON structure
        $response->assertJson([
            'message' => 'Successfully logged out'
        ]);

    }

    public function testMeHttpStatusCode()
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

        // Assert the response status code
        $response->assertStatus(200);

        // Assert that the response has a valid JSON structure
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);

        // Send a GET request to the me endpoint with valid credentials and header

        
        $response = $this->get('/api/me', $validCredentials);

        // Assert the response status code
        $response->assertStatus(200);

        // Assert that the response has a valid JSON structure
        $response->assertJsonStructure([
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at'
        ]);
    }

    public function testRefreshHttpStatusCode()
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

        // Assert the response status code
        $response->assertStatus(200);

        // Assert that the response has a valid JSON structure
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);

        // Send a POST request to the refresh endpoint with valid credentials
        $response = $this->post('/api/refresh', $validCredentials);

        // Assert the response status code
        $response->assertStatus(200);

        // Assert that the response has a valid JSON structure
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in'
        ]);

    }

}
