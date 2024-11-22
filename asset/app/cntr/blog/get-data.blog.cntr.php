<?php

use App\Models\Blog;

// Fetch blog data
$Blog = Blog::join('users', 'blogs.uid', '=', 'users.uid')
    ->select(
        'blogs.*',  
        'users.username', 
        'users.name', 
        'users.name_l', 
        'users.verified', 
        'users.profile_img'
    )
    ->where('blogs.blogId', $PAGE['id'])
    ->first();

    // dd($Blog);
?>