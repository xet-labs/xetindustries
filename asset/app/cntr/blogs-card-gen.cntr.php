<?php
	include_once($FILE['CLS']['__dbctl']);

	// Set default values for optional variables
	$blogsCardEncode = $blogsCardEncode ?? 1;
	$blogsCardBuffer = $blogsCardBuffer ?? 1;

	// Get data from the post request with default values
	$BlogsPage = (int) ($_POST['BlogsPage'] ?? 1);
	$BlogsLimit = (int) ($_POST['BlogsLimit'] ?? 4);
	$BlogsOffset = ($BlogsPage - 1) * $BlogsLimit;

	// Fetch blog data using DB query with limit and offset
	$Blogs = DB_DATA($DBconf['XI'], "{$DBquery['XI']['Blogs_card']} LIMIT $BlogsOffset, $BlogsLimit");
	
	// -intentional delay :D
	$blogsCardBuffer ? sleep(0.8) : '';
	
	$response = [
		'noMoreBlogs' => empty($Blogs) ? 1 : 0
	];

	// Check if blogs exist and buffer the output if enabled
	if (!$response['noMoreBlogs']) {
		$blogsCardBuffer ? ob_start() : '';

		foreach ($Blogs as $Blog) {
			include($FILE['PRTL']['blogs-card']);
		}

		$blogsCardBuffer ? $response['html'] = ob_get_clean() : '';
	}

	echo ($blogsCardEncode ? json_encode($response) : '');

?>