<div class="shop-product-wrap grid gridview-3 row">
    @foreach($productsChunk as $product)
        <div class="col-lg-4">
            <div class="slide-item">
                <div class="single_product">
                    <div class="product-img">
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img class="primary-img" src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}">
                        </a>
                        <div class="add-actions">
                            <ul>
                                <li><a class="hiraola-add_cart" href="" value="{{$product->id}}" data-add-to-cart="" data-placement="top" title="Додади во кошничка"><i
                                    class="ion-bag"></i></a>
                            </li>
                                <li class="quick-view-btn" ><a href="{{route('product',[$product->id,$product->url])}}"  title="Прегледај"><i class="ion-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="hiraola-product_content">
                        <div class="product-desc_info">
                            <h6><a class="product-name" href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h6>
                            <div class="price-box">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <span class="new-price">{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                    <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                @else
                                    <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-slide_item">
                <div class="single_product">
                    <div class="product-img" style="text-align: center; width: 300px; margin: 0 auto;">
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img class="primary-img" src="{{\ImagesHelper::getProductImage($product)}}" alt="Hiraola's Product Image">
                        </a>
                    </div>
                    <div class="hiraola-product_content">
                        <div class="product-desc_info">
                            <h6><a class="product-name" href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h6>
                            
                            <div class="price-box">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <span class="new-price">{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                    <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                @else
                                    <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                @endif
                            </div>
                            <div class="product-short_desc">
                                <p> {!! $product->short_description !!}</p>
                            </div>
                        </div>
                        <div class="add-actions">
                            <ul>
                                <li><a class="hiraola-add_cart" href="" value="{{$product->id}}" data-add-to-cart="" data-placement="top" title="Додади во кошничка"><i
                                    class="ion-bag"></i></a>
                            </li>
                                <li class="quick-view-btn" ><a href="{{route('product',[$product->id,$product->url])}}"  title="Прегледај"><i class="ion-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

