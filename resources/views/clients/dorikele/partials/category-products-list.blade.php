<!-- Product Grid -->
@if(count($productsChunk) == 0)
    <section class="theme_box"><br>
        <div class="alert alert-warning">
            Нема артикли во оваа категорија
        </div>
    </section>
@endif
<div id="product-grid"
     class="grid-container products fade-in-progressively no-padding-top"
     data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-resize
     data-animate-resize-duration="700">
    <div class="row">
        <div class="column width-12">
            <div class="row grid content-grid-3">
                @foreach ($products as $item)
                <div style="min-height: 550px;" class="grid-item product portrait grid-sizer">
                    <div class="thumbnail product-thumbnail img-scale-in"
                         data-hover-easing="easeInOut" data-hover-speed="700"
                         data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.01">
                        <a href="{{route('product', [$item->id, $item->url])}}" class="overlay-link">
                            <img style="min-height: 350px;" src="{{\ImagesHelper::getProductImage($item)}}"
                                 class="attachment-shop_catalog" alt="Images">
                        </a>
                        <div class="product-actions center">
                            <a href="{{route('product', [$item->id, $item->url])}}"
                               data-toggle="modal" data-target=""
                               class="hoverCrno button pill add-to-cart-button">
                                                                            <span>
                                                                            Прегледај
                                                                            </span>
                            </a>
                        </div>
                    </div>
                    <div class="product-details center">
                        <button value="{{$item->id}}" data-add-to-cart="" id="add_to_cart" class="hoverCrno button pill add-to-cart-button">Додади во Кошничка</button>
                        <br>
                        <br>
                        <h3 class="product-title">
                            <a href="{{route('product', [$item->id, $item->url])}}"
                               style="color:black !important; height: 80px;"
                               class="limit_text"><span class="font-alt-2"> {{$item -> title}}</span> </a>
                        </h3>
                        @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                            <span class="product-price-new-home"
                                  style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($item, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                            <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                        @else


                            <span class="product-price-new-home"
                                  style="font-weight: bold;"> <span
                                        id="current_price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                        @endif
                        <div class="product-actions-mobile">

                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Product Grid End -->
<!-- Pagination Section 3 -->
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
<!-- Pagination Section 3 End -->
<!-- Sidebar -->
<!-- Sidebar End -->
