<!-- header start -->
<header>
    <!-- header top start -->
    <div class="header-top theme1 bg-dark py-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-5 order-last order-sm-first">
                    <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                        <div class="social-network2">
                            <ul class="d-flex">
                                <li>
                                    <a href="https://www.facebook.com/ekspresbuk/" target="_blank"><span
                                            class="icon-social-facebook"></span></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank"><span
                                            class="icon-social-twitter"></span></a>
                                </li>
                                <li class="mr-0">
                                    <a href="https://www.instagram.com/" target="_blank"><span
                                            class="icon-social-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-7">
                    <nav class="navbar-top pb-sm-0 position-relative">
                        <ul class="d-flex justify-content-center justify-content-md-end align-items-center">
                            <li>
                                <div class="media static-media ml-4 d-flex align-items-center">
                                    <div class="media-body">
                                        <div class="phone">
                                            <a href="tel:+389 71 297 619" class="text-white"><i
                                                    class="icon-call-out mr-1"></i> +389 71 297 619</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->
    <!-- header-middle satrt -->
    <div id="sticky" class="header-middle theme1 py-15 py-lg-0">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-6 col-lg-2 col-xl-2">
                    <div class="logo">
                        <a href="/"><img src="{{ url_assets('/expressbook_new/img/logo/logo.png') }}"
                                alt="logo" /></a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                    <ul class="main-menu d-flex justify-content-center">
                        <li>
                            <a href="/about">За нас</a>
                        </li>
                        <li><a href="/contact">Контакт</a></li>

                        @foreach ($menuCategories as $category)
                            <li><a
                                    href="/c/{{ $category['id'] }}/{{ $category['url'] }}">{{ $category['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <!-- search-form end -->
                    <div class="d-flex align-items-center justify-content-end">
                        <!-- static-media end -->
                        <div class="cart-block-links theme1 d-none d-sm-block">
                            <ul class="d-flex">
                                <?php
                                $totalProducts = 0;
                                $totalPrice = 0;
                                ?>@if (Session::has('cart_products'))
                                    @foreach (session()->get('cart_products') as $pid => $product)
                                        <?php
                                        $product = (object) $product;
                                        $totalPrice = $totalPrice + $product->price * $product->quantity;
                                        $totalProducts = $totalProducts + $product->quantity;
                                        ?>
                                    @endforeach
                                @endif
                                <li>
                                    <a href="javascript:void(0)" class="search search-toggle">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="/profile">
                                        <span class="position-relative">
                                            <i class="icon-user"></i>
                                        </span>
                                    </a>
                                </li>





                                @if (auth()->check())
                                    <li>
                                        <?php $wishlistitemsnumber = count($wishlistItems); ?>
                                        <a class="offcanvas-toggle" href="#offcanvas-wishlist">
                                            <span class="position-relative">
                                                <i class="icon-heart"></i>
                                                <span data-wishlist-value class="badge cbdg1">{{ $wishlistitemsnumber }}</span>
                                            </span>
                                        </a>
                                    </li>
                                @endif

                                <li class="mr-xl-0 cart-block position-relative">
                                    <a class="offcanvas-toggle" href="#offcanvas-cart">
                                        <span class="position-relative">
                                            <i class="icon-bag"></i>
                                            <span class="badge cbdg1" data-amount-value>{{ $totalProducts }}</span>
                                        </span>
                                    </a>
                                </li>
                                <!-- cart block end -->
                            </ul>
                        </div>
                        <div class="mobile-menu-toggle theme1 d-lg-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewbox="0 0 700 550">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318)">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle end -->
</header>
<!-- header end -->
