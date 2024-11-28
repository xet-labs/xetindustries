<?php
    $width = $request->query('width', null);
    $height = $request->query('height', null);
    $format = $request->query('format', 'webp');

    $path = storage_path('app/public/img/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }

    $image = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });

    return $image->encode($format)->response();