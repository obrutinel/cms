<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;

class ImageUploadController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        /*$request->validate([
            'image' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048',
        ]);*/

        $folderPath = public_path('upload/');

        $decoder = new Base64ImageDecoder($request->image);
        $filename = uniqid();
        $filenameExt = $filename.'.'.$decoder->getFormat();

        if(file_put_contents($folderPath.$filenameExt, $decoder->getDecodedContent())) {

            $img = Image::make($folderPath.$filenameExt);
            $img->encode('webp');
            $img->save($folderPath.$filename.'.webp');

            $img->resize(null, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($folderPath.'min_'.$filename.'.webp');

            Page::find($request->id)->update([
                'image' => $filename.'.webp'
            ]);
        }

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);

    }
}
