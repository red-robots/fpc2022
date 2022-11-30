/**
 *	Custom jQuery Scripts
 *	Date Modified: 04.12.2022
 *	Developed by: Lisa DeBona
 */
jQuery(document).ready(function ($) {  

  var instagramCarousel = '<div class="instagram-carousel-wrap"><div id="insta-carousel"><div class="owl-carousel owl-theme"></div></div></div>';
  $('#sb_instagram').append(instagramCarousel);
  $('#sbi_images .sbi_item').each(function(){
    $(this).wrap('.item').appendTo('#insta-carousel .owl-carousel');
  });
  let countInstaPost = $('.sbi_item').length;

  if( countInstaPost > 0 ) {
    var responsive_items = false;
    if(countInstaPost==4) {
      responsive_items = {
        0:{
            items:1,
            nav:true
        },
        600:{
            items:4,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
      };
    }
    if(countInstaPost==5) {
      responsive_items = {
        0:{
            items:1,
            nav:true
        },
        600:{
            items:4,
            nav:true
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
      };
    }
    if(countInstaPost>5) {
      responsive_items = {
        0:{
            items:1,
            nav:true
        },
        600:{
            items:4,
            nav:true
        },
        1000:{
            items:6,
            nav:true,
            loop:false
        }
      };
    }
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      responsiveClass:true,
      responsive:responsive_items
    });
  }

  $('#menutoggle').on('click',function(e){
    e.preventDefault();
    $(this).toggleClass('active');
    $('#site-navigation').toggleClass('active');
    $('body').toggleClass('mobile-menu-open');
  });

  $('li.menu-item-has-children a i').on('click',function(e){
    e.preventDefault();
    $(this).parents('li').toggleClass('open-dropdown');
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


  let owl = $('.owl-carousel');
  owl.owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    responsive:{
      0:{
          items:1,
          nav:false
      },
      600:{
          items:4,
          nav:false
      },
      1000:{
          items:6,
          nav:false,
          loop:false
      }
    },
    onInitialized:function() {
      $('.owl-item.active').each(function(){
        if( $(this).find('img').length==0 ) {
          $(this).remove();
        }
      });
    }
  });

}); 