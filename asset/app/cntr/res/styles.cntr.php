<?php

header('Content-Type: text/css');

use xet\Loc;


function combineFiles($files = []) {
    $combinedCss = '';
    foreach ($files as $file) {
        if (is_file($file) && str_contains(basename($file), '.prtl')) {
            $combinedCss .= file_get_contents($file);
            // $combinedCss .= '/* ------ [' . basename($file) . ' STRT] ------ */' . "\n" . file_get_contents($file) . "\n" . '/* ------ [' . basename($file) . ' ENDS] ------ */' . "\n";
        }
    }
    return $combinedCss;
}

function minifyCSS($css) {
    // Remove comments, whitespace, tabs, newlines, etc., and unnecessary semicolons
    return preg_replace([
        '!/\*.*?\*/!s',
        '/\s+/',
        '/\s*([{};:,])\s*/',
        '/;}/'
    ], [
        '',
        ' ',
        '$1',
        '}'
    ], $css);
}


//-main
$cssFiles = Loc::file('CSS');

if (is_array($cssFiles)) {
    
    $css = minifyCSS(combineFiles($cssFiles));
    // file_put_contents(Loc::file('CSSx','styles'), $css);
    echo $css;
} else {
    echo "// nuii css'o fendoz";
    // -so what i meant, no <filename>.prtl.css files were found in the array..
}
exit;