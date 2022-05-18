<?php

namespace App\Helpers;

use ReflectionException;

class LanguageHelper
{
    /**
     * Enum array converts and translates
     *
     * @param $enum
     * @param $languageFileEnum
     * @param bool $translateKey
     * @return array|false|int[]|string[]
     * @throws ReflectionException
     */
    public static function getEnumTranslate($enum, $languageFileEnum, bool $translateKey = false){
        $enumArray = ArrayHelper::convertEnumToArray($enum);
        foreach($enumArray as $key => $value){
            $enumArray[$key] = trim(translation($languageFileEnum, ($translateKey ? $key : $value)), '.');
        }
        return $enumArray;
    }

}
