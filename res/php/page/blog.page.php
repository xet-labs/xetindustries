<?php 
	include_once($CLS['__dbctl']);
	$Blog = DB_DATA($DBconf['XI'], $DBquery['XI']['Blog'] . $Page['id']);
  $Blog = $Blog[0];
?>

<?php include_once($TMPL['head']); ?>


</head>

<body class="blog-body">

  <?php 
    $currentMenu=$subBrand='Blog';
    // -nav & sticky_social
    include_once($TMPL['nav']);
    include_once($TMPL['sticky_social']);
  ?>


  <!-- Main wrapper -->
  <main class="main-wrapper">

    <!-- Blog-wrapper -->
    <div class="blog-wrap wrapper ">
      <div class="con blog-con">

        <?php include_once($TMPL['_blog_header']); ?>

        <div class="blog-main blog-cnt">
          <?php echo $Page['cnt']; ?>
        </div>

        <div class="blogEnd">
          <div class="line-h"></div>
        </div>
      </div>

    </div>
  </main>


  <?php include_once($TMPL['footer']) ?>


</body>

</html> 