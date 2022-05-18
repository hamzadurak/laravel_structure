<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class RedirectHelper
{
    /**
     * Returns record result
     *
     * @param array $parameters
     * @param null $message
     * @return JsonResponse|object
     */
    public static function store(array $parameters = [], $message = null)
    {
        return self::result(200, $message ?? createMessage(), $parameters);
    }

    /**
     * Returns the update result
     *
     * @param array $parameters
     * @param null $message
     * @return JsonResponse|object
     */
    public static function update(array $parameters = [], $message = null)
    {
        return self::result(200, $message ?? updateMessage(), $parameters);
    }

    /**
     * Returns the deletion result
     *
     * @param array $parameters
     * @param null $message
     * @return JsonResponse|object
     */
    public static function destroy(array $parameters = [], $message = null)
    {
        return self::result(200, $message ?? deleteMessage(), $parameters);
    }

    /**
     * Returns the recovery result
     *
     * @param array $parameters
     * @param null $message
     * @return JsonResponse|object
     */
    public static function restore(array $parameters = [], $message = null)
    {
        return self::result(200, $message ?? restoreMessage(), $parameters);
    }

    /**
     * Returns successful result
     *
     * @param array $parameters
     * @param null $message
     * @return JsonResponse|object
     */
    public static function success(array $parameters = [], $message = null)
    {
        return self::result(200, $message ?? successMessage(), $parameters);
    }

    /**
     * Returns successful without message.
     *
     * @param array $parameters
     * @return JsonResponse|object
     */
    public static function successWithoutMessage(array $parameters = [])
    {
        return self::result(200, null, $parameters);
    }

    /**
     * Returns error result
     *
     * @param array $parameters
     * @param null $message
     * @param int $statusCode
     * @return JsonResponse|object
     */
    public static function error(int $statusCode = 422, $message = null, array $parameters = [])
    {
        return self::result($statusCode, $message ?? errorMessage(), $parameters);
    }

    /**
     * Returns not found result
     *
     * @param null $message
     * @param array $parameters
     * @return JsonResponse|object
     */
    public static function notFound($message = null, array $parameters = [])
    {
        return self::result(404, $message ?? notFoundMessage(), $parameters);
    }

    /**
     * Returns notAuthorized result
     *
     * @param array $parameters
     * @return JsonResponse|object
     */
    public static function notAuthorized(array $parameters = [])
    {
        return self::result(401, notAuthorizedMessage(), $parameters);
    }

    /**
     * Formats the result and returns
     *
     * @param int $statusCode
     * @param $message
     * @param null $data
     * @return JsonResponse|object
     */
    public static function result($statusCode = 200, $message, $data = null)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ])->setStatusCode($statusCode);
    }
}
