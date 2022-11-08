    <div class="product-col col-6 col-md-4 col-lg-3 mb-3 mb-lg-5">
        <div class="box-product bg-light product-animation h-100">

            <?php
            $hasDiscount = true;
            $price = number_format($product->$myPriceGroup, 2, '.', '');
            
            $discountPrice = EasyShop\Models\Product::getPriceRetail1($product, false, 2);
            ?>

            <div class="product-badge badge badge-promotion text-uppercase">{!! trans('naturatherapy/global.akciskaponuda') !!}
            </div>
            {{-- <div class="product-badge badge badge-on-sale text-uppercase"><span>50</span>
Zbritje</div> --}}

            <a href="/p/{{ $product->id }}/{{ $product->url }}" class="link link-dark">
                <div class="animation-content mb-3">
                    <div class="img-wrapper product-img-wrapper justify-content-center">
                        <img src="{{\ImagesHelper::getProductImage($product, null, 'lg_')}}" class="img-fluid mb-4" alt="">
                    </div>
                    <div class="text-center">
                        <p class="h5 product-title-1 font-weight-bold">{{ $product->title }}</p>
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <p class="h6 product-title-2 text-sm font-weight-bold mb-2"><span class="text-del">{{ number_format($price * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</span></p>
                        <p class="h6 product-title-2 text-sm text-red font-weight-bold mb-0">{{ number_format($discountPrice * $price_multiplier, 2, '.', '')  }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>

                        @else 
                        <p class="h6 product-title-2 text-sm text-red font-weight-bold mb-0">{{ number_format($price * $price_multiplier, 2, '.', '')  }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>

                        @endif
                    </div>
                </div>
            </a>
            <div class="button-wrapper">
                <div class="cart-form" action="">
                    <button data-add-to-cart="" value="{{$product->id}}" type="submit" class="btn btn-secondary btn-icon"><i class="fa fa-shopping-cart mr-2"></i><span>
                    {!! trans('naturatherapy/global.order') !!}</span></button>
                </div>
            </div>
        </div>
    </div>