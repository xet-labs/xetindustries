<?php
use xet\util;
use xet\h\timesince;

$blogUrl = !empty($blog->path) ? $blog->path : '/blog/@'.$blog->username.'/'.$blog->slug;
?>

<div class="post" data-href="<?= htmlspecialchars($blogUrl); ?>" tabindex="0" role="link" aria-label="Read more about <?= htmlspecialchars($blog->title); ?>">
		
    <a href="<?= htmlspecialchars($blogUrl); ?>" class="post-img-wrap">
        <div class="post-img">
            <img data-src="<?= htmlspecialchars($blog->featured_img); ?>" alt="<?= htmlspecialchars($blog->title); ?>" loading="lazy" class="lazyload">
        </div>
    </a>
    
    <div class="post-info-wrap">
        <div class="post-info">

            <h3 class="post-title" title="<?= htmlspecialchars($blog->title); ?>">
                <a href="<?= htmlspecialchars($blogUrl); ?>">
                    <?= htmlspecialchars($blog->short_title ?? $blog->title); ?>
                </a>
            </h3>


            <p class="post-excerpt">
                <?= htmlspecialchars($blog->excerpt); ?>
            </p>

            
            <div class="post-meta-wrap">
                <div class="post-meta">

                    <a href="/@<?= htmlspecialchars($blog->username); ?>" class="meta-author-img">
                        <img src="<?= $blog->profile_img; ?>" alt="<?= htmlspecialchars($blog->name . " ". $blog->name_l); ?>" loading="lazy" fetchpriority="low">
                    </a>

                    <div class="meta-info">

                        <div class="meta-author">
                            <a href="/@<?= htmlspecialchars($blog->username); ?>" title="@<?= htmlspecialchars($blog->username); ?>">
                                <?= htmlspecialchars($blog->name . " ". $blog->name_l); ?>
                            </a>

                            <?php if($blog->verified):?>
                                <i class="icon meta-verified" title="Verified">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.15em" viewBox="0 0 24 24" focusable="false" aria-hidden="true" style="pointer-events: none; display: inherit;"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zM9.8 17.3l-4.2-4.1L7 11.8l2.8 2.7L17 7.4l1.4 1.4-8.6 8.5z"></path></svg>
                                </i>
                            <?php endif; ?>
                        </div>

                        <div class="meta-date">
                            <span>
                                <?= util::getTimeAgo($blog->updated_at); ?>
                            </span>
                        </div>
                    
                    </div>

                </div>
            </div>
        
        </div>
    </div>

</div>