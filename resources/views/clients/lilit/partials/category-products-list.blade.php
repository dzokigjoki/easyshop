<div class="shop-loop grid">
                    @if(count($productsChunk) == 0)
                        <section class="theme_box"><br>
                            <div class="alert alert-warning">
                                Нема артикли во оваа категорија
                            </div>
                        </section>
                    @endif
                    <ul class="products">
                        @foreach($products as $item)
                            <li class="product">
                                <div class="product-container">
                                    <figure>
                                        <div class="product-wrap">
                                            <div class="product-images">
                                                <div class="shop-loop-thumbnail">
                                                    <a class="overlay-link" href="{{route('product', [$item->id, $item->url])}}">
                                                        <img
                                                             src="{{\ImagesHelper::getProductImage($item, NULL, 'lg_')}}" class="img-responsive"
                                                             alt="{{$item->title}}">
                                                    </a>
                                                </div>
                                                <div class="middleCustom hidden-xs hidden-sm hidden-md yith-wcwl-add-to-wishlist">
                                                    {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                    {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                    {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                                    {{--ден.<br></span>--}}
                                                    {{--</div>--}}
                                                    {{--@endif--}}
                                                    <div class="btn btn-danger"> <a style="color:white;" class="hoverA" href="{{route('product', [$item ->id, $item->url])}}"><span>Прегледај</span>
                                                            <br></a>
                                                    </div>
                                                </div>

                                                <div class="clear"></div>
                                                {{--<div class="shop-loop-quickview">--}}
                                                {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                                {{--ден.<br></span>--}}
                                                {{--</div>--}}
                                                {{--@endif--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                        <figcaption>
                                            <div class="shop-loop-product-info">
                                                <div class="">
                                                    <div style="font-size:20px;" class="info-price">
                                                                            <span class="price">
                                                                                 @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                                                                                    <span class="product-price-new-home"
                                                                                          style="font-weight: bold;">
                                                                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($item, true, 0)}}
                                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                    </span>
                                                                                </span>
                                                                                    <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                    </span>
                                                                                </span>
                                                                                @else
                                                                                    <span class="product-price-new-home" style="font-weight: bold;">
                                                                                        <span id="current_price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                        </span>
                                                                                </span>
                                                                                @endif
                                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="info-title">
                                                    <button value="{{$item->id}}"
                                                            data-add-to-cart="" id="add_to_cart"
                                                            class="btn btn-primary">Додади во кошничка</button>
                                                    <h3 style="margin-top:10px;" class="product_title"><a href="{{route('product', [$item ->id, $item->url])}}">{{$item->title}}</a></h3>
                                                </div>

                                                {{--<div class="info-excerpt">--}}
                                                {{--Proin malesuada enim nulla, nec bibendum justo vestibulum non. Duis et ipsum convallis, bibendum enim a, hendrerit diam. Praesent tellus mi, vehicula et risus eget, laoreet tristique tortor. Fusce id…--}}
                                                {{--</div>--}}
                                                {{--<div class="list-info-meta clearfix">--}}
                                                {{--<div class="info-price">--}}
                                                {{--<span class="price">--}}
                                                {{--<span class="amount">$17.45</span>--}}
                                                {{--</span>--}}
                                                {{--</div>--}}
                                                {{--<div class="list-action clearfix">--}}
                                                {{--<div class="loop-add-to-cart">--}}
                                                {{--<button class="btn btn-primary" href="#">Додади во кошничка</button>--}}
                                                {{--</div>--}}
                                                {{--<div class="yith-wcwl-add-to-wishlist">--}}
                                                {{--<div class="yith-wcwl-add-button">--}}
                                                {{--<a href="#" class="add_to_wishlist">--}}
                                                {{--Add to Wishlist--}}
                                                {{--</a>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

<nav class="shop-pagination">


            {{--<span class='page-numbers current'>1</span>--}}
            {{--<a class='page-numbers' href='#'>2</a>--}}
            {{--<a class="next page-numbers" href="#"><i class="fa fa-angle-right"></i></a>--}}


    @if($count > 0)
        <div class="paginate">
            <div class="paginate_links">
            <span class="prev page-numbers" @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto"@endif><a
                        href="javascript://" data-page="{{$productFilters->page - 1}}"><i
                            class="fa fa-arrow-left"></i></a></span>
            {{--<li @if($productFilters->page == 1)style="visibility: hidden"@endif class="active"><a href="#" data-page="{{$productFilters->page - 1}}"></a></li>--}}
            @foreach(range(1, $totalPages) as $page)
                @if($productFilters->page == $page)
                    <span class="page-numbers current"><a href="javascript://">{{$page}}</a></span>
                @else
                    <span><a class="page-numbers" href="javascript://" data-page="{{$page}}">{{$page}}</a></span>
                @endif
            @endforeach
            <span class="next page-numbers" @if($productFilters->page == $totalPages)style="visibility: hidden"@endif><a href="javascript://"
                            data-page="{{$productFilters->page + 1}}"><i
                            class="fa fa-arrow-right"></i> </a></span>

        <!-- End .view-count-box -->
            </div>
        </div>
    @endif

</nav>