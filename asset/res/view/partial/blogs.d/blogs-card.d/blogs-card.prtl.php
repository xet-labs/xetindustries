<div class="post">
		
    <!-- post image -->
    <a href="<?php echo htmlspecialchars($Blog['path']); ?>">
        <div class="post-img-wrap">
            <div class="post-img">
                <img data-src="<?php echo htmlspecialchars($Blog['featured_img']); ?>" alt="<?php echo htmlspecialchars($Blog['title']); ?>" loading="lazy" class="lazyload">
            </div>
            <!-- post category -->
            <!-- <a href="#!" class="post-category">
                <div class="post-category">
                    <i class="icon">
                        <svg width="1.14em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                    </i>
                </div>
            </a> -->
        </div>
    </a>
    
    <div class="post-info-wrap">
    
        <div class="post-info">

            <h3 class="post-title">
                <a href="<?php echo htmlspecialchars($Blog['path']); ?>">
                    <?php echo htmlspecialchars($Blog['short_title']??$Blog['title']); ?>
                </a>
            </h3>

            <p class="post-excerpt">
                <?php echo htmlspecialchars($Blog['excerpt']); ?>
            </p>

            
            <div class="post-meta-wrap">
                <div class="post-meta">

                    <div class="meta-author-img">
                        <a href="">
                            <img src="<?php echo htmlspecialchars($Blog['profile_img']); ?>" alt="<?php echo htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>" loading="lazy" fetchpriority="low">
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
                                <div class="meta-verified">
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
            </div>
        
        </div>
    </div>

</div>