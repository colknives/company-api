<?php

namespace Modules\Auth\Tests\Feature;

use Tests\TestCase;
use Modules\Auth\Entities\User;

class AuthTest extends TestCase
{
    /**
     * Test Login
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create();

        //422
        $response = $this->post('api/auth/login', [], [
            'Accept' => 'application/json'
        ]);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors'
        ]);

        //404
        $response = $this->post('api/auth/login', [
            'email' => 'test@gmail.com',
            'password' => 'password'
        ], [
            'Accept' => 'application/json'
        ]);
        $response->assertStatus(404);

        //400
        $response = $this->post('api/auth/login', [
            'email' => $user->email,
            'password' => 'password1'
        ], [
            'Accept' => 'application/json'
        ]);
        $response->assertStatus(400);

        //200
        $response = $this->post('api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ], [
            'Accept' => 'application/json'
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'user',
            'token'
        ]);
    }
}