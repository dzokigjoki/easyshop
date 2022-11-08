
<div style="position: relative; padding: 25px 0;" class="product-item hover-trigger">
    <style>
    .p-0-25 {
        padding: 0 25px;
    }
</style>
<?php 
    // if(!isset($product->price)) {
    //     $product->price = $product->price_retail_1;
    // }
?>
    <div class="product-img">
        <a href="{{ $urlLang }}p/{{ $product->id }}/{{ $product->url }}">
            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt="" />
        </a>
        @if(\EasyShop\Models\Product::hasDiscount($product->discount))
        <div class="product-label">
            <span class="sale">{!! trans('naturatherapy/global.action') !!}</span>
        </div>
        @endif
            <div class="product-actions">
                <a data-add-to-wish-list="" value="{{$product->id}}" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                </a>
            </div>
            <div style="max-width: 100%; width: 100%; height: 140px;" class="text-center product-details">
                <h3 style="font-size: 14px; height: auto; min-height: 50px;" class="product-title">
                    <a href="{{ $urlLang }}p/{{ $product->id }}/{{ $product->url }}">{{$product->title}}</a>
                </h3>
                <span style="float: none; display: flex; justify-content: center;" class="price">
                    @if(\EasyShop\Models\Product::hasDiscount($product->discount))
                    <?php
                    $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 2);
                    ?>
                    <del>
                        <span>{{number_format($product->price, 2, ',', '.')}} LEK</span>
                    </del>
                    <ins>
                        <span class="amount">{{$discount}} LEK</span>
                    </ins>
                    @else
                    <ins>
                        <span class="amount">{{number_format($product->price, 2, ',', '.')}} LEK</span>
                    </ins>
                    @endif
                </span>
                <div class="btn-quickview">
                    <a value="{{$product->id}}" data-add-to-cart="" class="btn btn-md btn-color">
                        <span>{!! trans('naturatherapy/global.buy') !!}</span>
                    </a>
                </div>
            </div>
    </div>
</div>