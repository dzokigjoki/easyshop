            <div class="bo-b-1 bocl15" id="shoppingCart">
                <!-- cart header item -->
                @if (Session::has('cart_products'))
                    @foreach(session()->get('cart_products') as $product)

                        <?php $product = (object)$product; ?>
                        <div class="flex-w flex-str m-b-25">

                            <div class="size-w-15 flex-w flex-t">
                                <a href="{{route('product',[$product->id,$product->url])}}"
                                   class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                    <img src="{{$product->image}}" alt="PRODUCT">
                                </a>

                                <div class="size-w-17 flex-col-l">
                                    <a href="product-single.html"
                                       class="txt-s-108 cl3 hov-cl10 trans-04">
                                        {{$product->title}}
                                    </a>

                                    <span class="txt-s-101 cl9">
											{{$product->price}} ден.
										</span>

                                    <span class="txt-s-109 cl12">
											x{{$product->quantity}}
										</span>
                                </div>
                            </div>

                            <div class="size-w-14 flex-b">
                                <button class="lh-10">
                                    <img src="{{ url_assets('/bloomtea/images/icon-close.png') }}" alt="CLOSE">
                                </button>
                            </div>
                        </div>
                @endforeach
            @endif

            <!-- cart header item -->
            </div>


            <div class="flex-w flex-sb-m p-b-31">
							<span class="txt-m-103 cl3 p-r-20">
								Вкупно:
							</span>


                <span data-cart-total-price class="txt-m-111 cl10">
                            {{$totalPrice}} ден.
							</span>
            </div>

            <a href="{{URL::to('/cart')}}"
               class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                Види кошничка
            </a>


