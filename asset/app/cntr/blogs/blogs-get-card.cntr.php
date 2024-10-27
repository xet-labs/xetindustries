<?php
use xet\Loc;
	include_once(Loc::file('LGC','Dbctl'));

	// Set default values for optional variables
	$blogsCardEncode = $blogsCardEncode ?? 1;
	$blogsCardBuffer = $blogsCardBuffer ?? 1;

	// Get data from the post request with default values
	$BlogsPage = (int) ($_POST['BlogsPage'] ?? 1);
	$BlogsLimit = (int) ($_POST['BlogsLimit'] ?? 4);
	$BlogsOffset = ($BlogsPage - 1) * $BlogsLimit;

	// Fetch blog data using DB query with limit and offset
	$Blogs = DB_DATA($DBconf['XI'], "{$DBquery['XI']['blogs-card']} LIMIT $BlogsOffset, $BlogsLimit");
	
	// $blogsCardBuffer ? sleep(0.8) : '';
	
	$response = [
		'noMoreBlogs' => empty($Blogs) ? 1 : 0
	];

	// Check if blogs exist and buffer the output if enabled
	if (!$response['noMoreBlogs']) {
		$blogsCardBuffer ? ob_start() : '';

		foreach ($Blogs as $Blog) {
			include(Loc::file('PRTL','card.blogs'));
		}

		$blogsCardBuffer ? $response['html'] = ob_get_clean() : '';
	}

	echo ($blogsCardEncode ? json_encode($response) : '');

?>
