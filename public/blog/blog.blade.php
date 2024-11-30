<?php
  // $startT = microtime(true);
  use xet\Loc;
  
  $Page = [
    'jsFiles' => [
      Loc::Fileurl('JS','fetch-card-onscroll.blogs'),
      Loc::Fileurl('JS','clickable-card.blogs'),
    ]
  ];

  $currentMenu=$subBrand='Blog';
  include_once(Loc::FILE('TMPL','page'));
  exit;
?>