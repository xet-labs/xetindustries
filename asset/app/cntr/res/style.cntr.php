<?php

header('Content-Type: text/css');

use xet\Loc;


function combineFiles($files = []) {
    $combinedCss = '';
    foreach ($files as $file) {
        // Check if the file exists and has the correct extension
        if (is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === 'css' && strpos(basename($file), '.prtl') !== false) {

            $combinedCss .= file_get_contents($file);
            // $combinedCss .= '/* ------ [' . basename($file) . ' STRT] ------ */' . "\n" . file_get_contents($file) . "\n" . '/* ------ [' . basename($file) . ' ENDS] ------ */' . "\n";
        }
    }
    return $combinedCss;
}

function minifyCSS($css) {
    // Remove comments, whitespace, tabs, newlines, etc., and unnecessary semicolons
    $minifiedCss = preg_replace([
        '!/\*.*?\*/!s', // Remove comments
        '/\s+/', // Remove extra whitespace
        '/\s*([{};:,])\s*/', // Remove spaces around colons and semicolons
        '/;}/' // Remove unnecessary semicolons
    ], [
        '',
        ' ',
        '$1',
        '}'
    ], $css);
    
    return trim($minifiedCss);
}


//-main
$cssFiles = Loc::file('CSS');

if (is_array($cssFiles)) {
    $css = minifyCSS(combineFiles($cssFiles));

    echo $css;

    // file_put_contents(Loc::path('public') . "/styles.css", $css);
} else {
    echo "// nuii css'o fendoz";
    // -what i mean is no <filename>.prtl.css files were found in the array
}