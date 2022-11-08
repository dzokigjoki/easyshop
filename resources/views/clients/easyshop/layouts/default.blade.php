<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Meta --}}
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="all">

    <title>EasyShop</title>

    {{-- Bootstrap Core CSS --}}
    <link rel="stylesheet" href="/assets/tehnopolis/css/bootstrap.min.css">

    {{-- Customizable CSS --}}
    <link rel="stylesheet" href="/assets/tehnopolis/css/main.css">
    <link rel="stylesheet" href="/assets/tehnopolis/css/blue.css">
    <link rel="stylesheet" href="/assets/tehnopolis/css/owl.carousel.css">
    <link rel="stylesheet" href="/assets/tehnopolis/css/owl.transitions.css">
    <link rel="stylesheet" href="/assets/tehnopolis/css/animate.min.css">
    <link rel="stylesheet" href="/assets/tehnopolis/css/custom.css">

    {{-- Fonts --}}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

    {{-- Icons/Glyphs --}}
    <link rel="stylesheet" href="/assets/tehnopolis/css/font-awesome.min.css">


    <!-- Favicon -->
    @include('clients._partials.favicon')

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
    <script src="/assets/tehnopolis/js/html5shiv.js"></script>
    <script src="/assets/tehnopolis/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="wrapper">
    <!-- ============================================================= TOP NAVIGATION ============================================================= -->
    <nav class="top-bar animate-dropdown">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">

            </div>

            <div class="col-xs-12 col-sm-6 no-margin">
                <ul class="right">
                    <li><a href="authentication"><i class="fa fa-heart"></i> Омилени <span class="value">(21)</span></a></li>
                    <li><a href="authentication"><i class="fa fa-exchange"></i> Споредба <span class="value">(2)</span></a></li>
                    <li><a href="{{route('auth.register.get')}}">Регистрација</a></li>
                    <li><a href="{{route('auth.login.get')}}">Најава</a></li>
                </ul>
            </div><!-- /.col -->
        </div><!-- /.container -->
    </nav><!-- /.top-bar -->
    <!-- ============================================================= TOP NAVIGATION : END ============================================================= -->       <!-- ============================================================= HEADER ============================================================= -->
    <header class="no-padding-bottom header-alt">
        <div class="container no-padding">

            <div class="col-xs-12 col-md-4 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="/assets/tehnopolis/images/logo.png" alt="" width="300" height="66"/>
                    </a>
                </div><!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->     </div><!-- /.logo-holder -->

            <div class="col-xs-12 col-md-6 top-search-holder no-margin">
                <div class="contact-row">
                    <div class="phone inline">
                        <i class="fa fa-phone"></i> (999) 999-9999
                    </div>
                    <div class="contact inline">
                        <i class="fa fa-envelope"></i> info@tehnopolis.mk
                    </div>
                </div><!-- /.contact-row -->
                @include('clients/tehnopolis/partials/search')

            <div class="col-xs-12 col-md-2 top-cart-row no-margin">
                <div class="top-cart-row-container">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <div class="top-cart-holder dropdown animate-dropdown">
                        @include('clients/tehnopolis/partials/basket')
                    </div><!-- /.top-cart-holder -->
                </div><!-- /.top-cart-row-container -->
                <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->       </div><!-- /.top-cart-row -->

        </div><!-- /.container -->

        <!-- ========================================= NAVIGATION ========================================= -->
        <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
            <div class="container">
                <div class="yamm navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- /.navbar-header -->
                    <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="{{route('category')}}" class="dropdown-toggle" data-hover="dropdown" >ТВ, Аудио, Видео</a>
                                <ul class="dropdown-menu">
                                    <li><div class="yamm-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Laptops &amp; Notebooks</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound </a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Computers &amp; Laptops</h2>
                                                    <ul>
                                                        <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                                        <li><a href="#">CPUs, Processors</a></li>
                                                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                                        <li><a href="#">Graphics, Video Cards</a></li>
                                                        <li><a href="#">Interface, Add-On Cards</a></li>
                                                        <li><a href="#">Laptop Replacement Parts</a></li>
                                                        <li><a href="#">Memory (RAM)</a></li>
                                                        <li><a href="#">Motherboards</a></li>
                                                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                                        <li><a href="#">Motherboard Components &amp; Accs</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Dekstop Parts</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound</a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </div><!-- /.yamm-content --></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Компјутери</a>
                                <ul class="dropdown-menu">
                                    <li><div class="yamm-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Laptops &amp; Notebooks</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound </a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Computers &amp; Laptops</h2>
                                                    <ul>
                                                        <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                                        <li><a href="#">CPUs, Processors</a></li>
                                                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                                        <li><a href="#">Graphics, Video Cards</a></li>
                                                        <li><a href="#">Interface, Add-On Cards</a></li>
                                                        <li><a href="#">Laptop Replacement Parts</a></li>
                                                        <li><a href="#">Memory (RAM)</a></li>
                                                        <li><a href="#">Motherboards</a></li>
                                                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                                        <li><a href="#">Motherboard Components &amp; Accs</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Dekstop Parts</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound</a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </div><!-- /.yamm-content --></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Бела Техника</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                    <li><a href="#">CPUs, Processors</a></li>
                                    <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                    <li><a href="#">Graphics, Video Cards</a></li>
                                    <li><a href="#">Interface, Add-On Cards</a></li>
                                    <li><a href="#">Laptop Replacement Parts</a></li>
                                    <li><a href="#">Memory (RAM)</a></li>
                                    <li><a href="#">Motherboards</a></li>
                                    <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Мали Апарати</a>
                                <ul class="dropdown-menu">
                                    <li><div class="yamm-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Laptops &amp; Notebooks</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound </a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Computers &amp; Laptops</h2>
                                                    <ul>
                                                        <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                                        <li><a href="#">CPUs, Processors</a></li>
                                                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                                        <li><a href="#">Graphics, Video Cards</a></li>
                                                        <li><a href="#">Interface, Add-On Cards</a></li>
                                                        <li><a href="#">Laptop Replacement Parts</a></li>
                                                        <li><a href="#">Memory (RAM)</a></li>
                                                        <li><a href="#">Motherboards</a></li>
                                                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                                        <li><a href="#">Motherboard Components &amp; Accs</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Dekstop Parts</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound</a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </div><!-- /.yamm-content --></li>
                                </ul>
                            </li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Домаќинство</a>
                                <ul class="dropdown-menu">
                                    <li><div class="yamm-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Laptops &amp; Notebooks</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound </a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Computers &amp; Laptops</h2>
                                                    <ul>
                                                        <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                                        <li><a href="#">CPUs, Processors</a></li>
                                                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                                        <li><a href="#">Graphics, Video Cards</a></li>
                                                        <li><a href="#">Interface, Add-On Cards</a></li>
                                                        <li><a href="#">Laptop Replacement Parts</a></li>
                                                        <li><a href="#">Memory (RAM)</a></li>
                                                        <li><a href="#">Motherboards</a></li>
                                                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                                        <li><a href="#">Motherboard Components &amp; Accs</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-4">
                                                    <h2>Dekstop Parts</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound</a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </div><!-- /.yamm-content --></li>
                                </ul>
                            </li>


                            <li class="dropdown yamm-fw">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Ладење и Греење</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="yamm-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-3">
                                                    <h2>Laptops &amp; Notebooks</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound </a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-3">
                                                    <h2>Computers &amp; Laptops</h2>
                                                    <ul>
                                                        <li><a href="#">Computer Cases &amp; Accessories</a></li>
                                                        <li><a href="#">CPUs, Processors</a></li>
                                                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                                        <li><a href="#">Graphics, Video Cards</a></li>
                                                        <li><a href="#">Interface, Add-On Cards</a></li>
                                                        <li><a href="#">Laptop Replacement Parts</a></li>
                                                        <li><a href="#">Memory (RAM)</a></li>
                                                        <li><a href="#">Motherboards</a></li>
                                                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                                        <li><a href="#">Motherboard Components &amp; Accs</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-3">
                                                    <h2>Desktop Parts</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound</a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->

                                                <div class="col-xs-12 col-sm-3">
                                                    <h2>Laptops &amp; Notebooks</h2>
                                                    <ul>
                                                        <li><a href="#">Power Supplies Power</a></li>
                                                        <li><a href="#">Power Supply Testers Sound </a></li>
                                                        <li><a href="#">Sound Cards (Internal)</a></li>
                                                        <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </div><!-- /.yamm-content -->
                                    </li>
                                </ul>
                            </li><!-- /.yamm-fw -->


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Игри и Забава</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Motherboard Components &amp; Accs</a></li>
                                    <li><a href="#">Power Supplies Power</a></li>
                                    <li><a href="#">Power Supply TestersSound </a></li>
                                    <li><a href="#">Sound Cards (Internal)</a></li>
                                    <li><a href="#">Video Capture &amp; TV Tuner Cards</a></li>
                                    <li><a href="#">Other</a></li>
                                </ul>
                            </li>


                            <li class="dropdown hidden-md">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Играчки</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Laptops &amp; Notebooks</a></li>
                                    <li><a href="#">RTV</a></li>
                                    <li><a href="#">TV &amp; Audio</a></li>
                                    <li><a href="#">Gadgets</a></li>
                                    <li><a href="#">Cameras</a></li>
                                </ul>
                            </li>


                            <li class="dropdown hidden-md">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown">Останато</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Laptops &amp; Notebooks</a></li>
                                    <li><a href="#">RTV</a></li>
                                    <li><a href="#">TV &amp; Audio</a></li>
                                    <li><a href="#">Gadgets</a></li>
                                    <li><a href="#">Cameras</a></li>
                                </ul>
                            </li>
                        </ul><!-- /.navbar-nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.navbar -->
            </div><!-- /.container -->
        </nav><!-- /.megamenu-vertical -->
        <!-- ========================================= NAVIGATION : END ========================================= -->

    </header>
    <!-- ============================================================= HEADER : END ============================================================= -->

    @yield('content')

    <!-- ============================================================= FOOTER ============================================================= -->
    <footer id="footer" class="color-bg">

        <div class="container">
            <div class="row no-margin widgets-row">
                <div class="col-xs-12  col-sm-4 no-margin-left">
                    <!-- ============================================================= FEATURED PRODUCTS ============================================================= -->
                    <div class="widget">
                        <h2>Featured products</h2>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">Netbook Acer Travel B113-E-10072</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-01.jpg" />
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-02.jpg" />
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-03.jpg" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.body -->
                    </div> <!-- /.widget -->
                    <!-- ============================================================= FEATURED PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

                <div class="col-xs-12 col-sm-4 ">
                    <!-- ============================================================= ON SALE PRODUCTS ============================================================= -->
                    <div class="widget">
                        <h2>On-Sale Products</h2>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">HP Scanner 2910P</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-04.jpg" />
                                            </a>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">Galaxy Tab 3 GT-P5210 16GB, Wi-Fi, 10.1in - White</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-05.jpg" />
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-06.jpg" />
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.body -->
                    </div> <!-- /.widget -->
                    <!-- ============================================================= ON SALE PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

                <div class="col-xs-12 col-sm-4 ">
                    <!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
                    <div class="widget">
                        <h2>Top Rated Products</h2>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">Galaxy Tab GT-P5210, 10" 16GB Wi-Fi</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-07.jpg" />
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">PowerShot Elph 115 16MP Digital Camera</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-08.jpg" />
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-9 no-margin">
                                            <a href="single-product.html">Surface RT 64GB, Wi-Fi, 10.6in - Dark Titanium</a>
                                            <div class="price">
                                                <div class="price-prev">$2000</div>
                                                <div class="price-current">$1873</div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-3 no-margin">
                                            <a href="#" class="thumb-holder">
                                                <img alt="" src="/assets/tehnopolis/images/blank.gif" data-echo="/assets/tehnopolis/images/products/product-small-09.jpg" />
                                            </a>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.body -->
                    </div><!-- /.widget -->
                    <!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->            </div><!-- /.col -->

            </div><!-- /.widgets-row-->
        </div><!-- /.container -->

        <div class="sub-form-row">
            <div class="container">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                    <form role="form">
                        <input placeholder="Subscribe to our newsletter">
                        <button class="le-button">Subscribe</button>
                    </form>
                </div>
            </div><!-- /.container -->
        </div><!-- /.sub-form-row -->

        <div class="link-list-row">
            <div class="container no-padding">
                <div class="col-xs-12 col-md-4 ">
                    <!-- ============================================================= CONTACT INFO ============================================================= -->
                    <div class="contact-info">
                        <div class="footer-logo">
                            <img src="/assets/tehnopolis/images/logo.png" alt="Tehnopolis"/>
                        </div><!-- /.footer-logo -->

                        <p class="regular-bold"> Feel free to contact us via phone,email or just send us mail.</p>

                        <p>
                            Partizanska, Skopje, MK
                            (999-999-999)
                        </p>

                        <div class="social-icons">
                            <h3>Get in touch</h3>
                            <ul>
                                <li><a href="http://facebook.com/transvelo" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-pinterest"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                                <li><a href="#" class="fa fa-stumbleupon"></a></li>
                                <li><a href="#" class="fa fa-dribbble"></a></li>
                                <li><a href="#" class="fa fa-vk"></a></li>
                            </ul>
                        </div><!-- /.social-icons -->

                    </div>
                    <!-- ============================================================= CONTACT INFO : END ============================================================= -->            </div>

                <div class="col-xs-12 col-md-8 no-margin">
                    <!-- ============================================================= LINKS FOOTER ============================================================= -->
                    <div class="link-widget">
                        <div class="widget">
                            <h3>Find it fast</h3>
                            <ul>
                                <li><a href="category-grid.html">laptops &amp; computers</a></li>
                                <li><a href="category-grid.html">Cameras &amp; Photography</a></li>
                                <li><a href="category-grid.html">Smart Phones &amp; Tablets</a></li>
                                <li><a href="category-grid.html">Video Games &amp; Consoles</a></li>
                                <li><a href="category-grid.html">TV &amp; Audio</a></li>
                                <li><a href="category-grid.html">Gadgets</a></li>
                                <li><a href="category-grid.html">Car Electronic &amp; GPS</a></li>
                                <li><a href="category-grid.html">Accesories</a></li>
                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.link-widget -->

                    <div class="link-widget">
                        <div class="widget">
                            <h3>Information</h3>
                            <ul>
                                <li><a href="category-grid.html">Find a Store</a></li>
                                <li><a href="category-grid.html">About Us</a></li>
                                <li><a href="category-grid.html">Contact Us</a></li>
                                <li><a href="category-grid.html">Weekly Deals</a></li>
                                <li><a href="category-grid.html">Gift Cards</a></li>
                                <li><a href="category-grid.html">Recycling Program</a></li>
                                <li><a href="category-grid.html">Community</a></li>
                                <li><a href="category-grid.html">Careers</a></li>

                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.link-widget -->

                    <div class="link-widget">
                        <div class="widget">
                            <h3>Information</h3>
                            <ul>
                                <li><a href="category-grid.html">My Account</a></li>
                                <li><a href="category-grid.html">Order Tracking</a></li>
                                <li><a href="category-grid.html">Wish List</a></li>
                                <li><a href="category-grid.html">Customer Service</a></li>
                                <li><a href="category-grid.html">Returns / Exchange</a></li>
                                <li><a href="category-grid.html">FAQs</a></li>
                                <li><a href="category-grid.html">Product Support</a></li>
                                <li><a href="category-grid.html">Extended Service Plans</a></li>
                            </ul>
                        </div><!-- /.widget -->
                    </div><!-- /.link-widget -->
                    <!-- ============================================================= LINKS FOOTER : END ============================================================= -->            </div>
            </div><!-- /.container -->
        </div><!-- /.link-list-row -->

        <div class="copyright-bar">
            <div class="container">
                <div class="col-xs-12 col-sm-6 no-margin">
                    <div class="copyright">
                        &copy; <a href="{{route('home')}}">Tehnopolis</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 no-margin">
                    <div class="payment-methods ">
                        <ul>
                            <li><img alt="" src="/assets/tehnopolis/images/payments/payment-visa.png"></li>
                            <li><img alt="" src="/assets/tehnopolis/images/payments/payment-master.png"></li>
                        </ul>
                    </div><!-- /.payment-methods -->
                </div>
            </div><!-- /.container -->
        </div><!-- /.copyright-bar -->

    </footer><!-- /#footer -->
    <!-- ============================================================= FOOTER : END ============================================================= -->   </div><!-- /.wrapper -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="/assets/tehnopolis/js/jquery-1.10.2.min.js"></script>
<script src="/assets/tehnopolis/js/jquery-migrate-1.2.1.js"></script>
<script src="/assets/tehnopolis/js/bootstrap.min.js"></script>
<script src="/assets/tehnopolis/js/bootstrap-hover-dropdown.min.js"></script>
<script src="/assets/tehnopolis/js/css_browser_selector.min.js"></script>
<script src="/assets/tehnopolis/js/echo.min.js"></script>
<script src="/assets/tehnopolis/js/jquery.easing-1.3.min.js"></script>
<script src="/assets/tehnopolis/js/bootstrap-slider.min.js"></script>

{{-- TODO: Raty za rating -da se odluci dali ke se koristi--}}
<script src="/assets/tehnopolis/js/jquery.raty.min.js"></script>
<script src="/assets/tehnopolis/js/jquery.prettyPhoto.min.js"></script>
<script src="/assets/tehnopolis/js/jquery.customSelect.min.js"></script>
<script src="/assets/tehnopolis/js/wow.min.js"></script>

@section('scripts')
@show

<script src="/assets/tehnopolis/js/owl.carousel.min.js"></script>


<script src="/assets/tehnopolis/js/scripts.js"></script>
</body>
</html>