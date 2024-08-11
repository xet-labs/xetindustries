<?php
	// require_once("../conf/config.php");

	session_start();
	$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="apple-touch-icon" href="res/brand/favicon-180x180.png" />
	<link rel="icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
	<link rel="icon" type="image/png" sizes="96x96" href="res/brand/favicon-192x192.png" />
	<link rel="icon" type="image/png" sizes="48x48" href="res/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="res/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="res/brand/favicon-48x48.png" />
	<link rel="manifest" href="/manifest.json" />
	<meta name="msapplication-TileColor" content="#ff9700" />
	<meta name="msapplication-TileImage" content="res/brand/xet-color-logo-hr2.svg" />


	<!-- == Style-Sheet == -->
	<?php if(file_exists('xstyle.css')){ ?><link rel="stylesheet" href="xstyle.css"><?php }; ?>

	<?php if(file_exists($INC['style'])){ ?><link rel="stylesheet" href="<?php echo $INC_URL['style'];?>">
	<?php } else { ?><link rel="stylesheet" href="<?php echo $CSS['styles'];?>"><?php }; ?>

	<?php if(file_exists('style.css')){ ?><link rel="stylesheet" type="text/css" href="style.css"><?php }; ?>
	

	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" > -->
	<link rel="stylesheet" href="/res/lib/fontawesome-free-6.5.1-web/css/all.min.css">

	<!-- Tailwind -->
	<!-- <script src="https://cdn.tailwindcss.com"></script> -->

	<!-- == End-Style-Sheet == -->


	<!-- Google-Tag-Manager -->
	<script>(function (w, d, s, l, i) {
	w[l] = w[l] || []; w[l].push({
		'gtm.start':
		new Date().getTime(), event: 'gtm.js'
	}); var f = d.getElementsByTagName(s)[0],
		j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
		'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-NSG89CVQ');</script>
	<!-- END-Google-Tag-Manager -->
