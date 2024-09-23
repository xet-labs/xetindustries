  <?php include_once("res/php/conf/config.php"); ?>
  
  <?php include_once($TMPL['head']); ?>


  <title>Xet Industries Blog</title>
  
  <!-- =============== Meta-Begin =============== -->
  <meta name="author" content="Rishikesh Prasad" />
  <!-- <link rel='shortlink' href='' /> -->
  <link rel="canonical" href="https://xet.ilovekulhad.com/blog/" />
  <meta name="description" content="Empowering Tech Enthusiasts with insights on Tech, Linux, Servers, Microcontrollers, and Expert Troubleshooting. Elevate your journey with Xet Industries Blog.">
  <meta name="keywords" content="Tech, Linux, Servers, Microcontrollers, Projects, Troubleshooting, Xet, XetIndustries Blog, Xet Industries blog, Rishikesh Prasad, Web Developer, Blogger, Content Writer">

  <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
  <meta property="og:locale" content="en" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Xet Industries" />
  <meta property="og:title" content="Xet Industries Blog | Tech, Servers, Microcontrollers, Projects and Troubleshooting" />
  <meta property="og:description" content="Empowering Tech Enthusiasts with insights on Tech, Linux, Servers, Microcontrollers, and Expert Troubleshooting. Elevate your journey with Xet Industries Blog." />
  <meta property="og:url" content="/blog/#" />
  <meta property="og:image:type" content="image/svg+xml" />
  <meta property="og:image:width" content="2000" />
	<meta property="og:image:height" content="1500" />
  <meta property="og:image" content="res/brand/xet-color-logo-hr.svg" />
  <!-- Meta Twitter Card -->
  <meta name="twitter:title" content="Xet Industries Blog | Tech, Servers, Microcontrollers, Projects and Troubleshooting">
  <meta name="twitter:description" content="Empowering Tech Enthusiasts with insights on Tech, Linux, Servers, Microcontrollers, and Expert Troubleshooting. Elevate your journey with Xet Industries Blog.">
	<meta name="twitter:creator" content="@xetindustries" />
  <meta name="twitter:site" content="@xetindustries" />
  <meta name="twitter:image" content="res/brand/xet-color-logo-hr.svg">
	<!-- <meta name="twitter:label1" content="Written by" />
  <meta name="twitter:data1" content="Rishikesh Prasad" />
  <meta name="twitter:label2" content="Estimated reading time" />
  <meta name="twitter:data2" content="3 minutes" />
  <meta name="twitter:card" content="summary_large_image" /> -->

  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "website",
    "name": "Xet Industries",
    "description": "Discover the forefront of Tech, Linux mastery, Servers, Microcontrollers, and expert Troubleshooting. Elevate your tech journey with Xet Industries Blog.",
    "url": "https://xet.ilovekulhad.com/blog/",
    "logo": "https://xet.ilovekulhad.comres/brand/favicon-192x192.png",
    "sameAs": [
      "http://www.twitter.com",
      "http://www.instagram.com",
      "http://www.youtube.com"
    ],
    "address":{
      "@type":"PostalAddress",
      "postalCode":"734005",
      "streetAddress":"MG road, Shankar More",
      "city":"Siliguri",
      "region":"WestBengal",
      "country":"India"
    }
  }
  </script>
  <!-- == Meta-End == -->
</head>

