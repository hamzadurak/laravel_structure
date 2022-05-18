<?php

namespace App\Helpers;

/**
 * Class DataTableHelper
 * @package App\Helpers
 */
class DataTableHelper
{
    /**
     * Datatable adds empty columns
     *
     * @param $dataTables
     * @param array $columns
     * @return mixed
     */
    public static function addEmptyColumns($dataTables, array $columns){
        foreach($columns as $column){
            $dataTables->addColumn($column, function ($row) use ($column){
                return $row->{$column} = null;
            });
        }
        return $dataTables;
    }

    /**
     * Deletes specified columns
     *
     * @param $dataTables
     * @param array $columns
     * @return mixed
     */
    public static function removeColumns($dataTables, array $columns){
        foreach($columns as $column){
            $dataTables->removeColumn($column);
        }
        return $dataTables;
    }
}
