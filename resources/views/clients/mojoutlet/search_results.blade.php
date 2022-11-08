@extends('clients.shopathome.layouts.default')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>
            <li><a href="{{route('home')}}">Дома</a></li>
            <li class="active">{{$search}}</li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs -->
<!-- CONTENT section -->
<div id="pageContent">
    <div class="container">
        <!-- two columns -->
        <div class="row">
            <!-- left column -->
            <aside class="col-md-4 col-lg-3 col-xl-2 without-left-col" id="leftColumn">
                <a href="#" class="slide-column-close"><span class="icon icon-chevron_left"></span>back</a>
                <div class="filters-block visible-xs">
                    <form action="{{route('search')}}" method="get">
                    <div class="filters-row__select">
                            <div class="input-outer">
                                <input placeholder="Пребарај" type="text" name="search" value="{{$search}}" maxlength="128">
                                <button type="submit" title="" class="icon icon-search">Пребарај</button>
                            </div>
                            <a href="#" class="search__close"><span class="icon icon-close"></span></a>
                    </div>
                    <div class="filters-row__select">
                        <label>Подреди по: </label>
                        <div class="select-wrapper">
                            <select onchange="this.form.submit()" name="sort_by" class="select--ys">
                                <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                        @endif  value="title_asc">Име (A - Z)
                                </option>
                                <option @if($order_by == "title_desc") selected=""
                                        @endif  value="title_desc">Име (Z - A)
                                </option>
                                <option @if($order_by == "price_asc") selected=""
                                        @endif  value="price_asc">Цена - (Ниска)
                                </option>
                                <option @if($order_by == "price_desc") selected=""
                                        @endif  value="price_desc">Цена - (Висока)
                                </option>
                            </select>
                        </div>
                        <a href="#" class="sort-direction icon icon-arrow_back"></a>
                    </div>
                    <div class="filters-row__select">
                        <label>Прикажи: </label>
                        <div class="select-wrapper">
                            <select onchange="this.form.submit()" name="results_limit"
                                    class="select--ys show-qty" id="result_limit">
                                <option @if($results_limit == 20) selected=""
                                        @endif value="20"
                                        selected="">20
                                </option>
                                <option @if($results_limit == 50) selected=""
                                        @endif  value="50">50
                                </option>
                                <option @if($results_limit == 75) selected=""
                                        @endif  value="75">75
                                </option>
                                <option @if($results_limit == 100) selected="selected"
                                        @endif  value="100">100
                                </option>
                            </select>
                        </div>
                    </div>
                    </form>
                    <a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a>
                </div>
                <!-- shopping by block -->
            </aside>
            <!-- /left column -->
            <!-- center column -->
            <aside class="col-md-12 col-lg-12 col-xl-12" id="centerColumn">
                <!-- title -->
                <div class="title-box">
                    <h2 class="text-center text-uppercase title-under">Резултати од пребарување: {{$search}}</h2>
                </div>
                <!-- /title -->
                <!-- filters row -->

                <!-- /filters row -->
                <div class="product-listing row">
                    @if(count($products) == 0)
                        <section class="theme_box"><br>
                            <div class="text-center">
                                <img src="{{ url_assets('/mojoutlet/images/empty-search-icon.png') }}" alt="empty cart icon" class="img-responsive-inline" />
                                <div class="divider divider--lg"></div>
                                <h4 class="color">Нема резултати од пребарувањето</h4>
                                <div class="divider divider--lg"></div>
                                <a class="btn btn--ys" href="{{route('home')}}"><span class="icon icon-keyboard_arrow_left"></span>Започни со купување</a>
                            </div>
                        </section>
                        {{--@endif--}}
                    @else
                        <div class="filters-row filters-row-layout border-top-none">


                            <div class="pull-right col-lg-12 col-xs-12 col-sm-12 col-md-5 text-right">
                                {{--<div class="filters-row__items hidden-sm hidden-xs">28 Item(s)</div>--}}

                                <form action="{{route('search')}}" method="get">
                                    <div class="pull-left">
                                        <div class="search link-inline">
                                            <a href="#" class="search__open"><span class="icon icon-search"></span></a>
                                            <div class="search-dropdown">
                                                <div class="input-outer">
                                                    <input type="search" name="search" value="{{$search}}" maxlength="128">
                                                    <button type="submit" title="" class="icon icon-search"></button>
                                                </div>
                                                <a href="#" class="search__close"><span class="icon icon-close"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filters-row__select hidden-xs">
                                        <label>Подреди по: </label>
                                        <div class="select-wrapper">
                                            <select onchange="this.form.submit()" name="sort_by" class="select--ys">
                                                <option @if($order_by == "title_asc" || empty($order_by)) selected=""
                                                        @endif  value="title_asc">Име (A - Z)
                                                </option>
                                                <option @if($order_by == "title_desc") selected=""
                                                        @endif  value="title_desc">Име (Z - A)
                                                </option>
                                                <option @if($order_by == "price_asc") selected=""
                                                        @endif  value="price_asc">Цена - (Ниска)
                                                </option>
                                                <option @if($order_by == "price_desc") selected=""
                                                        @endif  value="price_desc">Цена - (Висока)
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="filters-row__select hidden-sm hidden-xs">
                                        <label>Прикажи: </label>
                                        <div class="select-wrapper">
                                            <select onchange="this.form.submit()" name="results_limit"
                                                    class="select--ys show-qty" id="result_limit">
                                                <option @if($results_limit == 20) selected=""
                                                        @endif value="20"
                                                        selected="">20
                                                </option>
                                                <option @if($results_limit == 50) selected=""
                                                        @endif  value="50">50
                                                </option>
                                                <option @if($results_limit == 75) selected=""
                                                        @endif  value="75">75
                                                </option>
                                                <option @if($results_limit == 100) selected="selected"
                                                        @endif  value="100">100
                                                </option>
                                            </select>
                                        </div>
                                        <a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                                        <a href="{{route('product',[$product->id,$product->url])}}">
                                                            {{--<img src="/assets/mojoutlet/images/product/product-10.jpg" alt="">--}}
                                                            <img
                                                                    @if($isMobile)
                                                                    onclick="location.href='{{route('product',[$product->id,$product->url])}}'"
                                                                    @endif
                                                                    src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="item"><a href="product.html"><img src="images/product/product-2.jpg"
                                                                                                  alt=""></a></div>
                                                    <div class="item"><a href="product.html"><img src="images/product/product-3.jpg"
                                                                                                  alt=""></a></div>
                                                </div>
                                                <!-- Controls -->

                                            </div>
                                            <!-- /product image carousel -->
                                            <!-- quick-view -->
                                            <a href="{{route('product',[$product->id,$product->url])}}" class="hidden-xs hidden-sm hidden-md quick-view"><b><span
                                                            class="icon icon-visibility"></span>Прегледај</b> </a>
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
                                            <div class="product__inside__info__btns"><button style="padding-left: 15px !important;" value="{{$product->id}}"
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
                            {{--class="icon icon-shopping_basket"></span> Купи во кошничка во кошничка во кошничка во кошничка</a>--}}
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
                <!-- filters row -->
                <!-- /filters row -->
            </aside>
            <!-- center column -->
        </div>
        <!-- /two columns -->
        <div class="pull-right filters-row__pagination">
            @if ($products && count($products))
                <ul class="pagination">
                    {{--<li><a class="pagination-previous disabled" href="#"><span--}}
                    {{--class="icon-left-open-mini"></span></a></li>--}}
                    <li>{{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}</li>
                    {{--<li><a class="prebaraj pagination-next" href="#"><span--}}
                    {{--class="icon-right-open-mini"></span></a></li>--}}
                </ul>
                <!-- End .view-count-box -->
            @endif
        </div>
    </div>

</div>

<!-- End CONTENT section -->
@endsection