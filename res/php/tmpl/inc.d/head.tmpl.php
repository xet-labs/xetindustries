<?php
	session_start();
	$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="apple-touch-icon" href="res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
	<link rel="icon" type="image/png" sizes="96x96" href="res/static/brand/favicon-192x192.png" />
	<link rel="icon" type="image/png" sizes="48x48" href="res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="res/static/brand/favicon-48x48.png" />
	<link rel="manifest" href="/manifest.json" />
	<meta name="msapplication-TileColor" content="#ff9700" />
	<meta name="msapplication-TileImage" content="res/static/brand/xet-color-logo-hr2.svg" />

	<!-- FONTS -->
	<link rel="preload" href="/res/static/fonts/Inter/Inter-VariableFont_slnt_wght.woff2" as="font" type="font/woff2" crossorigin="anonymous"><link rel="preload" href="/res/static/fonts/Wix_Madefor_Text/WixMadeforText-VariableFont_wght.woff2" as="font" type="font/woff2" crossorigin="anonymous">

	<!-- == Style-Sheet == -->

	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" > -->

	
	<?php if ($Page['lib']['tw'] ?? false) { ?>
		<!-- Tailwind CSS -->
		<!-- <script src="https://cdn.tailwindcss.com"></script> -->
    	<link href="/res/lib/tailwind.css" rel="preload" as="stylesheet">
    	<link href="/res/lib/tailwind.css" rel="stylesheet">
	<?php } ?>



	<?php if(file_exists('xstyle.css')){ ?>
		<link href="xstyle.css" rel="preload" as="stylesheet">
		<link href="xstyle.css" rel="stylesheet">
	<?php } ?>

	<?php if(file_exists($INC['style'])){ ?>
		<link href="<?php echo $INC_URL['style'];?>" rel="preload" as="stylesheet">
		<link href="<?php echo $INC_URL['style'];?>" rel="stylesheet">
	<?php } else { ?>
		<link href="<?php echo $CSS['styles'];?>" rel="preload" as="stylesheet">
		<link href="<?php echo $CSS['styles'];?>" rel="stylesheet">
	<?php } ?>

	<?php if(file_exists('style.css')){ ?>
		<link rel="stylesheet" href="style.css" type="text/css">
	<?php } ?>
	

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