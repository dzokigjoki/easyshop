<!DOCTYPE html>
<html lang="en">

<head>

    @include('clients._partials.meta')
    @include('clients._partials.favicon')

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700'
        rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ url_assets('/david_kompjuteri/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/david_kompjuteri/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/david_kompjuteri/css/font-icons.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/david_kompjuteri/css/sliders.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/david_kompjuteri/css/style.css?v=1') }}" />


    <script src="https://kit.fontawesome.com/bc6c3aba18.js" crossorigin="anonymous"></script>


    @section('style')
    @show

    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')

</head>

<body class="relative">
    <main class="main-wrapper">

        @include('clients.david_kompjuteri.partials.header')

        @yield('content')

        @include('clients.david_kompjuteri.partials.footer')

        <div id="back-to-top">
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>
    </main>
    <main class="main-wrapper">



        <div class="content-wrapper oh">





            <div id="back-to-top">
                <a href="#top"><i class="fa fa-angle-up"></i></a>
            </div>

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- jQuery Scripts -->
    <script type="text/javascript" src="{{ url_assets('/david_kompjuteri/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/david_kompjuteri/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/david_kompjuteri/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/david_kompjuteri/js/scripts.js?v=1') }}"></script>

    @yield('scripts')

    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')






    <script>
        $(document).ready(function() {
            ;
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
            $("#click").click(function() {
                $('html, body').animate({
                    scrollTop: $("#bot").offset().top - 100
                }, 2000);
            });
        });
    </script>

</body>

</html>