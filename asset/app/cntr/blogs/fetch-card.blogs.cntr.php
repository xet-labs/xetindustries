<?php

use App\Models\Blog;
use xet\Loc;

// Set default values for optional variables
$blogsCardEncode = $blogsCardEncode ?? 1;
$blogsCardBuffer = $blogsCardBuffer ?? 1;

// Get data from the post request with default values
$BlogsPage = (int) ($_POST['BlogsPage'] ?? 1);
$BlogsLimit = (int) ($_POST['BlogsLimit'] ?? 6);
$BlogsOffset = ($BlogsPage - 1) * $BlogsLimit;

// Fetch blog data from DB
$blogs = Blog::join('users', 'blogs.uid', '=', 'users.uid')
	->select(
		'blogs.slug',
		'blogs.title', 
		'blogs.short_title',
		'blogs.featured_img', 
		'blogs.path',
		'blogs.created_at', 
		'blogs.excerpt', 
		'users.username', 
		'users.name', 
		'users.name_l', 
		'users.verified', 
		'users.profile_img'
	)
	->where('blogs.status', 'published')
	->orderBy('blogs.created_at', 'desc')
	->skip($BlogsOffset)
	->take($BlogsLimit)
	->get();
	
// $blogsCardBuffer ? sleep(0.8) : '';

$response = [ 'noMoreBlogs' => $blogs->isEmpty() ? 1 : 0 ];

// Check if blogs exist and buffer the output if enabled
if (!$response['noMoreBlogs']) {
	$blogsCardBuffer ? ob_start() : '';

	foreach ($blogs as $blog) {
		include(Loc::file('PRTL','card.blogs'));
	}

	$blogsCardBuffer ? $response['html'] = ob_get_clean() : '';
}

echo ($blogsCardEncode ? json_encode($response) : '');
