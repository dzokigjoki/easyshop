<header class="main-header_area">

    <div class="main-header">
        <div class="header-search-overlay hidden" style="opacity: 1;">
            <div class="container">
                <div class="header-search-overlay-wrap">
                    <form class="searchform" method="get" action="{{route('search')}}">
                        <input type="search" class="searchinput" name="search" value="" placeholder="Пребарај...">
                        <input type="submit" class="searchsubmit hidden" value="Пребарај">
                    </form>
                    <button type="button" class="close">
                        <span id="search_close" aria-hidden="true" class="fa fa-times"></span>
                        <span class="sr-only">Затвори</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="container width_nav">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-header_nav position-relative">
                        <div class="header-logo_area">
                            <a href="/">
                                <img src="{{url_assets('/dobra_voda/images/logo.jpg')}}" alt="Header Logo">
                            </a>
                        </div>
                        <div class="main-menu_area d-none d-lg-block">
                            <nav class="main-nav d-flex justify-content-center">
                                <ul>
                                    @foreach ($menuCategories as $menuCategory)
                                    @if($menuCategory['title'] != "Колекции")
                                    <li><a href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}">{{$menuCategory['title']}}</a>
                                        @if(isset($menuCategory['children']))
                                        <ul class="quicky-dropdown dropdown_menu">
                                            @foreach($menuCategory['children'] as $ch)
                                            <li>
                                                <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endif
                                    @endforeach
                                    <li class="float_right mr_7"><a href="/kontakt">Контакт</a></li>
                                    <li class="float_right"><a href="/za-nas">За нас</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right_area">
                            <ul class="align_center">
                                <li>
                                    <a class="searchBar search-btn">
                                        <i class="zmdi zmdi-search"></i>
                                    </a>
                                </li>
                                <li class="minicart-wrap">
                                    <?php
                                    $sessionProducts = session('cart_products');

                                    if (isset($sessionProducts)) {
                                        $total = count(session('cart_products'));
                                    } else {
                                        $total = 0;
                                    }
                                    ?>
                                    <a href="/cart" class="minicart-btn">
                                        <div class="minicart-count_area">
                                            <i class="zmdi zmdi-mall"></i>
                                            <p class="total-price" data-amount-value>{{$total}}</p>
                                        </div>
                                    </a>
                                    <div class="minicart" id="shoppingCart">
                                        @include('clients.dobra_voda.cart-partial')
                                        <p class="zabeleski text-center">Потребна е минимална нарачка од 600 денари</p>
                                    </div>
                                </li>
                                <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                        <i class="zmdi zmdi-menu"></i>
                                    </a>
                                </li>
                                <li class="dropdown-holder user-setting_wrap">
                                    @if(auth()->check())
                                    <?php
                                    $first_name = auth()->user()->first_name;
                                    $last_name = auth()->user()->last_name;
                                    $initials = strtoupper(mb_substr($first_name, 0, 1) . " " . mb_substr($last_name, 0, 1));
                                    ?>
                                    <a class="align_center"><span class="loggedUser">{{ $initials }}</span></a>
                                    @else
                                    <a href="javascript:void(0)"><i class="zmdi zmdi-account-o"></i></a>
                                    @endif
                                    <ul class="quicky-dropdown dropdown_login">
                                    @if(auth()->check())
                                        <li class="position-relative"><a href="/profile">Профил</a>
                                        </li>
                                        <li class="position-relative"><a href="{{route('auth.logout.get')}}">Одјава</a>
                                        </li>
                                        @else
                                        <li class="position-relative"><a href="/login">Најава</a>
                                        </li>
                                        <li class="position-relative"><a href="/register">Регистрација</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close white-close_btn"><i class="zmdi zmdi-close"></i></a>
                <div class="offcanvas-inner_logo">
                    <a href="index.html">
                        <img src="{{url_assets('/dobra_voda/images/logo1.png')}}" alt="Header Logo">
                    </a>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        @foreach ($menuCategories as $menuCategory)
                        @if(isset($menuCategory['children']))
                        <li class="menu-item-has-children"><a href="#"><span class="mm-text">{{$menuCategory['title']}}</span></a>
                            <ul class="sub-menu">
                                @foreach($menuCategory['children'] as $ch)
                                <li>
                                    <a href="{{route('category', [$ch['id'], $ch['url']])}}">
                                        <span class="mm-text">{{$ch['title']}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @else

                        <li><a href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}"><span class="mm-text">{{$menuCategory['title']}}</span></a></li>

                        @endif
                        @endforeach
                        <li><a href="/za-nas">За нас</a></li>
                        <li><a href="/kontakt">Контакт</a></li>
                    </ul>
                </nav>
                <nav class="offcanvas-navigation user-setting_area">
                    <ul class="mobile-menu">
                        @if(auth()->check())
                        <li class="position-relative"><a href="/profile">Профил</a>
                        </li>
                        <li class="position-relative"><a href="{{route('auth.logout.get')}}">Одјава</a>
                        </li>
                        @else
                        <li class="position-relative"><a href="/login">Најава</a>
                        </li>
                        <li class="position-relative"><a href="/register">Регистрација</a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="global-overlay"></div>
</header>