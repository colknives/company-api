<?php

namespace Modules\Auth\Services;

use Illuminate\Http\Request;
use Modules\Auth\Services\BaseService;
use Modules\Auth\Repositories\UserRepository;

class AuthService extends BaseService implements AuthInterface {

    protected $userRepository;

    /**
     * AuthService constructor
     *
     * @param Request $request
     * @param AuthRepository $userRepository
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
     *  Login User Service
     */
    public function login($request)
    {
        return (new LoginUser($request, $this->userRepository))->handle()->response;
    }
}
