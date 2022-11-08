<?php $totalPrice = 0; 
  $totalQuantity = 0;
  $newPrice = 0;
  $totalPriceWithoutDiscount = 0;
?>
@if (session()->has('cart_products') && count(session('cart_products')))
<ul>
  @foreach(session()->get('cart_products') as $product)
  <?php $product = (object)$product;
    $totalPrice += (int)$product->price * $product->quantity;
    $totalQuantity += $product->quantity;
    $productDB = \EasyShop\Models\Product::find($product->id);
    $totalPriceWithoutDiscount += $productDB->price_retail_1 * $product->quantity;
  ?>
  <li>
    <a href="{{$product->url}}">
      <figure><img src="{{ $product->image }}" height="50" class="lazy"></figure>
      <strong>
        <span>{{$product->title}} x {{$product->quantity}}</span>
        <strong class="amount nowrap">{{number_format($product->price * $product->quantity, 0, ',', '.')}}
          мкд.</strong>
      </strong>
    </a>
  </li>
  @endforeach
</ul>
@else
<div class="pb-2">Вашата кошничка моментално е празна</div>
@endif
<div class="total_drop">
  <div class="clearfix"><strong>Вкупно</strong>
    @if($totalPriceWithoutDiscount != $totalPrice)
    <div class="price_main"><span class="new_price">{{number_format($totalPrice, 0, ',', '.')}}
        мкд.</span>
      <span class="old_price">{{number_format($totalPriceWithoutDiscount, 0, ',', '.')}}
        мкд.</span>
    </div>
    @else
    <span>{{ $totalPrice }} мкд</span>
    @endif
  </div>
  <a href="{{ URL::to('/cart') }}" class="btn_1">Кошничка</a>
</div>