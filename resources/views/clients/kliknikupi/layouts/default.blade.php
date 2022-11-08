<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{--<title>Klikni Kupi</title>--}}
    <meta name="keywords" content="">
    <meta name="description" content="Klikni Kupi">
    <meta name="author" content="Smartsoft Media DOO Skopje">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">


    @include('clients._partials.meta')

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="/assets/kliknikupi/css/magnific-popup.css">

    {{-- Favicon --}}
    @include('clients._partials.favicon')
    <link rel="stylesheet" href="/assets/kliknikupi/external/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/kliknikupi/external/slick/slick.min.css">
    <!-- Ke treba mislam da se brisat -->
    <link rel="stylesheet" href="/assets/kliknikupi/external/magnific-popup/magnific-popup.css">
    <!-- End of Ke treba mislam da se brisat -->
    <link rel="stylesheet" href="/assets/kliknikupi/css/template.css?<?php echo filemtime('./assets/kliknikupi/css/template.css'); ?>">
    <link rel="stylesheet" href="/assets/kliknikupi/css/footer-dark.css">
    <link rel="stylesheet" href="/assets/kliknikupi/font/icont-fonts.min.css">
    @include('clients._partials.global-styles')

    <!-- Facebook Pixel Code -->
    @include('clients._partials.pixel-init')
    <!-- End Facebook Pixel Code -->
</head>
@include('clients._partials.pixel-events')
{{--<script type="text/javascript">--}}
    {{--(function (d, s, id) {--}}
        {{--var z = d.createElement(s);--}}
        {{--z.type = "text/javascript";--}}
        {{--z.id = id;--}}
        {{--z.async = true;--}}
        {{--z.src = "//static.zotabox.com/b/a/bac4087485e0a2fc84d948749cf293fa/widgets.js";--}}
        {{--var sz = d.getElementsByTagName(s)[0];--}}
        {{--sz.parentNode.insertBefore(z, sz)--}}
    {{--}(document, "script", "zb-embed-code"));--}}
{{--</script>--}}
<body>
{{--<div id="fb-root"></div>--}}
{{--<script>(function(d, s, id) {--}}
        {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
        {{--if (d.getElementById(id)) return;--}}
        {{--js = d.createElement(s); js.id = id;--}}
        {{--js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=479685768857527';--}}
        {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}
{{--Header--}}
@include('clients.kliknikupi.partials.header')
{{--End header--}}
<!-- Content -->
<div id="pageContent">
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    @yield('content')
</div>
{{--End content--}}


{{--Footer--}}
@include('clients.kliknikupi.partials.footer')
{{--End footer--}}


{{--Scripts--}}
<script src="/assets/kliknikupi/external/jquery/jquery-2.1.4.min.js"></script>
<script src="/assets/kliknikupi/external/bootstrap/bootstrap.min.js"></script>
<script src="/assets/kliknikupi/external/countdown/jquery.plugin.min.js"></script>
<script src="/assets/kliknikupi/external/countdown/jquery.countdown.min.js"></script>
<script src="/assets/kliknikupi/external/isotope/isotope.pkgd.min.js"></script>
<script src="/assets/kliknikupi/external/slick/slick.min.js"></script>

<!-- Ke treba mislam da se brisat prvite dve -->
<script src="/assets/kliknikupi/external/elevatezoom/jquery.elevatezoom.js"></script>
<script src="/assets/kliknikupi/external/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/assets/kliknikupi/external/nouislider/nouislider.min.js"></script>
<!-- End of Ke treba mislam da se brisat prvite dve -->

<script src="/assets/kliknikupi/external/panelmenu/panelmenu.js"></script>
<script src="/assets/kliknikupi/js/quick-view.js"></script>
<script src="/assets/kliknikupi/js/main.js?<?php echo filemtime('./assets/kliknikupi/js/main.js'); ?>"></script>
<!-- Magnific Popup core JS file -->
<script src="/assets/kliknikupi/js/jquery.magnific-popup.js"></script>
@include('clients._partials.es-object')
@include('clients._partials.global-scripts')

<script>

function createSlick() {

    if ($('#smallGallery').length) {
        $('#smallGallery').not('.slick-initialized').slick({
            autoplay: true,
            autoplaySpeed: 2000
        });
    }

    if ($('#banner-slider').length) {
        $('#banner-slider').not('.slick-initialized').slick({
            autoplay: true,
            autoplaySpeed: 2000
        });
    }
    if ($('#productSlider').length) {
        $('#productSlider').not('.slick-initialized').slick({
            autoplay: true,
            autoplaySpeed: 1000,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        autoplay: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        autoplay: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        autoplay: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        autoplay: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    }
    if ($('#productSlider1').length) {
        $('#productSlider1').not('.slick-initialized').slick({
            autoplay: true,
            autoplaySpeed: 1000,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        autoplay: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        autoplay: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        autoplay: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        autoplay: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });


    }

        $('#gallery-slick').slick({
            // autoplay: true,
            // autoplaySpeed: 1000,
            slidesToShow: 5,
            slidesToScroll: 1
        });







        }
$(window).on( 'resize', createSlick );
</script>
<script>
    $('#cart-hover').hover(function(){
        $( this ).addClass('open');
    }, function() {
        $( this ).removeClass('open');
    });
</script>
<script async src="//static.zotabox.com/c/7/c72dd63207eb8842edc8f891fcea7df1/widgets.js"></script>

@section('scripts')
@show
</body>
</html>

