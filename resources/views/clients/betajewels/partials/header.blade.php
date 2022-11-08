<style>
    @media(max-width: 999px) {
        #logo {
            text-align: center;

        }

        #zaHover {
            margin-top: 3px !important;
        }

        #cssmenu {
            width: 150px;
        }

        .mobi-menu {
            width: 150px;
        }
    }

    @media(min-width: 1000px) {
        #zaHover {
            margin-top: 10px;
        }

    }

    #logo {
        margin-top: -20px;
    }
</style>

<header class="entire_header">
    <div class="header-height hidden-xs hidden-md hidden-sm header-area">
        <div class="container">
            <div class="marginLaptop row">
                <div class="col-md-6 col-sm-5">
                    <div class="user-menu">
                        <ul class="list-unstyled list-inline">
                            <li id="shipping" class="dropdown dropdown-small">
                                <i class="fa fa-plane pr-10"></i>{{trans('betajewels.free_shipping')}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-7">
                    <div class="header-right">
                        <ul>
                            <li>
                                <a href="tel:0038970291330"><i class="fa fa-phone"></i>
                                    +389 70 291 330</a>

                            </li>
                            <li> <a href="tel:0038923246698">
                                    +389 2 3246 698</a></li>
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                                    id="border-right-none" href="mailto:betamed@t.mk"><i class="fa fa-envelope"></i>
                                    betamed@t.mk</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-area:END -->

    <!-- Logo-area -->
    <div class="logo_area">
        <div class="container">
            <div class="row">

                {{-- <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="logo">
                        
                    </div>
                </div> --}}

                <div class="only-for-mobile">
                    <div class="col-sm-4 col-xs-4">
                        <ul class="ofm">
                            <li class="m_nav text-left" style="text-align: left"><i class="fa fa-bars"></i></li>
                        </ul>

                        <!-- MOBILE MENU -->
                        <div class="mobi-menu">
                            <div id='cssmenu'>
                                <ul>
                                    <li class="active"><a href="{{route('home')}}">{{ trans('betajewels.home') }}</a>
                                    </li>
                                    <li>
                                        <a href="#" id="brands">Брендови</a>
                                        <ul class="drop_nav" id="brands-dropdown">
                                            @foreach($mm as $manufacturer)
                                            <li>
                                                <a href="{{route('manufacturer', [$manufacturer->id])}}">{{$manufacturer->name}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @foreach($menuCategories as $mc)
                                    <li>
                                        <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                        {{-- @if(isset($mc['children'])) --}}
                                        {{-- <ul class="drop_nav"> --}}
                                        {{-- @foreach($mc['children'] as $ch)
                                                    <li>
                                                        <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}
                                        </a>
                                    </li>
                                    @endforeach --}}
                                    {{-- </ul> --}}
                                    {{-- @endif --}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-4" id="logo">
                    <a href="{{route('home')}}">
                        <img id="logo-header" src="{{ url_assets('/betajewels/images/logo.png') }}"
                            alt="Beta Jewels" />
                    </a>
                </div>


                <div id="menu-right-div" class="col-sm-3 col-md-2 col-xs-4">
                    <div id="menu-right" class="col-lg-4 col-sm-4 menu_right absolute-right">
                        <a id="zaHover" class="font-sm"><i class="fa fa-shopping-bag"></i>
                            <?php $totalProducts = 0; $totalPrice = 0;?>
                            @if (Session::has('cart_products'))
                            @foreach(session()->get('cart_products') as $pid => $product)
                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                            @endforeach
                            @endif
                            <label data-amount-value>({{$totalProducts}})</label>
                        </a>
                        <a href="javascript:void(0);" class="pull-right search_btn"><i class="fa fa-search"></i></a>
                        <div class="main_nav inner Sticky d-none">
                            <div class="search_mob_wp search-custom-lg row">
                                <form method="GET" action="{{route('search')}}" autocomplete="off">
                                    <div class="col-8">
                                        <input type="text" name="search"
                                            class="form-control search-custom">
                                    </div>
                                    <div class="col-4">
                                        <input type="submit" value="Пребарај" class="btn btn-search-custom">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="hoverKoshnicka" class="dropdown-content">
                        @if (Session::has('cart_products'))
                        <h3>{{trans('betajewels.in_your_cart')}}</h3>
                        <div id="shoppingCart" class="container">
                            <table class="widthh">
                                @foreach(session()->get('cart_products') as $product)

                                <?php $product = (object)$product; ?>
                                <tr class="dropdown-tr">
                                    <td class="img dropdown-td">
                                        <a href="{{$product->url}}">
                                            <img class="mini-cart-img" src="{{$product->image}}" />
                                        </a>
                                    </td>
                                    <td class="dropdown-td">
                                        x{{$product->quantity}}
                                    </td>
                                    <td class="dropdown-td w-150">
                                        <span>
                                            <b>
                                                <a style="font-weight: normal;color: #707070"
                                                    href="{{$product->url}}">{{$product->title}}
                                                </a>
                                            </b>
                                        </span>
                                    </td>
                                    <td class="dropdown-td">
                                        {{ number_format($product->price, 0, ',', '.')}}
                                        {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                    </td>

                                </tr>
                                @endforeach
                            </table>
                            <span>
                                <?php
                                    $totalProducts = 0;
                                    $totalPrice = 0;
                                    ?>@if (Session::has('cart_products'))
                                @foreach(session()->get('cart_products') as $pid => $product)
                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                @endforeach
                                @endif
                                <h2 style="font-size:16px; color:#707070" class="cart-block-heading">
                                    {{trans('betajewels.total')}}: <i style="font-style: normal;"
                                        data-cart-total-price>{{$totalPrice}}</i>
                                    {{\EasyShop\Models\AdminSettings::getField('currency')}}</h2>
                                <a id="viewCart" href="{{URL::to('/cart')}}"
                                    class="customBtn">{{trans('betajewels.view_cart')}}</a>

                            </span>
                        </div>
                        @else
                        <div id="shoppingCart" class="container">
                            {{trans('betajewels.empty_cart_partial')}}<br><br>
                            <br>
                            <br>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO-AREA:END -->

    <!-- MENU-AREA -->
    <div class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <nav class="main-menu">
                        <ul id="navigation">
                            <li class="active"><a href="{{route('home')}}">{{ trans('betajewels.home') }}</a>
                            </li>
                            <li>

                                <a href="#">Брендови<i style="padding-left:10px;" class="fa fa-caret-down"></i></a>
                                <ul class="drop_nav">
                                    @foreach($mm as $manufacturer)
                                    <li>
                                        <a href="{{route('manufacturer', [$manufacturer->id])}}">{{$manufacturer->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @foreach($menuCategories as $mc)
                            @if(isset($mc['children']))
                            <li>
                                <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}<i
                                        style="padding-left:10px;" class="fa fa-caret-down"></i></a>
                                @if(isset($mc['children']))
                                <ul class="drop_nav">
                                    @foreach($mc['children'] as $ch)
                                    <li>
                                        <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @else
                            <li>
                                <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                            </li>
                            @endif
                            @endforeach
                            <li>
                                <a href="{{route('blog',[1,'za-nas'])}}">За Нас</a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Mobile Navigation -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">

                </div>
            </div>
        </div>
    </div>
    <!-- MENU-AREA:END -->
</header>
<!-- Header-AREA END -->