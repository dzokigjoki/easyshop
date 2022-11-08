<header class="header-main_area header-main_area-2">
        <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="ht-left_area">
                                <div class="header-shipping_area">
                                    <ul>
                                        <li>
                                            <span>Telephone Enquiry:</span>
                                            <a href="callto://+123123321345">(+123) 123 321 345</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            
                        </div>
                    </div>
                </div>
            </div>

    <div class="header-bottom_area header-bottom_area-2 header-sticky stick">
        <div class="container-fliud">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="header-logo">
                        <a href="/">
                            <img src="{{ url_assets('/accessories/images/menu/logo/1.png') }}" alt="Hiraola's Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block position-static">
                    <div class="main-menu_area">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="/">Почетна</a></li>

                                @foreach($menuCategories as $mc)
                                    @if(isset($mc['children']))
                                        <li class="dropdown-holder"><a href="#">{{$mc['title']}} </a>
                                            <ul class="hm-dropdown">
                                                @if(isset($mc['children']))
                                                    @foreach($mc['children'] as $ch)
                                                    <li>
                                                            <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{route('category', [$mc['id'], $mc['url']])}}">
                                                {{$mc['title']}}
                                            </a>
                                        </li>
                                    @endif   

                                @endforeach
                                {{-- @foreach($menuCategories as $item)
                                    <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class=open' : ''  }}>
                                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                    </li>
                                @endforeach --}}
                                <li class="dropdown-holder"><a href="/contact">Контакт</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-8">
                    <div class="header-right_area">
                        <ul>
                            <li>
                                <a href="#searchBar" class="search-btn toolbar-btn">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#shoppingCart" class="minicart-btn toolbar-btn">
                                    <i class="ion-bag"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-search_wrapper" id="searchBar">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <!-- Begin Offcanvas Search Area -->
                <div class="offcanvas-search">
                    <form action="{{route('search')}}" class="hm-searchbox">
                        <input type="text" placeholder="Search for item..." search-input name="search" >
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- Offcanvas Search Area End Here -->
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="shoppingCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <span>
                <?php
                $totalProducts = 0;
                $totalPrice = 0;
                ?>@if (Session::has('cart_products'))
                    @foreach(session()->get('cart_products') as $pid => $product)
                        <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                    @endforeach
                @endif
            </span>

            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Кошничка</h4>
                </div>
                @if (Session::has('cart_products'))
                    <ul class="minicart-list">
                       
                                @foreach(session()->get('cart_products') as $product)
                                <li class="minicart-product">
                                    <?php $product = (object)$product; ?>
                                    <a href="{{$product->url}}">
                                        {{--<img src="{{ url_assets('') }}/assets/ioutlet/images/hover1.png" alt="" class="left-hover">--}}
                                        <img src="{{$product->image}}" alt="" class="left-hover">
                                    </a>
                                    <div class="hover-details product-item_content">
                                        <a class="product-item_title" href="{{$product->url}}">{{$product->title}}</a>
                                        <span class="product-item_quantity">{{ number_format($product->price, 0, ',', '.')}} ден.</span>
                                        <div class="quantity">Количина: {{$product->quantity}}</div>
                                    </div>
                                </li>
                                @endforeach

                            {{-- <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                            <div class="product-item_img">
                                <img src="assets/images/product/small-size/2-1.jpg" alt="Hiraola's Product Image">
                            </div> --}}
                            
                     
                    </ul>
                    <div class="minicart-btn_area">
                        <a href="{{route('cart')}}" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Види кошничка</a>
                    </div>
                    @else
                        <div id="shoppingCart">
                            <div class="hover-cart">
                                <div class="hover-box">
                                    <br>
                                    <div class="subtotal">
                                        Вашата кошничка е празна!
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
            <div class="minicart-item_total">
                <span>Вкупно: </span>
                <span class="ammount">{{number_format($totalPrice, 0, ',', '.')}} ден.</span>
            </div>
            
            {{-- <div class="minicart-btn_area">
                <a href="checkout.html" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Checkout</a>
            </div> --}}
        </div>
    </div>


    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_search">
                    <form action="{{route('search')}}" class="hm-searchbox">
                        <input type="text" placeholder="Search for item..." search-input name="search" >
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                            <li class="dropdown-holder"><a href="/">Почетна</a></li>
                            @foreach($menuCategories as $mc)
                            @if(isset($mc['children']))
                                        <li class="menu-item-has-children active"><a href="index.html"><span
                                                class="mm-text">{{$mc['title']}}</span></a>
                                            <ul class="sub-menu">
                                                @if(isset($mc['children']))
                                                    @foreach($mc['children'] as $ch)
                                                        <li>
                                                            <a href="{{route('category',[$ch['id'],$ch['url']])}}">
                                                                <span class="mm-text">{{$ch['title']}}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{route('category', [$mc['id'], $mc['url']])}}">
                                                {{$mc['title']}}
                                            </a>
                                        </li>
                                @endif
                                @endforeach
                        <li class="dropdown-holder"><a href="/contact">Контакт</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
