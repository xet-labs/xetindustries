<?php include_once($FILE['PRTL']['head']); ?>

</head>


<body class="body">

  <?php
    include_once($FILE['PRTL']['nav']);
    // include_once($FILE['PRTL']['sticky-social']);
  ?>


  <main class="main-wrap">
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

  </main>


  <?php include_once($FILE['PRTL']['footer']) ?>

</body>

</html> 