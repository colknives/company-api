<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Services\AuthService;
use Modules\Auth\Collections\User as UserResource;

class AuthController extends Controller
{
    protected $authService;

    /**
     * Auth controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Login method instance
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login = $this->authService->login($request);

        //Prepare resource
        $details = ( $login->user )? new UserResource($login->user) : null;

        return response()->json([
            "message" => $login->message,
            "user" => $details,
            "token" => $login->token
        ], $login->status);
    }
}
