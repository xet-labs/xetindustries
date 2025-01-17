<?php 
session_start();
use xet\Loc;


$PAGE = (object) array_merge(
    (array) $PAGE,
    !empty($blog) ? $blog->getAttributes() : []
);


function csslink($cssUrl) { return '
	<link href="' . $cssUrl . '" rel="preload" as="style">
	<link href="' . $cssUrl . '" rel="stylesheet">'
	; }

function jslinkP($jsUrl) { return '
	<link rel="preload" href="' . $jsUrl . '" as="script">
	<script defer src="' . $jsUrl . '" crossorigin="anonymous" referrerpolicy="no-referrer"></script>'
	; }
function jslink($jsUrl) { return '
	<link rel="preload" href="' . $jsUrl . '" as="script">
	<script defer src="' . $jsUrl . '" crossorigin="anonymous" referrerpolicy="no-referrer"></script>'
	; }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php require(Loc::file('PRTL', 'meta.head')); ?>

	<link rel="apple-touch-icon" href="/res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
	<link rel="icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="icon" type="image/png" sizes="96x96" href="/res/static/brand/favicon-192x192.png" />
	<link rel="icon" type="image/png" sizes="48x48" href="/res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="/res/static/brand/favicon-180x180.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="/res/static/brand/favicon-48x48.png" />
	<link rel="manifest" href="/manifest.json" />
	<meta name="msapplication-TileColor" content="#ff9700" />

	<!-- FONTS -->
	<link rel="preload" href="/res/static/fonts/Inter/Inter-VariableFont_slnt_wght.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="/res/static/fonts/Wix_Madefor_Text/WixMadeforText-VariableFont_wght.woff2" as="font" type="font/woff2" crossorigin="anonymous">

	<!--  Style-Sheet  -->
	<?php //csslink(Loc::fileurl('CSS', 'styles')) ?>
	<?= csslink(route('styles.res')) ?>

	<?php if (!empty($PAGE->link) && $PAGE->link !== false) {
		if (is_array($PAGE->link)) { 
			foreach ($PAGE->link as $link) { ?><?= csslink(htmlspecialchars($link)); ?><?php }
		} else { ?><?= csslink(htmlspecialchars($PAGE->link)); ?><?php } ?>
	<?php } ?>

	<?= !empty($PAGE->lib->tw) ? csslink('/res/lib/tailwind.css') : ''; ?>
	<?= !empty($PAGE->lib->fa) ? csslink('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') : ''; ?>
	
	<?php require(Loc::file('PRTL', 'script.head')); ?>

	<meta name="csrf-token" content="<?= csrf_token(); ?>">


</head>