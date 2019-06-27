(function ($) {

  $.fn.wait = function (ms, callback) {
    return this.each(function () {
      window.setTimeout(
        (function (self) {
          return function () {
            callback.call(self);
          };
        })(this),
        ms
      );
    });
  };

  // console.log('main.js: loaded');

  var win = $(window);
  var doc = $(document);
  var body = $("body");
  var top = win.scrollTop();

  // sticky header and sidebar
  var sh = {
    is_sticky: false,
    sticky_class: "is-sticky",
    sticky_after: 0,
    sticky_until: 0,
    sidebar_height: 0,
    footer_height: 0,
    document_height: 0,
    oldTop: 0,
    bottom: 0,
    init: function () {
      sh.sticky_after = $("#header").height();
      sh.sidebar_height = $("#secondary").outerHeight(true);
      sh.footer_height = $("footer#colophon").height();
      this.document_height = $(document).height();
      this.oldTop = win.scrollTop();
      this.bind();
      win.on("load", function () {
        sh.reinit();
        sh.update();
      });
    },
    bind: function () {
      win.on("scroll", function () {
        sh.spy();
      });
      win.on("resize", function () {
        sh.update();
      });
    },
    spy: function () {
      top = $(window).scrollTop();
      if (top !== sh.oldTop) {
        this.oldTop = top;
        this.update();
      }

      this.bottom = this.document_height - top - this.sidebar_height - 96;
      if (this.bottom < this.footer_height) {
        body.addClass("is-sticky-bottom");
      } else {
        body.removeClass("is-sticky-bottom");
      }
    },
    update: function () {
      if (top > this.sticky_after) {
        body.addClass(this.sticky_class);
      } else {
        body.removeClass(this.sticky_class);
      }
    },
    reinit: function () {
      win = $(window);
      doc = $(document);
      top = win.scrollTop();
      this.sticky_after = $("#header").height();
      this.sidebar_height = $("#secondary").outerHeight(true);
      this.footer_height = $("footer#colophon").height();
      this.document_height = doc.height();
      this.oldTop = win.scrollTop();
      sh.update();
    }
  };

  sh.init();

  /** Mobile menu */

  body.on("click", ".mobile-menu-switch", function (e) {
    e.preventDefault();
    body.toggleClass("mobile-menu-open");
  });

  body.on("click", ".mobile-menu-overlay", function (e) {
    body.removeClass("mobile-menu-open");
  });

  /** Calendar stuff */

  $("#sf-future-events-select").change(function () {
    var str = "";
    $("#sf-future-events-select option:selected").each(function () {
      str = $(this).attr("value");
    });
    // console.log(str);

    //ajax call
    var data = {
      action: "nhafala_future_events_select",
      select: str
    };

    $.post(ajax_var.url, data, function (response) {
      $("#sf-future-events-content").html(response);
    });
  });

  if ($(".sf-event-legend").length) {
    win.on("load", function () {
      $(".sf-event-legend").insertAfter(".fc-toolbar");
    });
  }


  /** Galleries Lightbox */
  var gallery_options = {
    useCSS: true, // false will force the use of jQuery for animations
    useSVG: true, // false to force the use of png for buttons
    initialIndexOnArray: 0, // which image index to init when a array is passed
    hideCloseButtonOnMobile: false, // true will hide the close button on mobile devices
    removeBarsOnMobile: true, // false will show top bar on mobile devices
    hideBarsDelay: 0, // delay before hiding bars on desktop
    videoMaxWidth: 1140, // videos max width
    beforeOpen: function () {}, // called before opening
    afterOpen: null, // called after opening
    afterClose: function () {}, // called after closing
    loopAtEnd: false // true will return to the first image after the last image is reached
  };

  if ($(".gallery").length) {
    $(".gallery a").swipebox(gallery_options);
  }

  if ($(".ngg-galleryoverview").length) {
    $(".ngg-gallery-thumbnail a").swipebox(gallery_options);
  }

  if ($(".ngg-gallery-singlepic-image").length) {
    $(".ngg-gallery-singlepic-image a").swipebox(gallery_options);
  }


  /** Login message */
  if ($('.nhafala-login-message').length) {
    var $message = $('.nhafala-login-message');
    $("<span/>", {

    }).text($message.attr('data-message')).appendTo($message);
    win.on('load', function () {
      $message.addClass('in');
      $message.on('click', function() {
        $message.addClass('out');
      });
      $message.wait($message.attr('data-delay') * 1, function () {
        $message.addClass('out');
        $message.wait(1000, function() {
          $message.addClass('hidden');
        });
      });

    });
  }
})(jQuery);
