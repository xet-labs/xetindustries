<?php

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

$user = User::select('users.uid')->where('username', $username)->first();

if (!$user) {
    echo "404, 'User not found'";
    abort(404, 'User not found');
}
// dd($user);

$blog = Blog::select('blogs.path','blogs.slug')->where('uid', $user->uid)->where('slug', $slug)->first();
// dd($blog);

// Handle case where blog is not found
if (!$blog) {
    echo "404, 'Blog not found'";
    abort(404, 'Blog not found');
}

require(base_path().'/public/blog/'.$user->uid.'/'.$blog->slug.'/index.php');