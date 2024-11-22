<?php
use xet\Loc;
?>


<?php require(Loc::file('PRTL', 'head')); ?>

</head>


<body class="blog-body">
	<?php require(Loc::file('PRTL', 'scripts.body')); ?>

	<?php
	$currentMenu = $subBrand = 'Blog';
	require(Loc::file('PRTL', 'nav'));
	require(Loc::file('PRTL', 'sticky-social'));
	?>

	<main class="main-wrap">

		<!-- Blog-wrapper -->
		<div class="blog-wrap wrap ">
			<div class="con blog-con">
				
				<?php
				require(Loc::file('CNTR', 'get-data.blog'));
				require(Loc::file('PRTL', 'header.blog'));
				?>

				<div class="blog-main blog-cnt">
					
				<?php
				// Get the file and directory information of the calling file
				$callFile = debug_backtrace()[0]['file'];
				$callBy = basename($callFile);
				$callDir = dirname($callFile);

				// Check for $PAGE['cnt'] and other possible content inclusions
				if (isset($PAGE['cnt']) && $PAGE['cnt']) {
					echo htmlspecialchars($PAGE['cnt']);

				} elseif (isset($PAGE['cnt_path']) && $PAGE['cnt_path']) {
					require($PAGE['cnt_path']);

				} elseif (file_exists($callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php')) {
					require($callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php');
					
				} elseif (file_exists($callDir . '/content.php')) {
					require($callDir . '/content.php');
					
				} elseif (file_exists($callDir . '/cnt.php')) {
					require($callDir . '/cnt.php');
				}
				?>

				</div>

				<div class="blogEnd">
					<div class="line-h"></div>
				</div>
			</div>

		</div>
	</main>


	<?php require(Loc::file('PRTL', 'footer')) ?>


</body>

</html>