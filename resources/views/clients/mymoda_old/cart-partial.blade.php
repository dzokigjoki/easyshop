<ul class="dropdown-menu" aria-labelledby="shoppingCart">
  @if (Session::has('cart_products'))
  @foreach(session()->get('cart_products') as $product)
  <?php $product = (object)$product; ?>
  <li><span class="ps-product--shopping-cart"><a class="ps-product__thumbnail" href="product-detail.html"><img src="/"
          alt="{{$product->title}}"></a><span class="ps-product__content"><a class="ps-product__title"
          href="{{$product->url}}">{{$product->title}}</a>
        <span class="ps-product__quantity">{{ $product->quantity }} x
          <span>{{ number_format($product->price, 0, ',', '.')}} МКД</span></span>
      </span><a class="ps-product__remove" href="#"><i class="fa fa-trash"></i></a></span>
  </li>
  @endforeach

  <?php
  $totalProducts = 0;
  $totalPrice = 0;
  ?> @if (Session::has('cart_products'))
  @foreach(session()->get('cart_products') as $pid =>
  $product)
  <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
  @endforeach
  @else
  <h3>Вашата кошничка е празна</h3>
  @endif

  <li class="total">
    <p>Вкупно: <br><span> {{ number_format($product->price, 0, ',', '.')}} МКД</span></p><a class="ps-btn" href="#">Види
      кошничка</a>
  </li>
  @endif
</ul>