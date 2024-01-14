function cricket_tournament_menu_open() {
  jQuery(".sidenav").addClass('open');
}
function cricket_tournament_menu_close() {
  jQuery(".sidenav").removeClass('open');
}

// ===== Cricblog ====

jQuery('document').ready(function(){
  var owl = jQuery('#static-blog .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: true,
    dots:true,
    navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 2
      },
      1000: {
        items: 2
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

jQuery(function($){
  $(window).load(function() {
    $(".loader").delay(2000).fadeOut("slow");
  })
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.headerbox').attr('data-sticky');
  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.headerbox').addClass("stick_head");
    } else {
      jQuery('.headerbox').removeClass("stick_head");
    }
  }
});