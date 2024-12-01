<?php
  use xet\Loc;
  
  $PAGE = [
    'id' => 3,
    'uid' =>3
  ];

  $imgSrc = "media/{$PAGE['uid']}/img/";
  include_once(Loc::FILE('TMPL','blog'));
?>
