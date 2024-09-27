<?php
use xet\Loc;
?>

<?php require(Loc::file('PRTL','head')); ?>
</head>

<body class="body">

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
			// If $PAGE['cnt'] is set, display its content
			echo $PAGE['cnt'];
		} elseif (isset($PAGE['cnt_path']) && $PAGE['cnt_path']) {
			// If $PAGE['cnt_path'] is set, include the file it points to
			require($PAGE['cnt_path']);
		} elseif (file_exists($callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php')) {
			// If a file like debug.cnt.php exists, include it
			require($callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php');
		} elseif (file_exists($callDir . '/content.php')) {
			// Include the generic content.php file if it exists
			require($callDir . '/content.php');
		} elseif (file_exists($callDir . '/cnt.php')) {
			// Include the generic cnt.php file if it exists
			require($callDir . '/cnt.php');
		}
		// echo "<pre>";
		// echo $callFile;
		// echo "\n";
		// echo $callDir . '/' . pathinfo($callBy, PATHINFO_FILENAME) . '.cnt.php';
		// echo "</pre>";
		?>

	</main>


	<?php require(Loc::file('PRTL','footer')) ?>

</body>

</html>