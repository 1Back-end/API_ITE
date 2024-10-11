var velements, i, objRTL;
!(function (n) {
  "use strict";
  "function" == typeof define && define.amd
    ? define(["jquery"], n)
    : "undefined" != typeof exports
    ? (module.exports = n(require("jquery")))
    : n(jQuery);
})(function (n) {
  "use strict";
  var t = window.Slick || {};
  (t = (function () {
    var t = 0;
    return function (i, r) {
      var f,
        u = this;
      u.defaults = {
        accessibility: !0,
        adaptiveHeight: !1,
        appendArrows: n(i),
        appendDots: n(i),
        arrows: !0,
        asNavFor: null,
        prevArrow:
          '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
        nextArrow:
          '<button class="slick-next" aria-label="Next" type="button">Next</button>',
        autoplay: !1,
        autoplaySpeed: 3e3,
        centerMode: !1,
        centerPadding: "50px",
        cssEase: "ease",
        customPaging: function (t, i) {
          return n('<button type="button" />').text(i + 1);
        },
        dots: !1,
        dotsClass: "slick-dots",
        draggable: !0,
        easing: "linear",
        edgeFriction: 0.35,
        fade: !1,
        focusOnSelect: !1,
        focusOnChange: !1,
        infinite: !0,
        initialSlide: 0,
        lazyLoad: "ondemand",
        mobileFirst: !1,
        pauseOnHover: !0,
        pauseOnFocus: !0,
        pauseOnDotsHover: !1,
        respondTo: "window",
        responsive: null,
        rows: 1,
        rtl: !1,
        slide: "",
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        swipe: !0,
        swipeToSlide: !1,
        touchMove: !0,
        touchThreshold: 5,
        useCSS: !0,
        useTransform: !0,
        variableWidth: !1,
        vertical: !1,
        verticalSwiping: !1,
        waitForAnimate: !0,
        zIndex: 1e3,
      };
      u.initials = {
        animating: !1,
        dragging: !1,
        autoPlayTimer: null,
        currentDirection: 0,
        currentLeft: null,
        currentSlide: 0,
        direction: 1,
        $dots: null,
        listWidth: null,
        listHeight: null,
        loadIndex: 0,
        $nextArrow: null,
        $prevArrow: null,
        scrolling: !1,
        slideCount: null,
        slideWidth: null,
        $slideTrack: null,
        $slides: null,
        sliding: !1,
        slideOffset: 0,
        swipeLeft: null,
        swiping: !1,
        $list: null,
        touchObject: {},
        transformsEnabled: !1,
        unslicked: !1,
      };
      n.extend(u, u.initials);
      u.activeBreakpoint = null;
      u.animType = null;
      u.animProp = null;
      u.breakpoints = [];
      u.breakpointSettings = [];
      u.cssTransitions = !1;
      u.focussed = !1;
      u.interrupted = !1;
      u.hidden = "hidden";
      u.paused = !0;
      u.positionProp = null;
      u.respondTo = null;
      u.rowCount = 1;
      u.shouldClick = !0;
      u.$slider = n(i);
      u.$slidesCache = null;
      u.transformType = null;
      u.transitionType = null;
      u.visibilityChange = "visibilitychange";
      u.windowWidth = 0;
      u.windowTimer = null;
      f = n(i).data("slick") || {};
      u.options = n.extend({}, u.defaults, r, f);
      u.currentSlide = u.options.initialSlide;
      u.originalSettings = u.options;
      void 0 !== document.mozHidden
        ? ((u.hidden = "mozHidden"),
          (u.visibilityChange = "mozvisibilitychange"))
        : void 0 !== document.webkitHidden &&
          ((u.hidden = "webkitHidden"),
          (u.visibilityChange = "webkitvisibilitychange"));
      u.autoPlay = n.proxy(u.autoPlay, u);
      u.autoPlayClear = n.proxy(u.autoPlayClear, u);
      u.autoPlayIterator = n.proxy(u.autoPlayIterator, u);
      u.changeSlide = n.proxy(u.changeSlide, u);
      u.clickHandler = n.proxy(u.clickHandler, u);
      u.selectHandler = n.proxy(u.selectHandler, u);
      u.setPosition = n.proxy(u.setPosition, u);
      u.swipeHandler = n.proxy(u.swipeHandler, u);
      u.dragHandler = n.proxy(u.dragHandler, u);
      u.keyHandler = n.proxy(u.keyHandler, u);
      u.instanceUid = t++;
      u.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/;
      u.registerBreakpoints();
      u.init(!0);
    };
  })()).prototype.activateADA = function () {
    this.$slideTrack
      .find(".slick-active")
      .attr({ "aria-hidden": "false" })
      .find("a, input, button, select")
      .attr({ tabindex: "0" });
  };
  t.prototype.addSlide = t.prototype.slickAdd = function (t, i, r) {
    var u = this;
    if ("boolean" == typeof i) (r = i), (i = null);
    else if (i < 0 || i >= u.slideCount) return !1;
    u.unload();
    "number" == typeof i
      ? 0 === i && 0 === u.$slides.length
        ? n(t).appendTo(u.$slideTrack)
        : r
        ? n(t).insertBefore(u.$slides.eq(i))
        : n(t).insertAfter(u.$slides.eq(i))
      : !0 === r
      ? n(t).prependTo(u.$slideTrack)
      : n(t).appendTo(u.$slideTrack);
    u.$slides = u.$slideTrack.children(this.options.slide);
    u.$slideTrack.children(this.options.slide).detach();
    u.$slideTrack.append(u.$slides);
    u.$slides.each(function (t, i) {
      n(i).attr("data-slick-index", t);
    });
    u.$slidesCache = u.$slides;
    u.reinit();
  };
  t.prototype.animateHeight = function () {
    var n = this,
      t;
    1 === n.options.slidesToShow &&
      !0 === n.options.adaptiveHeight &&
      !1 === n.options.vertical &&
      ((t = n.$slides.eq(n.currentSlide).outerHeight(!0)),
      n.$list.animate({ height: t }, n.options.speed));
  };
  t.prototype.animateSlide = function (t, i) {
    var u = {},
      r = this;
    r.animateHeight();
    !0 === r.options.rtl && !1 === r.options.vertical && (t = -t);
    !1 === r.transformsEnabled
      ? !1 === r.options.vertical
        ? r.$slideTrack.animate(
            { left: t },
            r.options.speed,
            r.options.easing,
            i
          )
        : r.$slideTrack.animate(
            { top: t },
            r.options.speed,
            r.options.easing,
            i
          )
      : !1 === r.cssTransitions
      ? (!0 === r.options.rtl && (r.currentLeft = -r.currentLeft),
        n({ animStart: r.currentLeft }).animate(
          { animStart: t },
          {
            duration: r.options.speed,
            easing: r.options.easing,
            step: function (n) {
              n = Math.ceil(n);
              !1 === r.options.vertical
                ? ((u[r.animType] = "translate(" + n + "px, 0px)"),
                  r.$slideTrack.css(u))
                : ((u[r.animType] = "translate(0px," + n + "px)"),
                  r.$slideTrack.css(u));
            },
            complete: function () {
              i && i.call();
            },
          }
        ))
      : (r.applyTransition(),
        (t = Math.ceil(t)),
        (u[r.animType] =
          !1 === r.options.vertical
            ? "translate3d(" + t + "px, 0px, 0px)"
            : "translate3d(0px," + t + "px, 0px)"),
        r.$slideTrack.css(u),
        i &&
          setTimeout(function () {
            r.disableTransition();
            i.call();
          }, r.options.speed));
  };
  t.prototype.getNavTarget = function () {
    var i = this,
      t = i.options.asNavFor;
    return t && null !== t && (t = n(t).not(i.$slider)), t;
  };
  t.prototype.asNavFor = function (t) {
    var i = this.getNavTarget();
    null !== i &&
      "object" == typeof i &&
      i.each(function () {
        var i = n(this).slick("getSlick");
        i.unslicked || i.slideHandler(t, !0);
      });
  };
  t.prototype.applyTransition = function (n) {
    var t = this,
      i = {};
    i[t.transitionType] =
      !1 === t.options.fade
        ? t.transformType + " " + t.options.speed + "ms " + t.options.cssEase
        : "opacity " + t.options.speed + "ms " + t.options.cssEase;
    !1 === t.options.fade ? t.$slideTrack.css(i) : t.$slides.eq(n).css(i);
  };
  t.prototype.autoPlay = function () {
    var n = this;
    n.autoPlayClear();
    n.slideCount > n.options.slidesToShow &&
      (n.autoPlayTimer = setInterval(
        n.autoPlayIterator,
        n.options.autoplaySpeed
      ));
  };
  t.prototype.autoPlayClear = function () {
    var n = this;
    n.autoPlayTimer && clearInterval(n.autoPlayTimer);
  };
  t.prototype.autoPlayIterator = function () {
    var n = this,
      t = n.currentSlide + n.options.slidesToScroll;
    n.paused ||
      n.interrupted ||
      n.focussed ||
      (!1 === n.options.infinite &&
        (1 === n.direction && n.currentSlide + 1 === n.slideCount - 1
          ? (n.direction = 0)
          : 0 === n.direction &&
            ((t = n.currentSlide - n.options.slidesToScroll),
            n.currentSlide - 1 == 0 && (n.direction = 1))),
      n.slideHandler(t));
  };
  t.prototype.buildArrows = function () {
    var t = this;
    !0 === t.options.arrows &&
      ((t.$prevArrow = n(t.options.prevArrow).addClass("slick-arrow")),
      (t.$nextArrow = n(t.options.nextArrow).addClass("slick-arrow")),
      t.slideCount > t.options.slidesToShow
        ? (t.$prevArrow
            .removeClass("slick-hidden")
            .removeAttr("aria-hidden tabindex"),
          t.$nextArrow
            .removeClass("slick-hidden")
            .removeAttr("aria-hidden tabindex"),
          t.htmlExpr.test(t.options.prevArrow) &&
            t.$prevArrow.prependTo(t.options.appendArrows),
          t.htmlExpr.test(t.options.nextArrow) &&
            t.$nextArrow.appendTo(t.options.appendArrows),
          !0 !== t.options.infinite &&
            t.$prevArrow
              .addClass("slick-disabled")
              .attr("aria-disabled", "true"))
        : t.$prevArrow
            .add(t.$nextArrow)
            .addClass("slick-hidden")
            .attr({ "aria-disabled": "true", tabindex: "-1" }));
  };
  t.prototype.buildDots = function () {
    var i,
      r,
      t = this;
    if (!0 === t.options.dots) {
      for (
        t.$slider.addClass("slick-dotted"),
          r = n("<ul />").addClass(t.options.dotsClass),
          i = 0;
        i <= t.getDotCount();
        i += 1
      )
        r.append(n("<li />").append(t.options.customPaging.call(this, t, i)));
      t.$dots = r.appendTo(t.options.appendDots);
      t.$dots.find("li").first().addClass("slick-active");
    }
  };
  t.prototype.buildOut = function () {
    var t = this;
    t.$slides = t.$slider
      .children(t.options.slide + ":not(.slick-cloned)")
      .addClass("slick-slide");
    t.slideCount = t.$slides.length;
    t.$slides.each(function (t, i) {
      n(i)
        .attr("data-slick-index", t)
        .data("originalStyling", n(i).attr("style") || "");
    });
    t.$slider.addClass("slick-slider");
    t.$slideTrack =
      0 === t.slideCount
        ? n('<div class="slick-track"/>').appendTo(t.$slider)
        : t.$slides.wrapAll('<div class="slick-track"/>').parent();
    t.$list = t.$slideTrack.wrap('<div class="slick-list"/>').parent();
    t.$slideTrack.css("opacity", 0);
    (!0 !== t.options.centerMode && !0 !== t.options.swipeToSlide) ||
      (t.options.slidesToScroll = 1);
    n("img[data-lazy]", t.$slider).not("[src]").addClass("slick-loading");
    t.setupInfinite();
    t.buildArrows();
    t.buildDots();
    t.updateDots();
    t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0);
    !0 === t.options.draggable && t.$list.addClass("draggable");
  };
  t.prototype.buildRows = function () {
    var t,
      i,
      r,
      f,
      c,
      u,
      e,
      n = this,
      o,
      s,
      h;
    if (
      ((f = document.createDocumentFragment()),
      (u = n.$slider.children()),
      n.options.rows > 1)
    ) {
      for (
        e = n.options.slidesPerRow * n.options.rows,
          c = Math.ceil(u.length / e),
          t = 0;
        t < c;
        t++
      ) {
        for (
          o = document.createElement("div"), i = 0;
          i < n.options.rows;
          i++
        ) {
          for (
            s = document.createElement("div"), r = 0;
            r < n.options.slidesPerRow;
            r++
          )
            (h = t * e + (i * n.options.slidesPerRow + r)),
              u.get(h) && s.appendChild(u.get(h));
          o.appendChild(s);
        }
        f.appendChild(o);
      }
      n.$slider.empty().append(f);
      n.$slider
        .children()
        .children()
        .children()
        .css({
          width: 100 / n.options.slidesPerRow + "%",
          display: "inline-block",
        });
    }
  };
  t.prototype.checkResponsive = function (t, i) {
    var f,
      u,
      e,
      r = this,
      o = !1,
      s = r.$slider.width(),
      h = window.innerWidth || n(window).width();
    if (
      ("window" === r.respondTo
        ? (e = h)
        : "slider" === r.respondTo
        ? (e = s)
        : "min" === r.respondTo && (e = Math.min(h, s)),
      r.options.responsive &&
        r.options.responsive.length &&
        null !== r.options.responsive)
    ) {
      u = null;
      for (f in r.breakpoints)
        r.breakpoints.hasOwnProperty(f) &&
          (!1 === r.originalSettings.mobileFirst
            ? e < r.breakpoints[f] && (u = r.breakpoints[f])
            : e > r.breakpoints[f] && (u = r.breakpoints[f]));
      null !== u
        ? null !== r.activeBreakpoint
          ? (u !== r.activeBreakpoint || i) &&
            ((r.activeBreakpoint = u),
            "unslick" === r.breakpointSettings[u]
              ? r.unslick(u)
              : ((r.options = n.extend(
                  {},
                  r.originalSettings,
                  r.breakpointSettings[u]
                )),
                !0 === t && (r.currentSlide = r.options.initialSlide),
                r.refresh(t)),
            (o = u))
          : ((r.activeBreakpoint = u),
            "unslick" === r.breakpointSettings[u]
              ? r.unslick(u)
              : ((r.options = n.extend(
                  {},
                  r.originalSettings,
                  r.breakpointSettings[u]
                )),
                !0 === t && (r.currentSlide = r.options.initialSlide),
                r.refresh(t)),
            (o = u))
        : null !== r.activeBreakpoint &&
          ((r.activeBreakpoint = null),
          (r.options = r.originalSettings),
          !0 === t && (r.currentSlide = r.options.initialSlide),
          r.refresh(t),
          (o = u));
      t || !1 === o || r.$slider.trigger("breakpoint", [r, o]);
    }
  };
  t.prototype.changeSlide = function (t, i) {
    var f,
      e,
      o,
      r = this,
      u = n(t.currentTarget),
      s;
    switch (
      (u.is("a") && t.preventDefault(),
      u.is("li") || (u = u.closest("li")),
      (o = r.slideCount % r.options.slidesToScroll != 0),
      (f = o ? 0 : (r.slideCount - r.currentSlide) % r.options.slidesToScroll),
      t.data.message)
    ) {
      case "previous":
        e = 0 === f ? r.options.slidesToScroll : r.options.slidesToShow - f;
        r.slideCount > r.options.slidesToShow &&
          r.slideHandler(r.currentSlide - e, !1, i);
        break;
      case "next":
        e = 0 === f ? r.options.slidesToScroll : f;
        r.slideCount > r.options.slidesToShow &&
          r.slideHandler(r.currentSlide + e, !1, i);
        break;
      case "index":
        s =
          0 === t.data.index
            ? 0
            : t.data.index || u.index() * r.options.slidesToScroll;
        r.slideHandler(r.checkNavigable(s), !1, i);
        u.children().trigger("focus");
        break;
      default:
        return;
    }
  };
  t.prototype.checkNavigable = function (n) {
    var t, i, r;
    if (((t = this.getNavigableIndexes()), (i = 0), n > t[t.length - 1]))
      n = t[t.length - 1];
    else
      for (r in t) {
        if (n < t[r]) {
          n = i;
          break;
        }
        i = t[r];
      }
    return n;
  };
  t.prototype.cleanUpEvents = function () {
    var t = this;
    t.options.dots &&
      null !== t.$dots &&
      (n("li", t.$dots)
        .off("click.slick", t.changeSlide)
        .off("mouseenter.slick", n.proxy(t.interrupt, t, !0))
        .off("mouseleave.slick", n.proxy(t.interrupt, t, !1)),
      !0 === t.options.accessibility &&
        t.$dots.off("keydown.slick", t.keyHandler));
    t.$slider.off("focus.slick blur.slick");
    !0 === t.options.arrows &&
      t.slideCount > t.options.slidesToShow &&
      (t.$prevArrow && t.$prevArrow.off("click.slick", t.changeSlide),
      t.$nextArrow && t.$nextArrow.off("click.slick", t.changeSlide),
      !0 === t.options.accessibility &&
        (t.$prevArrow && t.$prevArrow.off("keydown.slick", t.keyHandler),
        t.$nextArrow && t.$nextArrow.off("keydown.slick", t.keyHandler)));
    t.$list.off("touchstart.slick mousedown.slick", t.swipeHandler);
    t.$list.off("touchmove.slick mousemove.slick", t.swipeHandler);
    t.$list.off("touchend.slick mouseup.slick", t.swipeHandler);
    t.$list.off("touchcancel.slick mouseleave.slick", t.swipeHandler);
    t.$list.off("click.slick", t.clickHandler);
    n(document).off(t.visibilityChange, t.visibility);
    t.cleanUpSlideEvents();
    !0 === t.options.accessibility &&
      t.$list.off("keydown.slick", t.keyHandler);
    !0 === t.options.focusOnSelect &&
      n(t.$slideTrack).children().off("click.slick", t.selectHandler);
    n(window).off(
      "orientationchange.slick.slick-" + t.instanceUid,
      t.orientationChange
    );
    n(window).off("resize.slick.slick-" + t.instanceUid, t.resize);
    n("[draggable!=true]", t.$slideTrack).off("dragstart", t.preventDefault);
    n(window).off("load.slick.slick-" + t.instanceUid, t.setPosition);
  };
  t.prototype.cleanUpSlideEvents = function () {
    var t = this;
    t.$list.off("mouseenter.slick", n.proxy(t.interrupt, t, !0));
    t.$list.off("mouseleave.slick", n.proxy(t.interrupt, t, !1));
  };
  t.prototype.cleanUpRows = function () {
    var t,
      n = this;
    n.options.rows > 1 &&
      ((t = n.$slides.children().children()).removeAttr("style"),
      n.$slider.empty().append(t));
  };
  t.prototype.clickHandler = function (n) {
    !1 === this.shouldClick &&
      (n.stopImmediatePropagation(), n.stopPropagation(), n.preventDefault());
  };
  t.prototype.destroy = function (t) {
    var i = this;
    i.autoPlayClear();
    i.touchObject = {};
    i.cleanUpEvents();
    n(".slick-cloned", i.$slider).detach();
    i.$dots && i.$dots.remove();
    i.$prevArrow &&
      i.$prevArrow.length &&
      (i.$prevArrow
        .removeClass("slick-disabled slick-arrow slick-hidden")
        .removeAttr("aria-hidden aria-disabled tabindex")
        .css("display", ""),
      i.htmlExpr.test(i.options.prevArrow) && i.$prevArrow.remove());
    i.$nextArrow &&
      i.$nextArrow.length &&
      (i.$nextArrow
        .removeClass("slick-disabled slick-arrow slick-hidden")
        .removeAttr("aria-hidden aria-disabled tabindex")
        .css("display", ""),
      i.htmlExpr.test(i.options.nextArrow) && i.$nextArrow.remove());
    i.$slides &&
      (i.$slides
        .removeClass(
          "slick-slide slick-active slick-center slick-visible slick-current"
        )
        .removeAttr("aria-hidden")
        .removeAttr("data-slick-index")
        .each(function () {
          n(this).attr("style", n(this).data("originalStyling"));
        }),
      i.$slideTrack.children(this.options.slide).detach(),
      i.$slideTrack.detach(),
      i.$list.detach(),
      i.$slider.append(i.$slides));
    i.cleanUpRows();
    i.$slider.removeClass("slick-slider");
    i.$slider.removeClass("slick-initialized");
    i.$slider.removeClass("slick-dotted");
    i.unslicked = !0;
    t || i.$slider.trigger("destroy", [i]);
  };
  t.prototype.disableTransition = function (n) {
    var t = this,
      i = {};
    i[t.transitionType] = "";
    !1 === t.options.fade ? t.$slideTrack.css(i) : t.$slides.eq(n).css(i);
  };
  t.prototype.fadeSlide = function (n, t) {
    var i = this;
    !1 === i.cssTransitions
      ? (i.$slides.eq(n).css({ zIndex: i.options.zIndex }),
        i.$slides
          .eq(n)
          .animate({ opacity: 1 }, i.options.speed, i.options.easing, t))
      : (i.applyTransition(n),
        i.$slides.eq(n).css({ opacity: 1, zIndex: i.options.zIndex }),
        t &&
          setTimeout(function () {
            i.disableTransition(n);
            t.call();
          }, i.options.speed));
  };
  t.prototype.fadeSlideOut = function (n) {
    var t = this;
    !1 === t.cssTransitions
      ? t.$slides
          .eq(n)
          .animate(
            { opacity: 0, zIndex: t.options.zIndex - 2 },
            t.options.speed,
            t.options.easing
          )
      : (t.applyTransition(n),
        t.$slides.eq(n).css({ opacity: 0, zIndex: t.options.zIndex - 2 }));
  };
  t.prototype.filterSlides = t.prototype.slickFilter = function (n) {
    var t = this;
    null !== n &&
      ((t.$slidesCache = t.$slides),
      t.unload(),
      t.$slideTrack.children(this.options.slide).detach(),
      t.$slidesCache.filter(n).appendTo(t.$slideTrack),
      t.reinit());
  };
  t.prototype.focusHandler = function () {
    var t = this;
    t.$slider
      .off("focus.slick blur.slick")
      .on("focus.slick blur.slick", "*", function (i) {
        i.stopImmediatePropagation();
        var r = n(this);
        setTimeout(function () {
          t.options.pauseOnFocus &&
            ((t.focussed = r.is(":focus")), t.autoPlay());
        }, 0);
      });
  };
  t.prototype.getCurrent = t.prototype.slickCurrentSlide = function () {
    return this.currentSlide;
  };
  t.prototype.getDotCount = function () {
    var n = this,
      i = 0,
      r = 0,
      t = 0;
    if (!0 === n.options.infinite)
      if (n.slideCount <= n.options.slidesToShow) ++t;
      else
        for (; i < n.slideCount; )
          ++t,
            (i = r + n.options.slidesToScroll),
            (r +=
              n.options.slidesToScroll <= n.options.slidesToShow
                ? n.options.slidesToScroll
                : n.options.slidesToShow);
    else if (!0 === n.options.centerMode) t = n.slideCount;
    else if (n.options.asNavFor)
      for (; i < n.slideCount; )
        ++t,
          (i = r + n.options.slidesToScroll),
          (r +=
            n.options.slidesToScroll <= n.options.slidesToShow
              ? n.options.slidesToScroll
              : n.options.slidesToShow);
    else
      t =
        1 +
        Math.ceil(
          (n.slideCount - n.options.slidesToShow) / n.options.slidesToScroll
        );
    return t - 1;
  };
  t.prototype.getLeft = function (n) {
    var f,
      r,
      i,
      e,
      t = this,
      u = 0;
    return (
      (t.slideOffset = 0),
      (r = t.$slides.first().outerHeight(!0)),
      !0 === t.options.infinite
        ? (t.slideCount > t.options.slidesToShow &&
            ((t.slideOffset = t.slideWidth * t.options.slidesToShow * -1),
            (e = -1),
            !0 === t.options.vertical &&
              !0 === t.options.centerMode &&
              (2 === t.options.slidesToShow
                ? (e = -1.5)
                : 1 === t.options.slidesToShow && (e = -2)),
            (u = r * t.options.slidesToShow * e)),
          t.slideCount % t.options.slidesToScroll != 0 &&
            n + t.options.slidesToScroll > t.slideCount &&
            t.slideCount > t.options.slidesToShow &&
            (n > t.slideCount
              ? ((t.slideOffset =
                  (t.options.slidesToShow - (n - t.slideCount)) *
                  t.slideWidth *
                  -1),
                (u = (t.options.slidesToShow - (n - t.slideCount)) * r * -1))
              : ((t.slideOffset =
                  (t.slideCount % t.options.slidesToScroll) *
                  t.slideWidth *
                  -1),
                (u = (t.slideCount % t.options.slidesToScroll) * r * -1))))
        : n + t.options.slidesToShow > t.slideCount &&
          ((t.slideOffset =
            (n + t.options.slidesToShow - t.slideCount) * t.slideWidth),
          (u = (n + t.options.slidesToShow - t.slideCount) * r)),
      t.slideCount <= t.options.slidesToShow && ((t.slideOffset = 0), (u = 0)),
      !0 === t.options.centerMode && t.slideCount <= t.options.slidesToShow
        ? (t.slideOffset =
            (t.slideWidth * Math.floor(t.options.slidesToShow)) / 2 -
            (t.slideWidth * t.slideCount) / 2)
        : !0 === t.options.centerMode && !0 === t.options.infinite
        ? (t.slideOffset +=
            t.slideWidth * Math.floor(t.options.slidesToShow / 2) -
            t.slideWidth)
        : !0 === t.options.centerMode &&
          ((t.slideOffset = 0),
          (t.slideOffset +=
            t.slideWidth * Math.floor(t.options.slidesToShow / 2))),
      (f =
        !1 === t.options.vertical
          ? n * t.slideWidth * -1 + t.slideOffset
          : n * r * -1 + u),
      !0 === t.options.variableWidth &&
        ((i =
          t.slideCount <= t.options.slidesToShow || !1 === t.options.infinite
            ? t.$slideTrack.children(".slick-slide").eq(n)
            : t.$slideTrack
                .children(".slick-slide")
                .eq(n + t.options.slidesToShow)),
        (f =
          !0 === t.options.rtl
            ? i[0]
              ? -1 * (t.$slideTrack.width() - i[0].offsetLeft - i.width())
              : 0
            : i[0]
            ? -1 * i[0].offsetLeft
            : 0),
        !0 === t.options.centerMode &&
          ((i =
            t.slideCount <= t.options.slidesToShow || !1 === t.options.infinite
              ? t.$slideTrack.children(".slick-slide").eq(n)
              : t.$slideTrack
                  .children(".slick-slide")
                  .eq(n + t.options.slidesToShow + 1)),
          (f =
            !0 === t.options.rtl
              ? i[0]
                ? -1 * (t.$slideTrack.width() - i[0].offsetLeft - i.width())
                : 0
              : i[0]
              ? -1 * i[0].offsetLeft
              : 0),
          (f += (t.$list.width() - i.outerWidth()) / 2))),
      f
    );
  };
  t.prototype.getOption = t.prototype.slickGetOption = function (n) {
    return this.options[n];
  };
  t.prototype.getNavigableIndexes = function () {
    var i,
      n = this,
      t = 0,
      r = 0,
      u = [];
    for (
      !1 === n.options.infinite
        ? (i = n.slideCount)
        : ((t = -1 * n.options.slidesToScroll),
          (r = -1 * n.options.slidesToScroll),
          (i = 2 * n.slideCount));
      t < i;

    )
      u.push(t),
        (t = r + n.options.slidesToScroll),
        (r +=
          n.options.slidesToScroll <= n.options.slidesToShow
            ? n.options.slidesToScroll
            : n.options.slidesToShow);
    return u;
  };
  t.prototype.getSlick = function () {
    return this;
  };
  t.prototype.getSlideCount = function () {
    var i,
      r,
      t = this;
    return (
      (r =
        !0 === t.options.centerMode
          ? t.slideWidth * Math.floor(t.options.slidesToShow / 2)
          : 0),
      !0 === t.options.swipeToSlide
        ? (t.$slideTrack.find(".slick-slide").each(function (u, f) {
            if (f.offsetLeft - r + n(f).outerWidth() / 2 > -1 * t.swipeLeft)
              return (i = f), !1;
          }),
          Math.abs(n(i).attr("data-slick-index") - t.currentSlide) || 1)
        : t.options.slidesToScroll
    );
  };
  t.prototype.goTo = t.prototype.slickGoTo = function (n, t) {
    this.changeSlide({ data: { message: "index", index: parseInt(n) } }, t);
  };
  t.prototype.init = function (t) {
    var i = this;
    n(i.$slider).hasClass("slick-initialized") ||
      (n(i.$slider).addClass("slick-initialized"),
      i.buildRows(),
      i.buildOut(),
      i.setProps(),
      i.startLoad(),
      i.loadSlider(),
      i.initializeEvents(),
      i.updateArrows(),
      i.updateDots(),
      i.checkResponsive(!0),
      i.focusHandler());
    t && i.$slider.trigger("init", [i]);
    !0 === i.options.accessibility && i.initADA();
    i.options.autoplay && ((i.paused = !1), i.autoPlay());
  };
  t.prototype.initADA = function () {
    var t = this,
      f = Math.ceil(t.slideCount / t.options.slidesToShow),
      r = t.getNavigableIndexes().filter(function (n) {
        return n >= 0 && n < t.slideCount;
      }),
      i,
      u;
    for (
      t.$slides
        .add(t.$slideTrack.find(".slick-cloned"))
        .attr({ "aria-hidden": "true", tabindex: "-1" })
        .find("a, input, button, select")
        .attr({ tabindex: "-1" }),
        null !== t.$dots &&
          (t.$slides
            .not(t.$slideTrack.find(".slick-cloned"))
            .each(function (i) {
              var u = r.indexOf(i);
              n(this).attr({
                role: "tabpanel",
                id: "slick-slide" + t.instanceUid + i,
                tabindex: -1,
              });
              -1 !== u &&
                n(this).attr({
                  "aria-describedby": "slick-slide-control" + t.instanceUid + u,
                });
            }),
          t.$dots
            .attr("role", "tablist")
            .find("li")
            .each(function (i) {
              var u = r[i];
              n(this).attr({ role: "presentation" });
              n(this)
                .find("button")
                .first()
                .attr({
                  role: "tab",
                  id: "slick-slide-control" + t.instanceUid + i,
                  "aria-controls": "slick-slide" + t.instanceUid + u,
                  "aria-label": i + 1 + " of " + f,
                  "aria-selected": null,
                  tabindex: "-1",
                });
            })
            .eq(t.currentSlide)
            .find("button")
            .attr({ "aria-selected": "true", tabindex: "0" })
            .end()),
        i = t.currentSlide,
        u = i + t.options.slidesToShow;
      i < u;
      i++
    )
      t.$slides.eq(i).attr("tabindex", 0);
    t.activateADA();
  };
  t.prototype.initArrowEvents = function () {
    var n = this;
    !0 === n.options.arrows &&
      n.slideCount > n.options.slidesToShow &&
      (n.$prevArrow
        .off("click.slick")
        .on("click.slick", { message: "previous" }, n.changeSlide),
      n.$nextArrow
        .off("click.slick")
        .on("click.slick", { message: "next" }, n.changeSlide),
      !0 === n.options.accessibility &&
        (n.$prevArrow.on("keydown.slick", n.keyHandler),
        n.$nextArrow.on("keydown.slick", n.keyHandler)));
  };
  t.prototype.initDotEvents = function () {
    var t = this;
    !0 === t.options.dots &&
      (n("li", t.$dots).on("click.slick", { message: "index" }, t.changeSlide),
      !0 === t.options.accessibility &&
        t.$dots.on("keydown.slick", t.keyHandler));
    !0 === t.options.dots &&
      !0 === t.options.pauseOnDotsHover &&
      n("li", t.$dots)
        .on("mouseenter.slick", n.proxy(t.interrupt, t, !0))
        .on("mouseleave.slick", n.proxy(t.interrupt, t, !1));
  };
  t.prototype.initSlideEvents = function () {
    var t = this;
    t.options.pauseOnHover &&
      (t.$list.on("mouseenter.slick", n.proxy(t.interrupt, t, !0)),
      t.$list.on("mouseleave.slick", n.proxy(t.interrupt, t, !1)));
  };
  t.prototype.initializeEvents = function () {
    var t = this;
    t.initArrowEvents();
    t.initDotEvents();
    t.initSlideEvents();
    t.$list.on(
      "touchstart.slick mousedown.slick",
      { action: "start" },
      t.swipeHandler
    );
    t.$list.on(
      "touchmove.slick mousemove.slick",
      { action: "move" },
      t.swipeHandler
    );
    t.$list.on(
      "touchend.slick mouseup.slick",
      { action: "end" },
      t.swipeHandler
    );
    t.$list.on(
      "touchcancel.slick mouseleave.slick",
      { action: "end" },
      t.swipeHandler
    );
    t.$list.on("click.slick", t.clickHandler);
    n(document).on(t.visibilityChange, n.proxy(t.visibility, t));
    !0 === t.options.accessibility && t.$list.on("keydown.slick", t.keyHandler);
    !0 === t.options.focusOnSelect &&
      n(t.$slideTrack).children().on("click.slick", t.selectHandler);
    n(window).on(
      "orientationchange.slick.slick-" + t.instanceUid,
      n.proxy(t.orientationChange, t)
    );
    n(window).on("resize.slick.slick-" + t.instanceUid, n.proxy(t.resize, t));
    n("[draggable!=true]", t.$slideTrack).on("dragstart", t.preventDefault);
    n(window).on("load.slick.slick-" + t.instanceUid, t.setPosition);
    n(t.setPosition);
  };
  t.prototype.initUI = function () {
    var n = this;
    !0 === n.options.arrows &&
      n.slideCount > n.options.slidesToShow &&
      (n.$prevArrow.show(), n.$nextArrow.show());
    !0 === n.options.dots &&
      n.slideCount > n.options.slidesToShow &&
      n.$dots.show();
  };
  t.prototype.keyHandler = function (n) {
    var t = this;
    n.target.tagName.match("TEXTAREA|INPUT|SELECT") ||
      (37 === n.keyCode && !0 === t.options.accessibility
        ? t.changeSlide({
            data: { message: !0 === t.options.rtl ? "next" : "previous" },
          })
        : 39 === n.keyCode &&
          !0 === t.options.accessibility &&
          t.changeSlide({
            data: { message: !0 === t.options.rtl ? "previous" : "next" },
          }));
  };
  t.prototype.lazyLoad = function () {
    function f(i) {
      n("img[data-lazy]", i).each(function () {
        var i = n(this),
          r = n(this).attr("data-lazy"),
          f = n(this).attr("data-srcset"),
          e = n(this).attr("data-sizes") || t.$slider.attr("data-sizes"),
          u = document.createElement("img");
        u.onload = function () {
          i.animate({ opacity: 0 }, 100, function () {
            f && (i.attr("srcset", f), e && i.attr("sizes", e));
            i.attr("src", r).animate({ opacity: 1 }, 200, function () {
              i.removeAttr("data-lazy data-srcset data-sizes").removeClass(
                "slick-loading"
              );
            });
            t.$slider.trigger("lazyLoaded", [t, i, r]);
          });
        };
        u.onerror = function () {
          i.removeAttr("data-lazy")
            .removeClass("slick-loading")
            .addClass("slick-lazyload-error");
          t.$slider.trigger("lazyLoadError", [t, i, r]);
        };
        u.src = r;
      });
    }
    var u,
      i,
      r,
      t = this;
    if (
      (!0 === t.options.centerMode
        ? !0 === t.options.infinite
          ? (r =
              (i = t.currentSlide + (t.options.slidesToShow / 2 + 1)) +
              t.options.slidesToShow +
              2)
          : ((i = Math.max(
              0,
              t.currentSlide - (t.options.slidesToShow / 2 + 1)
            )),
            (r = t.options.slidesToShow / 2 + 1 + 2 + t.currentSlide))
        : ((i = t.options.infinite
            ? t.options.slidesToShow + t.currentSlide
            : t.currentSlide),
          (r = Math.ceil(i + t.options.slidesToShow)),
          !0 === t.options.fade && (i > 0 && i--, r <= t.slideCount && r++)),
      (u = t.$slider.find(".slick-slide").slice(i, r)),
      "anticipated" === t.options.lazyLoad)
    )
      for (
        var e = i - 1, o = r, s = t.$slider.find(".slick-slide"), h = 0;
        h < t.options.slidesToScroll;
        h++
      )
        e < 0 && (e = t.slideCount - 1),
          (u = (u = u.add(s.eq(e))).add(s.eq(o))),
          e--,
          o++;
    f(u);
    t.slideCount <= t.options.slidesToShow
      ? f(t.$slider.find(".slick-slide"))
      : t.currentSlide >= t.slideCount - t.options.slidesToShow
      ? f(t.$slider.find(".slick-cloned").slice(0, t.options.slidesToShow))
      : 0 === t.currentSlide &&
        f(t.$slider.find(".slick-cloned").slice(-1 * t.options.slidesToShow));
  };
  t.prototype.loadSlider = function () {
    var n = this;
    n.setPosition();
    n.$slideTrack.css({ opacity: 1 });
    n.$slider.removeClass("slick-loading");
    n.initUI();
    "progressive" === n.options.lazyLoad && n.progressiveLazyLoad();
  };
  t.prototype.next = t.prototype.slickNext = function () {
    this.changeSlide({ data: { message: "next" } });
  };
  t.prototype.orientationChange = function () {
    var n = this;
    n.checkResponsive();
    n.setPosition();
  };
  t.prototype.pause = t.prototype.slickPause = function () {
    var n = this;
    n.autoPlayClear();
    n.paused = !0;
  };
  t.prototype.play = t.prototype.slickPlay = function () {
    var n = this;
    n.autoPlay();
    n.options.autoplay = !0;
    n.paused = !1;
    n.focussed = !1;
    n.interrupted = !1;
  };
  t.prototype.postSlide = function (t) {
    var i = this;
    i.unslicked ||
      (i.$slider.trigger("afterChange", [i, t]),
      (i.animating = !1),
      i.slideCount > i.options.slidesToShow && i.setPosition(),
      (i.swipeLeft = null),
      i.options.autoplay && i.autoPlay(),
      !0 === i.options.accessibility &&
        (i.initADA(),
        i.options.focusOnChange &&
          n(i.$slides.get(i.currentSlide)).attr("tabindex", 0).focus()));
  };
  t.prototype.prev = t.prototype.slickPrev = function () {
    this.changeSlide({ data: { message: "previous" } });
  };
  t.prototype.preventDefault = function (n) {
    n.preventDefault();
  };
  t.prototype.progressiveLazyLoad = function (t) {
    t = t || 1;
    var r,
      u,
      f,
      e,
      o,
      i = this,
      s = n("img[data-lazy]", i.$slider);
    s.length
      ? ((r = s.first()),
        (u = r.attr("data-lazy")),
        (f = r.attr("data-srcset")),
        (e = r.attr("data-sizes") || i.$slider.attr("data-sizes")),
        ((o = document.createElement("img")).onload = function () {
          f && (r.attr("srcset", f), e && r.attr("sizes", e));
          r.attr("src", u)
            .removeAttr("data-lazy data-srcset data-sizes")
            .removeClass("slick-loading");
          !0 === i.options.adaptiveHeight && i.setPosition();
          i.$slider.trigger("lazyLoaded", [i, r, u]);
          i.progressiveLazyLoad();
        }),
        (o.onerror = function () {
          t < 3
            ? setTimeout(function () {
                i.progressiveLazyLoad(t + 1);
              }, 500)
            : (r
                .removeAttr("data-lazy")
                .removeClass("slick-loading")
                .addClass("slick-lazyload-error"),
              i.$slider.trigger("lazyLoadError", [i, r, u]),
              i.progressiveLazyLoad());
        }),
        (o.src = u))
      : i.$slider.trigger("allImagesLoaded", [i]);
  };
  t.prototype.refresh = function (t) {
    var r,
      u,
      i = this;
    u = i.slideCount - i.options.slidesToShow;
    !i.options.infinite && i.currentSlide > u && (i.currentSlide = u);
    i.slideCount <= i.options.slidesToShow && (i.currentSlide = 0);
    r = i.currentSlide;
    i.destroy(!0);
    n.extend(i, i.initials, { currentSlide: r });
    i.init();
    t || i.changeSlide({ data: { message: "index", index: r } }, !1);
  };
  t.prototype.registerBreakpoints = function () {
    var u,
      f,
      i,
      t = this,
      r = t.options.responsive || null;
    if ("array" === n.type(r) && r.length) {
      t.respondTo = t.options.respondTo || "window";
      for (u in r)
        if (((i = t.breakpoints.length - 1), r.hasOwnProperty(u))) {
          for (f = r[u].breakpoint; i >= 0; )
            t.breakpoints[i] &&
              t.breakpoints[i] === f &&
              t.breakpoints.splice(i, 1),
              i--;
          t.breakpoints.push(f);
          t.breakpointSettings[f] = r[u].settings;
        }
      t.breakpoints.sort(function (n, i) {
        return t.options.mobileFirst ? n - i : i - n;
      });
    }
  };
  t.prototype.reinit = function () {
    var t = this;
    t.$slides = t.$slideTrack.children(t.options.slide).addClass("slick-slide");
    t.slideCount = t.$slides.length;
    t.currentSlide >= t.slideCount &&
      0 !== t.currentSlide &&
      (t.currentSlide = t.currentSlide - t.options.slidesToScroll);
    t.slideCount <= t.options.slidesToShow && (t.currentSlide = 0);
    t.registerBreakpoints();
    t.setProps();
    t.setupInfinite();
    t.buildArrows();
    t.updateArrows();
    t.initArrowEvents();
    t.buildDots();
    t.updateDots();
    t.initDotEvents();
    t.cleanUpSlideEvents();
    t.initSlideEvents();
    t.checkResponsive(!1, !0);
    !0 === t.options.focusOnSelect &&
      n(t.$slideTrack).children().on("click.slick", t.selectHandler);
    t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0);
    t.setPosition();
    t.focusHandler();
    t.paused = !t.options.autoplay;
    t.autoPlay();
    t.$slider.trigger("reInit", [t]);
  };
  t.prototype.resize = function () {
    var t = this;
    n(window).width() !== t.windowWidth &&
      (clearTimeout(t.windowDelay),
      (t.windowDelay = window.setTimeout(function () {
        t.windowWidth = n(window).width();
        t.checkResponsive();
        t.unslicked || t.setPosition();
      }, 50)));
  };
  t.prototype.removeSlide = t.prototype.slickRemove = function (n, t, i) {
    var r = this;
    if (
      ((n =
        "boolean" == typeof n
          ? !0 === (t = n)
            ? 0
            : r.slideCount - 1
          : !0 === t
          ? --n
          : n),
      r.slideCount < 1 || n < 0 || n > r.slideCount - 1)
    )
      return !1;
    r.unload();
    !0 === i
      ? r.$slideTrack.children().remove()
      : r.$slideTrack.children(this.options.slide).eq(n).remove();
    r.$slides = r.$slideTrack.children(this.options.slide);
    r.$slideTrack.children(this.options.slide).detach();
    r.$slideTrack.append(r.$slides);
    r.$slidesCache = r.$slides;
    r.reinit();
  };
  t.prototype.setCSS = function (n) {
    var r,
      u,
      t = this,
      i = {};
    !0 === t.options.rtl && (n = -n);
    r = "left" == t.positionProp ? Math.ceil(n) + "px" : "0px";
    u = "top" == t.positionProp ? Math.ceil(n) + "px" : "0px";
    i[t.positionProp] = n;
    !1 === t.transformsEnabled
      ? t.$slideTrack.css(i)
      : ((i = {}),
        !1 === t.cssTransitions
          ? ((i[t.animType] = "translate(" + r + ", " + u + ")"),
            t.$slideTrack.css(i))
          : ((i[t.animType] = "translate3d(" + r + ", " + u + ", 0px)"),
            t.$slideTrack.css(i)));
  };
  t.prototype.setDimensions = function () {
    var n = this,
      t;
    !1 === n.options.vertical
      ? !0 === n.options.centerMode &&
        n.$list.css({ padding: "0px " + n.options.centerPadding })
      : (n.$list.height(
          n.$slides.first().outerHeight(!0) * n.options.slidesToShow
        ),
        !0 === n.options.centerMode &&
          n.$list.css({ padding: n.options.centerPadding + " 0px" }));
    n.listWidth = n.$list.width();
    n.listHeight = n.$list.height();
    !1 === n.options.vertical && !1 === n.options.variableWidth
      ? ((n.slideWidth = Math.ceil(n.listWidth / n.options.slidesToShow)),
        n.$slideTrack.width(
          Math.ceil(
            n.slideWidth * n.$slideTrack.children(".slick-slide").length
          )
        ))
      : !0 === n.options.variableWidth
      ? n.$slideTrack.width(5e3 * n.slideCount)
      : ((n.slideWidth = Math.ceil(n.listWidth)),
        n.$slideTrack.height(
          Math.ceil(
            n.$slides.first().outerHeight(!0) *
              n.$slideTrack.children(".slick-slide").length
          )
        ));
    t = n.$slides.first().outerWidth(!0) - n.$slides.first().width();
    !1 === n.options.variableWidth &&
      n.$slideTrack.children(".slick-slide").width(n.slideWidth - t);
  };
  t.prototype.setFade = function () {
    var i,
      t = this;
    t.$slides.each(function (r, u) {
      i = t.slideWidth * r * -1;
      !0 === t.options.rtl
        ? n(u).css({
            position: "relative",
            right: i,
            top: 0,
            zIndex: t.options.zIndex - 2,
            opacity: 0,
          })
        : n(u).css({
            position: "relative",
            left: i,
            top: 0,
            zIndex: t.options.zIndex - 2,
            opacity: 0,
          });
    });
    t.$slides
      .eq(t.currentSlide)
      .css({ zIndex: t.options.zIndex - 1, opacity: 1 });
  };
  t.prototype.setHeight = function () {
    var n = this,
      t;
    1 === n.options.slidesToShow &&
      !0 === n.options.adaptiveHeight &&
      !1 === n.options.vertical &&
      ((t = n.$slides.eq(n.currentSlide).outerHeight(!0)),
      n.$list.css("height", t));
  };
  t.prototype.setOption = t.prototype.slickSetOption = function () {
    var u,
      f,
      e,
      i,
      r,
      t = this,
      o = !1;
    if (
      ("object" === n.type(arguments[0])
        ? ((e = arguments[0]), (o = arguments[1]), (r = "multiple"))
        : "string" === n.type(arguments[0]) &&
          ((e = arguments[0]),
          (i = arguments[1]),
          (o = arguments[2]),
          "responsive" === arguments[0] && "array" === n.type(arguments[1])
            ? (r = "responsive")
            : void 0 !== arguments[1] && (r = "single")),
      "single" === r)
    )
      t.options[e] = i;
    else if ("multiple" === r)
      n.each(e, function (n, i) {
        t.options[n] = i;
      });
    else if ("responsive" === r)
      for (f in i)
        if ("array" !== n.type(t.options.responsive))
          t.options.responsive = [i[f]];
        else {
          for (u = t.options.responsive.length - 1; u >= 0; )
            t.options.responsive[u].breakpoint === i[f].breakpoint &&
              t.options.responsive.splice(u, 1),
              u--;
          t.options.responsive.push(i[f]);
        }
    o && (t.unload(), t.reinit());
  };
  t.prototype.setPosition = function () {
    var n = this;
    n.setDimensions();
    n.setHeight();
    !1 === n.options.fade ? n.setCSS(n.getLeft(n.currentSlide)) : n.setFade();
    n.$slider.trigger("setPosition", [n]);
  };
  t.prototype.setProps = function () {
    var n = this,
      t = document.body.style;
    n.positionProp = !0 === n.options.vertical ? "top" : "left";
    "top" === n.positionProp
      ? n.$slider.addClass("slick-vertical")
      : n.$slider.removeClass("slick-vertical");
    (void 0 === t.WebkitTransition &&
      void 0 === t.MozTransition &&
      void 0 === t.msTransition) ||
      (!0 === n.options.useCSS && (n.cssTransitions = !0));
    n.options.fade &&
      ("number" == typeof n.options.zIndex
        ? n.options.zIndex < 3 && (n.options.zIndex = 3)
        : (n.options.zIndex = n.defaults.zIndex));
    void 0 !== t.OTransform &&
      ((n.animType = "OTransform"),
      (n.transformType = "-o-transform"),
      (n.transitionType = "OTransition"),
      void 0 === t.perspectiveProperty &&
        void 0 === t.webkitPerspective &&
        (n.animType = !1));
    void 0 !== t.MozTransform &&
      ((n.animType = "MozTransform"),
      (n.transformType = "-moz-transform"),
      (n.transitionType = "MozTransition"),
      void 0 === t.perspectiveProperty &&
        void 0 === t.MozPerspective &&
        (n.animType = !1));
    void 0 !== t.webkitTransform &&
      ((n.animType = "webkitTransform"),
      (n.transformType = "-webkit-transform"),
      (n.transitionType = "webkitTransition"),
      void 0 === t.perspectiveProperty &&
        void 0 === t.webkitPerspective &&
        (n.animType = !1));
    void 0 !== t.msTransform &&
      ((n.animType = "msTransform"),
      (n.transformType = "-ms-transform"),
      (n.transitionType = "msTransition"),
      void 0 === t.msTransform && (n.animType = !1));
    void 0 !== t.transform &&
      !1 !== n.animType &&
      ((n.animType = "transform"),
      (n.transformType = "transform"),
      (n.transitionType = "transition"));
    n.transformsEnabled =
      n.options.useTransform && null !== n.animType && !1 !== n.animType;
  };
  t.prototype.setSlideClasses = function (n) {
    var u,
      i,
      r,
      f,
      t = this,
      e;
    ((i = t.$slider
      .find(".slick-slide")
      .removeClass("slick-active slick-center slick-current")
      .attr("aria-hidden", "true")),
    t.$slides.eq(n).addClass("slick-current"),
    !0 === t.options.centerMode)
      ? ((e = t.options.slidesToShow % 2 == 0 ? 1 : 0),
        (u = Math.floor(t.options.slidesToShow / 2)),
        !0 === t.options.infinite &&
          (n >= u && n <= t.slideCount - 1 - u
            ? t.$slides
                .slice(n - u + e, n + u + 1)
                .addClass("slick-active")
                .attr("aria-hidden", "false")
            : ((r = t.options.slidesToShow + n),
              i
                .slice(r - u + 1 + e, r + u + 2)
                .addClass("slick-active")
                .attr("aria-hidden", "false")),
          0 === n
            ? i
                .eq(i.length - 1 - t.options.slidesToShow)
                .addClass("slick-center")
            : n === t.slideCount - 1 &&
              i.eq(t.options.slidesToShow).addClass("slick-center")),
        t.$slides.eq(n).addClass("slick-center"))
      : n >= 0 && n <= t.slideCount - t.options.slidesToShow
      ? t.$slides
          .slice(n, n + t.options.slidesToShow)
          .addClass("slick-active")
          .attr("aria-hidden", "false")
      : i.length <= t.options.slidesToShow
      ? i.addClass("slick-active").attr("aria-hidden", "false")
      : ((f = t.slideCount % t.options.slidesToShow),
        (r = !0 === t.options.infinite ? t.options.slidesToShow + n : n),
        t.options.slidesToShow == t.options.slidesToScroll &&
        t.slideCount - n < t.options.slidesToShow
          ? i
              .slice(r - (t.options.slidesToShow - f), r + f)
              .addClass("slick-active")
              .attr("aria-hidden", "false")
          : i
              .slice(r, r + t.options.slidesToShow)
              .addClass("slick-active")
              .attr("aria-hidden", "false"));
    ("ondemand" !== t.options.lazyLoad &&
      "anticipated" !== t.options.lazyLoad) ||
      t.lazyLoad();
  };
  t.prototype.setupInfinite = function () {
    var i,
      r,
      u,
      t = this;
    if (
      (!0 === t.options.fade && (t.options.centerMode = !1),
      !0 === t.options.infinite &&
        !1 === t.options.fade &&
        ((r = null), t.slideCount > t.options.slidesToShow))
    ) {
      for (
        u =
          !0 === t.options.centerMode
            ? t.options.slidesToShow + 1
            : t.options.slidesToShow,
          i = t.slideCount;
        i > t.slideCount - u;
        i -= 1
      )
        (r = i - 1),
          n(t.$slides[r])
            .clone(!0)
            .attr("id", "")
            .attr("data-slick-index", r - t.slideCount)
            .prependTo(t.$slideTrack)
            .addClass("slick-cloned");
      for (i = 0; i < u + t.slideCount; i += 1)
        (r = i),
          n(t.$slides[r])
            .clone(!0)
            .attr("id", "")
            .attr("data-slick-index", r + t.slideCount)
            .appendTo(t.$slideTrack)
            .addClass("slick-cloned");
      t.$slideTrack
        .find(".slick-cloned")
        .find("[id]")
        .each(function () {
          n(this).attr("id", "");
        });
    }
  };
  t.prototype.interrupt = function (n) {
    var t = this;
    n || t.autoPlay();
    t.interrupted = n;
  };
  t.prototype.selectHandler = function (t) {
    var i = this,
      u = n(t.target).is(".slick-slide")
        ? n(t.target)
        : n(t.target).parents(".slick-slide"),
      r = parseInt(u.attr("data-slick-index"));
    r || (r = 0);
    i.slideCount <= i.options.slidesToShow
      ? i.slideHandler(r, !1, !0)
      : i.slideHandler(r);
  };
  t.prototype.slideHandler = function (n, t, i) {
    var u,
      f,
      s,
      e,
      o,
      h = null,
      r = this;
    if (
      ((t = t || !1),
      !(
        (!0 === r.animating && !0 === r.options.waitForAnimate) ||
        (!0 === r.options.fade && r.currentSlide === n)
      ))
    )
      if (
        (!1 === t && r.asNavFor(n),
        (u = n),
        (h = r.getLeft(u)),
        (e = r.getLeft(r.currentSlide)),
        (r.currentLeft = null === r.swipeLeft ? e : r.swipeLeft),
        !1 === r.options.infinite &&
          !1 === r.options.centerMode &&
          (n < 0 || n > r.getDotCount() * r.options.slidesToScroll))
      )
        !1 === r.options.fade &&
          ((u = r.currentSlide),
          !0 !== i
            ? r.animateSlide(e, function () {
                r.postSlide(u);
              })
            : r.postSlide(u));
      else if (
        !1 === r.options.infinite &&
        !0 === r.options.centerMode &&
        (n < 0 || n > r.slideCount - r.options.slidesToScroll)
      )
        !1 === r.options.fade &&
          ((u = r.currentSlide),
          !0 !== i
            ? r.animateSlide(e, function () {
                r.postSlide(u);
              })
            : r.postSlide(u));
      else {
        if (
          (r.options.autoplay && clearInterval(r.autoPlayTimer),
          (f =
            u < 0
              ? r.slideCount % r.options.slidesToScroll != 0
                ? r.slideCount - (r.slideCount % r.options.slidesToScroll)
                : r.slideCount + u
              : u >= r.slideCount
              ? r.slideCount % r.options.slidesToScroll != 0
                ? 0
                : u - r.slideCount
              : u),
          (r.animating = !0),
          r.$slider.trigger("beforeChange", [r, r.currentSlide, f]),
          (s = r.currentSlide),
          (r.currentSlide = f),
          r.setSlideClasses(r.currentSlide),
          r.options.asNavFor &&
            (o = (o = r.getNavTarget()).slick("getSlick")).slideCount <=
              o.options.slidesToShow &&
            o.setSlideClasses(r.currentSlide),
          r.updateDots(),
          r.updateArrows(),
          !0 === r.options.fade)
        )
          return (
            !0 !== i
              ? (r.fadeSlideOut(s),
                r.fadeSlide(f, function () {
                  r.postSlide(f);
                }))
              : r.postSlide(f),
            void r.animateHeight()
          );
        !0 !== i
          ? r.animateSlide(h, function () {
              r.postSlide(f);
            })
          : r.postSlide(f);
      }
  };
  t.prototype.startLoad = function () {
    var n = this;
    !0 === n.options.arrows &&
      n.slideCount > n.options.slidesToShow &&
      (n.$prevArrow.hide(), n.$nextArrow.hide());
    !0 === n.options.dots &&
      n.slideCount > n.options.slidesToShow &&
      n.$dots.hide();
    n.$slider.addClass("slick-loading");
  };
  t.prototype.swipeDirection = function () {
    var i,
      r,
      u,
      n,
      t = this;
    return (
      (i = t.touchObject.startX - t.touchObject.curX),
      (r = t.touchObject.startY - t.touchObject.curY),
      (u = Math.atan2(r, i)),
      (n = Math.round((180 * u) / Math.PI)) < 0 && (n = 360 - Math.abs(n)),
      n <= 45 && n >= 0
        ? !1 === t.options.rtl
          ? "left"
          : "right"
        : n <= 360 && n >= 315
        ? !1 === t.options.rtl
          ? "left"
          : "right"
        : n >= 135 && n <= 225
        ? !1 === t.options.rtl
          ? "right"
          : "left"
        : !0 === t.options.verticalSwiping
        ? n >= 35 && n <= 135
          ? "down"
          : "up"
        : "vertical"
    );
  };
  t.prototype.swipeEnd = function () {
    var t,
      i,
      n = this;
    if (((n.dragging = !1), (n.swiping = !1), n.scrolling))
      return (n.scrolling = !1), !1;
    if (
      ((n.interrupted = !1),
      (n.shouldClick = !(n.touchObject.swipeLength > 10)),
      void 0 === n.touchObject.curX)
    )
      return !1;
    if (
      (!0 === n.touchObject.edgeHit &&
        n.$slider.trigger("edge", [n, n.swipeDirection()]),
      n.touchObject.swipeLength >= n.touchObject.minSwipe)
    ) {
      switch ((i = n.swipeDirection())) {
        case "left":
        case "down":
          t = n.options.swipeToSlide
            ? n.checkNavigable(n.currentSlide + n.getSlideCount())
            : n.currentSlide + n.getSlideCount();
          n.currentDirection = 0;
          break;
        case "right":
        case "up":
          t = n.options.swipeToSlide
            ? n.checkNavigable(n.currentSlide - n.getSlideCount())
            : n.currentSlide - n.getSlideCount();
          n.currentDirection = 1;
      }
      "vertical" != i &&
        (n.slideHandler(t),
        (n.touchObject = {}),
        n.$slider.trigger("swipe", [n, i]));
    } else
      n.touchObject.startX !== n.touchObject.curX &&
        (n.slideHandler(n.currentSlide), (n.touchObject = {}));
  };
  t.prototype.swipeHandler = function (n) {
    var t = this;
    if (
      !(
        !1 === t.options.swipe ||
        ("ontouchend" in document && !1 === t.options.swipe) ||
        (!1 === t.options.draggable && -1 !== n.type.indexOf("mouse"))
      )
    )
      switch (
        ((t.touchObject.fingerCount =
          n.originalEvent && void 0 !== n.originalEvent.touches
            ? n.originalEvent.touches.length
            : 1),
        (t.touchObject.minSwipe = t.listWidth / t.options.touchThreshold),
        !0 === t.options.verticalSwiping &&
          (t.touchObject.minSwipe = t.listHeight / t.options.touchThreshold),
        n.data.action)
      ) {
        case "start":
          t.swipeStart(n);
          break;
        case "move":
          t.swipeMove(n);
          break;
        case "end":
          t.swipeEnd(n);
      }
  };
  t.prototype.swipeMove = function (n) {
    var f,
      e,
      r,
      u,
      i,
      o,
      t = this;
    return (
      (i = void 0 !== n.originalEvent ? n.originalEvent.touches : null),
      !(!t.dragging || t.scrolling || (i && 1 !== i.length)) &&
        ((f = t.getLeft(t.currentSlide)),
        (t.touchObject.curX = void 0 !== i ? i[0].pageX : n.clientX),
        (t.touchObject.curY = void 0 !== i ? i[0].pageY : n.clientY),
        (t.touchObject.swipeLength = Math.round(
          Math.sqrt(Math.pow(t.touchObject.curX - t.touchObject.startX, 2))
        )),
        (o = Math.round(
          Math.sqrt(Math.pow(t.touchObject.curY - t.touchObject.startY, 2))
        )),
        !t.options.verticalSwiping && !t.swiping && o > 4
          ? ((t.scrolling = !0), !1)
          : (!0 === t.options.verticalSwiping &&
              (t.touchObject.swipeLength = o),
            (e = t.swipeDirection()),
            void 0 !== n.originalEvent &&
              t.touchObject.swipeLength > 4 &&
              ((t.swiping = !0), n.preventDefault()),
            (u =
              (!1 === t.options.rtl ? 1 : -1) *
              (t.touchObject.curX > t.touchObject.startX ? 1 : -1)),
            !0 === t.options.verticalSwiping &&
              (u = t.touchObject.curY > t.touchObject.startY ? 1 : -1),
            (r = t.touchObject.swipeLength),
            (t.touchObject.edgeHit = !1),
            !1 === t.options.infinite &&
              ((0 === t.currentSlide && "right" === e) ||
                (t.currentSlide >= t.getDotCount() && "left" === e)) &&
              ((r = t.touchObject.swipeLength * t.options.edgeFriction),
              (t.touchObject.edgeHit = !0)),
            (t.swipeLeft =
              !1 === t.options.vertical
                ? f + r * u
                : f + r * (t.$list.height() / t.listWidth) * u),
            !0 === t.options.verticalSwiping && (t.swipeLeft = f + r * u),
            !0 !== t.options.fade &&
              !1 !== t.options.touchMove &&
              (!0 === t.animating
                ? ((t.swipeLeft = null), !1)
                : void t.setCSS(t.swipeLeft))))
    );
  };
  t.prototype.swipeStart = function (n) {
    var i,
      t = this;
    if (
      ((t.interrupted = !0),
      1 !== t.touchObject.fingerCount || t.slideCount <= t.options.slidesToShow)
    )
      return (t.touchObject = {}), !1;
    void 0 !== n.originalEvent &&
      void 0 !== n.originalEvent.touches &&
      (i = n.originalEvent.touches[0]);
    t.touchObject.startX = t.touchObject.curX =
      void 0 !== i ? i.pageX : n.clientX;
    t.touchObject.startY = t.touchObject.curY =
      void 0 !== i ? i.pageY : n.clientY;
    t.dragging = !0;
  };
  t.prototype.unfilterSlides = t.prototype.slickUnfilter = function () {
    var n = this;
    null !== n.$slidesCache &&
      (n.unload(),
      n.$slideTrack.children(this.options.slide).detach(),
      n.$slidesCache.appendTo(n.$slideTrack),
      n.reinit());
  };
  t.prototype.unload = function () {
    var t = this;
    n(".slick-cloned", t.$slider).remove();
    t.$dots && t.$dots.remove();
    t.$prevArrow &&
      t.htmlExpr.test(t.options.prevArrow) &&
      t.$prevArrow.remove();
    t.$nextArrow &&
      t.htmlExpr.test(t.options.nextArrow) &&
      t.$nextArrow.remove();
    t.$slides
      .removeClass("slick-slide slick-active slick-visible slick-current")
      .attr("aria-hidden", "true")
      .css("width", "");
  };
  t.prototype.unslick = function (n) {
    var t = this;
    t.$slider.trigger("unslick", [t, n]);
    t.destroy();
  };
  t.prototype.updateArrows = function () {
    var n = this;
    Math.floor(n.options.slidesToShow / 2);
    !0 === n.options.arrows &&
      n.slideCount > n.options.slidesToShow &&
      !n.options.infinite &&
      (n.$prevArrow
        .removeClass("slick-disabled")
        .attr("aria-disabled", "false"),
      n.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
      0 === n.currentSlide
        ? (n.$prevArrow
            .addClass("slick-disabled")
            .attr("aria-disabled", "true"),
          n.$nextArrow
            .removeClass("slick-disabled")
            .attr("aria-disabled", "false"))
        : n.currentSlide >= n.slideCount - n.options.slidesToShow &&
          !1 === n.options.centerMode
        ? (n.$nextArrow
            .addClass("slick-disabled")
            .attr("aria-disabled", "true"),
          n.$prevArrow
            .removeClass("slick-disabled")
            .attr("aria-disabled", "false"))
        : n.currentSlide >= n.slideCount - 1 &&
          !0 === n.options.centerMode &&
          (n.$nextArrow
            .addClass("slick-disabled")
            .attr("aria-disabled", "true"),
          n.$prevArrow
            .removeClass("slick-disabled")
            .attr("aria-disabled", "false")));
  };
  t.prototype.updateDots = function () {
    var n = this;
    null !== n.$dots &&
      (n.$dots.find("li").removeClass("slick-active").end(),
      n.$dots
        .find("li")
        .eq(Math.floor(n.currentSlide / n.options.slidesToScroll))
        .addClass("slick-active"));
  };
  t.prototype.visibility = function () {
    var n = this;
    n.options.autoplay && (n.interrupted = document[n.hidden] ? !0 : !1);
  };
  n.fn.slick = function () {
    for (
      var u,
        i = this,
        r = arguments[0],
        f = Array.prototype.slice.call(arguments, 1),
        e = i.length,
        n = 0;
      n < e;
      n++
    )
      if (
        ("object" == typeof r || void 0 === r
          ? (i[n].slick = new t(i[n], r))
          : (u = i[n].slick[r].apply(i[n].slick, f)),
        void 0 !== u)
      )
        return u;
    return i;
  };
});
$(".midbar-slider").on("init", function () {
  $(".slick-slide:first-child").find(".htmlVideo").hasClass("htmlVideo") ==
    !0 &&
    (console.log("init"),
    setTimeout(function () {
      $(".midbar-slider").slick("slickPause");
      console.log("slick Pause");
    }, 10),
    $(".slick-current .htmlVideo").get(0).play());
});
if ($(".midbar-slider .htmlVideo").length) {
  for (
    velements = document.getElementsByClassName("htmlVideo"), i = 0;
    i < velements.length;
    i++
  )
    velements[i].addEventListener("play", blockSlider, !1),
      velements[i].addEventListener("ended", resumeSlider, !1);
  function resumeSlider() {
    $(".midbar-slider").slick("slickPlay");
    $(".midbar-slider").slick("slickNext");
    console.log("Video stopped and slider resume");
  }
  function blockSlider() {
    $(".midbar-slider").slick("slickPause");
    console.log("Slider stopped and video playing");
  }
}
objRTL = IsRTL == "True" && IsRTL != undefined ? !0 : !1;
$(".midbar-slider").slick({
  lazyLoad: "ondemand",
  slidesToShow: 1,
  slidesToScroll: 2,
  dots: $(".midbar-slider > div").length > 1 ? !0 : !1,
  arrows: !1,
  swipeToSlide: !0,
  infinite: !0,
  speed: 1100,
  fade: !0,
  autoplay: !0,
  autoplaySpeed: 7e3,
  cssEase: "linear",
  touchThreshold: 100,
  pauseOnHover: !1,
  rtl: objRTL,
});
$(".midbar-section .slick-dots").wrap(
  "<div class='container position-relative'></div>"
);
$(document).ready(function () {
  $(".midbar-slider").on("beforeChange", function () {
    $(".videoIframe").each(function () {
      this.contentWindow.postMessage(
        '{"event":"command","func":"stopVideo","args":""}',
        "*"
      );
    });
    $(".slick-current .htmlVideo").length &&
      ($(".slick-slide .htmlVideo").get(0).pause(),
      ($(".slick-slide .htmlVideo").get(0).currentTime = 0));
  });
  $(".midbar-slider").on("afterChange", function () {
    $(".midbar-slider").slick("slickPlay");
    $(".htmlVideo").each(function () {
      this.currentTime = 0;
      this.pause();
    });
    $(".slick-current .videoIframe").length
      ? (console.log("you"),
        $(".slick-current .videoIframe").attr(
          "src",
          $(".slick-current .videoIframe").attr("data-video-src")
        ),
        onYouTubeIframeAPIReady())
      : $(".slick-current .mp4Video").length &&
        ($(".midbar-slider").slick("slickPause"),
        $(".slick-current .htmlVideo").get(0).play());
  });
});
!(function (n) {
  "function" == typeof define && define.amd
    ? define(["jquery"], n)
    : "object" == typeof module && module.exports
    ? (module.exports = function (t, i) {
        return (
          void 0 === i &&
            (i =
              "undefined" != typeof window
                ? require("jquery")
                : require("jquery")(t)),
          n(i),
          i
        );
      })
    : n(jQuery);
})(function (n) {
  var t = (function () {
      function u(n, t) {
        return d.call(n, t);
      }
      function l(n, t) {
        var e,
          o,
          s,
          f,
          h,
          y,
          c,
          p,
          i,
          l,
          b,
          u = t && t.split("/"),
          a = r.map,
          v = (a && a["*"]) || {};
        if (n) {
          for (
            h = (n = n.split("/")).length - 1,
              r.nodeIdCompat && w.test(n[h]) && (n[h] = n[h].replace(w, "")),
              "." === n[0].charAt(0) &&
                u &&
                (n = u.slice(0, u.length - 1).concat(n)),
              i = 0;
            i < n.length;
            i++
          )
            if ("." === (b = n[i])) n.splice(i, 1), (i -= 1);
            else if (".." === b) {
              if (0 === i || (1 === i && ".." === n[2]) || ".." === n[i - 1])
                continue;
              0 < i && (n.splice(i - 1, 2), (i -= 2));
            }
          n = n.join("/");
        }
        if ((u || v) && a) {
          for (i = (e = n.split("/")).length; 0 < i; i -= 1) {
            if (((o = e.slice(0, i).join("/")), u))
              for (l = u.length; 0 < l; l -= 1)
                if ((s = (s = a[u.slice(0, l).join("/")]) && s[o])) {
                  f = s;
                  y = i;
                  break;
                }
            if (f) break;
            !c && v && v[o] && ((c = v[o]), (p = i));
          }
          !f && c && ((f = c), (y = p));
          f && (e.splice(0, y, f), (n = e.join("/")));
        }
        return n;
      }
      function nt(n, t) {
        return function () {
          var i = g.call(arguments, 0);
          return (
            "string" != typeof i[0] && 1 === i.length && i.push(null),
            o.apply(f, i.concat([n, t]))
          );
        };
      }
      function it(n) {
        return function (t) {
          i[n] = t;
        };
      }
      function a(n) {
        if (u(e, n)) {
          var t = e[n];
          delete e[n];
          c[n] = !0;
          h.apply(f, t);
        }
        if (!u(i, n) && !u(c, n)) throw new Error("No " + n);
        return i[n];
      }
      function b(n) {
        var i,
          t = n ? n.indexOf("!") : -1;
        return (
          -1 < t &&
            ((i = n.substring(0, t)), (n = n.substring(t + 1, n.length))),
          [i, n]
        );
      }
      function tt(n) {
        return n ? b(n) : [];
      }
      var t, v, y, k, f, h, o, p, s, i, e, r, c, d, g, w;
      return (
        n && n.fn && n.fn.select2 && n.fn.select2.amd && (t = n.fn.select2.amd),
        (t && t.requirejs) ||
          (t ? (y = t) : (t = {}),
          (i = {}),
          (e = {}),
          (r = {}),
          (c = {}),
          (d = Object.prototype.hasOwnProperty),
          (g = [].slice),
          (w = /\.js$/),
          (p = function (n, t) {
            var r,
              u = b(n),
              i = u[0],
              f = t[1];
            return (
              (n = u[1]),
              i && (r = a((i = l(i, f)))),
              i
                ? (n =
                    r && r.normalize
                      ? r.normalize(
                          n,
                          (function (n) {
                            return function (t) {
                              return l(t, n);
                            };
                          })(f)
                        )
                      : l(n, f))
                : ((i = (u = b((n = l(n, f))))[0]),
                  (n = u[1]),
                  i && (r = a(i))),
              { f: i ? i + "!" + n : n, n: n, pr: i, p: r }
            );
          }),
          (s = {
            require: function (n) {
              return nt(n);
            },
            exports: function (n) {
              var t = i[n];
              return void 0 !== t ? t : (i[n] = {});
            },
            module: function (n) {
              return {
                id: n,
                uri: "",
                exports: i[n],
                config: (function (n) {
                  return function () {
                    return (r && r.config && r.config[n]) || {};
                  };
                })(n),
              };
            },
          }),
          (h = function (n, t, r, o) {
            var y,
              h,
              b,
              w,
              l,
              k,
              d,
              v = [],
              g = typeof r;
            if (((k = tt((o = o || n))), "undefined" == g || "function" == g)) {
              for (
                t =
                  !t.length && r.length ? ["require", "exports", "module"] : t,
                  l = 0;
                l < t.length;
                l += 1
              )
                if ("require" === (h = (w = p(t[l], k)).f)) v[l] = s.require(n);
                else if ("exports" === h) (v[l] = s.exports(n)), (d = !0);
                else if ("module" === h) y = v[l] = s.module(n);
                else if (u(i, h) || u(e, h) || u(c, h)) v[l] = a(h);
                else {
                  if (!w.p) throw new Error(n + " missing " + h);
                  w.p.load(w.n, nt(o, !0), it(h), {});
                  v[l] = i[h];
                }
              b = r ? r.apply(i[n], v) : void 0;
              n &&
                (y && y.exports !== f && y.exports !== i[n]
                  ? (i[n] = y.exports)
                  : (b === f && d) || (i[n] = b));
            } else n && (i[n] = r);
          }),
          (v =
            y =
            o =
              function (n, t, i, u, e) {
                if ("string" == typeof n)
                  return s[n] ? s[n](t) : a(p(n, tt(t)).f);
                if (!n.splice) {
                  if (((r = n).deps && o(r.deps, r.callback), !t)) return;
                  t.splice ? ((n = t), (t = i), (i = null)) : (n = f);
                }
                return (
                  (t = t || function () {}),
                  "function" == typeof i && ((i = u), (u = e)),
                  u
                    ? h(f, n, t, i)
                    : setTimeout(function () {
                        h(f, n, t, i);
                      }, 4),
                  o
                );
              }),
          (o.config = function (n) {
            return o(n);
          }),
          (v._defined = i),
          ((k = function (n, t, r) {
            if ("string" != typeof n)
              throw new Error(
                "See almond README: incorrect module build, no module name"
              );
            t.splice || ((r = t), (t = []));
            u(i, n) || u(e, n) || (e[n] = [n, t, r]);
          }).amd = { jQuery: !0 }),
          (t.requirejs = v),
          (t.require = y),
          (t.define = k)),
        t.define("almond", function () {}),
        t.define("jquery", [], function () {
          var t = n || $;
          return (
            null == t &&
              console &&
              console.error &&
              console.error(
                "Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."
              ),
            t
          );
        }),
        t.define("select2/utils", ["jquery"], function (n) {
          function u(n) {
            var i = n.prototype,
              r = [],
              t;
            for (t in i)
              "function" == typeof i[t] && "constructor" !== t && r.push(t);
            return r;
          }
          function i() {
            this.listeners = {};
          }
          var t = {},
            r;
          return (
            (t.Extend = function (n, t) {
              function r() {
                this.constructor = n;
              }
              var u = {}.hasOwnProperty,
                i;
              for (i in t) u.call(t, i) && (n[i] = t[i]);
              return (
                (r.prototype = t.prototype),
                (n.prototype = new r()),
                (n.__super__ = t.prototype),
                n
              );
            }),
            (t.Decorate = function (n, t) {
              function i() {
                var r = Array.prototype.unshift,
                  u = t.prototype.constructor.length,
                  i = n.prototype.constructor;
                0 < u &&
                  (r.call(arguments, n.prototype.constructor),
                  (i = t.prototype.constructor));
                i.apply(this, arguments);
              }
              function c(n) {
                var r = function () {},
                  u;
                return (
                  n in i.prototype && (r = i.prototype[n]),
                  (u = t.prototype[n]),
                  function () {
                    return (
                      Array.prototype.unshift.call(arguments, r),
                      u.apply(this, arguments)
                    );
                  }
                );
              }
              var s = u(t),
                h = u(n),
                r,
                e,
                f,
                o;
              for (
                t.displayName = n.displayName,
                  i.prototype = new (function () {
                    this.constructor = i;
                  })(),
                  r = 0;
                r < h.length;
                r++
              )
                (e = h[r]), (i.prototype[e] = n.prototype[e]);
              for (f = 0; f < s.length; f++)
                (o = s[f]), (i.prototype[o] = c(o));
              return i;
            }),
            (i.prototype.on = function (n, t) {
              this.listeners = this.listeners || {};
              n in this.listeners
                ? this.listeners[n].push(t)
                : (this.listeners[n] = [t]);
            }),
            (i.prototype.trigger = function (n) {
              var i = Array.prototype.slice,
                t = i.call(arguments, 1);
              this.listeners = this.listeners || {};
              null == t && (t = []);
              0 === t.length && t.push({});
              (t[0]._type = n) in this.listeners &&
                this.invoke(this.listeners[n], i.call(arguments, 1));
              "*" in this.listeners &&
                this.invoke(this.listeners["*"], arguments);
            }),
            (i.prototype.invoke = function (n, t) {
              for (var i = 0, r = n.length; i < r; i++) n[i].apply(this, t);
            }),
            (t.Observable = i),
            (t.generateChars = function (n) {
              for (var t = "", i = 0; i < n; i++)
                t += Math.floor(36 * Math.random()).toString(36);
              return t;
            }),
            (t.bind = function (n, t) {
              return function () {
                n.apply(t, arguments);
              };
            }),
            (t._convertData = function (n) {
              var f, r, i, u, t;
              for (f in n)
                if (((r = f.split("-")), (i = n), 1 !== r.length)) {
                  for (u = 0; u < r.length; u++)
                    (t = r[u]),
                      (t = t.substring(0, 1).toLowerCase() + t.substring(1)) in
                        i || (i[t] = {}),
                      u == r.length - 1 && (i[t] = n[f]),
                      (i = i[t]);
                  delete n[f];
                }
              return n;
            }),
            (t.hasScroll = function (t, i) {
              var u = n(i),
                f = i.style.overflowX,
                r = i.style.overflowY;
              return (
                (f !== r || ("hidden" !== r && "visible" !== r)) &&
                ("scroll" === f ||
                  "scroll" === r ||
                  u.innerHeight() < i.scrollHeight ||
                  u.innerWidth() < i.scrollWidth)
              );
            }),
            (t.escapeMarkup = function (n) {
              var t = {
                "\\": "&#92;",
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#39;",
                "/": "&#47;",
              };
              return "string" != typeof n
                ? n
                : String(n).replace(/[&<>"'\/\\]/g, function (n) {
                    return t[n];
                  });
            }),
            (t.appendMany = function (t, i) {
              if ("1.7" === n.fn.jquery.substr(0, 3)) {
                var r = n();
                n.map(i, function (n) {
                  r = r.add(n);
                });
                i = r;
              }
              t.append(i);
            }),
            (t.__cache = {}),
            (r = 0),
            (t.GetUniqueElementId = function (n) {
              var t = n.getAttribute("data-select2-id");
              return (
                null == t &&
                  (n.id
                    ? ((t = n.id), n.setAttribute("data-select2-id", t))
                    : (n.setAttribute("data-select2-id", ++r),
                      (t = r.toString()))),
                t
              );
            }),
            (t.StoreData = function (n, i, r) {
              var u = t.GetUniqueElementId(n);
              t.__cache[u] || (t.__cache[u] = {});
              t.__cache[u][i] = r;
            }),
            (t.GetData = function (i, r) {
              var u = t.GetUniqueElementId(i);
              return r
                ? t.__cache[u] && null != t.__cache[u][r]
                  ? t.__cache[u][r]
                  : n(i).data(r)
                : t.__cache[u];
            }),
            (t.RemoveData = function (n) {
              var i = t.GetUniqueElementId(n);
              null != t.__cache[i] && delete t.__cache[i];
              n.removeAttribute("data-select2-id");
            }),
            t
          );
        }),
        t.define("select2/results", ["jquery", "./utils"], function (n, t) {
          function i(n, t, r) {
            this.$element = n;
            this.data = r;
            this.options = t;
            i.__super__.constructor.call(this);
          }
          return (
            t.Extend(i, t.Observable),
            (i.prototype.render = function () {
              var t = n(
                '<ul class="select2-results__options" role="listbox"></ul>'
              );
              return (
                this.options.get("multiple") &&
                  t.attr("aria-multiselectable", "true"),
                (this.$results = t)
              );
            }),
            (i.prototype.clear = function () {
              this.$results.empty();
            }),
            (i.prototype.displayMessage = function (t) {
              var u = this.options.get("escapeMarkup"),
                i,
                r;
              this.clear();
              this.hideLoading();
              i = n(
                '<li role="alert" aria-live="assertive" class="select2-results__option"></li>'
              );
              r = this.options.get("translations").get(t.message);
              i.append(u(r(t.args)));
              i[0].className += " select2-results__message";
              this.$results.append(i);
            }),
            (i.prototype.hideMessages = function () {
              this.$results.find(".select2-results__message").remove();
            }),
            (i.prototype.append = function (n) {
              var i, t, r, u;
              if (
                (this.hideLoading(),
                (i = []),
                null != n.results && 0 !== n.results.length)
              ) {
                for (
                  n.results = this.sort(n.results), t = 0;
                  t < n.results.length;
                  t++
                )
                  (r = n.results[t]), (u = this.option(r)), i.push(u);
                this.$results.append(i);
              } else
                0 === this.$results.children().length &&
                  this.trigger("results:message", { message: "noResults" });
            }),
            (i.prototype.position = function (n, t) {
              t.find(".select2-results").append(n);
            }),
            (i.prototype.sort = function (n) {
              return this.options.get("sorter")(n);
            }),
            (i.prototype.highlightFirstItem = function () {
              var n = this.$results.find(
                  ".select2-results__option[aria-selected]"
                ),
                t = n.filter("[aria-selected=true]");
              0 < t.length
                ? t.first().trigger("mouseenter")
                : n.first().trigger("mouseenter");
              this.ensureHighlightVisible();
            }),
            (i.prototype.setClasses = function () {
              var i = this;
              this.data.current(function (r) {
                var u = n.map(r, function (n) {
                  return n.id.toString();
                });
                i.$results
                  .find(".select2-results__option[aria-selected]")
                  .each(function () {
                    var r = n(this),
                      i = t.GetData(this, "data"),
                      f = "" + i.id;
                    (null != i.element && i.element.selected) ||
                    (null == i.element && -1 < n.inArray(f, u))
                      ? r.attr("aria-selected", "true")
                      : r.attr("aria-selected", "false");
                  });
              });
            }),
            (i.prototype.showLoading = function (n) {
              this.hideLoading();
              var i = {
                  disabled: !0,
                  loading: !0,
                  text: this.options.get("translations").get("searching")(n),
                },
                t = this.option(i);
              t.className += " loading-results";
              this.$results.prepend(t);
            }),
            (i.prototype.hideLoading = function () {
              this.$results.find(".loading-results").remove();
            }),
            (i.prototype.option = function (i) {
              var u = document.createElement("li"),
                r,
                l,
                o,
                a,
                s,
                f,
                h,
                e,
                v,
                y,
                c;
              u.className = "select2-results__option";
              r = { role: "option", "aria-selected": "false" };
              l =
                window.Element.prototype.matches ||
                window.Element.prototype.msMatchesSelector ||
                window.Element.prototype.webkitMatchesSelector;
              for (o in (((null != i.element &&
                l.call(i.element, ":disabled")) ||
                (null == i.element && i.disabled)) &&
                (delete r["aria-selected"], (r["aria-disabled"] = "true")),
              null == i.id && delete r["aria-selected"],
              null != i._resultId && (u.id = i._resultId),
              i.title && (u.title = i.title),
              i.children &&
                ((r.role = "group"),
                (r["aria-label"] = i.text),
                delete r["aria-selected"]),
              r))
                (a = r[o]), u.setAttribute(o, a);
              if (i.children) {
                for (
                  s = n(u),
                    f = document.createElement("strong"),
                    f.className = "select2-results__group",
                    n(f),
                    this.template(i, f),
                    h = [],
                    e = 0;
                  e < i.children.length;
                  e++
                )
                  (v = i.children[e]), (y = this.option(v)), h.push(y);
                c = n("<ul></ul>", {
                  class:
                    "select2-results__options select2-results__options--nested",
                });
                c.append(h);
                s.append(f);
                s.append(c);
              } else this.template(i, u);
              return t.StoreData(u, "data", i), u;
            }),
            (i.prototype.bind = function (i) {
              var r = this,
                u = i.id + "-results";
              this.$results.attr("id", u);
              i.on("results:all", function (n) {
                r.clear();
                r.append(n.data);
                i.isOpen() && (r.setClasses(), r.highlightFirstItem());
              });
              i.on("results:append", function (n) {
                r.append(n.data);
                i.isOpen() && r.setClasses();
              });
              i.on("query", function (n) {
                r.hideMessages();
                r.showLoading(n);
              });
              i.on("select", function () {
                i.isOpen() &&
                  (r.setClasses(),
                  r.options.get("scrollAfterSelect") && r.highlightFirstItem());
              });
              i.on("unselect", function () {
                i.isOpen() &&
                  (r.setClasses(),
                  r.options.get("scrollAfterSelect") && r.highlightFirstItem());
              });
              i.on("open", function () {
                r.$results.attr("aria-expanded", "true");
                r.$results.attr("aria-hidden", "false");
                r.setClasses();
                r.ensureHighlightVisible();
              });
              i.on("close", function () {
                r.$results.attr("aria-expanded", "false");
                r.$results.attr("aria-hidden", "true");
                r.$results.removeAttr("aria-activedescendant");
              });
              i.on("results:toggle", function () {
                var n = r.getHighlightedResults();
                0 !== n.length && n.trigger("mouseup");
              });
              i.on("results:select", function () {
                var n = r.getHighlightedResults(),
                  i;
                0 !== n.length &&
                  ((i = t.GetData(n[0], "data")),
                  "true" == n.attr("aria-selected")
                    ? r.trigger("close", {})
                    : r.trigger("select", { data: i }));
              });
              i.on("results:previous", function () {
                var i = r.getHighlightedResults(),
                  u = r.$results.find("[aria-selected]"),
                  f = u.index(i),
                  n,
                  t;
                if (!(f <= 0)) {
                  n = f - 1;
                  0 === i.length && (n = 0);
                  t = u.eq(n);
                  t.trigger("mouseenter");
                  var e = r.$results.offset().top,
                    o = t.offset().top,
                    s = r.$results.scrollTop() + (o - e);
                  0 === n
                    ? r.$results.scrollTop(0)
                    : o - e < 0 && r.$results.scrollTop(s);
                }
              });
              i.on("results:next", function () {
                var e = r.getHighlightedResults(),
                  t = r.$results.find("[aria-selected]"),
                  i = t.index(e) + 1,
                  n;
                if (!(i >= t.length)) {
                  n = t.eq(i);
                  n.trigger("mouseenter");
                  var u = r.$results.offset().top + r.$results.outerHeight(!1),
                    f = n.offset().top + n.outerHeight(!1),
                    o = r.$results.scrollTop() + f - u;
                  0 === i
                    ? r.$results.scrollTop(0)
                    : u < f && r.$results.scrollTop(o);
                }
              });
              i.on("results:focus", function (n) {
                n.element.addClass("select2-results__option--highlighted");
              });
              i.on("results:message", function (n) {
                r.displayMessage(n);
              });
              n.fn.mousewheel &&
                this.$results.on("mousewheel", function (n) {
                  var t = r.$results.scrollTop(),
                    i = r.$results.get(0).scrollHeight - t + n.deltaY,
                    u = 0 < n.deltaY && t - n.deltaY <= 0,
                    f = n.deltaY < 0 && i <= r.$results.height();
                  u
                    ? (r.$results.scrollTop(0),
                      n.preventDefault(),
                      n.stopPropagation())
                    : f &&
                      (r.$results.scrollTop(
                        r.$results.get(0).scrollHeight - r.$results.height()
                      ),
                      n.preventDefault(),
                      n.stopPropagation());
                });
              this.$results.on(
                "mouseup",
                ".select2-results__option[aria-selected]",
                function (i) {
                  var f = n(this),
                    u = t.GetData(this, "data");
                  "true" !== f.attr("aria-selected")
                    ? r.trigger("select", { originalEvent: i, data: u })
                    : r.options.get("multiple")
                    ? r.trigger("unselect", { originalEvent: i, data: u })
                    : r.trigger("close", {});
                }
              );
              this.$results.on(
                "mouseenter",
                ".select2-results__option[aria-selected]",
                function () {
                  var i = t.GetData(this, "data");
                  r.getHighlightedResults().removeClass(
                    "select2-results__option--highlighted"
                  );
                  r.trigger("results:focus", { data: i, element: n(this) });
                }
              );
            }),
            (i.prototype.getHighlightedResults = function () {
              return this.$results.find(
                ".select2-results__option--highlighted"
              );
            }),
            (i.prototype.destroy = function () {
              this.$results.remove();
            }),
            (i.prototype.ensureHighlightVisible = function () {
              var n = this.getHighlightedResults();
              if (0 !== n.length) {
                var f = this.$results.find("[aria-selected]").index(n),
                  t = this.$results.offset().top,
                  i = n.offset().top,
                  r = this.$results.scrollTop() + (i - t),
                  u = i - t;
                r -= 2 * n.outerHeight(!1);
                f <= 2
                  ? this.$results.scrollTop(0)
                  : (u > this.$results.outerHeight() || u < 0) &&
                    this.$results.scrollTop(r);
              }
            }),
            (i.prototype.template = function (t, i) {
              var u = this.options.get("templateResult"),
                f = this.options.get("escapeMarkup"),
                r = u(t, i);
              null == r
                ? (i.style.display = "none")
                : "string" == typeof r
                ? (i.innerHTML = f(r))
                : n(i).append(r);
            }),
            i
          );
        }),
        t.define("select2/keys", [], function () {
          return {
            BACKSPACE: 8,
            TAB: 9,
            ENTER: 13,
            SHIFT: 16,
            CTRL: 17,
            ALT: 18,
            ESC: 27,
            SPACE: 32,
            PAGE_UP: 33,
            PAGE_DOWN: 34,
            END: 35,
            HOME: 36,
            LEFT: 37,
            UP: 38,
            RIGHT: 39,
            DOWN: 40,
            DELETE: 46,
          };
        }),
        t.define(
          "select2/selection/base",
          ["jquery", "../utils", "../keys"],
          function (n, t, i) {
            function r(n, t) {
              this.$element = n;
              this.options = t;
              r.__super__.constructor.call(this);
            }
            return (
              t.Extend(r, t.Observable),
              (r.prototype.render = function () {
                var i = n(
                  '<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>'
                );
                return (
                  (this._tabindex = 0),
                  null != t.GetData(this.$element[0], "old-tabindex")
                    ? (this._tabindex = t.GetData(
                        this.$element[0],
                        "old-tabindex"
                      ))
                    : null != this.$element.attr("tabindex") &&
                      (this._tabindex = this.$element.attr("tabindex")),
                  i.attr("title", this.$element.attr("title")),
                  i.attr("tabindex", this._tabindex),
                  i.attr("aria-disabled", "false"),
                  (this.$selection = i)
                );
              }),
              (r.prototype.bind = function (n) {
                var t = this,
                  r = n.id + "-results";
                this.container = n;
                this.$selection.on("focus", function (n) {
                  t.trigger("focus", n);
                });
                this.$selection.on("blur", function (n) {
                  t._handleBlur(n);
                });
                this.$selection.on("keydown", function (n) {
                  t.trigger("keypress", n);
                  n.which === i.SPACE && n.preventDefault();
                });
                n.on("results:focus", function (n) {
                  t.$selection.attr("aria-activedescendant", n.data._resultId);
                });
                n.on("selection:update", function (n) {
                  t.update(n.data);
                });
                n.on("open", function () {
                  t.$selection.attr("aria-expanded", "true");
                  t.$selection.attr("aria-owns", r);
                  t._attachCloseHandler(n);
                });
                n.on("close", function () {
                  t.$selection.attr("aria-expanded", "false");
                  t.$selection.removeAttr("aria-activedescendant");
                  t.$selection.removeAttr("aria-owns");
                  t.$selection.trigger("focus");
                  t._detachCloseHandler(n);
                });
                n.on("enable", function () {
                  t.$selection.attr("tabindex", t._tabindex);
                  t.$selection.attr("aria-disabled", "false");
                });
                n.on("disable", function () {
                  t.$selection.attr("tabindex", "-1");
                  t.$selection.attr("aria-disabled", "true");
                });
              }),
              (r.prototype._handleBlur = function (t) {
                var i = this;
                window.setTimeout(function () {
                  document.activeElement == i.$selection[0] ||
                    n.contains(i.$selection[0], document.activeElement) ||
                    i.trigger("blur", t);
                }, 1);
              }),
              (r.prototype._attachCloseHandler = function (i) {
                n(document.body).on("mousedown.select2." + i.id, function (i) {
                  var r = n(i.target).closest(".select2");
                  n(".select2.select2-container--open").each(function () {
                    this != r[0] && t.GetData(this, "element").select2("close");
                  });
                });
              }),
              (r.prototype._detachCloseHandler = function (t) {
                n(document.body).off("mousedown.select2." + t.id);
              }),
              (r.prototype.position = function (n, t) {
                t.find(".selection").append(n);
              }),
              (r.prototype.destroy = function () {
                this._detachCloseHandler(this.container);
              }),
              (r.prototype.update = function () {
                throw new Error(
                  "The `update` method must be defined in child classes."
                );
              }),
              (r.prototype.isEnabled = function () {
                return !this.isDisabled();
              }),
              (r.prototype.isDisabled = function () {
                return this.options.get("disabled");
              }),
              r
            );
          }
        ),
        t.define(
          "select2/selection/single",
          ["jquery", "./base", "../utils", "../keys"],
          function (n, t, i) {
            function r() {
              r.__super__.constructor.apply(this, arguments);
            }
            return (
              i.Extend(r, t),
              (r.prototype.render = function () {
                var n = r.__super__.render.call(this);
                return (
                  n.addClass("select2-selection--single"),
                  n.html(
                    '<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'
                  ),
                  n
                );
              }),
              (r.prototype.bind = function (n) {
                var i = this,
                  t;
                r.__super__.bind.apply(this, arguments);
                t = n.id + "-container";
                this.$selection
                  .find(".select2-selection__rendered")
                  .attr("id", t)
                  .attr("role", "textbox")
                  .attr("aria-readonly", "true");
                this.$selection.attr("aria-labelledby", t);
                this.$selection.on("mousedown", function (n) {
                  1 === n.which && i.trigger("toggle", { originalEvent: n });
                });
                this.$selection.on("focus", function () {});
                this.$selection.on("blur", function () {});
                n.on("focus", function () {
                  n.isOpen() || i.$selection.trigger("focus");
                });
              }),
              (r.prototype.clear = function () {
                var n = this.$selection.find(".select2-selection__rendered");
                n.empty();
                n.removeAttr("title");
              }),
              (r.prototype.display = function (n, t) {
                var i = this.options.get("templateSelection");
                return this.options.get("escapeMarkup")(i(n, t));
              }),
              (r.prototype.selectionContainer = function () {
                return n("<span></span>");
              }),
              (r.prototype.update = function (n) {
                var r;
                if (0 !== n.length) {
                  var i = n[0],
                    t = this.$selection.find(".select2-selection__rendered"),
                    u = this.display(i, t);
                  t.empty().append(u);
                  r = i.title || i.text;
                  r ? t.attr("title", r) : t.removeAttr("title");
                } else this.clear();
              }),
              r
            );
          }
        ),
        t.define(
          "select2/selection/multiple",
          ["jquery", "./base", "../utils"],
          function (n, t, i) {
            function r() {
              r.__super__.constructor.apply(this, arguments);
            }
            return (
              i.Extend(r, t),
              (r.prototype.render = function () {
                var n = r.__super__.render.call(this);
                return (
                  n.addClass("select2-selection--multiple"),
                  n.html('<ul class="select2-selection__rendered"></ul>'),
                  n
                );
              }),
              (r.prototype.bind = function () {
                var t = this;
                r.__super__.bind.apply(this, arguments);
                this.$selection.on("click", function (n) {
                  t.trigger("toggle", { originalEvent: n });
                });
                this.$selection.on(
                  "click",
                  ".select2-selection__choice__remove",
                  function (r) {
                    if (!t.isDisabled()) {
                      var u = n(this).parent(),
                        f = i.GetData(u[0], "data");
                      t.trigger("unselect", { originalEvent: r, data: f });
                    }
                  }
                );
              }),
              (r.prototype.clear = function () {
                var n = this.$selection.find(".select2-selection__rendered");
                n.empty();
                n.removeAttr("title");
              }),
              (r.prototype.display = function (n, t) {
                var i = this.options.get("templateSelection");
                return this.options.get("escapeMarkup")(i(n, t));
              }),
              (r.prototype.selectionContainer = function () {
                return n(
                  '<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>'
                );
              }),
              (r.prototype.update = function (n) {
                var f, r, e, o;
                if ((this.clear(), 0 !== n.length)) {
                  for (f = [], r = 0; r < n.length; r++) {
                    var u = n[r],
                      t = this.selectionContainer(),
                      s = this.display(u, t);
                    t.append(s);
                    e = u.title || u.text;
                    e && t.attr("title", e);
                    i.StoreData(t[0], "data", u);
                    f.push(t);
                  }
                  o = this.$selection.find(".select2-selection__rendered");
                  i.appendMany(o, f);
                }
              }),
              r
            );
          }
        ),
        t.define("select2/selection/placeholder", ["../utils"], function () {
          function n(n, t, i) {
            this.placeholder = this.normalizePlaceholder(i.get("placeholder"));
            n.call(this, t, i);
          }
          return (
            (n.prototype.normalizePlaceholder = function (n, t) {
              return "string" == typeof t && (t = { id: "", text: t }), t;
            }),
            (n.prototype.createPlaceholder = function (n, t) {
              var i = this.selectionContainer();
              return (
                i.html(this.display(t)),
                i
                  .addClass("select2-selection__placeholder")
                  .removeClass("select2-selection__choice"),
                i
              );
            }),
            (n.prototype.update = function (n, t) {
              var r = 1 == t.length && t[0].id != this.placeholder.id,
                i;
              if (1 < t.length || r) return n.call(this, t);
              this.clear();
              i = this.createPlaceholder(this.placeholder);
              this.$selection.find(".select2-selection__rendered").append(i);
            }),
            n
          );
        }),
        t.define(
          "select2/selection/allowClear",
          ["jquery", "../keys", "../utils"],
          function (n, t, i) {
            function r() {}
            return (
              (r.prototype.bind = function (n, t, i) {
                var r = this;
                n.call(this, t, i);
                null == this.placeholder &&
                  this.options.get("debug") &&
                  window.console &&
                  console.error &&
                  console.error(
                    "Select2: The `allowClear` option should be used in combination with the `placeholder` option."
                  );
                this.$selection.on(
                  "mousedown",
                  ".select2-selection__clear",
                  function (n) {
                    r._handleClear(n);
                  }
                );
                t.on("keypress", function (n) {
                  r._handleKeyboardClear(n, t);
                });
              }),
              (r.prototype._handleClear = function (n, t) {
                var e, u, o, r, f;
                if (
                  !this.isDisabled() &&
                  ((e = this.$selection.find(".select2-selection__clear")),
                  0 !== e.length)
                )
                  if (
                    (t.stopPropagation(),
                    (u = i.GetData(e[0], "data")),
                    (o = this.$element.val()),
                    this.$element.val(this.placeholder.id),
                    (r = { data: u }),
                    this.trigger("clear", r),
                    r.prevented)
                  )
                    this.$element.val(o);
                  else {
                    for (f = 0; f < u.length; f++)
                      if (
                        ((r = { data: u[f] }),
                        this.trigger("unselect", r),
                        r.prevented)
                      )
                        return void this.$element.val(o);
                    this.$element.trigger("input").trigger("change");
                    this.trigger("toggle", {});
                  }
              }),
              (r.prototype._handleKeyboardClear = function (n, i, r) {
                r.isOpen() ||
                  (i.which != t.DELETE && i.which != t.BACKSPACE) ||
                  this._handleClear(i);
              }),
              (r.prototype.update = function (t, r) {
                if (
                  (t.call(this, r),
                  !(
                    0 <
                      this.$selection.find(".select2-selection__placeholder")
                        .length || 0 === r.length
                  ))
                ) {
                  var f = this.options
                      .get("translations")
                      .get("removeAllItems"),
                    u = n(
                      '<span class="select2-selection__clear" title="' +
                        f() +
                        '">&times;</span>'
                    );
                  i.StoreData(u[0], "data", r);
                  this.$selection
                    .find(".select2-selection__rendered")
                    .prepend(u);
                }
              }),
              r
            );
          }
        ),
        t.define(
          "select2/selection/search",
          ["jquery", "../utils", "../keys"],
          function (n, t, i) {
            function r(n, t, i) {
              n.call(this, t, i);
            }
            return (
              (r.prototype.render = function (t) {
                var i = n(
                    '<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" /></li>'
                  ),
                  r;
                return (
                  (this.$searchContainer = i),
                  (this.$search = i.find("input")),
                  (r = t.call(this)),
                  this._transferTabIndex(),
                  r
                );
              }),
              (r.prototype.bind = function (n, r, u) {
                var f = this,
                  s = r.id + "-results",
                  e,
                  o;
                n.call(this, r, u);
                r.on("open", function () {
                  f.$search.attr("aria-controls", s);
                  f.$search.trigger("focus");
                });
                r.on("close", function () {
                  f.$search.val("");
                  f.$search.removeAttr("aria-controls");
                  f.$search.removeAttr("aria-activedescendant");
                  f.$search.trigger("focus");
                });
                r.on("enable", function () {
                  f.$search.prop("disabled", !1);
                  f._transferTabIndex();
                });
                r.on("disable", function () {
                  f.$search.prop("disabled", !0);
                });
                r.on("focus", function () {
                  f.$search.trigger("focus");
                });
                r.on("results:focus", function (n) {
                  n.data._resultId
                    ? f.$search.attr("aria-activedescendant", n.data._resultId)
                    : f.$search.removeAttr("aria-activedescendant");
                });
                this.$selection.on(
                  "focusin",
                  ".select2-search--inline",
                  function (n) {
                    f.trigger("focus", n);
                  }
                );
                this.$selection.on(
                  "focusout",
                  ".select2-search--inline",
                  function (n) {
                    f._handleBlur(n);
                  }
                );
                this.$selection.on(
                  "keydown",
                  ".select2-search--inline",
                  function (n) {
                    var r, u;
                    (n.stopPropagation(),
                    f.trigger("keypress", n),
                    (f._keyUpPrevented = n.isDefaultPrevented()),
                    n.which === i.BACKSPACE && "" === f.$search.val()) &&
                      ((r = f.$searchContainer.prev(
                        ".select2-selection__choice"
                      )),
                      0 < r.length &&
                        ((u = t.GetData(r[0], "data")),
                        f.searchRemoveChoice(u),
                        n.preventDefault()));
                  }
                );
                this.$selection.on(
                  "click",
                  ".select2-search--inline",
                  function (n) {
                    f.$search.val() && n.stopPropagation();
                  }
                );
                e = document.documentMode;
                o = e && e <= 11;
                this.$selection.on(
                  "input.searchcheck",
                  ".select2-search--inline",
                  function () {
                    o
                      ? f.$selection.off("input.search input.searchcheck")
                      : f.$selection.off("keyup.search");
                  }
                );
                this.$selection.on(
                  "keyup.search input.search",
                  ".select2-search--inline",
                  function (n) {
                    if (o && "input" === n.type)
                      f.$selection.off("input.search input.searchcheck");
                    else {
                      var t = n.which;
                      t != i.SHIFT &&
                        t != i.CTRL &&
                        t != i.ALT &&
                        t != i.TAB &&
                        f.handleSearch(n);
                    }
                  }
                );
              }),
              (r.prototype._transferTabIndex = function () {
                this.$search.attr("tabindex", this.$selection.attr("tabindex"));
                this.$selection.attr("tabindex", "-1");
              }),
              (r.prototype.createPlaceholder = function (n, t) {
                this.$search.attr("placeholder", t.text);
              }),
              (r.prototype.update = function (n, t) {
                var i = this.$search[0] == document.activeElement;
                this.$search.attr("placeholder", "");
                n.call(this, t);
                this.$selection
                  .find(".select2-selection__rendered")
                  .append(this.$searchContainer);
                this.resizeSearch();
                i && this.$search.trigger("focus");
              }),
              (r.prototype.handleSearch = function () {
                if ((this.resizeSearch(), !this._keyUpPrevented)) {
                  var n = this.$search.val();
                  this.trigger("query", { term: n });
                }
                this._keyUpPrevented = !1;
              }),
              (r.prototype.searchRemoveChoice = function (n, t) {
                this.trigger("unselect", { data: t });
                this.$search.val(t.text);
                this.handleSearch();
              }),
              (r.prototype.resizeSearch = function () {
                this.$search.css("width", "25px");
                var n = "";
                n =
                  "" !== this.$search.attr("placeholder")
                    ? this.$selection
                        .find(".select2-selection__rendered")
                        .width()
                    : 0.75 * (this.$search.val().length + 1) + "em";
                this.$search.css("width", n);
              }),
              r
            );
          }
        ),
        t.define("select2/selection/eventRelay", ["jquery"], function (n) {
          function t() {}
          return (
            (t.prototype.bind = function (t, i, r) {
              var u = this,
                f = [
                  "open",
                  "opening",
                  "close",
                  "closing",
                  "select",
                  "selecting",
                  "unselect",
                  "unselecting",
                  "clear",
                  "clearing",
                ],
                e = [
                  "opening",
                  "closing",
                  "selecting",
                  "unselecting",
                  "clearing",
                ];
              t.call(this, i, r);
              i.on("*", function (t, i) {
                if (-1 !== n.inArray(t, f)) {
                  i = i || {};
                  var r = n.Event("select2:" + t, { params: i });
                  u.$element.trigger(r);
                  -1 !== n.inArray(t, e) &&
                    (i.prevented = r.isDefaultPrevented());
                }
              });
            }),
            t
          );
        }),
        t.define("select2/translation", ["jquery", "require"], function (n, t) {
          function i(n) {
            this.dict = n || {};
          }
          return (
            (i.prototype.all = function () {
              return this.dict;
            }),
            (i.prototype.get = function (n) {
              return this.dict[n];
            }),
            (i.prototype.extend = function (t) {
              this.dict = n.extend({}, t.all(), this.dict);
            }),
            (i._cache = {}),
            (i.loadPath = function (n) {
              if (!(n in i._cache)) {
                var r = t(n);
                i._cache[n] = r;
              }
              return new i(i._cache[n]);
            }),
            i
          );
        }),
        t.define("select2/diacritics", [], function () {
          return {
            "Ⓐ": "A",
            Ａ: "A",
            À: "A",
            Á: "A",
            Â: "A",
            Ầ: "A",
            Ấ: "A",
            Ẫ: "A",
            Ẩ: "A",
            Ã: "A",
            Ā: "A",
            Ă: "A",
            Ằ: "A",
            Ắ: "A",
            Ẵ: "A",
            Ẳ: "A",
            Ȧ: "A",
            Ǡ: "A",
            Ä: "A",
            Ǟ: "A",
            Ả: "A",
            Å: "A",
            Ǻ: "A",
            Ǎ: "A",
            Ȁ: "A",
            Ȃ: "A",
            Ạ: "A",
            Ậ: "A",
            Ặ: "A",
            Ḁ: "A",
            Ą: "A",
            Ⱥ: "A",
            Ɐ: "A",
            Ꜳ: "AA",
            Æ: "AE",
            Ǽ: "AE",
            Ǣ: "AE",
            Ꜵ: "AO",
            Ꜷ: "AU",
            Ꜹ: "AV",
            Ꜻ: "AV",
            Ꜽ: "AY",
            "Ⓑ": "B",
            Ｂ: "B",
            Ḃ: "B",
            Ḅ: "B",
            Ḇ: "B",
            Ƀ: "B",
            Ƃ: "B",
            Ɓ: "B",
            "Ⓒ": "C",
            Ｃ: "C",
            Ć: "C",
            Ĉ: "C",
            Ċ: "C",
            Č: "C",
            Ç: "C",
            Ḉ: "C",
            Ƈ: "C",
            Ȼ: "C",
            Ꜿ: "C",
            "Ⓓ": "D",
            Ｄ: "D",
            Ḋ: "D",
            Ď: "D",
            Ḍ: "D",
            Ḑ: "D",
            Ḓ: "D",
            Ḏ: "D",
            Đ: "D",
            Ƌ: "D",
            Ɗ: "D",
            Ɖ: "D",
            Ꝺ: "D",
            Ǳ: "DZ",
            Ǆ: "DZ",
            ǲ: "Dz",
            ǅ: "Dz",
            "Ⓔ": "E",
            Ｅ: "E",
            È: "E",
            É: "E",
            Ê: "E",
            Ề: "E",
            Ế: "E",
            Ễ: "E",
            Ể: "E",
            Ẽ: "E",
            Ē: "E",
            Ḕ: "E",
            Ḗ: "E",
            Ĕ: "E",
            Ė: "E",
            Ë: "E",
            Ẻ: "E",
            Ě: "E",
            Ȅ: "E",
            Ȇ: "E",
            Ẹ: "E",
            Ệ: "E",
            Ȩ: "E",
            Ḝ: "E",
            Ę: "E",
            Ḙ: "E",
            Ḛ: "E",
            Ɛ: "E",
            Ǝ: "E",
            "Ⓕ": "F",
            Ｆ: "F",
            Ḟ: "F",
            Ƒ: "F",
            Ꝼ: "F",
            "Ⓖ": "G",
            Ｇ: "G",
            Ǵ: "G",
            Ĝ: "G",
            Ḡ: "G",
            Ğ: "G",
            Ġ: "G",
            Ǧ: "G",
            Ģ: "G",
            Ǥ: "G",
            Ɠ: "G",
            Ꞡ: "G",
            Ᵹ: "G",
            Ꝿ: "G",
            "Ⓗ": "H",
            Ｈ: "H",
            Ĥ: "H",
            Ḣ: "H",
            Ḧ: "H",
            Ȟ: "H",
            Ḥ: "H",
            Ḩ: "H",
            Ḫ: "H",
            Ħ: "H",
            Ⱨ: "H",
            Ⱶ: "H",
            Ɥ: "H",
            "Ⓘ": "I",
            Ｉ: "I",
            Ì: "I",
            Í: "I",
            Î: "I",
            Ĩ: "I",
            Ī: "I",
            Ĭ: "I",
            İ: "I",
            Ï: "I",
            Ḯ: "I",
            Ỉ: "I",
            Ǐ: "I",
            Ȉ: "I",
            Ȋ: "I",
            Ị: "I",
            Į: "I",
            Ḭ: "I",
            Ɨ: "I",
            "Ⓙ": "J",
            Ｊ: "J",
            Ĵ: "J",
            Ɉ: "J",
            "Ⓚ": "K",
            Ｋ: "K",
            Ḱ: "K",
            Ǩ: "K",
            Ḳ: "K",
            Ķ: "K",
            Ḵ: "K",
            Ƙ: "K",
            Ⱪ: "K",
            Ꝁ: "K",
            Ꝃ: "K",
            Ꝅ: "K",
            Ꞣ: "K",
            "Ⓛ": "L",
            Ｌ: "L",
            Ŀ: "L",
            Ĺ: "L",
            Ľ: "L",
            Ḷ: "L",
            Ḹ: "L",
            Ļ: "L",
            Ḽ: "L",
            Ḻ: "L",
            Ł: "L",
            Ƚ: "L",
            Ɫ: "L",
            Ⱡ: "L",
            Ꝉ: "L",
            Ꝇ: "L",
            Ꞁ: "L",
            Ǉ: "LJ",
            ǈ: "Lj",
            "Ⓜ": "M",
            Ｍ: "M",
            Ḿ: "M",
            Ṁ: "M",
            Ṃ: "M",
            Ɱ: "M",
            Ɯ: "M",
            "Ⓝ": "N",
            Ｎ: "N",
            Ǹ: "N",
            Ń: "N",
            Ñ: "N",
            Ṅ: "N",
            Ň: "N",
            Ṇ: "N",
            Ņ: "N",
            Ṋ: "N",
            Ṉ: "N",
            Ƞ: "N",
            Ɲ: "N",
            Ꞑ: "N",
            Ꞥ: "N",
            Ǌ: "NJ",
            ǋ: "Nj",
            "Ⓞ": "O",
            Ｏ: "O",
            Ò: "O",
            Ó: "O",
            Ô: "O",
            Ồ: "O",
            Ố: "O",
            Ỗ: "O",
            Ổ: "O",
            Õ: "O",
            Ṍ: "O",
            Ȭ: "O",
            Ṏ: "O",
            Ō: "O",
            Ṑ: "O",
            Ṓ: "O",
            Ŏ: "O",
            Ȯ: "O",
            Ȱ: "O",
            Ö: "O",
            Ȫ: "O",
            Ỏ: "O",
            Ő: "O",
            Ǒ: "O",
            Ȍ: "O",
            Ȏ: "O",
            Ơ: "O",
            Ờ: "O",
            Ớ: "O",
            Ỡ: "O",
            Ở: "O",
            Ợ: "O",
            Ọ: "O",
            Ộ: "O",
            Ǫ: "O",
            Ǭ: "O",
            Ø: "O",
            Ǿ: "O",
            Ɔ: "O",
            Ɵ: "O",
            Ꝋ: "O",
            Ꝍ: "O",
            Œ: "OE",
            Ƣ: "OI",
            Ꝏ: "OO",
            Ȣ: "OU",
            "Ⓟ": "P",
            Ｐ: "P",
            Ṕ: "P",
            Ṗ: "P",
            Ƥ: "P",
            Ᵽ: "P",
            Ꝑ: "P",
            Ꝓ: "P",
            Ꝕ: "P",
            "Ⓠ": "Q",
            Ｑ: "Q",
            Ꝗ: "Q",
            Ꝙ: "Q",
            Ɋ: "Q",
            "Ⓡ": "R",
            Ｒ: "R",
            Ŕ: "R",
            Ṙ: "R",
            Ř: "R",
            Ȑ: "R",
            Ȓ: "R",
            Ṛ: "R",
            Ṝ: "R",
            Ŗ: "R",
            Ṟ: "R",
            Ɍ: "R",
            Ɽ: "R",
            Ꝛ: "R",
            Ꞧ: "R",
            Ꞃ: "R",
            "Ⓢ": "S",
            Ｓ: "S",
            ẞ: "S",
            Ś: "S",
            Ṥ: "S",
            Ŝ: "S",
            Ṡ: "S",
            Š: "S",
            Ṧ: "S",
            Ṣ: "S",
            Ṩ: "S",
            Ș: "S",
            Ş: "S",
            Ȿ: "S",
            Ꞩ: "S",
            Ꞅ: "S",
            "Ⓣ": "T",
            Ｔ: "T",
            Ṫ: "T",
            Ť: "T",
            Ṭ: "T",
            Ț: "T",
            Ţ: "T",
            Ṱ: "T",
            Ṯ: "T",
            Ŧ: "T",
            Ƭ: "T",
            Ʈ: "T",
            Ⱦ: "T",
            Ꞇ: "T",
            Ꜩ: "TZ",
            "Ⓤ": "U",
            Ｕ: "U",
            Ù: "U",
            Ú: "U",
            Û: "U",
            Ũ: "U",
            Ṹ: "U",
            Ū: "U",
            Ṻ: "U",
            Ŭ: "U",
            Ü: "U",
            Ǜ: "U",
            Ǘ: "U",
            Ǖ: "U",
            Ǚ: "U",
            Ủ: "U",
            Ů: "U",
            Ű: "U",
            Ǔ: "U",
            Ȕ: "U",
            Ȗ: "U",
            Ư: "U",
            Ừ: "U",
            Ứ: "U",
            Ữ: "U",
            Ử: "U",
            Ự: "U",
            Ụ: "U",
            Ṳ: "U",
            Ų: "U",
            Ṷ: "U",
            Ṵ: "U",
            Ʉ: "U",
            "Ⓥ": "V",
            Ｖ: "V",
            Ṽ: "V",
            Ṿ: "V",
            Ʋ: "V",
            Ꝟ: "V",
            Ʌ: "V",
            Ꝡ: "VY",
            "Ⓦ": "W",
            Ｗ: "W",
            Ẁ: "W",
            Ẃ: "W",
            Ŵ: "W",
            Ẇ: "W",
            Ẅ: "W",
            Ẉ: "W",
            Ⱳ: "W",
            "Ⓧ": "X",
            Ｘ: "X",
            Ẋ: "X",
            Ẍ: "X",
            "Ⓨ": "Y",
            Ｙ: "Y",
            Ỳ: "Y",
            Ý: "Y",
            Ŷ: "Y",
            Ỹ: "Y",
            Ȳ: "Y",
            Ẏ: "Y",
            Ÿ: "Y",
            Ỷ: "Y",
            Ỵ: "Y",
            Ƴ: "Y",
            Ɏ: "Y",
            Ỿ: "Y",
            "Ⓩ": "Z",
            Ｚ: "Z",
            Ź: "Z",
            Ẑ: "Z",
            Ż: "Z",
            Ž: "Z",
            Ẓ: "Z",
            Ẕ: "Z",
            Ƶ: "Z",
            Ȥ: "Z",
            Ɀ: "Z",
            Ⱬ: "Z",
            Ꝣ: "Z",
            "ⓐ": "a",
            ａ: "a",
            ẚ: "a",
            à: "a",
            á: "a",
            â: "a",
            ầ: "a",
            ấ: "a",
            ẫ: "a",
            ẩ: "a",
            ã: "a",
            ā: "a",
            ă: "a",
            ằ: "a",
            ắ: "a",
            ẵ: "a",
            ẳ: "a",
            ȧ: "a",
            ǡ: "a",
            ä: "a",
            ǟ: "a",
            ả: "a",
            å: "a",
            ǻ: "a",
            ǎ: "a",
            ȁ: "a",
            ȃ: "a",
            ạ: "a",
            ậ: "a",
            ặ: "a",
            ḁ: "a",
            ą: "a",
            ⱥ: "a",
            ɐ: "a",
            ꜳ: "aa",
            æ: "ae",
            ǽ: "ae",
            ǣ: "ae",
            ꜵ: "ao",
            ꜷ: "au",
            ꜹ: "av",
            ꜻ: "av",
            ꜽ: "ay",
            "ⓑ": "b",
            ｂ: "b",
            ḃ: "b",
            ḅ: "b",
            ḇ: "b",
            ƀ: "b",
            ƃ: "b",
            ɓ: "b",
            "ⓒ": "c",
            ｃ: "c",
            ć: "c",
            ĉ: "c",
            ċ: "c",
            č: "c",
            ç: "c",
            ḉ: "c",
            ƈ: "c",
            ȼ: "c",
            ꜿ: "c",
            ↄ: "c",
            "ⓓ": "d",
            ｄ: "d",
            ḋ: "d",
            ď: "d",
            ḍ: "d",
            ḑ: "d",
            ḓ: "d",
            ḏ: "d",
            đ: "d",
            ƌ: "d",
            ɖ: "d",
            ɗ: "d",
            ꝺ: "d",
            ǳ: "dz",
            ǆ: "dz",
            "ⓔ": "e",
            ｅ: "e",
            è: "e",
            é: "e",
            ê: "e",
            ề: "e",
            ế: "e",
            ễ: "e",
            ể: "e",
            ẽ: "e",
            ē: "e",
            ḕ: "e",
            ḗ: "e",
            ĕ: "e",
            ė: "e",
            ë: "e",
            ẻ: "e",
            ě: "e",
            ȅ: "e",
            ȇ: "e",
            ẹ: "e",
            ệ: "e",
            ȩ: "e",
            ḝ: "e",
            ę: "e",
            ḙ: "e",
            ḛ: "e",
            ɇ: "e",
            ɛ: "e",
            ǝ: "e",
            "ⓕ": "f",
            ｆ: "f",
            ḟ: "f",
            ƒ: "f",
            ꝼ: "f",
            "ⓖ": "g",
            ｇ: "g",
            ǵ: "g",
            ĝ: "g",
            ḡ: "g",
            ğ: "g",
            ġ: "g",
            ǧ: "g",
            ģ: "g",
            ǥ: "g",
            ɠ: "g",
            ꞡ: "g",
            ᵹ: "g",
            ꝿ: "g",
            "ⓗ": "h",
            ｈ: "h",
            ĥ: "h",
            ḣ: "h",
            ḧ: "h",
            ȟ: "h",
            ḥ: "h",
            ḩ: "h",
            ḫ: "h",
            ẖ: "h",
            ħ: "h",
            ⱨ: "h",
            ⱶ: "h",
            ɥ: "h",
            ƕ: "hv",
            "ⓘ": "i",
            ｉ: "i",
            ì: "i",
            í: "i",
            î: "i",
            ĩ: "i",
            ī: "i",
            ĭ: "i",
            ï: "i",
            ḯ: "i",
            ỉ: "i",
            ǐ: "i",
            ȉ: "i",
            ȋ: "i",
            ị: "i",
            į: "i",
            ḭ: "i",
            ɨ: "i",
            ı: "i",
            "ⓙ": "j",
            ｊ: "j",
            ĵ: "j",
            ǰ: "j",
            ɉ: "j",
            "ⓚ": "k",
            ｋ: "k",
            ḱ: "k",
            ǩ: "k",
            ḳ: "k",
            ķ: "k",
            ḵ: "k",
            ƙ: "k",
            ⱪ: "k",
            ꝁ: "k",
            ꝃ: "k",
            ꝅ: "k",
            ꞣ: "k",
            "ⓛ": "l",
            ｌ: "l",
            ŀ: "l",
            ĺ: "l",
            ľ: "l",
            ḷ: "l",
            ḹ: "l",
            ļ: "l",
            ḽ: "l",
            ḻ: "l",
            ſ: "l",
            ł: "l",
            ƚ: "l",
            ɫ: "l",
            ⱡ: "l",
            ꝉ: "l",
            ꞁ: "l",
            ꝇ: "l",
            ǉ: "lj",
            "ⓜ": "m",
            ｍ: "m",
            ḿ: "m",
            ṁ: "m",
            ṃ: "m",
            ɱ: "m",
            ɯ: "m",
            "ⓝ": "n",
            ｎ: "n",
            ǹ: "n",
            ń: "n",
            ñ: "n",
            ṅ: "n",
            ň: "n",
            ṇ: "n",
            ņ: "n",
            ṋ: "n",
            ṉ: "n",
            ƞ: "n",
            ɲ: "n",
            ŉ: "n",
            ꞑ: "n",
            ꞥ: "n",
            ǌ: "nj",
            "ⓞ": "o",
            ｏ: "o",
            ò: "o",
            ó: "o",
            ô: "o",
            ồ: "o",
            ố: "o",
            ỗ: "o",
            ổ: "o",
            õ: "o",
            ṍ: "o",
            ȭ: "o",
            ṏ: "o",
            ō: "o",
            ṑ: "o",
            ṓ: "o",
            ŏ: "o",
            ȯ: "o",
            ȱ: "o",
            ö: "o",
            ȫ: "o",
            ỏ: "o",
            ő: "o",
            ǒ: "o",
            ȍ: "o",
            ȏ: "o",
            ơ: "o",
            ờ: "o",
            ớ: "o",
            ỡ: "o",
            ở: "o",
            ợ: "o",
            ọ: "o",
            ộ: "o",
            ǫ: "o",
            ǭ: "o",
            ø: "o",
            ǿ: "o",
            ɔ: "o",
            ꝋ: "o",
            ꝍ: "o",
            ɵ: "o",
            œ: "oe",
            ƣ: "oi",
            ȣ: "ou",
            ꝏ: "oo",
            "ⓟ": "p",
            ｐ: "p",
            ṕ: "p",
            ṗ: "p",
            ƥ: "p",
            ᵽ: "p",
            ꝑ: "p",
            ꝓ: "p",
            ꝕ: "p",
            "ⓠ": "q",
            ｑ: "q",
            ɋ: "q",
            ꝗ: "q",
            ꝙ: "q",
            "ⓡ": "r",
            ｒ: "r",
            ŕ: "r",
            ṙ: "r",
            ř: "r",
            ȑ: "r",
            ȓ: "r",
            ṛ: "r",
            ṝ: "r",
            ŗ: "r",
            ṟ: "r",
            ɍ: "r",
            ɽ: "r",
            ꝛ: "r",
            ꞧ: "r",
            ꞃ: "r",
            "ⓢ": "s",
            ｓ: "s",
            ß: "s",
            ś: "s",
            ṥ: "s",
            ŝ: "s",
            ṡ: "s",
            š: "s",
            ṧ: "s",
            ṣ: "s",
            ṩ: "s",
            ș: "s",
            ş: "s",
            ȿ: "s",
            ꞩ: "s",
            ꞅ: "s",
            ẛ: "s",
            "ⓣ": "t",
            ｔ: "t",
            ṫ: "t",
            ẗ: "t",
            ť: "t",
            ṭ: "t",
            ț: "t",
            ţ: "t",
            ṱ: "t",
            ṯ: "t",
            ŧ: "t",
            ƭ: "t",
            ʈ: "t",
            ⱦ: "t",
            ꞇ: "t",
            ꜩ: "tz",
            "ⓤ": "u",
            ｕ: "u",
            ù: "u",
            ú: "u",
            û: "u",
            ũ: "u",
            ṹ: "u",
            ū: "u",
            ṻ: "u",
            ŭ: "u",
            ü: "u",
            ǜ: "u",
            ǘ: "u",
            ǖ: "u",
            ǚ: "u",
            ủ: "u",
            ů: "u",
            ű: "u",
            ǔ: "u",
            ȕ: "u",
            ȗ: "u",
            ư: "u",
            ừ: "u",
            ứ: "u",
            ữ: "u",
            ử: "u",
            ự: "u",
            ụ: "u",
            ṳ: "u",
            ų: "u",
            ṷ: "u",
            ṵ: "u",
            ʉ: "u",
            "ⓥ": "v",
            ｖ: "v",
            ṽ: "v",
            ṿ: "v",
            ʋ: "v",
            ꝟ: "v",
            ʌ: "v",
            ꝡ: "vy",
            "ⓦ": "w",
            ｗ: "w",
            ẁ: "w",
            ẃ: "w",
            ŵ: "w",
            ẇ: "w",
            ẅ: "w",
            ẘ: "w",
            ẉ: "w",
            ⱳ: "w",
            "ⓧ": "x",
            ｘ: "x",
            ẋ: "x",
            ẍ: "x",
            "ⓨ": "y",
            ｙ: "y",
            ỳ: "y",
            ý: "y",
            ŷ: "y",
            ỹ: "y",
            ȳ: "y",
            ẏ: "y",
            ÿ: "y",
            ỷ: "y",
            ẙ: "y",
            ỵ: "y",
            ƴ: "y",
            ɏ: "y",
            ỿ: "y",
            "ⓩ": "z",
            ｚ: "z",
            ź: "z",
            ẑ: "z",
            ż: "z",
            ž: "z",
            ẓ: "z",
            ẕ: "z",
            ƶ: "z",
            ȥ: "z",
            ɀ: "z",
            ⱬ: "z",
            ꝣ: "z",
            Ά: "Α",
            Έ: "Ε",
            Ή: "Η",
            Ί: "Ι",
            Ϊ: "Ι",
            Ό: "Ο",
            Ύ: "Υ",
            Ϋ: "Υ",
            Ώ: "Ω",
            ά: "α",
            έ: "ε",
            ή: "η",
            ί: "ι",
            ϊ: "ι",
            ΐ: "ι",
            ό: "ο",
            ύ: "υ",
            ϋ: "υ",
            ΰ: "υ",
            ώ: "ω",
            ς: "σ",
            "’": "'",
          };
        }),
        t.define("select2/data/base", ["../utils"], function (n) {
          function t() {
            t.__super__.constructor.call(this);
          }
          return (
            n.Extend(t, n.Observable),
            (t.prototype.current = function () {
              throw new Error(
                "The `current` method must be defined in child classes."
              );
            }),
            (t.prototype.query = function () {
              throw new Error(
                "The `query` method must be defined in child classes."
              );
            }),
            (t.prototype.bind = function () {}),
            (t.prototype.destroy = function () {}),
            (t.prototype.generateResultId = function (t, i) {
              var r = t.id + "-result-";
              return (
                (r += n.generateChars(4)),
                (r +=
                  null != i.id
                    ? "-" + i.id.toString()
                    : "-" + n.generateChars(4)),
                r
              );
            }),
            t
          );
        }),
        t.define(
          "select2/data/select",
          ["./base", "../utils", "jquery"],
          function (n, t, i) {
            function r(n, t) {
              this.$element = n;
              this.options = t;
              r.__super__.constructor.call(this);
            }
            return (
              t.Extend(r, n),
              (r.prototype.current = function (n) {
                var t = [],
                  r = this;
                this.$element.find(":selected").each(function () {
                  var n = i(this),
                    u = r.item(n);
                  t.push(u);
                });
                n(t);
              }),
              (r.prototype.select = function (n) {
                var t = this,
                  r;
                if (((n.selected = !0), i(n.element).is("option")))
                  return (
                    (n.element.selected = !0),
                    void this.$element.trigger("input").trigger("change")
                  );
                this.$element.prop("multiple")
                  ? this.current(function (r) {
                      var f = [],
                        u,
                        e;
                      for ((n = [n]).push.apply(n, r), u = 0; u < n.length; u++)
                        (e = n[u].id), -1 === i.inArray(e, f) && f.push(e);
                      t.$element.val(f);
                      t.$element.trigger("input").trigger("change");
                    })
                  : ((r = n.id),
                    this.$element.val(r),
                    this.$element.trigger("input").trigger("change"));
              }),
              (r.prototype.unselect = function (n) {
                var t = this;
                if (this.$element.prop("multiple")) {
                  if (((n.selected = !1), i(n.element).is("option")))
                    return (
                      (n.element.selected = !1),
                      void this.$element.trigger("input").trigger("change")
                    );
                  this.current(function (r) {
                    for (var e, u = [], f = 0; f < r.length; f++)
                      (e = r[f].id),
                        e !== n.id && -1 === i.inArray(e, u) && u.push(e);
                    t.$element.val(u);
                    t.$element.trigger("input").trigger("change");
                  });
                }
              }),
              (r.prototype.bind = function (n) {
                var t = this;
                (this.container = n).on("select", function (n) {
                  t.select(n.data);
                });
                n.on("unselect", function (n) {
                  t.unselect(n.data);
                });
              }),
              (r.prototype.destroy = function () {
                this.$element.find("*").each(function () {
                  t.RemoveData(this);
                });
              }),
              (r.prototype.query = function (n, t) {
                var r = [],
                  u = this;
                this.$element.children().each(function () {
                  var t = i(this),
                    e,
                    f;
                  (t.is("option") || t.is("optgroup")) &&
                    ((e = u.item(t)),
                    (f = u.matches(n, e)),
                    null !== f && r.push(f));
                });
                t({ results: r });
              }),
              (r.prototype.addOptions = function (n) {
                t.appendMany(this.$element, n);
              }),
              (r.prototype.option = function (n) {
                var r, f, u;
                return (
                  n.children
                    ? ((r = document.createElement("optgroup")).label = n.text)
                    : void 0 !==
                      (r = document.createElement("option")).textContent
                    ? (r.textContent = n.text)
                    : (r.innerText = n.text),
                  void 0 !== n.id && (r.value = n.id),
                  n.disabled && (r.disabled = !0),
                  n.selected && (r.selected = !0),
                  n.title && (r.title = n.title),
                  (f = i(r)),
                  (u = this._normalizeItem(n)),
                  (u.element = r),
                  t.StoreData(r, "data", u),
                  f
                );
              }),
              (r.prototype.item = function (n) {
                var r = {},
                  o,
                  s;
                if (null != (r = t.GetData(n[0], "data"))) return r;
                if (n.is("option"))
                  r = {
                    id: n.val(),
                    text: n.text(),
                    disabled: n.prop("disabled"),
                    selected: n.prop("selected"),
                    title: n.prop("title"),
                  };
                else if (n.is("optgroup")) {
                  r = {
                    text: n.prop("label"),
                    children: [],
                    title: n.prop("title"),
                  };
                  for (
                    var f = n.children("option"), e = [], u = 0;
                    u < f.length;
                    u++
                  )
                    (o = i(f[u])), (s = this.item(o)), e.push(s);
                  r.children = e;
                }
                return (
                  ((r = this._normalizeItem(r)).element = n[0]),
                  t.StoreData(n[0], "data", r),
                  r
                );
              }),
              (r.prototype._normalizeItem = function (n) {
                return (
                  n !== Object(n) && (n = { id: n, text: n }),
                  null != (n = i.extend({}, { text: "" }, n)).id &&
                    (n.id = n.id.toString()),
                  null != n.text && (n.text = n.text.toString()),
                  null == n._resultId &&
                    n.id &&
                    null != this.container &&
                    (n._resultId = this.generateResultId(this.container, n)),
                  i.extend({}, { selected: !1, disabled: !1 }, n)
                );
              }),
              (r.prototype.matches = function (n, t) {
                return this.options.get("matcher")(n, t);
              }),
              r
            );
          }
        ),
        t.define(
          "select2/data/array",
          ["./select", "../utils", "jquery"],
          function (n, t, i) {
            function r(n, t) {
              this._dataToConvert = t.get("data") || [];
              r.__super__.constructor.call(this, n, t);
            }
            return (
              t.Extend(r, n),
              (r.prototype.bind = function (n, t) {
                r.__super__.bind.call(this, n, t);
                this.addOptions(this.convertToOptions(this._dataToConvert));
              }),
              (r.prototype.select = function (n) {
                var t = this.$element.find("option").filter(function (t, i) {
                  return i.value == n.id.toString();
                });
                0 === t.length && ((t = this.option(n)), this.addOptions(t));
                r.__super__.select.call(this, n);
              }),
              (r.prototype.convertToOptions = function (n) {
                function a(n) {
                  return function () {
                    return i(this).val() == n.id;
                  };
                }
                for (
                  var c = this,
                    e = this.$element.find("option"),
                    l = e
                      .map(function () {
                        return c.item(i(this)).id;
                      })
                      .get(),
                    o = [],
                    r,
                    f,
                    h,
                    u = 0;
                  u < n.length;
                  u++
                )
                  if (
                    ((r = this._normalizeItem(n[u])), 0 <= i.inArray(r.id, l))
                  ) {
                    var s = e.filter(a(r)),
                      v = this.item(s),
                      y = i.extend(!0, {}, r, v),
                      p = this.option(y);
                    s.replaceWith(p);
                  } else
                    (f = this.option(r)),
                      r.children &&
                        ((h = this.convertToOptions(r.children)),
                        t.appendMany(f, h)),
                      o.push(f);
                return o;
              }),
              r
            );
          }
        ),
        t.define(
          "select2/data/ajax",
          ["./array", "../utils", "jquery"],
          function (n, t, i) {
            function r(n, t) {
              this.ajaxOptions = this._applyDefaults(t.get("ajax"));
              null != this.ajaxOptions.processResults &&
                (this.processResults = this.ajaxOptions.processResults);
              r.__super__.constructor.call(this, n, t);
            }
            return (
              t.Extend(r, n),
              (r.prototype._applyDefaults = function (n) {
                var t = {
                  data: function (n) {
                    return i.extend({}, n, { q: n.term });
                  },
                  transport: function (n, t, r) {
                    var u = i.ajax(n);
                    return u.then(t), u.fail(r), u;
                  },
                };
                return i.extend({}, t, n, !0);
              }),
              (r.prototype.processResults = function (n) {
                return n;
              }),
              (r.prototype.query = function (n, t) {
                function f() {
                  var f = r.transport(
                    r,
                    function (r) {
                      var f = u.processResults(r, n);
                      u.options.get("debug") &&
                        window.console &&
                        console.error &&
                        ((f && f.results && i.isArray(f.results)) ||
                          console.error(
                            "Select2: The AJAX results did not return an array in the `results` key of the response."
                          ));
                      t(f);
                    },
                    function () {
                      ("status" in f && (0 === f.status || "0" === f.status)) ||
                        u.trigger("results:message", {
                          message: "errorLoading",
                        });
                    }
                  );
                  u._request = f;
                }
                var u = this,
                  r;
                null != this._request &&
                  (i.isFunction(this._request.abort) && this._request.abort(),
                  (this._request = null));
                r = i.extend({ type: "GET" }, this.ajaxOptions);
                "function" == typeof r.url &&
                  (r.url = r.url.call(this.$element, n));
                "function" == typeof r.data &&
                  (r.data = r.data.call(this.$element, n));
                this.ajaxOptions.delay && null != n.term
                  ? (this._queryTimeout &&
                      window.clearTimeout(this._queryTimeout),
                    (this._queryTimeout = window.setTimeout(
                      f,
                      this.ajaxOptions.delay
                    )))
                  : f();
              }),
              r
            );
          }
        ),
        t.define("select2/data/tags", ["jquery"], function (n) {
          function t(t, i, r) {
            var f = r.get("tags"),
              o = r.get("createTag"),
              e,
              u;
            if (
              (void 0 !== o && (this.createTag = o),
              (e = r.get("insertTag")),
              void 0 !== e && (this.insertTag = e),
              t.call(this, i, r),
              n.isArray(f))
            )
              for (u = 0; u < f.length; u++) {
                var s = f[u],
                  h = this._normalizeItem(s),
                  c = this.option(h);
                this.$element.append(c);
              }
          }
          return (
            (t.prototype.query = function (n, t, i) {
              var r = this;
              this._removeOldTags();
              null != t.term && null == t.page
                ? n.call(this, t, function n(u, f) {
                    for (
                      var s, l, h, c, e = u.results, o = 0;
                      o < e.length;
                      o++
                    )
                      if (
                        ((s = e[o]),
                        (l =
                          null != s.children &&
                          !n({ results: s.children }, !0)),
                        (s.text || "").toUpperCase() ===
                          (t.term || "").toUpperCase() || l)
                      )
                        return !f && ((u.data = e), void i(u));
                    if (f) return !0;
                    h = r.createTag(t);
                    null != h &&
                      ((c = r.option(h)),
                      c.attr("data-select2-tag", !0),
                      r.addOptions([c]),
                      r.insertTag(e, h));
                    u.results = e;
                    i(u);
                  })
                : n.call(this, t, i);
            }),
            (t.prototype.createTag = function (t, i) {
              var r = n.trim(i.term);
              return "" === r ? null : { id: r, text: r };
            }),
            (t.prototype.insertTag = function (n, t, i) {
              t.unshift(i);
            }),
            (t.prototype._removeOldTags = function () {
              this.$element.find("option[data-select2-tag]").each(function () {
                this.selected || n(this).remove();
              });
            }),
            t
          );
        }),
        t.define("select2/data/tokenizer", ["jquery"], function (n) {
          function t(n, t, i) {
            var r = i.get("tokenizer");
            void 0 !== r && (this.tokenizer = r);
            n.call(this, t, i);
          }
          return (
            (t.prototype.bind = function (n, t, i) {
              n.call(this, t, i);
              this.$search =
                t.dropdown.$search ||
                t.selection.$search ||
                i.find(".select2-search__field");
            }),
            (t.prototype.query = function (t, i, r) {
              var u = this,
                f;
              i.term = i.term || "";
              f = this.tokenizer(i, this.options, function (t) {
                var i = u._normalizeItem(t),
                  r;
                u.$element.find("option").filter(function () {
                  return n(this).val() === i.id;
                }).length ||
                  ((r = u.option(i)),
                  r.attr("data-select2-tag", !0),
                  u._removeOldTags(),
                  u.addOptions([r]));
                !(function (n) {
                  u.trigger("select", { data: n });
                })(i);
              });
              f.term !== i.term &&
                (this.$search.length &&
                  (this.$search.val(f.term), this.$search.trigger("focus")),
                (i.term = f.term));
              t.call(this, i, r);
            }),
            (t.prototype.tokenizer = function (t, i, r, u) {
              for (
                var s,
                  h,
                  o,
                  c = r.get("tokenSeparators") || [],
                  e = i.term,
                  f = 0,
                  l =
                    this.createTag ||
                    function (n) {
                      return { id: n.term, text: n.term };
                    };
                f < e.length;

              )
                (s = e[f]),
                  -1 !== n.inArray(s, c)
                    ? ((h = e.substr(0, f)),
                      (o = l(n.extend({}, i, { term: h }))),
                      null != o
                        ? (u(o), (e = e.substr(f + 1) || ""), (f = 0))
                        : f++)
                    : f++;
              return { term: e };
            }),
            t
          );
        }),
        t.define("select2/data/minimumInputLength", [], function () {
          function n(n, t, i) {
            this.minimumInputLength = i.get("minimumInputLength");
            n.call(this, t, i);
          }
          return (
            (n.prototype.query = function (n, t, i) {
              t.term = t.term || "";
              t.term.length < this.minimumInputLength
                ? this.trigger("results:message", {
                    message: "inputTooShort",
                    args: {
                      minimum: this.minimumInputLength,
                      input: t.term,
                      params: t,
                    },
                  })
                : n.call(this, t, i);
            }),
            n
          );
        }),
        t.define("select2/data/maximumInputLength", [], function () {
          function n(n, t, i) {
            this.maximumInputLength = i.get("maximumInputLength");
            n.call(this, t, i);
          }
          return (
            (n.prototype.query = function (n, t, i) {
              t.term = t.term || "";
              0 < this.maximumInputLength &&
              t.term.length > this.maximumInputLength
                ? this.trigger("results:message", {
                    message: "inputTooLong",
                    args: {
                      maximum: this.maximumInputLength,
                      input: t.term,
                      params: t,
                    },
                  })
                : n.call(this, t, i);
            }),
            n
          );
        }),
        t.define("select2/data/maximumSelectionLength", [], function () {
          function n(n, t, i) {
            this.maximumSelectionLength = i.get("maximumSelectionLength");
            n.call(this, t, i);
          }
          return (
            (n.prototype.bind = function (n, t, i) {
              var r = this;
              n.call(this, t, i);
              t.on("select", function () {
                r._checkIfMaximumSelected();
              });
            }),
            (n.prototype.query = function (n, t, i) {
              var r = this;
              this._checkIfMaximumSelected(function () {
                n.call(r, t, i);
              });
            }),
            (n.prototype._checkIfMaximumSelected = function (n, t) {
              var i = this;
              this.current(function (n) {
                var r = null != n ? n.length : 0;
                0 < i.maximumSelectionLength && r >= i.maximumSelectionLength
                  ? i.trigger("results:message", {
                      message: "maximumSelected",
                      args: { maximum: i.maximumSelectionLength },
                    })
                  : t && t();
              });
            }),
            n
          );
        }),
        t.define("select2/dropdown", ["jquery", "./utils"], function (n, t) {
          function i(n, t) {
            this.$element = n;
            this.options = t;
            i.__super__.constructor.call(this);
          }
          return (
            t.Extend(i, t.Observable),
            (i.prototype.render = function () {
              var t = n(
                '<span class="select2-dropdown"><span class="select2-results"></span></span>'
              );
              return (
                t.attr("dir", this.options.get("dir")), (this.$dropdown = t)
              );
            }),
            (i.prototype.bind = function () {}),
            (i.prototype.position = function () {}),
            (i.prototype.destroy = function () {
              this.$dropdown.remove();
            }),
            i
          );
        }),
        t.define(
          "select2/dropdown/search",
          ["jquery", "../utils"],
          function (n) {
            function t() {}
            return (
              (t.prototype.render = function (t) {
                var r = t.call(this),
                  i = n(
                    '<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" /></span>'
                  );
                return (
                  (this.$searchContainer = i),
                  (this.$search = i.find("input")),
                  r.prepend(i),
                  r
                );
              }),
              (t.prototype.bind = function (t, i, r) {
                var u = this,
                  f = i.id + "-results";
                t.call(this, i, r);
                this.$search.on("keydown", function (n) {
                  u.trigger("keypress", n);
                  u._keyUpPrevented = n.isDefaultPrevented();
                });
                this.$search.on("input", function () {
                  n(this).off("keyup");
                });
                this.$search.on("keyup input", function (n) {
                  u.handleSearch(n);
                });
                i.on("open", function () {
                  u.$search.attr("tabindex", 0);
                  u.$search.attr("aria-controls", f);
                  u.$search.trigger("focus");
                  window.setTimeout(function () {
                    u.$search.trigger("focus");
                  }, 0);
                });
                i.on("close", function () {
                  u.$search.attr("tabindex", -1);
                  u.$search.removeAttr("aria-controls");
                  u.$search.removeAttr("aria-activedescendant");
                  u.$search.val("");
                  u.$search.trigger("blur");
                });
                i.on("focus", function () {
                  i.isOpen() || u.$search.trigger("focus");
                });
                i.on("results:all", function (n) {
                  (null != n.query.term && "" !== n.query.term) ||
                    (u.showSearch(n)
                      ? u.$searchContainer.removeClass("select2-search--hide")
                      : u.$searchContainer.addClass("select2-search--hide"));
                });
                i.on("results:focus", function (n) {
                  n.data._resultId
                    ? u.$search.attr("aria-activedescendant", n.data._resultId)
                    : u.$search.removeAttr("aria-activedescendant");
                });
              }),
              (t.prototype.handleSearch = function () {
                if (!this._keyUpPrevented) {
                  var n = this.$search.val();
                  this.trigger("query", { term: n });
                }
                this._keyUpPrevented = !1;
              }),
              (t.prototype.showSearch = function () {
                return !0;
              }),
              t
            );
          }
        ),
        t.define("select2/dropdown/hidePlaceholder", [], function () {
          function n(n, t, i, r) {
            this.placeholder = this.normalizePlaceholder(i.get("placeholder"));
            n.call(this, t, i, r);
          }
          return (
            (n.prototype.append = function (n, t) {
              t.results = this.removePlaceholder(t.results);
              n.call(this, t);
            }),
            (n.prototype.normalizePlaceholder = function (n, t) {
              return "string" == typeof t && (t = { id: "", text: t }), t;
            }),
            (n.prototype.removePlaceholder = function (n, t) {
              for (var u, r = t.slice(0), i = t.length - 1; 0 <= i; i--)
                (u = t[i]), this.placeholder.id === u.id && r.splice(i, 1);
              return r;
            }),
            n
          );
        }),
        t.define("select2/dropdown/infiniteScroll", ["jquery"], function (n) {
          function t(n, t, i, r) {
            this.lastParams = {};
            n.call(this, t, i, r);
            this.$loadingMore = this.createLoadingMore();
            this.loading = !1;
          }
          return (
            (t.prototype.append = function (n, t) {
              this.$loadingMore.remove();
              this.loading = !1;
              n.call(this, t);
              this.showLoadingMore(t) &&
                (this.$results.append(this.$loadingMore),
                this.loadMoreIfNeeded());
            }),
            (t.prototype.bind = function (n, t, i) {
              var r = this;
              n.call(this, t, i);
              t.on("query", function (n) {
                r.lastParams = n;
                r.loading = !0;
              });
              t.on("query:append", function (n) {
                r.lastParams = n;
                r.loading = !0;
              });
              this.$results.on("scroll", this.loadMoreIfNeeded.bind(this));
            }),
            (t.prototype.loadMoreIfNeeded = function () {
              var i = n.contains(
                  document.documentElement,
                  this.$loadingMore[0]
                ),
                t;
              !this.loading &&
                i &&
                ((t =
                  this.$results.offset().top + this.$results.outerHeight(!1)),
                this.$loadingMore.offset().top +
                  this.$loadingMore.outerHeight(!1) <=
                  t + 50 && this.loadMore());
            }),
            (t.prototype.loadMore = function () {
              this.loading = !0;
              var t = n.extend({}, { page: 1 }, this.lastParams);
              t.page++;
              this.trigger("query:append", t);
            }),
            (t.prototype.showLoadingMore = function (n, t) {
              return t.pagination && t.pagination.more;
            }),
            (t.prototype.createLoadingMore = function () {
              var t = n(
                  '<li class="select2-results__option select2-results__option--load-more"role="option" aria-disabled="true"></li>'
                ),
                i = this.options.get("translations").get("loadingMore");
              return t.html(i(this.lastParams)), t;
            }),
            t
          );
        }),
        t.define(
          "select2/dropdown/attachBody",
          ["jquery", "../utils"],
          function (n, t) {
            function i(t, i, r) {
              this.$dropdownParent = n(
                r.get("dropdownParent") || document.body
              );
              t.call(this, i, r);
            }
            return (
              (i.prototype.bind = function (n, t, i) {
                var r = this;
                n.call(this, t, i);
                t.on("open", function () {
                  r._showDropdown();
                  r._attachPositioningHandler(t);
                  r._bindContainerResultHandlers(t);
                });
                t.on("close", function () {
                  r._hideDropdown();
                  r._detachPositioningHandler(t);
                });
                this.$dropdownContainer.on("mousedown", function (n) {
                  n.stopPropagation();
                });
              }),
              (i.prototype.destroy = function (n) {
                n.call(this);
                this.$dropdownContainer.remove();
              }),
              (i.prototype.position = function (n, t, i) {
                t.attr("class", i.attr("class"));
                t.removeClass("select2");
                t.addClass("select2-container--open");
                t.css({ position: "absolute", top: -999999 });
                this.$container = i;
              }),
              (i.prototype.render = function (t) {
                var i = n("<span></span>"),
                  r = t.call(this);
                return i.append(r), (this.$dropdownContainer = i);
              }),
              (i.prototype._hideDropdown = function () {
                this.$dropdownContainer.detach();
              }),
              (i.prototype._bindContainerResultHandlers = function (n, t) {
                if (!this._containerResultsHandlersBound) {
                  var i = this;
                  t.on("results:all", function () {
                    i._positionDropdown();
                    i._resizeDropdown();
                  });
                  t.on("results:append", function () {
                    i._positionDropdown();
                    i._resizeDropdown();
                  });
                  t.on("results:message", function () {
                    i._positionDropdown();
                    i._resizeDropdown();
                  });
                  t.on("select", function () {
                    i._positionDropdown();
                    i._resizeDropdown();
                  });
                  t.on("unselect", function () {
                    i._positionDropdown();
                    i._resizeDropdown();
                  });
                  this._containerResultsHandlersBound = !0;
                }
              }),
              (i.prototype._attachPositioningHandler = function (i, r) {
                var u = this,
                  f = "scroll.select2." + r.id,
                  o = "resize.select2." + r.id,
                  s = "orientationchange.select2." + r.id,
                  e = this.$container.parents().filter(t.hasScroll);
                e.each(function () {
                  t.StoreData(this, "select2-scroll-position", {
                    x: n(this).scrollLeft(),
                    y: n(this).scrollTop(),
                  });
                });
                e.on(f, function () {
                  var i = t.GetData(this, "select2-scroll-position");
                  n(this).scrollTop(i.y);
                });
                n(window).on(f + " " + o + " " + s, function () {
                  u._positionDropdown();
                  u._resizeDropdown();
                });
              }),
              (i.prototype._detachPositioningHandler = function (i, r) {
                var u = "scroll.select2." + r.id,
                  f = "resize.select2." + r.id,
                  e = "orientationchange.select2." + r.id;
                this.$container.parents().filter(t.hasScroll).off(u);
                n(window).off(u + " " + f + " " + e);
              }),
              (i.prototype._positionDropdown = function () {
                var s = n(window),
                  e = this.$dropdown.hasClass("select2-dropdown--above"),
                  a = this.$dropdown.hasClass("select2-dropdown--below"),
                  t = null,
                  i = this.$container.offset(),
                  r,
                  f;
                i.bottom = i.top + this.$container.outerHeight(!1);
                r = { height: this.$container.outerHeight(!1) };
                r.top = i.top;
                r.bottom = i.top + r.height;
                var h = this.$dropdown.outerHeight(!1),
                  v = s.scrollTop(),
                  y = s.scrollTop() + s.height(),
                  c = v < i.top - h,
                  l = y > i.bottom + h,
                  o = { left: i.left, top: r.bottom },
                  u = this.$dropdownParent;
                "static" === u.css("position") && (u = u.offsetParent());
                f = { top: 0, left: 0 };
                (n.contains(document.body, u[0]) || u[0].isConnected) &&
                  (f = u.offset());
                o.top -= f.top;
                o.left -= f.left;
                e || a || (t = "below");
                l || !c || e ? !c && l && e && (t = "below") : (t = "above");
                ("above" == t || (e && "below" !== t)) &&
                  (o.top = r.top - f.top - h);
                null != t &&
                  (this.$dropdown
                    .removeClass(
                      "select2-dropdown--below select2-dropdown--above"
                    )
                    .addClass("select2-dropdown--" + t),
                  this.$container
                    .removeClass(
                      "select2-container--below select2-container--above"
                    )
                    .addClass("select2-container--" + t));
                this.$dropdownContainer.css(o);
              }),
              (i.prototype._resizeDropdown = function () {
                var n = { width: this.$container.outerWidth(!1) + "px" };
                this.options.get("dropdownAutoWidth") &&
                  ((n.minWidth = n.width),
                  (n.position = "relative"),
                  (n.width = "auto"));
                this.$dropdown.css(n);
              }),
              (i.prototype._showDropdown = function () {
                this.$dropdownContainer.appendTo(this.$dropdownParent);
                this._positionDropdown();
                this._resizeDropdown();
              }),
              i
            );
          }
        ),
        t.define("select2/dropdown/minimumResultsForSearch", [], function () {
          function n(n, t, i, r) {
            this.minimumResultsForSearch = i.get("minimumResultsForSearch");
            this.minimumResultsForSearch < 0 &&
              (this.minimumResultsForSearch = 1 / 0);
            n.call(this, t, i, r);
          }
          return (
            (n.prototype.showSearch = function (n, t) {
              return (
                !(
                  (function n(t) {
                    for (var u, i = 0, r = 0; r < t.length; r++)
                      (u = t[r]), u.children ? (i += n(u.children)) : i++;
                    return i;
                  })(t.data.results) < this.minimumResultsForSearch
                ) && n.call(this, t)
              );
            }),
            n
          );
        }),
        t.define("select2/dropdown/selectOnClose", ["../utils"], function (n) {
          function t() {}
          return (
            (t.prototype.bind = function (n, t, i) {
              var r = this;
              n.call(this, t, i);
              t.on("close", function (n) {
                r._handleSelectOnClose(n);
              });
            }),
            (t.prototype._handleSelectOnClose = function (t, i) {
              var u, f, r;
              (i &&
                null != i.originalSelect2Event &&
                ((u = i.originalSelect2Event),
                "select" === u._type || "unselect" === u._type)) ||
                ((f = this.getHighlightedResults()),
                f.length < 1 ||
                  ((r = n.GetData(f[0], "data")),
                  (null != r.element && r.element.selected) ||
                    (null == r.element && r.selected) ||
                    this.trigger("select", { data: r })));
            }),
            t
          );
        }),
        t.define("select2/dropdown/closeOnSelect", [], function () {
          function n() {}
          return (
            (n.prototype.bind = function (n, t, i) {
              var r = this;
              n.call(this, t, i);
              t.on("select", function (n) {
                r._selectTriggered(n);
              });
              t.on("unselect", function (n) {
                r._selectTriggered(n);
              });
            }),
            (n.prototype._selectTriggered = function (n, t) {
              var i = t.originalEvent;
              (i && (i.ctrlKey || i.metaKey)) ||
                this.trigger("close", {
                  originalEvent: i,
                  originalSelect2Event: t,
                });
            }),
            n
          );
        }),
        t.define("select2/i18n/en", [], function () {
          return {
            errorLoading: function () {
              return "The results could not be loaded.";
            },
            inputTooLong: function (n) {
              var t = n.input.length - n.maximum,
                i = "Please delete " + t + " character";
              return 1 != t && (i += "s"), i;
            },
            inputTooShort: function (n) {
              return (
                "Please enter " +
                (n.minimum - n.input.length) +
                " or more characters"
              );
            },
            loadingMore: function () {
              return "Loading more results…";
            },
            maximumSelected: function (n) {
              var t = "You can only select " + n.maximum + " item";
              return 1 != n.maximum && (t += "s"), t;
            },
            noResults: function () {
              return "No results found";
            },
            searching: function () {
              return "Searching…";
            },
            removeAllItems: function () {
              return "Remove all items";
            },
          };
        }),
        t.define(
          "select2/defaults",
          [
            "jquery",
            "require",
            "./results",
            "./selection/single",
            "./selection/multiple",
            "./selection/placeholder",
            "./selection/allowClear",
            "./selection/search",
            "./selection/eventRelay",
            "./utils",
            "./translation",
            "./diacritics",
            "./data/select",
            "./data/array",
            "./data/ajax",
            "./data/tags",
            "./data/tokenizer",
            "./data/minimumInputLength",
            "./data/maximumInputLength",
            "./data/maximumSelectionLength",
            "./dropdown",
            "./dropdown/search",
            "./dropdown/hidePlaceholder",
            "./dropdown/infiniteScroll",
            "./dropdown/attachBody",
            "./dropdown/minimumResultsForSearch",
            "./dropdown/selectOnClose",
            "./dropdown/closeOnSelect",
            "./i18n/en",
          ],
          function (
            n,
            t,
            i,
            r,
            u,
            f,
            e,
            o,
            s,
            h,
            c,
            l,
            a,
            v,
            y,
            p,
            w,
            b,
            k,
            d,
            g,
            nt,
            tt,
            it,
            rt,
            ut,
            ft,
            et
          ) {
            function ot() {
              this.reset();
            }
            return (
              (ot.prototype.apply = function (c) {
                var ht, ct, lt, at, vt, l, ot, st;
                for (
                  null ==
                    (c = n.extend(!0, {}, this.defaults, c)).dataAdapter &&
                    (((c.dataAdapter =
                      null != c.ajax ? y : null != c.data ? v : a),
                    0 < c.minimumInputLength &&
                      (c.dataAdapter = h.Decorate(c.dataAdapter, b)),
                    0 < c.maximumInputLength &&
                      (c.dataAdapter = h.Decorate(c.dataAdapter, k)),
                    0 < c.maximumSelectionLength &&
                      (c.dataAdapter = h.Decorate(c.dataAdapter, d)),
                    c.tags && (c.dataAdapter = h.Decorate(c.dataAdapter, p)),
                    (null == c.tokenSeparators && null == c.tokenizer) ||
                      (c.dataAdapter = h.Decorate(c.dataAdapter, w)),
                    null != c.query) &&
                      ((ht = t(c.amdBase + "compat/query")),
                      (c.dataAdapter = h.Decorate(c.dataAdapter, ht))),
                    null != c.initSelection &&
                      ((ct = t(c.amdBase + "compat/initSelection")),
                      (c.dataAdapter = h.Decorate(c.dataAdapter, ct)))),
                    (null == c.resultsAdapter &&
                      ((c.resultsAdapter = i),
                      null != c.ajax &&
                        (c.resultsAdapter = h.Decorate(c.resultsAdapter, it)),
                      null != c.placeholder &&
                        (c.resultsAdapter = h.Decorate(c.resultsAdapter, tt)),
                      c.selectOnClose &&
                        (c.resultsAdapter = h.Decorate(c.resultsAdapter, ft))),
                    null == c.dropdownAdapter) &&
                      (c.multiple
                        ? (c.dropdownAdapter = g)
                        : ((lt = h.Decorate(g, nt)), (c.dropdownAdapter = lt)),
                      (0 !== c.minimumResultsForSearch &&
                        (c.dropdownAdapter = h.Decorate(c.dropdownAdapter, ut)),
                      c.closeOnSelect &&
                        (c.dropdownAdapter = h.Decorate(c.dropdownAdapter, et)),
                      null != c.dropdownCssClass ||
                        null != c.dropdownCss ||
                        null != c.adaptDropdownCssClass) &&
                        ((at = t(c.amdBase + "compat/dropdownCss")),
                        (c.dropdownAdapter = h.Decorate(
                          c.dropdownAdapter,
                          at
                        ))),
                      (c.dropdownAdapter = h.Decorate(c.dropdownAdapter, rt))),
                    null == c.selectionAdapter &&
                      (((c.selectionAdapter = c.multiple ? u : r),
                      null != c.placeholder &&
                        (c.selectionAdapter = h.Decorate(
                          c.selectionAdapter,
                          f
                        )),
                      c.allowClear &&
                        (c.selectionAdapter = h.Decorate(
                          c.selectionAdapter,
                          e
                        )),
                      c.multiple &&
                        (c.selectionAdapter = h.Decorate(
                          c.selectionAdapter,
                          o
                        )),
                      null != c.containerCssClass ||
                        null != c.containerCss ||
                        null != c.adaptContainerCssClass) &&
                        ((vt = t(c.amdBase + "compat/containerCss")),
                        (c.selectionAdapter = h.Decorate(
                          c.selectionAdapter,
                          vt
                        ))),
                      (c.selectionAdapter = h.Decorate(c.selectionAdapter, s))),
                    c.language = this._resolveLanguage(c.language),
                    c.language.push("en"),
                    l = [],
                    ot = 0;
                  ot < c.language.length;
                  ot++
                )
                  (st = c.language[ot]), -1 === l.indexOf(st) && l.push(st);
                return (
                  (c.language = l),
                  (c.translations = this._processTranslations(
                    c.language,
                    c.debug
                  )),
                  c
                );
              }),
              (ot.prototype.reset = function () {
                function t(n) {
                  return n.replace(/[^\u0000-\u007E]/g, function (n) {
                    return l[n] || n;
                  });
                }
                this.defaults = {
                  amdBase: "./",
                  amdLanguageBase: "./i18n/",
                  closeOnSelect: !0,
                  debug: !1,
                  dropdownAutoWidth: !1,
                  escapeMarkup: h.escapeMarkup,
                  language: {},
                  matcher: function i(r, u) {
                    var f, e, o, s;
                    if ("" === n.trim(r.term)) return u;
                    if (u.children && 0 < u.children.length) {
                      for (
                        f = n.extend(!0, {}, u), e = u.children.length - 1;
                        0 <= e;
                        e--
                      )
                        null == i(r, u.children[e]) && f.children.splice(e, 1);
                      return 0 < f.children.length ? f : i(r, f);
                    }
                    return (
                      (o = t(u.text).toUpperCase()),
                      (s = t(r.term).toUpperCase()),
                      -1 < o.indexOf(s) ? u : null
                    );
                  },
                  minimumInputLength: 0,
                  maximumInputLength: 0,
                  maximumSelectionLength: 0,
                  minimumResultsForSearch: 0,
                  selectOnClose: !1,
                  scrollAfterSelect: !1,
                  sorter: function (n) {
                    return n;
                  },
                  templateResult: function (n) {
                    return n.text;
                  },
                  templateSelection: function (n) {
                    return n.text;
                  },
                  theme: "default",
                  width: "resolve",
                };
              }),
              (ot.prototype.applyFromElement = function (n, t) {
                var i = n.language,
                  r = this.defaults.language,
                  u = t.prop("lang"),
                  f = t.closest("[lang]").prop("lang"),
                  e = Array.prototype.concat.call(
                    this._resolveLanguage(u),
                    this._resolveLanguage(i),
                    this._resolveLanguage(r),
                    this._resolveLanguage(f)
                  );
                return (n.language = e), n;
              }),
              (ot.prototype._resolveLanguage = function (t) {
                var r, u, i, f;
                if (!t) return [];
                if (n.isEmptyObject(t)) return [];
                if (n.isPlainObject(t)) return [t];
                for (
                  r = n.isArray(t) ? t : [t], u = [], i = 0;
                  i < r.length;
                  i++
                )
                  (u.push(r[i]),
                  "string" == typeof r[i] && 0 < r[i].indexOf("-")) &&
                    ((f = r[i].split("-")[0]), u.push(f));
                return u;
              }),
              (ot.prototype._processTranslations = function (t, i) {
                for (var u, r, e = new c(), f = 0; f < t.length; f++) {
                  if (((u = new c()), (r = t[f]), "string" == typeof r))
                    try {
                      u = c.loadPath(r);
                    } catch (t) {
                      try {
                        r = this.defaults.amdLanguageBase + r;
                        u = c.loadPath(r);
                      } catch (t) {
                        i &&
                          window.console &&
                          console.warn &&
                          console.warn(
                            'Select2: The language file for "' +
                              r +
                              '" could not be automatically loaded. A fallback will be used instead.'
                          );
                      }
                    }
                  else u = n.isPlainObject(r) ? new c(r) : r;
                  e.extend(u);
                }
                return e;
              }),
              (ot.prototype.set = function (t, i) {
                var r = {},
                  u;
                r[n.camelCase(t)] = i;
                u = h._convertData(r);
                n.extend(!0, this.defaults, u);
              }),
              new ot()
            );
          }
        ),
        t.define(
          "select2/options",
          ["require", "jquery", "./defaults", "./utils"],
          function (n, t, i, r) {
            function u(t, u) {
              if (
                ((this.options = t),
                null != u && this.fromElement(u),
                null != u &&
                  (this.options = i.applyFromElement(this.options, u)),
                (this.options = i.apply(this.options)),
                u && u.is("input"))
              ) {
                var f = n(this.get("amdBase") + "compat/inputData");
                this.options.dataAdapter = r.Decorate(
                  this.options.dataAdapter,
                  f
                );
              }
            }
            return (
              (u.prototype.fromElement = function (n) {
                function a(n, t) {
                  return t.toUpperCase();
                }
                var l = ["select2"],
                  u,
                  e,
                  s,
                  o,
                  h,
                  c,
                  f,
                  i;
                for (
                  null == this.options.multiple &&
                    (this.options.multiple = n.prop("multiple")),
                    null == this.options.disabled &&
                      (this.options.disabled = n.prop("disabled")),
                    null == this.options.dir &&
                      (this.options.dir = n.prop("dir")
                        ? n.prop("dir")
                        : n.closest("[dir]").prop("dir")
                        ? n.closest("[dir]").prop("dir")
                        : "ltr"),
                    n.prop("disabled", this.options.disabled),
                    n.prop("multiple", this.options.multiple),
                    r.GetData(n[0], "select2Tags") &&
                      (this.options.debug &&
                        window.console &&
                        console.warn &&
                        console.warn(
                          'Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'
                        ),
                      r.StoreData(n[0], "data", r.GetData(n[0], "select2Tags")),
                      r.StoreData(n[0], "tags", !0)),
                    r.GetData(n[0], "ajaxUrl") &&
                      (this.options.debug &&
                        window.console &&
                        console.warn &&
                        console.warn(
                          "Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."
                        ),
                      n.attr("ajax--url", r.GetData(n[0], "ajaxUrl")),
                      r.StoreData(
                        n[0],
                        "ajax-Url",
                        r.GetData(n[0], "ajaxUrl")
                      )),
                    u = {},
                    e = 0;
                  e < n[0].attributes.length;
                  e++
                )
                  (s = n[0].attributes[e].name),
                    (o = "data-"),
                    s.substr(0, o.length) == o &&
                      ((h = s.substring(o.length)),
                      (c = r.GetData(n[0], h)),
                      (u[h.replace(/-([a-z])/g, a)] = c));
                t.fn.jquery &&
                  "1." == t.fn.jquery.substr(0, 2) &&
                  n[0].dataset &&
                  (u = t.extend(!0, {}, n[0].dataset, u));
                f = t.extend(!0, {}, r.GetData(n[0]), u);
                for (i in (f = r._convertData(f)))
                  -1 < t.inArray(i, l) ||
                    (t.isPlainObject(this.options[i])
                      ? t.extend(this.options[i], f[i])
                      : (this.options[i] = f[i]));
                return this;
              }),
              (u.prototype.get = function (n) {
                return this.options[n];
              }),
              (u.prototype.set = function (n, t) {
                this.options[n] = t;
              }),
              u
            );
          }
        ),
        t.define(
          "select2/core",
          ["jquery", "./options", "./utils", "./keys"],
          function (n, t, i, r) {
            var u = function (n, r) {
              var e, o, f, s, h, c, l;
              null != i.GetData(n[0], "select2") &&
                i.GetData(n[0], "select2").destroy();
              this.$element = n;
              this.id = this._generateId(n);
              r = r || {};
              this.options = new t(r, n);
              u.__super__.constructor.call(this);
              e = n.attr("tabindex") || 0;
              i.StoreData(n[0], "old-tabindex", e);
              n.attr("tabindex", "-1");
              o = this.options.get("dataAdapter");
              this.dataAdapter = new o(n, this.options);
              f = this.render();
              this._placeContainer(f);
              s = this.options.get("selectionAdapter");
              this.selection = new s(n, this.options);
              this.$selection = this.selection.render();
              this.selection.position(this.$selection, f);
              h = this.options.get("dropdownAdapter");
              this.dropdown = new h(n, this.options);
              this.$dropdown = this.dropdown.render();
              this.dropdown.position(this.$dropdown, f);
              c = this.options.get("resultsAdapter");
              this.results = new c(n, this.options, this.dataAdapter);
              this.$results = this.results.render();
              this.results.position(this.$results, this.$dropdown);
              l = this;
              this._bindAdapters();
              this._registerDomEvents();
              this._registerDataEvents();
              this._registerSelectionEvents();
              this._registerDropdownEvents();
              this._registerResultsEvents();
              this._registerEvents();
              this.dataAdapter.current(function (n) {
                l.trigger("selection:update", { data: n });
              });
              n.addClass("select2-hidden-accessible");
              n.attr("aria-hidden", "true");
              this._syncAttributes();
              i.StoreData(n[0], "select2", this);
              n.data("select2", this);
            };
            return (
              i.Extend(u, i.Observable),
              (u.prototype._generateId = function (n) {
                return (
                  "select2-" +
                  (null != n.attr("id")
                    ? n.attr("id")
                    : null != n.attr("name")
                    ? n.attr("name") + "-" + i.generateChars(2)
                    : i.generateChars(4)
                  ).replace(/(:|\.|\[|\]|,)/g, "")
                );
              }),
              (u.prototype._placeContainer = function (n) {
                n.insertAfter(this.$element);
                var t = this._resolveWidth(
                  this.$element,
                  this.options.get("width")
                );
                null != t && n.css("width", t);
              }),
              (u.prototype._resolveWidth = function (n, t) {
                var r, u, f, i;
                if ("resolve" == t)
                  return (
                    (r = this._resolveWidth(n, "style")),
                    null != r ? r : this._resolveWidth(n, "element")
                  );
                if ("element" == t)
                  return (u = n.outerWidth(!1)), u <= 0 ? "auto" : u + "px";
                if ("style" != t)
                  return "computedstyle" != t
                    ? t
                    : window.getComputedStyle(n[0]).width;
                if (((f = n.attr("style")), "string" != typeof f)) return null;
                for (var o = f.split(";"), e = 0, s = o.length; e < s; e += 1)
                  if (
                    ((i = o[e]
                      .replace(/\s/g, "")
                      .match(
                        /^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i
                      )),
                    null !== i && 1 <= i.length)
                  )
                    return i[1];
                return null;
              }),
              (u.prototype._bindAdapters = function () {
                this.dataAdapter.bind(this, this.$container);
                this.selection.bind(this, this.$container);
                this.dropdown.bind(this, this.$container);
                this.results.bind(this, this.$container);
              }),
              (u.prototype._registerDomEvents = function () {
                var n = this,
                  t;
                this.$element.on("change.select2", function () {
                  n.dataAdapter.current(function (t) {
                    n.trigger("selection:update", { data: t });
                  });
                });
                this.$element.on("focus.select2", function (t) {
                  n.trigger("focus", t);
                });
                this._syncA = i.bind(this._syncAttributes, this);
                this._syncS = i.bind(this._syncSubtree, this);
                this.$element[0].attachEvent &&
                  this.$element[0].attachEvent("onpropertychange", this._syncA);
                t =
                  window.MutationObserver ||
                  window.WebKitMutationObserver ||
                  window.MozMutationObserver;
                null != t
                  ? ((this._observer = new t(function (t) {
                      n._syncA();
                      n._syncS(null, t);
                    })),
                    this._observer.observe(this.$element[0], {
                      attributes: !0,
                      childList: !0,
                      subtree: !1,
                    }))
                  : this.$element[0].addEventListener &&
                    (this.$element[0].addEventListener(
                      "DOMAttrModified",
                      n._syncA,
                      !1
                    ),
                    this.$element[0].addEventListener(
                      "DOMNodeInserted",
                      n._syncS,
                      !1
                    ),
                    this.$element[0].addEventListener(
                      "DOMNodeRemoved",
                      n._syncS,
                      !1
                    ));
              }),
              (u.prototype._registerDataEvents = function () {
                var n = this;
                this.dataAdapter.on("*", function (t, i) {
                  n.trigger(t, i);
                });
              }),
              (u.prototype._registerSelectionEvents = function () {
                var t = this,
                  i = ["toggle", "focus"];
                this.selection.on("toggle", function () {
                  t.toggleDropdown();
                });
                this.selection.on("focus", function (n) {
                  t.focus(n);
                });
                this.selection.on("*", function (r, u) {
                  -1 === n.inArray(r, i) && t.trigger(r, u);
                });
              }),
              (u.prototype._registerDropdownEvents = function () {
                var n = this;
                this.dropdown.on("*", function (t, i) {
                  n.trigger(t, i);
                });
              }),
              (u.prototype._registerResultsEvents = function () {
                var n = this;
                this.results.on("*", function (t, i) {
                  n.trigger(t, i);
                });
              }),
              (u.prototype._registerEvents = function () {
                var n = this;
                this.on("open", function () {
                  n.$container.addClass("select2-container--open");
                });
                this.on("close", function () {
                  n.$container.removeClass("select2-container--open");
                });
                this.on("enable", function () {
                  n.$container.removeClass("select2-container--disabled");
                });
                this.on("disable", function () {
                  n.$container.addClass("select2-container--disabled");
                });
                this.on("blur", function () {
                  n.$container.removeClass("select2-container--focus");
                });
                this.on("query", function (t) {
                  n.isOpen() || n.trigger("open", {});
                  this.dataAdapter.query(t, function (i) {
                    n.trigger("results:all", { data: i, query: t });
                  });
                });
                this.on("query:append", function (t) {
                  this.dataAdapter.query(t, function (i) {
                    n.trigger("results:append", { data: i, query: t });
                  });
                });
                this.on("keypress", function (t) {
                  var i = t.which;
                  n.isOpen()
                    ? i === r.ESC || i === r.TAB || (i === r.UP && t.altKey)
                      ? (n.close(t), t.preventDefault())
                      : i === r.ENTER
                      ? (n.trigger("results:select", {}), t.preventDefault())
                      : i === r.SPACE && t.ctrlKey
                      ? (n.trigger("results:toggle", {}), t.preventDefault())
                      : i === r.UP
                      ? (n.trigger("results:previous", {}), t.preventDefault())
                      : i === r.DOWN &&
                        (n.trigger("results:next", {}), t.preventDefault())
                    : (i === r.ENTER ||
                        i === r.SPACE ||
                        (i === r.DOWN && t.altKey)) &&
                      (n.open(), t.preventDefault());
                });
              }),
              (u.prototype._syncAttributes = function () {
                this.options.set("disabled", this.$element.prop("disabled"));
                this.isDisabled()
                  ? (this.isOpen() && this.close(), this.trigger("disable", {}))
                  : this.trigger("enable", {});
              }),
              (u.prototype._isChangeMutation = function (t, i) {
                var r = !1,
                  f = this,
                  u;
                if (
                  !t ||
                  !t.target ||
                  "OPTION" === t.target.nodeName ||
                  "OPTGROUP" === t.target.nodeName
                ) {
                  if (i)
                    if (i.addedNodes && 0 < i.addedNodes.length)
                      for (u = 0; u < i.addedNodes.length; u++)
                        i.addedNodes[u].selected && (r = !0);
                    else
                      i.removedNodes && 0 < i.removedNodes.length
                        ? (r = !0)
                        : n.isArray(i) &&
                          n.each(i, function (n, t) {
                            if (f._isChangeMutation(n, t)) return !(r = !0);
                          });
                  else r = !0;
                  return r;
                }
              }),
              (u.prototype._syncSubtree = function (n, t) {
                var i = this._isChangeMutation(n, t),
                  r = this;
                i &&
                  this.dataAdapter.current(function (n) {
                    r.trigger("selection:update", { data: n });
                  });
              }),
              (u.prototype.trigger = function (n, t) {
                var r = u.__super__.trigger,
                  f = {
                    open: "opening",
                    close: "closing",
                    select: "selecting",
                    unselect: "unselecting",
                    clear: "clearing",
                  },
                  e,
                  i;
                if (
                  (void 0 === t && (t = {}), n in f) &&
                  ((e = f[n]),
                  (i = { prevented: !1, name: n, args: t }),
                  r.call(this, e, i),
                  i.prevented)
                )
                  return void (t.prevented = !0);
                r.call(this, n, t);
              }),
              (u.prototype.toggleDropdown = function () {
                this.isDisabled() ||
                  (this.isOpen() ? this.close() : this.open());
              }),
              (u.prototype.open = function () {
                this.isOpen() || this.isDisabled() || this.trigger("query", {});
              }),
              (u.prototype.close = function (n) {
                this.isOpen() && this.trigger("close", { originalEvent: n });
              }),
              (u.prototype.isEnabled = function () {
                return !this.isDisabled();
              }),
              (u.prototype.isDisabled = function () {
                return this.options.get("disabled");
              }),
              (u.prototype.isOpen = function () {
                return this.$container.hasClass("select2-container--open");
              }),
              (u.prototype.hasFocus = function () {
                return this.$container.hasClass("select2-container--focus");
              }),
              (u.prototype.focus = function () {
                this.hasFocus() ||
                  (this.$container.addClass("select2-container--focus"),
                  this.trigger("focus", {}));
              }),
              (u.prototype.enable = function (n) {
                this.options.get("debug") &&
                  window.console &&
                  console.warn &&
                  console.warn(
                    'Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'
                  );
                (null != n && 0 !== n.length) || (n = [!0]);
                var t = !n[0];
                this.$element.prop("disabled", t);
              }),
              (u.prototype.data = function () {
                this.options.get("debug") &&
                  0 < arguments.length &&
                  window.console &&
                  console.warn &&
                  console.warn(
                    'Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.'
                  );
                var n = [];
                return (
                  this.dataAdapter.current(function (t) {
                    n = t;
                  }),
                  n
                );
              }),
              (u.prototype.val = function (t) {
                if (
                  (this.options.get("debug") &&
                    window.console &&
                    console.warn &&
                    console.warn(
                      'Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'
                    ),
                  null == t || 0 === t.length)
                )
                  return this.$element.val();
                var i = t[0];
                n.isArray(i) &&
                  (i = n.map(i, function (n) {
                    return n.toString();
                  }));
                this.$element.val(i).trigger("input").trigger("change");
              }),
              (u.prototype.destroy = function () {
                this.$container.remove();
                this.$element[0].detachEvent &&
                  this.$element[0].detachEvent("onpropertychange", this._syncA);
                null != this._observer
                  ? (this._observer.disconnect(), (this._observer = null))
                  : this.$element[0].removeEventListener &&
                    (this.$element[0].removeEventListener(
                      "DOMAttrModified",
                      this._syncA,
                      !1
                    ),
                    this.$element[0].removeEventListener(
                      "DOMNodeInserted",
                      this._syncS,
                      !1
                    ),
                    this.$element[0].removeEventListener(
                      "DOMNodeRemoved",
                      this._syncS,
                      !1
                    ));
                this._syncA = null;
                this._syncS = null;
                this.$element.off(".select2");
                this.$element.attr(
                  "tabindex",
                  i.GetData(this.$element[0], "old-tabindex")
                );
                this.$element.removeClass("select2-hidden-accessible");
                this.$element.attr("aria-hidden", "false");
                i.RemoveData(this.$element[0]);
                this.$element.removeData("select2");
                this.dataAdapter.destroy();
                this.selection.destroy();
                this.dropdown.destroy();
                this.results.destroy();
                this.dataAdapter = null;
                this.selection = null;
                this.dropdown = null;
                this.results = null;
              }),
              (u.prototype.render = function () {
                var t = n(
                  '<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>'
                );
                return (
                  t.attr("dir", this.options.get("dir")),
                  (this.$container = t),
                  this.$container.addClass(
                    "select2-container--" + this.options.get("theme")
                  ),
                  i.StoreData(t[0], "element", this.$element),
                  t
                );
              }),
              u
            );
          }
        ),
        t.define("jquery-mousewheel", ["jquery"], function (n) {
          return n;
        }),
        t.define(
          "jquery.select2",
          [
            "jquery",
            "jquery-mousewheel",
            "./select2/core",
            "./select2/defaults",
            "./select2/utils",
          ],
          function (n, t, i, r, u) {
            if (null == n.fn.select2) {
              var f = ["open", "close", "destroy"];
              n.fn.select2 = function (t) {
                if ("object" == typeof (t = t || {}))
                  return (
                    this.each(function () {
                      var r = n.extend(!0, {}, t);
                      new i(n(this), r);
                    }),
                    this
                  );
                if ("string" != typeof t)
                  throw new Error("Invalid arguments for Select2: " + t);
                var r,
                  e = Array.prototype.slice.call(arguments, 1);
                return (
                  this.each(function () {
                    var n = u.GetData(this, "select2");
                    null == n &&
                      window.console &&
                      console.error &&
                      console.error(
                        "The select2('" +
                          t +
                          "') method was called on an element that is not using Select2."
                      );
                    r = n[t].apply(n, e);
                  }),
                  -1 < n.inArray(t, f) ? this : r
                );
              };
            }
            return (
              null == n.fn.select2.defaults && (n.fn.select2.defaults = r), i
            );
          }
        ),
        { define: t.define, require: t.require }
      );
    })(),
    i = t.require("jquery.select2");
  return (n.fn.select2.amd = t), i;
});
