<?php $totalPrice = 0;
$totalQuantity = 0;
?>
@if ((Session::has('cart_products') && count(session()->get('cart_products'))>0))
<div class="nav-cart-items">
  @foreach(session()->get('cart_products') as $pid => $product)
  <?php $product = (object)$product;
  $totalPrice += $product->price * $product->quantity;
  $totalQuantity += $product->quantity;
  ?>
  <div class="nav-cart-item clearfix">
    <div class="nav-cart-img">
      <a href="#">
        <img src="{{ $product->image }}" alt="{{$product->title}}">
      </a>
    </div>
    <div class=" nav-cart-title">
      <a href="#">
        {{$product->title}}
      </a>
      <div class="nav-cart-price">
        <div>Количина: {{$product->quantity}}</div>
        <div class="pt-10">{{ (int)$product->price * $product->quantity}} МКД</div>
      </div>
    </div>
    <div class="nav-cart-remove">
      <a @if($product->variation)
        href="{{URL::to('cart/remove/')}}/{{$product->id}}/{{$product->id.','.$product->variation}}"
        @else
        href="{{URL::to('cart/remove/')}}/{{$product->id}}"
        @endif
        class="remove"
        title="Remove this item">&times;</a>
    </div>
  </div>
  @endforeach
</div>

<div class="nav-cart-summary">
  <span>Вкупно:</span>
  <span class="total-price">{{$totalPrice}} МКД</span>
</div>

<div class="nav-cart-actions mt-20">
  <a href="/cart" class="btn btn-md btn-dark"><span>Види кошничка</span></a>
</div>
@else
<h6 class="text-center">Вашата кошничка е моментално празна.</h6>
@endif