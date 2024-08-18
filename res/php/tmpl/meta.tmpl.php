<?php ?>

<title><?php echo htmlspecialchars($Page['title']); ?></title>

<!-- =============== Meta-Begin =============== -->
<link rel="canonical" href="<?php echo htmlspecialchars($Page['canonical']); ?>" />
<link rel="author" href="<?php echo htmlspecialchars($Page['author']); ?>" />
<meta property="article:published_time" content="<?php echo htmlspecialchars($Page['created_at']); ?>" />

<meta name="title" content="A<?php echo htmlspecialchars($Page['title']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($Page['excerpt']); ?>">
<meta name="author" content="<?php echo htmlspecialchars($Page['author']); ?>" />
<meta name="robots" content="index,noarchive,follow,max-image-preview:large" />
<meta name="referrer" content="unsafe-url" />
<meta name="generator" content="<?php echo htmlspecialchars($Page['generator']); ?>" />
<meta name="keywords" content=" Xet, Xet Industries, XetIndustries, Xtreme Embeded Tech Industries" />

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
<meta name="twitter:site" content="<?php echo htmlspecialchars($Page[x['site']]); ?>" />
<meta name="twitter:creator" content="<?php echo htmlspecialchars($Page[x['creator']]); ?>" />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="<?php echo htmlspecialchars($Page['author']); ?>" />
<meta name="twitter:label2" value="Category" />
<meta name="twitter:data2" value="<?php echo htmlspecialchars($Page[x['category']]); ?>" />
<meta name="twitter:label3" value="Published on" />
<meta name="twitter:data3" value="<?php echo htmlspecialchars($Page['created_at_h']); ?>" />

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
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
    "address":{
      "@type":"PostalAddress",
      "postalCode":"734005",
      "streetAddress":"MG road, Shankar More",
      "city":"Siliguri",
      "region":"WestBengal",
      "country":"India"
    }
  }
</script>