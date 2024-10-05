<?php

spl_autoload_register(function ($class) {
    $prefix = 'xet\\';  // Your namespace prefix
    $baseDir = __DIR__ . '/';  // Base directory for class files

    // Check if the class uses the xet namespace
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // If no, move to the next registered autoloader
        return;
    }

    // Get the relative class name (without the namespace prefix)
    $relative_class = substr($class, $len);

    // Convert namespace separators to directory separators
    $file = str_replace('\\', '/', $relative_class) . '.cls.php';

    // Search for the file in the base directory and subdirectories
    $fullFilePath = recursiveClassSearch($baseDir, $file);

    if ($fullFilePath) {
        require_once $fullFilePath;
    }
});


function recursiveClassSearch($dir, $fileName) {
    // Use RecursiveDirectoryIterator to search subdirectories
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    
    foreach ($iterator as $file) {
        if ($file->getFilename() === $fileName) {
            return $file->getPathname();
        }
    }
    return false;  // Return false if the file is not found
}
