@extends('clients.topmarketmk.layouts.default')
@section('content')
    <section id="content">

        <div id="slider-rev-container">
            <div id="slider-rev">
                <ul>
                    {{--@foreach($sliderBanners as $banner)--}}
                    {{--<li data-transition="fade" data-slotamount="6" data-masterspeed="600" data-saveperformance="on"  data-title="Special Offers">--}}
                        {{--<img src="{{\ImagesHelper::getBannerImage($banner, NULL, 'lg_')}}" alt="{{$banner->title}}" data-lazyload="{{\ImagesHelper::getBannerImage($banner, NULL, 'lg_')}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">--}}
                        {{--<div class="tp-caption rev-title lfr ltr" data-x="695" data-y="198" data-speed="1600" data-start="300" data-endspeed="300">Понуда - 50%! </div>--}}
                        {{--<div class="tp-caption rev-text lfr ltr" data-x="695" data-y="252" data-speed="1600" data-start="600" data-endspeed="550">Не пропуштајте<br>Нарачај веднаш!</div>--}}

                        {{--<div class="tp-caption lfr ltr" data-x="695" data-y="332" data-speed="1600" data-start="900" data-endspeed="800">--}}
                            {{--<a href="#" class="btn btn-custom-2">Види повеќе!   </a>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                    <li data-transition="fade" data-slotamount="6" data-masterspeed="600" data-saveperformance="on"  data-title="Special Offers">
                        <img src="{{ url_assets('/topmarketmk/images/golembaner.jpg') }}" alt="" data-lazyload="{{ url_assets('/topmarketmk/images/golembaner.jpg') }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        {{--<div class="tp-caption rev-title lfr ltr" data-x="695" data-y="198" data-speed="1600" data-start="300" data-endspeed="300">Понуда - 50%! </div>--}}
                        {{--<div class="tp-caption rev-text lfr ltr" data-x="695" data-y="252" data-speed="1600" data-start="600" data-endspeed="550">Не пропуштајте<br>Нарачај веднаш!</div>--}}

                        {{--<div class="tp-caption lfr ltr" data-x="695" data-y="332" data-speed="1600" data-start="900" data-endspeed="800">--}}
                            {{--<a href="#" class="btn btn-custom-2">Види повеќе!   </a>--}}
                        {{--</div>--}}
                    </li>
                </ul>
            </div><!-- End #slider-rev -->
        </div><!-- End #slider-rev-container -->


        <div class="md-margin2x"></div><!-- Space -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-9 col-sm-8 col-xs-12 main-content">
                            <header class="content-title">
                                <h2 class="title">Најпродавано </h2>
                                {{--<p class="title-desc"></p>--}}
                            </header>
                            <div id="products-tabs-content" class="row tab-content">
                                <div class="tab-pane active" id="all">
                                    @if(count($bestSellersArticles) > 0)
                                        @foreach($bestSellersArticles as $product)
                                            <div class="col-md-4 col-sm-6 col-xs-6">
                                                <div class="item item-hover">
                                                    <div class="item-image-wrapper">
                                                        <figure class="item-image-container">
                                                            <a href="{{route('product', [$product->id, $product->url])}}">
                                                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                                                     alt="" class="item-image">
                                                                {{--<img src="{{ url_assets('') }}/assets/topmarketmk/images/products/item2.jpg" alt="item1" class="">--}}
                                                            </a>
                                                        </figure>

                                                        <div class="item-price-container">
                                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                            <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price"></span>мкд.</span>
                                                            <span class="item-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}<span class="sub-price">мкд.</span></span>
                                                            @else
                                                                <span class="item-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price">мкд.</span></span>
                                                            @endif
                                                        </div><!-- End .item-price-container -->
                                                        {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                            {{--<div class="discount-rect">--}}
                                                                {{--{{(int)(((EasyShop\Models\Product::getPriceRetail1($product, false, 0)-$product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%--}}
                                                            {{--</div>--}}
                                                        {{--@endif--}}
                                                    </div><!-- End .item-image-wrapper -->
                                                    <div style="height:148px !important;" class="item-meta-container">
                                                        <div class="item-action">
                                                                <a href="" value="{{$product->id}}" data-add-to-cart="" class="item-add-btn" id="add_to_cart">
                                                                    <span class="icon-cart-text">Купи</span>
                                                                </a>
                                                        </div><!-- End .item-action -->
                                                        <br>
                                                        <h3 class="item-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>

                                                    </div><!-- End .item-meta-container -->
                                                </div><!-- End .item -->
                                            </div><!-- End .col-md-4 -->
                                        @endforeach
                                    @endif
                                </div><!-- End .tab-pane -->
                            </div><!-- End #products-tabs-content -->

                            {{--<div class="sm-margin"></div><!-- Space -->--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-7 col-sm-7 col-xs-12">--}}
                                    {{--<header class="content-title">--}}
                                        {{--<h2 class="title">Welcome to Venedor</h2>--}}
                                    {{--</header>--}}
                                     {{--<p>--}}
                                         {{--Venedor is a fully responsive Magento theme with advanced--}}
                                        {{--admin module. Based on Bootstrap’s 12 column 1200px responsive--}}
                                        {{--grid Theme. Great looks on desktops, tablets and mobiles. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                        {{--Venedor is extremely customizable, easy to use and fully responsive.--}}
                                        {{--Suitable for every type of store. Great as a starting point for your--}}
                                        {{--custom projects. This theme includes several extensions including ajax--}}
                                        {{--price slider that will help you improve your sales. We supply a full--}}
                                        {{--help with our products and after purchase support to all our customers.--}}
                                        {{--<a href="#">Buy Venedor Theme!</a>--}}
                                     {{--</p>--}}
                                {{--</div><!-- End .col-md-7 -->--}}
                                {{--<div class="col-md-5 col-sm-5 col-xs-12">--}}
                                    {{--<div class="sm-margin visible-xs"></div><!-- space -->--}}
                                    {{--<img src="{{ url_assets('') }}/assets/topmarketmk/images/showcase.png" alt="Showcase Venedor" class="img-responsive">--}}
                                {{--</div><!-- End .col-md-5 -->--}}
                            {{--</div><!-- End .row -->--}}
                            {{--<div class="xlg-margin"></div><!-- Space -->--}}

                            <div class="hot-items carousel-wrapper">
                                <header class="content-title">
                                    <div class="title-bg">
                                        <h2 class="title">Најново</h2>
                                    </div><!-- End .title-bg -->
                                    <p class="title-desc">Најнови производи со екстремно поволни цени!</p>
                                </header>

                                <div class="carousel-controls">
                                    <div id="hot-items-slider-prev" class="carousel-btn carousel-btn-prev">
                                    </div><!-- End .carousel-prev -->
                                    <div id="hot-items-slider-next" class="carousel-btn carousel-btn-next carousel-space">
                                    </div><!-- End .carousel-next -->
                                </div><!-- End .carousel-controls -->
                                <div class="hot-items-slider owl-carousel">
                                    @if(count($newestArticles) > 0)
                                        @foreach($newestArticles as $product)
                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="{{route('product', [$product->id, $product->url])}}">
                                                    <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                                    alt="{{$product->title}}" class="item-image">
                                                    {{--<img src="{{ url_assets('') }}/assets/topmarketmk/images/products/item2.jpg" alt="item1" class="">--}}
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price"></span>мкд.</span>
                                                    <span class="item-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}<span class="sub-price">мкд.</span></span>
                                                @else
                                                    <span class="item-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price">мкд.</span></span>
                                                @endif
                                            </div><!-- End .item-price-container -->
                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                {{--<div class="discount-rect">--}}
                                                    {{--{{(int)(((EasyShop\Models\Product::getPriceRetail1($product, false, 0)-$product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%--}}
                                                {{--</div>--}}
                                            @endif
                                        </div><!-- End .item-image-wrapper -->
                                        <div style="height: 148px !important;" class="item-meta-container">
                                            <div class="item-action">

                                                <a href="" value="{{$product->id}}" data-add-to-cart="" class="item-add-btn" id="add_to_cart">
                                                    <span class="icon-cart-text">Купи</span>
                                                </a>
                                            </div><!-- End .item-action -->
                                            <br>
                                            <h3 class="item-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>

                                        </div><!-- End .item-meta-container -->
                                    </div><!-- End .item -->
                                    @endforeach
                                    @endif
                                </div><!--hot-items-slider -->

                                <div class="lg-margin"></div><!-- Space -->
                            </div><!-- End .hot-items -->
                        </div><!-- End .col-md-9 -->

                        <div class="col-md-3 col-sm-4 col-xs-12 sidebar">
                            <div class="widget testimonials">
                                <h3>ПРОМОЦИЈА</h3>

                                <div class="testimonials-slider flexslider sidebarslider">
                                    <ul class="testimonials-list clearfix">
                                        @foreach($dailyPromotionsArticles as $article)
                                            <li>
                                                <a href="{{route('product',[$article->id,$article->url])}}">
                                                        <div class="daily-promotion-product">
                                                            <img style="height: 300px !important;" class="filters" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="{{$article->title}}">
                                                            <div class="orange-opacity">
                                                                <a href="{{route('product',[$article->id,$article->url])}}">
                                                                    <h3 style="color:#84BB26" class="promotion-product-name">
                                                                        {{$article->title}}
                                                                    </h3>
                                                                </a>
                                                            </div>

                                                        </div>
                                                </a>
                                                <div class="daily-promotion-time">
                                                    <div style="margin-top: -10px;" class="product-details center">
                                                        <br>
                                                        <div class="item-action">
                                                            <a style="width:100%; text-align: center;" href="" value="{{$product->id}}" data-add-to-cart="" class="item-add-btn" id="add_to_cart">
                                                                <span class="icon-cart-text">Купи</span>
                                                            </a>
                                                        </div><!-- End .item-action -->
                                                        <h2 style="padding-bottom: 10px !important;">
                                                            {{--{{$article->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}--}}
                                                            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                                <span style="font-size:24px;color:#616161;">{{(int)EasyShop\Models\Product::getPriceRetail1($article, false, 0) }} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                <del style="font-size:16px;">{{number_format($article->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</del>
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

                                                        <span>часови</span>
                                                        <span>минути</span>
                                                        <span>секунди</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div><!-- End .testimonials-slider -->
                            </div><!-- End .widget -->

                            <div class="widget banner-slider-container">
                                <div class="banner-slider flexslider">
                                    <ul class="banner-slider-list clearfix">
                                        <li><a href="#"><img src="{{ url_assets('/topmarketmk/images/malbaner.jpg') }}" alt="Banner 1"></a></li>
                                        <li><a href="#"><img src="{{ url_assets('/topmarketmk/images/malbaner.jpg') }}" alt="Banner 2"></a></li>
                                        <li><a href="#"><img src="{{ url_assets('/topmarketmk/images/malbaner.jpg') }}" alt="Banner 3"></a></li>
                                    </ul>
                                </div>
                            </div><!-- End .widget -->
                            <div class="widget subscribe">
                                <h5>Бидите први што ќе дознаат!</h5>
                                <p>Ќе ви бидат пратени најновите производи и попусти по Email</p>
                                <form action="#" id="subscribe-form">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="subscribe-email" placeholder="Вашата емаил адреса">
                                    </div>
                                    <input type="submit" value="SUBMIT" class="btn btn-custom">
                                </form>
                            </div>

                            {{--<div class="widget latest-posts">--}}
                                {{--<h3>Latest News</h3>--}}

                                {{--<div class="latest-posts-slider flexslider sidebarslider">--}}
                                    {{--<ul class="latest-posts-list clearfix">--}}
                                        {{--<li>--}}
                                            {{--<a href="single.html">--}}
                                                {{--<figure class="latest-posts-media-container">--}}
                                                    {{--<img class="img-responsive" src="{{ url_assets('') }}/assets/topmarketmk/images/blog/post1-small.jpg" alt="lats post">--}}
                                                {{--</figure>--}}
                                            {{--</a>--}}
                                            {{--<h4><a href="single.html">35% Discount on second purchase!</a></h4>--}}
                                            {{--<p>Sed blandit nulla nec nunc ullamcorper tristique. Mauris adipiscing cursus ante ultricies dictum sed lobortis.</p>--}}
                                            {{--<div class="latest-posts-meta-container clearfix">--}}
                                                {{--<div class="pull-left">--}}
                                                    {{--<a href="#">Read More...</a>--}}
                                                {{--</div><!-- End .pull-left -->--}}
                                                {{--<div class="pull-right">--}}
                                                    {{--12.05.2013--}}
                                                {{--</div><!-- End .pull-right -->--}}
                                            {{--</div><!-- End .latest-posts-meta-container -->--}}
                                        {{--</li>--}}

                                        {{--<li>--}}
                                            {{--<a href="single.html">--}}
                                                {{--<figure class="latest-posts-media-container">--}}
                                                    {{--<img class="img-responsive" src="{{ url_assets('') }}/assets/topmarketmk/images/blog/post2-small.jpg" alt="lats post">--}}
                                                {{--</figure>--}}
                                            {{--</a>--}}
                                            {{--<h4><a href="single.html">Free shipping for regular customers.</a></h4>--}}
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque fuga officia in molestiae easint..</p>--}}
                                            {{--<div class="latest-posts-meta-container clearfix">--}}
                                                {{--<div class="pull-left">--}}
                                                    {{--<a href="#">Read More...</a>--}}
                                                {{--</div><!-- End .pull-left -->--}}
                                                {{--<div class="pull-right">--}}
                                                    {{--10.05.2013--}}
                                                {{--</div><!-- End .pull-right -->--}}
                                            {{--</div><!-- End .latest-posts-meta-container -->--}}
                                        {{--</li>--}}

                                        {{--<li>--}}
                                            {{--<a href="single.html">--}}
                                                {{--<figure class="latest-posts-media-container">--}}
                                                    {{--<img class="img-responsive" src="{{ url_assets('') }}/assets/topmarketmk/images/blog/post3-small.jpg" alt="lats post">--}}
                                                {{--</figure>--}}
                                            {{--</a>--}}
                                            {{--<h4><a href="#">New jeans on sales!</a></h4>--}}
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque fuga officia in molestiae easint..</p>--}}
                                            {{--<div class="latest-posts-meta-container clearfix">--}}
                                                {{--<div class="pull-left">--}}
                                                    {{--<a href="#">Read More...</a>--}}
                                                {{--</div><!-- End .pull-left -->--}}
                                                {{--<div class="pull-right">--}}
                                                    {{--8.05.2013--}}
                                                {{--</div><!-- End .pull-right -->--}}
                                            {{--</div><!-- End .latest-posts-meta-container -->--}}
                                        {{--</li>--}}

                                    {{--</ul>--}}
                                {{--</div><!-- End .latest-posts-slider -->--}}
                            {{--</div><!-- End .widget -->--}}



                        </div><!-- End .col-md-3 -->
                    </div><!-- End .row -->

                    <div id="brand-slider-container" class="carousel-wrapper">
                        <header class="content-title">
                            <div class="title-bg">
                                <h2 class="title">Препорачано</h2>
                                <p class="title-desc">Погледнете ги нашите препораки</p>
                            </div><!-- End .title-bg -->
                        </header>
                        <div class="carousel-controls">
                            <div id="brand-slider-prev" class="carousel-btn carousel-btn-prev">
                            </div><!-- End .carousel-prev -->
                            <div id="brand-slider-next" class="carousel-btn carousel-btn-next carousel-space">
                            </div><!-- End .carousel-next -->
                        </div><!-- End .carousel-controllers -->
                        <div class="sm-margin"></div><!-- space -->
                        <div class="row">
                            <div class="brand-slider owl-carousel">
                                @foreach($recommendedArticles as $product)
                                    <div class="item item-hover">
                                        <div class="item-image-wrapper">
                                            <figure class="item-image-container">
                                                <a href="{{route('product', [$product->id, $product->url])}}">
                                                    <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                                         alt="{{$product->title}}" class="item-image">
                                                    {{--<img src="{{ url_assets('') }}/assets/topmarketmk/images/products/item2.jpg" alt="item1" class="">--}}
                                                </a>
                                            </figure>
                                            <div class="item-price-container">
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price"></span>мкд.</span>
                                                    <span class="item-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}<span class="sub-price">мкд.</span></span>
                                                @else
                                                    <span class="item-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price">мкд.</span></span>
                                                @endif
                                            </div><!-- End .item-price-container -->
                                            {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                            {{--<div class="discount-rect">--}}
                                            {{--{{(int)(((EasyShop\Models\Product::getPriceRetail1($product, false, 0)-$product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%--}}
                                            {{--</div>--}}
                                            {{--@endif--}}
                                        </div><!-- End .item-image-wrapper -->
                                        <div style="    height: 148px;" class="item-meta-container">
                                            <div class="item-action">

                                                <a href="" value="{{$product->id}}" data-add-to-cart="" class="item-add-btn" id="add_to_cart">
                                                    <span class="icon-cart-text">Купи</span>
                                                </a>
                                            </div><!-- End .item-action -->
                                            <br>
                                            <h3 class="item-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>

                                        </div><!-- End .item-meta-container -->
                                    </div><!-- End .item -->
                                @endforeach
                            </div><!-- End .brand-slider -->
                        </div><!-- End .row -->
                    </div><!-- End #brand-slider-container -->

                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

    </section><!-- End #content -->

@endsection