@extends('clients.skin-care.layouts.default')
@section('content')


<div class="loader-mask">
    <div class="loader">
        <div></div>
        <div></div>
    </div>
</div>



<div class="content-wrapper oh">
    <!-- Slick Slider -->
    <section class="hero-wrap text-center relative">
        <div class="banner-slider">
            <div style="position: relative">
                <img class="bannerdesktop lazy" data-original="{{ url_assets('/skin-care/img/home/baner1.jpg')}}">
                <img class="bannermob lazy" data-original="{{ url_assets('/skin-care/img/home/baner1mob.jpg')}}">
                <div class="text-banner">
                    <img src="{{ url_assets('/skin-care/img/home/shine2.png')}}" alt="">
                    <p>Одбери ја вистинката нега за твојата кожа</p>
                    <div>
                        <a href="" class="btn btn-banner-dark">Категории</a>
                        <a href="" class="btn btn-banner-light">Брендови</a>
                    </div>
                </div>

            </div>
            <div style="position: relative">
                <img class="bannerdesktop lazy" data-original="{{ url_assets('/skin-care/img/home/baner2.jpg')}}">
                <img class="bannermob lazy" data-original="{{ url_assets('/skin-care/img/home/baner2mob.jpg')}}">
                <div class="text-banner">
                    <img src="{{ url_assets('/skin-care/img/home/shine2.png')}}" alt="">
                    <p>Одбери ја вистинката нега за твојата кожа</p>
                    <div>
                        <a href="" class="btn btn-banner-dark">Категории</a>
                        <a href="" class="btn btn-banner-light">Брендови</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end hero slider -->
    <section class="section-brands">
        <div class="brands-slider">
            <div class="text-center brand-item">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/brands/novexpert.jpg')}}" alt="">
            </div>
            <div class="text-center brand-item">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/brands/madara.jpg')}}" alt="">
            </div>
            <div class="text-center brand-item">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/brands/mossa.jpg')}}" alt="">
            </div>
            <div class="text-center brand-item">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/brands/lavera.jpg')}}" alt="">
            </div>
        </div>
    </section>
    <!-- Promo Banners -->
    <section class="section-wrap promo-banners pb-30">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xxs-4 mb-30 promo-banner">
                    <a href="#">
                        <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/left.jpg')}}" alt="" />
                        <div class="promo-inner valign">
                            <h2>Коса</h2>
                        </div>
                    </a>
                </div>

                <div class="col-xs-4 col-xxs-4 mb-30 promo-banner">
                    <a href="#">
                        <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/center.jpg')}}" alt="" />
                        <div class="promo-inner valign">
                            <h2>Лице</h2>
                        </div>
                    </a>
                </div>

                <div class="col-xs-4 col-xxs-4 mb-30 promo-banner">
                    <a href="#">
                        <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/right.jpg')}}" alt="" />
                        <div class="promo-inner valign">
                            <h2>Тело</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end promo banners -->

    <!-- Trendy Products -->
    <section class="section-wrap-sm new-arrivals pb-50">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading">Погледни ги нашите најпознати производи</span>
                    <h2 class="heading bottom-line">Најпродавани производи</h2>
                </div>
            </div>


            <div class="row items-grid products-slider">
                @foreach($recommendedArticles as $product)
                <div class="product-padding">
                    @include('clients.skin-care.partials.product')
                </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- end trendy products -->

    <!-- Testimonials -->
    <section class="section-wrap relative">
        <div>
            <img class="lazy" data-original="{{url_assets('/skin-care/img/home/ecocert.jpg')}}" alt="">
        </div>
    </section>
    <!-- end testimonials -->

    <!-- Product Widgets List -->
    <section class="products-list">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 products-widget">
                    <h3 class="widget-title bottom-line full-grey">
                        Препорачани
                    </h3>
                    <ul class="product-list-widget custom-slider">
                        @foreach($recommendedArticles as $product)
                        <li class="clearfix">
                            <a href="/p/{{$product->id}}/{{$product->url}}">
                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="" />
                                <span class="product-title">{{ $product->title }}</span>
                            </a>
                            <span class="price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <?php
                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                ?>
                                <del>
                                    <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </del>
                                <ins>
                                    <span class="amount">{{$discount}}МКД</span>
                                </ins>
                                @else
                                <ins>
                                    <span class="amount">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </ins>
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end special offer -->

                <div class="col-md-3 col-sm-6 col-xs-6 products-widget">
                    <h3 class="widget-title bottom-line full-grey">Најпопуларни</h3>
                    <ul class="product-list-widget custom-slider">
                        @foreach($recommendedArticles as $product)
                        <li class="clearfix">
                            <a href="/p/{{$product->id}}/{{$product->url}}">
                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="" />
                                <span class="product-title">{{ $product->title }}</span>
                            </a>
                            <span class="price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <?php
                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                ?>
                                <del>
                                    <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </del>
                                <ins>
                                    <span class="amount">{{$discount}}МКД</span>
                                </ins>
                                @else
                                <ins>
                                    <span class="amount">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </ins>
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end bestsellers -->
                <div class="col-md-3 col-sm-6 col-xs-6 products-widget">
                    <h3 class="widget-title bottom-line full-grey">На акција</h3>
                    <ul class="product-list-widget custom-slider">
                        @foreach($recommendedArticles as $product)
                        <li class="clearfix">
                            <a href="/p/{{$product->id}}/{{$product->url}}">
                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="" />
                                <span class="product-title">{{ $product->title }}</span>
                            </a>
                            <span class="price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <?php
                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                ?>
                                <del>
                                    <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </del>
                                <ins>
                                    <span class="amount">{{$discount}}МКД</span>
                                </ins>
                                @else
                                <ins>
                                    <span class="amount">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </ins>
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end top rated -->

                <div class="col-md-3 col-sm-6 col-xs-6 products-widget last">
                    <h3 class="widget-title bottom-line full-grey">Најнови</h3>
                    <ul class="product-list-widget custom-slider">
                        @foreach($recommendedArticles as $product)
                        <li class="clearfix">
                            <a href="/p/{{$product->id}}/{{$product->url}}">
                                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="" />
                                <span class="product-title">{{ $product->title }}</span>
                            </a>
                            <span class="price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <?php
                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                ?>
                                <del>
                                    <span>{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </del>
                                <ins>
                                    <span class="amount">{{$discount}}МКД</span>
                                </ins>
                                @else
                                <ins>
                                    <span class="amount">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                </ins>
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- end sales -->

            <!-- end row -->
        </div>
    </section>
    <!-- end product widgets -->
<hr>
    <section class="section-wrap relative">
        <div class="slider-qualities">
            <div class="qualities">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/1.png')}}" alt="" />
                <div class="text-center">
                    <h5>Eco-friendly</h5>
                    <p>ПРИРОДНИ И ОРГАНСКИ СОСТОЈКИ</p>
                </div>

            </div>
            <div class="qualities">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/2.png')}}" alt="" />
                <div class="text-center">
                    <h5>Без груби хемикалии</h5>
                    <p>И СИНТЕТИЧКИ ЕЛЕМЕНТИ</p>
                </div>
            </div>
            <div class="qualities">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/3.png')}}" alt="" />
                <div class="text-center">
                    <h5>Природни мириси</h5>
                    <p>БЕЗ ПАРАБЕНИ ИЛИ ВЕШТАЧКИ ПАРФЕМИ</p>
                </div>
            </div>
            <div class="qualities">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/4.png')}}" alt="" />
                <div class="text-center">
                    <h5>Нутритивна</h5>
                    <p>БОГАТА СО ХРАНЛИВИ МАТЕРИИ</p>
                </div>
            </div>
            <div class="qualities">
                <img class="lazy" data-original="{{ url_assets('/skin-care/img/home/5.png')}}" alt="" />
                <div class="text-center">
                    <h5>Нежна</h5>
                    <p>НЕ ЈА ИРИТИРА КОЖАТА</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter" id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4>Биди во тек со сите новости</h4>
                    <form class="relative newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Внеси ја својата е-пошта">
                        <input type="submit" class="btn btn-lg btn-dark newsletter-submit" value="Претплати се">
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@stop
@section("scripts")
<script>
    $(document).ready(function() {

        $('.banner-slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }]
        });

        $('.brands-slider').slick({
            dots: false,
            infinite: true,
            autoplay: true,
            speed: 300,
            arrows: false,
            slidesToShow: 4,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            }]
        });


        $('.products-slider').slick({
            dots: true,
            infinite: true,
            autoplay: true,
            speed: 300,
            arrows: false,
            slidesToShow: 4,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            }, {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }]
        });

        $('.custom-slider').slick({
            dots: false,
            infinite: false,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 1000,
            arrows: false,
            verticalSwiping: true,
            vertical: true,
            slidesToShow: 3,
            responsive: [{
                breakpoint: 768,
                settings: {
                    autoplay: true,
                    autoplaySpeed: 3000,
                    speed: 1000,
                    slidesToShow: 2,
                }
            }]
        });
        $('.slider-qualities').slick({
            dots: false,
            infinite: true,
            autoplay: true,
            speed: 300,
            arrows: false,
            slidesToShow: 5,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            }, {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }]
        });
    });
</script>
@stop