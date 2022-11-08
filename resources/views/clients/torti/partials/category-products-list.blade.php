<ul class="products">
    @foreach($products as $product)
    <li class="product">
        <a href="/p/{{$product->id}}/{{$product->url}}">
            <div class="product-img-box">
                <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{ $product->title }}" />
            </div>
            <div class="detail-box">
                <h3>{{ $product->title }}</h3>
                @if(!$product->is_exclusive)
                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <?php
                        $discount = EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                    ?>
                <span class="price">
                    <span class="ammount">
                        {{$discount}}
                        МКД
                    </span>
                    <del class="price">
                        {{number_format($product->price, 0, ',', '.')}} МКД
                    </del>
                </span>
                @else
                <span class="price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                @endif
                @endif
            </div>
        </a>
        <span class="hidden-xs order">
            @if(!!$product->is_exclusive)
            <a class="mt-20 button product_type_simple add_to_cart_button" href="/p/{{$product->id}}/{{$product->url}}">
                Декорирај
            </a>
            @else
            <a class="mt-20 button product_type_simple add_to_cart_button" href="/p/{{$product->id}}/{{$product->url}}">
                Нарачај
            </a>
            @endif
        </span>
        @if(!!$product->is_exclusive)
        <a class="mt-20 hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
            href="/p/{{$product->id}}/{{$product->url}}">
            Декорирај
        </a>
        @else
        <a class="mt-20 hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
            href="/p/{{$product->id}}/{{$product->url}}">
            Нарачај
        </a>
        @endif
    </li>
    @endforeach
</ul>

@if($count > 0)
<nav class="ow-pagination text-center">
    <ul class="pagination">
        <li @if($productFilters->page == 1)style="visibility: hidden;"@endif><a href="javascript://"
                data-page="{{$productFilters->page - 1}}"><i class="fa fa-angle-left"></i></a></li>
        @foreach(range(1, $totalPages) as $page)
        @if($productFilters->page == $page)
        <li class="active"><a href="javascript://">{{$page}}</a></li>
        @elseif($page == 1)
        <li><a href="javascript://" data-page="1">1...</a></li>
        @elseif($productFilters->page >= ($page-3) && $productFilters->page <= ($page+3)) <li><a href="javascript://"
                data-page="{{$page}}">{{$page}}</a></li>
            @elseif($page == $totalPages)
            <li><a href="javascript://" data-page="{{$totalPages}}">...{{$totalPages}}</a></li>
            @endif
            @endforeach
            <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif>
                <a href="javascript://" data-page="{{$productFilters->page + 1}}">
                    <i class="ion-chevron-right"></i>
                </a>
            </li>
    </ul>
</nav>
@endif