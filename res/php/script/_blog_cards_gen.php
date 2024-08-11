<?php
	require_once"../inc/__dbctl.php";

	// -get data from the post request
	$BlogsPage=$_POST['BlogsPage']??1;
	$BlogsLimit=$_POST['BlogsLimit']??3;

	// -algo for getting cards data
	$BlogsOffset=($BlogsPage-1)*$BlogsLimit;
	$Blogs = DB_DATA($DBconf['XI'], $DBquery['XI']['Blogs']."LIMIT $BlogsOffset,$BlogsLimit", $id=['blog_id']);

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


<!-- Blog cards Prep -->
<?php foreach($Blogs as $Blog): ?>
	<div class="post">
		<a href="<?php echo htmlspecialchars($Blog['path']); ?>">
		
		<!-- post image -->
		<div class="post-image-wrapper">
			<div class="post-image">
				<img data-src="<?php echo htmlspecialchars($Blog['featured_image']); ?>" class="lazyload" alt="<?php echo htmlspecialchars($Blog['short_title']??$Blog['title']); ?>">
				<div class="post-image-anim"></div>
			</div>
			<!-- post category -->
			<a href="#!">
			<div class="post-category">
				<i class="fa-brands fa-youtube"></i>
			</div>
			</a>
		</div>
		</a>
		
		<div class="post-info">
			<a href="<?php echo htmlspecialchars($Blog['path']); ?>" class="post-title"><?php echo htmlspecialchars($Blog['short_title']??$Blog['title']); ?></a>
			<p class="post-description">
				<?php echo htmlspecialchars($Blog['excerpt']); ?>
			</p>
			<div class="post-meta">
				<span>
				<i class="icon fa-regular fa-clock fa-lg"></i>
				<?php echo htmlspecialchars($Blog['created_at']); ?>
				</span>

				<span>
				<i class="icon fa-regular fa-comments fa-lg"></i>
				0
				</span>
			</div>
		</div>
	<!-- post-END -->
	</div>
<?php endforeach; ?>
<!-- END - Blog cards Prep -->


<?php 
		// -Store HTML output in response
		$response['html'] = ob_get_clean();
	}

	// -Output the response as JSON
	echo json_encode($response);
?>