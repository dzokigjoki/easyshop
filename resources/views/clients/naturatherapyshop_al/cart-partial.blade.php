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
      <a href="{{ $urlLang }}p/{{ $product->id }}/product{{ $product->id }}">
        <img src="{{ $product->image }}" alt="{{$product->title}}">
      </a>
    </div>
    <div class=" nav-cart-title">
      <a href="{{ $urlLang }}p/{{ $product->id }}/product{{ $product->id }}">
        {{$product->title}}
      </a>
      <div class="nav-cart-price">
        <div>{!! trans('naturatherapy/global.quantity') !!}: {{$product->quantity}}</div>
        <div class="pt-10">{{ $product->price * $product->quantity}} @if($price_multiplier == 1) &#128; @else LEK  @endif</div>
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
  <span>
  {!! trans('naturatherapy/global.total') !!}:</span>
  <span class="total-price">{{$totalPrice}} @if($price_multiplier == 1) &#128; @else LEK  @endif</span>
</div>

<div class="nav-cart-actions mt-20">
  <a href="{{ $urlLang }}cart" class="btn btn-md btn-dark"><span>{!! trans('naturatherapy/global.view_cart') !!}</span></a>
</div>
@else
<h6 class="text-center">{!! trans('naturatherapy/global.empty-cart') !!}</h6>
@endif