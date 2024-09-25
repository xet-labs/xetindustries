<div class="blog-header">
    
    <!-- Blog Category -->
    <?php $blogCategories = json_decode($Blog['category'], true);
    if (is_array($blogCategories)): ?>
        <div class="category">
            <?php $blogCategories = array_slice($blogCategories, 0, 4); 
            foreach ($blogCategories as $category): 
            ?>
                <a href="<?php echo htmlspecialchars($category); ?>">
                    <?php echo htmlspecialchars($category); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- <a href="">
            No cat
        </a> -->
    <?php endif; ?>

        

    <!-- Blog Headline -->
    <h1>
        <?php echo htmlspecialchars($Blog['title']); ?>
    </h1>

    <!-- Blog Meta -->
    <div class="blog-meta">
        
        <div class="meta-author-img">
            <a href="">
                <img src="<?php echo htmlspecialchars($Blog['profile_img']); ?>" alt="<?php echo htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>" loading="lazy" fetchpriority="low">
            </a>
        </div>

        <div class="meta-info">

            <div class="meta-author">
                <span>
                    <a href="">
                        <?php echo htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>
                    </a>
                </span>

                <span class="seperator"></span>
                
                <span>
                    <a href="" class="blog-u-follow">
                        Follow
                    </a>
                </span>
            </div>

            <div class="meta-date">
                <span>
                    <?php
                        echo htmlspecialchars(date('F j, Y, g:i A', strtotime($Blog['created_at'])));
                    ?>
                </span>
            </div>
        
        </div>
    </div>


    <figure class="blog-hero">
        <!-- <img data-src="asset/img/mysterium-node-backup-and-restore.webp" class="lazyload" alt="Xet Industries mysterium-node-backup-and-restore"> -->
        <img src="<?php echo htmlspecialchars($Blog['featured_img']); ?>" alt="<?php echo htmlspecialchars($Blog['title']); ?>">
    </figure>
</div>