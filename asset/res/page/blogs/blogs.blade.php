<?php
  // $startT = microtime(true);
  use xet\Loc;
  
  $PAGE = [
    'title' => 'Blog',
    'jsInc' => [
      Loc::Fileurl('JS','fetch-card-onscroll.blogs'),
      Loc::Fileurl('JS','clickable-card.blogs'),
      'canonical'=> false
    ]
  ];

  $currentMenu=$subBrand='Blog';
  include_once(Loc::FILE('TMPL','page'));
?>