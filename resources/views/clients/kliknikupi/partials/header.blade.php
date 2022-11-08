<nav class="panel-menu">
    <ul>
        <li><a href="{{route('home')}}">Дома</a></li>
        @foreach($menuCategories as $mc)
            <li>
                <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                @if(isset($mc['children']))
                    <ul>
                        @foreach($mc['children'] as $ch)
                            <li><a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach

    </ul>
    <div class="mm-navbtn-names" style="display:none">
        <div class="mm-closebtn">Затвори</div>
        <div class="mm-backbtn">Назад</div>
    </div>
</nav>
<header class="no-shadow">
    <!-- mobile-header -->
    <div class="mobile-header">
        <div class="container-fluid text-center">
            <!-- logo -->
            <div class="logo">
                <a href="/"><img src="/assets/kliknikupi/images/logo-mobile.png" alt=""/></a>
            </div>
            <!-- /logo -->
        </div>
        <div class="container-fluid top-line">
            <div class="pull-left">
                <div class="mobile-parent-menu">
                    <div class="mobile-menu-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="menu-text">
								Категории
								</span>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <div class="mobile-parent-cart"></div>
                <!-- search -->
                <div class="search">
                    <a href="#" class="search-open"><span class="icon icon-search"></span></a>

                    <div class="search-dropdown">
                        <form class="" method="GET" action="{{route('search')}}">
                            <div class="input-outer">
                                <input type="search" name="search" value="" maxlength="128"
                                       placeholder="Внесете клучен збор..">
                                <button type="submit" class="btn-search"><span>Пребарај</span></button>
                            </div>
                            <a href="#" class="search-close"><span class="icon icon-close"></span></a>
                        </form>
                    </div>
                </div>
                <!-- /search -->
            </div>
        </div>
    </div>
    <!-- /mobile-header -->
    <!-- desktop-header -->
    <div class="desktop-header header-02">
        <div class="top-line">
            <div class="container">
                <div class="pull-left">
                    <!-- logo -->
                    <div class="logo">
                        <a href="/"><img src="/assets/kliknikupi/images/logo.png" /></a>
                    </div>
                    <!-- /logo -->
                </div>
                <div class="pull-right">
                    <!-- box-info -->
                    <div class="box-info box-info-telephone">
                        <div class="telephone">
                            <a href="tel:0038970377597">
                                <span class="icon icon-call"></span>071/670-203
                            </a>
                        </div>
                        <div class="time">
                            <a href="mailto:info@topmarketmk.mk">info@topmarketmk.mk</a>
                        </div>
                    </div>
                    <!-- /box-info -->
                    <!-- box-wishlist -->

                    <!-- /box-wishlist -->
                    <!-- cart -->
                    <div class="main-parent-cart">
                        <div class="cart">
                            <div class="dropdown" id="cart-hover">
                                <?php
                                $totalProducts = 0;
                                if (Session::has('cart_products')) {
                                    foreach (session()->get('cart_products') as $product) {
                                        $product = (object)$product;
                                        $totalProducts = $totalProducts + $product->quantity;
                                    }
                                }
                                ?>
                                <a class="dropdown-toggle">
                                    <span class="icon icon-shopping_basket icon-cart-top"
                                          data-amount="{{$totalProducts}}"></span>
                                    {{--<span class="badge badge-cart">2</span>--}}
                                    <div class="dropdown-label hidden-sm hidden-xs">Кошничка</div>
                                </a>

                                <div class="dropdown-menu" id="dd-hover">
                                    <a href="#" class="icon icon-close cart-close" style="z-index: 99"></a>

                                    <div id="shoppingCart">
                                        @if (Session::has('cart_products'))
                                            <div class="top-title">Во вашата кошничка</div>
                                            <div class="container">
                                                <table>
                                                    @foreach(session()->get('cart_products') as $product)

                                                        <?php $product = (object)$product; ?>
                                                        <tr class="dropdown-tr">
                                                            <td class="img dropdown-td">
                                                                <a href="{{$product->url}}"><img
                                                                            src="{{$product->image}}"/></a>
                                                            </td>
                                                            <td class="dropdown-td">
                                                            <span><b>
                                                                    <a href="{{$product->url}}">{{$product->title}}</a></b>
                                                            </span>
                                                            </td>
                                                            <td class="dropdown-td">
                                                                {{ number_format($product->price, 0, ',', '.')}} мкд.
                                                            </td>
                                                            <td class="dropdown-td">
                                                                x{{$product->quantity}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                <br>
                                                <a href="{{URL::to('/cart')}}" class="btn icon-btn-left">
                                                    <span class="icon icon-shopping_cart"></span>Види кошничка</a>
                                            </div>
                                            @else
                                                <div id="shoppingCart" class="container">
                                                    Вашата кошничка моментално е празна<br><br>
                                                    <a href="{{URL::to('/cart')}}" class="btn icon-btn-left">
                                                        <span class="icon icon-shopping_cart"></span>Кошничка
                                                    </a>
                                                </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /cart -->
                </div>
            </div>
        </div>
        <div class="fill-bg-base">
            <div class="container">
                <div class="pull-left">
                    <div class="menu-parent-box">
                        <!-- header-menu -->
                        <nav class="header-menu">
                            <ul>
                                <li class="dropdown"><a href="/">Дома</a></li>
                                @foreach($menuCategories as $mc)
                                    <li class="dropdown">
                                        <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                        @if(isset($mc['children']))
                                            <div class="dropdown-menu">
                                                <ul class="image-links-layout">
                                                    @foreach($mc['children'] as $ch)
                                                        <li>
                                                            <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}
                                                                <span class="figure">
                                                                    <img data-src="/uploads/category/{{$ch['image']}}" />
                                                                </span>
                                                                <span class="figcaption">{{$ch['title']}}</span>
                                                            </a>

                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                        <!-- /header-menu -->
                    </div>
                </div>
                <div class="pull-right">
                    <!-- search -->
                    <div class="search">
                        <a href="#" class="search-open"><span class="icon icon-search"></span></a>

                        <div class="search-dropdown">
                            <form class="" method="GET" action="{{route('search')}}" id="search-bar">
                                <div class="input-outer">
                                    <input type="search" name="search" value="" maxlength="128"
                                           placeholder="Внесете клучен збор...">
                                    <button type="submit" class="btn-search">Пребарај</button>
                                </div>
                                <a href="#" class="search-close"><span class="icon icon-close"></span></a>
                            </form>
                        </div>
                    </div>
                    <!-- /search -->
                </div>
            </div>
        </div>
    </div>
    <!-- /desktop-header -->
    <!-- stuck nav -->
    <div class="stuck-nav">
        <div class="container">
            <div class="pull-left">
                <div class="stuck-menu-parent-box"></div>
            </div>
            <div class="pull-right">
                <div class="stuck-cart-parent-box"></div>
            </div>
        </div>
    </div>
    <!-- /stuck nav -->
</header>

