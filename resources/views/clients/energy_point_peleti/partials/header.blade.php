<header class="header-container header-type-default header-default-center header-navbar-default header-scroll-resize">
    <div class="navbar-container">
        <div class="navbar navbar-default  navbar-scroll-fixed">
            <div class="navbar-default-wrap">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs col-sm-2 col-left-topbar">
                            <div class="left-topbar">
                                <div class="navbar-search">
                                    <a class="navbar-search-button" href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <div class="search-form-wrap show-popup hide"></div>
                                </div>
                                <?php
                                    $totalProducts = 0;
                                    if (\Session::has('cart_products')) {
                                        foreach (session()->get('cart_products') as $product) {
                                            $product = (object)$product;
                                            $totalProducts = $totalProducts + $product->quantity;
                                        }
                                    }
                                ?>
                                <div class="navbar-minicart navbar-minicart-topbar">
                                    <div class="navbar-minicart">
                                        <a class="minicart-link" href="{{URL::to('/cart')}}">
                                            <span class="minicart-icon">
                                                <svg style="width: 25px;" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 459.529 459.529"
                                                    style="enable-background:new 0 0 459.529 459.529;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path d="M17,55.231h48.733l69.417,251.033c1.983,7.367,8.783,12.467,16.433,12.467h213.35c6.8,0,12.75-3.967,15.583-10.2
                                                                l77.633-178.5c2.267-5.383,1.7-11.333-1.417-16.15c-3.117-4.817-8.5-7.65-14.167-7.65H206.833c-9.35,0-17,7.65-17,17
                                                                s7.65,17,17,17H416.5l-62.9,144.5H164.333L94.917,33.698c-1.983-7.367-8.783-12.467-16.433-12.467H17c-9.35,0-17,7.65-17,17
                                                                S7.65,55.231,17,55.231z"></path>
                                                            <path d="M135.433,438.298c21.25,0,38.533-17.283,38.533-38.533s-17.283-38.533-38.533-38.533S96.9,378.514,96.9,399.764
                                                                S114.183,438.298,135.433,438.298z"></path>
                                                            <path d="M376.267,438.298c0.85,0,1.983,0,2.833,0c10.2-0.85,19.55-5.383,26.35-13.317c6.8-7.65,9.917-17.567,9.35-28.05
                                                                c-1.417-20.967-19.833-37.117-41.083-35.7c-21.25,1.417-37.117,20.117-35.7,41.083
                                                                C339.433,422.431,356.15,438.298,376.267,438.298z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg><span data-amount-value>{{$totalProducts}}</span></span>
                                        </a>
                                        <div class="minicart" id="shoppingCart">
                                            @include('clients.energy_point_peleti.cart-partial')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-2 col-right-topbar">
                            <div class="right-topbar">
                                {{-- <div class="user-wishlist">
                                    <a href="wishlist.html"><i class="fa fa-heart-o"></i> My Wishlist</a>
                                </div>
                                <div class="user-login">
                                    <ul class="nav top-nav">
                                        <li class="menu-item">
                                            <a data-rel="loginModal" href="#"><i class="fa fa-user"></i> Login</a>
                                        </li>
                                    </ul>
                                </div> --}}
                                <a class="navbar-brand" href="/">
                                    <img class="logo" alt="Energy Point Peleti" id="header-desktop-logo"
                                        src="{{url_assets('/energy_point_peleti/images/logo.png')}}">
                                    <img class="logo-fixed" alt="Energy Point Peleti"
                                        src="{{url_assets('/energy_point_peleti/images/logo.png')}}">
                                    <img id="logo-mobile" class="logo-mobile" alt="Energy Point Peleti"
                                        src="{{url_assets('/energy_point_peleti/images/logo.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 navbar-default-col">
                            <div class="navbar-wrap">
                                <div class="navbar-header">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <button type="button" class="navbar-toggle">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar bar-top"></span>
                                                <span class="icon-bar bar-middle"></span>
                                                <span class="icon-bar bar-bottom"></span>
                                            </button>
                                        </div>
                                        <div class="col-xs-4 visible-xs text-center">
                                            <a href="/">
                                                <img id="mobile-logo"
                                                    src="{{url_assets('/energy_point_peleti/images/logo.png')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a class="navbar-search-button search-icon-mobile" href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <a class="cart-icon-mobile" href="/cart">
                                                <svg style="width: 25px;" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 459.529 459.529"
                                                    style="enable-background:new 0 0 459.529 459.529;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path d="M17,55.231h48.733l69.417,251.033c1.983,7.367,8.783,12.467,16.433,12.467h213.35c6.8,0,12.75-3.967,15.583-10.2
                                                        l77.633-178.5c2.267-5.383,1.7-11.333-1.417-16.15c-3.117-4.817-8.5-7.65-14.167-7.65H206.833c-9.35,0-17,7.65-17,17
                                                        s7.65,17,17,17H416.5l-62.9,144.5H164.333L94.917,33.698c-1.983-7.367-8.783-12.467-16.433-12.467H17c-9.35,0-17,7.65-17,17
                                                        S7.65,55.231,17,55.231z"></path>
                                                            <path d="M135.433,438.298c21.25,0,38.533-17.283,38.533-38.533s-17.283-38.533-38.533-38.533S96.9,378.514,96.9,399.764
                                                        S114.183,438.298,135.433,438.298z"></path>
                                                            <path d="M376.267,438.298c0.85,0,1.983,0,2.833,0c10.2-0.85,19.55-5.383,26.35-13.317c6.8-7.65,9.917-17.567,9.35-28.05
                                                        c-1.417-20.967-19.833-37.117-41.083-35.7c-21.25,1.417-37.117,20.117-35.7,41.083
                                                        C339.433,422.431,356.15,438.298,376.267,438.298z"></path>
                                                        </g>
                                                    </g>
                                                </svg><span data-amount-value>{{$totalProducts}}</span></span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <nav class="collapse navbar-collapse primary-navbar-collapse">
                                    <ul class="nav navbar-nav primary-nav">
                                        @foreach($menuCategories as $mc)
                                        @if(isset($mc['children']))
                                        <li class="menu-item-has-children dropdown">
                                            @else
                                        <li>
                                            @endif
                                            <a href="{{route('category', [$mc['id'], $mc['url']])}}"
                                                class="dropdown-hover">
                                                <span class="underline">{{$mc['title']}}</span>
                                                @if(isset($mc['children']))
                                                <span class="caret"></span>
                                                @endif
                                            </a>
                                            @if(isset($mc['children']))
                                            <ul class="dropdown-menu">
                                                @foreach($mc['children'] as $ch)
                                                <li><a
                                                        href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                        {{-- <li style="vertical-align:middle; top:3px;"
                                            class="menu-item-has-children dropdown">
                                            <a href="#" class="dropdown-hover">
                                                <span class="underline">
                                                    <svg style="font-size:22px;" class="bi bi-person-circle" width="1em"
                                                        height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                                                        <path fill-rule="evenodd"
                                                            d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                                                    </svg>
                                                </span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/login">Најава</a>
                                                    <a href="/register">Регистрација</a>
                                                </li>
                                            </ul>            <li style="vertical-align:middle; top:3px;"
                                            class="menu-item-has-children dropdown">
                                            <a href="#" class="dropdown-hover">
                                                <span class="underline">
                                                    <svg style="font-size:22px;" class="bi bi-person-circle" width="1em"
                                                        height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                                                        <path fill-rule="evenodd"
                                                            d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                                                    </svg>
                                                </span>
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/login">Најава</a>
                                                    <a href="/register">Регистрација</a>
                                                </li>
                                            </ul>
                                        </li> --}}
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
                        <form class="searchform" method="get" action="{{route('search')}}">
                            <input type="search" class="searchinput" name="search" value="" placeholder="Пребарај..." />
                            <input type="submit" class="searchsubmit hidden" value="Пребарај" />
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