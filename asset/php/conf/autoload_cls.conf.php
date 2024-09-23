<?php
    spl_autoload_register(function ($_cls) {
        global $FILE;

        $_clsFile = $FILE['CLS'][$_cls];
        if (file_exists($_clsFile)) { include_once($_clsFile); }
    });
?>