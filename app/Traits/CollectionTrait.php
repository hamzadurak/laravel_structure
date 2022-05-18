<?php

namespace App\Traits;

use App\Helpers\ArrayHelper;
use App\Helpers\GeneralStatusHelper;

/**
 * Trait CollectionTrait
 * @package App\Http\Traits
 */
trait CollectionTrait
{
    /**
     * @param $key
     * @return array|bool|mixed
     */
    protected function keyExists($key)
    {
        return ArrayHelper::keyExists($key, $this->resource, true);
    }

    /**
     * @param $data
     * @return array
     */
    public function datatables($data): array
    {
        return [
            'data' => $data,
            'draw' => $this->keyExists('draw'),
            'input' => $this->keyExists('input'),
            'queries' => $this->keyExists('queries'),
            'recordsFiltered' => $this->keyExists('recordsFiltered'),
            'recordsTotal' => $this->keyExists('recordsTotal'),
        ];
    }

    /**
     * @return array
     */
    public function status(): array
    {
        $status = GeneralStatusHelper::$statusDataName;
        return [
            $status => $this->keyExists($status)
        ];
    }

    /**
     * Add status to statuses
     * @param $externalObjects
     * @return array
     */
    public function addToStatuses($externalObjects): array
    {
        $newStatuses = [];
        foreach($this->status()['statuses'] as $key =>  $status){

            $newStatuses[$key] = $status;
        }

        for($i =0; $i< count($externalObjects); $i++){
            foreach ($externalObjects[$i][0]['statuses'] as $key => $obj){

                $newStatuses[$key] = (object)$obj;
            }
        }

        return [
            'statuses' => $newStatuses
        ];
    }

    /**
     * General Status Helper statuses Formatter
     *
     * @param array $arrayData
     * @param array $arrayNames
     * @param string $returnType
     * @return object[][]
     */
    public function statusesFormatter(array $arrayData = [], array $arrayNames = [], string $returnType = 'object'): array
    {
        $formattedStatuses = [];

        if(count($arrayData) > 0 && count($arrayNames) > 0) {
            foreach ($arrayData as $array) {
                foreach ($arrayNames as $arrayName) {
                    if (isset($array->$arrayName)) {
                        $formattedStatuses[$arrayName] = (array) $array->{$arrayName};
                        break;
                    }
                }
            }

            foreach ($formattedStatuses as $key => $value) {
                $formattedStatusArray = [];

                if ($returnType == 'object') {
                    $formattedStatuses[$key] = (object) $value;
                } else {
                    foreach ($value as $fKey => $item) {
                        $formattedStatusArray[$fKey]['title'] = $item->title;
                        $formattedStatusArray[$fKey]['colorCode'] = $item->colorCode;
                    }

                    $formattedStatuses[$key] = $formattedStatusArray;
                    unset($formattedStatusArray);
                }
            }
	
	        return [
	            GeneralStatusHelper::$statusDataName => $formattedStatuses
	        ];
        }

        return $formattedStatuses;
    }
}
