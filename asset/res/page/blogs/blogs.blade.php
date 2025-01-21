<?php
  // $startT = microtime(true);
  use xet\Loc;
  
  $PAGE = [
    'title' => 'Blog',
    'description' => 'Explore insightful articles, inspiring ideas and expert tips. Write, share, and grow with our community.',
    'jsInc' => [
      Loc::Fileurl('JS','get-card-onscroll.blogs'),
      Loc::Fileurl('JS','clickable-card.blogs'),
    ],
    ];
    
    $currentMenu=$subBrand='Blog';
  include_once(Loc::FILE('TMPL','page'));
?>