<div class="blog-header">
    
    <!-- Blog Category -->
    <?php $blogCategories = json_decode($Blog['category'], true);
    if (is_array($blogCategories)){ ?>
        <div class="blog-category">
            <?php $blogCategories = array_slice($blogCategories, 0, 4); 
            foreach ($blogCategories as $category): 
            ?>
                <a href="<?= htmlspecialchars($category); ?>">
                    <?= htmlspecialchars($category); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php //else: ?>
    <?php } ?>

        

    <!-- Blog Headline -->
    <h1>
        <?= htmlspecialchars($Blog['title']); ?>
    </h1>

    <!-- Blog Meta -->
    <div class="blog-meta">
        
        <div class="meta-author-img">
            <a href="">
                <img src="<?= htmlspecialchars($Blog['profile_img']); ?>" alt="<?= htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>" loading="lazy" fetchpriority="low">
            </a>
        </div>

        <div class="meta-info">

            <div class="meta-author">
                <!-- <span> -->
                    <a class="meta-author-name" href="">
                        <?= htmlspecialchars($Blog['name'] . " ". $Blog['name_l']); ?>
                    </a>
                <!-- </span> -->

                <span class="seperator"></span>
                
                <!-- <span> -->
                    <a href="" class="blog-u-follow">
                        Follow
                    </a>
                <!-- </span> -->
            </div>

            <div class="meta-date">
                <span>
                    <?= htmlspecialchars(date('F j, Y, g:i A', strtotime($Blog['created_at']))); ?>
                </span>
            </div>
        
        </div>
    </div>


    <figure class="blog-hero">
        <img src="<?= htmlspecialchars($Blog['featured_img']); ?>" alt="<?= htmlspecialchars($Blog['title']); ?>" class="lazyload">
    </figure>
</div>





<script>
    // Function to handle h2 scroll on-click
    document.addEventListener('DOMContentLoaded', () => {
    // Get the root font size once
    const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);
    const offset = 1.5 * rootFontSize; // 1.5em converted to pixels

    // Function to handle the scroll
    function scrollToHeading(event) {
        const heading = event.target;
        const elementTop = heading.getBoundingClientRect().top + window.scrollY;
        const offsetPosition = elementTop - offset;

        window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
        });
    }

    // Attach click event listener to each <h2> element
    document.querySelectorAll('h2').forEach(heading => {
        heading.addEventListener('click', scrollToHeading);
    });
    });

</script>