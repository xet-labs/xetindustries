<?php
use xet\Loc;
?>

<?php require(Loc::file('PRTL','head')); ?>
</head>

<body class="body">
	<?php require(Loc::file('PRTL', 'scripts.body')); ?>

	<?php
	require(Loc::file('PRTL','nav'));
	// require(Loc::file('PRTL','sticky-social']);
	?>


	<main class="main-wrap">

		<?php
		// Get the file and directory information of the calling file
		$callFile = debug_backtrace()[0]['file'];
		$callBy = basename($callFile);
		$callDir = dirname($callFile);

		// Check for $PAGE['cnt'] and other possible content inclusions
		if (isset($PAGE['cnt']) && $PAGE['cnt']) {
			eval($PAGE['cnt']);
			
		} elseif (isset($PAGE['cnt_path']) && $PAGE['cnt_path']) {
			include($PAGE['cnt_path']);

		} elseif (file_exists($callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php')) {
			require($callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php');
			// readfile($callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php');


		} elseif (file_exists($callDir . '/content.php')) {
			require($callDir . '/content.php');

		} elseif (file_exists($callDir . '/cnt.php')) {
			require($callDir . '/cnt.php');
		}
		?>

	</main>


	<?php require(Loc::file('PRTL','footer')) ?>

</body>

</html>