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
            'id'   => 'input-' . uniqid(),
            'name' => 'unnamed' . uniqid(),
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
            'id'   => 'textarea-' . uniqid(),
            'name' => 'unnamed' . uniqid(),
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
            'id'       => 'select-' . uniqid(),
            'name'     => 'unnamed' . uniqid(),
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
            'id'       => 'button-' . uniqid(),
            'label'    => __('Button'),
            'class'    => 'float-right',
            'color'    => 'dark',
            'disabled' => false,
            'grid'     => 12,
        ];

        $properties = array_merge($defaultValues, $properties);

        return View::make('eForm::button', $properties)->render();

    }

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function imageUploads($properties = [])
    {

        $defaultValues = [
            'id'     => uniqid('image'),
            'class'  => '',
            'name'   => uniqid('image'),
            'label'  => __('Images'),
            'images' => [],
        ];

        $properties = array_merge($defaultValues, $properties);

        $render = '';
        $render .= View::make('eForm::label', ['text' => $properties['label']])->render();

        foreach ($properties['images'] as $image) {

            $image  = (array)$image;
            $render .= View::make('eComp::images',
                ['id' => $image['id'], 'image' => $image['path'], 'name' => $properties['name']])->render();

        }

        $render .= View::make('eComp::imageUpload', ['name' => $properties['name']])->render();

        return $render;

    }


    /**
     * @param array $properties
     *
     * @return string
     */
    public static function label($properties = [])
    {

        $defaultValues = [
            'text' => __('Label'),
        ];

        $properties = array_merge($defaultValues, $properties);

        return View::make('eForm::label', $properties)->render();

    }

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function checkbox($properties = [])
    {

        $defaultValues = [
            'id'      => uniqid('checkbox'),
            'label'   => __('Label'),
            'name'    => uniqid('checkbox'),
            'class'   => '',
            'value'   => '',
            'checked' => false,
        ];

        $properties = array_merge($defaultValues, $properties);

        return View::make('eForm::checkbox', $properties)->render();

    }


    /**
     * @return string
     */
    public static function close()
    {

        return View::make('eForm::close')->render();

    }

}
