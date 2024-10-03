<?php
use xet\Loc;
use xet\util;
?>
<!-- <a href="<?= htmlspecialchars($Blog['path']); ?>" class="post"> -->
<div class="post">
		
    <a href="<?= htmlspecialchars($Blog['path']); ?>" class="post-img-wrap">
        <div class="post-img">
            <img data-src="<?= htmlspecialchars($Blog['featured_img']); ?>" alt="<?= htmlspecialchars($Blog['title']); ?>" loading="lazy" class="lazyload">
        </div>
    </a>
    
    <div class="post-info-wrap">
        <div class="post-info">

            <h3 class="post-title">
                <a href="<?= htmlspecialchars($Blog['path']); ?>" title="<?= htmlspecialchars($Blog['title']); ?>">
                    <?= htmlspecialchars($Blog['short_title'] ?? $Blog['title']); ?>
                </a>
            </h3>


            <p class="post-excerpt">
                <?= htmlspecialchars($Blog['excerpt']); ?>
            </p>

            
            <div class="post-meta-wrap">
                <div class="post-meta">

                    <a href="/profile" class="meta-author-img">
                        <img src="<?= $Blog['profile_img']; ?>" alt="<?= htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>" loading="lazy" fetchpriority="low">
                    </a>

                    <div class="meta-info">

                        <div class="meta-author">
                            <span>
                                <a href="/profile/<?= htmlspecialchars($Blog['uid']); ?>" title="<?= htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>">
                                    <?= htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>
                                </a>
                            </span>

                            <?php if($Blog['verified']):?>
                                <div class="meta-verified">
                                    <?= htmlspecialchars($Blog['uid']); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="meta-date">
                            <span>
                                <?= util::getTimeAgo($Blog['created_at']); ?>
                            </span>
                        </div>
                    
                    </div>

                </div>
            </div>
        
        </div>
    </div>

</div>
<!-- </a> -->