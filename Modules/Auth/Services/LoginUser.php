<?php

namespace Modules\Auth\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Carbon\Carbon;
use Modules\Auth\Repositories\UserRepository;

class LoginUser extends AbstractAuth
{
    protected $request;

    protected $userRepository;

    /**
     * LoginEmployee constructor
     *
     * @param Request $request
     * @param userRepository $userRepository
     */
    public function __construct(
        Request $request,
        UserRepository $userRepository)
    {
        $this->request = $request;
        $this->userRepository = $userRepository;

        parent::__construct($request);
    }

    /**
     * @return AbstractAuth
     */
    public function handle(): AbstractAuth
    {
        //Check if has credentials locally
        $user = $this->userRepository->find('email', $this->request->post('email'));

        //If user not found
        if( !$user ){
            $this->response = $this->makeResponse(404, 'login.404');
            $this->response->user = null;
            $this->response->token = null;
            return $this;
        }

        //Check if password is correct
        if( !Hash::check($this->request->post('password'), $user->password) ){
            $this->response = $this->makeResponse(400, 'login.400');
            $this->response->user = null;
            $this->response->token = null;
            return $this;
        }

        // Set details to be place in token
        $token = [
            'uuid' => $user->uuid,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email
        ];

        $this->response = $this->makeResponse(200, 'login.200');
        $this->response->user = $user;
        $this->response->token = $this->generateJWTToken($token);

        return $this;
    }

    /**
     * Generate the JWT Token
     *
     * @param array $user
     * @return string
     */
    public function generateJWTToken($user)
    {
        $exp = Carbon::now()->addHours(1)->timestamp;

        $payload = [
            'iss' => env('APP_NAME'), // Issuer of the token
            'sub' => $user['uuid'], // Subject of the token
            'iat' => Carbon::now()->timestamp, // Time when JWT was issued.
            'exp' => $exp, // Expiration time
            'user' => $user, // User Info
        ];

        $key = config('token.private-key.user');

        return JWT::encode($payload, $key, 'RS256');
    }
}
