  <?php include_once("res/php/conf/config.php"); ?>

  <?php include_once($TMPL['head']); ?>
  
  
  <title>Mysterium Node backup & restore - Xet Industries Blog</title>

  <!-- =============== Meta-Begin =============== -->
  <meta name="author" content="Rishikesh Prasad" />
  <!-- <link rel='shortlink' href='' /> -->
  <link rel="canonical" href="https://xet.ilovekulhad.com/blog/mysterium-node-backup-and-restore/#" />
  <meta name="description" content="A beginner's guide to understanding and implementing (SEO) Search Engine Optimization.">
  <meta name="keywords" content="how to make money online, ways to make maney online, Xet, Xet Industries, XetIndustries, XetIndustries blog, Rishikesh Prasad, Web Developer, Blogger, Content Writer" />

  <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
  <meta property="og:locale" content="en" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Xet Industries" />
  <meta property="og:title" content="What is SEO?" />
  <meta property="og:description" content="A beginner's guide to understanding and implementing (SEO) Search Engine Optimization." />
  <meta property="og:url" content="/blog/mysterium-node-backup-and-restore/#" />
  <meta property="og:image" content="asset/img/mysterium-node-backup-and-restore.webp" />
  <meta property="og:image:width" content="740" />
	<meta property="og:image:height" content="423" />
  <meta property="og:image:type" content="image/webp" />
  
  <meta name="twitter:title" content="What is SEO?">
  <meta name="twitter:description" content="A beginner's guide to understanding and implementing (SEO) Search Engine Optimization.">
	<meta name="twitter:creator" content="@xetindustries" />
  <meta name="twitter:site" content="@xetindustries" />
  <meta name="twitter:image" content="asset/img/mysterium-node-backup-and-restore.webp">
	<meta name="twitter:label1" content="Written by" />
	<meta name="twitter:data1" content="Rishikesh Prasad" />
	<meta name="twitter:label2" content="Estimated reading time" />
	<meta name="twitter:data2" content="3 minutes" />
  <!-- <meta name="twitter:card" content="summary_large_image" /> -->

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Xet Industries",
      "description": "A blog to share latest tech news and articles about technology trends by Xet Industries",
      "url": "https://xet.ilovekulhad.com/blog/mysterium-node-backup-and-restore/#",
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
  <!-- =============== Meta-End =============== -->

</head>

