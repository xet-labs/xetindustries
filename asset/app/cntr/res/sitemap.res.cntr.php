<?php

use App\Models\Blog;
use xet\Loc;

$sitemapBuffer = $sitemapBuffe ?? 1;
$pages = [
    ['/', '2024-04-01', 'daily', 0.5],
    ['/blog', '2024-04-01', 'daily', 0.5],
    ['/about', '2024-04-01', 'monthly', 0.5],
    ['/contact', '2024-04-01', 'monthly', 0.5],
    ['/service', '2024-04-01', 'monthly', 0.5],
];

// Fetching blogs
$blogs = Blog::join('users', 'blogs.uid', '=', 'users.uid')
    ->select(
        'blogs.slug',
        'blogs.path',
        'blogs.updated_at',
        'users.username', 
    )
    ->where('blogs.status', 'published')
    ->orderBy('blogs.created_at', 'desc')
    ->get();

// Merging pages and blogs into one array
$urls = collect($pages)->map(function($page) {
    return [
        'loc' => config('app.url') . $page[0],
        'lastmod' => $page[1],
        'changefreq' => $page[2],
        'priority' => $page[3],
    ];
})->merge($blogs->map(function($blog) {
    $blogUrl = !empty($blog->path) ? $blog->path : '/blog/@' . $blog->username . '/' . $blog->slug;
    return [
        'loc' => config('app.url') . htmlspecialchars($blogUrl),
        'lastmod' => $blog->updated_at instanceof \Carbon\Carbon ? $blog->updated_at->toAtomString() : date(DATE_ATOM, strtotime($blog->updated_at)),
        'changefreq' => 'daily',
        'priority' => 0.8,
    ];
}))->all(); // Merge the pages and blogs into one collection

// Now you can loop through all URLs with a single loop
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';


foreach ($urls as $url) { ?>
    <url>
        <loc><?= htmlspecialchars($url['loc'])  ?></loc>
        <lastmod><?= htmlspecialchars($url['lastmod']) ?></lastmod>
        <changefreq><?= htmlspecialchars($url['changefreq']) ?></changefreq>
        <priority><?= htmlspecialchars($url['priority']) ?></priority>
    </url>
<?php };

echo '</urlset>';
exit;