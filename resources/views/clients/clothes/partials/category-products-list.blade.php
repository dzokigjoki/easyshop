<div class="box-product row">
    @foreach($productsChunk as $product)
        <div class="col-md-4 col-sm-6">
            <div class="product-item">
                <div class="product-thumb">
                    <div class="main-img">
                        <a href="single-product.html">
                            <img class="img-responsive" src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" />
                        </a>
                    </div>
                    {{-- <div class="overlay-img">
                        <a href="single-product.html">
                            <img class="img-responsive" src="assets/images/product-img-1-thumb.jpg" alt="img" />
                        </a>
                    </div> --}}
                </div>
                <h4 class="product-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h4>
                <p class="product-price">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <span class="new-price">{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                        <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                    @else
                        <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                    @endif
                </p>
                <div class="group-buttons">
                    <button type="button" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                    <span>Add to Cart</span>
                    </button>
                    
                    
                </div>
            </div>
        </div>
    @endforeach
</div>