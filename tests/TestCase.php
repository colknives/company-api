<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Generate Header
     *
     * @param null $uuid
     * @return array
     */
    public function getHeader($uuid = null)
    {
        $token = \Firebase\JWT\JWT::encode([
            'iss' => env('APP_NAME'),
            'sub' => \Ramsey\Uuid\Uuid::uuid4(),
            'iat' => \Carbon\Carbon::now()->timestamp,
            'exp' => \Carbon\Carbon::now()->addHours(1)->timestamp,
            'user' => [
                'uuid' => ( $uuid )? $uuid : \Ramsey\Uuid\Uuid::uuid4(),
                'firstname' => 'Sample',
                'lastname' => 'User',
                'email' => 'sample@gmail.com'
            ]
        ], config('token.private-key.user'), 'RS256');

        return [
            'Authorization' => $token,
            'Accept' => 'application/json'
        ];
    }

    /**
     * Generate Login Header
     *
     * @return array
     */
    public function getLoginHeader()
    {
        return [
            'Accept' => 'application/json'
        ];
    }
}
