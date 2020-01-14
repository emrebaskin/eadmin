<?php

namespace EmreBaskin\Eadmin\FormBuilder;

use Illuminate\Support\Facades\View;


class eForm
{

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function open($properties = [])
    {

        $defaultValues = [
            'method'  => 'POST',
            'action'  => '#',
            'class'   => '',
            'enctype' => '',
        ];

        $properties = array_merge($defaultValues, $properties);

        return View::make('eForm::open', $properties)->render();

    }

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function input($properties = [])
    {

        $defaultValues = [
            'label'       => '',
            'id'          => 'input-' . rand(100000000, 999999999),
            'name'        => 'unnamed' . rand(100000000, 999999999),
            'type'        => 'text',
            'placeholder' => null,
            'value'       => '',
            'class'       => '',
            'disabled'    => false,
            'grid'        => 12,
        ];

        $properties = array_merge($defaultValues, $properties);

        return View::make('eForm::input', $properties)->render();

    }

    /**
     * @return string
     */
    public static function close()
    {

        return View::make('eForm::close')->render();

    }

}
