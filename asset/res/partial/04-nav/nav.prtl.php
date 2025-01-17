<?php 
    use xet\Loc;

    $subBrand = isset($subBrand) ? $subBrand : "";
    $currentMenu = isset($currentMenu) ? $currentMenu : 'null';

	$menu_items = [
		'Home' => "/",
		'Blog' => "/blog",
		'Product' => "/product",
		'Support' => "/support",
		'Contact' => "/contact",
	];
?>


<nav role="navigation">
	<div class="nav navbar">

		<div class="brand">
			<a href="/" class="b-logo icon"> <?= Loc::FILEo('BRAND','logo') ?> </a>
			<a href="/" class="b-brand"> <?= Loc::FILEo('BRAND','brand') ?> </a>

			<?php if (!empty($subBrand)) { ?>
				<div class="sub-brand-wrap">
					<div class="line-v"></div>
					<div class="sub-brand">
						<a href="<?= $menu_items["$subBrand"]; ?>"><?= $subBrand; ?></a>
					</div>
				</div>
			<?php } ?>
		
		</div>

		<div class="navbar_m">
			<div class="menu">
				<ul>
					
					<?php
					// -loop through $menu_items
					foreach ($menu_items as $label => $href) { ?>
						<li>
						<?php if ($label === $currentMenu) { ?>
							<div class="current-menu">
							<a href="<?= $href; ?>"><?= $label; ?></a>
								<div class="initbar"></div>
							</div>
						<?php } else { ?>
							<a href="<?= $href; ?>"><?= $label; ?></a>
						</li>
					<?php }} ?>

				</ul>
			</div>

		</div>


		<div class="navbar_r">

			<?php
			include_once(Loc::FILE('PRTL','toast.nav'));
			include_once(Loc::FILE('PRTL','search-wdgt.nav'));
			include_once(Loc::FILE('PRTL','signuplogin.nav'));
			include_once(Loc::FILE('PRTL','theme-switch.nav'));
			include_once(Loc::FILE('PRTL','nav-sidemenu.nav'));
			?>

		</div>
	</div>
</nav>