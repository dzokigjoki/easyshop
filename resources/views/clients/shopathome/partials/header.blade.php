<style>
    .dropdown-menu {
        display: none;
    }
    .ml-45 {
        margin-left:-45px !important;
    }
    .dropdown:hover .dropdown-menu {
        display: block !important;
    }
</style>
<header class="clearfix">

    <div class="sticky_nav">

        <div class="top-line darkblue-b">
            <div class="container">

                <div class="hidden-sm right-line clearfix">

                    <div class="mobile-version">
                        <div class="cart-icon">
                            <a href="{{route('cart')}}"><img
                                    src="{{ url_assets('/shopathome/images/cart-white.png') }}" alt="">
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
                                <span style="color: white;" data-amount-value>Во кошничка: {{$totalProducts}}</span></a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>


        <div class="upper-header">
            <i style="    color: white;
        position: absolute;
        top: 10px;
        left: 70px;
        font-size: 24px;" class="fa fa-search hidden-lg hidden-sm hidden-md search-top-button"></i>
            <div style="display:none; position: absolute; top: 44px;
        left: -75px; width:100%" class="search-input" tabindex='1' id="searchModal">
                <form method="get" action="{{route('search')}}">
                    <input id="fokus" class="inputce display-none-search " type="text" placeholder="Пребарувај" name="search" value="">
                    <button class="btn btn-primary btn-md pull-right"
                    name="submit" style="position: absolute; top: 2px; left: 100%"
                    type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    {{-- <input class="inputce" type="submit" name="submit" value=""> --}}
                </form>
            </div>
            <div class="container">
                <nav style="width:50%;" role="navigation">
                    <div>
                        <button type="button" class="navbar-toggle">
                            <span style="background:white" class="icon-bar bar-top"></span>
                            <span style="background:white" class="icon-bar bar-middle"></span>
                            <span style="background:white" class="icon-bar bar-bottom"></span>
                        </button>
                        <div style="background: white;" class="offcanvas open ">
                            <div class="offcanvas-wrap">
                                <nav class="offcanvas-navbar">
                                    <ul class="offcanvas-nav">
                                        <li class="menu-item-has-children dropdown current-menu-ancestor">
                                            <a href="{{ route('home') }}" class="pl-header">Дома</a>
                                        </li>
                                       
                                        @foreach($menuCategories as $mc)
                                        @if(isset($mc['children']))
                                        <li class="menu-item-has-children dropdown-submenu">
                                            <a class="dropdown-hover pl-header" href="{{route('category', [$mc['id'], $mc['url']])}}">
                                                {{$mc['title']}} <span class="caret"></span>
                                            </a>
                                            @else
                                        <li>
                                            <a  class="pl-header" href="{{route('category', [$mc['id'], $mc['url']])}}">
                                                {{$mc['title']}}
                                            </a>
                                        @endif
                                            @if(isset($mc['children']))
                                            <ul class="dropdown-menu">
                                                @foreach($mc['children'] as $ch)
                                                @if(isset($ch['children']))
                                                <li class="menu-item-has-children dropdown-submenu">
                                                    <a  class="pl-header">
                                                        {{ $ch['title'] }} <span class="caret"></span>
                                                    </a>
                                                    @else
                                                <li>
                                                    <a  class="pl-header" href="{{ route('category', [$ch['id'], $ch['url']])}}">
                                                        {{$ch['title']}}
                                                    </a>
                                                    @endif
                                                    @if(isset($ch['children']))
                                                    <ul class="dropdown-menu">
                                                        @foreach($ch['children'] as $chch)
                                                        <li>
                                                            <a
                                                                href="{{route('category', [$chch['id'], $chch['url']])}}">{{$chch['title']}}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endif
                                                @endforeach
                                              
                                            </ul>
                                        </li> 
                                        @endif
                                        @endforeach
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="search-input">
                    <form method="get" action="{{route('search')}}">
                        <input type="text" placeholder="????????" name="search" value="">
                        <input type="submit" name="submit" value="">
                    </form>
                </div>
                <div class="logo">
                    <a href="{{route('home')}}"><img style="height:100px;" class="logo"
                            src="{{ url_assets('/shopathome/images/logo-outline.png') }}" alt="logo"></a>
                </div>
                <div class="cart">
                    <a href="{{route('cart')}}" class="cartmain">
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
                        <div class="card-icon">
                            <img src="{{ url_assets('/shopathome/images/cart.png') }}" alt="">
                            <div class="shop-items">
                                <span class="minicart-icon">
                                    <i class="minicart-icon-svg elegant_icon_bag"></i>
                                    <span data-amount-value>{{$totalProducts}}</span>
                                </span>
                            </div>
                        </div>
                        ????????
                    </a>
                    @if (Session::has('cart_products'))
                    <div id="shoppingCartMobile">
                        <div class="hover-cart">
                            <div class="hover-box">
                                @foreach(session()->get('cart_products') as $product)
                                <?php $product = (object)$product; ?>
                                <a href="{{$product->url}}">
                                    {{--<img src="{{ url_assets('') }}/assets/shopathome/images/hover1.png" alt=""
                                    class="left-hover">--}}
                                    <img src="{{$product->image}}" alt="" class="left-hover">
                                </a>
                                <div class="hover-details">
                                    <p>{{$product->title}}</p>
                                    <span>{{ number_format($product->price, 0, ',', '.')}} ???.</span>
                                    <div class="quantity">????????: {{$product->quantity}}</div>
                                </div>
                                @endforeach
                                <div class="clear"></div>
                            </div>
                            <div class="subtotal">
                                {{-- ??????: <span>{{ $totalPrice? }}??.</span> --}}
                            </div>
                            <a href="{{route('cart')}}" class="viewcard button-red"> ???? ????????</a>
                        </div>
                    </div>
                    @else
                    <div id="shoppingCartMobile">
                        <div class="hover-cart">
                            <div class="hover-box">
                                <br>
                                <div class="subtotal">
                                    ?????? ???????? ? ??????!
                                </div>
                            </div>
                            <a href="{{route('cart')}}" class="viewcard button-red"> ???? ????????</a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="clear"></div>
            </div>
        </div>


        <div class="container">
            <nav style="width:50%;" role="navigation">
                <div>
                    <button type="button" id="nav-toggle" class="navbar-toggle">
                        <span style="background:white" class="icon-bar bar-top"></span>
                        <span style="background:white" class="icon-bar bar-middle"></span>
                        <span style="background:white" class="icon-bar bar-bottom"></span>
                    </button>
                    <div style="background: white;" id="mobile_menu" class="offcanvas open mobile_menu_height ">
                        <div class="offcanvas-wrap">
                            <nav class="offcanvas-navbar">
                                <ul class="offcanvas-nav">
                                    <li class="menu-item-has-children dropdown current-menu-ancestor">
                                        <a href="{{ route('home') }}" >Дома</a>
                                    </li>
                                    @foreach($menuCategories as $mc)
                                    @if(isset($mc['children']))
                                    <li class="menu-item-has-children dropdown-submenu">
                                        <a class="dropdown-hover pl-header" href="{{route('category', [$mc['id'], $mc['url']])}}">
                                            {{$mc['title']}} <span class="caret"></span>
                                        </a>
                                        @else
                                    <li>
                                        <a  href="{{route('category', [$mc['id'], $mc['url']])}}">
                                            {{$mc['title']}}
                                        </a>
                                        @endif
                                        @if(isset($mc['children']))
                                        <ul class="dropdown-menu">
                                            @foreach($mc['children'] as $ch)
                                            @if(isset($ch['children']))
                                            <li class="menu-item-has-children dropdown-submenu">
                                                <a>
                                                    {{ $ch['title'] }} <span class="caret"></span>
                                                </a>
                                                @else
                                            <li>
                                                <a  href="{{ route('category', [$ch['id'], $ch['url']])}}">
                                                    {{$ch['title']}}
                                                </a>
                                                @endif
                                                @if(isset($ch['children']))
                                                <ul class="dropdown-menu">
                                                    @foreach($ch['children'] as $chch)
                                                    <li>
                                                        <a
                                                            href="{{route('category', [$chch['id'], $chch['url']])}}">{{$chch['title']}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach
                                     <li class="menu-item-has-children dropdown current-menu-ancestor">
                                        <a  href="/contact">Контакт</a>
                                    </li>
                                   
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>




            <div class="clear"></div>
        </div>
    </div>


    <div style="background: #E4CDAD;" class="desktop-only">
        <div id="myHeader" class="navbar-container">
            <div class="navbar navbar-default navbar-scroll-fixed">
                <div class="navbar-default-wrap">
                    <div class="container navbar-default-container">
                        <div class="row">
                            <div class="col-md-9 ml-45">
                                <div class="logo">
                                    <a href="{{route('home')}}"><img class="logo logo_bebe"
                                            src="{{ url_assets('/shopathome/images/logo-outline.png') }}" alt="logo "></a>
                                </div>
                                <div class="navbar-wrap" style="float:left !important;">
                                    <nav class="collapse navbar-collapse primary-navbar-collapse">

                                        <ul class="nav navbar-nav primary-nav">
                                            {{-- <li>
                                                            <div class="logo">
                                                                    <a href="{{route('home')}}"><img
                                                style="height:100px;" class="logo"
                                                src="{{ url_assets('') }}/assets/shopathome/images/novo_logo.png"
                                                alt=""></a>
                                </div>
                                </li> --}}
                                <li><a  class="pl-header" href="/">Дома<i class=" dark-red-f"></i></a></li>
                                <li><a  class="pl-header" href="{{route('blog',[2,'za-nas'])}}">За Нас<i class="dark-red-f"></i></a></li>
                                @foreach($menuCategories as $mc)
                                @if(isset($mc['children']))
                                <li class="menu-item-has-children megamenu megamenu-fullwidth dropdown">
                                    <a  class="pl-header" href="{{route('category', [$mc['id'], $mc['url']])}}" class="dropdown-hover dark-red-f">
                                        <span class="underline">{{$mc['title']}}</span>
                                    </a>
                                    @else
                                <li>
                                    <a  class="pl-header" href="{{route('category', [$mc['id'], $mc['url']])}}"
                                        class="dark-red-f dropdown-hover">
                                        <span class="underline">{{$mc['title']}}</span>
                                    </a>
                                    @endif
                                    @if(isset($mc['children']))
                                    <ul class="dropdown-menu">
                                        @foreach($mc['children'] as $ch)
                                        @if(isset($ch['children']))
                                        <li class="menu-item-has-children col-lg-6 dropdown-submenu">
                                            <h3 class="megamenu-title">
                                                {{ $ch['title'] }} <span class="caret"></span>
                                            </h3>
                                            @else
                                        <li class="menu-item-has-children col-lg-6 dropdown-submenu">
                                            <h3 class="megamenu-title">  
                                                <a  class="pl-header" href="{{ route('category', [$ch['id'], $ch['url']])}}">
                                                    <div class="row">            
                                                        <div class="col-sm-9 padding-top-15px">
                                                        {{ $ch['title'] }}
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="/uploads/category/{{$ch['image']}} "class="menu-pictures" alt="">                       
                                                </div>
                                            </div>
                                                    <span class="caret"></span>
                                                </a>
                                            </h3>
                                            @endif
                                            @if(isset($ch['children']))
                                            <ul class="dropdown-menu">
                                                @foreach($ch['children'] as $chch)
                                                <li>
                                                    <a class="dark-red-f"
                                                        href="{{route('category', [$chch['id'], $chch['url']])}}">{{$chch['title']}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                                @endforeach <li class="menu-item-has-children dropdown current-menu-ancestor">
                                        <a  class="pl-header" href="/contact">Контакт</a>
                                    </li>
                                </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="navbar-wrap" style="float:left !important;">
                                <nav class="collapse navbar-collapse primary-navbar-collapse" style="padding-left:0px;">
                                    <ul>
                                        <li>

                                            <div class="search-input">
                                                <form method="get" action="{{route('search')}}">
                                                    <input class="search_input" type="text" placeholder="Пребарај"
                                                        name="search" value="">
                                                    <input type="submit" name="submit" value="">
                                                </form>
                                            </div>
                                            <i id="searchbar" style="    color: #62BDAB;
                                      position: absolute;
                                        top: 10px;
                                          left: 70px;
                                       font-size: 24px;"
                                                class="fa fa-search hidden-lg hidden-sm hidden-md search-top-button prebaruvanje"></i>
                                            <div class="float-md left-line">
                                                <div style="display:none; position: absolute; top: 44px;z-index:9999;
                                        left: -75px; width:100%" class="search-input1" tabindex='1' id="searchModal">
                                                    <form method="get" class="searchform" action="{{route('search')}}">
                                                        <input id="fokus" class="inputce" type="text"
                                                            placeholder="Пребарај" name="search" value="">
                                                        {{--<input class="inputce" type="submit" name="submit" value="">--}}
                                                    </form>
                                                </div>
                                        </li>

                                        <li>
                                            <div class="cart">
                                                <a href="{{route('cart')}}" class="cartmain darkblue-f">
                                                    <span>
                                                        <?php
                                             $totalProducts = 0;
                                             $totalPrice = 0;
                                              ?> @if (Session::has('cart_products'))
                                                        @foreach(session()->get('cart_products') as $pid =>
                                                        $product)
                                                        <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                                        @endforeach
                                                        @endif
                                                    </span>
                                                    <div class="card-icon">
                                                        <img src="{{ url_assets('/shopathome/images/cart.png') }}"
                                                            alt="">
                                                        <div class="shop-items darkblue-b">
                                                            <span class="minicart-icon">
                                                                <i class="minicart-icon-svg elegant_icon_bag"></i>
                                                                <span data-amount-value>{{$totalProducts}}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    Кошничка
                                                </a>
                                                @if (Session::has('cart_products'))
                                                <div id="shoppingCart">
                                                    <div class="hover-cart">
                                                        <div class="hover-box">
                                                            @foreach(session()->get('cart_products') as $product)
                                                            <?php $product = (object)$product; ?>
                                                            <a href="{{$product->url}}">
                                                                {{--<img src="{{ url_assets('') }}/assets/shopathome/images/hover1.png"
                                                                alt=""
                                                                class="left-hover">--}}
                                                                <img src="{{$product->image}}" alt=""
                                                                    class="left-hover">
                                                            </a>
                                                            <div class="hover-details">
                                                                <p>{{$product->title}}</p>
                                                                <span>{{ number_format($product->price, 0, ',', '.')}}
                                                                    ден.</span>
                                                                <div class="quantity">Количина:
                                                                    {{$product->quantity}}</div>
                                                            </div>
                                                            @endforeach
                                                            <div class="clear"></div>
                                                        </div>
                                                        <div class="subtotal">
                                                            Вкупно: <span>{{$totalPrice}} ден.</span>
                                                        </div>
                                                        <a href="{{route('cart')}}" class="viewcard button-red">
                                                            Види
                                                            кошничка</a>
                                                    </div>
                                                </div>
                                                @else
                                                <div id="shoppingCart">
                                                    <div class="hover-cart">
                                                        <div class="hover-box">
                                                            <br>
                                                            <div class="subtotal">
                                                                Вашата кошничка е празна!
                                                            </div>
                                                        </div>
                                                        <a href="{{route('cart')}}" class="viewcard button-red">
                                                            Види
                                                            кошничка</a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-offset-8">
                            <div id="searchbar_hidden" class="search-input searchbar_hidden">
                                <form method="get" action="http://easyshop.test/search">
                                    <input class="search_input" type="text" placeholder="Пребарај" name="search"
                                        value="">
                                    <input type="submit" name="submit" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>