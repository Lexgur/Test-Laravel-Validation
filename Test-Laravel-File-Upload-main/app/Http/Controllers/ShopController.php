<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ShopController extends Controller
{
    public function store(Request $request)
    {
        // Store the original uploaded file
        $filename = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('shops', $filename);

        // TASK: Resize the uploaded image from /storage/app/shops/$filename
        // to a size of 500x500 and store it as /storage/app/shops/resized-$filename
        // Use intervention/image package, it's already pre-installed for you

        // Path to the original uploaded file
        $originalPath = storage_path('app/shops/' . $filename);

        // Path to the resized file
        $resizedPath = storage_path('app/shops/resized-' . $filename);

        // Resize the image
        $img = Image::make($originalPath);
        $img->resize(500, 500);
        $img->save($resizedPath);

        return 'Success';
    }
}
