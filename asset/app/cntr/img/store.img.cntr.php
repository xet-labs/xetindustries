<?php

    $request->validate([
        'image' => 'required|image|max:2048',
    ]);

    $file = $request->file('image');
    $hash = md5_file($file->getRealPath());

    // Check for duplicates
    $existingImage = BlogImage::where('hash', $hash)->first();
    if ($existingImage) {
        return response()->json(['message' => 'Duplicate image', 'path' => Storage::url($existingImage->path)]);
    }

    // Store the image with a unique filename
    $filename = $hash . '.' . $file->extension();
    $path = $file->storeAs('public/blog_images', $filename);

    // Save metadata
    $image = BlogImage::create([
        'filename' => $filename,
        'path' => $path,
        'hash' => $hash,
        'user_id' => auth()->id(),  // Link to the uploader
    ]);

    return response()->json(['message' => 'Image uploaded successfully', 'path' => Storage::url($path)]);