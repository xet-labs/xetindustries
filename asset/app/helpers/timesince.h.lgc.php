<?php
$diffInMinutes = (int) $Blog->created_at->diffInMinutes();
$diffInHours = (int) $Blog->created_at->diffInHours();
$diffInDays = (int) $Blog->created_at->diffInDays();
$diffInMonths = (int) $Blog->created_at->diffInMonths();

if ($diffInMinutes < 60) {
    echo '<p>' . $diffInMinutes . ' ' . ($diffInMinutes == 1 ? 'minute' : 'minutes') . ' ago</p>';
} elseif ($diffInHours < 24) {
    echo '<p>' . $diffInHours . ' ' . ($diffInHours == 1 ? 'hour' : 'hours') . ' ago</p>';
} elseif ($diffInDays < 30) {
    echo '<p>' . $diffInDays . ' ' . ($diffInDays == 1 ? 'day' : 'days') . ' ago</p>';
} else {
    echo '<p>' . $diffInMonths . ' ' . ($diffInMonths == 1 ? 'month' : 'months') . ' ago</p>';
}
?>
