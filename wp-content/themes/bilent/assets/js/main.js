(function ($) {
  ("use strict");

  // Sticky Menu Area
  var header = $(".menu-sticky");
  var win = $(window);
  var headerinnerHeight = $(".menu-sticky").innerHeight();
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 240) {
      $(".menu-sticky").removeClass("sticky");
    } else {
      $(".menu-sticky").addClass("sticky");
    }
  });

  //window load
  $(window).on("load", function () {
    $(".loader_first").delay(500).fadeOut(300);
    $(".circular-spinner").on("click", function () {
      $(".loader_first").fadeOut(300);
    });
  });

  //preloader
  $(window).on("load", function () {
    $("#loader").delay(1000).fadeOut(500);
  });
  //Videos popup jQuery
  var popupvideos = $(".popup-video, .popup-videos");
  if (popupvideos.length) {
    $(".popup-video, .popup-videos").magnificPopup({
      disableOn: 10,
      type: "iframe",
      mainClass: "mfp-fade",
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false,
    });
  }
  // wow init
  new WOW().init();
  // image loaded portfolio init
  var gridfilter = $(".grid");
  if (gridfilter.length) {
    $(".grid").imagesLoaded(function () {
      $(".gridFilter").on("click", "button", function () {
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({
          filter: filterValue,
        });
      });
      var $grid = $(".grid").isotope({
        itemSelector: ".grid-item",
        percentPosition: true,
        masonry: {
          columnWidth: ".grid-item",
        },
      });
    });
  }

  // project Filter
  if ($(".gridFilter button").length) {
    var projectfiler = $(".gridFilter button");
    if (projectfiler.length) {
      $(".gridFilter button").on("click", function (event) {
        $(this).siblings(".active").removeClass("active");
        $(this).addClass("active");
        event.preventDefault();
      });
    }
  }

  // Counter Up
  if ($(".sc-counter").length) {
    $(".sc-counter").counterUp({
      delay: 20,
      time: 1500,
    });
  }

  // scrollTop init
  var totop = $("#scrollUp");
  win.on("scroll", function () {
    if (win.scrollTop() > 150) {
      totop.fadeIn();
    } else {
      totop.fadeOut();
    }
  });
  totop.on("click", function () {
    $("html,body").animate(
      {
        scrollTop: 0,
      },
      500
    );
  });

  //canvas menu
  var navexpander = $("#nav-expander");
  if (navexpander.length) {
    $("#nav-expander").on("click", function (e) {
      e.preventDefault();
      $("body").toggleClass("nav-expanded");
    });
  }
  var navclose = $("#nav-close");
  if (navclose.length) {
    $("#nav-close").on("click", function (e) {
      e.preventDefault();
      $("body").removeClass("nav-expanded");
    });
  }

  $.fn.menumaker = function (options) {
    var mobile_menu = $(this),
      settings = $.extend(
        {
          format: "dropdown",
          sticky: false,
        },
        options
      );

    return this.each(function () {
      mobile_menu.find("li ul").parent().addClass("has-sub");
      var multiTg = function () {
        mobile_menu
          .find(".has-sub")
          .prepend('<span class="canva-menu-button"><em></em></span>');
        mobile_menu.find(".hash").parent().addClass("hash-has-sub");
        mobile_menu.find(".canva-menu-button").on("click", function () {
          $(this).toggleClass("submenu-opened");
          if ($(this).siblings("ul").hasClass("open-sub")) {
            $(this).siblings("ul").removeClass("open-sub").hide("fadeIn");
            $(this).siblings("ul").hide("fadeIn");
          } else {
            $(this).siblings("ul").addClass("open-sub").hide("fadeIn");
            $(this).siblings("ul").slideToggle().show("fadeIn");
          }
        });
      };

      if (settings.format === "multitoggle") multiTg();
      else mobile_menu.addClass("dropdown");
      if (settings.sticky === true) mobile_menu.css("position", "fixed");
      var resizeFix = function () {
        if ($(window).width() > 991) {
          mobile_menu.find("ul").show("fadeIn");
          mobile_menu.find("ul.sub-menu").hide("fadeIn");
        }
      };
      resizeFix();
      return $(window).on("resize", resizeFix);
    });
  };

  $(document).ready(function () {
    $("#sc-offcanvas-menu").menumaker({
      format: "multitoggle",
    });
  });
  //woocommerce quantity style
  if (!String.prototype.getDecimals) {
    String.prototype.getDecimals = function () {
      var num = this,
        match = ("" + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if (!match) {
        return 0;
      }
      return Math.max(
        0,
        (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0)
      );
    };
  }
  // Quantity "plus" and "minus" buttons
  $(document.body).on("click", ".plus, .minus", function () {
    var $qty = $(this).closest(".quantity").find(".qty"),
      currentVal = parseFloat($qty.val()),
      max = parseFloat($qty.attr("max")),
      min = parseFloat($qty.attr("min")),
      step = $qty.attr("step");

    // Format values
    if (!currentVal || currentVal === "" || currentVal === "NaN")
      currentVal = 0;
    if (max === "" || max === "NaN") max = "";
    if (min === "" || min === "NaN") min = 0;
    if (
      step === "any" ||
      step === "" ||
      step === undefined ||
      parseFloat(step) === "NaN"
    )
      step = 1;

    // Change the value
    if ($(this).is(".plus")) {
      if (max && currentVal >= max) {
        $qty.val(max);
      } else {
        $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
      }
    } else {
      if (min && currentVal <= min) {
        $qty.val(min);
      } else if (currentVal > 0) {
        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
      }
    }

    // Trigger change event
    $qty.trigger("change");
  });
})(jQuery);
