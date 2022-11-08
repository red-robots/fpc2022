/**
 *	Custom jQuery Scripts
 *	Date Modified: 04.12.2022
 *	Developed by: Lisa DeBona
 */
jQuery(document).ready(function ($) {  

  // const swiper = new Swiper('.slideshow .swiper', {
  //   // Optional parameters
  //   direction: 'vertical',
  //   loop: true,

  //   // If we need pagination
  //   pagination: {
  //     el: '.swiper-pagination',
  //   },

  //   // Navigation arrows
  //   navigation: {
  //     nextEl: '.swiper-button-next',
  //     prevEl: '.swiper-button-prev',
  //   },

  //   // And if we need scrollbar
  //   scrollbar: {
  //     el: '.swiper-scrollbar',
  //   },
  // });

  $('#menutoggle').on('click',function(e){
    e.preventDefault();
    $('body').addClass('mobile-menu-open');
    $('#site-navigation').addClass('show');
  });

  $('#closeMobileNav').on('click',function(e){
    e.preventDefault();
    $('body').removeClass('mobile-menu-open');
    $('#site-navigation').removeClass('show');
  });

  const swiper = new Swiper('.slideshow .swiper', {
    autoplay: {
      delay: 10000,
    },
    speed: 500,
    loop:true,
    preventClicks: false,
    fadeEffect: { crossFade: true },
    effect: "fade", /*  "slide", "fade", "cube", "coverflow" or "flip" */
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    preventClicksPropagation:false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });

  if( $('a.popup').length ) {
    $('a.popup').each(function(){
      var target = $(this);
      var link = $(this).attr('href');
      if( link.includes('youtu') ) {
        target.addClass('video-link');
      }
    });
  }

  Fancybox.bind(".popup", {
    Image: {
      Panzoom: {
        zoomFriction: 0.7,
        maxScale: function () {
          return 5;
        },
      },
    },
    Html: {
      video: {
        autoplay: true,
      },
    },
  });


  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:4,
            nav:false
        },
        1000:{
            items:6,
            nav:true,
            loop:false
        }
    }
  })

}); 