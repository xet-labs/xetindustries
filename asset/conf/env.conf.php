<?php

return [
    'siteName' => 'My Awesome Site',
    'adminEmail' => 'admin@example.com',
    'currentUrl' => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
    '_DIR' => dirname(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file'])
];
    


    define('_DIR', dirname(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file']));


    
    $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $_dir_ = dirname(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file']);
    


?>