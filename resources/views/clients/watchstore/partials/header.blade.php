<header class="entire_header">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />
<div style="background:black" class="header-height hidden-xs hidden-md hidden-sm header-area">
        <div class="container">
            <div class="marginLaptop row">
                <div class="col-md-6 col-sm-5">
                    <div class="user-menu">
                        <ul class="list-unstyled list-inline">
                            <li style="padding: 15px 0px 15px 0; color: white;" class="dropdown dropdown-small"><i class="fa fa-plane"></i>
                                {{trans('watchstore.free_shipping')}}</li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-7">
                    <div class="header-right">
                        <ul>
                            <li>
                                <a href="tel:0038970249789" style="border-right:none; color:#ffffff"><i class="fa fa-phone" style="padding-right: 10px;"></i>+389 70 249 789</a>
                            </li>
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                                   style="color:#ffffff; border-right:none;"  href="mailto:twelve.mk@gmx.com"><i class="fa fa-envelope"></i><span style="color:#ffffff" class="value">Еmail: </span>
                                    twelve.mk@gmx.com</a>
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

                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="logo">
                        <a href="{{route('home')}}"><img style="width: 130px;" src="{{ url_assets('/watchstore/images/twelve_logo.png') }}"
                                                         alt="Twelve Logo"/>
                        </a>
                    </div>
                </div>

                <div class="only-for-mobile">
                    <div class="col-sm-3 col-xs-6">
                        <ul class="ofm">
                            <li class="m_nav"><i class="fa fa-bars"></i></li>
                        </ul>

                        <!-- MOBILE MENU -->
                        <div class="mobi-menu">
                            <div id='cssmenu'>
                                <ul>
                                    <li class="active"><a href="{{route('home')}}">{{ trans('watchstore.home') }}</a>
                                    </li>
                                    @foreach($menuCategories as $mc)
                                        <li class="">
                                        <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}
                                        @if(isset($mc['children']))
                                            <ul class="drop_nav">
                                                @foreach($mc['children'] as $ch)
                                                    <li>
                                                        <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="float: right;" class="col-sm-3 col-md-2 col-xs-6">

                    <div style="margin-top: -12px;" class="col-lg-4 col-sm-4 menu_right">
                        <a id="zaHover" class="font-sm" style="padding-bottom: 0.5px; font-size:12px;"><i class="fa fa-shopping-bag"></i></a>
                        <?php $totalProducts = 0; $totalPrice = 0;?>
                        @if (Session::has('cart_products'))
                            @foreach(session()->get('cart_products') as $pid => $product)
                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                            @endforeach
                        @endif
                        <div class="pull-left" style="margin-left: 10px; font-size: 12px;" data-amount-value>({{$totalProducts}})</div>
                    </div>
                    <div id="hoverKoshnicka" class="dropdown-content">
                        @if (Session::has('cart_products'))
                            <h3 style="color: #707070;">{{trans('watchstore.in_your_cart')}}</h3>
                            <div style="width:315px;" id="shoppingCart" class="container">
                                <table class="widthh">
                                    @foreach(session()->get('cart_products') as $product)

                                        <?php $product = (object)$product; ?>
                                        <tr style="height:90px;" class="dropdown-tr">
                                            <td class="img dropdown-td">
                                                <a href="{{$product->url}}">
                                                    <img style="height: 37px; width: 34px;" src="{{$product->image}}"/>
                                                </a>
                                            </td>
                                            <td class="dropdown-td">
                                                x{{$product->quantity}}
                                            </td>
                                            <td style="width:150px;" class="dropdown-td">
                                            <span>
                                                <b>
                                                    <a style="font-weight: normal;color: #707070"
                                                       href="{{$product->url}}">{{$product->title}}
                                                    </a>
                                                </b>
                                            </span>
                                            </td>
                                            <td class="dropdown-td">
                                                {{ number_format($product->price, 0, ',', '.')}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
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
                                    <h2 style="font-size:16px; color:#707070" class="cart-block-heading">{{trans('watchstore.total')}}: <i
                                                style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i>  {{\EasyShop\Models\AdminSettings::getField('currency')}}</h2>
                               <a style="
                                text-align: center;
                                        position: absolute;
                                        width: 40%;
                                        padding: 10px;
                                        float: right;
                                        font-size: 14px;
                                        right: 20px;
                                        bottom: 11px;
                                        color:white;
"
                                  href="{{URL::to('/cart')}}" class="customBtn">{{trans('watchstore.view_cart')}}</a>

                                </span>
                            </div>
                        @else
                            <div id="shoppingCart" class="container">
                                {{trans('watchstore.empty_cart_partial')}}<br><br>
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
                            <li class="active"><a href="{{route('home')}}">{{ trans('watchstore.home') }}</a>
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