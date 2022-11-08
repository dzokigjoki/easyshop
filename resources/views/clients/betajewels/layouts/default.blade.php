<!DOCTYPE html>
<html lang="mk">

<head>
    @include('clients._partials.meta')

    <style>
        .product-single {
            transition: all .2s ease-in-out;
        }

        .product-single:hover {
            transform: scale(1.1);
        }
    </style>

    <!-- Font css  -->
    <link
        href="//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic"
        rel="stylesheet">
    <link href="{{ url_assets('/betajewels/css/normalize.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ url_assets('/betajewels/fonts/fonts.css') }}">

    <!-- Fontawesome css      -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ url_assets('/betajewels/css/normalize.css') }}">

    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="{{ url_assets('/betajewels/css/bootstrap.css') }}">

    <!-- Owncarousel css      -->
    <link rel="stylesheet" href="{{ url_assets('/betajewels/css/owl.carousel.css') }}">

    <!-- image zoom -->
    <link rel="stylesheet" href="{{ url_assets('/betajewels/css/glasscase.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/betajewels/css/glasscase.minf195.css') }}">

    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/betajewels/css/custom.css') }}"
        media="screen" />

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/betajewels/css/extralayers.css') }}"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/betajewels/rs-plugin/css/settings.css') }}"
        media="screen" />

    <!-- Main css   -->
    <link rel="stylesheet" href="{{ url_assets('/betajewels/css/style.css?v=12') }}">
    <link rel="stylesheet" href="{{ url_assets('/betajewels/css/responsive.css?v=4') }}">

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed"
        href="{{ url_assets('/betajewels/images/apple-touch-icon-precomposed.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ url_assets('/betajewels/images/favicon.png') }}" />
    <link href="{{ url_assets('/betajewels/css/bootstrap-dropdownhover.min.css') }}" rel="stylesheet">
    @include('clients._partials.global-styles')

    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    @include('clients._partials.pixel-init')
    @include('clients._partials.pixel-events')
    <style>
        a:hover {
            color: #F9AC18 !important;
        }
    </style>

</head>

<body>
    <div id="fb-root"></div>





    @include('clients.betajewels.partials.header')
    <script>
        (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
    </script>
    @yield('content')
    @include('clients.betajewels.partials.footer')

    <script type="text/javascript" src="{{ url_assets('/betajewels/js/jQuery.2.1.4.js') }}"></script>
    <script src="{{ url_assets('/betajewels/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="{{ url_assets('/betajewels/js/jquery.counterup.min.js') }}"></script>

    <!-- Revolution slider -->
    <script type="text/javascript"
        src="{{ url_assets('/betajewels/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ url_assets('/betajewels/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- Bootsrap js -->
    <script src="{{ url_assets('/betajewels/js/bootstrap.min.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ url_assets('/betajewels/js/plugins.js') }}"></script>

    <!-- Owl js -->
    <script src="{{ url_assets('/betajewels/js/owl.carousel.min.js') }}"></script>

    <!-- Custom js -->
    <script src="{{ url_assets('/betajewels/js/main.js') }}"></script>

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')
    <script>
        $(function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 150,
            max: 1400,
            values: [ 520, 1100 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });
    </script>

    <!-- glasscase js -->
    <script src="{{ url_assets('/betajewels/js/jquery.glasscase.minf195.js') }}"></script>
    <script src="{{ url_assets('/betajewels/js/bootstrap-dropdownhover.min.js') }}"></script>

    <script>
        var countDownDate = new Date();
    countDownDate.setHours(24,0,0,0);
    countDownDate = countDownDate.getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

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
        $('#zaHover').hover(function(){
            $('#hoverKoshnicka').show();
            $('#hoverKoshnicka').addClass("hpposition")
        }, function() {
            $('#hoverKoshnicka').hide();
        });
        $('#hoverKoshnicka').hover(function(){
            $('#hoverKoshnicka').show();
        }, function() {
            $('#hoverKoshnicka').hide();
        });

        $("#brands").click(function() {
            $("#brands-dropdown").toggle();
        })

        $('a.search_btn').on("click", function () {
            $('.main_nav.inner').toggleClass("d-none");
            // $('.search_mob_wp').slideToggle("fast");
        });
    });
    </script>
    @section('scripts')
    @show
</body>

</html>