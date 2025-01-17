<?php
  // $startT = microtime(true);
  use xet\Loc;
  
  $PAGE = [
    'title' => 'Blog',
    'excerpt' => 'Explore insightful articles, inspiring ideas and expert tips. Connect, share, and grow with our community.',
    'jsInc' => [
      Loc::Fileurl('JS','fetch-card-onscroll.blogs'),
      Loc::Fileurl('JS','clickable-card.blogs'),
    ],
    ];
    
    $currentMenu=$subBrand='Blog';
  include_once(Loc::FILE('TMPL','page'));
?>