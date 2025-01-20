// -Load Blog Cards on-scroll
var blogCardsFetching = false;
var Blogs_Page = 2;
var Blogs_Limit = 6;
var noMoreBlogs = false;

function BlogCards_fetch() {

  if (noMoreBlogs || blogCardsFetching) { return; }

  blogCardsFetching = true;
  $("#blogCards_loading").show().css("opacity", 1);

  $.post("/blog/get-cards", { BlogsPage: Blogs_Page, BlogsLimit: Blogs_Limit }, (response) => {

    response = JSON.parse(response);
    if (response.noMoreBlogs) {
      noMoreBlogs = true;
      $("#blogCards_loading").hide();
    } else {
      $("#BlogCards").append(response.html);
      Blogs_Page++;
    }

    $("#blogCards_loading").css("opacity", 0).hide();
    blogCardsFetching = false;
  });
}

BlogCards_fetch()
$(window).scroll(function () {
  if ($(window).scrollTop() + $(window).height() > $(document).height() - 1200) {
    if (!blogCardsFetching) {
      BlogCards_fetch();
    }
  }
});