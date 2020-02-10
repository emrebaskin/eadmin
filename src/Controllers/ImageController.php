<?php

namespace EmreBaskin\Eadmin\Controllers;

use EmreBaskin\Eadmin\Helpers\eHelper;
use EmreBaskin\Eadmin\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;


class ImageController extends Controller
{

    public function upload(Request $request)
    {

        $request->validate([
            'eFormFieldName'   => 'required|string',
            'eFormImageUpload' => 'required|mimes:jpeg,jpg,png',
        ]);

        $extension = '.' . $request->file('eFormImageUpload')->getClientOriginalExtension();
        $filename  = eHelper::makeSlug(str_replace($extension, '', $request->file('eFormImageUpload')->getClientOriginalName()));
        $fieldName = $request->input('eFormFieldName');

        $path = $request->file('eFormImageUpload')->storeAs('public/images', $filename . '-' . uniqid() . $extension);
        $path = str_replace('public/images/', '/storage/images/', $path);

        $image       = new Image();
        $image->path = $path;
        $image->save();

        $viewImage = View::make('eComp::images', ['image' => $path, 'name' => $fieldName, 'id' => $image->id])->render();

        return ['path' => $path, 'viewImage' => $viewImage];

    }

    public function delete(Request $request)
    {

        return "delete";

    }

}
