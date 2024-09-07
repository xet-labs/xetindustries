<?php

    // - Base variables
    $ROOT = [
        'dir' => '',
        'url' => 'gg.com' 
    ];
    
    $ROOT['path'] = __DIR__ . '/../../..' . $ROOT['dir']; // Must be assigned after initial array setup

    // - Define directories
    $DIR = [
        'root' => $ROOT['dir'],
        'res'  => $ROOT['dir'] . '/res',
        'css'  => $ROOT['dir'] . '/res/css',
        'php'  => $ROOT['dir'] . '/res/php',
        'cls'  => $ROOT['dir'] . '/res/php/cls',
        'inc'  => $ROOT['dir'] . '/res/php/inc',
        'tmpl' => $ROOT['dir'] . '/res/php/tmpl',
        'page' => $ROOT['dir'] . '/res/php/page'
    ];
    
    // - Generate paths using $DIR[]
    $PATH = [];
    foreach ($DIR as $key => $dir) {
        $PATH[$key] = $ROOT['path'] . $dir;
    }

    // - Generate URLs using $DIR[]
    $URL = [];
    foreach ($DIR as $key => $dir) {
        $URL[$key] = $ROOT['url'] . $dir;
    }

    // - Generate files path
    $CSS = genFilesArray(0, [$PATH['css'], $PATH['css']."/inc"], 'tmpl.css');
    $CLS = genFilesArray(0, $PATH['cls'], 'cls.php');
    $INC = genFilesArray(0, $PATH['inc'], 'inc.php');
    $TMPL = genFilesArray(0, $PATH['tmpl'], 'tmpl.php');
    $PAGE = genFilesArray(0, $PATH['page'], 'page.php');

    // - Generate files URL
    $INC_URL = genFilesArray(1, $PATH['inc'], 'inc.php');
    $CSS_URL = genFilesArray(1, [$PATH['css'], $PATH['css']."/inc"], 'tmpl.css');

    //---------------------------------------------------------------------------------- 

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
        global $ROOT;  // Use global ROOT array here
        $fileArray = [];
        foreach ($files as $file) {
            // Get the relative path from the base directory
            $relativePath = str_replace($ROOT['path'], '', $file);
            $relativePath = ltrim($relativePath, '/'); // Remove leading slash
            $key = basename($file, ".$fileExtension");
            $fileArray[$key] = $ROOT['dir'] . '/' . $relativePath;
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
        
        $files = [];
        $fileArray = [];
        foreach ($directories as $dir) {
            if (!is_dir($dir)) { continue; }
            
            if (is_dir($dir . "/inc")) {
                $files = array_merge($files, glob("$dir/inc/*.$fileExtension"));
            }

            // -get files with matching extension in the directory
            $files = array_merge($files, glob("$dir/*.$fileExtension"));
            
            // -get directories with matching extension
            $subdirs = glob("$dir/*.$fileExtension.d", GLOB_ONLYDIR);
            foreach ($subdirs as $subdir) {
                $files = array_merge($files, glob("$subdir/*.$fileExtension"));
            }
                
            $fileArray = array_merge($fileArray, $_genFilesArray($files, $fileExtension));
            
        }
        return $fileArray;
    }

?>
