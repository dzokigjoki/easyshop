@if (Session::has('cart_products'))

        <div class="container">
            <div class="cart__top">Во кошничка:</div>
            <a href="#" class="icon icon-close cart__close"><span>ЗАТВОРИ</span></a>
            <ul>
                @foreach(session()->get('cart_products') as $product)
                    <?php $product = (object)$product; ?>
                    <li class="cart__item">
                        <div class="cart__item__image pull-left"><a href="#"><img src="{{$product->image}}" alt="Shop Image">
                            </a>
                        </div>
                        <div class="cart__item__control">
                            <div class="cart__item__delete"><a href="{{URL::to('cart/remove/')}}/{{$product->id}}"
                                                               class="icon icon-delete"><span>Избриши</span></a>
                            </div>
                        </div>
                        <div class="cart__item__info">
                            <div class="cart__item__info__title">
                                <h2 class="limit-txt" style=""><a href="{{$product->url}}">{{$product->title}}</a></h2>
                            </div>
                            <div class="cart__item__info__price"><span class="info-label">Цена:</span><span>{{ number_format($product->price, 0, ',', '.')}} ден.</span>
                            </div>
                            <div class="cart__item__info__qty"><span style="padding-right:10px;"
                                                                     class="info-label">Количина:  </span><input style="border:none !important;" disabled type="text"
                                                                                                                 class="input--ys"
                                                                                                                 value='{{$product->quantity}}'/>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="cart__bottom">
                <?php
                $totalProducts = 0;
                $totalPrice = 0;
                ?>@if (Session::has('cart_products'))
                    @foreach(session()->get('cart_products') as $pid => $product)
                        <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                    @endforeach
                @endif
                <div style="color: #1FC0A0 !important;" class="cart__total">Вкупно: <span data-cart-total-price> {{$totalPrice}}</span>ден.</div>
                {{--<a href="#" class="btn btn--ys btn-checkout">Наплата<span class="icon icon--flippedX icon-reply"></span></a>--}}
                <a href="{{route('cart')}}" class="btn btn--ys">
                    <span class="icon icon-shopping_basket"></span> Види кошничка
                </a>
            </div>
        </div>
        @else
            <div id="shoppingCart" class="dropdown-menu dropdown-menu--xs-full slide-from-top" role="menu">
                <div class="container">
                    <div class="cart__top">Вашата кошничка е моментално празна</div>
                    <a href="#" class="icon icon-close cart__close"><span>ЗАТВОРИ</span></a>
                    <div class="cart__bottom">
                        <a href="{{route('cart')}}" class="btn btn--ys"><span
                                    class="icon icon-shopping_basket"></span> Види кошничка</a>
                    </div>
                </div>

            </div>
    </div>
@endif