<body>

  <!-- nav -->
  <?php 
    $currentMenu=$subBrand='Blog';
    include_once($TMPL['nav']);
  ?>
  

  <!-- Main wrapper -->
  <main class="main-wrapper">

    <h1 class="nodis">
      Discover cutting-edge insights in the realms of Technology, Linux, Servers, Microcontrollers, How-To guides, Troubleshooting, and innovative projects. Dive into the world of expertise with Xet Industries Blog, seamlessly integrated into our main site.
    </h1>
    <p class="nodis">
      Embark on a journey of technological enlightenment with Xet Industries Blog, an integral facet of our overarching online realm. Here, we unravel the latest breakthroughs across diverse domains, from Technology and Linux to Servers, Microcontrollers, and troubleshooting intricacies. Immerse yourself in the wealth of knowledge offered through insightful How-To guides and explore the uncharted territories of innovative projects. Seamlessly integrated into our main site, Xet Industries Blog is your gateway to cutting-edge insights, fostering a deeper understanding of the ever-evolving tech landscape. Stay ahead of the curve and indulge your curiosity with a resource that goes beyond conventional boundaries, delivering expertise at every click.
    </p>

    <!-- Highlights-wrapper -->
    <div class="wrapper highlights-wrapper">

      <div class="con highlights">

        <div class="h-title title" style="align-items: center;justify-content: center;">
          <a href="">
            <i class="material-symbols-rounded icon">stars</i>
            Editors Pick
          </a>
        </div>

        <!-- Highlights-grid -->
        <div class="highlights-grid">

          <!-- post-4 -->
          <div class="post ">
            <a href="#">
              <div class="post-image-wrapper">
                <!-- post image -->
                <div class="post-image"> <img data-src="res/img/p2.webp" class="lazyload" alt="">
                  <div class="post-image-anim"></div>
                </div>
                <!-- post category -->
                <a href="#!">
                  <div class="post-category">
                    <i class="fa-brands fa-youtube"></i>
                  </div>
                </a>
              </div>
            </a>
            <div class="post-info">
              <a href="#" class="post-title">Life of a pie</a>
            
              <div class="post-meta">
                <span>
                  <i class="icon  fa-regular fa-clock fa-lg"></i>
                  10 days ago
                </span>
                <span>
                  <i class="icon  fa-regular fa-comments fa-lg"></i>
                  0
                </span>
              </div>
            </div>
          </div>

          <!-- post-5 -->
          <div class="post highlight">
            <a href="#">
              <div class="post-image-wrapper">
                <!-- post image -->
                <div class="post-image"> <img data-src="res/img/p1.webp" class="lazyload" alt="">
                  <div class="post-image-anim"></div>
                </div>
                <!-- post category -->
                <a href="#!">
                  <div class="post-category">
                    <i class="fa-brands fa-youtube"></i>
                  </div>
                </a>
              </div>
            </a>
            <div class="post-info">
              <a href="#" class="post-title">Lab overview</a>
            
              <div class="post-meta">
                <span>
                  <i class="icon  fa-regular fa-clock fa-lg"></i>
                  10 days ago
                </span>

                <span>
                  <i class="icon  fa-regular fa-comments fa-lg"></i>
                  0
                </span>
              </div>
            </div>
          </div>

          <!-- post-6 -->
          <div class="post highlight">
            <a href="#">
              <div class="post-image-wrapper">
                <!-- post image -->
                <div class="post-image">
                  <img data-src="res/img/p3.webp" class="lazyload" alt="">
                  <div class="post-image-anim"></div>
                </div>
                <!-- post category -->
                <a href="#!">
                  <div class="post-category">
                    <i class="fa-brands fa-youtube"></i>
                  </div>
                </a>
              </div>
            </a>
            <div class="post-info">
              <a href="#" class="post-title">Hacking wifi networks</a>

              <div class="post-meta">
                <span>
                  <i class="icon  fa-regular fa-clock fa-lg"></i>
                  10 days ago
                </span>

                <span>
                  <i class="icon  fa-regular fa-comments fa-lg"></i>
                  0
                </span>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- Con post sidebar -->
    <div class="con-postsidebar">

      <!-- Posts Wrapper -->
      <div class="wrapper con posts-wrapper" id="posts-wrapper">

        <!-- <div class="main-title">
          <a href="">
            <span>TECH</span>
            <span class="subtitle">
              latest news about technology
            </span>
          </a>
        </div> -->

        <!-- Post Category -->
        <div class="posts-category">
          <div class="category-menu">
            <a href="#">Server</a>
          </div>
          <a href="#">See All</a>
        </div>

        <!-- Posts Grid -->
        <div class="posts-grid" id="BlogCards">
          <!-- cards -->
        </div>

        <div class="bouncy-loader" id="blogCards_loading"> <div></div><div></div><div></div> </div>

      <!-- posts wrapper END -->
      </div>

      <!-- Sidebar Wrapper -->
      <div class="sidebar-wrapper">

        <!-- Sidebar-V-Line -->
        <div class="sidebar-v-line"></div>
        
        <div class="sidebar">

        </div>

      </div>


    </div>
  </main>



	<!-- Footer -->
  <?php include_once($TMPL['footer']); ?>


</body>

</html> 