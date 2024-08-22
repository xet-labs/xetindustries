<?php
	include_once("../conf/config.php");

	include_once($CLS['__dbctl']);

	// -get data from the post request
	$BlogsPage=$_POST['BlogsPage']??1;
	$BlogsLimit=$_POST['BlogsLimit']??3;

	// -algo for getting cards data
	$BlogsOffset=($BlogsPage-1)*$BlogsLimit;
	$Blogs = DB_DATA($DBconf['XI'], $DBquery['XI']['Blogs']."LIMIT $BlogsOffset,$BlogsLimit");

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
	// --Blog cards Prep--
	foreach($Blogs as $Blog):
?>

	<div class="post">
		
		<!-- post image -->
		<div class="post-img-wrap">
			<a href="<?php echo htmlspecialchars($Blog['path']); ?>" >
				<div class="post-img">
					<img data-src="<?php echo htmlspecialchars($Blog['featured_img']); ?>" alt="<?php echo htmlspecialchars($Blog['title']); ?>" loading="lazy" class="lazyload">
					<div class="post-img-overlay"></div>
				</div>
				<!-- post category -->
				<a href="#!">
					<div class="post-category">
						<i class="fa-brands fa-youtube"></i>
					</div>
				</a>
			</a>
		</div>
		
		<div class="post-info">

			<a href="<?php echo htmlspecialchars($Blog['path']); ?>" class="post-title">
				<?php echo htmlspecialchars($Blog['short_title']??$Blog['title']); ?>
			</a>

			<p class="post-excerpt">
				<?php echo htmlspecialchars($Blog['excerpt']); ?>
			</p>

			<div class="post-author">
				<div class="post-author-img">
					<img src="<?php echo htmlspecialchars($Blog['author-img']); ?>" alt="<?php echo htmlspecialchars($Blog['author']); ?>" srcset="">
				</div>

				<div class="post-author-data">

				</div>

			</div>
			
			<div class="post-meta">
				<span>
					<i class="icon fa-regular fa-clock fa-lg"></i>
					<?php
						// echo htmlspecialchars(date('F j, Y', strtotime($Blog['created_at'])));
						util::getTimeAgo($Blog['created_at']);
					?>
				</span>

				<span>
					<i class="icon fa-regular fa-comments fa-lg"></i>
					0
				</span>
			</div>
		
		</div>
	
	</div>
	<!-- post-END -->

<?php 
	// END - Blog cards Prep
	endforeach;
?>


<?php 
		// -Store HTML output in response
		$response['html'] = ob_get_clean();
	}

	// -Output the response as JSON
	echo json_encode($response);
?>