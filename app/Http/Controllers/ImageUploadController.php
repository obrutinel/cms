<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
        ]);


        dd($request->file('image'));
    }
}
