<?php
$PAGE->appName = htmlspecialchars(empty($PAGE->appName) ? config('app.name') : $PAGE->appName); 
$PAGE->author = htmlspecialchars(empty($PAGE->author) ? (!empty($PAGE->username) ? $PAGE->name . ' ' . $PAGE->name_l : '') : $PAGE->author);
$PAGE->authorUrl = htmlspecialchars(empty($PAGE->authorUrl) ? (!empty($PAGE->username) ? url('/') . '/@' . $PAGE->username : '') : $PAGE->authorUrl);
$PAGE->canonicalUrl = htmlspecialchars(empty($PAGE->canonicalUrl) ? url('/') . $_SERVER['REQUEST_URI'] : '');
$PAGE->metaTitle = htmlspecialchars(!empty($PAGE->title) ? $PAGE->title . (!empty($PAGE->username) ? ' | by ' . $PAGE->author : '') . ' | ' . $PAGE->appName : $PAGE->appName );
?>

<title><?= $PAGE->metaTitle ?></title>

<?= empty($PAGE->canonical) ? '<link rel="canonical" href="' . htmlspecialchars($PAGE->canonicalUrl) . '" />' : '' ?>
<?= '<meta name="title" content="' . $PAGE->metaTitle . '" />' ?>
<?= !empty($PAGE->excerpt) ? '<meta name="description" content="' . htmlspecialchars($PAGE->excerpt) . '" />' : ''; ?>

<?php if (!empty($PAGE->type) && $PAGE->type === 'article'): ?>
    <?= !empty($PAGE->username) ? '<meta name="author" content="' .  htmlspecialchars($PAGE->author) . '" />' : ''; ?>
    <?= !empty($PAGE->authorUrl) ? '<link rel="author" href="' . htmlspecialchars($PAGE->authorUrl) . '" />' : ''; ?>
    <?= !empty($PAGE->created_at) ? '<meta property="article:published_time" content="' . htmlspecialchars($PAGE->created_at) . '" />' : ''; ?>
<?php endif; ?>

<meta name="robots" content="index,noarchive,follow" />
<?= !empty($PAGE->keywords) ? '<meta name="keywords" content="xet industries, xetindustries, Xet Industries, XetIndustries, Xtreme Embeded Tech Industries, ' . htmlspecialchars($PAGE->keywords) . '" />' : ''; ?>

<?= empty($PAGE->type) ? '<meta property="og:type" content="website" />' : '<meta property="og:type" content="' . $PAGE->type . '" />'; ?>
<?= empty($PAGE->canonical)? '<meta property="og:url" content="' . $PAGE->canonicalUrl . '" />' : ''; ?>
<?= !empty($PAGE->title) ? '<meta property="og:title" content="' . htmlspecialchars($PAGE->title) . '" />' : ''; ?>
<?= !empty($PAGE->excerpt) ? '<meta property="og:description" content="' . htmlspecialchars($PAGE->excerpt) . '" />' : ''; ?>
<?= !empty($PAGE->featured_img) ? '<meta property="og:image:secure_url" content="' . htmlspecialchars($PAGE->featured_img) . '" />' : ''; ?>
<?= '<meta property="og:site_name" content="' . htmlspecialchars($PAGE->appName) . '" />' ; ?>

<?= empty($PAGE->canonical) ? '<meta name="twitter:url" content="' . htmlspecialchars($PAGE->canonicalUrl) . '">' : ''; ?>
<?= !empty($PAGE->title) ? '<meta name="twitter:title" content="' . htmlspecialchars($PAGE->title) . '">' : ''; ?>
<?= !empty($PAGE->excerpt) ? '<meta name="twitter:description" content="' . htmlspecialchars($PAGE->excerpt) . '">' : ''; ?>
<?= !empty($PAGE->featured_img) ? '<meta name="twitter:image" content="' . htmlspecialchars($PAGE->featured_img) . '">' : ''; ?>
<?= !empty($PAGE->site_domain) ? '<meta name="twitter:domain" value="' . htmlspecialchars($PAGE->site_domain) . '" />' : ''; ?>
<?= !empty($PAGE->x['site']) ? '<meta name="twitter:site" content="' . htmlspecialchars($PAGE->x['site']) . '" />' : ''; ?>
<?= !empty($PAGE->x['creator']) ? '<meta name="twitter:creator" content="' . htmlspecialchars($PAGE->x['creator']) . '" />' : ''; ?>

<?php if (!empty($PAGE->type) && $PAGE->type === 'article'): ?>
    <?= !empty($PAGE->author) ? '<meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="' . htmlspecialchars($PAGE->author) . '" />' : ''; ?>
    <?= !empty($PAGE->x['category']) ? '<meta name="twitter:label2" value="Category" />
    <meta name="twitter:data2" value="' . htmlspecialchars($PAGE->x['category']) . '" />' : ''; ?>
    <?= !empty($PAGE->created_at) ? '<meta name="twitter:label3" value="Published on" />
    <meta name="twitter:data3" value="' . htmlspecialchars($PAGE->created_at) . '" />' : ''; ?>
<?php endif; ?>

<!-- <script type="application/ld+json">
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
    "url": "https://xetindustries.com/blog/mysterium-node-backup-and-restore/#",
    "logo": "https://xetindustries.com/res/brand/favicon-192x192.png",
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
</script> -->
