<?php
    function customError($errno, $errstr, $errfile, $errline) {
        $logMessage = "[" . date('Y-m-d H:i:s') . "] PHP Error [Type $errno]:\n";
        $logMessage .= "Message: $errstr\n";
        $logMessage .= "File: $errfile\n";
        $logMessage .= "Line: $errline\n";
        $logMessage .= str_repeat("-", 40) . "\n";  // Separator line

        // Log to a file, e.g., an Nginx log file or a custom location
        error_log($logMessage, 3, "/var/log/nginx/xetindustries.com.4000.err.log");
    }

    set_error_handler("customError");
?>