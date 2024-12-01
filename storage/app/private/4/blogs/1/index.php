<?php
  use xet\Loc;
  
  $PAGE = [
    'id' => 1,
    'uid' =>4,
    'title' => 'What is SEO? A beginers guide to search engine optimization',
  ];

  $imgSrc = "media/{$PAGE['uid']}/img/";
  include_once(Loc::FILE('TMPL','blog'));
?>

