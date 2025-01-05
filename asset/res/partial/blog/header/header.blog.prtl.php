<div class="blog-header">
    
    <!-- Blog Category -->
    <?php $blogTags = json_decode($blog->tags, true);
    if (is_array($blogTags)){ ?>
        <div class="blog-category">
            <?php $blogTags = array_slice($blogTags, 0, 4); 
            foreach ($blogTags as $tag): ?>
                <a href="<?= htmlspecialchars($tag); ?>">
                    <span><?= htmlspecialchars($tag); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    <?php //else: ?>
    <?php } ?>

        

    <!-- Blog Headline -->
    <h1>
        <?= htmlspecialchars($blog->title); ?>
    </h1>

    <!-- Blog Meta -->
    <div class="blog-meta">
        
        <div class="meta-author-img">
            <a href="/@<?= htmlspecialchars($blog->username); ?>">
                <img src="<?= htmlspecialchars($blog->profile_img); ?>" alt="<?= htmlspecialchars($blog->name . " ". $blog->name_l); ?>" loading="lazy" fetchpriority="low">
            </a>
        </div>

        <div class="meta-info">

            <div class="meta-author">
                <a href="/@<?= htmlspecialchars($blog->username); ?>" title="@<?= htmlspecialchars($blog->username); ?>">
                    <?= htmlspecialchars($blog->name . " ". $blog->name_l); ?>
                </a>

                <span class="seperator"></span>
                <a href="" class="author-follow"> Follow </a>

                <?php if($blog->verified):?>
                    <i class="icon meta-verified" title="Verified">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.15em" viewBox="0 0 24 24" focusable="false" aria-hidden="true" style="pointer-events: none; display: inherit;"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zM9.8 17.3l-4.2-4.1L7 11.8l2.8 2.7L17 7.4l1.4 1.4-8.6 8.5z"></path></svg>
                    </i>
                <?php endif; ?>
            </div>

            <div class="meta-date">
                <span>
                    <?= htmlspecialchars(date('F j, Y, g:i A', strtotime($blog->created_at))); ?>
                </span>
            </div>
        
        </div>
    </div>


    <figure class="blog-hero">
        <img src="<?= htmlspecialchars($blog->featured_img); ?>" alt="<?= htmlspecialchars($blog->title); ?>" class="lazyload">
    </figure>
</div>




<script>
    // --handle h2 scroll-at-top on-click
    document.addEventListener('DOMContentLoaded', () => {
    const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);
    const offset = 1.5 * rootFontSize;

    // -Function main
    function scrollToHeading(event) {
        const heading = event.target;
        const elementTop = heading.getBoundingClientRect().top + window.scrollY;
        const offsetPosition = elementTop - offset;

        window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
        });
    }

    // -event listener for each <h2> element
    document.querySelectorAll('h2').forEach(heading => {
        heading.addEventListener('click', scrollToHeading);
    });
    });
</script>