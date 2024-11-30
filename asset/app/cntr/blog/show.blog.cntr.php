<?php

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

$user = User::select('users.uid')->where('username', $username)->first();

$BlogCnt = storage_path("app/private/{$user->uid}/blogs/{$slug}/index.php");

if (!file_exists($BlogCnt)) {
    abort(404, 'Blog content not found');
}

include($BlogCnt);