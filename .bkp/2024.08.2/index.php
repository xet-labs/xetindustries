<?php
include_once("res/php/conf/config.php");
// include_once($_GLOBALS['CONF']);

?>

<?php include_once($TMPL['head']); ?>

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

  <?php

  echo '<pre>';

  var_dump($CLS);
  var_dump($INC);
  var_dump($TMPL);
  
  echo '</pre>';

  ?>

  
  <!-- loading-anim  -->
  <div class="bouncy-loader"> <div></div><div></div><div></div> </div>

</main>


<!-- Footer -->
<?php include($TMPL['footer']) ?>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="26">
<path d="m11 16.745c0-.414.336-.75.75-.75h9.5c.414 0 .75.336.75.75s-.336.75-.75.75h-9.5c-.414 0-.75-.336-.75-.75zm-9-5c0-.414.336-.75.75-.75h18.5c.414 0 .75.336.75.75s-.336.75-.75.75h-18.5c-.414 0-.75-.336-.75-.75zm4-5c0-.414.336-.75.75-.75h14.5c.414 0 .75.336.75.75s-.336.75-.75.75h-14.5c-.414 0-.75-.336-.75-.75z" /></svg>
</body>

</html> 