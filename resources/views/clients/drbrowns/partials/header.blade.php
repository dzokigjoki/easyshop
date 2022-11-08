<div style="background-color:#1481BD;" class="hidden-xssmmd pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-12 col-sm-12 col-lg-12 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li style="border-right: none;">Контакт:</li>
                    <li><a href="tel:0038971297619" ><i class="fa fa-phone"> </i><span>071/297-619</span></a></li>
                    <li style="border-right: none;">Е-пошта:</li>
                    <li><a href="mailto:marija@drbrowns.mk"><i class="fa fa-envelope"> </i><span>marija@drbrowns.mk</span></a></li>
                    <li style="border-right: none;"><a>Начин на плаќање:</a></li>
                    <li><a href="" ><i class="fa fa-truck"></i><span>При достава</span></a></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
        </div>
    </div>
</div>
<div id="myHeader" class="header-wrapper">

    <header id="myHeader" class="header container fadeInDown ">

        <div class="logo-wrapper">
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{ url_assets('/drbrowns/images/logoDRB.png') }}"></a>
            </div>
        </div>


        <!-- Show quick Види кошничка if WooCommerce is activated and enabled from theme options -->
        <div class="mini-cart">
            <div class="cart-inner">
                <a href="{{route('cart')}}" class="cart-link">
                    <div class="cart-icon">
                        <i style="color: white;" class="fa fa-shopping-cart"></i>
                        <span>
                                              <?php
                            $totalProducts = 0;
                            $totalPrice = 0;
                            ?>@if (Session::has('cart_products'))
                                @foreach(session()->get('cart_products') as $pid => $product)
                                    <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                @endforeach
                            @endif
                                                  {{--<span class="blue" title="prices"><i style="font-style: normal;" data-amount-value>{{$totalProducts}}</i> Производи</span>--}}
                        <strong style="background: white; color:#1481BD;" data-amount-value>{{$totalProducts}}</strong>
                        </span>
                    </div>
                </a>
                <div style="width:370px;" id="shoppingCart" class="nav-dropdown" style="display: none;">
                    @if (Session::has('cart_products'))
                        <div class="nav-dropdown-inner">
                            <ul class="cart_list paddingCart scroller">
                                <h5 class="pull-left">Во кошничка</h5><br><br>
                                @foreach(session()->get('cart_products') as $product)
                                    <?php $product = (object)$product; ?>
                                    <li style="min-height: 60px; list-style-type:none; text-align: left !important;">
                                        <a class="pull-left" href="{{$product->url}}"><img class="marginRight" style="float:left; height: 37px; width: 34px;"
                                                                                           src="{{$product->image}}"/><span class="marginRight" style="color: #1481BD !important; font-size:12px;">x{{$product->quantity}}</span></a>
                                        <h3 class="marginRight alignCart"><b>
                                                <a style="font-size: 13px; font-weight: normal;color: #707070"
                                                   href="{{$product->url}}">{{$product->title}}</a></b>
                                        </h3>
                                        <span style="color:#1481BD; text-align: left !important;">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>

                                    </li>
                                @endforeach
                            </ul>
                            <div class="minicart_total_checkout">
                                <?php
                                $totalProducts = 0;
                                $totalPrice = 0;
                                ?>@if (Session::has('cart_products'))
                                    @foreach(session()->get('cart_products') as $pid => $product)
                                        <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                    @endforeach
                                @endif

                            </div>
                            <a href="{{route('cart')}}" class="button expanded text-uppercase">Види кошничка</a>
                        </div>
                    @else
                        <div id="shoppingCart">
                            <div id="shoppingCart">
                                <div class="nav-dropdown-inner">
                                    <div class="cart_list">
                                        <h5>Вашата кошничка моментално е празна</h5>
                                    </div>
                                    <div class="event flat-reset">
                                        <a href="{{route('cart')}}" class="button expanded text-uppercase">кошничка</a>
                                        <!-- <a href="#" class="flat-right">Плати</a> -->
                                    </div>
                                    <br>

                                </div>

                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>


        <!-- product search form -->
        <div class="inspiry-search-wrapper">
                <form method="GET" class="search-form" action="{{route('search')}}"
                      style="width: 400px;margin-top: 5px;">
                <input id="fokus" type="search" class="search-field" placeholder="Пребарај Продукти..." value="" name="search" title="Search For:" />
                <input type="hidden" name="post_type" value="product" />
                    <button style="width:100%;" class="button text-uppercase" type="submit">Пребарај</button>
                </form>
            <a class="search-button" href=""><i style="color: white;" class="fa fa-search"></i></a>
        </div>
        {{--style="color:#1481BD !important;"--}}

        <!-- Main Menu -->
        <div style="background: #1481BD !important;" class="main-menu-wrapper">
            <nav id="nav" class="main-menu nav-collapse clearfix">
                <ul class="clearfix">
                    <li class="current-menu-item">
                        <a href="{{route('home')}}">Почетна</a>
                    </li>
                    <li class="parent">
                        <a href="{{route('home')}}">Информации</a>
                        <ul style="" class="whiteBack sub-menu">
                            <li><a class="iPadmax iPadmin hoverLink" href="{{route('blog', [1, 'nagradi'])}}">Награди</a></li>
                            <li><a class="iPadmax iPadmin hoverLink" href="{{route('blog',[6,'zoshto-drbrowns?'])}}">Зошто DrBrowns?</a></li>
                            {{--<listyle="padding-bottom: 10px;" class=""><a href="/">Локација</a></li>--}}
                            <li><a class="iPadmax iPadmin hoverLink" href="{{route('blog',[5,'kade-da-kupime'])}}">Каде да купиме?</a></li>
                            <li><a class="iPadmax iPadmin hoverLink" href="{{route('blog',[3,'faqs'])}}">FAQs</a></li>
                        </ul>
                    </li>
                    @foreach($menuCategories as $mc)
                        @if(isset($mc['children']))
                            <li class="parent">
                        @else
                            <li>
                                @endif
                                <a class="" href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                @if(isset($mc['children']))
                                    <ul style="" class="whiteBack sub-menu">
                                        @foreach($mc['children'] as $ch)
                                            <li><a class="iPadmax iPadmin hoverLink" style="" href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @break
                    @endforeach
                </ul>
            </nav>
        </div>


        <div class="clearfix"></div>

        <!-- product search form for mobile screens -->
        <div class="row mobile-search-wrapper">
            <div class="col-xs-12">
                <form method="get" class="mobile-search-form" action="{{route('search')}}">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-8 field-wrapper">
                            <input type="search" class="mobile-search-field" placeholder="Пребарај Продукти..." value="" name="search" title="Search For:" />
                        </div>
                        <div class="col-sm-2 button-wrapper">
                            <input type="submit" class="mobile-search-button" value="Пребарај" />
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <input type="hidden" name="post_type" value="product" />
                </form>
            </div>
        </div>

    </header>

    <div class="header-border-bottom"></div>

</div>