<header class="nav-type-1">

    <!-- Fullscreen search -->
    <div class="search-wrap">
        <div class="search-inner">
            <div class="search-cell">
                <form method="get" action="{{route('search')}}">
                    <div class="search-field-holder">
                        <input type="search" name="search" class="form-control main-search-input" placeholder="Пребарувај...">
                        <i class="ui-close search-close" id="search-close"></i>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end fullscreen search -->

    <nav class="navbar navbar-static-top">
        <div class="navigation" id="sticky-nav">
            <div class="container relative">

                <div class="row flex-parent">

                    <div class="navbar-header flex-child">
                        <!-- Logo -->
                        <div class="logo-container">
                            <div class="logo-wrap">
                                <a href="/">
                                    <img class="logo-dark" src="{{ url_assets('/skin-care/img/logo.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></spfan>
                                <span class="icon-bar"></span>
                        </button>
                        <!-- Mobile cart -->
                        <div class="nav-cart mobile-cart hidden-lg hidden-md">
                            <div class="nav-cart-outer">
                                <div class="nav-cart-inner">
                                        <?php
                                        $sessionProducts = session('cart_products');

                                        if (isset($sessionProducts)) {
                                            $total = count(session('cart_products'));
                                        } else {
                                            $total = 0;
                                        }
                                        ?>
                                        <a href="/cart" data-amount-value class="nav-cart-icon">
                                            {{$total}}
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end navbar-header -->

                    <div class="nav-wrap flex-child">
                        <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                            <ul class="nav navbar-nav">

                                <li class="dropdown">
                                    <a href="/">Почетна</a>
                                    <i class="fa fa-angle-down dropdown-trigger"></i>
                                </li>
                                @foreach ($menuCategories as $menuCategory)
                                <li class="dropdown">
                                    <a href="{{route('category', [$menuCategory['id'], $menuCategory['url']])}}">{{ $menuCategory['title'] }}</a>
                                    <i class="fa fa-angle-down dropdown-trigger"></i>

                                    @if(isset($menuCategory['children']))
                                    <ul class="dropdown-menu">
                                        @foreach($menuCategory['children'] as $ch)
                                        <li><a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif

                                </li>
                                @endforeach
                                <li class="dropdown">
                                    <a href="/za-nas">За нас</a>
                                    <i class="fa fa-angle-down dropdown-trigger"></i>
                                </li>
                                <li class="dropdown">
                                    <a href="/kontakt">Контакт</a>
                                    <i class="fa fa-angle-down dropdown-trigger"></i>
                                </li>

                                <!-- Mobile search -->
                                <li id="mobile-search" class="hidden-lg hidden-md">
                                    <form method="get" action="{{route('search')}}" class="mobile-search">
                                        <input type="search" name="search" class="form-control" placeholder="Пребарувај...">
                                        <button type="submit" class="search-button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </li>

                            </ul> <!-- end menu -->
                        </div> <!-- end collapse -->
                    </div> <!-- end col -->

                    <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
                        <ul>
                            <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                <a href="#" class="nav-search search-trigger">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li class="nav-cart">
                                <div class="nav-cart-outer">
                                    <div class="nav-cart-inner">
                                        <?php
                                        $sessionProducts = session('cart_products');

                                        if (isset($sessionProducts)) {
                                            $total = count(session('cart_products'));
                                        } else {
                                            $total = 0;
                                        }
                                        ?>
                                        <a data-amount-value class="nav-cart-icon">
                                            {{$total}}
                                        </a>
                                    </div>
                                </div>
                                <div id="shoppingCart" class="nav-cart-container">
                                    @include('clients.skin-care.cart-partial')
                                </div>
                            </li>
                        </ul>
                    </div>

                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end navigation -->
    </nav> <!-- end navbar -->
</header>