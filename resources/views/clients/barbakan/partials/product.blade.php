<div class="col-lg-4 col-6">
    <!-- Menu Item -->
    <div class="menu-item menu-grid-item">




        <a href="/p/{{ $product->id }}/{{ $product->url }}">
            @if($product->image)
            <img class="mb-4" src="{{\ImagesHelper::getProductImage($product, null, 'lg_')}}" alt="">
            @else
            <img class="mb-4" src="https://via.placeholder.com/1000x1000" alt="">
            @endif
        </a>


        <a href="/p/{{ $product->id }}/{{ $product->url }}">
            <?php $productTitle = explode('-', $product->title); ?>
            <h6 class="mb-0">{{ $productTitle[0] }}</h6>
        </a>

        <span class="text-muted text-sm">{{ $product->short_description }}</span>
        <div class="row align-items-center mt-4">
            <div class="col-sm-6">
                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <span class="text-muted">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}} МКД</span>
                @endif
                <span class="text-md mr-4"><span data-product-base-price>{{number_format($product->$myPriceGroup, 0, ',', '.')}} МКД</span></span>
            </div>
            <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                <a href="/p/{{ $product->id }}/{{ $product->url }}" class="btn btn-outline-secondary btn-sm" data-product="{{ json_encode($product) }}"><span>Додади</span></a>
            </div>
        </div>
    </div>
</div>