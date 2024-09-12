<?php include_once($TMPL['head']); ?>

</head>


<body class="body">

  <?php
    include_once($TMPL['nav']);
    // include_once($TMPL['sticky-social']);
  ?>


  <main class="main-wrap">

    <div class="blog-main blog-cnt">
      <?php include_once $ThisDir . '/content.php'; ?>
    </div>

  </main>


  <?php include_once($TMPL['footer']) ?>


</body>

</html> 