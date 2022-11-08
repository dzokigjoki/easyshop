@if (Session::has('cart_products'))
    <p class="dropdown-cart-description">Скоро додадени продукти.</p>
    <div style="height:300px; overflow-y: auto">
            @foreach(session()->get('cart_products') as $product)
                <?php $product = (object)$product; ?>

                <li class="item clearfix">
                    <a href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif" title="Delete item" class="delete-item"><i class="fa fa-times"></i></a>
                    <figure>
                        <a href="{{$product->url}}"><img src="{{$product->image}}" alt="phone 4"></a>
                    </figure>
                    <div class="dropdown-cart-details">
                        <p class="item-name">
                            <a href="{{$product->url}}">{{$product->title}} </a>
                        </p>
                        <p>
                            {{$product->quantity}}x
                            <span class="item-price">{{ number_format($product->price, 0, ',', '.')}} мкд.</span>
                        </p>

                    </div>
                </li>
            @endforeach
    </div>
    <?php
    $totalProducts = 0;
    $totalPrice = 0;
    ?>@if (Session::has('cart_products'))
        @foreach(session()->get('cart_products') as $pid => $product)
            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
        @endforeach
    @endif
    <ul class="dropdown-cart-total">
        <li><span class="dropdown-cart-total-title">Вкупно:</span><span data-cart-total-price>{{$totalPrice}}</span>мкд.</li>
    </ul><!-- .dropdown-cart-total -->
    <div class="dropdown-cart-action">
        <p><a href="{{route('cart')}}" class="btn btn-custom-2 btn-block">кошничка</a></p>
    </div><!-- End .dropdown-cart-action -->
@else
    <p class="dropdown-cart-description">Вашата кошничка е празна.</p>
@endif