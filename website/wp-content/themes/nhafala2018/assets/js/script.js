"use strict";
!function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
}(function (t, e) {
    function i(t, e) {
        this.container = t, this.options = e, this.init()
    }

    function s(e, i) {
        this.widget = e, this.options = t.extend({}, i), this.detectService(), this.service && this.init()
    }

    function o(t) {
        var e = {}, i = t.data();
        for (var s in i) {
            var o = i[s];
            "yes" === o ? o = !0 : "no" === o && (o = !1), e[s.replace(/-(\w)/g, function (t, e) {
                return e.toUpper()
            })] = o
        }
        return e
    }

    function n(t, e) {
        return r(t, e, encodeURIComponent)
    }

    function r(t, e, i) {
        return t.replace(/\{([^}]+)\}/g, function (t, s) {
            return s in e ? i ? i(e[s]) : e[s] : t
        })
    }

    function a(t, e) {
        var i = u + t;
        return i + " " + i + "_" + e
    }

    function l(e, i) {
        function s(r) {
            "keydown" === r.type && 27 !== r.which || t(r.target).closest(e).length || (e.removeClass(p), o.off(n, s), t.isFunction(i) && i())
        }

        var o = t(document), n = "click touchstart keydown";
        o.on(n, s)
    }

    function c(t) {
        if (document.documentElement.getBoundingClientRect) {
            var e = parseInt(t.css("left"), 10), i = parseInt(t.css("top"), 10), s = t[0].getBoundingClientRect();
            s.left < 10 ? t.css("left", 10 - s.left + e) : s.right > window.innerWidth - 10 && t.css("left", window.innerWidth - s.right - 10 + e), s.top < 10 ? t.css("top", 10 - s.top + i) : s.bottom > window.innerHeight - 10 && t.css("top", window.innerHeight - s.bottom - 10 + i)
        }
        t.addClass(p)
    }

    var d = "social-likes", u = d + "__", p = d + "_opened", h = "https:" === location.protocol ? "https:" : "http:",
        f = {
            facebook: {
                counterUrl: "https://graph.facebook.com/?id={url}", convertNumber: function (t) {
                    return t.share.share_count
                }, popupUrl: "https://www.facebook.com/sharer/sharer.php?u={url}", popupWidth: 600, popupHeight: 359
            },
            twitter: {
                counters: !1,
                popupUrl: "https://twitter.com/intent/tweet?url={url}&text={title}",
                popupWidth: 600,
                popupHeight: 250,
                click: function () {
                    return /[.?:\-–—]\s*$/.test(this.options.title) || (this.options.title += ":"), !0
                }
            },
            mailru: {
                counterUrl: h + "//connect.mail.ru/share_count?url_list={url}&callback=1&func=?",
                convertNumber: function (t) {
                    for (var e in t) if (t.hasOwnProperty(e)) return t[e].shares
                },
                popupUrl: "https://connect.mail.ru/share?share_url={url}&title={title}",
                popupWidth: 492,
                popupHeight: 500
            },
            vkontakte: {
                counterUrl: "https://vk.com/share.php?act=count&url={url}&index={index}",
                counter: function (e, i) {
                    var s = f.vkontakte;
                    s._ || (s._ = [], window.VK || (window.VK = {}), window.VK.Share = {
                        count: function (t, e) {
                            s._[t].resolve(e)
                        }
                    });
                    var o = s._.length;
                    s._.push(i), t.getScript(n(e, {index: o})).fail(i.reject)
                },
                popupUrl: "https://vk.com/share.php?url={url}&title={title}",
                popupWidth: 655,
                popupHeight: 450
            },
            odnoklassniki: {
                counterUrl: h + "//connect.ok.ru/dk?st.cmd=extLike&ref={url}&uid={index}",
                counter: function (e, i) {
                    var s = f.odnoklassniki;
                    s._ || (s._ = [], window.ODKL || (window.ODKL = {}), window.ODKL.updateCount = function (t, e) {
                        s._[t].resolve(e)
                    });
                    var o = s._.length;
                    s._.push(i), t.getScript(n(e, {index: o})).fail(i.reject)
                },
                popupUrl: "https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&service=odnoklassniki&st.shareUrl={url}",
                popupWidth: 580,
                popupHeight: 336
            },
            plusone: {
                counters: !1,
                popupUrl: "https://plus.google.com/share?url={url}",
                popupWidth: 500,
                popupHeight: 550
            },
            pinterest: {
                counterUrl: h + "//api.pinterest.com/v1/urls/count.json?url={url}&callback=?",
                convertNumber: function (t) {
                    return t.count
                },
                popupUrl: "https://pinterest.com/pin/create/button/?url={url}&description={title}",
                popupWidth: 740,
                popupHeight: 550
            }
        }, g = {
            promises: {}, fetch: function (e, i, s) {
                g.promises[e] || (g.promises[e] = {});
                var o = g.promises[e];
                if (!s.forceUpdate && o[i]) return o[i];
                var r = t.extend({}, f[e], s), a = t.Deferred(), l = r.counterUrl && n(r.counterUrl, {url: i});
                return l && t.isFunction(r.counter) ? r.counter(l, a) : r.counterUrl ? t.getJSON(l).done(function (e) {
                    try {
                        var i = e;
                        t.isFunction(r.convertNumber) && (i = r.convertNumber(e)), a.resolve(i)
                    } catch (t) {
                        a.reject()
                    }
                }).fail(a.reject) : a.reject(), o[i] = a.promise(), o[i]
            }
        };
    t.fn.socialLikes = function (e) {
        return this.each(function () {
            var s = t(this), n = s.data(d);
            n ? t.isPlainObject(e) && n.update(e) : (n = new i(s, t.extend({}, t.fn.socialLikes.defaults, e, o(s))), s.data(d, n))
        })
    }, t.fn.socialLikes.defaults = {
        url: window.location.href.replace(window.location.hash, ""),
        title: document.title,
        counters: !0,
        zeroes: !1,
        wait: 500,
        timeout: 1e4,
        popupCheckInterval: 500,
        singleTitle: "Share"
    }, i.prototype = {
        init: function () {
            this.container.addClass(d), this.single = this.container.hasClass(d + "_single"), this.initUserButtons(), this.countersLeft = 0, this.number = 0, this.container.on("counter." + d, t.proxy(this.updateCounter, this));
            var e = this.container.children();
            this.makeSingleButton(), this.buttons = [], e.each(t.proxy(function (e, i) {
                var o = new s(t(i), this.options);
                this.buttons.push(o), o.options.counterUrl && this.countersLeft++
            }, this)), this.options.counters ? (this.timer = setTimeout(t.proxy(this.appear, this), this.options.wait), this.timeout = setTimeout(t.proxy(this.ready, this, !0), this.options.timeout)) : this.appear()
        }, initUserButtons: function () {
            !this.userButtonInited && window.socialLikesButtons && t.extend(!0, f, socialLikesButtons), this.userButtonInited = !0
        }, makeSingleButton: function () {
            if (this.single) {
                var e = this.container;
                e.addClass(d + "_vertical"), e.wrap(t("<div>", {class: d + "_single-w"})), e.wrapInner(t("<div>", {class: d + "__single-container"}));
                var i = e.parent(), s = t("<div>", {class: a("widget", "single")}),
                    o = t(r('<div class="{buttonCls}"><span class="{iconCls}"></span>{title}</div>', {
                        buttonCls: a("button", "single"),
                        iconCls: a("icon", "single"),
                        title: this.options.singleTitle
                    }));
                s.append(o), i.append(s), s.on("click", function () {
                    var t = d + "__widget_active";
                    return s.toggleClass(t), s.hasClass(t) ? (e.css({
                        left: -(e.width() - s.width()) / 2,
                        top: -e.height()
                    }), c(e), l(e, function () {
                        s.removeClass(t)
                    })) : e.removeClass(p), !1
                }), this.widget = s
            }
        }, update: function (e) {
            if (e.forceUpdate || e.url !== this.options.url) {
                this.number = 0, this.countersLeft = this.buttons.length, this.widget && this.widget.find("." + d + "__counter").remove(), t.extend(this.options, e);
                for (var i = 0; i < this.buttons.length; i++) this.buttons[i].update(e)
            }
        }, updateCounter: function (t, e, i) {
            ((i = i || 0) || this.options.zeroes) && (this.number += i, this.single && this.getCounterElem().text(this.number)), 0 == --this.countersLeft && (this.appear(), this.ready())
        }, appear: function () {
            this.container.addClass(d + "_visible")
        }, ready: function (t) {
            this.timeout && clearTimeout(this.timeout), this.container.addClass(d + "_ready"), t || this.container.trigger("ready." + d, this.number)
        }, getCounterElem: function () {
            var e = this.widget.find("." + u + "counter_single");
            return e.length || (e = t("<span>", {class: a("counter", "single")}), this.widget.append(e)), e
        }
    }, s.prototype = {
        init: function () {
            this.detectParams(), this.initHtml(), setTimeout(t.proxy(this.initCounter, this), 0)
        }, update: function (e) {
            t.extend(this.options, {forceUpdate: !1}, e), this.widget.find("." + d + "__counter").remove(), this.initCounter()
        }, detectService: function () {
            var e = this.widget.data("service");
            if (!e) {
                for (var i = this.widget[0], s = i.classList || i.className.split(" "), o = 0; o < s.length; o++) {
                    var n = s[o];
                    if (f[n]) {
                        e = n;
                        break
                    }
                }
                if (!e) return
            }
            this.service = e, t.extend(this.options, f[e])
        }, detectParams: function () {
            var t = this.widget.data();
            if (t.counter) {
                var e = parseInt(t.counter, 10);
                isNaN(e) ? this.options.counterUrl = t.counter : this.options.counterNumber = e
            }
            t.title && (this.options.title = t.title), t.url && (this.options.url = t.url)
        }, initHtml: function () {
            var e = this.options, i = this.widget, s = i.find("a");
            s.length && this.cloneDataAttrs(s, i);
            var o = t("<span>", {class: this.getElementClassNames("button"), html: i.html()});
            if (e.clickUrl) {
                var r = n(e.clickUrl, {url: e.url, title: e.title}), a = t("<a>", {href: r});
                this.cloneDataAttrs(i, a), i.replaceWith(a), this.widget = a, i = a
            } else i.on("click", t.proxy(this.click, this));
            i.removeClass(this.service), i.addClass(this.getElementClassNames("widget")), o.prepend(t("<span>", {class: this.getElementClassNames("icon")})), i.empty().append(o), this.button = o
        }, initCounter: function () {
            if (this.options.counters) if (this.options.counterNumber) this.updateCounter(this.options.counterNumber); else {
                var e = {counterUrl: this.options.counterUrl, forceUpdate: this.options.forceUpdate};
                g.fetch(this.service, this.options.url, e).always(t.proxy(this.updateCounter, this))
            }
        }, cloneDataAttrs: function (t, e) {
            var i = t.data();
            for (var s in i) i.hasOwnProperty(s) && e.data(s, i[s])
        }, getElementClassNames: function (t) {
            return a(t, this.service)
        }, updateCounter: function (e) {
            e = parseInt(e, 10) || 0;
            var i = {class: this.getElementClassNames("counter"), text: e};
            e || this.options.zeroes || (i.class += " " + d + "__counter_empty", i.text = "");
            var s = this.widget.find("." + u + "counter_" + this.service);
            s.length || (s = t("<span>", i), this.widget.append(s)), this.widget.trigger("counter." + d, [this.service, e])
        }, click: function (e) {
            var i = this.options, s = !0;
            if (t.isFunction(i.click) && (s = i.click.call(this, e)), s) {
                var o = n(i.popupUrl, {url: i.url, title: i.title});
                o = this.addAdditionalParamsToUrl(o), this.openPopup(o, {width: i.popupWidth, height: i.popupHeight})
            }
            return !1
        }, addAdditionalParamsToUrl: function (e) {
            var i = t.param(t.extend(this.widget.data(), this.options.data));
            return t.isEmptyObject(i) ? e : e + (-1 === e.indexOf("?") ? "?" : "&") + i
        }, openPopup: function (i, s) {
            var o = window.screenLeft !== e ? window.screenLeft : screen.left,
                n = window.screenTop !== e ? window.screenTop : screen.top,
                r = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width,
                a = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height,
                l = Math.round(r / 2 - s.width / 2) + o, c = 0;
            a > s.height && (c = Math.round(a / 3 - s.height / 2) + n);
            var u = window.open(i, "sl_" + this.service, "left=" + l + ",top=" + c + ",width=" + s.width + ",height=" + s.height + ",personalbar=0,toolbar=0,scrollbars=1,resizable=1");
            if (u) {
                u.focus(), this.widget.trigger("popup_opened." + d, [this.service, u]);
                var p = setInterval(t.proxy(function () {
                    u.closed && (clearInterval(p), this.widget.trigger("popup_closed." + d, this.service))
                }, this), this.options.popupCheckInterval)
            } else location.href = i
        }
    }, t(function () {
        t("." + d).socialLikes()
    })
}), function (t, e, i, s) {
    i.swipebox = function (o, n) {
        var r, a, l = {
                useCSS: !0,
                useSVG: !0,
                initialIndexOnArray: 0,
                removeBarsOnMobile: !0,
                hideCloseButtonOnMobile: !1,
                hideBarsDelay: 3e3,
                videoMaxWidth: 1140,
                vimeoColor: "cccccc",
                beforeOpen: null,
                afterOpen: null,
                afterClose: null,
                afterMedia: null,
                nextSlide: null,
                prevSlide: null,
                loopAtEnd: !1,
                autoplayVideos: !1,
                queryStringData: {},
                toggleClassOnLoad: ""
            }, c = this, d = [], u = o.selector,
            p = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i),
            h = null !== p || e.createTouch !== s || "ontouchstart" in t || "onmsgesturechange" in t || navigator.msMaxTouchPoints,
            f = !!e.createElementNS && !!e.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect,
            g = t.innerWidth ? t.innerWidth : i(t).width(), b = t.innerHeight ? t.innerHeight : i(t).height(), m = 0;
        c.settings = {}, i.swipebox.close = function () {
            r.closeSlide()
        }, i.swipebox.destroy = function () {
            i(e).off("click.swipebox")
        }, i.swipebox.extend = function () {
            return r
        }, c.init = function () {
            c.settings = i.extend({}, l, n), i.isArray(o) ? (d = o, r.target = i(t), r.init(c.settings.initialIndexOnArray)) : i(e).on("click.swipebox", u, function (t) {
                if ("slide current" === t.target.parentNode.className) return !1;
                i.isArray(o) || (r.destroy(), a = i(u), r.actions()), d = [];
                var e, s, n;
                n || (s = "data-rel", n = i(this).attr(s)), n || (s = "rel", n = i(this).attr(s)), a = n && "" !== n && "nofollow" !== n ? i(u).filter("[" + s + '="' + n + '"]') : i(u), a.each(function () {
                    var t = null, e = null;
                    i(this).attr("title") && (t = i(this).attr("title")), i(this).attr("href") && (e = i(this).attr("href")), d.push({
                        href: e,
                        title: t
                    })
                }), e = a.index(i(this)), t.preventDefault(), t.stopPropagation(), r.target = i(t.target), r.init(e)
            })
        }, r = {
            init: function (t) {
                c.settings.beforeOpen && c.settings.beforeOpen(), this.target.trigger("swipebox-start"), i.swipebox.isOpen = !0, this.build(), this.openSlide(t), this.openMedia(t), this.preloadMedia(t + 1), this.preloadMedia(t - 1), c.settings.afterOpen && c.settings.afterOpen(t)
            }, build: function () {
                var t, e = this;
                i("body").append('<div id="swipebox-overlay">\t\t\t\t\t<div id="swipebox-container">\t\t\t\t\t\t<div id="swipebox-slider"></div>\t\t\t\t\t\t<div id="swipebox-top-bar">\t\t\t\t\t\t\t<div id="swipebox-title"></div>\t\t\t\t\t\t</div>\t\t\t\t\t\t<div id="swipebox-bottom-bar">\t\t\t\t\t\t\t<div id="swipebox-arrows">\t\t\t\t\t\t\t\t<a id="swipebox-prev"></a>\t\t\t\t\t\t\t\t<a id="swipebox-next"></a>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t</div>\t\t\t\t\t\t<a id="swipebox-close"></a>\t\t\t\t\t</div>\t\t\t</div>'), f && !0 === c.settings.useSVG && (t = i("#swipebox-close").css("background-image"), t = t.replace("png", "svg"), i("#swipebox-prev, #swipebox-next, #swipebox-close").css({"background-image": t})), p && c.settings.removeBarsOnMobile && i("#swipebox-bottom-bar, #swipebox-top-bar").remove(), i.each(d, function () {
                    i("#swipebox-slider").append('<div class="slide"></div>')
                }), e.setDim(), e.actions(), h && e.gesture(), e.keyboard(), e.animBars(), e.resize()
            }, setDim: function () {
                var e, s, o = {};
                "onorientationchange" in t ? t.addEventListener("orientationchange", function () {
                    0 === t.orientation ? (e = g, s = b) : 90 !== t.orientation && -90 !== t.orientation || (e = b, s = g)
                }, !1) : (e = t.innerWidth ? t.innerWidth : i(t).width(), s = t.innerHeight ? t.innerHeight : i(t).height()), o = {
                    width: e,
                    height: s
                }, i("#swipebox-overlay").css(o)
            }, resize: function () {
                var e = this;
                i(t).resize(function () {
                    e.setDim()
                }).resize()
            }, supportTransition: function () {
                var t,
                    i = "transition WebkitTransition MozTransition OTransition msTransition KhtmlTransition".split(" ");
                for (t = 0; t < i.length; t++) if (e.createElement("div").style[i[t]] !== s) return i[t];
                return !1
            }, doCssTrans: function () {
                return !(!c.settings.useCSS || !this.supportTransition()) || void 0
            }, gesture: function () {
                var t, e, s, o, n, r, a = this, l = !1, c = !1, u = {}, p = {},
                    h = i("#swipebox-top-bar, #swipebox-bottom-bar"), f = i("#swipebox-slider");
                h.addClass("visible-bars"), a.setTimeout(), i("body").bind("touchstart", function (a) {
                    return i(this).addClass("touching"), t = i("#swipebox-slider .slide").index(i("#swipebox-slider .slide.current")), p = a.originalEvent.targetTouches[0], u.pageX = a.originalEvent.targetTouches[0].pageX, u.pageY = a.originalEvent.targetTouches[0].pageY, i("#swipebox-slider").css({
                        "-webkit-transform": "translate3d(" + m + "%, 0, 0)",
                        transform: "translate3d(" + m + "%, 0, 0)"
                    }), i(".touching").bind("touchmove", function (a) {
                        if (a.preventDefault(), a.stopPropagation(), p = a.originalEvent.targetTouches[0], !c && (n = s, s = p.pageY - u.pageY, Math.abs(s) >= 50 || l)) {
                            var h = .75 - Math.abs(s) / f.height();
                            f.css({top: s + "px"}), f.css({opacity: h}), l = !0
                        }
                        o = e, e = p.pageX - u.pageX, r = 100 * e / g, !c && !l && Math.abs(e) >= 10 && (i("#swipebox-slider").css({
                            "-webkit-transition": "",
                            transition: ""
                        }), c = !0), c && (e > 0 ? 0 === t ? i("#swipebox-overlay").addClass("leftSpringTouch") : (i("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch"), i("#swipebox-slider").css({
                            "-webkit-transform": "translate3d(" + (m + r) + "%, 0, 0)",
                            transform: "translate3d(" + (m + r) + "%, 0, 0)"
                        })) : 0 > e && (d.length === t + 1 ? i("#swipebox-overlay").addClass("rightSpringTouch") : (i("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch"), i("#swipebox-slider").css({
                            "-webkit-transform": "translate3d(" + (m + r) + "%, 0, 0)",
                            transform: "translate3d(" + (m + r) + "%, 0, 0)"
                        }))))
                    }), !1
                }).bind("touchend", function (t) {
                    if (t.preventDefault(), t.stopPropagation(), i("#swipebox-slider").css({
                        "-webkit-transition": "-webkit-transform 0.4s ease",
                        transition: "transform 0.4s ease"
                    }), s = p.pageY - u.pageY, e = p.pageX - u.pageX, r = 100 * e / g, l) if (l = !1, Math.abs(s) >= 100 && Math.abs(s) > Math.abs(n)) {
                        var d = s > 0 ? f.height() : -f.height();
                        f.animate({top: d + "px", opacity: 0}, 300, function () {
                            a.closeSlide()
                        })
                    } else f.animate({
                        top: 0,
                        opacity: 1
                    }, 300); else c ? (c = !1, e >= 10 && e >= o ? a.getPrev() : -10 >= e && o >= e && a.getNext()) : h.hasClass("visible-bars") ? (a.clearTimeout(), a.hideBars()) : (a.showBars(), a.setTimeout());
                    i("#swipebox-slider").css({
                        "-webkit-transform": "translate3d(" + m + "%, 0, 0)",
                        transform: "translate3d(" + m + "%, 0, 0)"
                    }), i("#swipebox-overlay").removeClass("leftSpringTouch").removeClass("rightSpringTouch"), i(".touching").off("touchmove").removeClass("touching")
                })
            }, setTimeout: function () {
                if (c.settings.hideBarsDelay > 0) {
                    var e = this;
                    e.clearTimeout(), e.timeout = t.setTimeout(function () {
                        e.hideBars()
                    }, c.settings.hideBarsDelay)
                }
            }, clearTimeout: function () {
                t.clearTimeout(this.timeout), this.timeout = null
            }, showBars: function () {
                var t = i("#swipebox-top-bar, #swipebox-bottom-bar");
                this.doCssTrans() ? t.addClass("visible-bars") : (i("#swipebox-top-bar").animate({top: 0}, 500), i("#swipebox-bottom-bar").animate({bottom: 0}, 500), setTimeout(function () {
                    t.addClass("visible-bars")
                }, 1e3))
            }, hideBars: function () {
                var t = i("#swipebox-top-bar, #swipebox-bottom-bar");
                this.doCssTrans() ? t.removeClass("visible-bars") : (i("#swipebox-top-bar").animate({top: "-50px"}, 500), i("#swipebox-bottom-bar").animate({bottom: "-50px"}, 500), setTimeout(function () {
                    t.removeClass("visible-bars")
                }, 1e3))
            }, animBars: function () {
                var t = this, e = i("#swipebox-top-bar, #swipebox-bottom-bar");
                e.addClass("visible-bars"), t.setTimeout(), i("#swipebox-slider").click(function () {
                    e.hasClass("visible-bars") || (t.showBars(), t.setTimeout())
                }), i("#swipebox-bottom-bar").hover(function () {
                    t.showBars(), e.addClass("visible-bars"), t.clearTimeout()
                }, function () {
                    c.settings.hideBarsDelay > 0 && (e.removeClass("visible-bars"), t.setTimeout())
                })
            }, keyboard: function () {
                var e = this;
                i(t).bind("keyup", function (t) {
                    t.preventDefault(), t.stopPropagation(), 37 === t.keyCode ? e.getPrev() : 39 === t.keyCode ? e.getNext() : 27 === t.keyCode && e.closeSlide()
                })
            }, actions: function () {
                var t = this, e = "touchend click";
                d.length < 2 ? (i("#swipebox-bottom-bar").hide(), s === d[1] && i("#swipebox-top-bar").hide()) : (i("#swipebox-prev").bind(e, function (e) {
                    e.preventDefault(), e.stopPropagation(), t.getPrev(), t.setTimeout()
                }), i("#swipebox-next").bind(e, function (e) {
                    e.preventDefault(), e.stopPropagation(), t.getNext(), t.setTimeout()
                })), i("#swipebox-close").bind(e, function () {
                    t.closeSlide()
                })
            }, setSlide: function (t, e) {
                e = e || !1;
                var s = i("#swipebox-slider");
                m = 100 * -t, this.doCssTrans() ? s.css({
                    "-webkit-transform": "translate3d(" + 100 * -t + "%, 0, 0)",
                    transform: "translate3d(" + 100 * -t + "%, 0, 0)"
                }) : s.animate({left: 100 * -t + "%"}), i("#swipebox-slider .slide").removeClass("current"), i("#swipebox-slider .slide").eq(t).addClass("current"), this.setTitle(t), e && s.fadeIn(), i("#swipebox-prev, #swipebox-next").removeClass("disabled"), 0 === t ? i("#swipebox-prev").addClass("disabled") : t === d.length - 1 && !0 !== c.settings.loopAtEnd && i("#swipebox-next").addClass("disabled")
            }, openSlide: function (e) {
                i("html").addClass("swipebox-html"), h ? (i("html").addClass("swipebox-touch"), c.settings.hideCloseButtonOnMobile && i("html").addClass("swipebox-no-close-button")) : i("html").addClass("swipebox-no-touch"), i(t).trigger("resize"), this.setSlide(e, !0)
            }, preloadMedia: function (t) {
                var e = this, i = null;
                d[t] !== s && (i = d[t].href), e.isVideo(i) ? e.openMedia(t) : setTimeout(function () {
                    e.openMedia(t)
                }, 1e3)
            }, openMedia: function (t) {
                var e, o, n = this;
                return d[t] !== s && (e = d[t].href), !(0 > t || t >= d.length) && (o = i("#swipebox-slider .slide").eq(t), void (n.isVideo(e) ? (o.html(n.getVideo(e)), c.settings.afterMedia && c.settings.afterMedia(t)) : (o.addClass("slide-loading"), n.loadMedia(e, function () {
                    o.removeClass("slide-loading"), o.html(this), c.settings.afterMedia && c.settings.afterMedia(t)
                }))))
            }, setTitle: function (t) {
                var e = null;
                i("#swipebox-title").empty(), d[t] !== s && (e = d[t].title), e ? (i("#swipebox-top-bar").show(), i("#swipebox-title").append(e)) : i("#swipebox-top-bar").hide()
            }, isVideo: function (t) {
                if (t) {
                    if (t.match(/(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || t.match(/vimeo\.com\/([0-9]*)/) || t.match(/youtu\.be\/([a-zA-Z0-9\-_]+)/)) return !0;
                    if (t.toLowerCase().indexOf("swipeboxvideo=1") >= 0) return !0
                }
            }, parseUri: function (t, s) {
                var o = e.createElement("a"), n = {};
                return o.href = decodeURIComponent(t), o.search && (n = JSON.parse('{"' + o.search.toLowerCase().replace("?", "").replace(/&/g, '","').replace(/=/g, '":"') + '"}')), i.isPlainObject(s) && (n = i.extend(n, s, c.settings.queryStringData)), i.map(n, function (t, e) {
                    return t && t > "" ? encodeURIComponent(e) + "=" + encodeURIComponent(t) : void 0
                }).join("&")
            }, getVideo: function (t) {
                var e = "",
                    i = t.match(/((?:www\.)?youtube\.com|(?:www\.)?youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/),
                    s = t.match(/(?:www\.)?youtu\.be\/([a-zA-Z0-9\-_]+)/),
                    o = t.match(/(?:www\.)?vimeo\.com\/([0-9]*)/), n = "";
                return i || s ? (s && (i = s), n = r.parseUri(t, {
                    autoplay: c.settings.autoplayVideos ? "1" : "0",
                    v: ""
                }), e = '<iframe width="560" height="315" src="//' + i[1] + "/embed/" + i[2] + "?" + n + '" frameborder="0" allowfullscreen></iframe>') : o ? (n = r.parseUri(t, {
                    autoplay: c.settings.autoplayVideos ? "1" : "0",
                    byline: "0",
                    portrait: "0",
                    color: c.settings.vimeoColor
                }), e = '<iframe width="560" height="315"  src="//player.vimeo.com/video/' + o[1] + "?" + n + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>') : e = '<iframe width="560" height="315" src="' + t + '" frameborder="0" allowfullscreen></iframe>', '<div class="swipebox-video-container" style="max-width:' + c.settings.videoMaxWidth + 'px"><div class="swipebox-video">' + e + "</div></div>"
            }, loadMedia: function (t, e) {
                if (0 === t.trim().indexOf("#")) e.call(i("<div>", {class: "swipebox-inline-container"}).append(i(t).clone().toggleClass(c.settings.toggleClassOnLoad))); else if (!this.isVideo(t)) {
                    var s = i("<img>").on("load", function () {
                        e.call(s)
                    });
                    s.attr("src", t)
                }
            }, getNext: function () {
                var t, e = this, s = i("#swipebox-slider .slide").index(i("#swipebox-slider .slide.current"));
                s + 1 < d.length ? (t = i("#swipebox-slider .slide").eq(s).contents().find("iframe").attr("src"), i("#swipebox-slider .slide").eq(s).contents().find("iframe").attr("src", t), s++, e.setSlide(s), e.preloadMedia(s + 1), c.settings.nextSlide && c.settings.nextSlide(s)) : !0 === c.settings.loopAtEnd ? (t = i("#swipebox-slider .slide").eq(s).contents().find("iframe").attr("src"), i("#swipebox-slider .slide").eq(s).contents().find("iframe").attr("src", t), s = 0, e.preloadMedia(s), e.setSlide(s), e.preloadMedia(s + 1), c.settings.nextSlide && c.settings.nextSlide(s)) : (i("#swipebox-overlay").addClass("rightSpring"), setTimeout(function () {
                    i("#swipebox-overlay").removeClass("rightSpring")
                }, 500))
            }, getPrev: function () {
                var t, e = i("#swipebox-slider .slide").index(i("#swipebox-slider .slide.current"));
                e > 0 ? (t = i("#swipebox-slider .slide").eq(e).contents().find("iframe").attr("src"), i("#swipebox-slider .slide").eq(e).contents().find("iframe").attr("src", t), e--, this.setSlide(e), this.preloadMedia(e - 1), c.settings.prevSlide && c.settings.prevSlide(e)) : (i("#swipebox-overlay").addClass("leftSpring"), setTimeout(function () {
                    i("#swipebox-overlay").removeClass("leftSpring")
                }, 500))
            }, nextSlide: function (t) {
            }, prevSlide: function (t) {
            }, closeSlide: function () {
                i("html").removeClass("swipebox-html"), i("html").removeClass("swipebox-touch"), i(t).trigger("resize"), this.destroy()
            }, destroy: function () {
                i(t).unbind("keyup"), i("body").unbind("touchstart"), i("body").unbind("touchmove"), i("body").unbind("touchend"), i("#swipebox-slider").unbind(), i("#swipebox-overlay").remove(), i.isArray(o) || o.removeData("_swipebox"), this.target && this.target.trigger("swipebox-destroy"), i.swipebox.isOpen = !1, c.settings.afterClose && c.settings.afterClose()
            }
        }, c.init()
    }, i.fn.swipebox = function (t) {
        if (!i.data(this, "_swipebox")) {
            var e = new i.swipebox(this, t);
            this.data("_swipebox", e)
        }
        return this.data("_swipebox")
    }
}(window, document, jQuery), function (t) {
    t.fn.wait = function (t, e) {
        return this.each(function () {
            window.setTimeout(function (t) {
                return function () {
                    e.call(t)
                }
            }(this), t)
        })
    };
    // jQuery("#cff-load-more").on("click", function(){
    //     console.log("srbija");
    //     setTimeout(function(){
    //         jQuery(".cff-img-attachments .cff-multi-image").removeAttr("style");
    //     }, 1000);
    // });
    var e = t(window), i = t(document), s = t("body"), o = e.scrollTop(), n = {
        is_sticky: !1,
        sticky_class: "is-sticky",
        sticky_after: 0,
        sticky_until: 0,
        sidebar_height: 0,
        footer_height: 0,
        document_height: 0,
        oldTop: 0,
        bottom: 0,
        init: function () {
            n.sticky_after = t("#header").height(), n.sidebar_height = t("#secondary").outerHeight(!0), n.footer_height = t("footer#colophon").height(), this.document_height = t(document).height(), this.oldTop = e.scrollTop(), this.bind(), e.on("load", function () {
                n.reinit(), n.update()
            })
        },
        bind: function () {
            e.on("scroll", function () {
                n.spy()
            }), e.on("resize", function () {
                n.update()
            })
        },
        spy: function () {
            o = t(window).scrollTop(), o !== n.oldTop && (this.oldTop = o, this.update()), this.bottom = this.document_height - o - this.sidebar_height - 96, this.bottom < this.footer_height ? s.addClass("is-sticky-bottom") : s.removeClass("is-sticky-bottom")
        },
        update: function () {
            o > this.sticky_after ? s.addClass(this.sticky_class) : s.removeClass(this.sticky_class)
        },
        reinit: function () {
            e = t(window), i = t(document), o = e.scrollTop(), this.sticky_after = t("#header").height(), this.sidebar_height = t("#secondary").outerHeight(!0), this.footer_height = t("footer#colophon").height(), this.document_height = i.height(), this.oldTop = e.scrollTop(), n.update()
        }
    };
    n.init(), s.on("click", ".mobile-menu-switch", function (t) {
        t.preventDefault(), s.toggleClass("mobile-menu-open")
    }), s.on("click", ".mobile-menu-overlay", function (t) {
        s.removeClass("mobile-menu-open")
    }), t("#sf-future-events-select").change(function () {
        var e = "";
        t("#sf-future-events-select option:selected").each(function () {
            e = t(this).attr("value")
        });
        var i = {action: "nhafala_future_events_select", select: e};
        t.post(ajax_var.url, i, function (e) {
            t("#sf-future-events-content").html(e)
        })
    }), t(".sf-event-legend").length && e.on("load", function () {
        t(".sf-event-legend").insertAfter(".fc-toolbar")
    });
    var r = {
        useCSS: !0,
        useSVG: !0,
        initialIndexOnArray: 0,
        hideCloseButtonOnMobile: !1,
        removeBarsOnMobile: !0,
        hideBarsDelay: 0,
        videoMaxWidth: 1140,
        beforeOpen: function () {
        },
        afterOpen: null,
        afterClose: function () {
        },
        loopAtEnd: !1
    };
    if (t(".gallery").length && t(".gallery a").swipebox(r), t(".ngg-galleryoverview").length && t(".ngg-gallery-thumbnail a").swipebox(r), t(".ngg-gallery-singlepic-image").length && t(".ngg-gallery-singlepic-image a").swipebox(r), t(".nhafala-login-message").length) {
        var a = t(".nhafala-login-message");
        t("<span/>", {}).text(a.attr("data-message")).appendTo(a), e.on("load", function () {
            a.addClass("in"), a.on("click", function () {
                a.addClass("out")
            }), a.wait(1 * a.attr("data-delay"), function () {
                a.addClass("out"), a.wait(1e3, function () {
                    a.addClass("hidden")
                })
            })
        })
    }
}(jQuery);



