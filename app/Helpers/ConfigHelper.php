<?php

namespace App\Helpers;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

class ConfigHelper
{
    /**
     * Returns config data according to the specified enum and key
     *
     * @param $configFileEnum
     * @param $key
     * @return Repository|Application|mixed
     */
    public static function getConfig($configFileEnum, $key)
    {
        return config($configFileEnum . '.' . $key);
    }

    /**
     * Updates the config according to the specified enum file path and key and data.
     *
     * @param $configFileEnum
     * @param $key
     * @param $data
     */
    public static function setConfig($configFileEnum, $key, $data)
    {
        config()->set($configFileEnum . '.' . $key, $data);
    }
}
