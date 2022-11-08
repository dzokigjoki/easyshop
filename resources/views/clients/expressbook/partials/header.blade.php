<header class="header">

    <nav class="preheader hidden-xs hidden-sm navbar navbar-bookshop navbar-static-top" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12 hidden-xs hidden-sm">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('category',['4','za-nas'])}}">За Нас</a></li>
                        <li><a href="{{route('category',['5','plakjanje-i-isporaka'])}}">Плаќање и Испорака</a></li>
                        <li><a href="tel:0038971297619"><span class="icon glyphicon glyphicon-earphone"></span> +389 71
                                297 619</a></li>

                        {{--<li><a href="">Контакт</a></li>--}}
                    </ul><!-- /.nav -->
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="{{route('category',['8','kako-da-naracham'])}}">Како да нарачам</a> </li>
                        <li><a href="{{route('category',['9','pravila-na-kupuvanje'])}}">Правила на купување</a> </li>
                    </ul>

                </div><!-- /.col -->
                <div class="col-md-3 col-xs-10 col-sm-10 navbar-left">


                </div><!-- /.col -->
                <div class="col-md-4 col-sm-2">
                    <ul class="nav navbar-nav navbar-right">
                        {{--<li class="hidden-xs hidden-sm"><a href="contact.html">Регистрација</a></li>--}}
                        {{--<li class="hidden-xs hidden-sm"><a href="single-book.html">Најава</a></li>--}}
                        {{--<li class="hidden-xs hidden-sm"><a href="contact.html">Кошничка</a></li>--}}
                        {{--<li class="icon icon-small hidden-xs"><a data-toggle="modal" data-target="#modal-login-big" href="#"><i class="icon fa fa-lock"></i></a></li>--}}
                        {{--<li class="icon hidden-lg hidden-sm hidden-md"><a data-toggle="modal" data-target="#modal-login-small" href="#"><i class="icon fa fa-lock"></i></a></li>--}}
                    </ul><!-- /.nav -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->


    <!-- Modal -->
    {{--<div id="modal-login-big" class="modal login fade hidden-xs"  tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-body">--}}
    {{--<div class="text-center">--}}
    {{--<ul class="login-list clearfix ">--}}
    {{--<li class='active'>Login</li>--}}
    {{--<li class="divider"></li>--}}
    {{--<li><a href="#">Sign Up</a></li>--}}
    {{--</ul><!-- /.login-list -->--}}
    {{--<form role="form" class="inner-top-50">--}}
    {{--<div class="form-group">--}}
    {{--<label for="exampleInputEmail1" class="sr-only">Email address</label>--}}
    {{--<input type="email" class="form-control bookshop-form-control" id="exampleInputEmail1" placeholder="">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="exampleInputPassword1" class="sr-only">Password</label>--}}
    {{--<input type="password" class="form-control bookshop-form-control" id="exampleInputPassword1">--}}
    {{--</div>--}}

    {{--<button type="button" class="btn btn-primary btn-uppercase">Login</button>--}}
    {{--<a href="#" class='forgot-password'>forgot password</a>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div><!-- /.modal-body -->--}}
    {{--<a href="#" data-dismiss="modal" class="remove-icon"><i class="fa fa-times"></i></a>--}}
    {{--</div><!-- /.modal-content -->--}}
    {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}

    <!-- Modal -->
    {{--<div id="modal-login-small" class="modal fade login login-xs hidden-sm hidden-lg"  tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-body">--}}
    {{--<div class="text-center">--}}
    {{--<div class="logo-holder">--}}
    {{--<h1 class="logo">BookShop</h1>--}}
    {{--<div class="logo-subtitle">--}}
    {{--<span>World of books</span>--}}
    {{--</div><!-- /.logo-subtitle -->--}}
    {{--</div>--}}

    {{--<form role="form" class="inner-top-50">--}}
    {{--<div class="form-group">--}}
    {{--<label for="entername" class="sr-only">Email</label>--}}
    {{--<input type="email" class="form-control bookshop-form-control" id="entername" placeholder="Hezy Theme">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="enterpassword" class="sr-only">Password</label>--}}
    {{--<input type="password" class="form-control bookshop-form-control" id="enterpassword">--}}
    {{--</div>--}}

    {{--<button type="button" class="btn btn-primary btn-block btn-uppercase">Login</button>--}}
    {{--<a href="#" class='forgot-password'>forgot password</a>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div><!-- /.modal-body -->--}}
    {{--<div class="modal-footer">--}}
    {{--<div class="text-center">--}}
    {{--<ul class='social-list text-center'>--}}
    {{--<li><a href="#" class="facebook"></a></li>--}}
    {{--<li><a href="#" class="google-plus"></a></li>--}}
    {{--<li><a href="#" class="twitter"></a></li>--}}
    {{--<li><a href="#" class="pinterest"></a></li>--}}
    {{--</ul><!-- /.social-list -->--}}
    {{--</div>--}}
    {{--</div><!-- /.modal-footer -->--}}
    {{--<a href="#" data-dismiss="modal" class="remove-icon"><i class="fa fa-times"></i></a>--}}
    {{--</div><!-- /.modal-content -->--}}
    {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}
    {{----}}
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 text-center logo-holder">
                    <!-- ============================================== LOGO ============================================== -->
                    <style>
                        .header .main-header .logo-holder a {
                            margin-top: -28px;
                            text-align: left;
                        }
                    </style>
                    <a href="/"><img class="center" src="{{ url_assets('/expressbook/images/logo.png') }}"
                            height="80" /></a>
                    <!-- ============================================== LOGO : END ============================================== -->
                </div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-4 col-md-4 top-search-holder m-t-10">
                    <!-- ============================================== SEARCH BAR ============================================== -->
                    <form class="search-form" method="GET" action="{{route('search')}}">
                        <div class="form-group">
                            <label class="sr-only" for="page-search">Type your search here</label>
                            <input id="page-search" class="search-input form-control" type="search" name="search"
                                tabindex="1" placeholder="Барај">
                        </div>
                        <button class="page-search-button" type="submit">
                            <span class="fa fa-search">
                                <span class="sr-only">Search</span>
                            </span>
                        </button>
                    </form>
                    <!-- ============================================== SEARCH BAR : END ============================================== -->
                </div><!-- /.top-search-holder -->



                <div class="col-xs-12  col-md-2 header-shippment hidden-sm m-t-10">
                    <!-- ============================================== FREE DELIVERY ============================================== -->
                    <div class="media free-delivery hidden-xs ">
                        <span class="media-left"><img
                                src="{{ url_assets('/expressbook/assets/images/delivery-icon.png') }}" height="48"
                                width="48" alt=""></span>
                        <div class="media-body">
                            <h5 class="media-heading">Достава 130 ден</h5>
                        </div>
                    </div>
                    <!-- ============================================== FREE DELIVERY : END ============================================== -->
                </div><!-- /.header-shippment -->

                <div class="cartXS col-xs-12 col-sm-5 col-md-3 animate-dropdown1 top-cart-row m-t-10">
                    <!-- ============================================== SHOPPING CART DROPDOWN ============================================== -->
                    <ul class="clearfix shopping-cart-block list-unstyled">
                        <li class="dropdown">
                            <a class="menu-toggle-right clearfix" href=".menu-toggle-right">
                                <span class="pull-right cart-right-block">
                                    <img src="{{ url_assets('/expressbook/assets/images/cart-icon.png') }}" alt=""
                                        width="46" height="39" />
                                </span><!-- /.cart-right-block -->
                                <span class="pull-right cart-left-block">
                                    <?php
                                            $totalProducts = 0;
                                            $totalPrice = 0;
                                            ?>@if (Session::has('cart_products'))
                                    @foreach(session()->get('cart_products') as $pid => $product)
                                    <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                    @endforeach
                                    @endif
                                    <span class="cart-block-heading"><i style="font-style: normal;"
                                            data-cart-total-price>{{$totalPrice}}</i> ден.</span>
                                    <span class="hidden-xs"><i style="font-style: normal;"
                                            data-amount-value>{{$totalProducts}}</i> книга(и) во кошничка</span>
                                </span><!-- /.cart-left-block -->
                            </a>
                        </li>
                    </ul> <!-- /.list-unstyled -->
                    <!-- ============================================== SHOPPING CART DROPDOWN : END ============================================== -->
                </div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->




    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="nav-bg-class">
                <!-- ============================================================= NAVBAR PRIMARY ============================================================= -->
                <nav class="yamm navbar navbar-primary animate-dropdown" role="navigation">
                    <div class="navbar-header">
                        <button id="btn-navbar-primary-collapse" type="button" class="navbar-toggle"
                            data-toggle="collapse" data-target="#navbar-primary-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- /.navbar-header -->
                    <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Почетна</a></li>

                            @foreach($menuCategories as $item)
                            <li
                                {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                            </li>
                            @endforeach
                            <li><a href="/kontakt">Контакт</a></li>
                            {{--<li><a href="">Препорачани</a></li>--}}
                            {{--<li><a href="">Стручен Англиски</a></li>--}}
                            {{--<li><a href="">Книги за деца</a></li>--}}
                            {{--<li><a href="">Книги за светот</a></li>--}}
                            {{--<li><a href="">Акција</a></li>--}}
                        </ul><!-- /.nav -->
                    </div><!-- /.collapse navbar-collapse -->
                </nav><!-- /.yamm -->
                <!-- ============================================================= NAVBAR PRIMARY : END ============================================================= -->
            </div><!-- /.nav-bg-class -->
        </div><!-- /.container -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->
</header>