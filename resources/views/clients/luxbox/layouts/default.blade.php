<!DOCTYPE html>
<html>

<head>
    @include('clients._partials.meta')

    <!-- Basic Page Needs
  
 ================================================== -->
    <meta charset="utf-8">
    {{-- <title>Homepages 6</title> --}}
    {{-- <meta name="description" content=""> --}}
    {{-- <meta name="author" content=""> --}}
    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Favicon
  ================================================== -->
    <link rel="shortcut icon" href="favicon.png" />
    <!-- Font
  ================================================== -->
    <link rel="stylesheet" type="text/css"
        href="{{ url_assets('/luxbox/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css?v=1') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700&display=swap&subset=cyrillic-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/fonts/linearicons/style.css?v=7') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/css/poppins-font.css') }}">
    <!-- CSS   
  ================================================== -->
    <!-- Bootrap -->

    <link rel="stylesheet" href="{{ url_assets('/luxbox/vendor/bootrap/css/bootstrap.min.css?v=3') }}" />
    <!-- Owl Carousel 2 -->
    <link rel="stylesheet" href="{{ url_assets('/luxbox/vendor/owl/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/luxbox/vendor/owl/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/luxbox/vendor/owl/css/animate.css') }}">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/vendor/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/vendor/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/vendor/revolution/css/navigation.css') }}">
    <!-- fancybox-master Library -->
    <link rel="stylesheet" type="text/css"
        href="{{ url_assets('/luxbox/vendor/fancybox-master/css/jquery.fancybox.min.css') }}">
    <!-- Audio Library-->
    <link rel="stylesheet" href="{{ url_assets('/luxbox/vendor/mejs/mediaelementplayer.css') }}">
    <!-- noUiSlider Library -->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/vendor/nouislider/css/nouislider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/css/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/luxbox/css/slick/slick-theme.css') }}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ url_assets('/luxbox/css/style.css?v=19') }}" />

    @include('clients._partials.global-styles')
    @include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')

<body class="homepages-6">
    <!-- Images Loader -->
    <div class="images-preloader">
        <div id="preloader_1" class="rectangle-bounce">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @include('clients.luxbox.partials.header')
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
    @yield('content')

    @include('clients.luxbox.partials.footer')
    @include('clients.luxbox.partials.bottom-menu')


    <a href="#" id="back-to-top"></a>
    <!--  JS  -->
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootrap -->
    <script src="{{ url_assets('/luxbox/vendor/bootrap/js/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel 2 -->
    <script src="{{ url_assets('/luxbox/vendor/owl/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url_assets('/luxbox/vendor/owl/js/OwlCarousel2Thumbs.min.js') }}"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{ url_assets('/luxbox/vendor/jquery.zoom.min.js') }}"></script>
    <!-- Slider Revolution core JavaScript files -->
    <script src="{{ url_assets('/luxbox/vendor/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ url_assets('/luxbox/vendor/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- Isotope Library-->
    <script type="text/javascript" src="{{ url_assets('/luxbox/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url_assets('/luxbox/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Masonry Library -->
    <script type="text/javascript" src="{{ url_assets('/luxbox/js/jquery.masonry.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/luxbox/js/masonry.pkgd.min.js') }}"></script>
    <!-- fancybox-master Library -->
    <script type="text/javascript" src="{{ url_assets('/luxbox/vendor/fancybox-master/js/jquery.fancybox.min.js') }}">
    </script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
    <script src="{{ url_assets('/luxbox/js/theme-map.js') }}"></script>
    <!-- Countdown Library -->
    <script src="{{ url_assets('/luxbox/vendor/countdown/jquery.countdown.min.js') }}"></script>
    <!-- Audio Library-->
    <script src="{{ url_assets('/luxbox/vendor/mejs/mediaelement-and-player.min.js') }}"></script>
    <!-- noUiSlider Library -->
    <script type="text/javascript" src="{{ url_assets('/luxbox/vendor/nouislider/js/nouislider.js') }}"></script>
    <!-- Form -->
    <script src="{{ url_assets('/luxbox/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <!-- <script src="{{ url_assets('/luxbox/js/config-contact.js') }}"></script> -->
    <!-- Main Js -->
    <script src="{{ url_assets('/luxbox/js/custom.js?v=1') }}"></script>
    <script type="text/javascript"
        src="{{ url_assets('/luxbox/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url_assets('/luxbox/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url_assets('/luxbox/vendor/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url_assets('/luxbox/vendor/slick/slick.min.js') }}">
    </script>





    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')
    @section('scripts')
    @show
    <script>
        $(document).ready(function() {
            $('.single-item').slick();
        });

      
    </script>
</body>

</html>
