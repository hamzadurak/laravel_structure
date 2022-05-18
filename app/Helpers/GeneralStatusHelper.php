<?php

namespace App\Helpers;

use App\Enumerations\General\Languages\LanguageFileEnum;
use App\Enumerations\General\Datatables\ColorCodeEnum;
use App\Enumerations\General\Datatables\StatusEnum;

class GeneralStatusHelper
{
    /**
     * Constant status name
     *
     * @var string
     */
    public static $statusDataName = "statuses";

    /**
     * Constant title name
     *
     * @var string
     */
    public static $keyTitleName = "title";

    /**
     * Specify statuses for datatable
     *
     * @param $statusRowName
     * @return \array[][][]
     */
    public static function getStatus($statusRowName): array
    {
        return [
            $statusRowName => [
                StatusEnum::ACTIVE => [
                    self::$keyTitleName => translation(LanguageFileEnum::STATUS, 'ACTIVE'),
                    'colorCode' => ColorCodeEnum::ACTIVE
                ],
                StatusEnum::PASSIVE => [
                    self::$keyTitleName => translation(LanguageFileEnum::STATUS, 'PASSIVE'),
                    'colorCode' => ColorCodeEnum::PASSIVE
                ]
            ]
        ];

    }
}
