<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
@include('clients._partials.meta')
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <meta name='keywords' content='business, clean, twitter, bootstrap 3, responsive'>
    <meta name='description' content="Colores is a professional multipurpose template for any business, portfolio or blog website.">
    <meta name='author' content='#'>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="/assets/finki-giftshop/css/bootstrap.css" >

    <!-- Mega menu -->
    <link rel="stylesheet" type="text/css" href="/assets/finki-giftshop/css/megamenu.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/assets/finki-giftshop/css/style.css">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="/assets/finki-giftshop/css/colors/color1.css" id="colors">


    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="/assets/finki-giftshop/css/responsive.css">
@include('clients._partials.global-styles')

    <!-- Favicon and touch icons  -->
    <link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="icon/favicon.png" rel="shortcut icon">

    <!--[if lt IE 9]>
    <script src="/assets/finki-giftshop/javascript/html5shiv.js"></script>
    <script src="/assets/finki-giftshop/javascript/respond.min.js"></script>
    <![endif]-->

</head>
<body>

@include('clients.finki-giftshop.partials.header')
@yield('content')
@include('clients.finki-giftshop.partials.footer')

<script type="text/javascript" src="/assets/finki-giftshop/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/jquery.easing.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/imagesloaded.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/parallax.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/jquery-waypoints.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/main.js"></script>

<!-- Revolution Slider -->
<script type="text/javascript" src="/assets/finki-giftshop/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="/assets/finki-giftshop/js/slider.js"></script>

@include('clients._partials.es-object')
@include('clients._partials.global-scripts')
</body>


</html>