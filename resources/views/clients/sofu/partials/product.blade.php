<?php
$discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
$discountPercentage = (($product->price - $discount) / $product->price) * 100;
?>

<div @if((Route::currentRouteName()=='category' )||(Route::currentRouteName()=='categoryFilters' )) class="col-md-4 col-sm-4 col-xs-6 product" @else class="col-md-3 col-sm-3 col-xs-12 product padding_product" @endif>
    <div class="product-innercotent" data-link="/p/{{$product->id}}/{{$product->url}}">
        <a style="width: 100%; height: 100%;" class="image_overlay_a" href="/p/{{$product->id}}/{{$product->url}}">
            <div class="image_overlay"></div>
        </a>
        <a href="/p/{{$product->id}}/{{$product->url}}">
            <img class="hover_image" src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="">

        </a>
        <div class="info-product">
            <a class="ts-viewdetail" href="#"><span class="icon icon-arrows-slim-right"></span></a>
        </div>
        <div class="ts-product-button">
            <div class="yith-wcwl-add-to-wishlist">

                <div class="yith-wcwl-add-button button_product show" style="display:block">
                    <a data-add-to-wish-list="" value="{{$product->id}}" class="add_to_wishlist">Add to Wishlist</a>
                </div>

            </div>

            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
            <a class="button yith-wcqv-button" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{$discount}} МКД" data-oldprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"></a>
            @else
            <a class="button yith-wcqv-button" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"></a>
            @endif
        </div>
    </div>
    <div class="text-center">
        <?php $productTitle = explode('-', $product->title); ?>
        <p class="product_title pt_10 product_page_name"><a href="/p/{{$product->id}}/{{$product->url}}">{{ $productTitle[0] }}</a></p>
    </div>
    <div class=" text-center">
        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <?php
        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
        $discountPercentage = (($product->price - $discount) / $product->price) * 100;
        ?>
        <span class="onsale onsale_mobile">{{ number_format($discountPercentage, 0) }}%</span>
        @endif
        @if((Route::currentRouteName()=='category' )||(Route::currentRouteName()=='categoryFilters' ))
        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <?php
        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
        $discountPercentage = (($product->price - $discount) / $product->price) * 100;
        ?>
        <span class="price-product nopadding">
            <span class="discounted-price">
                {{number_format($discount, 0, ',', '.')}}МКД
            </span>
            <del class="old-price">
                {{number_format($product->price, 0, ',', '.')}} МКД
            </del>
        </span>
        @else
        <span class="price-product nopadding">{{number_format($product->price, 0, ',', '.')}} МКД</span>
        @endif
        @endif
    </div>

</div>