<body class="blog-body">

  <!-- nav -->
  <?php 
    $currentMenu=$subBrand='Blog';
    include_once($TMPL['nav']);
  ?>
  
  <!-- sticky_social -->
  <?php include_once($TMPL['sticky_social']); ?>


  <!-- Main wrapper -->
  <main class="main-wrapper">

    <!-- Blog-wrapper -->
    <div class="blog-wrap wrapper ">
      <div class=" con blog-con">

        <div class="blog-header">
          <!-- Blog Category -->
          <div class="blog-category">
            <a href="">MARKETING INSIGHTS</a>
          </div>

          <!-- Blog Heading -->
          <h1>Mysterium node backup & restore</h1>

          <!-- Blog Meta -->
          <ul class="blog-meta">
            <li> Rishikesh Prasad </li>
            <li> <span class="seperator"></span> </li>
            <li>Dec 5, 2022 </li>
            <li> <span class="seperator"></span> </li>
            <li> 14 min read </li>
          </ul>
        </div>

        <div class="blog-cnt">
          <div class="blog-hero">
            <img data-src="asset/img/mysterium-node-backup-and-restore.webp" class="lazyload" alt="Xet Industries mysterium-node-backup-and-restore">
          </div>
          <!-- <p>
            <b>Mysterium Node</b> is a software that allows you to share your internet connection with others. <b>The purpose is to create a decentralized VPN network</b>, where users can access the internet privately and securely, bypassing censorship. <b>In return for sharing your connection, you earn cryptocurrency (MYST token)</b>.
          </p> -->
          <p>
            Backing up your Mysterium node is crucial to ensure that your configs and data are safe in case of system failures or data corruption. This guide will walk you through the steps to back up your Mysterium node on both Windows and Linux platforms.
          </p>
          <h2>
            Backup & restore on Linux       
          </h2>
          <p>
            Mysterium node's config includes active services, account API, current theme etc, while data includes configs, node’s public address, encrypted private key and its encryption details, Message Authentication Code, file id, version etc.
          </p>
          <p>
            <!-- <br> -->
            <!-- Mysterium node stores its: -->
            <!-- <br> -->
            <b><b>Config:</b></b> /etc/mysterium-node/*
            <br>
            <b><b>Data:</b></b> /var/lib/mysterium-node/*
            <br>
          </p>
          <p>
            Copy the contents of “/var/lib/mysterium-node/*”
            sudo tar --exclude={"mainnet/*","*/logs/*"} -cvzf ~/mtst-$(date +"%Y%m%d%H%M%S").tar.gz -C /var/lib/mysterium-node/ .
            The ‘--exclude={"mainnet/*","*/logs/*"}’ excludes unnecessary files

            <h3>To restore</h3>
            sudo tar -xvzf ~/mtst-date.tar.gz -C /var/lib/mysterium-node/ --strip-components=2
          </p>
          <h2>
            Backing up MystNode on linux.    
          </h2>
          <p>
            <b>SEO is the strategic art of enhancing a website's visibility on search engines like Google, Bing, and Yahoo.</b> It involves optimizing various elements to rank higher in search results, driving organic traffic and, ultimately, increasing the chances of converting visitors into customers. 
          </p>
          <h2>
            The Pillars of SEO:
          </h2>
          <p>
            Once you have the foundations of your site ready, you’ll need to pay attention to many small details such as metadata and linking, which can help improve your rankings. This article will cover what it takes to implement those details and make sure that they are meeting SEO standards and eventually SEO ROI.
          </p>
          
          <!-- <div class="cc" style="display: none;"> -->
          <div class="cc">
            <ol>
              <li>
                Share on social media
              </li>
              <li>
                Create a blog newsletter
              </li>
              <li>
                Write for other sites
              </li>
              <li>
                Reach out to an existing community
              </li>
              <li>
                Participate in question and discussion sites
              </li>
              <li>
                Invest in paid ads
              </li>
              <li>
                Try new content formats
              </li>
            </ol>
    
            <p>
              At this stage, you have everything you need to start a blog. These last couple of steps will focus on how to spread the word about your blog it into a serious monetization tool.
            </p>
            
            <h2>Compute Workflow</h2>
            <p>
              A common method of running a reaction-diffusion simulation on the GPU is to use something that I believe is called “texture ping-ponging”. This involves creating two textures. One texture holds the current state of the simulation to be read, and the other stores the result of the current iteration. After each iteration the textures are swapped.
            </p>
            <p>
              This method can also be implemented in WebGL using a fragment shader and framebuffers. However, in WebGPU we can achieve the same thing using a compute shader and storage textures as buffers. The advantage of this is that we can write directly to any pixel within the texture we want. We also get the performance benefits that come with compute shaders.
            </p>
            
            <h2>Initialisation</h2>
            <p>
              The first thing to do is to initialise the pipeline with all the necessary layout descriptors. In addition, all buffers, textures, and bind groups must be set up. The webgpu-utils library really saves a lot of work here.
            </p>
            <p>
              WebGPU does not allow you to change the size of buffers or textures once they have been created. So we have to distinguish between buffers that don’t change in size (e.g., uniforms) and buffers that change in certain situations (e.g., textures when the canvas is resized). For the latter, we need a method to recreate them and dispose the old ones if necessary.
            </p>
            <p>
              All textures used for the reaction-diffusion simulation are a fraction of the size of the canvas (e.g., a quarter of the canvas size). The lower amount of pixels to process frees up computing resources for more iterations. Therefore, a faster simulation with relatively little visual loss is possible.
            </p>
            <p>
              In addition to the two textures involved in the “texture ping-ponging”, there is also a third texture in the demo which I call the seed texture. This texture contains the image data of an HTML canvas on which the clock letters are drawn. The seed texture is used as a kind of influence map for the reaction-diffusion simulation to visualise the clock letters. This texture, as well as the corresponding HTML canvas, must also be recreated/resized when the WebGPU canvas gets resized.
            </p>
          </div>
        
        </div>

        <div class="blogEnd">
          <div class="line-h"></div>
        </div>
        <!-- <div class="line-h"></div> -->
      </div>

    </div>
  </main>



	<!-- Footer -->
  <?php include_once($TMPL['footer']) ?>


</body>

</html> 