<div class="head d-flex flex-wrap justify-content-between">
                <span class="title">Кошничка</span>
                <button class="offcanvas-close">×</button>
            </div>
            
            @if (Session::has('cart_products') && (count(Session::get('cart_products')) > 0 ))
            <ul class="minicart-product-list">
    <?php
    $totalPrice = 0;
    $totalProducts = 0;
    ?>
    @foreach (session()->get('cart_products') as $product)
        <?php
        $product = (object) $product;
        $totalPrice = $totalPrice + $product->price * $product->quantity;
        $totalProducts = $totalProducts + $product->quantity;
        ?>

        <?php
        $product = (object) $product;
        $image_old = $product->image;
        $image = str_replace('sm_', 'lg_', $image_old);
        ?>
        <li>
            <a href="{{ $product->url }}" class="image"><img src="{{ $image }}" alt="Cart product Image" /></a>
            <div class="content">
                <a href="{{ $product->url }}" class="title">{{ $product->title }}</a>
                <span class="quantity-price">{{ $product->quantity }} x <span
                        class="amount">{{ number_format($product->price, 0, ',', '.') }}
                        мкд.</span></span>
                <a href="/cart/remove/{{ $product->id }}" class="remove">×</a>
            </div>
        </li>


    @endforeach
</ul>
<div class="sub-total d-flex flex-wrap justify-content-between">
    <strong>Вкупно :</strong>
    <span class="amount">{{ $totalPrice }} мкд.</span>
</div>
<a href="/cart" class="btn btn-secondary btn--lg d-block d-sm-inline-block mr-sm-2">Кон кошничка</a>
            @else
                <p>Моментално немате производи во вашата кошничка.</p>
            @endif
