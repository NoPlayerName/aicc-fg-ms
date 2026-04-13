// !(function (s) {
//     "use strict";
//     function t(e) {
//         1 == s("#light-mode-switch").prop("checked") &&
//         "light-mode-switch" === e
//             ? (s("#dark-mode-switch").prop("checked", !1),
//               s("#rtl-mode-switch").prop("checked", !1),
//               s("#bootstrap-style").attr(
//                   "href",
//                   "assets/css/bootstrap.min.css"
//               ),
//               s("#app-style").attr("href", "assets/css/app.min.css"),
//               sessionStorage.setItem("is_visited", "light-mode-switch"))
//             : 1 == s("#dark-mode-switch").prop("checked") &&
//               "dark-mode-switch" === e
//             ? (s("#light-mode-switch").prop("checked", !1),
//               s("#rtl-mode-switch").prop("checked", !1),
//               s("#bootstrap-style").attr(
//                   "href",
//                   "assets/css/bootstrap-dark.min.css"
//               ),
//               s("#app-style").attr("href", "assets/css/app-dark.min.css"),
//               sessionStorage.setItem("is_visited", "dark-mode-switch"))
//             : 1 == s("#rtl-mode-switch").prop("checked") &&
//               "rtl-mode-switch" === e &&
//               (s("#light-mode-switch").prop("checked", !1),
//               s("#dark-mode-switch").prop("checked", !1),
//               s("#bootstrap-style").attr(
//                   "href",
//                   "assets/css/bootstrap.min.css"
//               ),
//               s("#app-style").attr("href", "assets/css/app-rtl.min.css"),
//               sessionStorage.setItem("is_visited", "rtl-mode-switch"));
//     }
//     function e() {
//         document.webkitIsFullScreen ||
//             document.mozFullScreen ||
//             document.msFullscreenElement ||
//             (console.log("pressed"),
//             s("body").removeClass("fullscreen-enable"));
//     }
//     var n;
//     s("#side-menu").metisMenu(),
//         s("#vertical-menu-btn").on("click", function (e) {
//             e.preventDefault(),
//                 s("body").toggleClass("sidebar-enable"),
//                 992 <= s(window).width()
//                     ? s("body").toggleClass("vertical-collpsed")
//                     : s("body").removeClass("vertical-collpsed");
//         }),
//         s("body,html").click(function (e) {
//             var t = s("#vertical-menu-btn");
//             t.is(e.target) ||
//                 0 !== t.has(e.target).length ||
//                 e.target.closest("div.vertical-menu") ||
//                 s("body").removeClass("sidebar-enable");
//         }),
//         s("#sidebar-menu a").each(function () {
//             var e = window.location.href.split(/[?#]/)[0];
//             this.href == e &&
//                 (s(this).addClass("active"),
//                 s(this).parent().addClass("mm-active"),
//                 s(this).parent().parent().addClass("mm-show"),
//                 s(this).parent().parent().prev().addClass("mm-active"),
//                 s(this).parent().parent().parent().addClass("mm-active"),
//                 s(this).parent().parent().parent().parent().addClass("mm-show"),
//                 s(this)
//                     .parent()
//                     .parent()
//                     .parent()
//                     .parent()
//                     .parent()
//                     .addClass("mm-active"));
//         }),
//         s(".navbar-nav a").each(function () {
//             var e = window.location.href.split(/[?#]/)[0];
//             this.href == e &&
//                 (s(this).addClass("active"),
//                 s(this).parent().addClass("active"),
//                 s(this).parent().parent().addClass("active"),
//                 s(this).parent().parent().parent().addClass("active"),
//                 s(this).parent().parent().parent().parent().addClass("active"),
//                 s(this)
//                     .parent()
//                     .parent()
//                     .parent()
//                     .parent()
//                     .parent()
//                     .addClass("active"));
//         }),
//         s('[data-toggle="fullscreen"]').on("click", function (e) {
//             e.preventDefault(),
//                 s("body").toggleClass("fullscreen-enable"),
//                 document.fullscreenElement ||
//                 document.mozFullScreenElement ||
//                 document.webkitFullscreenElement
//                     ? document.cancelFullScreen
//                         ? document.cancelFullScreen()
//                         : document.mozCancelFullScreen
//                         ? document.mozCancelFullScreen()
//                         : document.webkitCancelFullScreen &&
//                           document.webkitCancelFullScreen()
//                     : document.documentElement.requestFullscreen
//                     ? document.documentElement.requestFullscreen()
//                     : document.documentElement.mozRequestFullScreen
//                     ? document.documentElement.mozRequestFullScreen()
//                     : document.documentElement.webkitRequestFullscreen &&
//                       document.documentElement.webkitRequestFullscreen(
//                           Element.ALLOW_KEYBOARD_INPUT
//                       );
//         }),
//         document.addEventListener("fullscreenchange", e),
//         document.addEventListener("webkitfullscreenchange", e),
//         document.addEventListener("mozfullscreenchange", e),
//         s(".right-bar-toggle").on("click", function (e) {
//             s("body").toggleClass("right-bar-enabled");
//         }),
//         s(document).on("click", "body", function (e) {
//             0 < s(e.target).closest(".right-bar-toggle, .right-bar").length ||
//                 s("body").removeClass("right-bar-enabled");
//         }),
//         s(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
//             return (
//                 s(this).next().hasClass("show") ||
//                     s(this)
//                         .parents(".dropdown-menu")
//                         .first()
//                         .find(".show")
//                         .removeClass("show"),
//                 s(this).next(".dropdown-menu").toggleClass("show"),
//                 !1
//             );
//         }),
//         s(function () {
//             s('[data-toggle="tooltip"]').tooltip();
//         }),
//         s(function () {
//             s('[data-toggle="popover"]').popover();
//         }),
//         window.sessionStorage &&
//             ((n = sessionStorage.getItem("is_visited"))
//                 ? (s(".right-bar input:checkbox").prop("checked", !1),
//                   s("#" + n).prop("checked", !0),
//                   t(n))
//                 : sessionStorage.setItem("is_visited", "light-mode-switch")),
//         s("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on(
//             "change",
//             function (e) {
//                 t(e.target.id);
//             }
//         ),
//         s(window).on("load", function () {
//             s("#status").fadeOut(), s("#preloader").delay(350).fadeOut("slow");
//         }),
//         Waves.init();
// })(jQuery);

