{{-- <style>
    del {
        color: red !important;
    }
</style> --}}
@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
<?php 
    $hasDiscount = true;
    $price = number_format($product->$myPriceGroup, 0, ',', '.');
    $discountPrice = EasyShop\Models\Product::getPriceRetail1($product, true, 0); 
    $discountPercentage = '-' . round((($product->$myPriceGroup - $discountPrice) / $product->$myPriceGroup) * 100) . '%';
?>
@else
<?php
    $price = number_format($product->$myPriceGroup, 0, ',', '.');
    $hasDiscount = false;
?>
@endif


<li class="product">
    <div class="product-container">
        <figure>
            <div class="product-wrap">
                <div class="product-images">
                    <div class="shop-loop-thumbnail">
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img width="300" height="350"
                                src="{{\ImagesHelper::getProductImage($product, null, 'lg_')}}"
                                alt="{{$product->title}}" />
                        </a>
                    </div>
                    <div class="clear"></div>
                    {{-- <div class="shop-loop-quickview">
                        <a><i class="fa fa-shopping-cart"></i></a>
                    </div> --}}
                </div>
            </div>
            <figcaption>
                <div class="shop-loop-product-info">
                    <div class="info-title">
                        <h3 class="product_title"><a class="font-12"
                                href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                    </div>
                    <div class="info-meta">
                        <div class="info-price">
                            <span class="price">
                                @if($hasDiscount)
                                <ins>
                                    <span class="amount">{{$discountPrice}} ден.</span>
                                </ins>
                                <del>
                                    <span class="amount">{{$price}} ден.</span>
                                </del>
                                @else
                                <span class="amount">{{$price}} ден.</span>
                                @endif
                            </span>
                        </div>
                        <div class="loop-add-to-cart">
                            <a href="{{route('product', [$product->id, $product->url])}}" value="{{$product->id}}" class="btn"
                                style="text-decoration:none; background-color:#000000; color: #ffffff">Купи</a>
                        </div>
                    </div>
                </div>
            </figcaption>
        </figure>
    </div>
</li>