<?php

namespace App\Helpers;

use App\Enumerations\General\Languages\LanguageFileEnum;

if (!function_exists('translation')) {
    /**
     * Translates according to grammar.
     *
     * @param $langPath
     * @param $key
     * @return string
     */
    function translation($langPath, $key) : string
    {
        return __($langPath.'.'.$key);
    }
}


if (!function_exists('getLanguageId')) {
    /**
     * Return Language Id
     *
     * @return int|null
     */
    function getLanguageId(): ?int
    {
        return request('language')->id ?? null;
    }
}

if (!function_exists('getLanguageCode')) {
    /**
     * Return Language Code
     *
     * @return string|null
     */
    function getLanguageCode(): ?string
    {
        return request('language')->code ?? null;
    }
}


//<editor-fold desc="HTTP_STATUS">

/**
 * ############ HTTP_STATUS  ############
 * */

if (!function_exists('successMessage')) {
    /**
     * Returns Success Message
     *
     * @return string
     */
    function successMessage() : string
    {
        return translation(LanguageFileEnum::HTTP_STATUS, 'performedSuccessfully');
    }
}

if (!function_exists('createMessage')) {
    /**
     * Returns Create Message
     *
     * @return string
     */
    function createMessage() : string
    {
        return translation(LanguageFileEnum::HTTP_STATUS, 'createdSuccessfully');
    }
}

if (!function_exists('storeMessage')) {
    /**
     * Returns Store Message
     *
     * @return string
     */
    function storeMessage() : string
    {
        return createMessage();
    }
}

if (!function_exists('updateMessage')) {
    /**
     * Returns Update Message
     *
     * @return string
     */
    function updateMessage() : string
    {
        return translation(LanguageFileEnum::HTTP_STATUS, 'updatedSuccessfully');
    }
}

if (!function_exists('deleteMessage')) {
    /**
     * Returns Delete Message
     *
     * @return string
     */
    function deleteMessage() : string
    {
        return translation(LanguageFileEnum::HTTP_STATUS, 'deletedSuccessfully');
    }
}

if (!function_exists('destroyMessage')) {
    /**
     * Returns Destroy Message
     *
     * @return string
     */
    function destroyMessage() : string
    {
        return deleteMessage();
    }
}

if (!function_exists('restoreMessage')) {
    /**
     * Returns Restore Message
     *
     * @return string
     */
    function restoreMessage() : string
    {
        return translation(LanguageFileEnum::HTTP_STATUS, 'restoredSuccessfully');
    }
}

if (!function_exists('errorMessage')) {
    /**
     * Returns Error Message
     *
     * @return string
     */
    function errorMessage() : string
    {
        return translation(LanguageFileEnum::HTTP_STATUS, 'error');
    }
}

if (!function_exists('notFoundMessage')) {
    /**
     * Returns Not Found Message
     *
     * @return string
     */
    function notFoundMessage() : string
    {
        return translation(LanguageFileEnum::HTTP_STATUS, 'notFound');
    }
}

if (!function_exists('notAuthorized')) {
    /**
     * Returns notAuthorized Message
     *
     * @return string
     */
    function notAuthorizedMessage() : string
    {
        return translation(LanguageFileEnum::PERMISSIONS, 'notAuthorized');
    }
}

if (!function_exists('getSiteId')) {
    /**
     * Returns siteId
     *
     * @return int|null
     */
    function getSiteId() : ?int
    {
        return request()->has('siteId') ? request('siteId') : null;
    }
}

//</editor-fold>

