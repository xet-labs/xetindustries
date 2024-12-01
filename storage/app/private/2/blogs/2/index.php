<?php
  use xet\Loc;
  
  $PAGE = [
    'id' => 2,
    'uid' =>2
  ];

  $imgSrc = "media/{$PAGE['uid']}/img/";
  include_once(Loc::FILE('TMPL','blog'));
?>
