@if (Session::has('cart_products'))
    <div class="nav-dropdown-inner">
        <ul class="cart_list paddingCart scroller">
            <h5 class="pull-left">Во кошничка</h5><br><br>
            @foreach(session()->get('cart_products') as $product)
                <?php $product = (object)$product; ?>
                <li style="min-height: 60px; list-style-type:none; text-align: left !important;">
                    <a class="pull-left" href="{{$product->url}}"><img class="marginRight" style="float:left; height: 37px; width: 34px;"
                                                                       src="{{$product->image}}"/><span class="marginRight" style="color: #1481BD !important; font-size:12px;">x{{$product->quantity}}</span></a>
                    <h3 class="marginRight alignCart"><b>
                            <a style="font-size: 13px; font-weight: normal;color: #707070"
                               href="{{$product->url}}">{{$product->title}}</a></b>
                    </h3>
                    <span style="color:#1481BD; text-align: left !important;">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>

                </li>
            @endforeach
        </ul>
        <div class="minicart_total_checkout">
            <?php
            $totalProducts = 0;
            $totalPrice = 0;
            ?>@if (Session::has('cart_products'))
                @foreach(session()->get('cart_products') as $pid => $product)
                    <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                @endforeach
            @endif

        </div>
        <a href="{{route('cart')}}" class="button expanded text-uppercase">Види кошничка</a>
    </div>
@else
    <div id="shoppingCart">
        <div id="shoppingCart">
            <div class="nav-dropdown-inner">
                <div class="cart_list">
                    <h5>Вашата кошничка моментално е празна</h5>
                </div>
                <div class="event flat-reset">
                    <a href="{{route('cart')}}" class="button expanded text-uppercase">кошничка</a>
                    <!-- <a href="#" class="flat-right">Плати</a> -->
                </div>
                <br>

            </div>

        </div>
    </div>
@endif