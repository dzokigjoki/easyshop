@if (Session::has('cart_products'))
@foreach(session()->get('cart_products') as $product)
<?php $product = (object)$product; 
                if(isset($product) && isset($product->additional) && !is_null($product->additional)) {
                  $product->price = $product->additional['price'];
                }
              ?>
<li class="flex-justified-center mt-20 mini_cart_item">
  @if(!is_null($product->additional) && isset($product->additional['cake_form']))
  <img style="height:70px; position: absolute; z-index: 500;"
    src="{{ url_assets('/torti/images/decorations/fill/'.$product->additional['cake_form'].'/'.$product->additional['fill'].'.png') }}"
    alt="">
  <img style="height:70px; position:absolute; z-index: 500"
    src="{{ url_assets('/torti/images/decorations/bottom/'.$product->additional['bottom_decoration_design'].'/'.$product->additional['cake_form'].'/'.$product->additional['bottom_decoration_color'].'.png') }}"
    alt="">
  <img style="height:70px; position: absolute; z-index: 500"
    src="{{ url_assets('/torti/images/decorations/top/'.$product->additional['top_decoration_design'].'/'.$product->additional['cake_form'].'/'.$product->additional['top_decoration_color'].'.png') }}"
    alt="">
  <img style="height:70px; position: relative;"
    src="{{ url_assets('/torti/images/decorations/shlag/'.$product->additional['cake_form'].'/'.$product->additional['cake_color'].'.png') }}"
    alt="">
  @else
  <img class="pl-34 normal-cart-image attachment-shop_thumbnail" src="{{ $product->image }}">
  @endif

  <div class="cart-padding cart-detail">
    <a href="#">{{ $product->title }}
    </a>
    <span class="quantity">{{ $product->quantity }} &#215; <span class="amount">{{ $product->price }}
        ден.</span></span>
  </div>
</li>
@endforeach
@else
<label>Вашата кошничка е празна</label>
@endif
<li class="cart-padding subtotal">
  <h5>Вкупно <span>{{ $totalPrice }} ден.</span></h5>
</li>
<li class="flex-justified-center justify-content-center cart-padding button">
  <a href="{{ route('cart') }}">Види кошничка</a>
</li>