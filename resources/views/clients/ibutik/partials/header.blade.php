{{--<div class="global-wrapper clearfix" id="global-wrapper" style="background-image:url("assets/")">--}}
<div class="container header">
    <div class="row" id="header-row">
        <div class="col-md-4">
            <div class="main-header-logo-center">
                <a class="logoShirina" href="/">
                    <img src="https://assets.smartsoft.mk/easyshop/ibutik/images/logo.png" alt="iButik" title="iButik"/>
                </a>
            </div>
        </div>
        <div class="col-md-7">
            <form class="header_form_search clearfix search" method="GET" action="{{route('search')}}">
                <div class="dropdown main-header-input-center">
                    <input type="text" name="search" tabindex="1" placeholder="Пребарај..." id="search-input"/>
                    <button class="main-header-input-center-btn">
                        <i class="fa fa-search"></i>
                    </button>
                    <a id="zaHover" class="dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" href="{{URL::to('/cart')}}" style="float: right">
                        <img src="https://assets.smartsoft.mk/easyshop/ibutik/img/cart-icon.png" id="cart-pic">
                       <span style="color: black;" id="cart-text">Кошничка</span>
                    </a>
                    <div id="hoverKoshnicka" class="dropdown-content">
                        @if (Session::has('cart_products'))
                            <h3 style="color: #707070;">Во вашата кошничка</h3>
                            <div style="width:560px;" id="shoppingCart" class="container">
                                <table class="widthh">
                                    @foreach(session()->get('cart_products') as $product)

                                        <?php $product = (object)$product; ?>
                                        <tr class="dropdown-tr">
                                            <td class="img dropdown-td">
                                                <a href="{{$product->url}}"><img style="height: 37px; width: 34px;"
                                                            src="{{$product->image}}"/></a>
                                            </td>
                                            <td class="dropdown-td">
                                                x{{$product->quantity}}
                                            </td>
                                            <td class="dropdown-td">
                                                            <span><b>
                                                                    <a style="font-weight: normal;color: #707070" href="{{$product->url}}">{{$product->title}}</a></b>
                                                            </span>
                                            </td>
                                            <td class="dropdown-td">
                                                {{ number_format($product->price, 0, ',', '.')}} мкд.
                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                                <br>
                                <span>
                                              <?php
                                    $totalProducts = 0;
                                    $totalPrice = 0;
                                    ?>@if (Session::has('cart_products'))
                                        @foreach(session()->get('cart_products') as $pid => $product)
                                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                        @endforeach
                                    @endif
                                    <h2 style="font-size:16px; color:#707070" class="cart-block-heading">Вкупно: <i style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i> ден.</h2>
                                </span>
                                <br>
                                <div>
                                    <a style="float:left;" href="{{URL::to('/cart')}}" class="btn btn-primary">Види кошничка</a>
                                    <!-- <a href="#" class="flat-right">Плати</a> -->
                                </div>
                                <br>
                            </div>
                        @else
                            <div id="shoppingCart" class="container">
                                Вашата кошничка моментално е празна<br><br>
                                <br>
                                <div>
                                    <a style="float:left;" href="{{URL::to('/cart')}}" class="btn btn-primary">Види кошничка</a>
                                    <!-- <a href="#" class="flat-right">Плати</a> -->
                                </div>
                                <br>
                            </div>
                        @endif
                    </div>
                </div>

            </form>
        </div>
        {{--<div class="col-md-1" class="main-header-input-center">--}}

    </div>
</div>
<nav class="navbar navbar-default navbar-main-white yamm">
    <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse"
                area_expanded="false"><span class="sr-only">Main Menu</span><span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="main-nav-collapse">
        <div class="container">
            <ul class="nav navbar-nav navbar-center">
                <li class="dropdown">
                    <a href="{{route('home')}}">Почетна</a>
                </li>
                @foreach($menuCategories as $item)
                    <li class="dropdown">
                        <a href="{{route('category', [$item['id'], $item['url'], 1])}}">{{$item['title']}}</a>
                        @if (isset($item['children']))
                            {{--<li class="dropdown yamm-fw"><a href="#">Pages<i class="drop-caret" data-toggle="dropdown"></i></a>--}}
                            <ul class="dropdown-menu">
                                <ul class="dropdown-menu-items-list">
                                    @foreach($item['children'] as $subItem)
                                        <a href="{{route('category', [$subItem['id'], $subItem['url']])}}">
                                            <li class="yamm-content">
                                                <span>{{$subItem['title']}}</span>
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            </ul>
                        @endif
                    </li>
                @endforeach
                {{--<li class="dropdown yamm-fw"><a href="#"><i class="fa fa-user">     Профил</i></a>--}}
                    {{--</li>--}}
                    <li class="dropdown yamm-fw">
                        <a href="{{route('blog', [1, 'za-nas'])}}">За нас</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="{{route('blog',[8,'kontakt'])}}">Контакт</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>
{{--</div>--}}



