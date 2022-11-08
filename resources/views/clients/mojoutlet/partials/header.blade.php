<div class="hidden">
    <nav id="off-canvas-menu">
        <ul class="expander-list">
            <li class="dropdown dropdown-mega-menu">
                <span class="name">
                    <a href="{{route('home')}}">Дома</a>
                </span>
            </li>
            @foreach($menuCategories as $mc)
            <li>
                <span class="name">
                    @if(isset($mc['children']))
                        <span class="expander">-</span>
                    @endif
                    <a href="{{route('category',[$mc['id'],$mc['url']])}}"><span class="act-underline">{{$mc['title']}}</span></a>
                </span>
                @if(isset($mc['children']))
                <ul class="dropdown-menu" role="menu">
                    @foreach($mc['children'] as $ch)
                    <li class="">
                        <span class="image-link">
                        <a href="{{route('category',[$ch['id'],$ch['url']])}}">
                            <span class="figcaption">{{$ch['title']}}</span>
                        </a>
                        </span>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </nav>
</div>

<div class="header-wrapper">
    <header id="header">
        <div class="container">
            <div class="mobile-menu-off col-xs-12 text-right" style="height: 35px;">
                <div class="pre-header" style="height: 35px;">
                    <div class="container">
                        <div class="row" >
                            <!-- BEGIN TOP BAR LEFT PART -->
                            <div class="col-lg-12 col-md-12 col-sm-12 additional-shop-info" style="font-size: 13px;">
                                <ul class="list-unstyled list-inline">
                                    {{--<li><i class="fa fa-phone"></i> <strong style="color: #1FC0A0">(Viber/WhatsApp)</strong> <a href="tel:0038977400100" ><span>+389 77 400 100</span></a> </li>--}}
                                    <li><i class="fa fa-envelope"></i> <strong style="color: #9F8AC2;">E-mail: </strong><a class="color" href="mailto:info@shopathome.mk">info@shopathome.mk</a></li>
                                    <li><i class="fa fa-arrow-left"></i> <span style="color: black">Едноставно враќање на производи до 14 дена</span></li>
                                    <li><i class="fa fa-truck"></i> <span style="color: black">Достава низ цела Македонија за два работни дена</span></li>
    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row only-mobile">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <!-- logo start -->
                    <a class="logo-wrap" href="{{route('home')}}">
                        <img class="logo img-responsive" src="{{ url_assets('/mojoutlet/images/ShopHome.png') }}" />
                    </a>
                    <!-- logo end -->
                </div>
                <div class="col-sm-8 col-md-8 col-md-8 col-lg-8 col-xl-8 hidden-xs" style="padding: 15px;">
                    {{--<div class="col-md-4">--}}
                    {{--<img style="width: 100%;" src="{{ url_assets('/mojoutlet/images/slides/dostava.png') }}"/>--}}
                    {{--</div>--}}
                    <div class="hidden-md col-md-4">
                        {{--<img class="img-responsive" style="height: 70px;" src="{{ url_assets('/mojoutlet/images/slides/dostava.png') }}"/>--}}
                    </div>
                    <div class="hidden-md col-md-8">
                        {{--<img class="img-responsive" src="{{ url_assets('/mojoutlet/images/slides/lazybag.png') }}"/>--}}
                        <img class="pull-right img-responsive" style="height: 70px;" src="{{ url_assets('/mojoutlet/images/slides/dostava.png') }}"/>

                    </div>
                </div>
                </div>
            {{--</div>--}}
        </div>
        <div class="stuck-nav">
            <div class="container offset-top-5">
                <div class="row">
                    <div class="pull-left col-sm-9 col-md-9 col-lg-10">
                        <!-- navigation start -->
                        <nav class="navbar">
                            <div class="responsive-menu mainMenu">
                                <!-- Mobile menu Button-->
                                <div class="col-xs-2 visible-mobile-menu-on">
                                    <div class="expand-nav compact-hidden">
                                        <a href="#off-canvas-menu" class="off-canvas-menu-toggle">
                                            <div class="navbar-toggle">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="menu-text">МЕНИ</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- //end Mobile menu Button -->
                                <ul class="nav navbar-nav">
                                    <li class="dl-close"><a href="#"><span class="icon icon-close"></span>ЗАТВОРИ</a></li>
                                    <li>        
                                        <a class="site-logo" href="/"><img src="{{ url_assets('/mojoutlet/images/259 [Converted].png') }}"   alt="Alex Filipe" style="margin-top: -10px;"></a>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a id="main_category" href="{{route('home')}}" class="dropdown-toggle" data-toggle="dropdown"><span
                                                    class="act-underline">Дома</span></a>
                                    @foreach($menuCategories as $mc)
                                        <li class="dropdown dropdown-mega-menu" >
                                            <a id="main_category" href="{{route('category',[$mc['id'],$mc['url']])}}" class="dropdown-toggle" data-toggle="dropdown"><span
                                                        class="act-underline">{{$mc['title']}}</span></a>
                                            @if(isset($mc['children']))
                                                <ul class="dropdown-menu megamenu image-links-layout" role="menu">
                                                    @foreach($mc['children'] as $ch)
                                                        <li class="col-one-fourth">
														<span class="image-link">
														<a href="{{route('category',[$ch['id'],$ch['url']])}}">
														<span class="figure"><img style="height: 100px;" class="img img-responsive"
                                                                                  src="/uploads/category/{{$ch['image']}}"
                                                                                  alt=""/></span>
														<span class="figcaption">{{$ch['title']}}</span>
														</a>
														</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- navigation end -->
                    <div class="pull-right col-sm-3 col-md-3 col-lg-2">
                        <div class="text-right">
                            <!-- search start -->
                            <div class="search link-inline">
                                <a href="#" class="search__open"><span class="icon icon-search"></span></a>
                                <div class="search-dropdown">
                                    <form action="{{route('search')}}" method="get">
                                        <div class="input-outer">
                                            <input type="search" name="search" value="" maxlength="128"
                                                   placeholder="Пребарај:">
                                            <a href="#" class="search__close"><span class="icon icon-close"></span></a>
                                            <button type="submit" title="" class="icon icon-search"></button>

                                        </div>

                                    </form>
                                </div>
                            </div>

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
                            <div class="mdCartAlign cart link-inline">
                                <div class="dropdown text-right">
                                    <a class="dropdown-toggle">
                                        <span class="act-underline icon icon-shopping_basket"></span>
                                        <span class="badge badge--cart" data-amount-value>{{$totalProducts}}</span>
                                    </a>

                                        @if (Session::has('cart_products'))
                                    <div id="shoppingCart" class="dropdown-menu dropdown-menu--xs-full slide-from-top" role="menu">
                                        <div class="container">
                                            <div class="cart__top">Во кошничка:</div>
                                            <a href="#" class="icon icon-close cart__close"><span>ЗАТВОРИ</span></a>
                                            <ul>
                                                @foreach(session()->get('cart_products') as $product)
                                                    <?php $product = (object)$product; ?>
                                                <li class="cart__item">
                                                    <div class="cart__item__image pull-left"><a href="#"><img src="{{$product->image}}" alt="Shop Image">
                                                        </a>
                                                    </div>
                                                    <div class="cart__item__control">
                                                        <div class="cart__item__delete"><a href="{{URL::to('cart/remove/')}}/{{$product->id}}"
                                                                                           class="icon icon-delete"><span>Избриши</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="cart__item__info">
                                                        <div class="cart__item__info__title">
                                                            <h2 class="limit-txt" style="max-width:360px;"><a href="{{$product->url}}">{{$product->title}}</a></h2>
                                                        </div>
                                                        <div class="cart__item__info__price"><span class="info-label">Цена:</span><span>{{ number_format($product->price, 0, ',', '.')}} ден.</span>
                                                        </div>
                                                        <div class="cart__item__info__qty"><span style="padding-right:10px;"
                                                                    class="info-label">Количина:  </span><input style="border:none !important;" disabled type="text"
                                                                                                         class="input--ys"
                                                                                                         value='{{$product->quantity}}'/>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="cart__bottom">
                                                <?php
                                                $totalProducts = 0;
                                                $totalPrice = 0;
                                                ?>@if (Session::has('cart_products'))
                                                    @foreach(session()->get('cart_products') as $pid => $product)
                                                        <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                                    @endforeach
                                                @endif
                                                <div style="padding-right:0;color: #1FC0A0 !important;" class="cart__total">Вкупно: <span data-cart-total-price> {{$totalPrice}}</span>ден.</div>
                                                {{--<a href="#" class="btn btn--ys btn-checkout">Наплата<span--}}
                                                            {{--class="icon icon--flippedX icon-reply"></span></a>--}}
                                                <a href="{{route('cart')}}" class="btn btn--ys">
                                                    <span class="icon icon-shopping_basket"></span> Види кошничка
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                                <div id="shoppingCart" class="dropdown-menu dropdown-menu--xs-full slide-from-top" role="menu">
                                                    <div class="container">
                                                        <div class="cart__top">Вашата кошничка е моментално празна</div>
                                                        <a href="#" class="icon icon-close cart__close"><span>ЗАТВОРИ</span></a>
                                                        <div class="cart__bottom">
                                                            <a href="{{route('cart')}}" class="btn btn--ys"><span
                                                                        class="icon icon-shopping_basket"></span> Види кошничка</a>
                                                        </div>
                                                    </div>

                                                </div>
                                    </div>
                                        @endif
                                </div>
                            </div>
                            <!-- shopping cart end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
