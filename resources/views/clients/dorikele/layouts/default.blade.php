<!DOCTYPE html>
<html lang="en">
<head>

@include('clients._partials.meta')
    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700%7CMontserrat:400,700%7CPlayfair+Display:400,400italic'
          rel='stylesheet' type='text/css'>

    <!-- Css -->
    <link rel="stylesheet" href="https://assets.smartsoft.mk/easyshop/dorikele/css/core.min.css"/>
    <link rel="stylesheet" href="https://assets.smartsoft.mk/easyshop/dorikele/css/skin.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @include('clients._partials.global-styles')
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @include('clients._partials.pixel-events')
</head>
<body class="shop home-page">
        <!-- Header -->
        @include('clients.dorikele.partials.header')
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <!-- Header End -->
        <!-- Content -->
        <div class="wrapper">
            <div class="wrapper-inner">
                <div class="content clearfix">
        @yield('content')
                </div>
            </div>
        </div>
        <!-- Contend End ->
        <!-- Footer -->
        @include('clients.dorikele.partials.footer')
        <!-- Footer End -->

    </div>
</div>
<!-- Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3"></script>
<script src="https://assets.smartsoft.mk/easyshop/dorikele/js/timber.master.min.js"></script>
@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
</body>
</html>