<?php 
    use xet\Loc;

	
    $subBrand = isset($subBrand) ? $subBrand : "";
    $currentMenu = isset($currentMenu) ? $currentMenu : 'null';

	$menu_items = array(
		"Home" => "/",
		"Blog" => "/blog",
		"Product" => "pages/product",
		"Support" => "pages/support",
		"Contact" => "pages/contact",
	);
?>



<nav role="navigation">
	<div class="nav navbar">
		
		<!-- Brand Logo -->
		<div class="brand">
			<a href="/#">
				<?php
				readfile(Loc::FILE('BRAND','brand'));
				// readfile(Loc::FILE('BRAND','logo'));
				?>
			</a>

			<?php if (!$subBrand == "") { ?>
				<!-- Sub Brand -->
				<div class="sub-brand-wrap">
					<div class="line-v"></div>
					<div class="sub-brand">
						<a href="<?= $menu_items["$subBrand"]; ?>"><?= $subBrand; ?></a>
					</div>
				</div>
			<?php } ?>
		
		</div>

		<div class="navbar_m">
			<!--  Menu -->
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

			<?php include_once(Loc::FILE('PRTL','search-wdgt')) ?>
			
			<?php include_once(Loc::FILE('PRTL','toast')) ?>

			<?php include_once(Loc::FILE('PRTL','signuplogin')) ?>

			<?php include_once(Loc::FILE('PRTL','theme-switch')) ?>

			<?php include_once(Loc::FILE('PRTL','nav-sidemenu')); ?>

		</div>
	</div>
</nav>