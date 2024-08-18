<?php
    header('Content-Type: text/css');
    require_once("../conf/config.php");
    

    $combinedCss = '/* combined css */' . "\n";
    $combinedCssFile = $PATH['css'] . "/styles.css";

    // -merge css files 
    foreach ($CSS as $cssFile) {
        if (file_exists($cssFile) && pathinfo($cssFile, PATHINFO_EXTENSION) === 'css' && strpos(basename($cssFile), '.tmpl') !== false) {
            $cssFileName = basename($cssFile);
            $combinedCss .= '/* ------ ['.$cssFileName.' STRT] ------ */' . "\n" . file_get_contents($cssFile) . "\n" . '/* ------ ['.$cssFileName.' ENDS] ------ */' . "\n";
        }
    }

    // $minifiedCss = \Minify_CSS::minify($combinedCss);

    echo $combinedCss;
    // file_put_contents($combinedCssFile, $combinedCss);
?>