<?php
include_once("res/php/helper.php");
?>

<?php include($TMPL['head']); ?>

<title>Xet Industries</title>

<!-- =============== Meta-Begin =============== -->
<meta name="author" content="Rishikesh Prasad" />
<!-- <link rel='shortlink' href='' /> -->
<link rel="canonical" href="https://xet.ilovekulhad.com/#" />
<meta name="description" content="Discover the forefront of Tech, Linux mastery, Servers, Microcontrollers, and expert Troubleshooting. Elevate your tech journey with Xet Industries.">
<meta name="keywords" content="Linux, Tech, Tips, Servers, Troubleshooting, Xet, Xet Industries, XetIndustries, Rishikesh Prasad, Web Developer, Blogger, Content Writer">

<!-- =============== Meta-End =============== -->
</head>

<body>

<!-- nav -->
<?php include($TMPL['nav']); ?>


<main class="main-wrapper" >

  <!-- loading-anim  -->
  <div class="bouncy-loader"> <div></div><div></div><div></div> </div>


  <?php
    include_once("res/php/class/t1.class.php");
  ?>

  <?php
  $zet = new Owner();  
  // echo "<pre>".var_dump($zet)."</pre>";

  echo '<pre>';
  var_dump($TMPL);
  echo '</pre>';

  ?>


</main>


<!-- Footer -->
<?php include($TMPL['footer']) ?>


</body>

</html> 