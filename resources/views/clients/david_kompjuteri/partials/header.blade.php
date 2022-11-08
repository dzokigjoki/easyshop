<header class="nav-type-1">

    <!-- Fullscreen search -->
    <div class="search-wrap">
        <div class="search-inner">
            <div class="search-cell">
                <form method="GET" action="{{ route('search') }}">
                    <div class="search-field-holder">
                        <input type="search" name="search" class="form-control main-search-input"
                            placeholder="Пребарувај...">
                        <i class="ui-close search-close" id="search-close"></i>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end fullscreen search -->



    <nav class="navbar navbar-static-top pt-10 pb-10">
        <div class="navigation" id="sticky-nav">
            <div class="container relative nav-cont ">

                <div class="row flex-parent">

                    <div class="navbar-header flex-child">
                        <!-- Logo -->
                        <div class="logo-container">
                            <div class="logo-wrap">
                                <a href="/">
                                    <img class="logo-dark"
                                        src="{{ url_assets('/david_kompjuteri/img/logo.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
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
                                        {{ $total }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end navbar-header -->

                    <div class="nav-wrap flex-child">
                        <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                            <ul class="nav navbar-nav">



                               

                                {{-- <li class="mobile-links hidden-lg hidden-md">
                                    <a href="/profile"><i class="fas fa-user"></i></a>
                                </li> --}}
                                @foreach ($menuCategories as $menuCategory)


                                    <li class="dropdown">
                                        <a
                                            href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}">{{ $menuCategory['title'] }}</a>
                                        <i class="fa fa-angle-down dropdown-trigger"></i>


                                        @if (isset($menuCategory['children']))
                                            <ul class="dropdown-menu">
                                                @foreach ($menuCategory['children'] as $ch)
                                                    <li><a
                                                            href="{{ route('category', [$ch['id'], $ch['url']]) }}">{{ $ch['title'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>

                                @endforeach
                                <!-- Mobile search -->
                                <li id="mobile-search" class="hidden-lg hidden-md">
                                    <form method="GET" action="{{ route('search') }}">
                                        <div class="search-field-holder">
                                            <input type="search" name="search" class="form-control main-search-input"
                                                placeholder="Пребарувај...">
                                            <i class="ui-close search-close" id="search-close"></i>
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <a href="/about-us">За нас</a>
                                </li>

                                <li>
                                    <a href="/vrabotuvanje">Вработување</a>
                                </li>
                                <!--  <li>
                                    <a href="/sertifikati">Сертификати</a>
                                </li> -->

                                <li>
                                    <a href="/contact">Контакт</a>
                                </li>

                            </ul> <!-- end menu -->
                        </div> <!-- end collapse -->
                    </div> <!-- end col -->

                    <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
                        <ul>
                            <li class="phone-number">
                                <i class="fas fa-fax">022450372</i>
                               
                            </li>
                            <li class="nav-register">
                                @if (auth()->check())
                                    <a href="/profile"><i class="fas fa-user"></i></a>
                                @else
                                    <a href="/login"><i class="fas fa-user"></i></a>
                                @endif
                            </li>
                            <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                <a href="#" class="nav-search search-trigger">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li class="nav-cart">
                                <div class="nav-cart-outer">
                                    <div class="inner_a">
                                        <?php
                                        $sessionProducts = session('cart_products');
                                        
                                        if (isset($sessionProducts)) {
                                            $total = count(session('cart_products'));
                                        } else {
                                            $total = 0;
                                        }
                                        ?>
                                        <a data-amount-value class="nav-cart-icon">
                                            {{ $total }}
                                        </a>
                                    </div>
                                </div>
                                <div id="shoppingCart" class="nav-cart-container">
                                    @include('clients.david_kompjuteri.cart-partial')
                                </div>
                            </li>

                    </div>
                    </li>
                    </ul>
                </div>

            </div> <!-- end row -->
        </div> <!-- end container -->
        </div> <!-- end navigation -->
    </nav> <!-- end navbar -->
</header>
