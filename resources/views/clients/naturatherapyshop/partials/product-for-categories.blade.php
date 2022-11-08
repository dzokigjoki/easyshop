<div class="product-item clearfix" style="opacity: 1;">
    <div class="product-img hover-trigger">
        <a href="/p/{{$product->id}}/{{$product->url}}">
            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="">
        </a>
        <div class="hover-2">
            <div class="product-actions">
                <a data-add-to-wish-list="" value="{{$product->id}}" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                </a>
            </div>
        </div>
        <a href="/p/{{$product->id}}/{{$product->url}}" class="product-quickview">Види повеќе</a>
    </div>

    <div class="product-details">
        <h3 class="product-title">
            <a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a>
        </h3>
    </div>

    <span class="price d-flex">
        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <?php
        $discount = \EasyShop\Models\Product::getPriceRetail1($product, true, 0);
        $discountPercentage = (($product->price - \EasyShop\Models\Product::getPriceRetail1($product, true, 0)) / $product->price) * 100;
        ?>
        <del>
            <span>${{number_format($product->price, 0, ',', '.')}}</span>
        </del>
        <ins>
            <span style="margin-left: 10px;" class="amount">${{$discount}}</span>
        </ins>
        @else
        <ins>
            <span class="amount">${{number_format($product->price, 0, ',', '.')}}</span>
        </ins>
        @endif
    </span>

    <div class="product-description">
        <h3 class="product-title">
            <a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a>
        </h3>
        <span class="price d-flex">
            @if(\EasyShop\Models\Product::hasDiscount($product->discount))
            <?php
            $discount = \EasyShop\Models\Product::getPriceRetail1($product, true, 0);
            $discountPercentage = (($product->price - \EasyShop\Models\Product::getPriceRetail1($product, true, 0)) / $product->price) * 100;
            ?>
            <del>
                <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
            </del>
            <ins>
                <span style="margin-left: 10px;" class="amount">{{$discount}} МКД</span>
            </ins>
            @else
            <ins>
                <span class="amount">{{number_format($product->price, 0, ',', '.')}} МКД</span>
            </ins>
            @endif
        </span>
        <div class="clear"></div>
        <p>{{ $product->short_description }}</p>
        <a data-add-to-cart="" value="{{$product->id}}" class="btn btn-dark btn-md left"><span>Види кошничка</span></a>
        <div class="product-add-to-wishlist">
            <a data-add-to-wish-list="" value="{{$product->id}}"><i class="fa fa-heart"></i></a>
        </div>
    </div>

</div>