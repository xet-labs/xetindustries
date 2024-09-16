<?php
    $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ThisDir = dirname(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file']);

    include_once("autoload_cls.conf.php");
    include_once("paths.conf.php");
    include_once("vars.conf.php");
?>
