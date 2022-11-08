<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .loggedUser {
        padding: 4px;
        border-radius: 50%;
        background: #083487;
        color: white;
        font-weight: bold;
        padding-right: 8px;
    }

    @media(max-width: 768px) {
        .btn_cat_mob {
            display: inline !important;
        }
    }

    @media(min-width: 769px) {
        .btn_cat_mob {
            display: none !important;
        }
    }

    .color-red {
        color: red !important;
    }

    @media(min-width: 769px) {

        /* .second */
        .second::-webkit-scrollbar {
            width: 5px !important;
            -webkit-appearance: none !important;
        }

        /* Track */
        .second::-webkit-scrollbar-track {
            background: #f1f1f1 !important;
        }

        /* Handle */
        .second::-webkit-scrollbar-thumb {
            background: #888 !important;
        }

        /* Handle on hover */
        .second::-webkit-scrollbar-thumb:hover {
            background: #555 !important;
        }
    }
</style>
<header class="version_1">
    <div class="layer"></div>
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="/"><img src="{{url_assets('/easycms/clarissabalkan/img/logo.png')}}" alt=""
                                height="25"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7 text-center">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="/"><img src="{{url_assets('/easycms/clarissabalkan/img/logo-black.png')}}" alt=""
                                    height="55"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            @foreach($menuCategories as $row)
                            @if($row['title'] == 'Новости')
                            <li>
                                <a href="/c/{{ $row['id'] }}/{{ $row['url'] }}">{{ $row['title'] }}</a>
                            </li>
                            @endif
                            @endforeach
                            <li>
                                <a href="/kontakt">Контакт</a>
                            </li>
                            <li>
                                <a href="/za-nas">За нас</a>
                            </li>
                            <li>
                                <a href="/faq">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
                    <a class="phone_top" href="tel:003933277078">
                        <strong>
                            <i class="fa fa-phone"></i> +39 33 277 078
                        </strong></a>
                </div>
            </div>
        </div>
    </div>

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Производи
                                    </a>
                                </span>

                                <div id="menu">
                                    <ul id="main">
                                        <?php $counter = 0; ?>
                                        @foreach ($menuCategories as $menuCategory)
                                        <li>
                                            <span><a
                                                    href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}">{{ $menuCategory['title'] }}</a></span>
                                            @if(isset($menuCategory['children']))

                                            <?php $childrenCount = count($menuCategory['children']); ?>
                                            <ul class="second"
                                                style="box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.175);max-height: 400px; overflow-y: auto; height:{{$childrenCount * 45}}px; margin-top: {{$counter * 45}}px ">
                                                @foreach($menuCategory['children'] as $ch)
                                                <li>
                                                    <a
                                                        href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <?php $counter++;?>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="text-center col-xl-6 col-lg-6 col-md-5 d-none d-md-block">
                    <div class="custom-search-input">
                        <form method="get" action="{{route('search')}}">
                            <input type="text" name="search" placeholder="Пребарај">
                            <button type="submit"><i class="header-icon_search_custom"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <?php
                    $totalProducts = 0;
                    $totalWishlistProducts = 0;
                    $totalPrice = 0;
                    ?>@if (Session::has('cart_products'))
                    @foreach(session()->get('cart_products') as $pid => $product)
                    <?php 
                        $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); 
                        $totalProducts = $totalProducts + $product->quantity; 
                    ?>
                    @endforeach
                    @endif
                    @if(auth()->user())
                    <?php 
                        $pids = \EasyShop\Models\Wishlist::where('user_id', auth()->user()->id)->pluck('product_id');
                        $wishlistProducts = \Easyshop\Models\Product::whereIn('id', $pids)->get();
                        $totalWishlistProducts = count($wishlistProducts);
                    ?>
                    @endif
                    <?php
                        $totalCompareProducts = 0;
                        $compareProducts = [];
                        ?>
                    @if(Session::has('compare_products'))
                    <?php $vkupno = 0;
                            $compareProducts = session()->get('compare_products');
                            ?>
                    @foreach($compareProducts as $pid)
                    <?php
                                $totalCompareProducts = $totalCompareProducts + 1; ?>
                    @endforeach
                    @endif
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-access">
                                @if(auth()->check() && auth()->user()->role != 'admin')
                                <a class="access_link"><span>Акаунт</span></a>
                                @else
                                <a href="/login" class="access_link"><span>Акаунт</span></a>
                                @endif
                                <div style="padding-top: 0px !important;" class="dropdown-menu">
                                    @if(auth()->check() && auth()->user()->role != 'admin')
                                    <ul>
                                        <li>
                                            <a href="{{route('order.history')}}"><i class="ti-package"></i>Моите
                                                нарачки</a>
                                        </li>
                                        <li>
                                            <a href="{{route('profiles.get')}}"><i class="ti-user"></i>Мојот профил</a>
                                        </li>
                                        <li>
                                            <a href="{{route('recently.viewed.products')}}"><i
                                                    class="ti-list"></i>Посетени продукти</a>
                                        </li>
                                        <li>
                                            <a href="/faq"><i class="ti-help-alt"></i>Помош и FAQ</a>
                                        </li>
                                        <li><a href="{{route('auth.logout.get')}}">Одјава</a></li>
                                    </ul>
                                    @else
                                    <a href="/login" style="margin: 10px 0;" class="btn_1">Најава / Регистрација</a>
                                    <ul>
                                        <li>
                                            <a href="/faq"><i class="ti-help-alt"></i>Помош и FAQ</a>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </li>
                        {{-- <li>
                            <a href="/compare" class="compare"><i class="font-24 fa fa-eye"></i><strong
                                    data-amount-value-compare="">
                                    {{$totalCompareProducts}}</strong></a>
                        </li> --}}
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="/cart" class="cart_bt"><strong data-amount-value>
                                        {{$totalProducts}}</strong></a>
                                <div class="dropdown-menu">
                                    <ul aria-labelledby="shoppingCart" id="shoppingCart">
                                        @include('clients.clarissabalkan.cart-partial')
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @if(auth()->user())
                        <li>
                            <a href="/wishlist" class="wishlist"><strong data-amount-wishlist-value>
                                    {{$totalWishlistProducts}}</strong></a>
                        </li>
                        @endif
                        <li>
                            <a href="javascript:void(0);" class="hidden-lg btn_search_mob"><span>Пребарај</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Мени
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="search_mob_wp">
            <form method="get" action="{{route('search')}}">
                <input type="text" class="form-control" name="search" placeholder="Пребарај над 10.000 производи">
                <input type="submit" class="btn_1 full-width" value="Пребарај">
            </form>
        </div>
    </div>
</header>