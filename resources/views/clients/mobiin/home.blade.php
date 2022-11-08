@extends('clients.mobiin.layouts.default')
@section('content')

        <!-- BEGIN SLIDER -->
<div class="page-slider">
    <!-- LayerSlider start -->
    <div class="s-slider">
        @foreach($sliderBanners as $banner)
        <!-- slide one start -->
        <div class="s-slide">
            <a href="{{$banner->url}}">
            <img src="{{\ImagesHelper::getBannerImage($banner, NULL, 'lg_')}}" alt="{{$banner->title}}">
            </a>
        </div>
        @endforeach
        <!-- slide one end -->

        <!-- slide two start -->
        {{--<div class="s-slide">--}}

            {{--<img src="/assets/mobiin/images/slider/b2a.jpg">--}}

        {{--</div>--}}
        {{--<!-- slide two end -->--}}

        {{--<!-- slide three start -->--}}
        {{--<div class="s-slide">--}}

            {{--<img src="/assets/mobiin/images/slider/b3a.jpg">--}}

        {{--</div>--}}
        <!-- slide three end -->

    </div>
    <!-- LayerSlider end -->
</div>
<!-- END SLIDER -->

{{--<div class="container-fluid margin-bottom-30">--}}
    {{--<div class="row">--}}
        {{--<div class="col-sm-12" style="padding: 0 !important;">--}}
            {{--<img src="/assets/mobiin/images/lenta.jpg" class="img-responsive">--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}




        <!-- BEGIN STEPS -->
        <div class="steps-block steps-block-red">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 steps-block-col">
                        <i class="fa fa-phone"></i>
                        <div>
                            <h2>
                                <a href="tel:0038978369636">+389 78 36 96 36</a>
                            </h2>
                            <em>достапност во секое време</em>
                        </div>
                    </div>
                    <div class="col-sm-4 steps-block-col">
                        <i class="fa fa-mobile"></i>
                        <div>
                            <h2>Висок квалитет</h2>
                            <em>по достапни цени</em>
                        </div>
                    </div>
                    <div class="col-sm-4 steps-block-col">
                        <i class="fa fa-truck"></i>
                        <div>
                            <h2>100 ден. достава</h2>
                            <em>низ цела Македонија за 48 часа</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END STEPS -->



<div class="main margin-top-30">

    <div class="container">
        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 margin-top-50">
            <!-- BEGIN TWO PRODUCTS -->
            <div class="col-md-12 two-items-bottom-items">
                <h2>Најпродавани производи</h2>
                <div class="owl-carousel owl-carousel4">

                    @if(count($bestSellersArticles) > 0)
                        @foreach($bestSellersArticles as $product)
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h3><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                <div class="pi-price">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        <s style="margin-left: 10px;color: #999;">{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                                    @else
                                        <span>{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    @endif
                                </div>
                                @if($product->is_exclusive)
                                    {{--<div class="sticker sticker-sale"></div>--}}
                                    {{--<div class="sticker sticker-new"></div>--}}
                                @endif
                                <span class="add-to-cart-btn" data-add-to-cart="" value="{{$product->id}}">
                                    Додади во кошничка
                                </span>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <!-- END TWO PRODUCTS -->
            <!-- BEGIN PROMO -->
            {{--<div class="col-md-6 shop-index-carousel">--}}
                {{--<div class="content-slider" style="margin-top: 40px;">--}}
                    {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
                        {{--<!-- Indicators -->--}}
                        {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                        {{--</ol>--}}
                        {{--<div class="carousel-inner">--}}
                            {{--<div class="item active">--}}
                                {{--<img src="/assets/mobiin/images/home-banners/600-1.jpg" class="img-responsive" alt="mobiin">--}}
                            {{--</div>--}}
                            {{--<div class="item">--}}
                                {{--<img src="/assets/mobiin/images/home-banners/600-2.jpg" class="img-responsive" alt="mobiin">--}}
                            {{--</div>--}}
                            {{--<div class="item">--}}
                                {{--<img src="/assets/mobiin/images/home-banners/600-3.jpg" class="img-responsive" alt="mobiin">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- END PROMO -->
        </div>
        <!-- END TWO PRODUCTS & PROMO -->

        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Наша препорака</h2>
                <div class="owl-carousel owl-carousel4">

                    @if(count($recommendedArticles) > 0)
                        @foreach($recommendedArticles as $product)
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h3><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                <div class="pi-price">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        <s style="margin-left: 10px;color: #999;">{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                                    @else
                                        <span>{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    @endif
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
                                <span class="add-to-cart-btn" data-add-to-cart="" value="{{$product->id}}">
                                    Додади во кошничка
                                </span>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>Најпопуларни производи</h2>
                <div class="owl-carousel owl-carousel4">

                    @if(count($popularArticles) > 0)
                        @foreach($popularArticles as $product)
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                                    <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h3><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                                <div class="pi-price">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        <s style="margin-left: 10px;color: #999;">{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                                    @else
                                        <span>{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    @endif
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
                                <span class="add-to-cart-btn" data-add-to-cart="" value="{{$product->id}}">
                                    Додади во кошничка
                                </span>
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