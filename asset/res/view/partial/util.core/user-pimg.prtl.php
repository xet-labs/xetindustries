<?php 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

// echo Auth::user()->profile_image ? Storage::url(Auth::user()->profile_image) : '/default/profile.png';

$seed=$username??$Blog['name'];
echo 'https://api.dicebear.com/9.x/pixel-art/png?seed='.$seed;
?>