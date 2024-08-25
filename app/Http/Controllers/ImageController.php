<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        // To display the image:
        // return response()->file(public_path('/storage/images/new_image'));
        return response()->download(public_path('/storage/images/new_image'));
    }
}
