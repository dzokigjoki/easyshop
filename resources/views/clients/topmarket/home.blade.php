@extends('clients.topmarket.layouts.default')
@section('content')

    <br>
    <div class="row">
        <!-- col-center -->
        <div class="col-sm-12 col-md-12 col-lg-9">
            <div id="slider-rev-container" class="panel panel-default">
                <div id="slider-rev">
                    <ul>
                        <li data-transition="fade" data-saveperformance="on" data-title="">
                            <a href="https://topmarket.mk/p/17/akciona-kamera-hd-1080"> <img
                                        src="/assets/topmarket/images/baner-golem-1.jpg"
                                        style="background-color:#f1f6f7; margin:0 auto;height: 305px;">
                            </a>
                        </li>

                        <li data-transition="fade" data-saveperformance="on" data-title="">
                            <a href="https://topmarket.mk/p/3/relaks-masazer-5-vo-1"><img
                                        src="/assets/topmarket/images/golem-baner-2.jpg "
                                        style="background-color:#f1f6f7; margin: 0 auto;height: 305px;">
                            </a>
                        </li>

                        <li data-transition="fade" data-saveperformance="on" data-title="">
                            <a href="https://topmarket.mk/p/7/bezzichen-rotirachki-chistach"><img
                                        src="/assets/topmarket/images/baner-golem-3.jpg"
                                        style="background-color:#f1f6f7; margin: 0 auto; height: 305px;">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End #slider-rev -->

            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 panel panel-default">
            <a href="https://topmarket.mk/p/18/ubl-bluetooth-prenosliv-zvuchnik"><img
                        src="/assets/topmarket/images/dnevna-ponuda.jpg" id="daily-pic"
                        style="background-color:#f1f6f7"></a>
        </div>
    </div>



    {{--Pocetok  na najnovo--}}
    <div class="col-md-12" id="najnovo">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 main-content">
                <div class="lg-margin"></div><!-- space -->
                <div class="latest-items carousel-wrapper">
                    <header class="content-title">
                        <div class="title-bg">
                            <h2 class="title">Најново</h2>
                        </div><!-- End .title-bg -->
                    </header>
                    <div class="carousel-controls">
                        <div id="latest-items-slider-prev" class="carousel-btn carousel-btn-prev">
                        </div><!-- End .carousel-prev -->
                        <div id="latest-items-slider-next"
                             class="carousel-btn carousel-btn-next carousel-space">
                        </div><!-- End .carousel-next -->
                    </div><!-- End .carousel-controls -->

                    <div class="latest-items-slider owl-carousel">
                        @foreach($newestArticles as $articles)
                            @foreach ($articles as $article)
                                <div class="item item-hover">
                                    <div class="item-image-wrapper ">
                                        <figure class="item-image-container panel panel-default">
                                            <a href="{{route('product', [$article->id, $article->url])}}">
                                                <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                     class="item-image">
                                                <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                     class="item-image-hover"></a>
                                        </figure>

                                        {{--<span class="new-rect">Ново</span>--}}
                                    </div><!-- End .item-image-wrapper -->

                                    <!-- End .rating-container -->
                                    <h3 style="text-align: center" class="item-name"><a
                                                href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                    </h3>

                                    <div class="product-price" style="text-align: center">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <span class="product-price-new-home" style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                            <span style="text-decoration: line-through; color: #000000; font-weight: bold">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                        @else


                                            <span class="product-price-new-home" style="font-weight: bold;"> <span
                                                        id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                        @endif
                                    </div>

                                    <div style="text-align: center">
                                        <button id="buy_home" data-add-to-cart="" class="btn btn-custom-2" type="button"
                                                value="{{$article->id}}" onClick=""><span>Нарачај тука</span></button>

                                    </div>
                                    <!-- End .item-action -->
                                    <!-- End .item-meta-container -->
                                </div><!-- End .item -->
                                <!-- End .item -->
                        @endforeach
                    @endforeach<!-- End .item -->

                        <!-- End .item-action-inner -->
                    </div><!-- End .item-action -->
                </div><!-- End .item-meta-container -->
            </div><!-- End .item -->
        </div><!--latest-items-slider -->
    </div>
    {{--Kraj na najnovo--}}<br><br>

    <a style="" href="https://topmarket.mk/p/18/ubl-bluetooth-prenosliv-zvuchnik"><img
                class="small-under-banner panel panel-default" src="/assets/topmarket/images/baner-mal-1.jpg"></a>
    <a style="" href="https://topmarket.mk/p/12/magic-bullet-blender-so-17-delovi"><img
                class="small-under-banner panel panel-default" src="/assets/topmarket/images/baner-mal-2.jpg"></a>
    <a style="" href="https://topmarket.mk/p/39/pameten-chasovnik-smartwatch"> <img
                class="small-under-banner panel panel-default" src="/assets/topmarket/images/baner-mal-3.jpg"></a>
    <a style="" href="https://topmarket.mk/p/32/nova-pegla-za-kosa-2-vo-1"> <img class="small-under-banner panel panel-default"
                                                                        src="/assets/topmarket/images/baner-mal-4.jpg"></a>



    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 main-content">
                <!-- End .home-banners -->

                <div class="lg-margin"></div><!-- space -->

                <div class="latest-items carousel-wrapper">
                    <header class="content-title">
                         <div class="title-bg">
                            <h2 class="title">Најпродавано</h2>
                        </div><!-- End .title-bg -->

                    </header>

                    <div class="carousel-controls" id="najprodavano-controls">
                        <div id="hot-items-slider-prev" class="carousel-btn carousel-btn-prev">
                        </div><!-- End .carousel-prev -->
                        <div id="hot-items-slider-next"
                             class="carousel-btn carousel-btn-next carousel-space">
                        </div><!-- End .carousel-next -->
                    </div><!-- End .carousel-controls -->
                    <div class="margin-lg"></div>
                    <div class="hot-items-slider owl-carousel">
                        @foreach($bestSellersArticles as $articles)
                            @foreach ($articles as $article)
                                <div class="item item-hover">
                                    <div class="item-image-wrapper">
                                        <figure class="item-image-container panel panel-default">
                                            <a href="{{route('product', [$article->id, $article->url])}}">
                                                <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"

                                                     class="item-image">
                                                <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                     class="item-image-hover"></a>
                                        </figure>

                                        {{--<span class="new-rect">Најпродавано</span>--}}
                                    </div><!-- End .item-image-wrapper -->

                                    <!-- End .rating-container -->
                                    <h3 class="item-name" style="text-align: center"><a
                                                href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                    </h3>

                                    <div class="product-price" style="text-align: center">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <span class="product-price-new-home" style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                            <span style="text-decoration: line-through; color: #000000; font-weight: bold">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                        @else


                                            <span class="product-price-new-home" style="font-weight: bold;"> <span
                                                        id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                        @endif
                                    </div>
                                    <div style="text-align: center">

                                        <div style="text-align: center">
                                            <button id="buy_home" data-add-to-cart="" class="btn btn-custom-2"
                                                    type="button" value="{{$article->id}}" onClick="">
                                                <span>Нарачај тука</span></button>

                                        </div>
                                    </div>


                                    <!-- End .item-action -->
                                    <!-- End .item-meta-container -->
                                </div><!-- End .item -->

                                <!-- End .item -->
                        @endforeach
                    @endforeach<!-- End .item -->

                        <!-- End .item-action-inner -->
                    </div><!-- End .item-action -->
                </div><!-- End .item-meta-container -->
            </div><!-- End .item -->
        </div><!--latest-items-slider -->
    </div>


    <div class="container offset-0">
        <div class="row">
            <header class="content-title">
                {{--<div class="title-bg">--}}
                    <h2>Совети</h2>
                {{--</div><!-- End .title-bg -->--}}
            </header>

            @foreach($lastBlogs as $blog)
                {{--<div class="col-md-4">--}}
                <div class="col-xs-12 col-sm-4">

                        <a class="item-image-hover" href="{{route('blog', [$blog->id,$blog->url])}}">
                            <img class="panel panel-default" src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}"
                                 alt="{{$blog->title}}">
                        </a>

                    <a href="{{route('blog', ['id'=>$blog->id, 'url'=>$blog->url])}}"><h3>{{$blog->title}}</h3></a>
                    <p>
                        {{$blog->short_description}}
                    </p>
                </div>
                {{--</div>--}}
            @endforeach
        </div>
    </div>


    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 main-content">
                <div class="lg-margin"></div><!-- space -->
                <div class="purchased-items-container carousel-wrapper">
                    <header class="content-title">
                        <div class="title-bg">
                            <h2 class="title">Препорачано</h2>
                        </div><!-- End .title-bg -->
                    </header>
                    <div class="carousel-controls" id="preporacano-controls">
                        <div id="purchased-items-slider-prev" class="carousel-btn carousel-btn-prev">
                        </div><!-- End .carousel-prev -->
                        <div id="purchased-items-slider-next" class="carousel-btn carousel-btn-next carousel-space">
                        </div><!-- End .carousel-next -->
                    </div><!-- End .carousel-controls -->

                    <div class="purchased-items-slider owl-carousel">
                        @foreach($recommendedArticles as $articles)
                            @foreach ($articles as $article)
                                <div class="item item-hover">
                                    <div class="item-image-wrapper ">
                                        <figure class="item-image-container panel panel-default">
                                            <a href="{{route('product', [$article->id, $article->url])}}">
                                                <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"

                                                     class="item-image">
                                                <img src="{{\ImagesHelper::getProductImage($article,null,'lg_' )}}"
                                                     class="item-image-hover"></a>
                                        </figure>

                                        {{--<span class="new-rect">Најпродавано</span>--}}
                                    </div><!-- End .item-image-wrapper -->

                                    <!-- End .rating-container -->
                                    <h3 class="item-name" style="text-align: center"><a
                                                href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                    </h3>
                                    <div class="product-price" style="text-align: center">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <span class="product-price-new-home" style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                            <span style="text-decoration: line-through; color: #000000; font-weight: bold">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                        @else


                                            <span class="product-price-new-home" style="font-weight: bold;"> <span
                                                        id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                        @endif
                                    </div>

                                    <div style="text-align: center">
                                        <button id="buy_home" data-add-to-cart="" class="btn btn-custom-2" type="button"
                                                value="{{$article->id}}" onClick=""><span>Нарачај тука</span></button>

                                    </div>
                                    <!-- End .item-action -->
                                    <!-- End .item-meta-container -->
                                </div><!-- End .item -->

                                <!-- End .item -->
                        @endforeach
                    @endforeach<!-- End .item -->

                        <!-- End .item-action-inner -->
                    </div><!-- End .item-action -->
                </div><!-- End .item-meta-container -->
            </div><!-- End .item -->
        </div>
    </div>
@endsection
