<?php

namespace EmreBaskin\Eadmin\FormBuilder;

use Illuminate\Support\Facades\View;


class eTable
{

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function responsive($properties = [])
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
            'id'   => 'input-' . rand(100000000, 999999999),
            'name' => 'unnamed' . rand(100000000, 999999999),
            'type' => 'text',
        ];

        $defaultValues = array_merge(eForm::getSharedValues(), $defaultValues);
        $properties    = array_merge($defaultValues, $properties);

        return View::make('eForm::input', $properties)->render();

    }

    public static function getSharedValues()
    {

        return [
            'label'       => '',
            'placeholder' => null,
            'value'       => '',
            'class'       => '',
            'disabled'    => false,
            'grid'        => 12,
        ];

    }

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function textarea($properties = [])
    {

        $defaultValues = [
            'id'   => 'textarea-' . rand(100000000, 999999999),
            'name' => 'unnamed' . rand(100000000, 999999999),
            'rows' => 3,
        ];

        $defaultValues = array_merge(eForm::getSharedValues(), $defaultValues);
        $properties    = array_merge($defaultValues, $properties);

        return View::make('eForm::textarea', $properties)->render();

    }

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function select($properties = [])
    {

        $defaultValues = [
            'id'       => 'select-' . rand(100000000, 999999999),
            'name'     => 'unnamed' . rand(100000000, 999999999),
            'datas'    => [],
            'selected' => null,
            'noScript' => false,
        ];

        $defaultValues = array_merge(eForm::getSharedValues(), $defaultValues);
        $properties    = array_merge($defaultValues, $properties);

        return View::make('eForm::select', $properties)->render();

    }


    /**
     * @param array $properties
     *
     * @return string
     */
    public static function button($properties = [])
    {

        $defaultValues = [
            'id'       => 'button-' . rand(100000000, 999999999),
            'label'    => __('Button'),
            'class'    => '',
            'color'    => 'dark',
            'disabled' => false,
        ];

        $properties = array_merge($defaultValues, $properties);

        return View::make('eForm::button', $properties)->render();

    }


    /**
     * @return string
     */
    public static function close()
    {

        return View::make('eForm::close')->render();

    }

}
