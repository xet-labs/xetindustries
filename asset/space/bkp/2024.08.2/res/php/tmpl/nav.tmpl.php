<?php
    // -init variables
    $subBrand = isset($subBrand) ? $subBrand : "";
    $currentMenu = isset($currentMenu) ? $currentMenu : 'Home';  // Default to 'Home' if not set

	$menu_items = array(
		"Home" => "/",
		"Blog" => "/blog",
		"Product" => "pages/product",
		"About" => "pages/about",
		"Support" => "pages/support",
		"Contact" => "pages/contact",
	);
?>



<nav>
	<div class="navbar">
		
		<!-- Brand Logo -->
		<div class="brand">
			<a href="/#"><img class="brandLogo" src="res/brand/xet-black-logo.svg" alt="Xetindustries"></a>

			<?php if (!$subBrand == "") { ?>
				<!-- Sub Brand -->
				<div class="line-v"></div>
				<div class="sub-brand">
					<a href="<?php echo $menu_items["$subBrand"]; ?>"><?php echo $subBrand; ?></a>
				</div>
			<?php } ?>
		
		</div>

		<div class="navbar_m">
			<!--  Menu -->
			<div class="menu">
				<ul>
					
					<?php if (!array_key_exists($currentMenu, $menu_items)) {
						// -if $currentMenu does not exists in $menu_items then set $currentMenu = Home
						$currentMenu = 'Home';
					} 
					
					// -loop through $menu_items
					foreach ($menu_items as $label => $href) { ?>
						<li>
						<?php if ($label === $currentMenu) { ?>
							<div class="current-menu">
							<a href="<?php echo $href; ?>"><?php echo $label; ?></a>
								<div class="initbar"></div>
							</div>
						<?php } else { ?>
							<a href="<?php echo $href; ?>"><?php echo $label; ?></a>
						</li>
					<?php }} ?>

				</ul>
			</div>

		</div>


		<div class="navbar_r">

			<!-- Search bar -->
			<div class="wrap-search-bar">
				<div class="search-bar">

					<input type="checkbox" class="underlayCheckbox" id="SearchSwitch">
					<label for="SearchSwitch" class="underlay"></label>
					<label for="SearchSwitch" class="button">
						<i class="fa-solid fa-magnifying-glass search-icon " id="Search-btn-nav"></i>
					</label>

					<!--============== SEARCH-widget ==============-->
					<div class="search" id="Search">
						<form action="" class="search_form">
							<i class="fa-solid fa-magnifying-glass search_icon" id="Search-btn"></i>
							<input type="search" placeholder="What are you looking for?" class="search_input" autofocus>
						</form>
					</div>


					<form action="" method="get" class="search-form">
						<input type="text" class="search-input" maxlength="256" name="search" placeholder="Search.." id="id_search-input">
						<button type="reset" class="search-reset"></button>
					</form>

				</div>
			</div>
			
			<!-- toast test -->
			<input type="checkbox" style="display:none" class="toast_btn" id="ToastSwitch">
			<label for="ToastSwitch" class="button">
				<i class="fa-solid fa-champagne-glasses" id="Login-btn"></i>
			</label>


			<!-- ===== Login / Signup ===== -->
			<?php include_once($TMPL['__login']) ?>


			<!-- Theme Button -->
			<button id="themeSwitch">
				<span class="themeIcon themeLightIcon">
					<svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" viewBox="0 0 24 24" style="fill: ;transform: ;msFilter:;"><path d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z"></path></svg>
				</span>
				<span class="themeIcon themeDarkIcon">
					<svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" viewBox="0 0 24 24" style="fill: ;transform: ;msFilter:;"><path d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z"></path></svg>
				</span>
			</button>


			<!-- Menu-Sidebar -->
			<input type="checkbox" id="navSidebarCheck"><label for="navSidebarCheck" class="navSidebarUnderlay"></label>

			<!-- NavSidebar-open -->
			<label for="navSidebarCheck" class="navSidebarOpen button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="29"><path d="m11 16.745c0-.414.336-.75.75-.75h9.5c.414 0 .75.336.75.75s-.336.75-.75.75h-9.5c-.414 0-.75-.336-.75-.75zm-9-5c0-.414.336-.75.75-.75h18.5c.414 0 .75.336.75.75s-.336.75-.75.75h-18.5c-.414 0-.75-.336-.75-.75zm4-5c0-.414.336-.75.75-.75h14.5c.414 0 .75.336.75.75s-.336.75-.75.75h-14.5c-.414 0-.75-.336-.75-.75z" /></svg>
				<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"><path d="M22 18.0048C22 18.5544 21.5544 19 21.0048 19H12.9952C12.4456 19 12 18.5544 12 18.0048C12 17.4552 12.4456 17.0096 12.9952 17.0096H21.0048C21.5544 17.0096 22 17.4552 22 18.0048Z" fill="currentColor"/><path d="M22 12.0002C22 12.5499 21.5544 12.9954 21.0048 12.9954H2.99519C2.44556 12.9954 2 12.5499 2 12.0002C2 11.4506 2.44556 11.0051 2.99519 11.0051H21.0048C21.5544 11.0051 22 11.4506 22 12.0002Z" fill="currentColor"/><path d="M21.0048 6.99039C21.5544 6.99039 22 6.54482 22 5.99519C22 5.44556 21.5544 5 21.0048 5H8.99519C8.44556 5 8 5.44556 8 5.99519C8 6.54482 8.44556 6.99039 8.99519 6.99039H21.0048Z" fill="currentColor"/></svg> -->

			</label>

			<!-- NavSidebar-Menu -->
			<div class="navSidebar menu">
				<ul>
					<li class="navSidebarClose">
						<div class="brand themeInv">
							<a href="/#">
								<img class="brandLogo" src="res/brand/xet-black-logo.svg" alt="Xetindustries">
							</a>
						</div>
						<label for="navSidebarCheck" class="button">
							<svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
						</label>
					</li>

					<?php
					// -loop through $menu_items
					foreach ($menu_items as $label => $href) { ?>
						<li>
						<?php if ($label === $currentMenu) { ?>
							<div class="current-menu">
							<a href="<?php echo $href; ?>"><?php echo $label; ?></a>
								<div class="initbar"></div>
							</div>
						<?php } else { ?>
							<a href="<?php echo $href; ?>"><?php echo $label; ?></a>
						</li>
					<?php }} ?>
				
				</ul>
			</div>
			

			<!-- toast-widget -->
			<?php 
				$toastDesc="Report is saved!";
				$toastBtn="Edit report";
				$toastBhref="";
				include_once($TMPL['toast']);
			?>

		</div>

	</div>
	
</nav>