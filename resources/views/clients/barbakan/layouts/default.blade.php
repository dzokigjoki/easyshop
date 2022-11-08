<!doctype html>
<html lang="en-US">
<head>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap"
        rel="stylesheet">

    <!-- CSS Core -->
    <link rel="stylesheet" href="{{ url_assets('/barbakan/css/core.css') }}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{ url_assets('/barbakan/css/theme-beige.css?v=2') }}" />

    @include('clients._partials.global-styles')

    @section('style')
        <style>
            .text-area-in-form-format {
                box-shadow: inset 1px 1px 2px 0 rgb(40 43 46 / 6%);
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                font-weight: 400;
                border: 2px solid #e0e0e0;
                border-radius: 0;
                display: block;
                width: 100%;
                height: calc(1.5em + .75rem + 100px);
                padding: .375rem .75rem;
                font-size: 16px;
                font-size: 1rem;
                line-height: 1.5;
                color: black;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                -webkit-transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            }
            .za-nas{
                
            }
        </style>
    @show

    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')
</head>
<body class="header-absolute">


    <?php
    $sessionProducts = session('cart_products');
    $totalPrice = 0;
    $totalQuantity = 0;
    if (isset($sessionProducts)) {
        foreach ($sessionProducts as $product) {
            $totalPrice += $product['price'] * $product['quantity'];
            $totalQuantity += $product['quantity'];
        }
    }
    ?>

    <div id="body-wrapper" class="animsition">
        
        @if(\Request::route()->getPath() != "/")
        @include('clients.barbakan.partials.header')
        @endif

        <div id="content">
            @yield('content')
        </div>

        @if(\Request::route()->getPath() != "/")
        @include('clients.barbakan.partials.footer')
        @endif



        <!-- Panel Cart -->
        <div id="panel-cart">
            <div class="panel-cart-container">
                <div class="panel-cart-title">
                    <h5 class="title">Вашата кошничка</h5>
                    <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
                </div>
                <div class="panel-cart-content cart-details" id="shoppingCart">

                    @include('clients.barbakan.cart-partial')

                </div>
            </div>
        </div>

        <!-- Panel Mobile -->
        <nav id="panel-mobile">
            <div class="module module-logo bg-dark dark">
                <a href="#">
                    <img src="{{ url_assets('/barbakan/img/logo.png') }}" alt="" width="88">
                </a>
                <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
            </div>
            <nav class="module module-navigation"></nav>
            <div class="module module-social">
                <h6 class="text-sm mb-3">Follow Us!</h6>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i
                        class="fa fa-facebook"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i
                        class="fa fa-instagram"></i></a>
            </div>
        </nav>

        <!-- Body Overlay -->
        <div id="body-overlay"></div>



    </div>
    <!-- Cookies Bar -->
    <div id="cookies-bar" class="body-bar cookies-bar">
        <div class="body-bar-container container">
            <div class="body-bar-text">
                <h4 class="mb-2">Cookies & GDPR</h4>
                <p>This is a sample Cookies / GDPR information. You can use it easily on your site and even add link
                    to
                    <a href="#">Privacy Policy</a>.
                </p>
            </div>
            <div class="body-bar-action">
                <button class="btn btn-primary" data-accept="cookies"><span>Accept</span></button>
            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    <!-- JS Core -->
    <script src="{{ url_assets('/barbakan/js/core.js') }}"></script>
    @section('scripts')
    @show
    <script>
        $(document).ready(function() {
            if (window.location.pathname == '/') {
                $("#header").removeAttr("class").attr("class", "absolute transparent");
            }
        });
    </script>
</body>

</html>
