<div class="product-item clearfix" style="opacity: 1;">
    <div class="product-img hover-trigger">
        <a href="/p/{{ $product->id }}/{{ $product->url }}">
            <img src="{{ \ImagesHelper::getProductImage($product, null, 'md_') }}" alt="">
        </a>
        @if (\EasyShop\Models\Product::hasDiscount($product->discount))
            <div class="product-label">
                <span class="sale">Попуст</span>
            </div>
        @endif
        
        <div class="hover-2">
            <div class="product-actions">
                <a data-add-to-wish-list="" value="{{ $product->id }}" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                </a>
            </div>
        </div>
        <a href="/p/{{ $product->id }}/{{ $product->url }}" class="product-quickview">Отвори</a>
    </div>
    <div class="product-details">
        <h3 class="product-title">
            <a href="shop-single.html"><a
                    href="/p/{{ $product->id }}/{{ $product->url }}">{{ $product->title }}</a></a>
        </h3>
    </div>



    <span class="price">
        @if (\EasyShop\Models\Product::hasDiscount($product->discount))
            <?php
            $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
            ?>

            <del>
                <span>{{ number_format($product->price, 0, ',', '.') }} МКД</span>
            </del>
            <ins>
                <span class="amount">{{ $discount }}МКД</span>
            </ins>
        @else
            <del style="color: #000;text-decoration: unset;font-weight: 600;font-size: 13px;">
                <span>{{ number_format($product->price, 0, ',', '.') }} МКД</span>
            </del>
            <ins style="color: white;">
                <span class="amount">{{ number_format($product->price, 0, ',', '.') }} МКД</span>
            </ins>
        @endif


    </span>


    <div class="product-description">
        <h3 class="product-title">
            <a href="/p/{{ $product->id }}/{{ $product->url }}">{{ $product->title }}</a>
        </h3>
        <span class="price">
            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                <?php
                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                ?>
                <del>
                    <span>{{ number_format($product->price, 0, ',', '.') }} МКД</span>
                </del>
                <ins>
                    <span style="margin-left: 10px;" class="amount">{{ $discount }}МКД</span>
                </ins>
            @else
                <ins>
                    <span class="amount">{{ number_format($product->price, 0, ',', '.') }} МКД</span>
                </ins>
            @endif
        </span>
        <div class="clear"></div>
        <p>{{ $product->short_description }}</p>
        <a data-add-to-cart="" value="{{ $product->id }}" class="btn btn-dark btn-md left"><span>Додади во
                кошничка</span></a>
        <div class="product-add-to-wishlist">
            <a data-add-to-wish-list="" value="{{ $product->id }}"><i class="fa fa-heart"></i></a>
        </div>
    </div>

</div>
