<?php

namespace App\Http\Controllers\UserTraits;

use Illuminate\Http\Request;
use xet\Loc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

trait UserUpdate
{
    public function updateProfileImg(Request $request)
    {
        // Validate the request to ensure a file is uploaded and is an image
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the currently authenticated user
        $user = Auth::User();

        // Handle the upload and storage of the image
        if ($request->hasFile('profile_image')) {
            // Delete the old profile image if it exists
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            // Store the new image
            $path = $request->file('profile_image')->store('profile_images');

            // Update the user's profile_image field in the database
            $user->profile_image = $path;
            $user->save();

            return response()->json([
                'message' => 'Profile image updated successfully',
                'profile_image_url' => Storage::url($user->profile_image),
            ], 200);
        }

        return response()->json(['message' => 'No image uploaded'], 400);
    }
}
