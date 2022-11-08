@if (Session::has('cart_products'))
<div id="shoppingCart">
    <div class="hover-cart">
        <div class="hover-box">
            @foreach(session()->get('cart_products') as $product)
            <?php $product = (object)$product; ?>
            <a href="{{$product->url}}">
                {{--<img src="{{ url_assets('') }}/assets/shopathome/images/hover1.png" alt=""
                class="left-hover">--}}
                <img src="{{$product->image}}" alt="" class="left-hover">
            </a>
            <div class="hover-details">
                <p>{{$product->title}}</p>
                <span>{{ number_format($product->price, 0, ',', '.')}} ден.</span>
                <div class="quantity">Количина: {{$product->quantity}}</div>
            </div>
            @endforeach
            <div class="clear"></div>
        </div>
        <div class="subtotal">
            {{-- Вкупно: <span>{{ $totalPrice? }}??.</span> --}}
        </div>
        <a href="{{route('cart')}}" class="viewcard button-red"> Види кошничка</a>
    </div>
</div>
@else
<div id="shoppingCart">
    <div class="hover-cart">
        <div class="hover-box">
            <br>
            <div class="subtotal">
                ?????? ???????? ? ??????!
            </div>
        </div>
        <a href="{{route('cart')}}" class="viewcard button-red"> Вашата кошничка е празна</a>
    </div>
</div>
@endif