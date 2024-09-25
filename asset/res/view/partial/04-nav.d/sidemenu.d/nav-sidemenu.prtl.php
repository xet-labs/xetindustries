<?php 
    use xet\Loc;
?>

<div class="nav-sidemenu-wrap">

    <input type="radio" name="nav-sidemenu-btn-grp" id="id-nav-sidemenuOpen-btn" class="underlay-btn">
    <label for="id-nav-sidemenuOpen-btn" class="icon">
        <!-- <svg width="1.8em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m11 16.745c0-.414.336-.75.75-.75h9.5c.414 0 .75.336.75.75s-.336.75-.75.75h-9.5c-.414 0-.75-.336-.75-.75zm-9-5c0-.414.336-.75.75-.75h18.5c.414 0 .75.336.75.75s-.336.75-.75.75h-18.5c-.414 0-.75-.336-.75-.75zm4-5c0-.414.336-.75.75-.75h14.5c.414 0 .75.336.75.75s-.336.75-.75.75h-14.5c-.414 0-.75-.336-.75-.75z" /></svg> -->
        <!-- <svg fill="none" width="1.5em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 18.0048C22 18.5544 21.5544 19 21.0048 19H12.9952C12.4456 19 12 18.5544 12 18.0048C12 17.4552 12.4456 17.0096 12.9952 17.0096H21.0048C21.5544 17.0096 22 17.4552 22 18.0048Z" fill="currentColor"/><path d="M22 12.0002C22 12.5499 21.5544 12.9954 21.0048 12.9954H2.99519C2.44556 12.9954 2 12.5499 2 12.0002C2 11.4506 2.44556 11.0051 2.99519 11.0051H21.0048C21.5544 11.0051 22 11.4506 22 12.0002Z" fill="currentColor"/><path d="M21.0048 6.99039C21.5544 6.99039 22 6.54482 22 5.99519C22 5.44556 21.5544 5 21.0048 5H8.99519C8.44556 5 8 5.44556 8 5.99519C8 6.54482 8.44556 6.99039 8.99519 6.99039H21.0048Z" fill="currentColor"/></svg> -->
        <!-- <svg width="1.625em" fill="none" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M1.5 3C1.22386 3 1 3.22386 1 3.5C1 3.77614 1.22386 4 1.5 4H13.5C13.7761 4 14 3.77614 14 3.5C14 3.22386 13.7761 3 13.5 3H1.5ZM1 7.5C1 7.22386 1.22386 7 1.5 7H13.5C13.7761 7 14 7.22386 14 7.5C14 7.77614 13.7761 8 13.5 8H1.5C1.22386 8 1 7.77614 1 7.5ZM1 11.5C1 11.2239 1.22386 11 1.5 11H13.5C13.7761 11 14 11.2239 14 11.5C14 11.7761 13.7761 12 13.5 12H1.5C1.22386 12 1 11.7761 1 11.5Z" fill="currentColor" fill-rule="evenodd"/></svg> -->
        <svg  width="20px" class="feather feather-menu" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
    </label>

    <input type="radio" name="nav-sidemenu-btn-grp" id="id-nav-sidemenuClose-btn">
    <label for="id-nav-sidemenuClose-btn" class="underlay" title="Close"></label>

    <div class="navSidebar">

        <div class="navSidebar-head">
            
            <a href="/#" class="brand"><?php readfile(Loc::FILE('BRAND','brand')); ?></a>
            
            <label for="id-nav-sidemenuClose-btn" class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </label>
            
        </div>
        
        <ul class="navSidebar-main menu">
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
</div>