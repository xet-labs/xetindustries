<?php

use xet\Loc;
?>
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
                            <input type="text" autocomplete="on"  class="nef-input" maxlength="256" name="name" data-name="newsletter-name" placeholder="Name" id="Newsletter-name-2">
                        </div>
                        <!-- Newsleter Form-input Email -->
                        <div class="nef-email">
                            <input type="email" autocomplete="on"  class="nef-input" maxlength="256" name="email" data-name="newsletter-email" placeholder="Email" id="Newsletter-email-2">

                            <!-- Newsletter Form-Submit -->
                            <div class="con-nef-submit">
                                <input type="submit" style="display:none" name="submit" value="" data-wait="Please wait..." class="nefs-button" id="nefs_button">
                                <label for="nefs_button" class="nefs-button">
                                    <svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.2344 0.239112C8.38442 0.0891352 8.58787 0.00488281 8.8 0.00488281C9.01213 0.00488281 9.21558 0.0891352 9.3656 0.239112L12.5656 3.43911C12.7156 3.58913 12.7998 3.79258 12.7998 4.00471C12.7998 4.21684 12.7156 4.42029 12.5656 4.57031L9.3656 7.77031C9.21472 7.91604 9.01264 7.99667 8.80288 7.99485C8.59312 7.99303 8.39247 7.90889 8.24414 7.76057C8.09582 7.61224 8.01168 7.41159 8.00986 7.20183C8.00804 6.99207 8.08867 6.78999 8.2344 6.63911L10.0688 4.80471H0.8C0.587827 4.80471 0.384344 4.72043 0.234315 4.5704C0.0842854 4.42037 0 4.21688 0 4.00471C0 3.79254 0.0842854 3.58906 0.234315 3.43903C0.384344 3.289 0.587827 3.20471 0.8 3.20471H10.0688L8.2344 1.37031C8.08442 1.22029 8.00017 1.01684 8.00017 0.804712C8.00017 0.592581 8.08442 0.389134 8.2344 0.239112Z" fill="white" />
                                    </svg>

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

<?php
include_once(Loc::FILE('PRTL','scripts.footer'));
include_once(Loc::FILE('PRTL','php.footer'));
?>