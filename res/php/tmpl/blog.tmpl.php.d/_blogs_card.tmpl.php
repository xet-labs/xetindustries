<div class="post">
		
    <!-- post image -->
    <div class="post-img-wrap">
        <a href="<?php echo htmlspecialchars($Blog['path']); ?>" >
            <div class="post-img">
                <img data-src="<?php echo htmlspecialchars($Blog['featured_img']); ?>" alt="<?php echo htmlspecialchars($Blog['title']); ?>" loading="lazy" class="lazyload">
                <div class="post-img-overlay"></div>
            </div>
            <!-- post category -->
            <a href="#!">
                <div class="post-category">
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </a>
        </a>
    </div>
    
    <div class="post-info-wrap">
        <!-- <div class="meta-author-img">
            <a href="">
                <img src="<?php echo htmlspecialchars($Blog['profile_img']); ?>" alt="<?php echo htmlspecialchars($Blog['author']); ?>" loading="lazy" fetchpriority="low">
            </a>
        </div> -->
    
        <div class="post-info">

            <a href="<?php echo htmlspecialchars($Blog['path']); ?>" class="post-title">
                <?php echo htmlspecialchars($Blog['short_title']??$Blog['title']); ?>
            </a>

            <p class="post-excerpt">
                <?php echo htmlspecialchars($Blog['excerpt']); ?>
            </p>

            
            <!-- <div class="post-meta-wrap"> -->
            <div class="post-meta">

                <div class="meta-author-img">
                    <a href="">
                        <img src="<?php echo htmlspecialchars($Blog['profile_img']); ?>" alt="<?php echo htmlspecialchars($Blog['author']); ?>" loading="lazy" fetchpriority="low">
                    </a>
                </div>

                <div class="meta-info">

                    <div class="meta-author">
                        <span>
                            <a href="/profile/<?php echo htmlspecialchars($Blog['uid']); ?>">
                                <?php echo htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>
                            </a>
                        </span>

                        <?php if($Blog['verified']):?>
                            <div class="meta-author-isverified">
                                <?php echo htmlspecialchars($Blog['uid']); ?>

                            </div>
                        <?php endif; ?>


                    </div>

                    <div class="meta-date">
                        <span>
                            <?php
                                // echo htmlspecialchars(date('F j, Y, g:i A', strtotime($Blog['created_at'])));
                                util::getTimeAgo($Blog['created_at']);
                            ?>
                        </span>
                    </div>
                
                </div>

            </div>
            <!-- </div> -->
        
        </div>
    </div>

</div>