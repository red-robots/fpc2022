"use strict";

/**
 *	Custom jQuery Scripts
 *	Date Modified: 04.12.2022
 *	Developed by: Lisa DeBona
 */
jQuery(document).ready(function ($) {
  $('#menutoggle').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('#site-navigation').toggleClass('active');
    $('body').toggleClass('mobile-menu-open');
  });
  $('li.menu-item-has-children a i').on('click', function (e) {
    e.preventDefault();
    $(this).parents('li').toggleClass('open-dropdown');
  });
  var swiper = new Swiper('.slideshow .swiper', {
    autoplay: {
      delay: 10000
    },
    speed: 500,
    loop: true,
    preventClicks: false,
    fadeEffect: {
      crossFade: true
    },
    effect: "fade",

    /*  "slide", "fade", "cube", "coverflow" or "flip" */
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    preventClicksPropagation: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });

  if ($('a.popup').length) {
    $('a.popup').each(function () {
      var target = $(this);
      var link = $(this).attr('href');

      if (link.includes('youtu')) {
        target.addClass('video-link');
      }
    });
  }

  Fancybox.bind(".popup", {
    Image: {
      Panzoom: {
        zoomFriction: 0.7,
        maxScale: function maxScale() {
          return 5;
        }
      }
    },
    Html: {
      video: {
        autoplay: true
      }
    }
  });
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 4,
        nav: false
      },
      1000: {
        items: 6,
        nav: false,
        loop: false
      }
    },
    onInitialized: function onInitialized() {
      $('.owl-item.active').each(function () {
        if ($(this).find('img').length == 0) {
          $(this).remove();
        }
      });
    }
  });
});
"use strict";

jQuery(document).ready(function (i) {
  i("#sb_instagram").append('<div class="instagram-carousel-wrap"><div id="insta-carousel"><div class="owl-carousel owl-theme"></div></div></div>'), i("#sbi_images .sbi_item").each(function () {
    i(this).wrap(".item").appendTo("#insta-carousel .owl-carousel");
  });
  var e = i(".sbi_item").length;
  0 < e && (e = 5 < e ? {
    0: {
      items: 1,
      nav: !0
    },
    600: {
      items: 4,
      nav: !0
    },
    1e3: {
      items: 6,
      nav: !0,
      loop: !1
    }
  } : 5 == e ? {
    0: {
      items: 1,
      nav: !0
    },
    600: {
      items: 4,
      nav: !0
    },
    1e3: {
      items: 5,
      nav: !0,
      loop: !1
    }
  } : 4 == e && {
    0: {
      items: 1,
      nav: !0
    },
    600: {
      items: 4,
      nav: !1
    },
    1e3: {
      items: 4,
      nav: !0,
      loop: !1
    }
  }, i(".owl-carousel").owlCarousel({
    loop: !0,
    margin: 10,
    responsiveClass: !0,
    responsive: e
  })), i("#menutoggle").on("click", function (e) {
    e.preventDefault(), i(this).toggleClass("active"), i("#site-navigation").toggleClass("active"), i("body").toggleClass("mobile-menu-open");
  }), i("li.menu-item-has-children a i").on("click", function (e) {
    e.preventDefault(), i(this).parents("li").toggleClass("open-dropdown");
  }), new Swiper(".slideshow .swiper", {
    autoplay: {
      delay: 1e4
    },
    speed: 500,
    loop: !0,
    preventClicks: !1,
    fadeEffect: {
      crossFade: !0
    },
    effect: "fade",
    pagination: {
      el: ".swiper-pagination",
      clickable: !0
    },
    preventClicksPropagation: !1,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
  i("a.popup").length && i("a.popup").each(function () {
    var e = i(this);
    i(this).attr("href").includes("youtu") && e.addClass("video-link");
  }), Fancybox.bind(".popup", {
    Image: {
      Panzoom: {
        zoomFriction: .7,
        maxScale: function maxScale() {
          return 5;
        }
      }
    },
    Html: {
      video: {
        autoplay: !0
      }
    }
  }), i(".owl-carousel").owlCarousel({
    loop: !0,
    margin: 0,
    responsiveClass: !0,
    responsive: {
      0: {
        items: 1,
        nav: !1
      },
      600: {
        items: 4,
        nav: !1
      },
      1e3: {
        items: 6,
        nav: !1,
        loop: !1
      }
    },
    onInitialized: function onInitialized() {
      i(".owl-item.active").each(function () {
        0 == i(this).find("img").length && i(this).remove();
      });
    }
  });
});