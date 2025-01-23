<?php

function issetx($obj, $property) {
  return isset($obj) && property_exists($obj, $property) && $obj->$property !== false;
}

$PAGE->app = rtrim(url('/'), '/');
$PAGE->appName = config('app.name');
$PAGE->appAltName = ["XetIndustries", "Xet Industries", "xet industries", "xetindustries", "Xtreme Embeded Tech Industries"];
$PAGE->appLogo = $PAGE->app . '/res/static/brand/favicon.svg';
$PAGE->appImg = $PAGE->app . '/res/static/brand/brand.svg';
$PAGE->type = issetx($PAGE, 'type') ?  htmlspecialchars($PAGE->type) : 'website';
$PAGE->typeLd = $PAGE->type === 'article' ? 'NewsArticle' : 'WebPage';
$PAGE->canonical = rtrim(issetx($PAGE, 'canonical') ? htmlspecialchars($PAGE->canonical) : $PAGE->app . $_SERVER['REQUEST_URI'], '/');
$PAGE->description = issetx($PAGE, 'description') ? htmlspecialchars($PAGE->description) : htmlspecialchars(!empty($PAGE->excerpt) ? $PAGE->excerpt : '');

$PAGE->tags = !empty($PAGE->tags) ? json_decode($PAGE->tags, true) : '';

if (!empty($PAGE->type) && $PAGE->type === 'article'){
  $PAGE->author = htmlspecialchars(empty($PAGE->author) ? (!empty($PAGE->username) ? $PAGE->name . ' ' . $PAGE->name_l : '') : $PAGE->author);
  $PAGE->authorUrl = htmlspecialchars(empty($PAGE->authorUrl) ? (!empty($PAGE->username) ? $PAGE->app . '/@' . $PAGE->username : '') : $PAGE->authorUrl);
  $PAGE->profile_img = !empty($PAGE->profile_img) ? asset($PAGE->profile_img) : '';
}

$PAGE->metaTitle = htmlspecialchars(!empty($PAGE->title) ? $PAGE->title . (!empty($PAGE->username) ? ' | by ' . $PAGE->author : '') . ' | ' . $PAGE->appName : $PAGE->appName );
$PAGE->featured_img = !empty($PAGE->featured_img) ? asset($PAGE->featured_img) : '';

?>


<title><?= $PAGE->metaTitle ?></title>

<meta name="robots" content="index,noarchive,follow" />
<meta name="referrer" content="unsafe-url" />
<?= issetx($PAGE, 'canonical') ? '<link rel="canonical" href="' . htmlspecialchars($PAGE->canonical) . '" />' : '' ?>

<?= '<meta name="title" content="' . $PAGE->metaTitle . '" />' ?>
<?= !empty($PAGE->description) ? '<meta name="description" content="' . htmlspecialchars($PAGE->description) . '" />' : ''; ?>
<?= !empty($PAGE->tags) ? '<meta name="keywords" content="' . implode(', ', $PAGE->tags) . '" />' : ''; ?>
<?= issetx($PAGE, 'type') ? '<meta property="og:type" content="' . $PAGE->type . '" />' : ''; ?>
<?= !empty($PAGE->title) ? '<meta property="og:title" content="' . htmlspecialchars($PAGE->title) . '" />' : ''; ?>
<?= issetx($PAGE, 'canonical') ? '<meta property="og:url" content="' . $PAGE->canonical . '" />' : ''; ?>
<?= !empty($PAGE->description) ? '<meta property="og:description" content="' . htmlspecialchars($PAGE->description) . '" />' : ''; ?>
<?= !empty($PAGE->featured_img) ? '<meta property="og:image" content="' . htmlspecialchars($PAGE->featured_img) . '" />' : ''; ?>
<?= !empty($PAGE->featured_imgAlt) ? '<meta property="og:image:alt" content="' . htmlspecialchars($PAGE->featured_imgAlt) . '" />' : ''; ?>
<?= issetx($PAGE, 'appName') ? '<meta property="og:site_name" content="' . htmlspecialchars($PAGE->appName) . '" />' : '' ; ?>

<?= !empty($PAGE->title) ? '<meta name="twitter:title" content="' . htmlspecialchars($PAGE->title) . '">' : ''; ?>
<?= !empty($PAGE->x['site']) ? '<meta name="twitter:site" content="' . htmlspecialchars($PAGE->x['site']) . '" />' : ''; ?>
<?= !empty($PAGE->description) ? '<meta name="twitter:description" content="' . htmlspecialchars($PAGE->description) . '">' : ''; ?>
<?= !empty($PAGE->featured_img) ? '<meta name="twitter:image:src" content="' . htmlspecialchars($PAGE->featured_img) . '"><meta name="twitter:card" content="summary_large_image" />' : ''; ?>
<?= !empty($PAGE->featured_imgAlt) ? '<meta name="twitter:image:alt"  content="' . htmlspecialchars($PAGE->featured_imgAlt) . '">' : ''; ?>
<?= !empty($PAGE->x['creator']) ? '<meta name="twitter:creator" content="' . htmlspecialchars($PAGE->x['creator']) . '" />' : ''; ?>
<?= issetx($PAGE, 'canonical') ? '<meta name="twitter:url" content="' . htmlspecialchars($PAGE->canonical) . '">' : ''; ?>
<?= !empty($PAGE->site_domain) ? '<meta name="twitter:domain" value="' . htmlspecialchars($PAGE->site_domain) . '" />' : ''; ?>

