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
                <a class="meta-author-name" href="/@<?= htmlspecialchars($blog->username); ?>" title="@<?= htmlspecialchars($blog->username); ?>">
                    <?= htmlspecialchars($blog->name . " ". $blog->name_l); ?>
                </a>

                <span class="seperator"></span>
                
                <a href="" class="blog-u-follow">
                    Follow
                </a>
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