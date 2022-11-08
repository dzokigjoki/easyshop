<?php $totalPrice = 0;
$totalQuantity = 0;
// $newPrice = null;
?>
@if ((Session::has('cart_products') && count(session()->get('cart_products'))>0))

<h5 class="text-center title_cart_padding">Вашата Кошничка</h5>
<div class="widget_shopping_cart_content">

    <ul class="cart_list product_list_widget">
        @foreach(session()->get('cart_products') as $pid => $product)
        <?php $product = (object)$product;
        $totalPrice += $product->price * $product->quantity;
        $totalQuantity += $product->quantity;
        ?>
        <li>
            <a @if($product->variation)
                href="{{URL::to('cart/remove/')}}/{{$product->id}}/{{$product->id.','.$product->variation}}"
                @else
                href="{{URL::to('cart/remove/')}}/{{$product->id}}"
                @endif
                class="remove"
                title="Remove this item">&times;</a>
            <a href="{{$product->url}}" class="thumb-product"><img src="{{ $product->image }}" alt=""></a>
            <div class="widget-cart-title-product">
                <a href="{{$product->url}}">{{$product->title}}</a>
                <span class="quantity">Количина: {{$product->quantity}}</span>
                <span class="amount">{{ (int)$product->price * $product->quantity}} ден.</span>
            </div>
        </li>
        @endforeach
    </ul>
    <p class="total total_cart_padding"><strong>Вкупно:</strong> <span class="amount">{{$totalPrice}} ден.</span></p>
    <p class="buttons button_cart_padding">
        <a class="button wc-forward" href="/cart">Види кошничка</a>
    </p>
</div>
@else
<h5 class="text-center">Вашата Кошничка е празна.</h5>
@endif