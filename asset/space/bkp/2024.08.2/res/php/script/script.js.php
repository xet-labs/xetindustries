<?php
header('Content-Type: application/javascript');

// Example PHP variables
$theme = isset($_GET['theme']) ? $_GET['theme'] : 'light';

// Generate dynamic JavaScript
?>
// -Theme-Manager
document.addEventListener("DOMContentLoaded", function () {

  // Check user's preferred theme
  const brandLogo = document.querySelector('.brandLogo');
  if (localStorage.getItem("theme") === "themeDark") {
    document.body.classList.add("themeDark");
    brandLogo.src = 'res/brand/xet-white-logo.svg';
  }

  // Toggle theme on button click
  document.getElementById("themeSwitch").addEventListener("click", function () {
    document.body.classList.toggle("themeDark");

    // Save user's theme preference
    const theme = document.body.classList.contains("themeDark") ? "themeDark" : "light";
    localStorage.setItem("theme", theme);

    // Switch the logo based on the theme
    if (theme === 'themeDark') {
      brandLogo.src = 'res/brand/xet-white-logo.svg';
    } else {
      brandLogo.src = 'res/brand/xet-black-logo.svg';
    }
  });
});

// -Moving nav stick-horizontal
$(document).ready(function() {
  $(window).on('load resize', function() {
    var $thisnav = $('.navbar_m .current-menu').offset().left;

    $('.navbar_m .menu a').hover(function() {
      var $left = $(this).offset().left - $thisnav;
      var $width = $(this).outerWidth();
      var $start = 0;
      $('.navbar_m .initbar').css({ 'left': $left , 'width': $width });
    }, function() {
      var $initwidth = $('.navbar_m .current-menu').width();
      $('.navbar_m .initbar').css({ 'left': '0' , 'width': $initwidth });
    });
  });
});

// -Moving nav stick-vertical
$(document).ready(function() {
  $(window).on('load resize', function() {
    var $thisnav = $('.navbar_r .current-menu').offset().top; 

    $('.navbar_r .menu a').hover(function() {
      var $top = $(this).offset().top - $thisnav;
      var $height = $(this).outerHeight();
      $('.navbar_r .initbar').css({ 'top': $top , 'height': $height });
    }, function() {
      var $initheight = $('.navbar_r .current-menu').height();
      $('.navbar_r .initbar').css({ 'top': '0' , 'height': $initheight });
    });
  });
});

// -Load Blog Cards
var blogCards_fetching = false;
var Blogs_Page = 1;
var Blogs_Limit = 3;
var noMoreBlogs = false;

function BlogCards_fetch() {
  if (noMoreBlogs) { return; }

  $("#blogCards_loading").show().css("opacity", 1);

  $.post("res/php/_blog_cards_gen.php", { BlogsPage: Blogs_Page, BlogsLimit: Blogs_Limit }, (response) => {
    response = JSON.parse(response);
    if (response.noMoreBlogs) {
      noMoreBlogs = true;
      $("#blogCards_loading").hide();
    } else {
      $("#BlogCards").append(response.html);
      Blogs_Page++;
    }

    $("#blogCards_loading").css("opacity", 0).hide();
    blogCards_fetching = false;
  });
}

BlogCards_fetch();
$(window).scroll(function() {
  if ($(window).scrollTop() + $(window).height() > $(document).height() - 1200) {
    if (!blogCards_fetching) {
      BlogCards_fetch();
    }
  }
});

// -scroll animation (commented out)
// const sAnim = document.querySelectorAll(".sAnim")
// const observer = new IntersectionObserver(entries => {
//   entries.forEach(entry => {
//     const intersecting = entry.isIntersecting
//     entry.target.style.backgroundColor = intersecting ? "blue" : "orange"
//   })
// })
// observer.observe(document.getElementById(".sAnim"))

// -lazysizes - v5.3.2
!function(e) {
  // (lazySizes code)
}(window);
