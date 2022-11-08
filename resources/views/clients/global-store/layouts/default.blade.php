<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
<head>

    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <!-- Fonts-->

    <link rel="stylesheet" href="/assets/global-store/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/ps-icon/style.css?v=10">
    <!-- CSS Library-->
    <link rel="stylesheet" href="/assets/global-store/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="/assets/global-store/plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="/assets/global-store/css/style.css">

    <link rel="stylesheet" type="text/css" href="/assets/global-store/slick-master/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/assets/global-store/slick-master/slick/slick-theme.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&amp;subset=cyrillic" rel="stylesheet">

    <link rel="stylesheet" href="/assets/global-store/magnify-master/dist/css/magnify.css">

    @include('clients._partials.global-styles')

    <!-- Facebook Pixel Code -->
    @include('clients._partials.pixel-init')

    @include('clients._partials.pixel-events')
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
<body class="ps-loading">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/mk_MK/sdk.js#xfbml=1&version=v3.0';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="header--sidebar"></div>

@include("clients.global-store.partials.header")

@yield('content')

@include("clients.global-store.partials.footer")
<input id="direct_buy" type="hidden" name="direct_buy" value="1">
<!-- JS Library-->
<script type="text/javascript" src="/assets/global-store/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/gmap3.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/imagesloaded.pkgd.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/slick/slick/slick.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/elevatezoom/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script><script type="text/javascript" src="/assets/global-store/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>

<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/assets/global-store/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<!-- Custom scripts-->
<script type="text/javascript" src="/assets/global-store/js/main.js"></script>

<script type="text/javascript" src="/assets/global-store/slick-master/slick/slick.min.js"></script>

<script src="/assets/global-store/magnify-master/dist/js/jquery.magnify.js"></script>

@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
@section('scripts')
@show
</body>

<script>

    $(document).ready(function(){

        $(".slider-cont").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000
        });

        $(".cat-img-cont").hover(function(){
            $(this).find(".orange-bg").fadeIn(300);
        },function(){
            $(this).find(".orange-bg").fadeOut(300);
        });

        $(".daily-promotion-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000

        });

        $(".related-products-slider").slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: false,
            infinite: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 950,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 426,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        if($(window).width()>1025) {
            $('.zoom').magnify({
                magnifiedWidth: 750,
                magnifiedHeight: 750
            });
        }

        $(".ps-product--detail .ps-product__preview .item img").on("click", function(){
            var pic = $(this).attr("src");
            console.log(pic);
            pic = pic.replace("md_", "lg_");
            console.log(pic);
            $(".ps-product--detail .ps-product__thumbnail--mobile .ps-product__main-img img").attr("src", pic);
            $(".ps-product--detail .ps-product__thumbnail--mobile .ps-product__main-img img").attr("data-magnify-src", pic);
            $(".ps-product__thumbnail--mobile .magnify-lens").css("background", "url("+pic+")");
        });

        $(".open-filters").on("click", function(){
            $(".ps-products-wrap .ps-sidebar").addClass("open");
        });

        $(".close-filters").on("click", function(){
            $(".ps-products-wrap .ps-sidebar").removeClass("open");
        });
    });


</script>
<script>
    $(document).ready(function(){
        // console.log( $(".search-top-button"));
        $(".search-top-button").click(function(){
            $('#searchModal').toggle();
            $('#fokus').focus();
        });
    });
</script>
</html>