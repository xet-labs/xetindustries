<?php 
	session_start();
    use xet\Loc;
	
	function linkStylesheet($cssFile) {
		return '<link href="' . $cssFile . '" rel="preload" as="style"><link href="' . $cssFile . '" rel="stylesheet">';
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>xetindustries | </title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="apple-touch-icon" href="/res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
	<link rel="icon" type="image/png" sizes="96x96" href="/res/static/brand/favicon-192x192.png" />
	<link rel="icon" type="image/png" sizes="48x48" href="/res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="/res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="/res/static/brand/favicon-48x48.png" />
	<link rel="manifest" href="/manifest.json" />
	<meta name="msapplication-TileColor" content="#ff9700" />
	<meta name="msapplication-TileImage" content="/res/static/brand/xet-color-logo-hr2.svg" />

	<!-- FONTS -->
	<link rel="preload" href="/res/static/fonts/Inter/Inter-VariableFont_slnt_wght.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/res/static/fonts/Wix_Madefor_Text/WixMadeforText-VariableFont_wght.woff2" as="font" type="font/woff2" crossorigin="anonymous">

	<!-- == Style-Sheet == -->

	<?= file_exists(Loc::file('CNTR', 'styles')) ? linkStylesheet(route('styles.res')) : linkStylesheet(Loc::fileurl('CSS', 'styles')); ?>

	
	<?php if (!empty($Page['link']) && $Page['link'] !== false) {
		if (is_array($Page['link'])) { 
			foreach ($Page['link'] as $link) { ?><?= linkStylesheet(htmlspecialchars($link)); ?><?php }
		} else { ?><?= linkStylesheet(htmlspecialchars($Page['link'])); ?><?php } ?>
	<?php } ?>

	
	<?= !empty($Page['lib']['tw']) ? linkStylesheet('/res/lib/tailwind.css') : ''; ?>
	<?= !empty($Page['lib']['fa']) ? linkStylesheet('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') : ''; ?>
	


	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-23MMMZRSHB"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-23MMMZRSHB'); </script>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-P4ZM2NDC');</script>
	<!-- End Google Tag Manager -->
	 

	<meta name="csrf-token" content="<?= csrf_token(); ?>">