<section class="loading-overlay">
    <div class="Loading-Page">
        <h2 class="loader">Loading...</h2>
    </div>
</section>

<div class="boxed">
{{--<div class="flat-top v1 flat-reset">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<!-- <div class="flat-top-right flat-right">--}}
{{--<ul>--}}
{{--<li><a href=""><i class="fa fa-user"></i>My Account</a></li>--}}
{{--<li><a href=""><i class="fa fa-heart"></i>My Wishlist</a></li>--}}
{{--<li><a href=""><i class="fa fa-check-square-o"></i>Checkout</a></li>--}}
{{--<li><a href=""><i class="fa fa-sign-in"></i>Sign In</a></li>--}}
{{--</ul>--}}
{{--</div> --> <!-- /.flat-top-right -->--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<!-- <div class="flat-multilanguage">
            <aside id="icl_lang_sel_widget-1" class="widget widget_icl_lang_sel_widget">
                <div id="lang_sel">
                    <ul>
                        <li>
                            <a href="#" class="lang_sel_sel icl-en">
                                <span class="icl_lang_sel_current icl_lang_sel_native">English</span>
                            </a>

                            <ul>
                                <li class="icl-en">
                                    <a href="#">
                                        <img class="iclflag" src="img/header/en.png" alt="de" title="German">
                                        <span class="icl_lang_sel_native">English</span>
                                        <span class="icl_lang_sel_translated">
                                            <span class="icl_lang_sel_bracket">(</span>
                                            English<span class="icl_lang_sel_bracket">)</span>
                                        </span>
                                    </a>
                                </li>

                                <li class="icl-fr">
                                    <a href="#">
                                        <img class="iclflag" src="img/header/fe.png" alt="fr" title="French">
                                        <span class="icl_lang_sel_native">Français</span>
                                        <span class="icl_lang_sel_translated">
                                            <span class="icl_lang_sel_bracket">(</span>
                                            French<span class="icl_lang_sel_bracket">)</span>
                                        </span>
                                    </a>
                                </li>

                                <li class="icl-de">
                                    <a href="#">
                                        <img class="iclflag" src="img/header/ge.png" alt="de" title="German">
                                        <span class="icl_lang_sel_native">Deutsch</span>
                                        <span class="icl_lang_sel_translated">
                                            <span class="icl_lang_sel_bracket">(</span>
                                            German<span class="icl_lang_sel_bracket">)</span>
                                        </span>
                                    </a>
                                </li>

                                <li class="flat-currency">
                                    <a href="#" class="flat-dollar">USD</a>
                                    <a href="#" class="flat-euro">EURO</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
 -->
</div> <!-- /.flat-top -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-12 col-sm-12 col-lg-12 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><a href="{{route('blog', [5, 'za-nas'])}}" >За нас</a></li>
                    <li><a href="{{route('blog', [4, 'kako-da-naracham?'])}}">Како да нарачам?</a></li>
                    <li style="border-right: none;">Контакт:</li>
                    <li><a href="tel:0038978333383" ><i class="fa fa-phone"> </i><span> +389 78 333 383</span></a></li>
                    <li><a href="tel:0038972230120" ><i class="fa fa-phone"> </i><span> +389 72 230 120</span></a></li>
                    <li><a href="tel:0038925511300" ><i class="fa fa-phone"> </i><span> +389 2 5511 300</span></a></li>
                    <li style="border-right: none;">Е-пошта:</li>
                    <li><a href="mailto:info@peletcentar.mk"><i class="fa fa-envelope"> </i><span>info@peletcentar.mk</span></a></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
        </div>
    </div>
</div>
<header class="flat-header flat-reset">
    <div class="flat-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 padding-right-0">
                    <div class="logoSmall flat-logo col-lg-3 col-md-2" style="margin-top: 11px; ">
                        <a href="{{route('home')}}" title="Logo">
                            <img class="logoSmall" src="{{url_assets('/peletcentar/img/logoPNGnamaleno.png')}}" alt="Logo">
                        </a>
                    </div> <!-- /.flat-logo -->

                    <div class="col-lg-10 col-md-10 flat-widgets">
                        {{--<aside style="width:auto;" class="inlineSearch widget widget_search">--}}
                            {{--<form method="GET" class="search-form" action="{{route('search')}}"--}}
                                  {{--style="margin-top: 5px;">--}}
                                {{--<label>--}}
                                    {{--<!-- <span class="screen-reader-text">Search for:</span> -->--}}
                                    {{--<!-- +389 78 333 383 +389 72 230 120 +389 2 55 11 300<br> -->--}}
                                    {{--<input type="search" class="search-field"--}}
                                           {{--placeholder="Пребарај по продукт, бренд..." value="" name="search">--}}
                                {{--</label>--}}
                                {{--<input type="submit" class="search-submit" value="Пребарај">--}}
                            {{--</form>--}}
                        {{--</aside> <!-- /.widget_search -->--}}
                        {{-- <div class="col-xs-6 col-sm-3 col-lg-3 col-md-3">
                        <aside style="margin-left:20px;" class="hide-xs widget widget_shipping">
                                <img src="{{url_assets('/peletcentar/img/delivery.png')}}" alt="Delivery">
                                <span style="color:#616b76" class="title">Бесплатна достава за над 30 вреќи</span>
                                <span>Скопје и околина</span>
                                <span>Испорака за 24h</span>
                            
                        </aside> <!-- /.widget_shipping -->
                        </div> --}}
                        <div class="col-xs-6 col-sm-3 col-lg-3 col-md-3">
                            <aside style="margin-left:20px;" class="hide-xs hide-sm widget widget_shipping">
                                <img src="{{url_assets('/peletcentar/img/alarm-clock.png')}}" alt="Delivery">
                                <span style="color:#616b76" class="title">Работно време</span>
                                <span>Пон.-Пет. 09-17h</span>
                                <span>Саб. 09-14h</span>
                            </aside> <!-- /.widget_shipping -->
                        </div>
                        {{--<div class="col-sm-6 col-lg-3 col-md-7">--}}
                            {{--<aside style="margin-left:20px;" class="hide-xs widget widget_shipping">--}}
                                {{--<img src="https://assets.smartsoft.mk/easyshop/peletcentar/img/warehouse.png" alt="Delivery">--}}
                                {{--<span style="color:#616b76" class="title"> Работно време: Пон. – Пет. 09 – 17h--}}
                                    {{--Саб. 09 – 14h--}}
                                {{--</span><br/>--}}
                            {{--</aside> <!-- /.widget_shipping -->--}}
                        {{--</div>--}}

                        {{-- Naracaj online --}}

                        {{-- <div class="col-xs-6 col-sm-3 col-lg-3 col-md-3">
                            <aside style="margin-left:20px;" class="hide-sm hide-xs widget widget_shipping">
                                <img src="{{url_assets('/peletcentar/img/time.png')}}" alt="Delivery">
                                <span style="color:#616b76" class="title">Нарачај и плати онлајн 24h</span>
                                <span>
                                    <i class="fa fa-cc-mastercard"></i>
                                    <i class="fa fa-cc-visa"></i>
                                </span>
                            </aside> <!-- /.widget_shipping -->
                        </div> --}}
                        {{--<a href="{{URL::to('/cart')}}"> This was on line 160 and commented--}}

                        <div class="pull-right cart-cont col-sm-3 col-lg-3 col-md-3">
                        <!-- <aside style="width:auto;" class="cartHeader inlineKosnicka widget widget_shopping">
                            <a href="#">
                                <img style="width: 40px; height: auto;" src="{{url_assets('/peletcentar/img/header/shop.png')}}" alt="Delivery" class="black-cart">
                                <img style="width: 40px; height: auto;" src="{{url_assets('/peletcentar/img/header/shop-white.png')}}" alt="Delivery" class="white-cart">
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
                                        </span>
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

                                                    @if(in_array($product->id, $peletcentarPeletiIds))
                                                        ({{15 * $product->quantity}}kg)
                                                        <?php $totalWeight += 15 * $product->quantity; ?>
                                                    @endif

                                                    
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
                                            <div class="total flat-reset">
                                                <span class="flat-left"></span>
                                                <h2 style="font-size:16px; color:#707070" class="cart-block-heading">Вкупно: <i style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i> ден.</h2>
                                                @if($totalWeight)
                                                    <p>Вкупно маса на пелети: {{$totalWeight}}kg</p>
                                                @endif
                                                <span class="flat-right"></span>
                                            </div>
                                            <div class="event flat-reset">
                                                <a href="{{URL::to('/cart')}}" class="flat-left">Види кошничка</a>

                                                
                                            </div>
                                            <br>
                                    </div>
                                @else
                                    <div id="shoppingCart">
                                        <br><br>
                                        <h5>Вашата кошничка моментално е празна</h5><br>
                                        <div class="event flat-reset">
                                            <a href="{{URL::to('/cart')}}" class="flat-left">Види кошничка</a>

                                            
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            </div>
                        </aside> -->
                        <!-- /.widget_shopping -->
                        </div>
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
                                    <li class="home">
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

                                            <li><a href="{{route('blog',[10,'galerija'])}}">Галерија</a></li>
                                            <li><a href="{{route('blog',[11,'dostava'])}}">Достава</a></li>
                                            <li><a href="{{route('page.contact')}}">Контакт</a></li>
                                </ul><!-- /.menu -->
                            </nav>
                            <!-- /.submenu -->
                            {{--</li>--}}

                            {{--</ul><!-- /.menu -->--}}
                            {{--</nav><!-- /.mainnav -->--}}
                        </div><!-- /.nav-wrap -->
                    </div> <!-- /.flat-menu -->

                    <div class="flat-header-socials flat-right">
                        <!-- <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul> -->
                    </div> <!-- /.flat-header-socials -->
                </div>
            </div>
        </div>
    </div> <!-- /.flat-header-bottom -->
</header> <!-- /.flat-header -->
</div>