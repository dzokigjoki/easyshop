<!DOCTYPE html>
    <html>
        <head>
            <!-- Basic Page Needs
            ================================================== -->
            <meta charset="utf-8">
            <title>Homepages 1</title>
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- Mobile Specific Metas
            ================================================== -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <!-- Favicon
            ================================================== -->	
            {{-- <link rel="shortcut icon" href="favicon.png" /> --}}
            <!-- Font
        ================================================== -->
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/fonts/linearicons/style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/css/poppins-font.css')}}">
            <!-- CSS   
        ================================================== -->
            <!-- Bootrap -->
            <link rel="stylesheet" href="{{ url_assets('/shop/vendor/bootrap/css/bootstrap.min.css')}}"/>
            <!-- Owl Carousel 2 -->
            <link rel="stylesheet" href="{{ url_assets('/shop/vendor/owl/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{ url_assets('/shop/vendor/owl/css/owl.theme.default.min.css')}}">
            <link rel="stylesheet" href="{{ url_assets('/shop/vendor/owl/css/animate.css')}}">
            <!-- Slider Revolution CSS Files -->
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/vendor/revolution/css/settings.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/vendor/revolution/css/layers.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/vendor/revolution/css/navigation.css')}}">
            <!-- fancybox-master Library -->
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/vendor/fancybox-master/css/jquery.fancybox.min.css')}}">
            <!-- Audio Library-->
            <link rel="stylesheet" href="{{ url_assets('/shop/vendor/mejs/mediaelementplayer.css')}}">
            <!-- noUiSlider Library -->
            <link rel="stylesheet" type="text/css" href="{{ url_assets('/shop/vendor/nouislider/css/nouislider.css')}}">
            <!-- Main Style Css -->
            <link rel="stylesheet" href="{{ url_assets('/shop/css/style.min.css')}}"/>
        </head>

        <body class="homepages-1">
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

            @include('clients.shop.partials.header')
            @yield('content')
            @include('clients.shop.partials.footer')
 

        <a href="#" id="back-to-top"></a>
	<!--  JS  -->
	<!-- Jquery -->
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="{{ url_assets('/shop/vendor/bootrap/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints Library -->
	<script src="{{ url_assets('/shop/js/jquery.waypoints.min.js')}}"></script>
	<!-- Owl Carousel 2 -->
  	<script src="{{ url_assets('/shop/vendor/owl/js/owl.carousel.min.js')}}"></script>
  	<script src="{{ url_assets('/shop/vendor/owl/js/OwlCarousel2Thumbs.min.js')}}"></script>
  	<!-- Slider Revolution core JavaScript files -->
    <script src="{{ url_assets('/shop/vendor/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ url_assets('/shop/vendor/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- Isotope Library-->
	<script type="text/javascript" src="{{ url_assets('/shop/js/isotope.pkgd.min.js')}}"></script>
	<script src="{{ url_assets('/shop/js/imagesloaded.pkgd.min.js')}}"></script>
	<!-- Masonry Library -->
	<script type="text/javascript" src="{{ url_assets('/shop/js/jquery.masonry.min.js')}}"></script>
	<script type="text/javascript" src="{{ url_assets('/shop/js/masonry.pkgd.min.js')}}"></script>
	<!-- fancybox-master Library -->
	<script type="text/javascript" src="{{ url_assets('/shop/vendor/fancybox-master/js/jquery.fancybox.min.js')}}"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
	<script src="{{ url_assets('/shop/js/theme-map.js')}}"></script>
	<!-- Countdown Library -->
	<script src="{{ url_assets('/shop/vendor/countdown/jquery.countdown.min.js')}}"></script>
	<!-- Audio Library-->
	<script src="{{ url_assets('/shop/vendor/mejs/mediaelement-and-player.min.js')}}"></script>
	<!-- noUiSlider Library -->
	<script type="text/javascript" src="{{ url_assets('/shop/vendor/nouislider/js/nouislider.js')}}"></script>
	<!-- Form -->
    <script src="{{ url_assets('/shop/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script src="{{ url_assets('/shop/js/config-contact.js')}}"></script>
	<!-- Main Js -->
    <script src="{{ url_assets('/shop/js/custom.js')}}"></script>
</body>
</html>