@extends('clients.watchstore.layouts.default')
@section('content')
    <div class="main_slider container">
        @if(count($dailyPromotionsArticles)>0)
        <div class="pull-left width-lg-70">
            <div class="">
                <ul>
                    <li style="list-style: none !important;">
                        <!-- MAIN IMAGE -->
                        <img src="{{ url_assets('/watchstore/images/final_banner.jpg') }}" alt="darkblurbg">
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden-md hidden-sm pull-left width-lg-30">
            <div style="filter:brightness(100%);" class="daily-promo banner-slider-container daily-promotion-container width-3 pull-right daily-promotion-laptop">
                <div class="daily-promotion-slider">
                    @foreach($dailyPromotionsArticles as $article)
                        <div class="single-promorion-slide">
                            <a href="{{route('product',[$article->id,$article->url])}}">
                                <div class="daily-promotion-product">
                                    <img style="filter:brightness(50%); height: 218px;" class="filters" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="{{$article->title}}">
                                    <div class="orange-opacity">
                                        <a href="{{route('product',[$article->id,$article->url])}}">
                                            <h3 style="color:white " class="promotion-product-name">
                                                {{trans('watchstore.promotion2')}}:<br>
                                                <span style="color:white;">{{$article->title}}</span>
                                            </h3>
                                        </a>
                                    </div>

                                </div>
                            </a>
                            <div class="daily-promotion-time">
                                <div style="" class="marginResponsiveDaily product-details center">
                                    <br>
                                    <button
                                            value="{{$article->id}}" data-add-to-cart="" id="add_to_cart"
                                            style="
                                            "
                                            class="customBtnDaily customBtn">{{trans('watchstore.addToCart')}}
                                    </button>
                                    <h2 style="padding-bottom: 10px !important;">
                                        {{--{{$article->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}--}}
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <span style="color:#000000">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            <del>{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</del>
                                        @else
                                            {{number_format($article->$myPriceGroup)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                        @endif
                                    </h2>
                                </div>
                                <div class="timer">
                                    <div class="time hours-timer">

                                    </div>
                                    <div class="time minutes-timer">

                                    </div>
                                    <div class="time seconds-timer">

                                    </div>

                                    <span>{{trans('watchstore.hours')}}</span>
                                    <span>{{trans('watchstore.minutes')}}</span>
                                    <span>{{trans('watchstore.seconds')}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
            @else
            <div class="pull-left width-lg-100">
                <div class="">
                    <ul>
                        <li style="list-style:none;">
                            <!-- MAIN IMAGE -->
                            <img src="{{ url_assets('/watchstore/images/final_banner.jpg') }}" alt="darkblurbg">
                        </li>
                    </ul>
                </div>
            </div>
            @endif
    </div>
    <!-- MAIN-SLIDER-AREA END -->

    <!-- MAIN-FEATURED-AREA -->
    <section style="padding: 0px 0 30px !important;" class="main-featured-area section-padding">
        <div class="container">
            <div style="margin-top:10px;" class="col-lg-12 headline">
                <h2 style="color:black; margin: 7px -15px -2px;" class="pull-left">{{trans('watchstore.categories')}}</h2>
            </div>
            <div class="row" style="margin-top: 50px;">
                @foreach($menuCategories as $mc)
                <div style="margin-top:15px !important;" class="col-sm-4 col-md-4 col-xs-12">
                    <div class="featured-single">
                        <div class="featured-img">
                            <a href="{{route('category', [$mc['id'], $mc['url']])}}">
                            <img src="/uploads/category/{{$mc['image']}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-sm-12 col-md-12 col-xs-12"><br>
                    <div style="margin-top:10px;" class="col-lg-12 headline">
                        <h2 style="color:black; margin: 7px -15px -2px;" class="pull-left">{{trans('watchstore.news')}}</h2>
                    </div>
                    <div class="features-promo-single">
                        <div class="features-promo-img">
                            <img src="{{ url_assets('/watchstore/images/news-1.jpg') }}" alt="">
                            {{--<div class="features-promo-text">--}}
                            {{--<h3>Trends for girls</h3>--}}
                            {{--<P>Accessories collection</P>--}}
                            {{--</div>--}}
                            <div class="promo-hover">
                                <div class="promo-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN-FEATURED-AREA END -->
    {{--<div id="brand-bg">--}}
        {{--<div class="brand-overlay">--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="partners_list">--}}

                            {{--<div class="partners_list_carousel">--}}
                                {{--@foreach($manufacturers as $manufacturer)--}}
                                {{--<div style="color:white;" class="custom-item item">--}}
                                    {{--<a style="font-size: 18px;--}}
                                        {{--margin-top: -6px;--}}
                                        {{--text-decoration: none;--}}
                                        {{--color:#333333;"--}}
                                        {{--href="{{route('manufacturer', [$manufacturer->id])}}">--}}
                                        {{--{{$manufacturer->name}}--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- OUR-BRAND-AREA END -->
    <!-- MEN-CLOTHING-AREA -->
    <section class="men_clothingcurosel_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(count($bestSellersArticles) > 0)
                    <div class="headline">
                        <h2>{{trans('watchstore.best_selling')}}</h2>
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
                                <img
                                        src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""
                                        alt="{{$product->title}}">
                            </a>
                            {{--<div class="tag new">--}}
                                {{--<span>new</span>--}}
                            {{--</div>--}}
                            <div style="padding-left:0px !important;" class="text-center hot-wid-rating">
                                <h4 style="min-height:40px !important;">
                                    <a href="{{route('product', [$product->id, $product->url])}}">
                                        {{$product->title}}
                                    </a>
                                </h4>
                                <div class="text-center product-wid-price">
                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span class="product-price price"
                                              style="color:black;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                                        <span style="text-decoration: line-through; color: #000000; font-size: 16px; ">
                                            <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                                    @else

                                        <span class="product-price price"
                                              style="color:black;"> <span
                                                    id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
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
    <!-- MEN-CLOTHING-AREA END -->

    <!-- FEATURED-PROMO-AREA -->
    <section class="features-promo-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="features-promo-single">
                        <div class="features-promo-img">
                            <img src="{{ url_assets('/watchstore/images/baner1.jpg') }}" alt="">
                            {{--<div class="features-promo-text">--}}
                                {{--<h3>Top collection</h3>--}}
                                {{--<P>New collection for men</P>--}}
                            {{--</div>--}}
                            <div class="promo-hover">
                                <div class="promo-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="features-promo-single">
                        <div class="features-promo-img">
                            <img src="{{ url_assets('/watchstore/images/baner2-new.jpg') }}" alt="">
                            {{--<div class="features-promo-text">--}}
                                {{--<h3>Trends for girls</h3>--}}
                                {{--<P>Accessories collection</P>--}}
                            {{--</div>--}}
                            <div class="promo-hover">
                                <div class="promo-in"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="men_clothingcurosel_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(count($recommendedArticles) > 0)
                        <div class="headline">
                            <h2>{{trans('watchstore.recommended')}}</h2>
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
                                        <img
                                                src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""
                                                alt="{{$product->title}}">
                                    </a>
                                    {{--<div class="tag new">--}}
                                    {{--<span>new</span>--}}
                                    {{--</div>--}}
                                    <div class="text-center hot-wid-rating">
                                        <h4 style="min-height:40px !important;">
                                            <a href="{{route('product', [$product->id, $product->url])}}">
                                                {{$product->title}}
                                            </a>
                                        </h4>
                                        <div class="text-center product-wid-price">
                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                <span class="product-price price"
                                                      style="color:black;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                                                <span style="text-decoration: line-through; color: #000000; font-size: 16px; ">
                                            <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                                            @else

                                                <span class="product-price price"
                                                      style="color:black;"> <span
                                                            id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
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
    <!-- WOMEN-ACCESSORIES-AREA END -->

    <!--  TESTIMONIAL-AREA  -->
    <section id="testimonial" class="section-padding">
        <div class="testimonial-overlay">
            <div class="testimonial">
                <div class="container">
                    <div>
                        <div>
                            {{--<ol class="carousel-indicators">--}}
                                {{--<li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>--}}
                                {{--<li data-target="#carousel-testimonial" data-slide-to="1" class=""></li>--}}
                                {{--<li data-target="#carousel-testimonial" data-slide-to="2" class=""></li>--}}
                            {{--</ol>--}}
                            {{--<div class="carousel-inner">--}}
                                {{--<div class="item">--}}
                                    {{--<div class="item_quote">--}}
                                        {{--<i class="fa fa-quote-left"></i>--}}
                                    {{--</div>--}}
                                    {{--<div class="content">--}}
                                        {{--<p> Till the one day when the lady met this fellow and they knew it was much more than a hunch. These Happy Days are yours and mine Happy Days. Its mission to explore strange new worlds to seek out new man has gone before.</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="client">--}}
                                        {{--<div class="image">--}}
                                            {{--<img src="{{ url_assets('') }}/assets/watchstore/images/customer.png" alt="#">--}}
                                        {{--</div>--}}
                                        {{--<div class="c_text_inner">--}}
                                            {{--<h4>Micheal Clerk</h4>--}}
                                            {{--<h5>Customer Sydney</h5>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item active left">--}}
                                    {{--<div class="item_quote">--}}
                                        {{--<i class="fa fa-quote-left"></i>--}}
                                    {{--</div>--}}
                                    {{--<div class="content">--}}
                                        {{--<p> Till the one day when the lady met this fellow and they knew it was much more than a hunch. These Happy Days are yours and mine Happy Days. Its mission to explore strange new worlds to seek out new man has gone before.</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="client">--}}
                                        {{--<div class="image">--}}
                                            {{--<img src="{{ url_assets('') }}/assets/watchstore/images/customer.png" alt="#">--}}
                                        {{--</div>--}}
                                        {{--<div class="c_text_inner">--}}
                                            {{--<h4>Micheal Clerk</h4>--}}
                                            {{--<h5>Customer Sydney</h5>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="item next left">--}}
                                    {{--<div class="item_quote">--}}
                                        {{--<i class="fa fa-quote-left"></i>--}}
                                    {{--</div>--}}
                                    {{--<div class="content">--}}
                                        {{--<p> Till the one day when the lady met this fellow and they knew it was much more than a hunch. These Happy Days are yours and mine Happy Days. Its mission to explore strange new worlds to seek out new man has gone before.</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="client">--}}
                                        {{--<div class="image">--}}
                                            {{--<img src="{{ url_assets('') }}/assets/watchstore/images/customer.png" alt="#">--}}
                                        {{--</div>--}}
                                        {{--<div class="c_text_inner">--}}
                                            {{--<h4>Micheal Clerk</h4>--}}
                                            {{--<h5>Customer Sydney</h5>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  TESTIMONIAL-AREA END  -->
    @if(count($newestArticles) > 0)
    <!-- LATEST-PRODUCT-AREA-AREA -->
    <section class="men_clothingcurosel_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                        <div class="headline">
                            <h2>{{trans('watchstore.new')}}</h2>
                        </div>
                        <div class="menclothing-carousel">
                            @foreach($newestArticles as $product)
                                <div class="men-single product-single">
                                    <a href="{{route('product', [$product->id, $product->url])}}">
                                        <img
                                                src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""
                                                alt="{{$product->title}}">
                                    </a>
                                    {{--<div class="tag new">--}}
                                    {{--<span>new</span>--}}
                                    {{--</div>--}}
                                    <div class="text-center hot-wid-rating">
                                        <h4 style="min-height:40px !important;">
                                            <a href="{{route('product', [$product->id, $product->url])}}">
                                                {{$product->title}}
                                            </a>
                                        </h4>
                                        <div class="text-center product-wid-price">
                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                <span class="product-price price"
                                                      style="color:black;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                                                <span style="text-decoration: line-through; color: #000000; font-size: 16px; ">
                                            <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                                            @else


                                                <span class="product-price price"
                                                      style="color:black;"> <span
                                                            id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
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
    </section>
    @endif
    <!-- LATEST-PRODUCT-AREA END -->

    <!-- OUR-BRAND-AREA -->


    <!-- LATEST-BLOG-AREA -->
    {{--<section class="laest-blog-area section-padding">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="headline">--}}
                        {{--<h2>Latest from our blog</h2>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-4">--}}
                    {{--<div class="blog-single">--}}
                        {{--<div class="blog-image">--}}
                            {{--<img src="{{ url_assets('') }}/assets/watchstore/images/blog1.png" alt="">--}}
                            {{--<div class="blog-icon">--}}
                                {{--<img src="{{ url_assets('') }}/assets/watchstore/images/blog-icon.png" alt="#">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="blog-text">--}}
                            {{--<h3><a href="single-post.html">Said Californ'y is the place</a></h3>--}}
                            {{--<hr class="blog-text-h3">--}}
                            {{--<P>Like Robinson Crusoe it's primitive as can be. Sunny Days sweepin' the clouds away. On my way to where the air is sweet Crusoe it's primitive. </P>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                    {{--<div class="blog-single">--}}
                        {{--<div class="blog-image">--}}
                            {{--<img src="{{ url_assets('') }}/assets/watchstore/images/blog2.png" alt="">--}}
                            {{--<div class="blog-icon">--}}
                                {{--<img src="{{ url_assets('') }}/assets/watchstore/images/blog-icon.png" alt="#">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="blog-text">--}}
                            {{--<h3><a href="single-post.html">Your name black gold Goodbye</a></h3>--}}
                            {{--<hr class="blog-text-h3">--}}
                            {{--<P>I have always wanted to have a neighbor just like you. I've always wanted to live in a neighborhood with you here's the story of a lovely.</P>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                    {{--<div class="blog-single">--}}
                        {{--<div class="blog-image">--}}
                            {{--<img src="{{ url_assets('') }}/assets/watchstore/images/blog3.png" alt="">--}}
                            {{--<div class="blog-icon">--}}
                                {{--<img src="{{ url_assets('') }}/assets/watchstore/images/blog-icon.png" alt="#">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="blog-text">--}}
                            {{--<h3><a href="single-post.html">Flying away on a wing and a prayer</a></h3>--}}
                            {{--<hr class="blog-text-h3">--}}
                            {{--<P> Just sit right back and you'll hear a tale a tale of a fateful trip that started from this tropic port aboard this tiny ship said Californ.</P>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- LATEST-BLOG-AREA END -->
@endsection