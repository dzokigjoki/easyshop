<!doctype html>
<html lang="mk" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
<head>

{{-- Meta tags --}}
@include('clients._partials.meta')
    <link href="/assets/tehnopolis/css/bootstrap-new.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:300,400,700&amp;subset=cyrillic" rel="stylesheet">

    <!-- CSS Files -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/tehnopolis/css/owl.carousel.css" rel="stylesheet" />
    <link href="/assets/tehnopolis/css/style1.css?<?php echo filemtime('./assets/tehnopolis/css/style1.css'); ?>" rel="stylesheet" />
    <link href="/assets/tehnopolis/css/responsive1.css?v=112" rel="stylesheet" />
    <link href="/assets/tehnopolis/css/custom1.css?<?php echo filemtime('./assets/tehnopolis/css/custom1.css'); ?>" rel="stylesheet" />
    <link href="/assets/tehnopolis/css/toastr.min.css" rel="stylesheet" />
    <link href="/assets/tehnopolis/css/magnicif-popup.css" rel="stylesheet" />
    <link href="/assets/tehnopolis/css/swiper.min.css?v=9" rel="stylesheet">


@include('clients._partials.global-styles')

<!-- Facebook Pixel Code -->
@include('clients._partials.pixel-init')
<!-- End Facebook Pixel Code -->
</head>
@include('clients._partials.pixel-events')
<script type="text/javascript">
    (function (d, s, id) {
        var z = d.createElement(s);
        z.type = "text/javascript";
        z.id = id;
        z.async = true;
        z.src = "//static.zotabox.com/d/f/dfdf9d088a13f049012ca3ebbd955d57/widgets.js";
        var sz = d.getElementsByTagName(s)[0];
        sz.parentNode.insertBefore(z, sz)
    }(document, "script", "zb-embed-code"));
</script>
<body class="{{isset($pageName) ? $pageName : ''}}">
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=479685768857527';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- - - - - - - - - - - - - - Main Wrapper - - - - - - - - - - - - - - - - -->
<div class="container container1" id="wrapper">

    <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

@include('clients.tehnopolis.partials.header')


<!-- - - - - - - - - - - - - - End Header - - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="message-holder">
        @if (session('success'))
            <div class="alert_box success">
                {!! session('success') !!}
                <button class="close_alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert_box error">
                {!! session('error') !!}
                <button class="close_alert"></button>
            </div>
        @endif
    </div>
@yield('content')

<!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

</div>
@include('clients.tehnopolis.partials.footer')
<!-- - - - - - - - - - - - - - End Footer - - - - - - - - - - - - - - - - -->

<!--/ [layout]-->

<script>
    function openModal() {
        var x = document.getElementById("search");
        x.classList.add("input-md");
        if (x.style.display === "none") {
            x.style.display = "block";
            document.getElementById("fokus").focus();
        } else {
            x.style.display = "none";
        }
    }
</script>

<!-- JavaScript Files -->
<script src="/assets/tehnopolis/js/jquery-1.11.1.min.js"></script>
<script src="/assets/tehnopolis/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/assets/tehnopolis/js/bootstrap-new.min.js"></script>
<script src="/assets/tehnopolis/js/bootstrap-hover-dropdown.min.js"></script>
<script src="/assets/tehnopolis/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/tehnopolis/js/owl.carousel.min.js"></script>
<script src="/assets/tehnopolis/js/swiper.min.js"></script>
@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
<script>
    $(document).ready(function() {
        var swiper = new Swiper('#swipe1', {
            slidesPerView: 6,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        if($('#swipe1').length) {
            $(window).resize(function () {
                var ww = $(window).width()
                if (ww > 1000) {
                    swiper.params.slidesPerView = 6;
                    swiper.params.slidesPerGroup = 1;
                    swiper.simulateTouch = true;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper.params.slidesPerView = 1;
                    swiper.params.slidesPerGroup = 1;
                    swiper.simulateTouch = true;
                }
                if (ww > 425 && ww <= 600) {
                    swiper.params.slidesPerView = 2;
                    swiper.params.slidesPerGroup = 2;
                    swiper.simulateTouch = true;
                }
                if (ww <= 425) {
                    swiper.params.slidesPerView = 1;
                    swiper.params.slidesPerGroup = 1;
                    swiper.simulateTouch = true;
                }
                swiper.update()
            })
        }
        $(window).trigger('resize');
    });
</script>
<script src="/assets/tehnopolis/js/custom.js?<?php echo filemtime('./assets/tehnopolis/js/custom.js'); ?>"></script>
@section('scripts')
@show

</body>
</html>