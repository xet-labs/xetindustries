<?php

use xet\Loc;
?>
<?php
require(Loc::file('CLS', '__dbctl'));
$Blog = DB_DATA($DBconf['XI'], $DBquery['XI']['Blog'] . $Page['id']);
$Blog = $Blog[0];
?>


<?php require(Loc::file('PRTL', 'head')); ?>

</head>


<body class="blog-body">

	<?php
	$currentMenu = $subBrand = 'Blog';
	require(Loc::file('PRTL', 'nav'));
	require(Loc::file('PRTL', 'sticky-social'));
	?>


	<main class="main-wrap">

		<!-- Blog-wrapper -->
		<div class="blog-wrap wrapper ">
			<div class="con blog-con">

				<?php require(Loc::file('PRTL', '_blog_header')); ?>

				<div class="blog-main blog-cnt">
					<?php
					$calledBy = dirname(debug_backtrace()[0]['file']);
					if (file_exists($calledBy . '/content.php')) {
						require($calledBy . '/content.php');
					} elseif (file_exists($calledBy . '/cnt.php')) {
						require($calledBy . '/cnt.php');
					} elseif ($PAGE['cntPath']) {
						require($PAGE['cntPath']);
					} elseif ($PAGE['cnt']) {
						echo $PAGE['cnt'];
					} else {
						$PAGE['cntPath'] && $PAGE['cnt'] ?? dirname(debug_backtrace()[0]['file']) . '/content.php';
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