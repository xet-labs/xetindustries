<?php

    // - Base variables
    define('DIR_ROOT', '');
    define('PATH_ROOT', __DIR__ . '/../../..' . DIR_ROOT);
    define('URL_ROOT', '');

    // - Define directories
    $DIR = [
        'root' => DIR_ROOT,
        'res'  => DIR_ROOT . '/res',
        'css'  => DIR_ROOT . '/res/css',
        'php'  => DIR_ROOT . '/res/php',
        'cls'  => DIR_ROOT . '/res/php/cls',
        'inc'  => DIR_ROOT . '/res/php/inc',
        'tmpl' => DIR_ROOT . '/res/php/tmpl'
    ];
    
    // - Generate paths using $DIR[]
    $PATH = [];
    foreach ($DIR as $key => $dir) {
        $PATH[$key] = PATH_ROOT . $dir;
    }

    // - Generate URLs using $DIR[]
    $URL = [];
    foreach ($DIR as $key => $dir) {
        $URL[$key] = URL_ROOT . $dir;
    }

    // - Generate files path
    $CSS = genFilesArray(0, [$PATH['css'], $PATH['css']."/inc"], 'css');
    $CLS = genFilesArray(0, $PATH['cls'], 'cls.php');
    $INC = genFilesArray(0, $PATH['inc'], 'inc.php');
    $TMPL = genFilesArray(0, $PATH['tmpl'], 'tmpl.php');

    // - Generate files URL
    $INC_URL = genFilesArray(1, $PATH['inc'], 'inc.php');
    $CSS_URL = genFilesArray(1, [$PATH['css'], $PATH['css']."/inc"], 'tmpl.css');








    // - Helper to generate files-path array
    function _genFilesPathArray($files, $fileExtension) {
        $fileArray = [];
        foreach ($files as $file) {
            $key = basename($file, ".$fileExtension");
            $fileArray[$key] = $file;
        }
        return $fileArray;
    }

    // - Helper to generate files-url array
    function _genFilesUrlArray($files, $fileExtension) {
        $fileArray = [];
        foreach ($files as $file) {
            // Get the relative path from the base directory
            $relativePath = str_replace(PATH_ROOT, '', $file);
            $relativePath = ltrim($relativePath, '/'); // Remove leading slash
            $key = basename($file, ".$fileExtension");
            $fileArray[$key] = DIR_ROOT . '/' . $relativePath;
        }
        return $fileArray;
    }

    // - Generate files array (URL or Path)
    function genFilesArray($type = 0, $directories, $fileExtension) {

        if (!is_array($directories)) {
            $directories = [$directories];
        }

        switch ($type) {
            case 1:
                $_genFilesArray = '_genFilesUrlArray';
                break;
            default:
                $_genFilesArray = '_genFilesPathArray';
                break;
        }
        
        $fileArray = [];
        foreach ($directories as $directory) {
            if (!is_dir($directory)) { continue; }
            
            // Get all files with the specified extension in the directory
            $files = glob($directory . "/*.$fileExtension");
            
            $fileArray = array_merge($fileArray, $_genFilesArray($files, $fileExtension));
            
            if (!is_dir($directory. "/inc")) { ;
                $files = glob($directory . "/inc" . "/*.$fileExtension");
                $fileArray = array_merge($fileArray, $_genFilesArray($files, $fileExtension));
            } 
        }
        return $fileArray;
    }
    
?>
