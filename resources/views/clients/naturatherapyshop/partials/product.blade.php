
<div style="position: relative; padding: 25px 0;" class="product-item hover-trigger">
    <style>
    .p-0-25 {
        padding: 0 25px;
    }
</style>
<?php 
    if(!isset($product->price)) {
        $product->price = $product->price_retail_1;
    }
?>
    <div class="product-img">
        <a href="/p/{{$product->id}}/{{$product->url}}">
            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt="" />
        </a>
        @if(\EasyShop\Models\Product::hasDiscount($product->discount))
        <div class="product-label">
            <span class="sale">Акција</span>
        </div>
        @endif
            <div class="product-actions">
                <a data-add-to-wish-list="" value="{{$product->id}}" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                </a>
            </div>
            <div style="max-width: 100%; width: 100%; height: 140px;" class="text-center product-details">
                <h3 style="font-size: 14px; height: auto; min-height: 50px;" class="product-title">
                    <a href="
                        @if(auth()->check())/p/{{$product->id}}/{{$product->url}}
                        @else/login
                        @endif">{{$product->title}}</a>
                </h3>
                <span style="float: none; display: flex; justify-content: center;" class="price">
                    @if(\EasyShop\Models\Product::hasDiscount($product->discount))
                    <?php
                    $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                    $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                    ?>
                    <del>
                        <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
                    </del>
                    <ins>
                        <span class="amount">{{$discount}} МКД</span>
                    </ins>
                    @else
                    <ins>
                        <span class="amount">
                            @if(EasyShop\Services\LoyaltyService::isProductInLoyaltyCategory($product))
                            {{number_format($product->points, 0, ',', '.')}} Поени 
                            @else
                            {{number_format($product->price, 0, ',', '.')}} МКД
                            @endif</span>
                    </ins>
                    @endif
                </span>
                <div class="btn-quickview">
                    @if(!auth()->check() && EasyShop\Services\LoyaltyService::isProductInLoyaltyCategory($product))
                    <a href="/login" class="btn btn-md btn-color">
                        <span>Најави се</span>
                    </a>
                    @else
                    <a value="{{$product->id}}" data-add-to-cart="" class="btn btn-md btn-color">
                        <span>Купи</span>
                    </a>
                    @endif
                </div>
            </div>
    </div>
</div>