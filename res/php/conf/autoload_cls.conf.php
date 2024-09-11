<?php
    function clsAutoloader($class) {
        global $CLS;

        $file = $CLS["$class"];
        if (file_exists($file)) { include_once($file); }
    }

    // Register the autoloader function
    spl_autoload_register('clsAutoloader');
?>