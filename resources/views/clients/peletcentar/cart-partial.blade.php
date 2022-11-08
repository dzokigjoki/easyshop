    @if (Session::has('cart_products'))
        <ul>
            <?php $totalWeight = 0; ?>
            @foreach(session()->get('cart_products') as $product)

                <?php $product = (object)$product; ?>
                <li>
                    <a href="{{$product->url}}"><img style="height: 37px; width: 34px;"
                                                     src="{{$product->image}}"/></a>
                    <h3><b>
                            <a style="font-weight: normal;color: #707070"
                               href="{{$product->url}}">{{$product->title}}</a></b>
                    </h3>
                    <span>{{ number_format($product->price, 0, ',', '.')}} мкд.</span>
                    <div class="quality">
                        Количина:
                        x{{$product->quantity}}
                        @if(in_array($product->id, $peletcentarPeletiIds))
                            ({{15 * $product->quantity}}kg)
                            <?php $totalWeight += 15 * $product->quantity; ?>
                        @endif
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
                @if($totalWeight)
                    <p>Вкупно маса на пелети: {{$totalWeight}}kg</p>
                @endif
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