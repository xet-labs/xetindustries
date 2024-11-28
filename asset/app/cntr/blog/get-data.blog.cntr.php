<?php

use App\Models\Blog;

// Fetch blog data from DB
$Blog = Blog::join('users', 'blogs.uid', '=', 'users.uid')
    ->select(
        'blogs.*',  
        'users.username', 
        'users.name', 
        'users.name_l', 
        'users.verified', 
        'users.profile_img'
    )
    ->where('blogs.id', $PAGE['id'])
    ->first();
?>