<!doctype html>
<html lang="en-US">

<head>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ url_assets('/yeppeuda/css/bootstrap.min.css?v=1') }}" />
    <link rel="stylesheet" href="{{ url_assets('/yeppeuda/css/font-icons.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/yeppeuda/css/sliders.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/yeppeuda/css/style.css?v=31') }}" />
    <link rel="stylesheet" href="{{ url_assets('/yeppeuda/css/copied.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/yeppeuda/plugins/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/yeppeuda/plugins/slick/slick-theme.css?v=7') }}" />

    @include('clients._partials.global-styles')
    <style>
        .slick-dots {
            position: unset;
        }
        /* Cookies */
        .cookie-consent {
        padding: 30px 20px;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        font-size: 16px;
        color: #222;
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        z-index: 1999;
        line-height: 25px;
        }

        .cookie-consent__agree {
        padding: 5px 20px;
        background-color: #fca3cb;
        color: #fff;
        border-color: #fca3cb;
        margin-top: 9px;
        border-radius: 20px;
        margin-left: 10px;
        cursor: pointer;
        -webkit-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;
        }

        .cookie-consent__disagree {
        padding: 5px 20px;
        background-color: lightgrey;
        color: black;
        border-color: grey;
        border-radius: 20px;
        margin-top: 9px;
        margin-left: 10px;
        cursor: pointer;
        -webkit-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;
        }

        .cookie-consent__agree:hover,
        .cookie-consent__disagree:hover {
        background-color: transparent;
        border: 1px #fca3cb solid;
        color: #fca3cb !important;
        }
    </style>
    @section('style')
    @show

    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')
</head>


<body>
    <main class="main-wrapper">

        @include('clients.yeppeuda.partials.header')


        @yield('content')
        <div id="back-to-top">
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>
        @include('clients.yeppeuda.partials.footer')

    </main>
    <!-- JS
============================================ -->
    <script src="https://use.fontawesome.com/62d595ebca.js"></script>
    <script type="text/javascript" src="{{ url_assets('/yeppeuda/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/yeppeuda/js/jquery.lazyload.min.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/yeppeuda/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/yeppeuda/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/yeppeuda/js/scripts.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/yeppeuda/plugins/slick/slick.min.js')}}"></script>
    </script>
    @yield('scripts')
    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    <script>
        $(document).ready(function() {


            function setCookie(name, value, minutes) {
                var expires = "";
                if (minutes) {
                    var date = new Date();
                    console.log(date.toUTCString());
                    date.setTime(date.getTime() + minutes * 60 * 1000);
                    console.log(date.toUTCString());
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function eraseCookie(name) {
                document.cookie = name + '=; Max-Age=-99999999;';
            }

            
            // if (!getCookie('welcome_modal')) {
            //     $('#exampleModal').modal('show');
            //     setCookie('welcome_modal', '1', 7);
            // }

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