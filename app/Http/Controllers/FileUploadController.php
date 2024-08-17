<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'image' => ['required', 'min:100', 'max:1000', 'mimes:png,jpg'],
        ]);
        info($request->image->store('/images'));
    }
}
