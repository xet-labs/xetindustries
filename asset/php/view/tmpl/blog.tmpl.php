<?php 
	include_once($FILE['CLS']['__dbctl']);
	$Blog = DB_DATA($DBconf['XI'], $DBquery['XI']['Blog'] . $Page['id']);
  $Blog = $Blog[0];
?>


<?php include_once($FILE['PRTL']['head']); ?>

</head>


<body class="blog-body">

  <?php 
    $currentMenu=$subBrand='Blog';
    include_once($FILE['PRTL']['nav']);
    include_once($FILE['PRTL']['sticky-social']);
  ?>


  <main class="main-wrap">

    <!-- Blog-wrapper -->
    <div class="blog-wrap wrapper ">
      <div class="con blog-con">

        <?php include_once($FILE['PRTL']['_blog_header']); ?>

        <div class="blog-main blog-cnt">
        <?php
          $calledBy = dirname(debug_backtrace()[0]['file']);
          if (file_exists( $calledBy . '/content.php')) {
            include_once($calledBy . '/content.php');
          } elseif (file_exists( $calledBy . '/cnt.php')) {
            include_once($calledBy . '/cnt.php');
          } elseif ($PAGE['cntPath']) {
            include_once($PAGE['cntPath']);
          } elseif ($PAGE['cnt'] ) {
            echo $PAGE['cnt'];
          } else {
            $PAGE['cntPath'] && $PAGE['cnt'] ?? dirname(debug_backtrace()[0]['file']) . '/content.php';
          }
        ?>
        </div>

        <div class="blogEnd">
          <div class="line-h"></div>
        </div>
      </div>

    </div>
  </main>


  <?php include_once($FILE['PRTL']['footer']) ?>


</body>

</html> 