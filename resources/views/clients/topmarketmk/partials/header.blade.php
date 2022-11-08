<header id="header">
    <div id="header-top">
        <div class="hidden-xs hidden-sm hidden-md container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-top-left">
                        <ul id="top-links" class="clearfix">
                            <li><a  href="{{route('blog', [3, 'kako-da-naracham'])}}"><span class="top-icon top-icon-pencil"></span><span class="hide-for-xs">Како да нарачам? </span></a></li>
                            <li>Телефон/ Viber: <a href="tel:0038971670203"><span class="hide-for-xs"><i class="fa fa-phone"></i> 071/670-203</span></a></li>
                        </ul>
                    </div><!-- End .header-top-left -->
                    <div class="header-top-right">

                        {{--<div class="header-top-dropdowns pull-right">--}}
                            {{--<div class="btn-group dropdown-money">--}}
                                {{--<button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">--}}
                                    {{--<span class="hide-for-xs">US Dollar</span><span class="hide-for-lg">$</span>--}}
                                {{--</button>--}}
                                {{--<ul class="dropdown-menu pull-right" role="menu">--}}
                                    {{--<li><a href="#"><span class="hide-for-xs">Euro</span><span class="hide-for-lg">&euro;</span></a></li>--}}
                                    {{--<li><a href="#"><span class="hide-for-xs">Pound</span><span class="hide-for-lg">&pound;</span></a></li>--}}
                                {{--</ul>--}}
                            {{--</div><!-- End .btn-group -->--}}
                            {{--<div class="btn-group dropdown-language">--}}
                                {{--<button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">--}}
                                    {{--<span class="flag-container"><img src="/assets/topmarketmk/images/england-flag.png" alt="flag of england"></span>--}}
                                    {{--<span class="hide-for-xs">English</span>--}}
                                {{--</button>--}}
                                {{--<ul class="dropdown-menu pull-right" role="menu">--}}
                                    {{--<li><a href="#"><span class="flag-container"><img src="/assets/topmarketmk/images/italy-flag.png" alt="flag of england"></span><span class="hide-for-xs">Italian</span></a></li>--}}
                                    {{--<li><a href="#"><span class="flag-container"><img src="/assets/topmarketmk/images/spain-flag.png" alt="flag of italy"></span><span class="hide-for-xs">Spanish</span></a></li>--}}
                                    {{--<li><a href="#"><span class="flag-container"><img src="/assets/topmarketmk/images/france-flag.png" alt="flag of france"></span><span class="hide-for-xs">French</span></a></li>--}}
                                    {{--<li><a href="#"><span class="sm-separator"><img src="/assets/topmarketmk/images/germany-flag.png" alt="flag of germany"></span><span class="hide-for-xs">German</span></a></li>--}}
                                {{--</ul>--}}
                            {{--</div><!-- End .btn-group -->--}}
                        {{--</div><!-- End .header-top-dropdowns -->--}}

                        <div class="header-text-container pull-right">
                            <p class="header-text">Плаќање: </p>
                            <p class="header-link"><i class="fa fa-truck"></i><a>  При достава</a></p>
                        </div><!-- End .pull-right -->
                    </div><!-- End .header-top-right -->
                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End #header-top -->

    <div id="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 logo-container">
                    <h1 class="logo clearfix">
                        <a href="{{route('home')}}"><img class="logoImage" src="{{ url_assets('/topmarketmk/images/logo.png') }}"></a>
                    </h1>
                </div><!-- End .col-md-5 -->
                <div class="col-md-6 col-sm-6 col-xs-12 header-inner-right">

                    <form method="GET" action="{{route('search')}}"
                          class="laptop form-inline" role="form">
                        <div class="form-group">
                            <input style="border-radius:20px 0px 0px 20px;" type="text" name="search" class="customInput form-control" placeholder="Пребарувајте">
                        </div><!-- End .form-inline -->
                        <button style="border-radius:0px 20px 20px 0px;" type="submit" class="quick-search btn btn-custom"></button>
                    </form>

                </div><!-- End .col-md-7 -->

                <div class="col-md-3 col-sm-3 col-xs-12 header-inner-right">
                    <div class="laptop dropdown-cart-menu-container pull-right">
                        <div class="btn-group dropdown-cart">
                            <?php
                            $totalProducts = 0;
                            $totalPrice = 0;
                            ?>@if (Session::has('cart_products'))
                                @foreach(session()->get('cart_products') as $pid => $product)
                                    <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                @endforeach
                            @endif
                            <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">
                                <span class="cart-menu-icon"></span>
                                <span data-amount-value>{{$totalProducts}}</span> Продукт(и)
                            </button>
                            @if (Session::has('cart_products'))
                                <div class="dropdown-menu dropdown-cart-menu pull-right clearfix" role="menu">
                                    <ul id="shoppingCart" class="dropdown-cart-product-list">
                                        <p class="dropdown-cart-description">Скоро додадени продукти.</p>
                                        <div style="height:300px; overflow-y: auto">
                                            @foreach(session()->get('cart_products') as $product)
                                                <?php $product = (object)$product; ?>
                                                <li class="item clearfix">
                                                    <a href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif" title="Delete item" class="delete-item"><i class="fa fa-times"></i></a>
                                                    <figure>
                                                        <a href="{{$product->url}}"><img src="{{$product->image}}" alt="phone 4"></a>
                                                    </figure>
                                                    <div class="dropdown-cart-details">
                                                        <p class="item-name">
                                                            <a href="{{$product->url}}">{{$product->title}} </a>
                                                        </p>

                                                        <p>
                                                            {{$product->quantity}}x
                                                            <span class="item-price">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </div>
                                        <?php
                                        $totalProducts = 0;
                                        $totalPrice = 0;
                                        ?>@if (Session::has('cart_products'))
                                            @foreach(session()->get('cart_products') as $pid => $product)
                                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                            @endforeach
                                        @endif
                                        <ul class="dropdown-cart-total">
                                            <li><span class="dropdown-cart-total-title">Вкупно:</span><span data-cart-total-price>{{$totalPrice}}</span>мкд.</li>
                                        </ul><!-- .dropdown-cart-total -->
                                        <div class="dropdown-cart-action">
                                            <p><a href="{{route('cart')}}" class="btn btn-custom-2 btn-block">кошничка</a></p>
                                        </div><!-- End .dropdown-cart-action -->
                                    </ul>

                                </div><!-- End .dropdown-cart -->
                            @else
                                <div class="dropdown-menu dropdown-cart-menu pull-right clearfix" role="menu">
                                    <ul id="shoppingCart" class="dropdown-cart-product-list">
                                        <p class="dropdown-cart-description">Вашата кошничка е празна.</p>
                                    </ul>
                                </div>
                            @endif
                        </div><!-- End .btn-group -->
                    </div><!-- End .dropdown-cart-menu-container -->
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div id="main-nav-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 clearfix">

                        <nav id="main-nav">
                            <div id="responsive-nav">
                                <div id="responsive-nav-button">
                                    МЕНИ <span id="responsive-nav-button-icon"></span>
                                </div><!-- responsive-nav-button -->
                            </div>
                            <ul class="menu clearfix">
                                <li>
                                    <a class="active" href="{{route('home')}}">ДОМА</a>
                                </li>
                                @foreach($menuCategories as $mc)
                                    @if(isset($mc['children']))
                                        <li class="parent">
                                    @else
                                        <li>
                                            @endif
                                            <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                            @if(isset($mc['children']))
                                                <ul class="sub-menu">
                                                    @foreach($mc['children'] as $ch)
                                                        <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        @endforeach
                            </ul>
                        </nav>

                        <div id="quick-access">
                            <div class="mobile dropdown-cart-menu-container pull-right">
                                <div class="btn-group dropdown-cart">
                                    <?php
                                    $totalProducts = 0;
                                    $totalPrice = 0;
                                    ?>@if (Session::has('cart_products'))
                                        @foreach(session()->get('cart_products') as $pid => $product)
                                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                        @endforeach
                                    @endif
                                    <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">
                                        <span class="cart-menu-icon"></span>
                                        <span data-amount-value>{{$totalProducts}}</span> Продукт(и)
                                    </button>
                                    @if (Session::has('cart_products'))
                                    <div class="dropdown-menu dropdown-cart-menu pull-right clearfix" role="menu">
                                        <ul id="shoppingCart" class="dropdown-cart-product-list">
                                            <p class="dropdown-cart-description">Скоро додадени продукти.</p>
                                            <div style="height:300px; overflow-y: auto">
                                            @foreach(session()->get('cart_products') as $product)
                                                <?php $product = (object)$product; ?>
                                                <li class="item clearfix">
                                                    <a href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif" title="Delete item" class="delete-item"><i class="fa fa-times"></i></a>
                                                    <figure>
                                                        <a href="{{$product->url}}"><img src="{{$product->image}}" alt="phone 4"></a>
                                                    </figure>
                                                    <div class="dropdown-cart-details">
                                                        <p class="item-name">
                                                            <a href="{{$product->url}}">{{$product->title}} </a>
                                                        </p>

                                                        <p>
                                                            {{$product->quantity}}x
                                                            <span class="item-price">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </div>
                                        <?php
                                        $totalProducts = 0;
                                        $totalPrice = 0;
                                        ?>@if (Session::has('cart_products'))
                                            @foreach(session()->get('cart_products') as $pid => $product)
                                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                            @endforeach
                                        @endif
                                        <ul class="dropdown-cart-total">
                                            <li><span class="dropdown-cart-total-title">Вкупно:</span><span data-cart-total-price>{{$totalPrice}}</span>мкд.</li>
                                        </ul><!-- .dropdown-cart-total -->
                                        <div class="dropdown-cart-action">
                                            <p><a href="{{route('cart')}}" class="btn btn-custom-2 btn-block">кошничка</a></p>
                                        </div><!-- End .dropdown-cart-action -->
                                        </ul>

                                    </div><!-- End .dropdown-cart -->
                                    @else
                                        <div class="dropdown-menu dropdown-cart-menu pull-right clearfix" role="menu">
                                            <ul id="shoppingCart" class="dropdown-cart-product-list">
                                                <p class="dropdown-cart-description">Вашата кошничка е празна.</p>
                                            </ul>
                                        </div>
                                    @endif
                                </div><!-- End .btn-group -->
                            </div><!-- End .dropdown-cart-menu-container -->

                            <form method="GET" action="{{route('search')}}"
                                    class="mobile form-inline quick-search-form" role="form">
                                <div class="form-group">
                                    <input type="text" name="search" class="customInput form-control" placeholder="Пребарувајте">
                                </div><!-- End .form-inline -->
                                <button type="submit"  class="quick-search btn btn-custom"></button>
                            </form>
                        </div><!-- End #quick-access -->
                    </div><!-- End .col-md-12 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

        </div><!-- End #nav -->
    </div><!-- End #inner-header -->
</header><!-- End #header -->
