<!DOCTYPE html>
<html lang="en">
<head>

    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">
    <!--===============================================================================================-->
    {{--<link rel="icon" type="image/png" href="/assets/clientsimages/icons/favicon.png"/>--}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/lightbox.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/settings.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/util.css?v=3') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/bloomtea/css/main.css?v=15') }}">
    @include('clients._partials.global-styles')
    <!--===============================================================================================-->
    @include('clients._partials.pixel-init')
</head>
    @include('clients._partials.pixel-events')
<body class="animsition">

<!-- Header -->

@include('clients.bloomtea.partials.header')
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Slider -->
@yield('content')
<!-- Footer -->

@include('clients.bloomtea.partials.footer')

<!-- Back to top -->
{{--<div class="btn-back-to-top bg0-hov" id="myBtn">--}}
		{{--<span class="symbol-btn-back-to-top">--}}
			{{--<span class="lnr lnr-chevron-up"></span>--}}
		{{--</span>--}}
{{--</div>--}}



<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/popper.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/bootstrap.min.js') }}"></script>
<!--=========/======================================================================================-->
<script src="{{ url_assets('/bloomtea/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/jquery.themepunch.revolution.min.js') }}"></script>

<script src="{{ url_assets('/bloomtea/js/revolution.extension.video.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.actions.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.migration.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/revolution.extension.parallax.min.js') }}"></script>

<script src="{{ url_assets('/bloomtea/js/revo-custom.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/moment.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/slick.min.js') }}"></script>
<script src="{{ url_assets('/bloomtea/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/parallax100.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/lightbox.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/sweetalert.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/perfect-scrollbar.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ url_assets('/bloomtea/js/main.js?v=1') }}"></script>
{{--<script>--}}
    {{--$(document).ready(function(){--}}
        {{--$("#rev_slider_3").revolution({--}}

        {{--});--}}



    {{--})--}}
{{--</script>--}}
@include('clients._partials.es-object')
@include('clients._partials.global-scripts')

</body>
</html>