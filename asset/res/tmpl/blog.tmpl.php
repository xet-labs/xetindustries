<?php
use xet\Loc;

require(Loc::file('PRTL', 'head')); ?>

</head>


<body class="blog-body">

	<?php
	require(Loc::file('PRTL', 'scripts-top.body'));
	
	$currentMenu = $subBrand = 'Blog';
	require(Loc::file('PRTL', 'nav'));
	require(Loc::file('PRTL', 'sticky-social'));
	?>

	<main class="main-wrap">
	<!-- Blog-wrapper -->
	<div class="blog-wrap wrap ">
		<div class="con blog-con">
			
			<?php
			require(Loc::file('PRTL', 'header.blog'));
			?>

			<div class="blog-main blog-cnt">
				
			<?php
			// Get the file and directory information of the calling file
			$callFilePath = debug_backtrace()[0]['file'];
			$callFile = basename($callFilePath);
			$callPath = dirname($callFilePath);
			$callDir = basename(dirname($callFilePath));

			// Check for $Page['cnt'] and other possible content inclusions
			if (isset($Page['cnt']) && $Page['cnt']) {
				echo htmlspecialchars($Page['cnt']);

			} elseif (isset($Page['cnt_path']) && $Page['cnt_path']) {
				require($Page['cnt_path']);

			} elseif (file_exists($callPath . '/' . pathinfo($callFile, PATHINFO_FILENAME) . '.cnt.php')) {
				require($callPath . '/' . pathinfo($callFile, PATHINFO_FILENAME) . '.cnt.php');
				
			} elseif (file_exists($callPath . '/content.php')) {
				require($callPath . '/content.php');
				
			} elseif (file_exists($callPath . '/cnt.php')) {
				require($callPath . '/cnt.php');
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