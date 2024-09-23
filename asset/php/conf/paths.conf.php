<?php

// Base variables
$BASE = [
    'domain'=> 'xetindustries.com',
    'root'  => realpath(__DIR__ . '/../../..'),
    'public'=> realpath(__DIR__ . '/../../..') . '/public',
];

$DIR = [
    'cls'   => '/asset/php/cls',
    'inc'   => '/asset/php/inc',
    'page'  => '/asset/php/view/page',
    'prtl'  => '/asset/php/view/partial',
    'tmpl'  => '/asset/php/view/tmpl',
    'css'   => '/asset/css',
    'js'    => '/asset/js',
];

$DIR_url = [
    'pagex' => '/page',
    'incx'  => '/res/php/inc',
    'cssx'  => '/res/css',
    'jsx'   => '/res/js',
    'libx'  => '/res/lib',
    'brand' => '/res/static/brand',
];


$PATH = array_merge(
    $BASE,
    array_map(fn($dir) => $BASE['root'] . $dir, $DIR),
    array_map(fn($DIR_url) => $BASE['public'] . $DIR_url, $DIR_url)
);

$PATH_url = array_merge(
    $BASE,
    array_map(fn($DIR_url) => $BASE['public'] . $DIR_url, $DIR_url)
);


$VIEW = [
    'TMPL'  => genFilePath('PATH', $PATH['tmpl'], 'tmpl.php'),
    'PAGE'  => genFilePath('PATH', [$PATH['page'], $PATH['pagex']], 'page.php'),
    'PAGEx' => genFilePath('PATH', $PATH['pagex'], 'page.php'),
    'PRTL'  => genFilePath('PATH', $PATH['prtl'], 'prtl.php'),
];

$FILE = [
    'CLS'   => genFilePath('PATH', $PATH['cls'], 'cls.php'),
    'INC'   => genFilePath('PATH', $PATH['inc'], 'inc.php'),
    'INCx'  => genFilePath('PATH', $PATH['incx'], 'inc.php'),
    'CSS'   => genFilePath('PATH', [$PATH['css'], $PATH['cssx'], $PATH['prtl']], 'prtl.css'),
    'CSSx'  => genFilePath('PATH', $PATH['cssx'], 'css'),
    'JS'    => genFilePath('PATH', [$PATH['js'], $PATH['jsx']], 'js'),
    'JSx'   => genFilePath('PATH', $PATH['jsx'], 'js'),
    'LIBx'  => genFilePath('PATH', $PATH['libx'], ''),
    'BRAND' => genFilePath('PATH', [$PATH['brand']], 'svg'),
];

$FILE = array_merge_recursive($FILE, $VIEW);

$FILE_url = [
    'INC'   => genFilePath('URL', $PATH['incx'], 'inc.php'),
    'BRAND' => genFilePath('URL', [$PATH['brand']], 'svg'),
    'CSS'   => genFilePath('URL', $PATH['cssx'], 'css'),
    'JS'    => genFilePath('URL', $PATH['jsx'], 'js'),
];



// ----------------helper-func----------------

// -gen files-path
function _genFilePath($files, $fileExtension, $isUrl = false) {
    global $PATH;
    $fileArray = [];
    
    foreach ($files as $file) {
        $key = basename($file, ".$fileExtension");
        $fileArray[$key] = $isUrl ? '/' . ltrim(str_replace([$PATH['public'], $PATH['root']], '', $file), '/') : $file;
    }
    
    return $fileArray;
}

// -gen files (url or path) array
function genFilePath($type = 'PATH', $dirs, $fileExtension) {
    $dirs = (array) $dirs;
    $files = [];
    
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) continue;

        // Gather files and subdirectories
        $files = array_merge($files, glob("$dir/*.$fileExtension"));
        $subdirs = array_merge(
            glob("$dir/*.d", GLOB_ONLYDIR),
            glob("$dir/*/*.d", GLOB_ONLYDIR)
        );

        foreach ($subdirs as $subdir) {
            $files = array_merge($files, glob("$subdir/*.$fileExtension"));
        }
    }

    return _genFilePath($files, $fileExtension, $type === 'URL');
}

?>
