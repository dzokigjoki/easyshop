<header class="nav-type-1">
    <div class="search-wrap">
        <div class="search-inner">
            <div class="search-cell">
                <form method="get" action="{{ $urlLang }}search">
                    <div class="search-field-holder">
                        <input type="search" name="
Kërko" class="form-control main-search-input" placeholder="
{!! trans('naturatherapy/global.search') !!} ...">
                        <i class="ui-close search-close" id="search-close"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-static-top">
        <div class="navigation" id="sticky-nav">
            <div class="container relative">
                <div class="row flex-parent">
                    <div style="padding:0;" class="navbar-header flex-child">
                        <div class="logo-container">
                            <div class="logo-wrap">
                                <a href="{{ $urlLang }}">
                                    <img class="logo-dark"
                                        src="{{ url_assets('/naturatherapyshop/img/logo.png') }}" alt="logo">
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
                                    <a href="{{ $urlLang }}cart" data-amount-value class="nav-cart-icon">
                                        {{ $total }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-button-mobilna hidden-lg hidden-md">
                            @if (!auth()->check())
                                <a href="{{ $urlLang }}login"><i style="font-size: 23px; color: black"
                                        class="fa fa-user"></i></a>
                            @else
                                <a href="{{ $urlLang }}profile"><i style="font-size: 23px; color: #fa5b79;"
                                        class="fa fa-user"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="nav-wrap flex-child">
                        <div class="collapse navbar-collapse text-center" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="{{ $urlLang }}c/6/all-products" class="dropdown-title">
                                        {!! trans('naturatherapy/global.products') !!}</a> 
                                    <ul class="dropdown-menu">
                                        @foreach ($menuCategories as $menuCategory)
                                            @if ($menuCategory['type'] != 'list_posts' && $menuCategory['title'] != 'Paketat')
                                                <li class="dropdown">
                                                    <a 
                                                        href="{{ $urlLang }}c/{{ $menuCategory['id'] }}/{{ $menuCategory['url'] }}">{{ $menuCategory['title'] }}</a>
                                                    {{-- <i class="fa fa-angle-down dropdown-trigger"></i>
                                            @if (isset($menuCategory['children']))
                                            <ul class="dropdown-menu">
                                                @foreach ($menuCategory['children'] as $ch)
                                                <li><a
                                                        href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif --}}
                                                </li>
                                            @endif
                                        @endforeach
                                </li>
                            </ul>
                            @foreach ($menuCategories as $menuCategory)
                                @if ($menuCategory['title'] == 'Paketat')
                                    <li>
                                        <a
                                            href="{{ $urlLang }}c/{{ $menuCategory['id'] }}/{{ $menuCategory['url'] }}">{{ $menuCategory['title'] }}</a>
                                    </li>
                                @elseif($menuCategory['type'] == 'list_posts')
                                    <li>
                                        <a
                                            href="{{ $urlLang }}c/{{ $menuCategory['id'] }}/{{ $menuCategory['url'] }}">{{ $menuCategory['title'] }}</a>
                                    </li>

                                @elseif($menuCategory['title'] == 'Производи за наградна игра')
                                    <li>
                                        <a style="color: red;"
                                            href="{{ $urlLang }}c/{{ $menuCategory['id'] }}/{{ $menuCategory['url'] }}">{{ $menuCategory['title'] }}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li>
                                <a href="{{ $urlLang }}contact">
                                    {!! trans('naturatherapy/global.contact') !!}</a>
                            </li>
                            <li>
                                <a href="{{ $urlLang }}about-us">
                                    {!! trans('naturatherapy/global.about_us') !!}
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ url_assets('/naturatherapyshop/img/1.pdf') }}">
                                    {!! trans('naturatherapy/global.cotalog') !!}</a>
                            </li>
                            @if (App::getLocale() == 'al')
                                <li>
                                    <a href="{{ $urlLang }}faq">{!! trans('naturatherapy/global.asked_questions') !!}</a>
                                </li>
                            @endif
                            {{-- <li id="mobile-search" class="hidden-lg hidden-md">
                                <form method="get" action="{{route('search')}}" class="mobile-search">
                            <input type="search" name="search" class="form-control" placeholder="Search...">
                            <button type="submit" class="search-button">
                                <i class="fa fa-search"></i>
                            </button>
                            </form>
                            </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
                        <ul>
                            <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                <a href="#" class="nav-search search-trigger">
                                    <i style="font-size: 23px;" class="fa fa-search"></i>
                                </a>
                            </li>
                            <li class="profile-section-button">
                                @if (!Auth()->check())
                                    <i style="font-size: 23px; color: black;" class="fa fa-user"></i>
                                    <div id="profileSection" class="profile-section-container">
                                        <div class="row">

                                            <div class="col-sm-12 text-center">
                                                <h6>
                                                    {!! trans('naturatherapy/global.welcome_to') !!}</h6>
                                            </div>
                                        </div>
                                        <hr class="mt-10 mb-20">
                                        <div class="row row_profile">
                                            <div class="col-sm-6">
                                                <a href="{{ $urlLang }}login">
                                                    {!! trans('naturatherapy/global.log_in') !!}</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{ $urlLang }}register">{!! trans('naturatherapy/global.register') !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <i style="font-size: 23px; color: #558182;" class="fa fa-user"></i>
                                    <div id="profileSection" class="profile-section-container">
                                        <div class="row">

                                            <div class="col-sm-12 text-center">

                                                <h6>{!! trans('naturatherapy/global.hello') !!} {{ auth()->user()['first_name'] }} </h6>
                                            </div>
                                        </div>
                                        <hr class="mt-10 mb-20">
                                        <div class="row row_profile">
                                            <div class="col-sm-6">
                                                <a href="{{ $urlLang }}profile">
                                                    {!! trans('naturatherapy/global.profile') !!}</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{ $urlLang }}logout">{!! trans('naturatherapy/global.logout') !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                                            {{ $total }}
                                        </a>
                                    </div>
                                </div>
                                <div id="shoppingCart" class="nav-cart-container">
                                    @include('clients.naturatherapyshop_al.cart-partial')
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
