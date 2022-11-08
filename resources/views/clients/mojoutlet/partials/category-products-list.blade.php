<div class="product-listing row">
    @if(count($products) == 0)
        <section class="theme_box"><br>
            <div class="alert alert-warning">
                Нема артикли во оваа категорија
            </div>
        </section>
        {{--@endif--}}
    @else
        @foreach($products as $product)
            <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 col-xl-one-fifth">
                <!-- product -->
                <div style="margin-bottom:20px;" class="product">
                    <div class="product__inside">
                        <!-- product image -->
                        <div class="product__inside__image">
                            <!-- product image carousel -->
                            <div class="product__inside__carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <a>
                                            {{--<img src="/assets/mojoutlet/images/product/product-10.jpg" alt="">--}}
                                            <img
                                                    @if($isMobile)
                                                    onclick="location.href='{{route('product',[$product->id,$product->url])}}'"
                                                    @endif
                                                    src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="item"><a href="{{route('product',[$product->id,$product->url])}}"><img src="images/product/product-2.jpg"
                                                                                  alt=""></a></div>
                                    <div class="item"><a href="{{route('product',[$product->id,$product->url])}}"><img src="images/product/product-3.jpg"
                                                                                  alt=""></a></div>
                                </div>
                                <!-- Controls -->

                            </div>
                            <!-- /product image carousel -->
                            <!-- quick-view -->
                            <a href="{{route('product',[$product->id,$product->url])}}" class="hidden-xs hidden-sm hidden-md quick-view"><b><span class="icon icon-visibility"></span>
                                    Прегледај</b> </a>
                            <!-- /quick-view -->
                            <!-- countdown_box -->

                        {{--BROJAC ZA POPUST--}}



                        {{--<div class="countdown_box">--}}
                        {{--<div class="countdown_inner">--}}
                        {{--<div id="countdown1"></div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <!-- /countdown_box -->
                        </div>
                        <!-- /product image -->
                        <!-- label news -->
                    {{--<div class="product__label product__label--right product__label--new"><span>new</span></div>--}}
                    <!-- /label news -->
                        <!-- label sale -->
                        {{--<div class="product__label product__label--left product__label--sale"> <span>Sale<br>--}}
                        {{---20%</span>--}}

                    <!-- /label sale -->
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <div class="product__label product__label--left product__label--sale"> <span>- {{(int)(((int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0))
                                            /($product->$myPriceGroup) * 100)}}%
                                                    <br></span>
                        </div>
                    @endif
                    <!-- product name -->
                    <br>
                    <div class="product__inside__info__btns">
                    </div>
                    <div class="product__inside__name">
                        <h2><a class="limit-txt" href="{{route('product',[$product->id,$product->url])}}">{{$product->title}}</a></h2>
                    </div>
                    <!-- /product name -->
                    <!-- product description -->
                    <!-- visible only in row-view mode -->
                    <div class="product__inside__description row-mode-visible"> {{$product->short_description}}
                    </div>
                    <!-- /product description -->
                    <!-- product price -->
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        {{--namalena cena--}}
                        {{--<div style="font-size:18px; color:red;" class="product__inside__price price-box">Заштедувате:--}}
                            {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                            {{--ден.--}}

                        {{--</div>--}}
                        <div class="product__inside__price price-box"> {{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}} ден.
                            <span class="blok price-box__old"> {{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                ден.</span>
                        </div>
                    @else
                        <div class="product__inside__price price-box">{{$product->price}}ден.
                        </div>
                    @endif
                    <div class="product__inside__hover">
                        <!-- product info -->
                        <div class="product__inside__info">
                            <div class="product__inside__info__btns">
                                <button style="padding-left: 15px !important;" value="{{$product->id}}"

                                        data-add-to-cart="" id="add_to_cart"
                                                                             class="btn btn--ys btn--xl">
                                    <span class="icon icon-shopping_basket hidden-xs"></span>
                                    <span class="category-button">Купи</span>
                                </button>

                                <a href="{{route('product',[$product->id,$product->url])}}"
                                   class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span
                                            class="icon icon-visibility"></span>Прегледај</a>
                            </div>

                        </div>
                        <!-- /product info -->
                        <!-- product rating -->
                        <div class="rating"></div><!-- /product rating -->
                        <!-- /product rating -->
                    </div>
                </div>
                </div>
                <!-- /product price -->
                <!-- product review -->
                <!-- visible only in row-view mode -->

                <!-- /product review -->
            {{--<div class="product__inside__hover">--}}
            {{--<!-- product info -->--}}
            {{--<div class="product__inside__info">--}}
            {{--<div class="product__inside__info__btns"><a href="#" class="btn btn--ys btn--xl"><span--}}
            {{--class="icon icon-shopping_basket"></span> Купи</a>--}}
            {{--<a href="#" class="btn btn--ys btn--xl visible-xs"><span--}}
            {{--class="icon icon-favorite_border"></span></a>--}}
            {{--<a href="#" class="btn btn--ys btn--xl visible-xs"><span--}}
            {{--class="icon icon-sort"></span></a>--}}
            {{--<a href="{{route('product',[$product->id,$product->url])}}"--}}
            {{--class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span--}}
            {{--class="icon icon-visibility"></span> Прегледај</a>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--<!-- /product info -->--}}
            {{--<!-- product rating -->--}}

            {{--<!-- /product rating -->--}}
            {{--</div>--}}

            <!-- /product -->


            </div>
        @endforeach

    @endif

</div>
<div class="row">
    <div class="pull-right filters-row__pagination">
        @if($count > 0)
            <ul class="pagination">
                <li @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto"@endif><a
                            href="javascript://" data-page="{{$productFilters->page - 1}}"><i
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
