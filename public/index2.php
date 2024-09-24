<?php
include_once("../asset/php/conf/config.php");

// Define routes and corresponding handlers
$routes = [
    '/'         => 'main',
    '/b'        => 'blog',
    '/blog'     => 'blog',
    '/blog/card-gen'     => 'blogs-card-gen',
    '/styles'   => 'styles',
    '/form'     => 'form',
    '/d'        => 'debug',
    '/debug'    => 'debug',
];

// Get the request URI and strip the query string
$requestUri = $_SERVER['REQUEST_URI'];
$uri = strtok($requestUri, '?');

// Match the requested route with the available routes
$page = route::match($uri, $routes);
// echo $page;
if ($page) {
    switch ($page) {
        case 'main':
            require $FILE['PAGE']['main'];
            break;
        case 'debug':
            require $FILE['PAGE']['debug'];
            break;
        case 'blog':

            // Handle requests to /blog, /blog/, and /b
            if ($uri === '/blog' || $uri === '/blog/' || $uri === '/b') {
                // Load the main blog index page
                require 'blog/index.php';
            } elseif (preg_match('/^\/blog\/([^\/]+)$/', $_uri, $matches)) {
                // Extract the dynamic part after /blog/ (e.g., what_is_seo)
                $postName = $matches[1];
            
                // Construct potential file paths
                $filePhp = __DIR__ . "/blog/$postName.php";        // blog/what_is_seo.php
                $fileIndexPhp = __DIR__ . "/blog/$postName/index.php"; // blog/what_is_seo/index.php
            
                // Check if either blog/what_is_seo.php or blog/what_is_seo/index.php exists
                if (file_exists($filePhp)) {
                    require $filePhp;
                } elseif (file_exists($fileIndexPhp)) {
                    require $fileIndexPhp;
                } else {
                    handlePage(404);
                }
            } else {
                handlePage(404);
            }
            break;
        case 'blogs-card-gen':
            require $FILE['INC']['blogs-card-gen'];
            break;
        case 'styles':
            require $FILE['INC']['style'];
            break;
        case 'form':
            require $FILE['INC']['formctl'];
            break;
        case 'resource':
            $resourcePath = __DIR__ . '/res' . substr($uri, 4);
            if (file_exists($resourcePath)) {
                if (is_file($resourcePath)) {
                    header('Content-Type: ' . mime_content_type($resourcePath));
                    readfile($resourcePath);
                } else {
                    handlePage(403);
                }
            } else {
                handlePage(404);
            }
            break;
    }
} else {
    handlePage(404);
}

// Function to handle 404 and other errors
function handlePage($pageType) {
    global $FILE;
    switch ($pageType) {
        case 404:
            header("HTTP/1.0 404 Not Found");
            require $FILE['PAGE']['404'];
            break;
        case 500:
            header("HTTP/1.0 500 Internal Server Error");
            require $FILE['PAGE']['500'];
            break;
        default:
            header("HTTP/1.0 404 Not Found");
            require $FILE['PAGE']['404'];
            break;
    }
    exit();
}
