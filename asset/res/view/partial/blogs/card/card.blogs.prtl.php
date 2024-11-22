<?php
use xet\Loc;
use xet\util;
?>

<div class="post"  data-href="<?= htmlspecialchars($Blog['path']); ?>" tabindex="0" role="link" aria-label="Read more about <?= htmlspecialchars($Blog['title']); ?>">
		
    <a href="<?= htmlspecialchars($Blog['path']); ?>" class="post-img-wrap">
        <div class="post-img">
            <img data-src="<?= htmlspecialchars($Blog['featured_img']); ?>" alt="<?= htmlspecialchars($Blog['title']); ?>" loading="lazy" class="lazyload">
        </div>
    </a>
    
    <div class="post-info-wrap">
        <div class="post-info">

            <h3 class="post-title" title="<?= htmlspecialchars($Blog['title']); ?>">
                <a href="<?= htmlspecialchars($Blog['path']); ?>">
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
                                <a href="/profile/<?= htmlspecialchars($Blog['uid']); ?>">
                                <!-- title="@<?= htmlspecialchars($Blog['username']); ?>"> -->
                                    <?= htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>
                                </a>

                            <?php if($Blog['verified']):?>
                                <i class="icon meta-verified">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.15em" viewBox="0 0 24 24" focusable="false" aria-hidden="true" style="pointer-events: none; display: inherit;"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zM9.8 17.3l-4.2-4.1L7 11.8l2.8 2.7L17 7.4l1.4 1.4-8.6 8.5z"></path></svg>
                                </i>
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