<?php if (!empty($PAGE->type) && $PAGE->type === 'article'){ ?>
  <?= !empty($PAGE->username) ? '<meta name="author" content="' . htmlspecialchars($PAGE->author) . '" />' : ''; ?>
  <?= !empty($PAGE->username) ? '<meta property="article:author" content="' . htmlspecialchars($PAGE->authorUrl) . '" />' : ''; ?>
  <?= !empty($PAGE->authorUrl) ? '<link rel="author" href="' . htmlspecialchars($PAGE->authorUrl) . '" />' : ''; ?>
  <?= !empty($PAGE->created_at) ? '<meta property="article:published_time" content="' . htmlspecialchars($PAGE->created_at) . '" />' : ''; ?>

  <?= !empty($PAGE->author) ? '<meta name="twitter:label1" content="Written by" /><meta name="twitter:data1" content="@' . htmlspecialchars($PAGE->author) . '" />' : ''; ?>
  <?= !empty($PAGE->x['category']) ? '<meta name="twitter:label2" value="Category" /><meta name="twitter:data2" value="' . htmlspecialchars($PAGE->x['category']) . '" />' : ''; ?>
  <?= !empty($PAGE->created_at) ? '<meta name="twitter:label3" value="Published on" /><meta name="twitter:data3" value="' . htmlspecialchars($PAGE->created_at) . '" />' : ''; ?>
  <?= !empty($PAGE->reading_time) ? '<meta name="twitter:label4" value="Reading time" /><meta name="twitter:data4" value="' . htmlspecialchars($PAGE->reading_time) . '" />' : ''; ?>
<?php } ?>
  
<script type="application/ld+json">{
  "@context": "https://schema.org",
  "@type": "<?= $PAGE->typeLd ?>",
  "headline": "<?= $PAGE->metaTitle ?>",
  "name": "<?= $PAGE->metaTitle ?>",
  "description": "<?= $PAGE->description ?>",
  <?= !empty($PAGE->featured_img) ? '"image": [ "' . $PAGE->featured_img . '" ],' : ''; ?>
    
  <?php if (issetx($PAGE, 'type') && $PAGE->type === 'article'){ ?>
    "dateCreated":"<?= $PAGE->created_at instanceof \Carbon\Carbon ? $blog->created_at->setTimezone('UTC')->format('Y-m-d\TH:i:s.v\Z') : (new \Carbon\Carbon($blog->created_at))->setTimezone('UTC')->format('Y-m-d\TH:i:s.v\Z'); ?>",
    "datePublished": "<?= $PAGE->created_at instanceof \Carbon\Carbon ? $blog->created_at->setTimezone('UTC')->format('Y-m-d\TH:i:s.v\Z') : (new \Carbon\Carbon($blog->created_at))->setTimezone('UTC')->format('Y-m-d\TH:i:s.v\Z'); ?>",
    "dateModified": "<?= $PAGE->updated_at instanceof \Carbon\Carbon ? $blog->updated_at->setTimezone('UTC')->format('Y-m-d\TH:i:s.v\Z') : (new \Carbon\Carbon($blog->updated_at))->setTimezone('UTC')->format('Y-m-d\TH:i:s.v\Z'); ?>",
    "author": {
      "@type": "Person",
      "name": "<?= $PAGE->author ?>",
      "jobTitle": "Lead PC Hardware Editor","sameAs": ["https://www.xda-developers.com/profile/RS650696"]
      <?= !empty($PAGE->profile_description) ? '"description": "' . $PAGE->profile_description . '",' : ''; ?>
      <?= !empty($PAGE->profile_img) ? '"image": "' . $PAGE->profile_img . '",' : ''; ?>
      "url": "<?= $PAGE->authorUrl ?>"
    },
    
    "articleSection": <?= json_encode($PAGE->tags) ?>,
    "creator":["<?= $PAGE->author ?>"],
    "editor": "<?= $PAGE->author ?>",
  <?php } ?>

  "publisher": {
    "@type": "Organization",
    "name": "<?= $PAGE->appName ?>",
    "alternateName": <?= json_encode($PAGE->appAltName) ?>,
    "url":"<?= $PAGE->app ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?= $PAGE->appImg ?>"
    }
  },
  <?= !empty($PAGE->tags) ? '"keywords": ' . json_encode($PAGE->tags) . ',' : ''; ?>
  <?= (isset($PAGE->isAccessibleForFree) && $PAGE->isAccessibleForFree === false) ? '"isAccessibleForFree": "false",' : '"isAccessibleForFree": "true",'; ?>

  "mainEntityOfPage":"<?= $PAGE->canonical ?>"
}
</script>

