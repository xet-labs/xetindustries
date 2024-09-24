<?php

class Util {
    // Static method to redirect
    public static function redirect($msg = null, $destUrl = '/') {
        // header("Location: " . $destUrl . "?" . "$msg");
        $url = $msg !== null ? $destUrl . "?" . "$msg" : $destUrl;
        header("Location: " . $url);
        exit();
    }
    // Static method to redirect with error
    public static function redirectErr($msg = null, $destUrl = '/') {
        header("Location: " . $destUrl . "?err=" . "$msg");
        exit();
    }

    // Static method to redirect with success message
    public static function redirectSuccess($msg = null, $destUrl = '/') {
        header("Location: " . $destUrl . "?success=" . "$msg");
        exit();
    }
}

?>
