<!-- Header Section Starts -->
<header id="header-area">
    <!-- Nested Row Starts -->
    <div class="row header-area-wrapper">
        <!-- Logo Starts -->
        <div class="col-md-4 col-xs-9 col-sm-4">
            <div id="logo" class="XSLogo home-logo">
                <a href="/"><img src="https://tehnopolis.mk/assets/tehnopolis/images/logo.png" alt="Tehnopolis" class="XSLogoImage img-responsive"></a>
            </div>
        </div>
        <!-- Logo Ends -->
        <!-- Header Right Starts -->
        <div class="col-md-8 col-xs-12 col-sm-8">
            <div class="row header-top">
                <!-- Header Links Starts -->
                <div class="col-xs-12">
                    <div class="header-links header-login-links">
                        <ul class="list-unstyled list-inline">

                            @if(auth()->check())
                                <li><a href="{{route('profiles.get')}}">ПРОФИЛ
                                    </a></li>
                                <li><a href="{{route('auth.logout.get')}}">ОДЈАВА</a>
                                </li>
                            @else
                                <li><a href="{{route('auth.login.get')}}">НАЈАВИ СЕ
                                    </a></li>
                                <li><a href="{{route('auth.register.get')}}">РЕГИСТРИРАЈ СЕ</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- Header Links Ends -->
                <!-- Currency & Languages Starts -->
                <!-- Currency & Languages Ends -->
            </div>
            <div class="row header-bottom">
                <!-- Search Starts -->
                <div class="col-md-7 col-xs-12 col-sm-6">
                    <form id="search" method="GET" action="{{route('search')}}">
                        <div class="input-group">
                            <input id="fokus" type="text" name="search" class="form-control input-lg" placeholder="Пребарај">
                            <span class="input-group-btn">
									<button class="btn btn-lg" type="submit">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
								  </span>
                        </div>
                    </form>
                </div>
                <!-- Search Ends -->

                <!-- Shopping Cart Starts -->
                <div class="col-md-5 col-xs-12 col-sm-6">
                    <i onclick="openModal()" style="padding: 11px;
                              position: absolute;
                              top: -50px;
                              font-size: 18px;
                              border: 1px solid #ccc;
                              background: #fff;
                              color: #666 !important;"
                       id="search-top-button" class="hidden-lg hidden-sm hidden-md fa fa-search"></i>
                    <div id="cart" class="btn-group btn-block cart-font">
                        <?php $totalPrice = 0; $totalProducts = 0;
                        ?>
                        @if (Session::has('cart_products'))
                            @foreach(session()->get('cart_products') as $pid => $product)
                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                            @endforeach
                        @endif

                        <a href="{{route('cart')}}"
                                class="btn btn-block btn-lg" >
                                <i data-amount="{{$totalProducts}}" class="fa fa-shopping-cart cart-button-icon"></i>
                            <div class="cart-button-text">
                                <span class="cart-font_1" style="margin-top: 12px">Кошничка:</span>
                                <span class="cart_font" style="margin-left: 20px; margin-top: 0px;">
                                    <span data-cart-total-price="">{{ number_format($totalPrice, 0, ',', '.')}}</span>
                                      <span>ден</span>
                                    </span>
                                <i class="fa fa-chevron-right cart-button-right" ></i>
                                {{--<i class="fa fa-caret-down cart-font" id="caret-down"></i>--}}
                            </div>
                        </a>
                </div>
                </div>
                <!-- Shopping Cart Ends -->
            </div>
        </div>
        <!-- Header Right Ends -->
    </div>
    <!-- Nested Row Ends -->
</header>
<!-- Header Section Ends -->
<!-- Main Menu Starts -->


<nav class="navbar navbar-inverse navbar-main-menu" id="hamburger-menu" style="background-color: #252a2f; z-index: 9998">

    <!-- Navbar brand -->
    <!-- Collapse button -->
    <button class="btn navbar-toggler toggler-example menu-button" type="button"
            data-toggle="collapse" data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent; color: white;">
        <span class="dark-blue-text" style="text-transform: uppercase"><i class="fa fa-bars fa-1x"></i> <span class="menu-button-text">категории</span></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent1" style="background-color: #252a2f; ">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            @foreach($menuCategories as $mc)
                <li class="paddingList dropdown" style="list-style: none;">
                    <a id="category_block" href="{{route('category', [$mc['id'], $mc['url']])}}" class="dropdown-toggle"
                       data-hover="dropdown" data-delay="10" style=" color: white;  ">{{$mc['title']}}</a>
                    @if(isset($mc['children']))
                        <div class="dropdown-menu">
                            <div class="dropdown-inner">
                                <ul class="list-unstyled">
                                    @foreach($mc['children'] as $ch)
                                        <li class="dropdown-toggle">
                                            <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                        </li>
                                        @if(isset($ch['children']))
                                            <div>
                                                <div>
                                                    <ul class="list-unstyled">
                                                        @foreach($ch['children'] as $chch)
                                                            <li>
                                                                <a href="{{route('category', [$chch['id'], $chch['url']])}}">
                                                                    <i class="fa fa-angle-right"></i> {{$chch['title']}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                </li>
                @endif
            @endforeach
        </ul>
        <!-- Links -->

    </div>
    <!-- Collapsible content -->

</nav>


<nav id="main-menu" class="navbar" role="navigation">
    <!-- Nav Header Starts -->

    <!-- Nav Header Ends -->
    <!-- Navbar Cat collapse Starts -->
    <div class="collapse navbar-collapse navbar-cat-collapse header-menu">
        <ul class="nav navbar-nav main-menu-navbar">
            <li>
            @if(isset($company_settings->meta_string_homepage) && !empty($company_settings->meta_string_homepage))
                <a href="/">{{$company_settings->meta_string_homepage}}</a>
            @else
                <a href="/" id="home">Дома</a>
            @endif
            </li>
            @foreach($menuCategories as $mc)
                <li class="dropdown header-menu-item">
                    <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                    @if(isset($mc['children']))
                        <div class="dropdown-menu">
                            <div class="dropdown-inner">
                                <ul class="list-unstyled">
                                    @foreach($mc['children'] as $ch)
                                        <li class="dropdown-toggle">
                                            <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                        </li>
                                        @if(isset($ch['children']))
                                            <div>
                                                <div>
                                                    <ul class="list-unstyled">
                                                        @foreach($ch['children'] as $chch)
                                                            <li>
                                                                <a href="{{route('category', [$chch['id'], $chch['url']])}}">
                                                                    <i class="fa fa-angle-right"></i> {{$chch['title']}}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>


