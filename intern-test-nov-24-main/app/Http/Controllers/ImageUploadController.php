<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; // Import the Image model

class ImageUploadController extends Controller
{
    public function imageUpload()
    {
        // Fetch all images to display on the page
        $images = Image::all();
        return view('imageUpload', compact('images'));
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:png,jpeg',
                'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'max:2048'
            ],
        ]);

        // Generate a unique file name and move the uploaded image to /public/images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Store the image path in the database
        Image::create(['filepath' => 'images/' . $imageName]);

        return back()
            ->with('success', 'You have successfully uploaded an image.')
            ->with('image', $imageName); 
    }
}
