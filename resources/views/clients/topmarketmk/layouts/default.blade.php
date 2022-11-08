<!DOCTYPE html>
<html>
<head>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/css/revslider.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/css/style.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ url_assets('/topmarketmk/magnify-master/dist/css/magnify.css') }}">

    <!-- Favicon and Apple Icons -->
    <link rel="icon" type="image/png" href="{{ url_assets('/topmarketmk/images/icons/icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url_assets('/topmarketmk/images/icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url_assets('/topmarketmk/images/icons/apple-icon-72x72.png') }}">
    @include('clients._partials.global-styles')
    @include('clients._partials.pixel-events')

<!--- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{-- <script>window.jQuery || document.write('<script src="{{ url_assets('/topmarket/js/jquery-1.11.1.min.js') }}"><\/script>')</script> --}}
    <script src="{{ url_assets('/topmarketmk/js/html5shiv.js') }}"></script>
    <script src="{{ url_assets('/topmarketmk/js/respond.min.js') }}"></script>
    <script src="{{ url_assets('/topmarketmk/js/modernizr.custom.js') }}"></script>

    <style id="custom-style">

    </style>
    @include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')

<body>
<div id="wrapper">
    @include('clients.topmarketmk.partials.header')
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    @yield('content')
    @include('clients.topmarketmk.partials.footer')
    <input id="direct_buy" type="hidden" name="direct_buy"
           value="1">

</div>
<a href="#" id="scroll-top" title="Scroll to Top"><i class="fa fa-angle-up"></i></a><!-- End #scroll-top -->
<script src="{{ url_assets('/topmarketmk/js/bootstrap.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.debouncedresize.js') }}"></script>
{{--<script src="{{ url_assets('/') }}/assets/topmarketmk/js/retina.min.js"></script>--}}
<script src="{{ url_assets('/topmarketmk/js/jquery.placeholder.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.hoverIntent.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.flexslider-min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/owl.carousel.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jflickrfeed.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.jscrollpane.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/main.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.jscrollpane.min.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.fitvids.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.elastislide.js') }}"></script>
<script src="{{ url_assets('/topmarketmk/js/jquery.elevateZoom.min.js') }}"></script>

<script src="{{ url_assets('/topmarketmk/magnify-master/dist/js/jquery.magnify.js') }}"></script>

@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
<script>
    $(function () {
        // Slider Revolution
        jQuery('#slider-rev').revolution({
            delay: 8000,
            startwidth: 1170,
            startheight: 600,
            onHoverStop: "true",
            hideThumbs: 250,
            navigationHAlign: "center",
            navigationVAlign: "bottom",
            navigationHOffset: 0,
            navigationVOffset: 20,
            soloArrowLeftHalign: "left",
            soloArrowLeftValign: "center",
            soloArrowLeftHOffset: 0,
            soloArrowLeftVOffset: 0,
            soloArrowRightHalign: "right",
            soloArrowRightValign: "center",
            soloArrowRightHOffset: 0,
            soloArrowRightVOffset: 0,
            touchenabled: "on",
            stopAtSlide: -1,
            stopAfterLoops: -1,
            dottedOverlay: "none",
            fullWidth: "on",
            spinned: "spinner5",
            shadow: 0,
            hideTimerBar: "on",
            // navigationStyle:"preview4"
        });

    });
</script>
<script>
    var countDownDate = new Date();
    countDownDate.setHours(24, 0, 0, 0);
    countDownDate = countDownDate.getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with propper id

        $(".hours-timer").html(hours);
        $(".minutes-timer").html(minutes);
        $(".seconds-timer").html(seconds);

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

</script>
<script>
    $(document).ready(function () {

        $('#zoom').on('click', function () {

            if ($('.enabled').length === 0) {
                $('.zoomContainer').show();
                $('#zoom').elevateZoom({
                    zoomType: "inner",
                    cursor: 'pointer',
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750
                });
                $(this).toggleClass('enabled');
            }
            else {
                $(this).toggleClass('enabled');
                $('.zoomContainer').hide();
            }

        });

        $('.zoom').magnify();

    });
</script>
</body>
</html>