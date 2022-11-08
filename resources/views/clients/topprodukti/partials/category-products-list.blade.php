
<div class="row products-category product-grid">
    @foreach($productsChunk as $product)
        <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="product-thumb">
                <div class="image">
                    <a href="{{route('product', [$product->id, $product->url])}}">
                        <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}" title="{{$product->title}}" class="img-responsive" />
                    </a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h4>
                        <p class="description">{{$product->short_description}}</p>
                        <p class="price">  @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="price-old">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                <span class="price-new">{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            @else
                                <span class="price">{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            @endif
                        </p>
                    </div>
                    <div class="button-group">
                        <button class="btn-primary" value="{{$product->id}}" type="button" data-add-to-cart  onClick=""><span>{{trans('topprodukti.buy')}}</span></button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="col-sm-12 text-right" style="margin: 10px 0;">
        @if ($count > 0)
            <ul class="pagination">
                @if($productFilters->page > 1)
                    <li><a href="javascript:;" data-page="1">&laquo;</a></li>
                @endif
                @foreach(range(1, $totalPages) as $page)
                    @if($productFilters->page == $page)
                        <li class="active"><span>{{$page}}</span></li>
                    @else
                        <li><a href="javascript:;" data-page="{{$page}}">{{$page}}</a></li>
                    @endif
                @endforeach
                @if($productFilters->page < $totalPages)
                    <li><a href="javascript:;"  data-page="{{$totalPages}}">&raquo;</a></li>
                @endif
            </ul>
        @endif
    </div>
</div>
{{--</div>--}}

