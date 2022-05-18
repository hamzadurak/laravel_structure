<?php

namespace App\Helpers;

use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class TokenHelper
 * @package App\Http\Helpers
 */
class TokenHelper
{
    /**
     * Returns token
     *
     * @return mixed
     */
    public static function getToken()
    {
        return JWTAuth::getToken();
    }

    /**
     * Returns new setted token
     *
     * @param $token
     * @return mixed
     */
    public static function setToken($token)
    {
        return JWTAuth::setToken($token);
    }

    /**
     * Returns refreshed token
     *
     * @return mixed
     */
    public static function refreshToken()
    {
        return JWTAuth::refresh();
    }
}
