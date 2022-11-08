<div class="widget_shopping_cart_content">
  <ul class="woocommerce-mini-cart cart_list product_list_widget ">

    @if (Session::has('cart_products'))
    @foreach(session()->get('cart_products') as $product)
    <?php $product = (object)$product; ?>
    <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
      <a class="product-image" href="#">
        <img src="{{$product->image}}" alt="{{$product->title}}">
      </a>
      <a class="product-title" href="{{$product->url}}">
        {{ $product->title }}</a>
      <span class="quantity">
        {{ $product->quantity }} ×
        <span class="woocommerce-Price-amount amount">
          {{ number_format($product->price, 0, ',', '.')}} МКД
        </span>
      </span>
      <a href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="remove">
        <span class="lnr lnr-cross"></span>
      </a>
    </li>
    @endforeach
    @endif
  </ul>
  <p class="woocommerce-mini-cart__total total">
    <span>Вкупно:</span>
    <span class="woocommerce-Price-amount amount">
      {{ number_format($totalPrice,0,',','.') }}
      МКД
    </span>
  </p>
  <p class="woocommerce-mini-cart__buttons buttons">
    <a href="/cart" class="button checkout wc-forward au-btn au-btn-black btn-small">Види кошничка</a>
  </p>
</div>