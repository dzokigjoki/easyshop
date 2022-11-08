<header class="flat-header flat-reset">
    <div class="flat-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 padding-right-0">
                    <div class="flat-logo" style="text-align: center;">
                        <a href="{{route('home')}}" title="Logo" >
                            <img src="/assets/finki-giftshop/img/logo-text.jpg" style="height: 100px;" alt="Logo">
                        </a>
                    </div> <!-- /.flat-logo -->

                    <div class="flat-widgets">
                        <aside class="widget widget_search">
                            <form role="search" method="get" class="search-form" action="{{route('search')}}">
                                <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="Пребарај ја веб продавницата на ФИНКИ..." value="" name="search">
                                </label>
                                <input type="submit" class="search-submit" value="ПРЕБАРАЈ">
                            </form>
                        </aside> <!-- /.widget_search -->

                        <aside class="widget widget_shipping">

                        </aside> <!-- /.widget_shipping -->


                        <aside style="width:auto;" class="cartHeader inlineKosnicka widget widget_shopping">
                            {{--<a href="{{URL::to('/cart')}}">--}}
                            <a href="#">
                                <img src="/assets/finki-giftshop/img/header/shop.png" alt="Delivery">
                                <span style="color:#D4362A;" class="title">Кошничка</span><br/>
                                <span>
                                              <?php
                                    $totalProducts = 0;
                                    $totalPrice = 0;
                                    ?>@if (Session::has('cart_products'))
                                        @foreach(session()->get('cart_products') as $pid => $product)
                                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                        @endforeach
                                    @endif
                                    <span><i style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i> ден.</span> -
                                                  <span class="blue" title="prices"><i style="font-style: normal;" data-amount-value>{{$totalProducts}}</i> Производи</span>
                                        </span><!-- /.cart-left-block -->
                            </a>

                            <div id="shoppingCart" class="flat-ordered">


                                @if (Session::has('cart_products'))
                                    <ul>
                                        <?php $totalWeight = 0; ?>
                                        @foreach(session()->get('cart_products') as $product)

                                            <?php $product = (object)$product; ?>
                                            <li style="text-align: left !important;">
                                                <a href="{{$product->url}}"><img style="height: 37px; width: 34px;"
                                                                                 src="{{$product->image}}"/></a>
                                                <h3><b>
                                                        <a style="font-weight: normal;color: #707070"
                                                           href="{{$product->url}}">{{$product->title}}</a></b>
                                                </h3>
                                                <span style="text-align: left !important;">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>
                                                <div style="text-align: left !important;" class="quality">
                                                    Количина:
                                                    x {{$product->quantity}}


                                                <!-- <button>Измени</button> -->
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div>
                                        <?php
                                        $totalProducts = 0;
                                        $totalPrice = 0;
                                        ?>@if (Session::has('cart_products'))
                                            @foreach(session()->get('cart_products') as $pid => $product)
                                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                            @endforeach
                                        @endif
                                        {{--<a href="cart.html" class="flat-left">Види кошничка</a>--}}
                                        <div class="total flat-reset">
                                            <span class="flat-left"></span>
                                            <h2 style="font-size:16px; color:#707070" class="cart-block-heading">Вкупно: <i style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i> ден.</h2>

                                            <span class="flat-right"></span>
                                        </div>
                                        <div class="event flat-reset">
                                            <a href="{{URL::to('/cart')}}" class="flat-left">Види кошничка</a>

                                            <!-- <a href="#" class="flat-right">Плати</a> -->
                                        </div>
                                        <br>
                                    </div>
                                @else
                                    <div id="shoppingCart">
                                        <br><br>
                                        <h5>Вашата кошничка моментално е празна</h5><br>
                                        <div class="event flat-reset">
                                            <a href="{{URL::to('/cart')}}" class="flat-left">Види кошничка</a>

                                            <!-- <a href="#" class="flat-right">Плати</a> -->
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            </div>
                        </aside>


                        {{--<aside class="widget widget_shopping">--}}
                            {{--<a href="#">--}}
                                {{--<img src="/assets/finki-giftshop/img/header/shop.png" alt="Delivery">--}}
                                {{--<span class="title">КОШНИЧКА</span>--}}
                                {{--<span>3 производи</span> - <span class="blue" title="prices">$566.00</span>--}}
                            {{--</a>--}}

                            {{--<div class="flat-ordered">--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<img src="/assets/finki-giftshop/img/page/order/1.jpg" alt="image">--}}
                                        {{--<h3>LOREM IPSUM DOLOR SIT AMET</h3>--}}
                                        {{--<span>$256.00 <span class="edit"></span><span class="delete"></span></span>--}}
                                        {{--<div class="quality">--}}
                                            {{--Qty:--}}
                                            {{--<input type="text" value="01">--}}
                                            {{--<button>Update</button>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<img src="img/page/order/2.jpg" alt="image">--}}
                                        {{--<h3>LOREM IPSUM DOLOR SIT AMET</h3>--}}
                                        {{--<span>$256.00 <span class="edit"></span><span class="delete"></span></span>--}}
                                        {{--<div class="quality">--}}
                                            {{--Qty:--}}
                                            {{--<input type="text" value="01">--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<img src="img/page/order/3.jpg" alt="image">--}}
                                        {{--<h3>LOREM IPSUM DOLOR SIT AMET</h3>--}}
                                        {{--<span>$256.00 <span class="edit"></span><span class="delete"></span></span>--}}
                                        {{--<div class="quality">--}}
                                            {{--Qty:--}}
                                            {{--<input type="text" value="01">--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<div class="total flat-reset">--}}
                                    {{--<span class="flat-left"></span>--}}
                                    {{--<span class="flat-right"></span>--}}
                                {{--</div>--}}
                                {{--<div class="event flat-reset">--}}
                                    {{--<a href="#" class="flat-left">VIEW CART</a>--}}
                                    {{--<a href="#" class="flat-right">CHECKOUT</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</aside> <!-- /.widget_shopping -->--}}
                    </div> <!-- /.flat-widgets -->
                </div>
            </div>
        </div>
    </div> <!-- /.flat-header-top -->

    <div class="flat-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flat-menu flat-left">
                        <div class="btn-menu">
                            <span></span>
                        </div><!-- //mobile menu button -->
                        <div class="nav-wrap">
                            <nav id="mainnav" class="mainnav">
                                <ul class="menu">
                                    <li>
                                        <a href="{{route('home')}}">Дома</a>
                                    </li>



                                    @foreach($menuCategories as $mc)
                                        @if(isset($mc['children']))
                                            <li class="parent">
                                        @else
                                            <li>
                                                @endif
                                                <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                                @if(isset($mc['children']))
                                                    <ul class="submenu">
                                                        @foreach($mc['children'] as $ch)
                                                            <li>
                                                                <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                            @endforeach

                                    {{--<li><a href="about.html">About</a></li>--}}
                                    {{--<li class="parent"><a href="#">Product</a>--}}
                                        {{--<ul class="submenu">--}}
                                            {{--<li><a href="product_gird.html">Product Grid </a>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="product_list.html">Product List</a>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="product_detail.html">Product Detail</a>--}}
                                            {{--</li>--}}
                                        {{--</ul><!-- /.submenu -->--}}
                                    {{--</li>--}}

                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav -->
                        </div><!-- /.nav-wrap -->
                    </div> <!-- /.flat-menu -->


                </div>
            </div>
        </div>
    </div> <!-- /.flat-header-bottom -->
</header> <!-- /.flat-header -->
