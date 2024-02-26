/*=============================================>>>>>
= FUNCTION for before js load =
===============================================>>>>>*/

(function($) {
    'use strict';

    function PagePreloader() {
      jQuery('body').removeClass('no-js');
    }
    jQuery(window).load(function($) {
      var animateButton = function(e) {

        e.preventDefault;
        //reset animation
        e.target.classList.remove('animate');

        e.target.classList.add('animate');
        setTimeout(function(){
          e.target.classList.remove('animate');
        },700);
      };

      var bubblyButtons = document.getElementsByClassName("bubbly-button");

      for (var i = 0; i < bubblyButtons.length; i++) {
        bubblyButtons[i].addEventListener('click', animateButton, false);
      }
    });
  }

)(window.jQuery);

/* --------------------------------------------
MAIN FUNCTION
-------------------------------------------- */

jQuery(document).ready(function($) {
  //call foundation 6
  $(document).foundation();


  /*----------- flexslider for featured slider -----------*/



  // Add css class
  $('.single-nav .nav-links').addClass('grid-x');
  $('.single-nav .nav-links .nav-previous').addClass('cell large-6 small-12 float-left nav-left');
  $('.single-nav .nav-links .nav-next').addClass('cell large-6 small-12 float-right nav-right');
  $('.woocommerce-pagination ul.page-numbers').addClass('pagination');
  $('#respond.comment-respond .form-submit input#submit').addClass('bubbly-button');



  // animationfor menu dropdown
  $('.head-bottom-area .dropdown.menu>li.opens-right').hover(function() {
    $('.head-bottom-area .dropdown.menu>li.opens-right>.is-dropdown-submenu>li.is-dropdown-submenu-item').addClass('animated fadeInUp');
  });

  // animation for stiky menu
  $('.head-bottom-area').on('sticky.zf.stuckto:top', function() {
    $(this).addClass(' fadeInDown');
  }).on('sticky.zf.unstuckfrom:top', function() {
    $(this).removeClass(' fadeInDown');
  })

  // animation for stiky menu
  $('.reveal.reveal-menu').on('open.zf.reveal', function() {
    $(this).addClass(' fadeInDown');
  }).on('closed.zf.reveal', function() {
    $(this).removeClass(' fadeInDown');
  })

  // ---------------------------------------------------------------
  // SlideUpTopBar for Foundation top-bar
  // ---------------------------------------------------------------

  var $window = $(window);
  var didScroll;
  var lastScrollTop = 20;
  var scrollAmount = 10; // Value of scroll amount
  var navbarHeight = $('.mobile-menu .sticky.is-stuck').outerHeight();

  $(window).scroll(function(event) {
    didScroll = true;
  });

  setInterval(function() {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {

    "use strict";

    var sup = $(window).scrollTop();

    if (Math.abs(lastScrollTop - sup) <= scrollAmount) return;

    if (sup > lastScrollTop && sup > navbarHeight) {
      // On Scroll Down
      $('.mobile-menu .sticky.is-stuck').css({
        top: -$(window).outerHeight()
      });
    } else {
      // On Scroll Up
      if (sup + $(window).height() < $(document).height()) {
        $('.mobile-menu .sticky.is-stuck').css({
          top: 0
        });
      }
    }
    lastScrollTop = sup;
  }

     // Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using [gallery link="file"] so that a Lightbox Gallery exists
     $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').fancybox();


     // scrollup
     jQuery(window).bind("scroll", function() {
       if (jQuery(this).scrollTop() > 800) {
         jQuery(".scroll_to_top").fadeIn('slow');
       } else {
         jQuery(".scroll_to_top").fadeOut('fast');
       }
     });
     jQuery(".scroll_to_top").click(function() {
       jQuery("html, body").animate({
         scrollTop: 0
       }, "slow");
       return false;
     });

});
/*= End of Main JS =*/
/*=============================================<<<<<*/

/*----------- search Bar animation -----------*/

jQuery(document).ready(function($) {
  var $wrap = $('[open-search]');
  var $close = $('[close-search]');
  $close.on('click', function() {
    $wrap.toggleClass('open');
  });
  $("#btnStats").click($("#dvStats").css("display", "block"));
});

( function( $ ) {
	'use strict';

  /* Flexslider ---------------------*/
	function slickSliderSetup() {

    // Main slider
    $('.slick-slider').not('.slick-initialized').slick({
      slidesToShow: 1,
      pauseOnHover: false,
      autoplaySpeed: 4000,
      adaptiveHeight: false,
      speed: 400,
      prevArrow: '<div  class="newspaperss-slider-nav newspaperss-slider-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
      nextArrow: '<div  class="newspaperss-slider-nav newspaperss-slider-next "><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
      responsive: [{
        breakpoint: 1023,
        settings: {
          adaptiveHeight: false,
          slidesToShow: 1,
          slidesToScroll:1,
        }
      }, ]
    });
  }

  $( window ).load( slickSliderSetup );
	$( document ).ajaxComplete( slickSliderSetup );

})( jQuery );
