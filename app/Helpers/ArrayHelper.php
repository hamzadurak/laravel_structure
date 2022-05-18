<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use ReflectionClass;
use ReflectionException;

/**
 * Class ArrayHelper
 * @package App\Http\Helpers
 */
class ArrayHelper
{
    /**
     * Returns key exist situation on the array
     *
     * @param $key
     * @param $array
     * @param false $call
     * @return array|bool|mixed
     */
    public static function keyExists($key, $array, bool $call = false)
    {
        $array = $array instanceof Collection ? $array->toArray() : $array;
        if (is_array($array)) {
            if ($call) {
                return array_key_exists($key, $array) ? $array[$key] : [];
            }
            return array_key_exists($key, $array);
        }
        return false;
    }

    /**
     * Combines two nested arrays
     *
     * @param array $array1
     * @param array $array2
     * @return array
     */
    public static function arrayRecursiveMerge(array $array1, array $array2): array
    {
        $merged = $array1;

        foreach ($array2 as $key => & $value) {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
                $merged[$key] = self::arrayRecursiveMerge($merged[$key], $value);
            } else if (is_numeric($key)) {
                if (!in_array($value, $merged)) {
                    $merged[] = $value;
                }
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }

    /**
     * Convert enum to array.
     *
     * @throws ReflectionException
     */
    public static function convertEnumToArray($enum)
    {
        $oClass = new ReflectionClass($enum);
        $constants = $oClass->getConstants();
        return (array_combine(array_values($constants), array_keys($constants)));
    }

    /**
     * Returns the constant directly if it's a constant, otherwise it's null.
     *
     * @param $constant
     * @return mixed|null
     */
    public static function getConstant($constant)
    {
        if(defined($constant)){
            return constant($constant);
        }else{
            return null;
        }
    }
}
