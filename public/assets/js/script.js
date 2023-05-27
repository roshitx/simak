/**
 *
 * Template Name : Landpagy HTML Landing Template
 * @author
 * @version 1.0.0
 * @package Landpagy
 *
 * */

(function ($) {
  ("use strict");

  //*=============menu sticky js =============*//
  var $window = $(window);
  var didScroll,
    lastScrollTop = 0,
    delta = 5,
    $mainNav = $(".sticky-nav"),
    $body = $("body"),
    $mainNavHeight = $mainNav.outerHeight() + 15,
    scrollTop;

  $window.on("scroll", function () {
    didScroll = true;
    scrollTop = $(this).scrollTop();
  });

  setInterval(function () {
    if (didScroll) {
      if (Math.abs(lastScrollTop - scrollTop) <= delta) {
        return;
      }
      if (scrollTop > lastScrollTop && scrollTop > $mainNavHeight) {
        $mainNav
          .removeClass("fadeInDown")
          .addClass("fadeInUp")
          .css("top", -$mainNavHeight);
        $body.removeClass("remove").addClass("add");
      } else {
        if (scrollTop + $(window).height() < $(document).height()) {
          $mainNav
            .removeClass("fadeInUp")
            .addClass("fadeInDown")
            .css("top", 0)
            .addClass("gap");
          $body.removeClass("add").addClass("remove");
        }
      }
      lastScrollTop = scrollTop;
      didScroll = false;
    }
  }, 200);

  if ($(".sticky-nav").length) {
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll) {
        $(".sticky-nav").addClass("navbar_fixed");
        $(".sticky-nav-doc .body_fixed").addClass("body_navbar_fixed");
      } else {
        $(".sticky-nav").removeClass("navbar_fixed");
        $(".sticky-nav-doc .body_fixed").removeClass("body_navbar_fixed");
      }
    });
  }

  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(document).scrollTop() > 500) {
        $("body").addClass("test");
      } else {
        $("body").removeClass("test");
      }
    });
  });

  // scrollToTop
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".scrollToTop").fadeIn();
    } else {
      $(".scrollToTop").fadeOut();
    }
  });
  //Click event to scroll to top
  $(".scrollToTop").click(function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      800
    );
    return false;
  });

  /*  Menu Click js  */
  function Menu_js() {
    if ($(".submenu").length) {
      $(".submenu > .dropdown-toggle").click(function () {
        var location = $(this).attr("href");
        window.location.href = location;
        return false;
      });
    }
  }
  Menu_js();

  /*--------------- mobile dropdown js--------*/
  function active_dropdown2() {
    $(".menu > li .mobile_dropdown_icon").on("click", function (e) {
      $(this).parent().find("ul").first().slideToggle(300);
      $(this).parent().siblings().find("ul").hide(300);
    });
  }

  active_dropdown2();

  // counter
  if ($(".counter").length) {
    var counter = $(".counter");

    counter.counterUp({
      delay: 20,
      time: 1000,
    });
  }

  if ($("#scroll-container").length) {
    // init controller
    var controller = new ScrollMagic.Controller();

    // define movement of panels
    var wipeAnimation = new TimelineMax().to("#scroll-container", 1, {
      x: "-55%",
    });

    // create scene to pin and link animation
    new ScrollMagic.Scene({
      triggerElement: "#fixedWrapper",
      triggerHook: "onLeave",
      duration: "350%",
    })
      .setPin("#fixedWrapper")
      .setTween(wipeAnimation)
      .addIndicators()
      .addTo(controller);

    var horizontal = new ScrollMagic.Scene({
      offset: 50,
      duration: 300,
      // reverse: false
    })

      // .addIndicators()
      .addTo(controller);
  }

  const slider2 = new Swiper("#testimonial-2", {
    slidesPerView: 1,
    spaceBetween: 50,
    centeredSlides: true,

    breakpoints: {
      768: {
        slidesPerView: 2,
      },
    },
  });

  const slider3 = new Swiper("#testimonial-3", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    breakpoints: {
      768: {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      },
    },
  });

  $("select").niceSelect();

  new WOW().init();

  //Tippy JS
  if ($(".marking-point").length) {
    const template = document.getElementById("map");

    tippy(".marking-point", {
      content: template.innerHTML,
      allowHTML: true,
      animation: "scale",
      theme: "tooltip",
    });
  }
})(jQuery);

  