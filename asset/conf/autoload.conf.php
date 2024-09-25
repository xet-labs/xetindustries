<?php
    spl_autoload_register(function ($_cls) {
        global $FILE;

        if (file_exists($FILE['CLS'][$_cls])) {
            include_once($FILE['CLS'][$_cls]);
        }
    });
?>