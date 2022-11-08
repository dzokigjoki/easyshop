<header id="header" class="header2">
    <div id="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-top-left">
                        <ul id="top-links" class="clearfix">
                            <li><a href="index.html" title="">
                                    <span class=""><a
                                                href="{{route('blog', [3, 'kako-da-naracham'])}}">Како да нарачам</a></span>
                                    <i class="fa fa-question"></i></a></li>

                            <li><a href="callto://071 670 203" title=""><i class="fa fa-phone"></i> Телефон / Viber:
                                    <span
                                            class="">071/670-203</span> </a></li>
                            {{--<li><span class="top-icon top-icon-cart"></span><span--}}
                            {{--class="hide-for-xs">Viber: 071/670-203</span></li>--}}
                            <li><a href="mailto:info@topmarket.mk" title="email"><i class="fa fa-envelope"></i><span
                                            class="hide-for-xs"> info@topmarket.mk</span></a></li>
                        </ul>
                    </div><!-- End .header-top-left -->

                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End #header-top -->

    <div id="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-12">
                    <div class="col-md-4 col-sm-4 col-xs-12 logo-container">
                        <h1 class="logo clearfix">
                            <a href="/" title="ТопМаркет - најмногу за вашите пари">
                                <img id="header-logo" src="/assets/topmarket/images/logo.png"
                                     alt="ТопМаркет - најмногу за вашите пари"></a>
                        </h1>

                    </div><!-- End .col-md-5 -->
                    <div class="col-md-8 col-sm-8 col-xs-12 header-inner-right">


                        <div class="header-inner-right-wrapper clearfix">

                            <div class="col-md-8" id="forma">
                                <form class="" method="GET" action="{{route('search')}}">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control" placeholder="Пребарај"
                                                   tabindex="1" id="search">
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="pogolemo">
                                        <button type="submit" class="btn btn-custom-1"
                                                id="search_button"><i
                                                    class="fa fa-search"></i></button>
                                    </div>
                                    <!-- End .form-inline -->
                                </form>

                            </div>


                            <div class="col-md-4">

                                <div class="dropdown-cart-menu-container pull-right" id="pomala_kosnicka">

                                    <div class="btn-group dropdown-cart" id="dropdown_kosnicka">
                                        <?php $totalPrice = 0; $totalProducts = 0;
                                        ?>
                                        @if (Session::has('cart_products'))
                                            @foreach(session()->get('cart_products') as $pid => $product)
                                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                            @endforeach
                                        @endif
                                        <span class="" id="dropdown_kosnicka_button"
                                              data-toggle="dropdown">
                                            <img style="height: 30px; width:40px;"
                                                 src="/assets/topmarket/images/shop.png">
                                            {{--<span class="cart-menu-icon"></span>--}}
                                            <span id="cart">{{$totalProducts}} производ(и) - <span class="drop-price"
                                                                                                   data-cart-total-price=""
                                                                                                   style="font-weight: bold; color: #4065A0">{{number_format($totalPrice, 0, ',', '.')}}
                                                    ден.</span>
                                            </span>


                                        </span>
                                        <br><br>


                                        <div id="shoppingCart"
                                             class="dropdown-menu dropdown-cart-menu pull-right clearfix" role="menu">
                                            <p class="dropdown-cart-description">Производи</p>
                                            <ul class="dropdown-cart-product-list">
                                                @if (Session::has('cart_products'))

                                                    @foreach(session()->get('cart_products') as $product)

                                                        <?php $product = (object)$product; ?>

                                                        <li class="item clearfix">
                                                            {{--Produkt vo kosnickata--}}


                                                            <div class="dropdown-cart-details">
                                                                <table>
                                                                    <tr>
                                                                        <td>
                                                                            <img style="width: 50px; height: 50px; padding-right: 15px;"
                                                                                 src="{{$product->image}}"/>
                                                                        </td>
                                                                        <td>
                                                                            <p class="" id="dd_table_description">
                                                                                <a href="{{$product->url}}">{{$product->title}} </a>
                                                                            </p>
                                                                        </td>
                                                                        <td>
                                                                            <p id="dd_table_price">
                                                                                {{$product->quantity}} x
                                                                                <span class="item-price">{{ number_format($product->price, 0, ',', '.')}}
                                                                                    ден.</span>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </table>


                                                            </div><!-- End .dropdown-cart-details -->
                                                        </li>
                                                    @endforeach

                                                @else
                                                    <span><b>Вашата кошничка моментално е празна.</b></span>
                                                @endif
                                            </ul>


                                            <ul class="dropdown-cart-total">
                                                <li><span class="dropdown-cart-total-title">Вкупно:</span><span>{{number_format($totalPrice, 0, ',', '.')}}
                                                        ден.</span></li>
                                            </ul><!-- .dropdown-cart-total -->
                                            <div class="dropdown-cart-action">
                                                <a href="{{URL::to('/cart')}}" class="btn btn-custom-2 btn-block">Кошничка</a>

                                                {{--<p><a href="checkout.html" class="btn btn-custom btn-block">Checkout</a></p>--}}
                                            </div><!-- End .dropdown-cart-action -->

                                        </div><!-- End .dropdown-cart -->
                                    </div><!-- End .btn-group -->
                                </div>
                            </div>

                            <!-- End .dropdown-cart-menu-container -->
                            <!-- End .btn-group -->
                        </div><!-- End .header-top-dropdowns -->
                    </div>

                </div><!-- End .header-inner-right-wrapper -->


            </div>
        </div><!-- End .col-md-7 -->
    </div><!-- End .row -->
    <!-- End .container -->


    <div id="main-nav-container">
        <div class="container" id="nav_row">
            <div class="row" id="navbar_top">
                <div class="row" id="navbar_top">
                    <div class="col-md-12 clearfix">
                        <nav id="main-nav">
                            <div id="responsive-nav">
                                <div id="responsive-nav-button"><span id="responsive-nav-button-icon"></span>
                                    <span id="responsive-nav-text"> Категории</span>
                                </div><!-- responsive-nav-button -->
                            </div>
                            <ul class="menu clearfix">
                                <li class="menu-categories dropdown-lenta">
                                    <a href="/" id="home">Дома</a>
                                </li>
                                @foreach($menuCategories as $mc)
                                    <li class="menu-categories dropdown-lenta">
                                        <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                        @if(isset($mc['children']))
                                            <ul>
                                                @foreach($mc['children'] as $ch)
                                                    <li class="nav_category">
                                                        <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>


                        <!-- - - - - - - - - - - - - - Categories - - - - - - - - - - - - - - - - -->

                        <!--/ .search_category.alignleft-->
                        <!-- - - - - - - - - - - - - - End of categories - - - - - - - - - - - - - - - - -->


                        <!-- End #quick-access -->
                    </div>
                    <!-- End .col-md-12 -->
                </div><!-- End .row -->
            </div><!-- End .container -->


        </div>
        <!-- End #nav --></div>
    <!-- End #inner-header -->
</header>
