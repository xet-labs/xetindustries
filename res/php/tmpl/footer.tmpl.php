<footer class="footer-wrapper">
  <div class="footer">
    <div class="newsletter-wrapper">
      <div class="newsletter">
        <!-- Newsletter Title & Description -->
        <div class="banner">
          <div class="n-title">
            <span>Weekly&#160;</span> <span>Newspaper.</span>
          </div>

          <div class="n-list">
            <div class="nl-item"><img
                src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605c6a99f6276e3eb7baa930_checkmark.svg"
                loading="lazy" alt="" class="nli-icon-check">
              <div class="nli-text">Travel discounts</div>
            </div>
            <div class="nl-item"><img
                src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605c6a99f6276e3eb7baa930_checkmark.svg"
                loading="lazy" alt="" class="nli-icon-check">
              <div class="nli-text">Business posts</div>
            </div>
            <div class="nl-item"><img
                src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605c6a99f6276e3eb7baa930_checkmark.svg"
                loading="lazy" alt="" class="nli-icon-check">
              <div class="nli-text">Best of culinary</div>
            </div>
            <div class="nl-item"><img
                src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605c6a99f6276e3eb7baa930_checkmark.svg"
                loading="lazy" alt="" class="nli-icon-check">
              <div class="nli-text">Updated tech news</div>
            </div>
          </div>
        </div>

        <!-- Newsletter Emailform-wrapper -->
        <div class="n-emailform">
          <form action="res/php/add.php" method="POST">
            <!-- Newsleter Form-input Name -->
            <div class="nef-name">
              <input type="text" class="nef-input" maxlength="256" name="name" data-name="newsletter-name" placeholder="Name" id="Newsletter-name-2">
            </div>
            <!-- Newsleter Form-input Email -->
            <div class="nef-email">
              <input type="email" class="nef-input" maxlength="256" name="email" data-name="newsletter-email" placeholder="Email" id="Newsletter-email-2">

              <!-- Newsletter Form-Submit -->
              <div class="con-nef-submit">
                <input type="submit" style="display:none" name="submit" value="" data-wait="Please wait..." class="nefs-button" id="nefs_button">
                <label for="nefs_button" class="nefs-button">
                  <img src="res/icon/arrow-right-dark.svg" loading="lazy" alt="ico-sub" class="nefs-icon">
                </label>
              </div>
            </div>


            <div class="nef-success">
              <div>Thank you! Your submission has been received!</div>
            </div>

            <div class="nef-err">
              <div>Oops! Something went wrong while submitting the form.</div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="footer-links">
      <!-- Site Links -->
      <div class="site-links tag">
        <a href="/home/home-1-light">Home</a>
        <a href="/post-grids/2-col-sidebar-light">Posts</a>
        <a href="/about/about-light">About</a>
        <a href="/contact-2/contact-light">Services</a>
      </div>

      <!-- Social Links -->
      <div class="social-links tag">
        <a href="http://www.twitter.com" target="_blank">
          <img
            src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605a7d22bfdeaf266bfbc017_twitter%20-%20light.png"
            loading="lazy" alt="">
          </a>
          <!-- <a href="http://www.facebook.com" target="_blank">
            <img src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605a7d228bff5114fee6b7d6_facebook%20-%20light.png" loading="lazy" alt="">
          </a> -->
          <a href="http://www.instagram.com" target="_blank">
            <img src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605a7d22afd8bd32d4220b0b_instagram%20-%20light.png" loading="lazy" alt="">
          </a>
          <!-- <a href="http://www.spotify.com" target="_blank">
            <img src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605a7d22b8ab6349f47d2e57_spotify%20-%20light.png" loading="lazy" alt="">
          </a> -->
          <a href="http://www.youtube.com" target="_blank">
            <img src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605a7d22a064d81aceb83d58_youtube%20-%20light.png" loading="lazy" alt="">
          </a>
          <a href="http://www.pinterest.com" target="_blank">
            <img src="https://assets.website-files.com/6059daa7fc68d6b5f2d5eda5/605a7d2109dd4901b630721a_pinterest%20-%20light.png"
            loading="lazy" alt="">
          </a>
      </div>

      <!-- Other Links -->
      <div class="tag other-links">
        <a href="https://github.com" target="_blank">
          <img
            src="https://assets-global.website-files.com/6599356db6dc9ea103f4681c/659973ddd931304595a882b0_icon__github--black.svg"
            loading="eager" alt="" class="tag-icon">
          <div>Github</div>
        </a>
        <a href="https://threads.net">
          <img
            src="https://assets-global.website-files.com/6599356db6dc9ea103f4681c/659973e73a288dd4fc132723_icon__threads--black.svg"
            loading="eager" alt="" class="tag-icon">
          <div>Threads</div>
        </a>
        <a href="mailto:youremail@email.com?subject=Define%20-%20Contact">
          <img
            src="https://assets-global.website-files.com/6599356db6dc9ea103f4681c/659973f3c489a49f48894b71_icon__email--black.svg"
            loading="eager" alt="" class="tag-icon">
          <div>Contact</div>
        </a>
      </div>

    </div>

  </div>
</footer>

<!-- =============== Local Libs=============== -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script src="res/lib/jquery/jquery-3.7.1.min.js"></script>
<!-- <script src="res/lib/jquery/jquery-3.7.1.slim.min.js"></script> -->


<?php if (file_exists('xscript.js')): ?><script src="xscript.js"></script><?php endif; ?>
<script src="res/script/script.js"></script>
<?php if (file_exists('script.js')): ?><script src="script.js"></script><?php endif; ?>
<!-- =============== Local Libs-End=============== -->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5P29JVNLQV"></script><script> window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'G-5P29JVNLQV'); </script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NSG89CVQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<!-- Bootstrap -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

