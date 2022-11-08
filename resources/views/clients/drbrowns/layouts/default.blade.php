<html lang="en-US">
<head>
    <!-- META TAGS -->
    <meta charset="UTF-8">
@include('clients._partials.meta')
@include('clients._partials.favicon')

<!-- Define a viewport to mobile devices to use - telling the browser to assume that the page is as wide as the device (width=device-width) and setting the initial page zoom level to be 1 (initial-scale=1.0) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no" />

    <title>Почетна</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">

    <!--<link rel='stylesheet' id='google-open-sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C700italic%2C800italic%2C400%2C300%2C600%2C700%2C800&#038;subset=latin%2Ccyrillic-ext%2Cgreek-ext%2Cgreek%2Cvietnamese%2Clatin-ext%2Ccyrillic&#038;ver=4.4' type='text/css' media='all' />-->
    <link rel='stylesheet' id='google-lily-script-one-css'  href='https://fonts.googleapis.com/css?family=Lily+Script+One&#038;subset=latin%2Clatin-ext&#038;ver=4.4' type='text/css' media='all' />
    <link rel='stylesheet' id='google-Leckerli-one-css'  href='https://fonts.googleapis.com/css?family=Leckerli+One&#038;ver=4.4' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet' id='woocommerce-layout-css'  href='{{ url_assets('/drbrowns/css/woocommerce-layout.css?ver=2.4.12') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='{{ url_assets('/drbrowns/css/woocommerce-smallscreen.css?ver=2.4.12') }}' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'  href='{{ url_assets('/drbrowns/css/woocommerce.css?ver=2.4.17') }}' type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url_assets('/drbrowns/js/magnific-popup/magnific-popup.css') }}">
    <!-- Roboto -->

    <link rel='stylesheet' id='bootstrap-css'  href='{{ url_assets('/drbrowns/css/bootstrap.css?ver=1.3.1') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='flexslider-css'  href='{{ url_assets('/drbrowns/js/flexslider/flexslider.css?ver=2.2.0') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-css'  href='{{ url_assets('/drbrowns/js/carousel/owl.carousel.css?ver=1.24') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css'  href='{{ url_assets('/drbrowns/css/font-awesome.css?ver=4.0.3') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='selectric-css'  href='{{ url_assets('/drbrowns/css/selectric.css?ver=1.0') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='image-light-box-css-css'  href='{{ url_assets('/drbrowns/js/image-lightbox/image-light-box.css?ver=1.0') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='meanmenu-css'  href='{{ url_assets('/drbrowns/css/meanmenu.css?ver=2.0.6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-tables-css'  href='{{ url_assets('/drbrowns/css/responsive-tables.css?ver=2.1.4') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='animate-css'  href='{{ url_assets('/drbrowns/css/animate.css?ver=1.0') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='main-css'  href='{{ url_assets('/drbrowns/css/main.css?v=6') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='parent-custom-css'  href='{{ url_assets('/drbrowns/css/custom.css?v=3') }}' type='text/css' media='all' />
    @include('clients._partials.global-styles')
    @include('clients._partials.pixel-init')
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    {{-- <script src="{{ url_assets('/drbrowns/js/respond.min.js') }}"></script> --}}
    <![endif]-->
    @include('clients._partials.pixel-events')
</head>

<body class="single single-product postid-292 woocommerce woocommerce-page">

    <div id="alertCookiePolicy" class="alert-cookie-policy">
        <div class="alerto alert-secondary mb-0 d-flex align-items-center" role="alert">
            <div class="row">
                <div class="col-sm-12 cookieInfo">
                    <span class="mr-auto">Веб страната на Dr.Browns користи колачиња за да се осигура дека ќе го
                        добиете
                        најдоброто искуство на нашата веб страна. Прочитајте ја нашата политика на колачиња на следниот
                        <a href="/politika-na-kolacinja" class="alert-link cookieLink">линк</a>.</span>
                </div>
                <div class="col-sm-12 button-cookie">
                    <button id="btnAcceptCookiePolicy" class="btn btn-primary align-center button-mar" data-dismiss="alert"
                        type="button" aria-label="Close">Се согласувам</button>
                    <button id="btnDeclineCookiePolicy" class="btn btn-light align-center" data-dismiss="alert"
                        type="button" aria-label="Close">Не се согласувам</button>
                </div>
            </div>
        </div>
    </div>

@include('clients.drbrowns.partials.header')
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@yield('content')
@include('clients.drbrowns.partials.footer')
<script type='text/javascript' id='quick-js'>

</script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.js?ver=1.11.3') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery-migrate.js?ver=1.2.1') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/modernizr.custom.js?ver=2.6.2') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/bootstrap.js?ver=3.0.3') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/flexslider/jquery.flexslider-min.js?ver=2.2.2') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/carousel/owl.carousel.min.js?ver=1.31') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.appear.js?ver=0.3.3') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.hoverdir.js?ver=1.0') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/image-lightbox/imagelightbox.js?ver=1.0') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.isotope.min.js?ver=2.0') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.validate.min.js?ver=1.11.1') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.selectric.min.js?ver=1.7.0') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.transit.js?ver=0.9.9') }}'></script>
<script type='text/javascript' src="{{ url_assets('/drbrowns/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/jquery.meanmenu.min.js?ver=2.0.6') }}'></script>
<script type='text/javascript' src='{{ url_assets('/drbrowns/js/custom.js?ver=1.3.1') }}'></script>
@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }

    if ($('.zoomGalleryActive').length) {
        $('.zoomGalleryActive').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            closeOnContentClick: true,
            callbacks: {
                imageLoadComplete: function () {
                    // fires when image in current popup finished loading
                    // avaiable since v0.9.0
                    console.log('Image loaded');
                },

            }
        });
    }
</script>
<script>
    $(document).ready(function(){
        // console.log( $(".search-top-button"));
        $(".search-button").click(function(){
            $('#fokus').focus();
        });
    });
</script>
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