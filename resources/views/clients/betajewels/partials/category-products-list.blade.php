@if(count($productsChunk) == 0)
    <section class="theme_box"><br>
        <div class="alert alert-warning">
            {{trans('betajewels.emptyCategory')}}
        </div>
    </section>
@endif
@foreach ($products as $product)
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="product-single">
            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <div class="custom-discount">
                    {{(int)((((int)EasyShop\Models\Product::getPriceRetail1($product, false, 0) - $product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%
                </div>
            @endif
            <a href="{{route('product', [$product->id, $product->url])}}">
                <img
                        src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""
                        alt="{{$product->title}}">
            </a>
            {{--<div class="tag new">--}}
            {{--<span>new</span>--}}
            {{--</div>--}}
            <div class="text-center hot-wid-rating pl-0">
                <h4 class="title-height">
                    <a href="{{route('product', [$product->id, $product->url])}}">
                        {{$product->title}}
                    </a>
                </h4>
                <div class="text-center product-wid-price">
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <span class="product-price price color-black">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                        <span class="outer-discount">
                                            <span class="price inner-discount">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                    @else

                        <span class="product-price price color-black"> <span
                                    id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
    <div class="col-md-12">
        <div class="row pull-right">
            @if($count > 0)
                <ul class="pagination">
                    <li @if($productFilters->page == 1) class="visibility-hidden" @endif><a href="javascript://" data-page="{{$productFilters->page - 1}}"><i
                                    class="fa fa-arrow-left"></i></a></li>
                    @foreach(range(1, $totalPages) as $page)
                        @if($productFilters->page == $page)
                            <li class="active"><a href="javascript://">{{$page}}</a></li>
                        @else
                            <li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>
                        @endif
                    @endforeach
                    <li @if($productFilters->page == $totalPages) class="visibility-hidden" @endif><a href="javascript://"
                                 data-page="{{$productFilters->page + 1}}"><i
                                 class="fa fa-arrow-right"></i> </a></li>
                </ul>
                <!-- End .view-count-box -->
            @endif
        </div>
    </div>
</div>
