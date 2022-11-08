<!doctype html>
<html lang="en-US">

<head>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="facebook-domain-verification" content="8og54uktfiunyf30jwlq7v7d6ley7u" />
    <meta name="facebook-domain-verification" content="8og54uktfiunyf30jwlq7v7d6ley7u" />
    <link rel="stylesheet" href="{{ url_assets('/herline/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{url_assets('/herline/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}"> --}}
    <link rel='stylesheet' href='{{ url_assets('/herline/css/settings.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ url_assets('/herline/css/swatches-and-photos.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' href='{{ url_assets('/herline/css/font-awesome.min.css') }}' type='text/css' media='all' />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap"
        rel="stylesheet" media="all">
    {{-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Montserrat%3A400%2C700&#038;' type='text/css' media='all'/> --}}
    <link rel='stylesheet' href='{{ url_assets('/herline/css/layout.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ url_assets('/herline/css/elegant-icon.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ url_assets('/herline/css/style.css?v=18') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ url_assets('/herline/css/shop.css?v=4') }}' type='text/css' media='all' />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


    <style>
        #footer-logo {
            width: 100px;
        }

        #header-desktop-logo {
            width: 120px;
        }

    </style>





    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SGKW164LWV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SGKW164LWV');
    </script>

    @section('style')
    @show

    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')
</head>
@include('clients._partials.pixel-events')

<body>

    <div id="alertCookiePolicy" class="alert-cookie-policy">
        <div class="alerto alert-secondary mb-0 d-flex align-items-center" role="alert">
            <div class="row">
                <div class="col-sm-12 cookieInfo">
                    <span class="mr-auto">Веб страната на Herline користи колачиња за да се осигура дека ќе го
                        добиете
                        најдоброто искуство на нашата веб страна. Прочитајте ја нашата политика на колачиња на следниот
                        <a href="/politika-na-kolacinja" class="alert-link cookieLink">линк</a>.</span>
                </div>
                <div class="col-sm-12 button-cookie">
                    <button id="btnAcceptCookiePolicy" class="btn align-center button-mar" data-dismiss="alert"
                        type="button" aria-label="Close">Се согласувам</button>
                    <button id="btnDeclineCookiePolicy" class="btn btn-light align-center" data-dismiss="alert"
                        type="button" aria-label="Close">Не се согласувам</button>
                </div>
            </div>
        </div>
    </div>
    @include('clients.herline.partials.mobile-header')
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v7.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="wrapper" class="wide-wrap">
        <div class="offcanvas-overlay"></div>
        @include('clients.herline.partials.header')
        @yield('content')
        @include('clients.herline.partials.footer')
    </div>

    <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery-migrate.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.themepunch.tools.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.themepunch.revolution.min.js') }}'>
    </script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/easing.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/imagesloaded.pkgd.min.js') }}'></script>
    <script type="text/javascript" src="{{ url_assets('/herline/plugins/bootstrap/dist/js/bootstrap.min.js') }}">
    </script>
    {{-- <script type="text/javascript" src="{{url_assets('/herline/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}">
	</script> --}}
    <script type='text/javascript' src='{{ url_assets('/herline/js/superfish-1.7.4.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.appear.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/script.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/swatches-and-photos.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.prettyPhoto.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.prettyPhoto.init.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.selectBox.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.parallax.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.touchSwipe.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.transit.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/jquery.carouFredSel.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/herline/js/isotope.pkgd.min.js') }}'></script>
    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')
    @section('scripts')
    @show
    <script>
        $(document).ready(function(){
            function cookiesPolicyPrompt() {
            if (!getCookie('cookies')) {
                $("#alertCookiePolicy").show();
            }
            $('#btnAcceptCookiePolicy').on('click', function() {
                $("#alertCookiePolicy").hide("slow");
                setCookie('cookies', '1', 7)
            });
            $('#btnDeclineCookiePolicy').on('click', function() {
                $("#alertCookiePolicy").hide("slow");
                setCookie('cookies', '1', 7)
            });
            }
    
            $(document).ready(function() {
                cookiesPolicyPrompt();
            });
    
            function setCookie(name, value, minutes) {
            var expires = "";
            if (minutes) {
                var date = new Date();
                console.log(date.toUTCString());
                date.setTime(date.getTime() + minutes * 60 * 1000);
                console.log(date.toUTCString());
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }
    
            function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
            }
    
            function eraseCookie(name) {
                document.cookie = name + '=; Max-Age=-99999999;';
            }
        });
    </script>
</body>

</html>
