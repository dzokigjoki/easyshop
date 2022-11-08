@extends('clients.betajewels.layouts.default')
@section('content')

<div class="main_slider container">
<div class="pull-left width-lg-100">
    <div>
       <img src="{{ url_assets('/betajewels/images/top-banner/top-banner-desktop.jpg') }}" alt="Misaki">
    </div>
</div>
</div>
@if(count($recommendedArticles) > 0)
<section class="men_clothingcurosel_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count($recommendedArticles) > 0)
                <div class="headline">
                    <h2>Нашите продукти</h2>
                </div>
                <div class="menclothing-carousel">
                    @foreach($recommendedArticles as $product)
                    <div class="men-single product-single">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <div class="custom-discount">
                            {{(int)((((int)EasyShop\Models\Product::getPriceRetail1($product, false, 0) - $product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%
                        </div>
                        @endif
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="" alt="{{$product->title}}">
                        </a>
                        {{--<div class="tag new">--}}
                        {{--<span>new</span>--}}
                        {{--</div>--}}
                        <div class="text-center hot-wid-rating">
                            <h4 class="title-height">
                                <a href="{{route('product', [$product->id, $product->url])}}">
                                    {{$product->title}}
                                </a>
                            </h4>
                            <div class="text-center product-wid-price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="product-price price" >
                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>

                                <span class="outer-discount">
                                    <span class="price inner-discount">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>

                                @else

                                <span class="product-price price" > <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif


<section class="features-promo-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-xs-12">
                <div class="features-promo-single">
                    <div class="features-promo-img">
                        <img src="{{ url_assets('/betajewels/images/small-banner/small-banner-1.jpg') }}" alt="">
                        <div class="promo-hover">
                            <div class="promo-in"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12">
                <div class="features-promo-single">
                    <div class="features-promo-img">
                        <img src="{{ url_assets('/betajewels/images/small-banner/small-banner-2.jpg') }}" alt="">
                        <div class="promo-hover">
                            <div class="promo-in"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(count($bestSellersArticles) > 0)
<section class="men_clothingcurosel_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count($bestSellersArticles) > 0)
                <div class="headline">
                    <h2>Најбарани</h2>
                </div>
                <div class="menclothing-carousel">
                    @foreach($bestSellersArticles as $product)
                    <div class="men-single product-single">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <div class="custom-discount">
                            {{(int)((((int)EasyShop\Models\Product::getPriceRetail1($product, false, 0) - $product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%
                        </div>
                        @endif
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="" alt="{{$product->title}}">
                        </a>
                        {{--<div class="tag new">--}}
                        {{--<span>new</span>--}}
                        {{--</div>--}}
                        <div class="text-center hot-wid-rating">
                            <h4 class="title-height">
                                <a href="{{route('product', [$product->id, $product->url])}}">
                                    {{$product->title}}
                                </a>
                            </h4>
                            <div class="text-center product-wid-price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="product-price price" >
                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>

                                <span class="outer-discount">
                                    <span class="price inner-discount">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>

                                @else

                                <span class="product-price price" > <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif



<section id="testimonial" class="section-padding">
    <div class="testimonial-overlay">
        <div class="testimonial">
            <div class="container">
                <div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






@if(count($exclusiveArticles) > 0)
<section class="men_clothingcurosel_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count($exclusiveArticles) > 0)
                <div class="headline">
                    <h2>Ексклузивни</h2>
                </div>
                <div class="menclothing-carousel">
                    @foreach($exclusiveArticles as $product)
                    <div class="men-single product-single">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <div class="custom-discount">
                            {{(int)((((int)EasyShop\Models\Product::getPriceRetail1($product, false, 0) - $product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%
                        </div>
                        @endif
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="" alt="{{$product->title}}">
                        </a>
                        {{--<div class="tag new">--}}
                        {{--<span>new</span>--}}
                        {{--</div>--}}
                        <div class="text-center hot-wid-rating">
                            <h4 class="title-height">
                                <a href="{{route('product', [$product->id, $product->url])}}">
                                    {{$product->title}}
                                </a>
                            </h4>
                            <div class="text-center product-wid-price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="product-price price" >
                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>

                                <span class="outer-discount">
                                    <span class="price inner-discount">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>

                                @else

                                <span class="product-price price" > <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif
@endsection