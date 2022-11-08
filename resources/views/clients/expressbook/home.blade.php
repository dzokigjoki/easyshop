@extends('clients.expressbook.layouts.default')

@section('content')

    <div class="home-page">
        <div class="content">

            <div class="hidden-xs hidden-sm home-slider outer-bottom-vs">
                <!-- ========================================== SECTION – HERO : START ========================================= -->
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-theme">
                        @foreach($bestSellersArticles as $product)
                            @if($product->is_exclusive)
                        <div class="item">
                            <div class="container">
                                <div class="content">
                                            <div class="row">
                                                <div class="col-md-7 col-sm-12 col-xs-12">
                                                    <div class="book-in-shelf">
                                                        <div class="book-shelf">
                                                            <a href="{{route('product', [$product->id, $product->url])}}" role="button">
                                                            <div class="book-cover slider-book-cover bk-cover m-t-20">
                                                                {{--<img class="img-responsive" alt=""--}}
                                                                {{--src="https://expressbook.mk/uploads/products/11/lg_582c5a4174e0b.jpg"--}}
                                                                {{--data-echo="https://expressbook.mk/uploads/products/11/lg_582c5a4174e0b.jpg">--}}
                                                                <img class="img-responsive" src="{{\ImagesHelper::getProductImage($product)}}" alt=""/>
                                                                <div class="fade"></div>
                                                            </div> <!-- /.book-cover -->
                                                            </a>
                                                        </div><!-- /.book-shelf -->
                                                    </div><!-- /.book-in-shelf -->
                                                </div><!-- /.col -->
                                                <div class="col-md-5 col-sm-12 col-xs-12">
                                                    <div class="clearfix caption vertical-center text-left">
                                                        <div class="slider-caption-heading">
                                                            <h1 class="slider-title">
                                                                <span class="fadeInDown-1 main">{{$product -> title}} </span>
                                                                <span class="fadeInDown-2 sub">e {{$product -> short_description}}</span>
                                                            </h1>
                                                        </div><!-- /.slider-caption-heading -->
                                                        <div class="clearfix slider-button hidden-xs fadeInDown-3">
                                                            <a class="btn btn-primary btn-uppercase"
                                                               href="{{route('product', [$product->id, $product->url])}}"
                                                               role="button">дознај
                                                                повеќе</a>
                                                        </div> <!-- /.slider-price -->
                                                    </div><!-- /.slider-caption -->
                                                </div><!-- /.col -->
                                            </div>

                                </div><!-- /.content.caption -->
                            </div><!-- /.container -->
                        </div><!-- /.item -->
                            @endif
                        @endforeach
                        {{--<div class="item">--}}
                            {{--<div class="container">--}}
                                {{--<div class="content">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-7 col-sm-12 col-xs-12">--}}
                                            {{--<div class="book-in-shelf">--}}
                                                {{--<div class="book-shelf">--}}
                                                    {{--<div class="book-cover slider-book-cover bk-cover m-t-20">--}}
                                                        {{--<img class="img-responsive" alt=""--}}
                                                             {{--src="https://expressbook.mk/uploads/products/11/lg_582c5a4174e0b.jpg"--}}
                                                             {{--data-echo="https://expressbook.mk/uploads/products/11/lg_582c5a4174e0b.jpg">--}}
                                                        {{--<div class="fade"></div>--}}
                                                    {{--</div> <!-- /.book-cover -->--}}
                                                {{--</div><!-- /.book-shelf -->--}}
                                            {{--</div><!-- /.book-in-shelf -->--}}
                                        {{--</div><!-- /.col -->--}}
                                    {{--</div>--}}
                                {{--</div><!-- /.content.caption -->--}}
                            {{--</div><!-- /.container -->--}}
                        {{--</div><!-- /.item -->--}}

                    </div><!-- /# owl-main -->
                </div><!-- /#hero -->
                <!-- ========================================== SECTION – HERO : END ========================================= -->
            </div><!-- /.home-slider -->

            <div class="container">
                <!-- ============================================== BANNERS ============================================== -->
                <div class="wide-banners wow fadeInUp">
                    <div class="row">


                        {{--<div class="col-md-4 hidden-sm col-md-offset-4">--}}

                            {{--<div class="wide-banner cnt-strip">--}}
                                {{--<div class="image">--}}
                                    {{--<img class="img-responsive"--}}
                                         {{--src="/assets/expressbook/assets/images/wide-banners/banner1.png" alt="">--}}
                                {{--</div>--}}
                                {{--<div class="strip on-strip strip-text">--}}
                                    {{--<div class="strip-inner text-center">--}}
                                        {{--<h2 class="title">Распродажба</h2>--}}
                                        {{--<p class='subtitle'>До 35%</p>--}}
                                    {{--</div><!-- /.strip-inner -->--}}
                                {{--</div><!-- /.strip -->--}}

                            {{--</div><!-- /.wide-banner -->--}}

                        {{--</div>--}}
                        {{----}}













                        <!-- /.col -->

                        {{--<div class="col-md-4 hidden-sm">--}}

                        {{--<div class="wide-banner cnt-strip">--}}
                        {{--<div class="image">--}}
                        {{--<img class="img-responsive"--}}
                        {{--src="/assets/expressbook/assets/images/wide-banners/banner1.png" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="strip on-strip strip-text">--}}
                        {{--<div class="strip-inner text-center">--}}
                        {{--<h2 class="title">Placeholder</h2>--}}
                        {{--<p class='subtitle'></p>--}}
                        {{--</div><!-- /.strip-inner -->--}}
                        {{--</div><!-- /.strip -->--}}

                        {{--</div><!-- /.wide-banner -->--}}

                        {{--</div><!-- /.col -->--}}


                        {{--<div class="col-md-4 hidden-sm">--}}

                        {{--<div class="wide-banner cnt-strip">--}}
                        {{--<div class="image">--}}
                        {{--<img class="img-responsive"--}}
                        {{--src="/assets/expressbook/assets/images/wide-banners/banner1.png" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="strip on-strip strip-text">--}}
                        {{--<div class="strip-inner text-center">--}}
                        {{--<h2 class="title">Нашиот блог</h2>--}}
                        {{--<p class='subtitle'></p>--}}
                        {{--</div><!-- /.strip-inner -->--}}
                        {{--</div><!-- /.strip -->--}}

                        {{--</div><!-- /.wide-banner -->--}}

                        {{--</div><!-- /.col -->--}}


                    </div><!-- /.row -->
                </div><!-- /.wide-banners -->
                <!-- ============================================== BANNERS : END ============================================== -->
                {{--<div class="divider inner-vs">--}}
                    {{--<img class="img-responsive" src="/assets/expressbook/assets/images/shadow.png" alt="">--}}
                {{--</div><!-- /.divider -->--}}

                <!-- ============================================== BEST SELLER ============================================== -->
                <section class="best-seller wow fadeInUp">
                    <div id="best-seller" class="module">
                        <div class="module-heading home-page-module-heading">
                            <h2 class="module-title home-page-module-title"><span>Најпродавани книги</span></h2>
                        </div><!-- /.module-heading -->
                        <div class="module-body">
                            <div class="row books full-width">
                                <div class="clearfix text-center">
                                    @foreach($bestSellersArticles as $product)
                                        <div class="col-md-3 col-sm-6">
                                            <div class="book">
                                                <a href="{{route('product', [$product->id, $product->url])}}">
                                                    <div class="containerce book-cover">
                                                        <img class="slika" width="140" height="212" alt=""
                                                             src="{{\ImagesHelper::getProductImage($product)}}"
                                                             data-echo="{{\ImagesHelper::getProductImage($product)}}">
                                                        {{--<div class="tag">--}}
                                                        {{--<span>Најпродавано</span>--}}
                                                        {{--</div>--}}
                                                        <div class="middle">
                                                            <a href="{{route('product', [$product->id, $product->url])}}" class="text">Прегледај</a>
                                                        </div>
                                                    </div>
                                                    <div class="book-details clearfix">
                                                        <div class="book-description">
                                                            <h3 class="book-title"><a href="/">{{$product->title}}</a>
                                                            </h3>
                                                            <p class="book-subtitle">{{$product->short_description}}</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="actions">
                                                                <span class="book-price price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                    ден.</span>
                                                                <div class="cart-action">
                                                                    <a class="add-to-cart" title="Додади во кошничка"
                                                                       value="{{$product->id}}" data-add-to-cart=""
                                                                       href="">Додади во кошничка</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{--<div class="view-more-holder col-md-12 center-block text-center inner-top-xs">--}}
                                {{--<a role="button" class="btn btn-primary btn-uppercase" href="#">Види ги сите--}}
                                {{--најпродавани--}}

                                {{--</a>--}}
                                {{--</div>--}}


                            </div>
                        </div>
                    </div>
                </section>
                <!-- ============================================== BEST SELLER : END ============================================== -->
            </div><!-- /.container -->

            <!-- ============================================== TESTIMONIAL ============================================== -->
            <section class="customer-testimonial wow fadeInUp outer-bottom-xs light-bg">
                <div id="latest-product" class="module container inner-top-xs">
                    <div class="module-heading home-page-module-heading inner-bottom-vs">
                        <h2 class="module-title home-page-module-title"><span>Најнови книги</span></h2>
                    </div>
                    <div class="module-body">
                        <!-- ============================================== LATEST PRODUCT ============================================== -->

                        <div class="book-shelf inner-bottom glass-shelf">
                            <div class="row">
                                <div class="col-md-10 col-sm-10 center-block clearfix">
                                    @foreach($newestArticles as $article)
                                        <div class="col-md-3 col-sm-4 hidden-xs">
                                            <div class="book-cover bk-cover product-book-cover">
                                                <img class="img-responsive" alt=""
                                                     src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                     data-echo="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                     width="182" height="273">
                                                <div class="fade"></div>
                                            </div> <!-- /.book-cover -->
                                        </div><!-- /.col -->
                                        <!-- /.col -->
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- ============================================== LATEST PRODUCT : END ============================================== -->

                    </div>
                </div>
            </section>
            <!-- ============================================== TESTIMONIAL : END ============================================== -->
            <div class="container">
                <section class="best-seller wow fadeInUp">
                    <div id="best-seller" class="module">
                        <div class="module-heading home-page-module-heading">
                            <h2 class="module-title home-page-module-title"><span>Книги на месецот</span></h2>
                        </div><!-- /.module-heading -->
                        <div class="module-body">
                            <div class="row books full-width">
                                <div class="clearfix text-center">
                                    @foreach($recommendedArticles as $product)
                                        <div class="col-md-3 col-sm-6">
                                            <div class="book">
                                                <a href="{{route('product', [$product->id, $product->url])}}">
                                                    <div class="containerce book-cover">
                                                        <img class="slika" width="140" height="212" alt=""
                                                             src="{{\ImagesHelper::getProductImage($product)}}"
                                                             data-echo="{{\ImagesHelper::getProductImage($product)}}">
                                                        {{--<div class="tag">--}}
                                                        {{--<span>Најпродавано</span>--}}
                                                        {{--</div>--}}
                                                        <div class="middle">
                                                            <a href="{{route('product', [$product->id, $product->url])}}" class="text">Прегледај</a>
                                                        </div>
                                                    </div>

                                                    <div class="book-details clearfix">
                                                        <div class="book-description">
                                                            <h3 class="book-title"><a href="/">{{$product->title}}</a>
                                                            </h3>
                                                            <p class="book-subtitle">{{$product->short_description}}</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="actions">
                                                                <span class="book-price price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                    ден.</span>
                                                                <div class="cart-action">
                                                                    <a class="add-to-cart" title="Додади во кошничка"
                                                                       value="{{$product->id}}" data-add-to-cart=""
                                                                       href="">Додади во кошничка</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </a></div>
                                        </div>
                                    @endforeach
                                </div>
                                {{--<div class="view-more-holder col-md-12 center-block text-center inner-top-xs">--}}
                                {{--<a role="button" class="btn btn-primary btn-uppercase" href="#">Види ги сите--}}
                                {{--најпродавани--}}

                                {{--</a>--}}
                                {{--</div>--}}


                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- ============================================== FROM BLOG ============================================== -->

            <!-- ============================================== FROM BLOG : END ============================================== -->
        </div><!-- /.content -->
    </div><!-- /.home-page -->

@endsection


@section('scripts')
@endsection