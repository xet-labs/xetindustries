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

empty($blog) ? abort(404, 'Blog not found') : '';    

$blog->type = "article";
$blog->prtl_stickySocial = 'true';
$blog->imgSrc = "media/{$blog->uid}/img/";
$blog->path = storage_path("app/private/{$blog->uid}/blogs/{$blog->id}/index.php");

file_exists($blog->path) ? include($blog->path) : abort(404, 'Blog not found');
