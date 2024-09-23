<?php
    // -generate files-path array
    function genFilesPath($directory, $fileExtension) {
        $files = glob($directory . "/*.$fileExtension");
        $fileArray = [];
        foreach ($files as $file) {
            $fileName = basename($file, ".$fileExtension");
            $key = "$fileName";
            $fileArray[$key] = $file;
        }
        return $fileArray;
    }

    // -generate files-path URL
    function genFilesUrl($directory, $fileExtension) {
        $files = glob($directory . "/*.$fileExtension");
        $fileArray = [];
        foreach ($files as $file) {
            // Get the relative path from the base directory
            $relativePath = str_replace(BASE_PATH, '', $file);
            $relativePath = ltrim($relativePath, '/'); // Remove leading slash
            
            // Generate the URL
            $fileName = basename($file, ".$fileExtension");
            $key = "$fileName";
            $fileArray[$key] = ROOT_URL . '/' . $relativePath;
        }
        return $fileArray;
    }



    // -base paths
    $_GLOBALS['BASE_PATH'] = __DIR__ . '/../../..';
    define('BASE_PATH', $_GLOBALS['BASE_PATH']);
    define('RES_PATH', BASE_PATH . '/res');
    define('PHP_PATH', RES_PATH . '/php');
    define('CLS_PATH', PHP_PATH . '/cls');
    define('INC_PATH', PHP_PATH . '/inc');
    define('TMPL_PATH', PHP_PATH . '/tmpl');

    $_GLOBALS['BASE_URL'] = 'https://xetindustries.com';
    define('BASE_URL', $_GLOBALS['BASE_URL']);
    define('ROOT_URL', '');
    define('INC_URL', ROOT_URL . '/res/php/inc/');
    define('CLASS_URL', ROOT_URL . '/res/php/class/');
    define('TMPL_URL', ROOT_URL . '/res/php/tmpl/');

    $_GLOBALS['CONF'] = $_GLOBALS['BASE_PATH'] . '/php/conf/config.php';

    // -gen files path
    $CLS = genFilesPath(CLS_PATH, 'cls.php');
    $INC = genFilesPath(INC_PATH, 'inc.php');
    $TMPL = genFilesPath(TMPL_PATH, 'tmpl.php');

    // -gen files URL
    // $CLS_URL = genFilesUrl(CLS_PATH, 'cls.php');
    $INC_URL = genFilesUrl(INC_PATH, 'inc.php');
    $TMPL_URL = genFilesUrl(TMPL_PATH, 'tmpl.php');

    $SCRIPT = [
        'blogCardsGen' => "res/php/script/_blog_cards_gen.php"
    ];

?>