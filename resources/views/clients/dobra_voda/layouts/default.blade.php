<!doctype html>
<html lang="en-US">

<head>
    <!-- Google Tag Manager -->

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':

                    new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-N9BKGBP');
    </script>

    <!-- End Google Tag Manager -->

    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/vendor/bootstrap.min.css')}}">
    <!-- Material Design Iconic Font -->
    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/vendor/material-design-iconic-font.css')}}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/vendor/simple-line-icons.css')}}">
    <!-- Local Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/vendor/font.css')}}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/plugins/animate.css')}}">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/plugins/jquery-ui.min.css')}}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/plugins/nice-select.css')}}">

    <link rel="stylesheet" href="{{url_assets('/dobra_voda/css/style.css?v=8')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .toast-success {
            background-color: #2f96b4 !important;
        }
    </style>
    @include('clients._partials.global-styles')

    @section('style')
    @show

    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')
</head>


<body class="template-color-2 font-family-01">
    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9BKGBP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->
    @include('clients.dobra_voda.partials.header')

    <div class="main-wrapper">
        @yield('content')

        <!-- Begin Slider Area Two -->

        <a class="scroll-to-top" href=""><i class="icon-arrow-up"></i></a>
        <!-- Scroll To Top End -->
        @include('clients.dobra_voda.partials.footer')
    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="{{url_assets('/dobra_voda/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Modernizer JS -->
    <script src="{{url_assets('/dobra_voda/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{url_assets('/dobra_voda/js/vendor/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{url_assets('/dobra_voda/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Slick Slider JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/slick.min.js')}}"></script>
    <!-- Barrating JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/jquery.barrating.min.js')}}"></script>
    <!-- Counterup JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/jquery.counterup.js')}}"></script>
    <!-- Nice Select JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/jquery.nice-select.js')}}"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/jquery.sticky-sidebar.js')}}"></script>
    <!-- Jquery-ui JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{url_assets('/dobra_voda/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
    <!-- Waypoints JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/waypoints.min.js')}}"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/jquery.zoom.min.js')}}"></script>
    <!-- Timecircles JS -->
    <script src="{{url_assets('/dobra_voda/js/plugins/timecircles.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url_assets('/dobra_voda/js/main.js?v=1')}}"></script>
    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    @section('scripts')
    @show
    <script>
        $(document).ready(function() {
            $("#Confirm").click(function() {
                $("#modalOverlay").hide();
            })
            $("#modalOverlay").show();
            var $stickyMenu = jQuery('.main-header');

            var stickyNavTop = jQuery($stickyMenu).offset().top;

            //Get Height of Navbar Div
            var navHeight = jQuery($stickyMenu).height();

            var stickyNav = function() {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > stickyNavTop) {
                    jQuery($stickyMenu).addClass('header-sticky');
                } else {
                    jQuery($stickyMenu).removeClass('header-sticky');
                }
            };

            stickyNav();

            jQuery(window).scroll(function() {
                stickyNav();
            });
            $('#search_close').click(function() {

                $('.header-search-overlay').addClass('hidden');
            });
            $('.searchBar').click(function() {
                $('.header-search-overlay').toggleClass('hidden');
            });
            $('.heading_footer').click(function() {
                $(this).parent().children('.footer-widgets').toggleClass('hide_links');
            });
        });
    </script>

</body>

</html>