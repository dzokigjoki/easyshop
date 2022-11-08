@if (Session::has('cart_products'))
    @foreach(session()->get('cart_products') as $product)
        <?php $product = (object)$product; ?>
        <li class="cart-item">
            <a class="product-thumbnail" href="{{$product->url}}">
                <img style="height: 37px; width: 34px;" src="{{$product->image}}"/>
            </a>
            <div class="product-details">
                <a href="{{$product->url}}" class="product-title">
                    {{$product->title}}
                </a>
                <span class="product-quantity">x {{$product->quantity}}</span>
                <span class="product-price"><span class="currency"></span>{{ number_format($product->price, 0, ',', '.')}} {{trans('watchstore.currency')}}.</span>
            </div>
        </li>
        <div>
            @endforeach
            <?php
            $totalProducts = 0;
            $totalPrice = 0;
            ?>@if (Session::has('cart_products'))
                @foreach(session()->get('cart_products') as $pid => $product)
                    <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                @endforeach
            @endif
            <li class="cart-subtotal">
                Вкупно
                <span class="amount"><span class="currency"></span><i style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i> {{trans('watchstore.currency')}}.</span>
            </li>
            <li class="cart-actions">
                <a style="width:100% !important;" href="{{route('cart')}}" class="view-cart mt-10"><button style="width:100% !important;" class="prebaraj btn btn-primary">{{trans('watchstore.gotocart')}}</button></a>
            </li>
        </div>
        @else
            <li>
                <br>
                <div class="product-details">
                    <h5 style="color:#A6A6A6;">{{trans('watchstore.emptyCart')}}</h5>
                </div>
            </li>
            <li class="cart-actions">
                <br>
                <a style="width:100% !important;" href="{{route('cart')}}" class="view-cart mt-10"><button style="width:100% !important;" class="prebaraj btn btn-primary">{{trans('watchstore.gotocart')}}</button></a>
            </li>
        @endif