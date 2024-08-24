<?php
	include_once("../conf/config.php");

	include_once($CLS['__dbctl']);

	// -get data from the post request
	$BlogsPage=$_POST['BlogsPage']??1;
	$BlogsLimit=$_POST['BlogsLimit']??3;

	// -algo for getting cards data
	$BlogsOffset=($BlogsPage-1) * $BlogsLimit;

	$BlogsOffset = (int)$BlogsOffset;
	$BlogsLimit = (int)$BlogsLimit; 

	$Blogs = DB_DATA($DBconf['XI'], $DBquery['XI']['Blogs_card'] . " LIMIT $BlogsOffset, $BlogsLimit");

	// -intentional delay :D
	sleep(0.8);
	
	$response = [];
	if (empty($Blogs)) {
		$response['noMoreBlogs'] = true;
	} else {
		$response['noMoreBlogs'] = false;
		// -init output buffer capture
		ob_start();
?>


<?php
	foreach($Blogs as $Blog):

		// -gen blogs-cards
		include($TMPL['_blogs_card']);

	endforeach;
?>


<?php 
		// -Store HTML output in response
		$response['html'] = ob_get_clean();
	}

	// -Output the response as JSON
	echo json_encode($response);
?>