!(function (s) {
    "use strict";

    function t(e) {
        if (
            1 == s("#light-mode-switch").prop("checked") &&
            e === "light-mode-switch"
        ) {
            s("#dark-mode-switch").prop("checked", !1);
            s("#rtl-mode-switch").prop("checked", !1);
            s("#bootstrap-style").attr("href", "assets/css/bootstrap.min.css");
            s("#app-style").attr("href", "assets/css/app.min.css");
            sessionStorage.setItem("is_visited", "light-mode-switch");
        } else if (
            1 == s("#dark-mode-switch").prop("checked") &&
            e === "dark-mode-switch"
        ) {
            s("#light-mode-switch").prop("checked", !1);
            s("#rtl-mode-switch").prop("checked", !1);
            s("#bootstrap-style").attr(
                "href",
                "assets/css/bootstrap-dark.min.css"
            );
            s("#app-style").attr("href", "assets/css/app-dark.min.css");
            sessionStorage.setItem("is_visited", "dark-mode-switch");
        } else if (
            1 == s("#rtl-mode-switch").prop("checked") &&
            e === "rtl-mode-switch"
        ) {
            s("#light-mode-switch").prop("checked", !1);
            s("#dark-mode-switch").prop("checked", !1);
            s("#bootstrap-style").attr("href", "assets/css/bootstrap.min.css");
            s("#app-style").attr("href", "assets/css/app-rtl.min.css");
            sessionStorage.setItem("is_visited", "rtl-mode-switch");
        }
    }

    function e() {
        if (
            !document.webkitIsFullScreen &&
            !document.mozFullScreen &&
            !document.msFullscreenElement
        ) {
            s("body").removeClass("fullscreen-enable");
        }
    }

    function initPlugins() {
        // MetisMenu
        if (s("#side-menu").length) s("#side-menu").metisMenu();

        // Tooltip & Popover
        s('[data-toggle="tooltip"]').tooltip();
        s('[data-toggle="popover"]').popover();

        // Waves
        if (window.Waves) Waves.init();

        // Mode Switch
        if (window.sessionStorage) {
            let n = sessionStorage.getItem("is_visited") || "light-mode-switch";
            s(".right-bar input:checkbox").prop("checked", !1);
            s("#" + n).prop("checked", true);
            t(n);
        }

        // Custom File Input
        if (window.bsCustomFileInput) bsCustomFileInput.init();
    }

    function attachEvents() {
        // Sidebar toggle
        s("#vertical-menu-btn")
            .off("click")
            .on("click", function (e) {
                e.preventDefault();
                s("body").toggleClass("sidebar-enable");
                if (s(window).width() >= 992) {
                    s("body").toggleClass("vertical-collpsed");
                } else {
                    s("body").removeClass("vertical-collpsed");
                }
            });

        s("body,html")
            .off("click")
            .on("click", function (e) {
                let t = s("#vertical-menu-btn");
                if (
                    !t.is(e.target) &&
                    t.has(e.target).length === 0 &&
                    !e.target.closest("div.vertical-menu")
                ) {
                    s("body").removeClass("sidebar-enable");
                }
            });

        // Right bar toggle
        s(".right-bar-toggle")
            .off("click")
            .on("click", function () {
                s("body").toggleClass("right-bar-enabled");
            });
        s(document)
            .off("click.body")
            .on("click.body", "body", function (e) {
                if (
                    s(e.target).closest(".right-bar-toggle, .right-bar")
                        .length === 0
                ) {
                    s("body").removeClass("right-bar-enabled");
                }
            });

        // Dropdown toggle
        s(".dropdown-menu a.dropdown-toggle")
            .off("click")
            .on("click", function () {
                if (!s(this).next().hasClass("show")) {
                    s(this)
                        .parents(".dropdown-menu")
                        .first()
                        .find(".show")
                        .removeClass("show");
                }
                s(this).next(".dropdown-menu").toggleClass("show");
                return false;
            });

        // Mode switch checkboxes
        s("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch")
            .off("change")
            .on("change", function (e) {
                t(e.target.id);
            });

        // Fullscreen
        s('[data-toggle="fullscreen"]')
            .off("click")
            .on("click", function (e) {
                e.preventDefault();
                s("body").toggleClass("fullscreen-enable");
                if (
                    !document.fullscreenElement &&
                    !document.mozFullScreenElement &&
                    !document.webkitFullscreenElement
                ) {
                    if (document.documentElement.requestFullscreen)
                        document.documentElement.requestFullscreen();
                    else if (document.documentElement.mozRequestFullScreen)
                        document.documentElement.mozRequestFullScreen();
                    else if (document.documentElement.webkitRequestFullscreen)
                        document.documentElement.webkitRequestFullscreen(
                            Element.ALLOW_KEYBOARD_INPUT
                        );
                } else {
                    if (document.cancelFullScreen) document.cancelFullScreen();
                    else if (document.mozCancelFullScreen)
                        document.mozCancelFullScreen();
                    else if (document.webkitCancelFullScreen)
                        document.webkitCancelFullScreen();
                }
            });

        // Fullscreen change events
        document.removeEventListener("fullscreenchange", e);
        document.removeEventListener("webkitfullscreenchange", e);
        document.removeEventListener("mozfullscreenchange", e);
        document.addEventListener("fullscreenchange", e);
        document.addEventListener("webkitfullscreenchange", e);
        document.addEventListener("mozfullscreenchange", e);
    }

    // Jalankan saat page load awal
    s(function () {
        initPlugins();
        attachEvents();
    });

    // Jalankan ulang setiap Livewire navigate
    s(document).on("livewire:navigated", function () {
        initPlugins();
        attachEvents();
    });
})(jQuery);
