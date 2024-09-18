<?php

    // - Base variables
    $ROOT = [
        'dir' => '',
        'url' => 'xetindustries.com',
        'domain' => 'xetindustries.com'
    ];
    
    $ROOT['path'] = __DIR__ . '/../../..' . $ROOT['dir'];

    // - Define directories
    $DIR = [
        'root'  => $ROOT['dir'],
        'res'   => $ROOT['dir'] . '/res',
        'lib'   => $ROOT['dir'] . '/res/lib',
        'css'   => $ROOT['dir'] . '/res/css',
        'js'   => $ROOT['dir'] . '/res/js',
        'php'   => $ROOT['dir'] . '/res/php',
        'cls'   => $ROOT['dir'] . '/res/php/cls',
        'inc'   => $ROOT['dir'] . '/res/php/inc',
        'tmpl'  => $ROOT['dir'] . '/res/php/tmpl',
        'page'  => $ROOT['dir'] . '/res/php/page',
        'brand' => $ROOT['dir'] . '/res/static/brand'
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
    $BRAND = genFileArray('PATH', [$PATH['brand']], 'svg');
    $CSS = genFileArray('PATH', [$PATH['css'], $PATH['tmpl']], 'tmpl.css');
    $CLS = genFileArray('PATH', $PATH['cls'], 'cls.php');
    $INC = genFileArray('PATH', $PATH['inc'], 'inc.php');
    $TMPL = genFileArray('PATH', $PATH['tmpl'], 'tmpl.php');
    $PAGE = genFileArray('PATH', $PATH['page'], 'page.php');

    // - Generate files URL
    $INC_URL = genFileArray('URL', $PATH['inc'], 'inc.php');
    $JS_URL = genFileArray('URL', $PATH['js'], 'js');






    //---------------------------------------------------------------------------------- 

    // - h.gen files-path array
    function _genFilePathArray($files, $_fileExtension) {
        $fileArray = [];
        foreach ($files as $file) {
            $key = basename($file, ".$_fileExtension");
            $fileArray[$key] = $file;
        }
        return $fileArray;
    }

    // - h.gen files-url array
    function _genFileUrlArray($files, $_fileExtension) {
        global $ROOT;  // Use global ROOT array here
        $fileArray = [];
        foreach ($files as $file) {
            // Get the relative path from the base directory
            $relativePath = str_replace($ROOT['path'], '', $file);
            $relativePath = ltrim($relativePath, '/'); // Remove leading slash
            $key = basename($file, ".$_fileExtension");
            $fileArray[$key] = $ROOT['dir'] . '/' . $relativePath;
        }
        return $fileArray;
    }

    // - Generate files array (URL or Path)
    function genFileArray($_type = 'PATH', $_dirs, $_fileExtension, $_subdirs = []) {
        
        if (!is_array($_dirs)) { $_dirs = [$_dirs]; }

        switch ($_type) {
            case 'URL':
                $_genFileArray = '_genFileUrlArray';
                break;
            default:
                $_genFileArray = '_genFilePathArray';
                break;
        }
            
        $files = [];
        $fileArray = [];
        $subdirs = [];
        foreach ($_dirs as $dir) {
            
            if (!is_dir($dir)) { continue; }
            
            if (is_dir($dir . "/inc.d")) {
                $subdirs = array_merge($subdirs, [$dir . "/inc.d"]);
            }

            // -inc dirs with ".d"
            $subdirs = array_merge($subdirs, glob("$dir/*.d", GLOB_ONLYDIR));
            $subdirs = array_merge($subdirs, glob("$dir/*/*.d", GLOB_ONLYDIR));
            //$subdirs = glob("$dir/*.$_fileExtension.d", GLOB_ONLYDIR); // -inc dirs with ."file_extnsn"
            
            // -get files with fileExtension in the dir
            $files = array_merge($files, glob("$dir/*.$_fileExtension"));
            
            foreach ($subdirs as $subdir) {
                $files = array_merge($files, glob("$subdir/*.$_fileExtension"));
            }
            
            $fileArray = array_merge($fileArray, $_genFileArray($files, $_fileExtension));
                   
        }
        // echo "<pre>"; var_dump($_dirs);var_dump($fileArray); echo "</pre>";
        return $fileArray;
    }

?>
