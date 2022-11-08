<div class="offcanvas-minicart_wrapper" id="shoppingCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <span>
                <?php
                $totalProducts = 0;
                $totalPrice = 0;
                ?>@if (Session::has('cart_products'))
                    @foreach(session()->get('cart_products') as $pid => $product)
                        <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                    @endforeach
                @endif
            </span>

            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Кошничка</h4>
                </div>
                @if (Session::has('cart_products'))
                    <ul class="minicart-list">
                        <li class="minicart-product">
                                @foreach(session()->get('cart_products') as $product)
                                    <?php $product = (object)$product; ?>
                                    <a href="{{$product->url}}">
                                        {{--<img src="{{ url_assets('') }}/assets/ioutlet/images/hover1.png" alt="" class="left-hover">--}}
                                        <img src="{{$product->image}}" alt="" class="left-hover">
                                    </a>
                                    <div class="hover-details product-item_content">
                                        <a class="product-item_title" href="{{$product->url}}">{{$product->title}}</a>
                                        <span class="product-item_quantity">{{ number_format($product->price, 0, ',', '.')}} ден.</span>
                                        <div class="quantity">Количина: {{$product->quantity}}</div>
                                    </div>
                                @endforeach

                            {{-- <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                            <div class="product-item_img">
                                <img src="assets/images/product/small-size/2-1.jpg" alt="Hiraola's Product Image">
                            </div> --}}
                            
                        </li>
                    </ul>
                    <div class="minicart-btn_area">
                            <a href="{{route('cart')}}" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Види кошничка</a>
                        </div>
                    @else
                        <div id="shoppingCart">
                            <div class="hover-cart">
                                <div class="hover-box">
                                    <br>
                                    <div class="subtotal">
                                        Вашата кошничка е празна!
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
            <div class="minicart-item_total">
                <span>Вкупно: </span>
                <span class="ammount">{{$totalPrice}} ден.</span>
            </div>
            
            {{-- <div class="minicart-btn_area">
                <a href="checkout.html" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Checkout</a>
            </div> --}}
        </div>
    </div>