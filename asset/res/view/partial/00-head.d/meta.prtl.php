<?php

use xet\Loc;
?>

<title><?php echo htmlspecialchars($Page['title']); ?></title>

<!-- =============== Meta-Begin =============== -->
<link rel="canonical" href="<?php echo htmlspecialchars($Page['canonical']); ?>" />
<meta name="title" content="<?php echo htmlspecialchars($Page['title']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($Page['excerpt']); ?>">
<meta name="robots" content="index,noarchive,follow,max-image-preview:large" />
<meta name="referrer" content="unsafe-url" />
<?php if ($Page['is_BLOG'] == true): ?>
    <meta name="author" content="<?php echo htmlspecialchars($Page['author']); ?>" />
    <link rel="author" href="<?php echo htmlspecialchars($Page['author']); ?>" />
    <meta property="article:published_time" content="<?php echo htmlspecialchars($Page['created_at']); ?>" />
<?php endif ?>

<meta name="generator" content="<?php echo htmlspecialchars($Page['generator']); ?>" />
<meta name="keywords" content=" Xet, Xet Industries, XetIndustries, Xtreme Embeded Tech Industries, <?php echo htmlspecialchars($Page['keywords']); ?>" />

<!-- Open Graph -->
<meta property="og:locale" content="en" />
<meta property="og:url" content="<?php echo htmlspecialchars($Page['cnonical']); ?>" />
<meta property="og:title" content="<?php echo htmlspecialchars($Page['title']); ?>" />
<meta property="og:description" content="<?php echo htmlspecialchars($Page['excerpt']); ?>" />
<meta property="og:image:secure_url" content="<?php echo htmlspecialchars($Page['featured_img']); ?>" />
<!-- <meta property="og:image:width" content="740" /> -->
<!-- <meta property="og:image:height" content="423" /> -->
<!-- <meta property="og:image:type" content="image/webp" /> -->
<meta property="og:type" content="<?php echo htmlspecialchars($Page['type']); ?>" />
<meta property="og:site_name" content="<?php echo htmlspecialchars($Page['site_name']); ?>" />

<!-- Twitter -->
<meta name="twitter:url" content="<?php echo htmlspecialchars($Page['canonical']); ?>">
<meta name="twitter:title" content="<?php echo htmlspecialchars($Page['title']); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($Page['excerpt']); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($Page['featured_img']); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:domain" value="<?php echo htmlspecialchars($Page['site_domain']); ?>" />
<meta name="twitter:site" content="<?php echo htmlspecialchars($Page['x'['site']]); ?>" />
<meta name="twitter:creator" content="<?php echo htmlspecialchars($Page['x'['creator']]); ?>" />
<?php if ($Page['is_BLOG'] == true): ?>
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="<?php echo htmlspecialchars($Page['author']); ?>" />
    <meta name="twitter:label2" value="Category" />
    <meta name="twitter:data2" value="<?php echo htmlspecialchars($Page['x'['category']]); ?>" />
    <meta name="twitter:label3" value="Published on" />
    <meta name="twitter:data3" value="<?php echo htmlspecialchars($Page['created_at_h']); ?>" />
<?php endif ?>
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
        "logo": "https://xet.ilovekulhad.comres/brand/favicon-192x192.png",
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