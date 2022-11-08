<html lang="en">
<head>
@include('clients._partials.favicon')
@include('clients._partials.meta')
<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- External Plugins CSS -->
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/external/slick/slick.css?v=1') }}">
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/external/slick/slick-theme.css?v=1') }}">
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/external/magnific-popup/magnific-popup.css?v=1') }}">
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/external/nouislider/nouislider.css?v=1') }}">
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/external/bootstrap-select/bootstrap-select.css?v=1') }}">
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/js/easyzoom.css?v=1') }}"type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">
@include('clients._partials.global-styles')

    <!-- Custom CSS -->

    {{--<link rel="stylesheet" type="text/css" href="{{ url_assets('/') }}/assets/mojoulet/css/external/rs-plugin/css/settings.css" media="screen" />--}}
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/css/style.css?v=30') }}">
    <!-- Icon Fonts  -->
    <link rel="stylesheet" href="{{ url_assets('/mojoutlet/font/style.css?v=1') }}">

    {{-- @include('clients._partials.pixel-init') --}}

</head>
{{-- @include('clients._partials.pixel-events') --}}
<body>
<div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
<!-- /Back to top -->
@include('clients.shopathome.partials.header')
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
@include('clients.shopathome.partials.footer')
<input id="direct_buy" type="hidden" name="direct_buy" value="1">
<!-- External JS -->
<!-- jQuery 1.10.1-->
<script src="{{ url_assets('/mojoutlet/external/jquery/jquery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3-->
<script src="{{ url_assets('/mojoutlet/external/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/slick/slick.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/modernizr/modernizr.js') }}"></script>

<!-- Specific Page External Plugins -->
<script src="{{ url_assets('/mojoutlet/external/countdown/jquery.plugin.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/instafeed/instafeed.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/colorbox/jquery.colorbox-min.js') }}"></script>

<!-- Custom -->
<script src="{{ url_assets('/mojoutlet/external/elevatezoom/jquery.elevatezoom.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ url_assets('/mojoutlet/external/rs-plugin/css/settings.css') }}" media="screen" />


<script type="text/javascript" src="{{ url_assets('/mojoutlet/external/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ url_assets('/mojoutlet/external/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src='{{ url_assets('/mojoutlet/js/easyzoom.js') }}' type="text/javascript"></script><!-- product zoom -->
<script src="{{ url_assets('/mojoutlet/js/custom.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/js/js-index-02.js') }}"></script>
<script src="{{ url_assets('/mojoutlet/external/swiper/swiper.min.js') }}"></script>

@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
<script>
    $("#zoom_01").elevateZoom();

    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });



</script>
</body>
</html>