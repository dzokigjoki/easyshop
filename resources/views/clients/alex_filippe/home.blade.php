@extends('clients.alex_filippe.layouts.default')
@section('content')

        <!-- BEGIN SLIDER -->
{{-- <div class="page-slider margin-bottom-35">
    <!-- LayerSlider start -->
    <div id="layerslider" style="width: 100%; height: 400px; margin: 0 auto;">
        <!-- slide one start -->
        <div class="ls-slide ls-slide1" data-ls="offsetxin: right;">
            <img style="width:100% !important;" src="{{ url_assets('/alex_filippe/images/slider/b1.gif')}}" class="ls-bg">
        </div>
        <!-- slide one end -->

        <!-- slide two start -->

        <div class="ls-slide ls-slide2" data-ls="offsetxin: right;">
            <img src="{{url_assets('/alex_filippe/images/slider/b2-fix.png')}}" class="ls-bg">
        </div>
        <!-- slide two end -->

    </div>
    <!-- LayerSlider end -->
</div> --}}
<!-- END SLIDER -->

<div class="slider single-item" style="padding-bottom: 35px;">
    <div>
        <img style="width:100% !important;" src="{{ url_assets('/alex_filippe/images/slider/b1.gif')}}">
    </div>
    <div>
            <img style="width:100% !important" src="{{url_assets('/alex_filippe/images/slider/baner2.png')}}">
    </div>
</div>

<div class="main">
    <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Актуелна колекција</h2>
                <div class="owl-carousel owl-carousel3">

                    @if(count($newestArticles) > 0)
                        @foreach($newestArticles as $product)
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h3 class="text-center"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                <div class="pi-price text-center">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                        <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                    @else
                                        <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                    @endif<br>
                                    <button style="margin-top: 10px;" type="submit" data-add-to-cart="" value="{{$product->id}}" id="add_to_cart" class="btn btn-primary">Додади во кошничка</button>
                                </div>
                                
                                {{--<a href="javascript://;"--}}
                                   {{--data-id="{{$product->id}}"--}}
                                   {{--data-slug="{{$product->url}}"--}}
                                   {{--data-category-add-to-cart=""--}}
                                   {{--class="btn btn-default add2cart">Во кошничка</a>--}}
                                @if($product->is_exclusive)
                                    {{--<div class="sticker sticker-sale"></div>--}}
                                    {{--<div class="sticker sticker-new"></div>--}}
                                @endif
                            </div>
                            
                        @endforeach
                    @endif
                    
                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
            <!-- BEGIN TWO PRODUCTS -->
            <div class="col-md-6 two-items-bottom-items">
                <h2>Нови Модели</h2>
                <div class="owl-carousel owl-carousel2">

                    @if(count($bestSellersArticles) > 0)
                        @foreach($bestSellersArticles as $product)
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h3 class="text-center"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                <div class="pi-price text-center">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                        <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                    @else
                                        <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                    @endif
                                    <br>
                                    <button style="margin-top: 10px; " type="submit" data-add-to-cart="" value="{{$product->id}}" id="add_to_cart" class="btn btn-primary">Додади во кошничка</button>
                                </div>
                                @if($product->is_exclusive)
                                    {{--<div class="sticker sticker-sale"></div>--}}
                                    {{--<div class="sticker sticker-new"></div>--}}
                                @endif
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <!-- END TWO PRODUCTS -->
            <!-- BEGIN PROMO -->
            <div class="col-md-6 shop-index-carousel">
                <div class="content-slider" style="margin-top: -8px;">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            {{-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> --}}
                            {{-- <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li> --}}
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ url_assets('/alex_filippe/images/home-banners/600-1.png') }}" class="img-responsive" alt="Alex Filipe">
                            </div>
                            {{-- <div class="item">
                                <img src="{{ url_assets('/alex_filippe/images/home-banners/600-2.jpg') }}" class="img-responsive" alt="Alex Filipe">
                            </div>
                            <div class="item">
                                <img src="{{ url_assets('/alex_filippe/images/home-banners/600-3.jpg') }}" class="img-responsive" alt="Alex Filipe">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROMO -->
        </div>
        <!-- END TWO PRODUCTS & PROMO -->

        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        {{-- <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Наша препорака</h2>
                <div class="owl-carousel owl-carousel3">

                    @if(count($recommendedArticles) > 0)
                        @foreach($recommendedArticles as $product)
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h3 class="text-center"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                <div class="pi-price text-center">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                        <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                    @else
                                        <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                    @endif
                                    <br>
                                    <button style="margin-top: 10px; " type="submit" data-add-to-cart="" value="{{$product->id}}" id="add_to_cart" class="btn btn-primary">Додади во кошничка</button>
                                </div>
                                {{--<a href="javascript://;"--}}
{{--                                   data-id="{{$product->id}}"--}}
{{--                                   data-slug="{{$product->url}}"--}}
                                   {{--data-category-add-to-cart=""--}}
                                   {{--class="btn btn-default add2cart">Во кошничка</a>--}}
                                {{-- @if($product->is_exclusive) --}}
                                    {{--<div class="sticker sticker-sale"></div>--}}
                                    {{--<div class="sticker sticker-new"></div>--}}
                                {{-- @endif
                            </div>
                        @endforeach
                    @endif

                </div>
            </div> --}}
            <!-- END SALE PRODUCT -->
        {{-- </div>  --}}
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Популарно</h2>
                <div class="owl-carousel owl-carousel3">

                    @if(count($popularArticles) > 0)
                        @foreach($popularArticles as $product)
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h3 class="text-center"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                <div class="pi-price text-center">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                        <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                                    @else
                                        <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                                    @endif
                                    <br>
                                    <button style="margin-top: 10px;" type="submit" data-add-to-cart="" value="{{$product->id}}" id="add_to_cart" class="btn btn-primary">Додади во кошничка</button>
                                </div>
                                {{--<a href="javascript://;"--}}
{{--                                   data-id="{{$product->id}}"--}}
{{--                                   data-slug="{{$product->url}}"--}}
                                   {{--data-category-add-to-cart=""--}}
                                   {{--class="btn btn-default add2cart">Во кошничка</a>--}}
                                @if($product->is_exclusive)
                                    {{--<div class="sticker sticker-sale"></div>--}}
                                    {{--<div class="sticker sticker-new"></div>--}}
                                @endif
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

    </div>
</div>


@endsection


@section('scripts')
@endsection