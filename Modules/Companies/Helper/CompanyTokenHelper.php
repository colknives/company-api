<?php

namespace Modules\Companies\Helper;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\SignatureInvalidException;

/**
 * Decrypt the JWT Authorization Token
 */
class CompanyTokenHelper
{
    /**
     * Validate Authorization header
     *
     * @param Request $request Request object
     * @return object
     */
    public static function validateToken(Request $request)
    {
        $jwt = $request->header('Authorization');
        $publicKey = config('token.public-key.user');

        if(!$jwt) {
            return (object)[
                'status' => 401,
                'user' => null,
                'message' => __('messages.auth.login.401'),
            ];
        }

        try{
            return (object)[
                'status' => 200,
                'token' => JWT::decode($jwt, $publicKey, ['RS256']),
                'message' => null
            ];
        } catch(SignatureInvalidException $e) {
            return (object)[
                'status' => 403,
                'user' => null,
                'message' => __('messages.auth.login.403'),
            ];
        } catch (ExpiredException $e) {
            return (object)[
                'status' => 419,
                'user' => null,
                'message' => __('messages.auth.login.419'),
            ];
        }
    }

    /**
     * Get the current user object from the Authorization header
     *
     * @param Request $request Request object
     * @param $role
     * @return object
     */
    public static function getUser(Request $request)
    {
        $validate = self::validateToken($request);

        switch($validate->status)
        {
            case 200: return $validate->token->user;
            default: return null;
        }
    }
}
