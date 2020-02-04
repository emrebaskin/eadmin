<?php

namespace EmreBaskin\Eadmin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ImageController extends Controller
{

    public function upload(Request $request)
    {

        $request->validate([
            'eFormImageUpload' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('eFormImageUpload')) {

            return response()->json(["error" => "No File"]);

        }

        if ($request->file('eFormImageUpload')->isValid()) {

            return response()->json(["error" => "File is not valid"]);

        }

        $path = $request->photo->storeAs('images', 'filename.jpg');

        return [ 'path' => $path ];

    }

    public function delete(Request $request)
    {

        return "delete";

    }

}
