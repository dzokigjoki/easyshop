<div class="offcanvas-overlay"></div>
<header class="productPage header-type-classic header-absolute header-transparent">
    <div class="topbar">
        <div class="container topbar-wap">
            <div class="row">
                <div class="col-sm-4">
                    <div class="left-topbar">
                        <div class="pull-left user-wishlist">
                        <a style="font-size:9px;">За Нас</a>
                        </div>
                        <div class="pull-left user-wishlist">
                            <a style="font-size:9px;">Како да нарачам?</a>
                        </div>
                        <div class="pull-left user-wishlist">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="right-topbar">
                        <div class="user-wishlist">
                            <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Кошничка</a>
                        </div>
                        <div class="user-wishlist">
                            <a style="padding-right:20px;">Контакт: </a>
                            <a href="tel:0038972230120" ><i class="fa fa-phone"> </i><span> +389 76 242 727</span></a>

                        </div>
                        <div class="user-wishlist">
                            <a style="padding-right:20px;">Е-пошта: </a>
                            <a href="mailto:info@lilit.mk"><i class="fa fa-envelope"></i><span>info@lilit.mk</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-container">
        <div class="navbar navbar-default  navbar-scroll-fixed">
            <div class="navbar-default-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 navbar-default-col">
                            <div class="navbar-wrap">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar bar-top"></span>
                                        <span class="icon-bar bar-middle"></span>
                                        <span class="icon-bar bar-bottom"></span>
                                    </button>
                                    <a class="navbar-search-button search-icon-mobile" href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <span>
                                        <?php
                                        $totalProducts = 0;
                                        $totalPrice = 0;
                                        ?>@if (Session::has('cart_products'))
                                            @foreach(session()->get('cart_products') as $pid => $product)
                                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                            @endforeach
                                        @endif
                                    </span>
                                    <a class="dropdown-toggle cart-icon-mobile" href="{{route('cart')}}">
                                        <i class="elegant_icon_bag"></i><span data-amount-value>{{$totalProducts}}</span>
                                    </a>
                                    <a class="navbar-brand" href="{{route('home')}}">
                                        <img class="logo" alt="The DMCS" src="{{ url_assets('/lilit/images/bitiklilitBLACK.png') }}">
                                        <img class="logo-fixed" alt="The DMCS" src="{{ url_assets('/lilit/images/bitiklilitBLACK.png') }}">
                                        <img class="logo-mobile" alt="The DMCS" src="{{ url_assets('/lilit/images/bitiklilitBLACK.png') }}">
                                    </a>
                                </div>
                                <nav class="collapse navbar-collapse primary-navbar-collapse">
                                    <ul class="nav navbar-nav primary-nav">

                                            <li style="color:black" class="menu-item-has-children dropdown">
                                                <a href="{{route('home')}}" class="dropdown-hover">
                                                    <span class="underline">Дома</span> <span class="caret"></span>
                                                </a>
                                            </li>
                                            @foreach($menuCategories as $mc)
                                                @if(isset($mc['children']))
                                                    <li class="menu-item-has-children dropdown">
                                                @else
                                                    <li>
                                                        @endif
                                                        <a href="{{route('category', [$mc['id'], $mc['url']])}}"class="dropdown-hover">
                                                            <span class="underline">{{$mc['title']}}</span><span class="caret"></span>
                                                        </a>
                                                        @if(isset($mc['children']))
                                                            <ul class="dropdown-menu">
                                                                @foreach($mc['children'] as $ch)
                                                                    <li>
                                                                        <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                            @endforeach
                                            <li class="navbar-search">
                                                <a class="navbar-search-button" href="#">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </li>
                                            <li class="navbar-minicart navbar-minicart-nav">
                                                <span>
                                                    <?php
                                                    $totalProducts = 0;
                                                    $totalPrice = 0;
                                                    ?>@if (Session::has('cart_products'))
                                                        @foreach(session()->get('cart_products') as $pid => $product)
                                                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <a class="minicart-link" href="{{route('cart')}}">
                                                                <span class="minicart-icon">
                                                                    <i class="minicart-icon-svg elegant_icon_bag"></i>
                                                                    <span data-amount-value>{{$totalProducts}}</span>
                                                                </span>
                                                </a>
                                                @if (Session::has('cart_products'))
                                                    <div id="shoppingCart">
                                                        <div class="minicart">
                                                        <div class="minicart-header no-items show">
                                                        <ul class="paddingCart scroller">
                                                            <h5 class="pull-left">Во кошничка</h5><br><br><br>
                                                            @foreach(session()->get('cart_products') as $product)
                                                                <?php $product = (object)$product; ?>
                                                                    <li style="min-height: 60px; list-style-type:none; text-align: left !important;">
                                                                        <a class="pull-left" href="{{$product->url}}"><img class="marginRight" style="height: 37px; width: 34px;"
                                                                                                         src="{{$product->image}}"/><span class="marginRight" style="font-size:12px;">x{{$product->quantity}}</span></a>
                                                                        <h3 class="marginRight alignCart"><b>
                                                                                <a style="font-size: 10px; font-weight: normal;color: #707070"
                                                                                   href="{{$product->url}}">{{$product->title}}</a></b>
                                                                        </h3>
                                                                        <span style="text-align: left !important;">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>

                                                                    </li>
                                                            @endforeach
                                                        </ul>
                                                        </div>
                                                        <div class="minicart-footer">
                                                            <div class="minicart-actions clearfix">
                                                                <a class="button" href="{{route('cart')}}">
                                                                    <span class="text">Види кошничка</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                        @else
                                                        <div id="shoppingCart">
                                                        <div class="minicart">
                                                            <h4 class="">
                                                                Вашата кошничка е празна!
                                                            </h4>
                                                            <div style="height:65%"></div>
                                                            <div class="minicart-footer">
                                                                <div class="minicart-actions clearfix">
                                                                    <a class="button" href="{{route('cart')}}">
                                                                        <span class="text">Види кошничка</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                @endif
                                            </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-search-overlay hide">
                <div class="container">
                    <div class="header-search-overlay-wrap">
                        <form action="{{route('search')}}" method="get" class="searchform">
                            <input type="search" class="searchinput" name="search" value="" placeholder="Пребарај..."/>
                            <input type="submit" class="searchsubmit hidden" name="submit" value="Search"/>
                        </form>
                        <button type="button" class="close">
                            <span aria-hidden="true" class="fa fa-times"></span>
                            <span class="sr-only">Затвори</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>