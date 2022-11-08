@extends('clients.drbrowns.layouts.default')
@section('content')
    <div class="home-slider fadeInUp ">
        <div class="flexslider loading">
            <ul class="slides">
                <li>
                    <a href="#"><img src="{{ url_assets('/drbrowns/images/happy-feeding-drbrowns-slider.jpg') }}"
                            alt="Classic Vanilla Cone" /></a>

                    <!--<div class="slide-description container ">-->

                    <!--<h2>Classic Vanilla Cone</h2>-->

                    <!--<div class="separator"></div>-->

                    <!--<p>Lorem ipsum dolor sit amet consectetuer adipiscing elie sed diam </p>-->

                    <!--<a class="btn btn-default" href="#any-link-can-go-here">EXPLORE MORE</a>-->

                    <!--</div>-->
                </li>
                <li>
                    <a href="#"><img src="{{ url_assets('/drbrowns/images/baner.jpg') }}" alt="Amazing Waffle Cone" /></a>

                    <!--<div class="slide-description container ">-->

                    <!--&lt;!&ndash;<h2>Amazing Waffle Cone</h2>&ndash;&gt;-->

                    <!--&lt;!&ndash;<div class="separator"></div>&ndash;&gt;-->

                    <!--&lt;!&ndash;<p>Lorem ipsum dolor sit amet consectetuer adipiscing elie sed</p>&ndash;&gt;-->

                    <!--&lt;!&ndash;<a href="#any-link-can-go-here">EXPLORE MORE</a>&ndash;&gt;-->

                    <!--</div>-->
                </li>
            </ul>
        </div>
    </div>
    <section class="hidden-xs home-services-section clearfix">

        <div class="curve"></div>
        <div style="padding:15px;" class="section-top">

            <div class="container">

                <header class="section-header">

                    <!--<h2 class="section-title fade-in-up ">Why Cream</h2><p class="fade-in-up ">Features section is flexible to handle any number of features</p>-->
                </header>

            </div>

        </div>


        {{-- <div class="hidden-xs section-bottom"> --}}

        {{-- <div class="container"> --}}

        {{-- <div class="row"> --}}

        {{-- <article class="service col-md-3 col-sm-6 col-xs-12 fade-in-left "> --}}
        {{-- <div class="img-frame"> --}}
        {{-- <figure> --}}
        {{-- <a href="#elegant-design" title="Elegant Designs"> --}}
        {{-- <img src="{{ url_assets('/drbrowns/images/cucla.png') }}" alt="Elegant Designs"/></a>                                    </figure> --}}
        {{-- </div> --}}
        {{-- <h3><a href="#elegant-design" title="Elegant Designs">Цуцли</a></h3> --}}
        {{-- </article> --}}
        {{-- <article class="service col-md-3 col-sm-6 col-xs-12 fade-in-up "> --}}
        {{-- <div class="img-frame"> --}}
        {{-- <figure> --}}
        {{-- <a href="#ice-cream-delicacy" title="Ice Cream Delicacy"> --}}
        {{-- <img src="{{ url_assets('/assets/drbrowns/images/bottle.png') }}" alt="Elegant Designs"/></a>                                    </figure> --}}
        {{-- </figure> --}}
        {{-- </div> --}}
        {{-- <h3><a href="#ice-cream-delicacy" title="Ice Cream Delicacy">Шишенца</a></h3> --}}
        {{-- </article> --}}
        {{-- <div class="clearfix visible-sm"></div> --}}
        {{-- <article class="service col-md-3 col-sm-6 col-xs-12 fade-in-up "> --}}
        {{-- <div class="img-frame"> --}}
        {{-- <figure> --}}
        {{-- <a href="#enriched-taste" title=" Enriched Taste"> --}}
        {{-- <img src="{{ url_assets('/assets/drbrowns/images/nega.png') }}" alt="Elegant Designs"/></a>                                    </figure> --}}
        {{-- </figure> --}}
        {{-- </div> --}}
        {{-- <h3><a href="#enriched-taste" title=" Enriched Taste">Нега</a></h3> --}}
        {{-- </article> --}}
        {{-- <article class="service col-md-3 col-sm-6 col-xs-12 fade-in-right "> --}}
        {{-- <div class="img-frame"> --}}
        {{-- <figure> --}}
        {{-- <a href="#home-delivery" title="Home Delivery"> --}}
        {{-- <img src="{{ url_assets('/assets/drbrowns/images/bear.png') }}" alt="Elegant Designs"/></a>                                    </figure> --}}
        {{-- </figure> --}}
        {{-- </div> --}}
        {{-- <h3><a href="#home-delivery" title="Home Delivery">Доење</a></h3> --}}
        {{-- </article> --}}
        {{-- <div class="clearfix visible-lg"></div> --}}
        {{-- <div class="clearfix visible-md"></div> --}}
        {{-- <div class="clearfix visible-sm"></div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}

    </section>
    <div style="margin-top: 20px;">
        <img style="width: 100%;" src="{{ url_assets('/drbrowns/images/banner2.jpg') }}">
    </div>

    <section class="home-testimonial-section">
        <div style="margin-top:-70px;" class="home-products">

            <div class="container text-center">
                <div class="row">
                    <h2 class="section-title fade-in-up ">Најпродавани продукти</h2>
                </div>
            </div>

            <div class="container fade-in-up ">

                <div class="woocommerce columns-4">

                    <div class="row product-listing">
                        @if (count($bestSellersArticles) > 0)
                            @foreach ($bestSellersArticles as $product)
                                <div style="" class="item col-md-3 col-xs-6 first fadeInUp">
                                    <article>
                                        <figure>
                                            <a href="{{ route('product', [$product->id, $product->url]) }}">
                                                <img style="min-height:300px; min-width:300px;"
                                                    src="{{ \ImagesHelper::getProductImage($product, null, 'lg_') }}"
                                                    class="img-responsive" alt="{{ $product->title }}">
                                            </a>
                                            <figcaption>
                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                    <span class="product-price price" style="font-weight: bold;">
                                                        <span
                                                            id="current_price">{{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                                                            <span
                                                                class="price_currency">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span>
                                                    </span>

                                                    <span
                                                        style="text-decoration: line-through; color: red; font-weight: bold; font-size: 16px; ">
                                                        <span
                                                            style="color: #1481BD; font-weight: bold">{{ number_format($product->$myPriceGroup, 0, ',', '.') }}
                                                            <span
                                                                class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span>
                                                        </span></span>


                                                @else


                                                    <span class="product-price price" style="font-weight: bold;"> <span
                                                            id="current_price">{{ number_format($product->$myPriceGroup, 0, ',', '.') }}
                                                            <span
                                                                class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span></span>

                                                @endif
                                            </figcaption>
                                        </figure>
                                        <br>
                                        <button value="{{ $product->id }}" data-add-to-cart="" id="add_to_cart"
                                            class="button add_to_cart_button product_type_simple">Додади во Кошничка
                                        </button>
                                        <h4 class="title">
                                            <a
                                                href="{{ route('product', [$product->id, $product->url]) }}">{{ $product->title }}</a>
                                        </h4>
                                    </article>
                                </div>
                            @endforeach
                        @endif

                    </div>

                </div>
            </div>
            <!-- end of container -->

        </div><!-- end of home-products -->

        <div class="container">
            <!--<header class="section-header">-->
            <!--<h2 class="section-title fade-in-up ">LATKOSKI</h2>-->
            <!--<p class="fade-in-up ">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy nibh euismod</p>-->
            <!--</header>-->
            <div class="testimonial-carousel-nav">
                <!--<a class="carousel-prev-item prev"></a>-->
                <!--<a class="carousel-next-item next"></a>-->
            </div>
        </div>
    </section>
    <section1>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <video src="{{ url_assets('/drbrowns/images/happyfeedingslide.mp4') }}" loop autoplay muted width="100%" height="auto">
                    </video>
                </div>
            </div>
        </div>
    </section1>
    {{-- <div class="service-plans"> --}}

    {{-- <div class="container"> --}}
    {{-- <header class="section-header"> --}}
    {{-- <!--<h2 class="section-title fade-in-up ">Our Services</h2>--> --}}
    {{-- <h2 style="color: white !important;" class="fade-in-up ">Совети за вашето бебе</h2> --}}
    {{-- </header> --}}
    {{-- </div> --}}

    {{-- <div class="container"> --}}

    {{-- <div class="whiteBlogs row"> --}}
    {{-- @foreach ($lastBlogs as $blog) --}}
    {{-- <section class="col-md-4 col-sm-6 col-xs-12 fade-in-left "> --}}
    {{-- <div class="image-container"> --}}
    {{-- <a class="whiteBlogs overlay-link" --}}
    {{-- href="{{route('blog', [$blog->id, $blog->url])}}"> --}}
    {{-- <img style="max-width: 200px; max-height:320px;" --}}
    {{-- src="{{\ImagesHelper::getBlogImage($blog,null,'lg_')}}" --}}
    {{-- class="item-image"> --}}
    {{-- </a> --}}
    {{-- </div> --}}
    {{-- <h3 style="min-height:50px;" class="title"><a class="whiteBlogs" href="{{route('blog', [$blog->id, $blog->url])}}"> --}}
    {{-- {{$blog ->title}} --}}
    {{-- </a></h3> --}}
    {{-- <br> --}}
    {{-- <p>{{$blog -> short_description}}</p> --}}
    {{-- </section> --}}

    {{-- @endforeach --}}
    {{-- <div class="clearfix visible-lg"></div> --}}
    {{-- <div class="clearfix visible-md"></div> --}}

    {{-- </div> --}}

    {{-- </div> --}}

    {{-- </div><!-- end of services section --> --}}
    <section style="margin-top:-45px; background-color: white !important;" class="home-testimonial-section home-work-section clearfix">
        <!--<div class="container">-->
        <!--<header class="section-header">-->
        <!--<h2 class="section-title fade-in-up ">За нас!</h2>-->
        <!--<p class="fade-in-up ">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy nibh euismod</p>-->
        <!--</header>-->
        <!--</div>-->
        {{-- <div class="carousel-wrapper"> --}}
        {{-- <div class="work-items-carousel fade-in-up "> --}}
        {{-- <div class="work-snippet"> --}}
        {{-- <article class="clearfix"> --}}
        {{-- <img src="images/temp-images/home-portfolio-img.jpg" alt="Various Cupcakes Designs"/> --}}
        {{-- <div class="overly"> --}}
        {{-- <h4><a href="#">Various Cupcakes Designs</a></h4> --}}
        {{-- <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit, Duis&hellip;</p> --}}
        {{-- <a class="preview-icon" data-imagelightbox="lightbox" href="images/temp-images/home-portfolio-img.jpg"><i class="fa fa-search"></i></a> --}}
        {{-- <a class="link-icon" href="#"><i class="fa fa-link"></i></a> --}}
        {{-- </div> --}}
        {{-- </article> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <div class="home-products">

            <div class="container text-center">
                <div class="row">
                    <h2 class="section-title fade-in-up ">Препорачани продукти</h2>
                </div>
            </div>

            <div class="container fade-in-up ">

                <div class="woocommerce columns-4">

                    <div class="row product-listing">
                        @foreach ($recommendedArticles as $article)
                            <div style="" class="item col-md-3 col-xs-6 first fadeInUp">
                                <article>
                                    <figure>
                                        <a href="{{ route('product', [$article->id, $article->url]) }}">
                                            <img style="min-height:300px; min-width:300px;"
                                                src="{{ \ImagesHelper::getProductImage($article, null, 'lg_') }}"
                                                class="img-responsive" alt="{{ $article->title }}">
                                        </a>
                                        <figcaption>
                                            @if (EasyShop\Models\Product::hasDiscount($article->discount))
                                                <span class="product-price price" style="font-weight: bold;">
                                                    <span
                                                        id="current_price">{{ EasyShop\Models\Product::getPriceRetail1($product, true, 0) }}
                                                        <span
                                                            class="price_currency">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span>
                                                </span>

                                                <span
                                                    style="text-decoration: line-through; color: red; font-weight: bold; font-size: 16px; ">
                                                    <span
                                                        style="color: #1481BD; font-weight: bold">{{ number_format($product->$myPriceGroup, 0, ',', '.') }}
                                                        <span
                                                            class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span>
                                                    </span></span>


                                            @else


                                                <span class="product-price price" style="font-weight: bold;"> <span
                                                        id="current_price">{{ number_format($article->$myPriceGroup, 0, ',', '.') }}
                                                        <span
                                                            class="amount">{{ \EasyShop\Models\AdminSettings::getField('currency') }}</span></span></span>

                                            @endif
                                        </figcaption>
                                    </figure>
                                    <br>
                                    <button value="{{ $article->id }}" data-add-to-cart="" id="add_to_cart"
                                        class="button add_to_cart_button product_type_simple">Додади во Кошничка
                                    </button>
                                    <h4 class="title">
                                        <a
                                            href="{{ route('product', [$article->id, $article->url]) }}">{{ $article->title }}</a>
                                    </h4>
                                </article>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- end of container -->

        </div><!-- end of home-products -->

    </section>
@endsection
