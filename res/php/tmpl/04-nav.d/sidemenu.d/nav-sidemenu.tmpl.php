<div class="navSidebar menu">
    <ul>
        <li class="navSidebarClose">
            <a href="/#" class="brand">
                <?php include_once($BRAND['brand']); ?>
            </a>
            <label for="id-navSidebarCheck" class="button">
                <i class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </i>
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