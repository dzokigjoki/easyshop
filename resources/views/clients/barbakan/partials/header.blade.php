<!-- Header -->
<header id="header" class="dark">

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @if (!Route::is('home'))
                    <div>
                        <a href="/">
                            <img width="100" src="{{ url_assets('/barbakan/img/logo2.png') }}" alt="">
                        </a>
                    </div>
                    @else{
                        <a href="/old">
                            <img width="100" src="{{ url_assets('/barbakan/img/logo.png') }}" alt="">
                        </a>
                    }
                @endif

            </div>
            <div class="col-md-7">
                <!-- Navigation -->
                <nav class="module module-navigation left mr-4">
                    <ul id="nav-main" class="nav nav-main">
                        <li>
                            <a href="/">Почетна</a>
                        </li>
                        @if(\Request::route()->getPath() == "/old")
                        <li>
                            <a href="/za-nas">За нас</a>
                        </li>
                        <li>
                            <a href="/allProducts">Мени</a>
                        </li>
                        @endif
                        @foreach ($menuCategories as $mc)
                            @if (isset($mc['children']))
                                <li class="has-dropdown">
                                    <a href="{{ route('category', [$mc['id'], $mc['url']]) }}">{{ $mc['title'] }} </a>

                                    @if (isset($mc['children']))
                                        <div class="dropdown-container">
                                            <ul class="dropdown-mega">
                                                @foreach ($mc['children'] as $ch)
                                                    <li>
                                                        <a
                                                            href="{{ route('category', [$ch['id'], $ch['url']]) }}">{{ $ch['title'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>

                                    @endif


                                </li>
                            @else
                                <li>
                                    <a href="{{ route('category', [$mc['id'], $mc['url']]) }}">
                                        {{ $mc['title'] }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li><a href="/kontakt">Контакт</a></li>
                    </ul>
                </nav>
                <div class="module left">
                    <a href="/allProducts" class="btn btn-outline-secondary"><span>Нарачај</span></a>
                </div>
            </div>
            <div class="col-md-2">



                <a href="#" class="module module-cart right" data-toggle="panel-cart">
                    <span class="cart-icon">
                        <i class="ti ti-shopping-cart"></i>
                        <span class="notification" data-amount-value>{{ $totalQuantity }}</span>
                    </span>
                    <span class="cart-value"><span class="value"
                            data-cart-total-price>{{ $totalPrice }}</span> МКД</span>
                </a>
            </div>
        </div>
    </div>

</header>
<!-- Header / End -->

<!-- Header -->
<header id="header-mobile" class="dark">

    <div class="module module-nav-toggle">
        <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
    </div>

    <div class="module module-logo">
        <a href="/">
            <!-- <img src="{{ url_assets('/barbakan/img/logo.png') }}" alt=""> -->
        </a>
    </div>

    <a href="#" class="module module-cart" data-toggle="panel-cart">
        <i class="ti ti-shopping-cart"></i>
        <span class="notification" data-amount-value>{{ $totalQuantity }}</span>
    </a>

</header>
<!-- Header / End -->
