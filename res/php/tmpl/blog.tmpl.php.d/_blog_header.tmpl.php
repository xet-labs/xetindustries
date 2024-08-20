<pre>
<?php 
	// $Blog = DB_DATA($DBconf['XI'], $DBquery['XI']['Blog'] . $Page['id']);
    // var_dump($Blog)
?>
</pre>

<div class="blog-header">
    <!-- Blog Category -->
    <div class="category">
        <?php $blogCategories = json_decode($Blog['category'], true);
        if (is_array($blogCategories)): ?>
            <?php $blogCategories = array_slice($blogCategories, 0, 4); 
            foreach ($blogCategories as $category): 
            ?>
                <a href="<?php echo htmlspecialchars($category); ?>">
                    <?php echo htmlspecialchars($category); ?>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <a href="">
                No cat
            </a>
        <?php endif; ?>

        
    </div>

    <!-- Blog Headline -->
    <h1>
        <?php echo htmlspecialchars($Blog['title']); ?>
    </h1>

    <!-- Blog Meta -->
    <div class="blog-meta2">
        <div class="blog-meta-img">
            <a href="">
                <img src="<?php echo htmlspecialchars($Blog['author-img']); ?>" alt="<?php echo htmlspecialchars($Blog['author']); ?>" loading="lazy" fetchpriority="low">
            </a>
        </div>
        <div class="blog-meta-info">

            <div class="blog-meta-author">
                <span>
                    <a href="">
                        <?php //echo htmlspecialchars($Blog['author']); ?>
                        <?php echo htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>
                    </a>
                </span>
            </div>

            <div class="blog-meta-date">
                <span>
                    <?php echo htmlspecialchars($Blog['created_at']); ?>
                </span>
            </div>
        
        </div>
    </div>

    <ul class="blog-meta">
        <li> 
            <a href="" style="font-weight:inherit"><?php echo htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?></a>
        </li>

        <li> <span class="seperator"></span> </li>

        <li>
            Dec 5, 2022
        </li>

        <li> <span class="seperator"></span> </li>

        <li>
            14 min read
        </li>
    </ul>

    <figure class="blog-hero">
        <!-- <img data-src="asset/img/mysterium-node-backup-and-restore.webp" class="lazyload" alt="Xet Industries mysterium-node-backup-and-restore"> -->
        <img src="<?php echo htmlspecialchars($Blog['featured_img']); ?>" alt="<?php echo htmlspecialchars($Blog['title']); ?>">
    </figure>
</div>