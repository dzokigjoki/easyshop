<div class="product-item product-float-unset hover-trigger">
    <div class="product-img">
        <a href="/p/{{$product->id}}/{{$product->url}}">
            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="" />
        </a>
        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <div class="product-label">
            <span class="sale">Попуст</span>
        </div>
        @endif
        
    </div>
    <div class="product_description_mobilna">
        <h6 class="product-title">
            <a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a>
        </h6>
        <span class="price">
            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
            <?php
            $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
            ?>
            <del>
                <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
            </del>
            <ins>
                <span class="amount">{{$discount}}МКД</span>
            </ins>
            @else
            <ins>
                <span class="amount">{{number_format($product->price, 0, ',', '.')}} МКД</span>
            </ins>
            @endif
        </span>
        <div class="btn-quickview">
            <a href="/p/{{$product->id}}/{{$product->url}}" class="btn btn-md btn-black ">
                <span>Повеќе</span>
            </a>
        </div>
    </div>
</div>
