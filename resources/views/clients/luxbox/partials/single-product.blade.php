<div class="row padding_row">
    <div class="product type-product">
        <div class="woocommerce-LoopProduct-link">
            <div class="product-image">
                <a href="{{route('product',[$product->id,$product->url])}}" class="wp-post-image">

                    <img class="product_photo" src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="product">
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                    <?php
            $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
            ?>
                <div class="price-badge">-{{number_format($discountPercentage,0,'.','')}}%</div>
                @endif
                    @if((Route::current()->getName())=="category" || (Route::current()->getName()) == "categoryFilters")
                    @if(\ImagesHelper::getFirstGalleryImage($product, NULL, 'md_'))
                    <img class="product_photo_gallery" src="{{\ImagesHelper::getFirstGalleryImage($product, NULL, 'md_')}}" alt="product">
                    @else
                    <img class="product_photo_gallery" src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="product">
                    @endif
                    @endif
                </a>
                
            </div>
        </div>
    </div>
</div>
@if(!((Route::current()->getName())=='home'))
<div class="row row_display photo_description">
    <div class="col-10 padding_left_0">
        <div class="col-12 min_height_31 padding_left_0 padding_right_0">
            <div class="col-lg-12 padding_right_0">
                <h5 class="woocommerce-loop-product__title"><a class="width_100" href="{{route('product',[$product->id,$product->url])}}"><strong>{{$product->title}}</strong></a></h5>
            </div>
            
        </div>
        <div class="col-12 padding_left_0 padding_right_0">
            <div class="col-lg-12 padding_right_0">
                <span class="price">
                    <span class="woocommerce-Price-amount amount">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <strong>{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                            МКД</strong>
                        <del><strong>{{number_format($product->$myPriceGroup, 0, ',', '.')}} МКД</strong></del>
                        @else
                        <strong>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                            МКД</strong>
                        @endif
                    </span>
                </span>
            </div>

        </div>
    </div>
    <div class="col-2 padding_left_0">
    <div class="button add_to_cart_button">
            <a data-add-to-cart value="{{$product->id}}">
                <img src="{{url_assets('/luxbox/images/icons/bag.png')}}" class="cart-icon" alt="cart">
            </a>
        </div>
    </div>

</div>
@else
<div class="row row_display photo_description hide_description">
    <div class="col-10 padding_left_0">
        <div class="col-12 min_height_31 padding_left_0 padding_right_0">
            <div class="col-lg-12 padding_right_0">
                <h5 class="woocommerce-loop-product__title"><a class="width_100 white" href="{{route('product',[$product->id,$product->url])}}"><strong>{{$product->title}}</strong></a></h5>

            </div>
        </div>
        <div class="col-12 padding_left_0 padding_right_0">
            <div class="col-lg-12 padding_right_0">
                <span class="price">
                    <span class="woocommerce-Price-amount amount white">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <strong>{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                            МКД</strong>
                        <del><strong>{{number_format($product->$myPriceGroup, 0, ',', '.')}} МКД</strong></del>
                        @else
                        <strong>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                            МКД</strong>
                        @endif
                    </span>
                </span>
            </div>

        </div>
    </div>
    <!-- <div class="col-2 padding_left_0">
        <div class="button add_to_cart_button">
            <a data-add-to-cart value="{{$product->id}}">
                <img src="{{url_assets('/luxbox/images/icons/bag.png')}}" class="cart-icon" alt="cart">
            </a>
        </div>
    </div> -->

</div>
@endif