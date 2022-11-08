<!doctype html>
<html lang="en-US">

<head>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ url_assets('/skin-care/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/skin-care/css/font-icons.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/skin-care/css/sliders.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/skin-care/css/style.css?v=9') }}" />
    <link rel="stylesheet" href="{{ url_assets('/skin-care/plugins/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/skin-care/plugins/slick/slick-theme.css') }}" />

    @include('clients._partials.global-styles')
    <style>
        .slick-dots {
            position: unset;
        }
    </style>
    @section('style')
    @show

    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')
</head>


<body>
    <main class="main-wrapper">

        @include('clients.skin-care.partials.header')


        @yield('content')
        <div id="back-to-top">
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>
        @include('clients.skin-care.partials.footer')


    </main>
    <!-- JS
============================================ -->
    <script src="https://use.fontawesome.com/62d595ebca.js"></script>
    <script type="text/javascript" src="{{ url_assets('/skin-care/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/skin-care/js/jquery.lazyload.min.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/skin-care/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/skin-care/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/skin-care/js/scripts.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/skin-care/plugins/slick/slick.min.js')}}"></script>
    </script>
    @yield('scripts')
    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    <script>
        $(document).ready(function() {
            $('img.lazy').lazyload({
                effect: "fadeIn"
            });
            $(".widget_switch").click(function() {
                if ($(window).width() <= 575) {

                    if ($(this).children(".fa").hasClass('fa-chevron-right')) {
                        $(this).children(".fa").removeClass('fa-chevron-right');
                        $(this).children(".fa").addClass('fa-chevron-down');
                        $(this).siblings("ul").fadeTo("slow", 1);

                    } else {
                        $(this).children(".fa").removeClass('fa-chevron-down');
                        $(this).children(".fa").addClass('fa-chevron-right');
                        $(this).siblings("ul").fadeOut("fast", 0);
                    }

                }
            })

        });
    </script>
</body>

</html>