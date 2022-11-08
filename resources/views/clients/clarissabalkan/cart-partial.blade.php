@if (Session::has('cart_products'))
@foreach(session()->get('cart_products') as $product)
<?php $product = (object)$product; ?>
<li>
    <a href="/p/{{$product->id}}/{{$product->url}}">
        <figure><img
         src="{{ $product->image }}" alt="{{ $product->title }}" 
                data-src="{{$product->image}}"
                alt="" width="50" height="50" class="lazy"></figure>
        <strong>
            <span>{{ $product->quantity }}x {{$product->title}}</span>
            @if(isset($product->price_discount))
            {{ number_format($product->price_discount, 0, ',', '.')}} мкд.
            @else
            {{ number_format($product->price, 0, ',', '.')}} мкд.
            @endif
        </strong>
    </a>
    <a href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="action"><i
            class="ti-trash"></i></a>
</li>
@endforeach
<?php $totalProducts = 0; $totalPrice = 0; ?>
@if (Session::has('cart_products'))
@foreach(session()->get('cart_products') as $pid =>
$product)
<?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
@endforeach
@endif
<div class="total_drop">
    <div class="clearfix"><strong>Вкупно:
        </strong><span>{{ number_format($totalPrice, 0, ',', '.')}} мкд.</span>
    </div>
    <a href="/cart" class="btn_1">Види кошничка</a>
</div>
@else
<div class="total_drop">
    <div class="clearfix">
        <strong>Вашата кошничка е моментално празна</strong>
    </div>
</div>
@endif