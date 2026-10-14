<!doctype html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7ZTFLHV8G5"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-7ZTFLHV8G5');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Fontawesome all CSS -->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/css/fontawesome.min.css') }}" rel="stylesheet">
    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!-- BoxIcon CSS -->
    <link href="{{ asset('assets/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <!-- Title -->
    <title>@yield('title', 'Nerdtech Labs')</title>
    <link rel="icon" href="{{ asset('assets/img/letter.png') }}" type="image/png" sizes="20x20">
    <!-- Elfsight Free Badge Suppressor -->
    <script>
        (function() {
            // 1. Intercept XMLHttpRequest to rewrite Elfsight boot data before the widget initializes
            try {
                var origOpen = XMLHttpRequest.prototype.open;
                var origSend = XMLHttpRequest.prototype.send;

                XMLHttpRequest.prototype.open = function(method, url) {
                    this._isElfsight = typeof url === 'string' && (url.indexOf('elfsight') !== -1 || url.indexOf('/p/boot/') !== -1);
                    return origOpen.apply(this, arguments);
                };

                XMLHttpRequest.prototype.send = function() {
                    if (this._isElfsight) {
                        var xhr = this;
                        var cleanResponse = function() {
                            try {
                                var raw = xhr.responseText;
                                if (raw && raw.indexOf('display_free_link') !== -1) {
                                    var cleaned = raw
                                        .replace(/"display_free_link"\s*:\s*true/g, '"display_free_link":false')
                                        .replace(/"display_free_link_remove"\s*:\s*true/g, '"display_free_link_remove":false')
                                        .replace(/"display_elfsight_powered_by"\s*:\s*true/g, '"display_elfsight_powered_by":false')
                                        .replace(/"hide_elfsight_logo"\s*:\s*0/g, '"hide_elfsight_logo":1');

                                    Object.defineProperty(xhr, 'responseText', { get: function() { return cleaned; }, configurable: true });
                                    Object.defineProperty(xhr, 'response', { get: function() { return cleaned; }, configurable: true });
                                }
                            } catch(e) {}
                        };

                        xhr.addEventListener('readystatechange', function() {
                            if (xhr.readyState === 4) {
                                cleanResponse();
                            }
                        }, true);

                        var customOnload = null;
                        Object.defineProperty(xhr, 'onload', {
                            set: function(fn) { customOnload = fn; },
                            get: function() {
                                return function(ev) {
                                    cleanResponse();
                                    if (typeof customOnload === 'function') {
                                        return customOnload.call(this, ev);
                                    }
                                };
                            },
                            configurable: true
                        });
                    }
                    return origSend.apply(this, arguments);
                };
            } catch(e) {}

            // 2. Intercept attachShadow to continuously purge badges inside Shadow DOM
            try {
                var origAttachShadow = Element.prototype.attachShadow;
                Element.prototype.attachShadow = function(init) {
                    var shadow = origAttachShadow.call(this, init);

                    function cleanShadow() {
                        try {
                            var badges = shadow.querySelectorAll('a[href*="elfsight.com"], a[href*="free-widget"]');
                            badges.forEach(function(b) {
                                b.setAttribute('style', 'display:none!important;visibility:hidden!important;opacity:0!important;height:0!important;width:0!important;pointer-events:none!important;position:absolute!important;margin:0!important;padding:0!important;');
                                b.style.setProperty('display', 'none', 'important');
                                b.style.setProperty('visibility', 'hidden', 'important');
                            });

                            if (!shadow.querySelector('#elfsight-clean-style')) {
                                var st = document.createElement('style');
                                st.id = 'elfsight-clean-style';
                                st.textContent = 'a[href*="elfsight.com"], a[href*="free-widget"], .eapps-widget-branding { display: none !important; visibility: hidden !important; opacity: 0 !important; height: 0 !important; width: 0 !important; pointer-events: none !important; margin: 0 !important; padding: 0 !important; }';
                                shadow.appendChild(st);
                            }
                        } catch(e) {}
                    }

                    var shadowObserver = new MutationObserver(cleanShadow);
                    shadowObserver.observe(shadow, { childList: true, subtree: true, attributes: true, attributeFilter: ['style', 'class'] });

                    setTimeout(cleanShadow, 50);
                    setTimeout(cleanShadow, 200);
                    setTimeout(cleanShadow, 1000);

                    return shadow;
                };
            } catch(e) {}

            // 3. Recursive scanner across main DOM and all shadowRoots
            function deepPurge(root) {
                if (!root) return;
                try {
                    var badges = root.querySelectorAll('a[href*="elfsight.com"], a[href*="free-widget"]');
                    badges.forEach(function(b) {
                        b.setAttribute('style', 'display:none!important;visibility:hidden!important;opacity:0!important;height:0!important;width:0!important;pointer-events:none!important;position:absolute!important;margin:0!important;padding:0!important;');
                        b.style.setProperty('display', 'none', 'important');
                        b.style.setProperty('visibility', 'hidden', 'important');
                    });

                    var children = root.querySelectorAll('*');
                    for (var i = 0; i < children.length; i++) {
                        if (children[i].shadowRoot) {
                            deepPurge(children[i].shadowRoot);
                        }
                    }
                } catch(e) {}
            }

            var timer = setInterval(function() { deepPurge(document); }, 150);
            setTimeout(function() { clearInterval(timer); }, 15000);
            window.addEventListener('DOMContentLoaded', function() { deepPurge(document); });
            window.addEventListener('load', function() { deepPurge(document); });
        })();
    </script>
    @stack('css')
</head>

<body class="@yield('body_class', 'bg-dark-5 tt-magic-cursor')">
    <!-- Preloader Start -->
    <div class="preloader">
        <div id="particles-background" class="vertical-centered-box"></div>
        <div id="particles-foreground" class="vertical-centered-box"></div>
        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <img src="{{ asset('assets/img/letter.png') }}" alt="Nerdtech Labs" style="width: 80px; height: 80px;">
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    @include('layouts.partials.navbar')

    @yield('content')

    @include('layouts.partials.footer')

    <!--  Main jQuery  -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/simpleParallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @stack('js')
    <script>
        $(".marquee_text").marquee({
            direction: "left",
            duration: 40000,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true,
        });
    </script>
</body>
</html>
