<div class="product-item hover-trigger">
    <div class="product-img">
        <a href="/p/{{$product->id}}/{{$product->url}}">
            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="" />
        </a>
        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <div class="product-label">
            <span class="sale">Попуст</span>
        </div>
        @endif
        <div class="hover-overlay">
            <div class="product-actions">
                <a data-add-to-wish-list="" value="{{$product->id}}" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                </a>
            </div>
            <div class="product-details valign_50">
                <h3 class="product-title">
                    <a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a>
                </h3>
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
                    <a value="{{$product->id}}" data-add-to-cart="" class="btn btn-md btn-color">
                        <span>Купи</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>