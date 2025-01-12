<?php

$PAGE->metaTitle = (
    !empty($PAGE->title) ?
        htmlspecialchars($PAGE->title) .
        (!empty($PAGE->username) ? ' | by ' . htmlspecialchars($PAGE->name . ' ' . $PAGE->name_l) : '') .
        ' | ' . e(config('app.name'))
    : e(config('app.name'))
);
?>

<title><?= $PAGE->metaTitle ?></title>

<?= (!isset($PAGE->canonical) || $PAGE->canonical) ? '<link rel="canonical" href="' . htmlspecialchars(url('/') . $_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8') . '" />' : '' ?>


<?= '<meta name="title" content="' . $PAGE->metaTitle . '" />' ?>

<?= !empty($PAGE->excerpt) ? '<meta name="description" content="' . htmlspecialchars($PAGE->excerpt) . '" />' : ''; ?>

<meta name="robots" content="index,noarchive,follow,max-image-preview:large" />
<meta name="referrer" content="unsafe-url" />

<?php if (!empty($PAGE->is_BLOG) && $PAGE->is_BLOG): ?>
    <?= !empty($PAGE->author) ? '<meta name="author" content="' . htmlspecialchars($PAGE->author) . '" />' : ''; ?>
    <?= !empty($PAGE->author) ? '<link rel="author" href="' . htmlspecialchars($PAGE->author) . '" />' : ''; ?>
    <?= !empty($PAGE->created_at) ? '<meta property="article:published_time" content="' . htmlspecialchars($PAGE->created_at) . '" />' : ''; ?>
<?php endif; ?>

<?= !empty($PAGE->generator) ? '<meta name="generator" content="' . htmlspecialchars($PAGE->generator) . '" />' : ''; ?>

<?= !empty($PAGE->keywords) ? '<meta name="keywords" content="Xet, Xet Industries, XetIndustries, Xtreme Embeded Tech Industries, ' . htmlspecialchars($PAGE->keywords) . '" />' : ''; ?>

<!-- Open Graph -->
<?= !empty($PAGE->canonical) ? '<meta property="og:url" content="' . htmlspecialchars($PAGE->canonical) . '" />' : ''; ?>
<?= !empty($PAGE->title) ? '<meta property="og:title" content="' . htmlspecialchars($PAGE->title) . '" />' : ''; ?>
<?= !empty($PAGE->excerpt) ? '<meta property="og:description" content="' . htmlspecialchars($PAGE->excerpt) . '" />' : ''; ?>
<?= !empty($PAGE->featured_img) ? '<meta property="og:image:secure_url" content="' . htmlspecialchars($PAGE->featured_img) . '" />' : ''; ?>
<?= !empty($PAGE->type) ? '<meta property="og:type" content="' . htmlspecialchars($PAGE->type) . '" />' : ''; ?>
<?= !empty($PAGE->site_name) ? '<meta property="og:site_name" content="' . htmlspecialchars($PAGE->site_name) . '" />' : ''; ?>

<!-- Twitter -->
<?= !empty($PAGE->canonical) ? '<meta name="twitter:url" content="' . htmlspecialchars($PAGE->canonical) . '">' : ''; ?>
<?= !empty($PAGE->title) ? '<meta name="twitter:title" content="' . htmlspecialchars($PAGE->title) . '">' : ''; ?>
<?= !empty($PAGE->excerpt) ? '<meta name="twitter:description" content="' . htmlspecialchars($PAGE->excerpt) . '">' : ''; ?>
<?= !empty($PAGE->featured_img) ? '<meta name="twitter:image" content="' . htmlspecialchars($PAGE->featured_img) . '">' : ''; ?>
<?= !empty($PAGE->site_domain) ? '<meta name="twitter:domain" value="' . htmlspecialchars($PAGE->site_domain) . '" />' : ''; ?>
<?= !empty($PAGE->x['site']) ? '<meta name="twitter:site" content="' . htmlspecialchars($PAGE->x['site']) . '" />' : ''; ?>
<?= !empty($PAGE->x['creator']) ? '<meta name="twitter:creator" content="' . htmlspecialchars($PAGE->x['creator']) . '" />' : ''; ?>

<?php if (!empty($PAGE->is_BLOG) && $PAGE->is_BLOG): ?>
    <?= !empty($PAGE->author) ? '<meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="' . htmlspecialchars($PAGE->author) . '" />' : ''; ?>
    <?= !empty($PAGE->x['category']) ? '<meta name="twitter:label2" value="Category" />
    <meta name="twitter:data2" value="' . htmlspecialchars($PAGE->x['category']) . '" />' : ''; ?>
    <?= !empty($PAGE->created_at_h) ? '<meta name="twitter:label3" value="Published on" />
    <meta name="twitter:data3" value="' . htmlspecialchars($PAGE->created_at_h) . '" />' : ''; ?>
<?php endif; ?>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "publisher": {
        "@type": "Organization",
        "name": "Your Blog Platform Name",
        "logo": {
            "@type": "ImageObject",
            "url": "https://example.com/logo.png"
        }
    },
    "@type": "Organization",
    "name": "Xet Industries",
    "description": "A blog to share latest tech news and articles about technology trends by Xet Industries",
    "url": "https://xet.ilovekulhad.com/blog/mysterium-node-backup-and-restore/#",
    "logo": "https://xet.ilovekulhad.com/res/brand/favicon-192x192.png",
    "sameAs": [
        "http://www.twitter.com",
        "http://www.instagram.com",
        "http://www.youtube.com"
    ],
    "address": {
        "@type": "PostalAddress",
        "postalCode": "734005",
        "streetAddress": "MG road, Shankar More",
        "city": "Siliguri",
        "region": "WestBengal",
        "country": "India"
    }
}
</script>
