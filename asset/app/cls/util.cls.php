<?php
namespace xet;

class util {
    // -redirect
    public static function redirect($msg = null, $destUrl = '/') {
        // header("Location: " . $destUrl . "?" . "$msg");
        $url = $msg !== null ? $destUrl . "?" . "$msg" : $destUrl;
        header("Location: " . $url);
        exit();
    }
    
    // -redirect with error
    public static function redirectErr($msg = null, $destUrl = '/') {
        header("Location: " . $destUrl . "?err=" . "$msg");
        exit();
    }

    // -redirect with success message
    public static function redirectSuccess($msg = null, $destUrl = '/') {
        header("Location: " . $destUrl . "?success=" . "$msg");
        exit();
    }

    public static function getTimeAgo($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = [
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        ];
        $result = [];
        foreach ($string as $k => $v) {
            if ($diff->$k) {
                $result[$k] = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }
        }
    
        if (!$full) {
            $result = array_slice($result, 0, 1);
        }
    
        $timeAgo = $result ? implode(', ', $result) . ' ago' : 'just now';
        
        echo htmlspecialchars($timeAgo);
    }
    
}

?>
