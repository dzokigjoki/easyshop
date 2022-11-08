<div class="header">
    <div class="container">
        <a class="site-logo" href="/"><img src="{{ url_assets('/alex_filippe/images/logo.svg') }}" width="220" alt="Alex Filipe" style="margin-top: -10px;"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
            <i class="fa fa-shopping-cart"></i>
            <div class="shop-items">
                    <?php
                    $totalProducts = 0;
                    $totalPrice = 0;
                    ?>@if (Session::has('cart_products'))
                        @foreach(session()->get('cart_products') as $pid => $product)
                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                        @endforeach
                    @endif
                <span class="minicart-icon">
                    <i class="minicart-icon-svg elegant_icon_bag"></i>
                    <span data-amount-value>{{$totalProducts}}</span>
                </span>
            </div>
            <div class="top-cart-content-wrapper">
                <div class="top-cart-content">
                    <ul id="shoppingCart" class="scroller" style="height: 250px;">
                        @if (Session::has('cart_products'))
                            <?php $totalPrice = 0 ?>
                                @foreach(session()->get('cart_products') as $pid => $product)
                                <li>
                                    <?php $totalPrice = $totalPrice + ($product['price'] * $product['quantity']) ?>
                                    <a href="{{$product['url']}}"><img src="{{$product['image']}}" alt="{{$product['title']}}" width="37" height="34"></a>
                                    <span class="cart-content-count">x {{$product['quantity']}} </span>
                                    <strong><a href="{{$product['url']}}">{{$product['title']}}</a>
                                        @if(isset($product['variation_value']))
                                            ({{$product['variation_value']}})
                                        @endif

                                    </strong>

                                    <em>{{number_format($product['price'] / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</em>
                                </li>
                                @endforeach
                                <li class="text-right">
                                    Вкупна сума: {{number_format($totalPrice  / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}  {{\Session::get('selectedCurrency')}} &nbsp;&nbsp;
                                    <a href="{{route('cart')}}" class="btn btn-primary">Види кошничка</a>
                                </li>
                        @else
                            <li>Вашата кошничка е празна.</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
            <ul>
                @foreach($menuCategories as $item)
                <li {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class=open' : ''  }}>
                    <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                </li>
                @endforeach

                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn" search-btn></i>
                    <div class="search-box">
                        <form action="{{route('search')}}">
                            <div class="input-group">
                                <input type="text" placeholder="Внеси збор" search-input name="search" class="form-control">
                                <span class="input-group-btn">
                                  <button class="btn btn-primary" type="submit">Барај</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>

