<?php
use App\Models\Blog;

// $BlogAuthor, $BlogSlug

$blog = Blog::join('users', 'blogs.uid', '=', 'users.uid')
    ->select(
        'blogs.*',  
        'users.username', 
        'users.name', 
        'users.name_l', 
        'users.verified', 
        'users.profile_img'
    )
    ->where('users.username', $BlogAuthor)->where('blogs.slug', $BlogSlug)->first();

$blog->canonical = true;
$blog->imgSrc = "media/{$blog->uid}/img/";

$blogPath = storage_path("app/private/{$blog->uid}/blogs/{$blog->id}/index.php");
file_exists($blogPath) ? include($blogPath) : abort(404, 'Blog content not found');
