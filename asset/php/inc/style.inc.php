<?php
    header('Content-Type: text/css');

    $combinedCss = '/* combined css */' . "\n";
    $combinedCssFile = $PATH['cssx'] . "/styles.css";

    // -merge css files
    foreach ($FILE['CSS'] as $_cssFile) {
        if (file_exists($_cssFile) && pathinfo($_cssFile, PATHINFO_EXTENSION) === 'css' && strpos(basename($_cssFile), '.prtl') !== false) {
            $_cssFileName = basename($_cssFile);
            $combinedCss .= '/* ------ ['.$_cssFileName.' STRT] ------ */' . "\n" . file_get_contents($_cssFile) . "\n" . '/* ------ ['.$_cssFileName.' ENDS] ------ */' . "\n";
        }
    }

    function minifyCSS($css) {
        // Remove comments
        $css = preg_replace('!/\*.*?\*/!s', '', $css);
        // Remove whitespace, tabs, newlines, etc.
        $css = preg_replace('/\s+/', ' ', $css);
        // Remove spaces around colons and semicolons
        $css = preg_replace('/\s*([{};:,])\s*/', '$1', $css);
        // Remove unnecessary semicolons
        $css = preg_replace('/;}/', '}', $css);
        return trim($css);
    }
    
    $_css = minifyCSS($combinedCss)??$combinedCss;
    echo $_css;
    // file_put_contents($combinedCssFile, $_css);
?>