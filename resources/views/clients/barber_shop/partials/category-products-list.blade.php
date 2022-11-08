
        <div class="row">
            @foreach($productsChunk as $product)
                <div class="col-xs-12 col-sm-6 col-md-4 product-item">
                    <div class="product--img">
                        <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" />
                        <div class="product--hover">
                            <div class="product--action">
                                    <a  href="" value="{{$product->id}}" data-add-to-cart=""  title="Додади во кошничка">Додади во кошничка</a>
                            </div>
                        </div>
                    </div>
                    <div class="product--content">
                        <div class="product--title">
                            <h3><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                        </div>
                        <div class="product--price">
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="new-price">{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                            @else
                                <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
