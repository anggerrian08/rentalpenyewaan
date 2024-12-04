(function ($) {
  "use strict";
  //landing header //
  $(".toggle-menu").click(function(){
    $('.landing-menu').toggleClass('open');
  });   
  $(".menu-back").click(function(){
    $('.landing-menu').toggleClass('open');
  });  
  $(".md-sidebar-toggle").click(function(){
    $('.md-sidebar-aside').toggleClass('open');
  });
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 600) {
      $(".tap-top").fadeIn();
    } else {
      $(".tap-top").fadeOut();
    }
  });
  $(".tap-top").click(function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      600
    );
    return false;
  });
})(jQuery);
$(".bg-top").parent().addClass('b-top');
$(".bg-bottom").parent().addClass('b-bottom');
$(".bg-center").parent().addClass('b-center');
$(".bg_size_content").parent().addClass('b_size_content');
$(".bg-img").parent().addClass('bg-size');
$(".bg-img.blur-up").parent().addClass('blur-up lazyload');