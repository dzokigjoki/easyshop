@if(count($productsChunk) == 0)
    <section class="theme_box"><br>
        <div class="alert alert-warning">
            {{trans('watchstore.emptyCategory')}}
        </div>
    </section>
@endif
<div id="product-grid"
     class="grid-container products fade-in-progressively no-padding-top pb-80"
     data-layout-mode="masonry" data-grid-ratio="1.5"
     data-animate-resize data-animate-resize-duration="700">
    <div class="row">
        <div class="column width-12">
            <div style="visibility: visible !important;" class="row grid content-grid-3">
                @foreach ($products as $item)
                        <div class="heightLaptop grid-item product portrait grid-sizer">
                            <div class="thumbnail product-thumbnail img-scale-in" data-hover-easing="easeInOut"
                                 data-hover-speed="700" data-hover-bkg-color="#000000"
                                 data-hover-bkg-opacity="0.01">
                                <a class="overlay-link" href="{{route('product', [$item->id, $item->url])}}">
                                    <img
                                            src="{{\ImagesHelper::getProductImage($item, NULL, 'lg_')}}" class=""
                                            alt="{{$item->title}}">
                                </a>
                                </a>
                                <div class="product-actions center">
                                    <a href="{{route('product', [$item->id, $item->url])}}"
                                       class="hoverCrno button pill add-to-cart-button">{{trans('watchstore.view')}}</a>
                                </div>
                            </div>
                            <div class="product-details center">
                                <button value="{{$item->id}}" data-add-to-cart="" id="add_to_cart"
                                        class="hoverCrno button pill add-to-cart-button">{{trans('watchstore.addToCart')}}
                                </button>
                                <br>
                                <br>
                                <h3 class="product-title">
                                    <a href="{{route('product', [$item->id, $item->url])}}">{{$item->title}}</a>
                                </h3>
                                <div class="product-price" style="text-align: center">
                                    @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                                        <span class="product-price price"
                                              style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($item, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                        <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                    @else


                                        <span class="product-price price"
                                              style="font-weight: bold;"> <span
                                                    id="current_price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="section-block pagination-3 column width-9 no-padding-top">
    <div class="row">
        @if($count > 0)
            <ul class="pagination">
                <li @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto"@endif><a href="javascript://" data-page="{{$productFilters->page - 1}}"><i
                                class="fa fa-arrow-left"></i></a></li>
                {{--<li @if($productFilters->page == 1)style="visibility: hidden"@endif class="active"><a href="#" data-page="{{$productFilters->page - 1}}"></a></li>--}}
                @foreach(range(1, $totalPages) as $page)
                    @if($productFilters->page == $page)
                        <li class="active"><a href="javascript://">{{$page}}</a></li>
                    @else
                        <li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>
                    @endif
                @endforeach
                <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif><a href="javascript://"
                                                                                                 data-page="{{$productFilters->page + 1}}"><i
                                class="fa fa-arrow-right"></i> </a></li>

            </ul>
            <!-- End .view-count-box -->
        @endif
    </div>
</div>