<?php

namespace EmreBaskin\Eadmin\Components;

use Illuminate\Support\Facades\View;


class eComp
{

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function table($properties = [])
    {

        $defaultValues = [
            'id'            => 'table-' . rand(100000000, 999999999),
            'class'         => '',
            'datas'         => [],
            'columns'       => [],
            'noScript'      => false,
            'ajax'          => false,
            'actionButtons' => [],
        ];

        $properties = array_merge($defaultValues, $properties);

        return View::make('eComp::table', $properties)->render();

    }

}
