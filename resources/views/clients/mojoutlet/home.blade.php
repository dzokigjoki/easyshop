@extends('clients.shopathome.layouts.default')
@section('content')
    <!-- CONTENT section -->
    <div id="pageContent">
        <div class="container">
            <!-- two columns -->
            <div class="row">
                <!--====================================== left column ======================================-->
                <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-2 ">
                    <!--======= navbar-vertical =======-->
                {{--<nav class="navbar navbar-vertical mobile-menu-off">--}}
                {{--<div class="responsive-menu mainMenu">--}}
                {{--<div class="responsive-menu-toggled responsive-menu-view">--}}
                {{--<div class="responsive-menu-toggled-controls">--}}
                {{--<div class="navbar-toggle">--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="menu-text">МЕНИ</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<ul class="nav navbar-nav">--}}
                {{--<li class="dl-close"><a href="#"><span class="icon icon-close"></span>затвори</a></li>--}}
                {{--<li class="dropdown dropdown-mega-menu">--}}
                {{--<a href="index.html" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--МАСКИ--}}
                {{--<span class="icon icon-navigate_next pull-right"></span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu megamenu image-links-layout" role="menu">--}}

                {{--<li class="col-one-fourth">--}}
                {{--<span class="image-link">--}}
                {{--<a href="index-12.html">--}}
                {{--<span class="figure"><img class="img-responsive img-border" src="/assets/mojoutlet/images/custom/layout-img-12.jpg" alt=""/><span class="btn btn--ys btn--lg">LAUNCH</span></span>--}}
                {{--<span class="figcaption">Home page - Layout 12</span>--}}
                {{--</a>--}}
                {{--</span>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="dropdown dropdown-mega-menu">--}}
                {{--<a href="listing.html" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--ДОДАТОЦИ--}}
                {{--<span class="icon icon-navigate_next pull-right"></span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu megamenu image-links" role="menu">--}}
                {{--<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>--}}
                {{--<li class="col-one-fourth">--}}
                {{--<span class="image-link">--}}
                {{--<a href="listing.html">--}}
                {{--<span class="figure"><img class="img-responsive" src="/assets/mojoutlet/images/custom/listing-img-1.png" alt=""/></span>--}}
                {{--<span class="figcaption text-uppercase">left column</span>--}}
                {{--</a>--}}
                {{--</span>--}}
                {{--</li>--}}

                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown dropdown-mega-menu">--}}
                {{--<a href="product.html" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--ПРОДУКТИ--}}
                {{--<span class="icon icon-navigate_next pull-right"></span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu megamenu image-links image-links-listing" role="menu">--}}
                {{--<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>--}}
                {{--<li class="col-one-third">--}}
                {{--<span class="image-link">--}}
                {{--<a href="product-small.html">--}}
                {{--<span class="figure"><img class="img-responsive" src="/assets/mojoutlet/images/custom/product-menu-img-1.png" alt=""/></span>--}}
                {{--<span class="figcaption text-uppercase">image size  - small</span>--}}
                {{--</a>--}}
                {{--</span>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown dropdown-mega-menu">--}}
                {{--<a href="blog-layout-1.html" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--СОВЕТИ--}}
                {{--<span class="icon icon-navigate_next pull-right"></span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu megamenu image-links image-links-listing" role="menu">--}}
                {{--<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>--}}
                {{--<li class="col-one-third">--}}
                {{--<span class="image-link">--}}
                {{--<a href="blog-layout-1.html">--}}
                {{--<span class="figure"><img class="img-responsive" src="/assets/mojoutlet/images/custom/blog-menu-img-1.png" alt=""/></span>--}}
                {{--<span class="figcaption text-uppercase">blog - Layout 1</span>--}}
                {{--</a>--}}
                {{--</span>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown dropdown-mega-menu">--}}
                {{--<a href="gallery-layout-1.html" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--GALLERY--}}
                {{--<span class="icon icon-navigate_next pull-right"></span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu megamenu image-links image-links-listing" role="menu">--}}
                {{--<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>--}}
                {{--<li class="col-one-fifth">--}}
                {{--<span class="image-link">--}}
                {{--<a href="gallery-layout-1.html">--}}
                {{--<span class="figure"><img class="img-responsive" src="/assets/mojoutlet/images/custom/gallery-menu-img-1.png" alt=""/></span>--}}
                {{--<span class="figcaption text-uppercase">Gallery - Layout 1</span>--}}
                {{--</a>--}}
                {{--</span>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown dropdown-mega-menu">--}}
                {{--<a href="listing.html" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--ЖЕНИ--}}
                {{--<span class="icon icon-navigate_next pull-right"></span>--}}
                {{--<span class="badge badge--menu  pull-right">НОВО</span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu megamenu" role="menu">--}}
                {{--<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>назад</a></li>--}}
                {{--<li class="col-sm-4">--}}
                {{--<a href="listing.html" class="megamenu__subtitle"><span>ГОРНИ</span></a>--}}
                {{--<ul class="megamenu__submenu">--}}
                {{--<li class="level2">--}}
                {{--<a href="#">Додатоци</a>--}}
                {{--<ul class="megamenu__submenu">--}}
                {{--<li class="dl-back"><a href="#"><span class="icon icon-chevron_left"></span>back</a></li>--}}
                {{--<li class="level3"><a href="listing.html">Маски за телефони</a></li>--}}
                {{--<li class="level3">--}}
                {{--<a href="#">Дом</a>--}}
                {{--<ul class="megamenu__submenu">--}}
                {{--<li class="dl-back"><a href="listing.html"><span class="icon icon-chevron_left"></span>back</a></li>--}}
                {{--<li class="level4"><a href="listing.html">Дома1</a></li>--}}
                {{--<li class="level4"><a href="listing.html">Дома2</a></li>--}}
                {{--<li class="level4"><a href="listing.html">Дома3</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="col-sm-4">--}}
                {{--<a href="#" class="megamenu__subtitle"><span>BOTTOMS</span></a>--}}
                {{--<ul class="megamenu__submenu">--}}
                {{--<li class="dl-back"><a href="listing.html"><span class="icon icon-chevron_left"></span>back</a></li>--}}
                {{--<li class="level2"><a href="listing.html">Пантоли</a></li>--}}
                {{--<li class="level2"><a href="listing.html">Пантоли</a></li>--}}
                {{--<li class="level2"><a href="listing.html">Пантоли</a></li>--}}
                {{--<li class="level2"><a href="listing.html">Пантоли</a></li>--}}
                {{--<li class="level2"><a href="listing.html">Пантоли</a></li>--}}
                {{--<li class="level2"><a href="listing.html">Пантоли</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="col-sm-4">--}}
                {{--<a href="#" class="megamenu__subtitle"><span>Додатоци</span></a>--}}
                {{--<ul class="megamenu__submenu">--}}
                {{--<li class="level2"><a href="listing.html">Накит</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}

                {{--</ul>--}}
                {{--</div>--}}
                {{--</nav>--}}
                <!--======= /navbar-vertical =======-->
                    <!--======= banner-asid =======-->


                    {{--<div class="col-sm-8 col-md-8 col-md-8 col-lg-6 col-xl-7 visible-xs">--}}
                        {{--<img class="marginMobile img-responsive" src="/assets/mojoutlet/images/slides/lazybag.png"/>--}}
                    {{--</div>--}}


                    <div class="bannerAsid nav-dot" id="daily-promotion">
                        <!-- slide-->
                        @foreach($dailyPromotionsArticles as $article)
                            {{-- samo na prviot da ja nema klasata  class="slick-slide"  za da go pokazuva a drugite da gi krie --}}

                        {{--<div class="text-center">--}}
                            {{--<a href="{{route('product', [$article->id, $article->url])}}">--}}
                            {{--<a href="#">--}}
                                {{--<img class="img-responsive-inline" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}"/>--}}
                                {{----}}
                                {{--<img class="img-responsive-inline"--}}
                                                        {{--src="/assets/mojoutlet/images/custom/banner-aside-01.jpg"--}}
                                                        {{--alt="">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                            <div class="product">
                                <div class="product__inside">
                                    <!-- product image -->
                                    <a  href="{{route('product',[$article->id,$article->url])}}">
                                    <div class="product__inside__image">
                                        <img
                                                @if($isMobile)
                                                onclick="location.href='{{route('product',[$article->id,$article->url])}}'"
                                                @endif
                                                class="home-image promotion-faded" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="">
                                        <!-- quick-view -->
                                        <!-- /quick-view -->
                                        {{--<div class="opacity_div">--}}
                                        <a href="{{route('product',[$article->id,$article->url])}}">
                                        <div class="blur" style="background-color: white; opacity: 0.4"></div>
                                        <div class="promotion_text" style="background-color: rgba(0, 0, 0, 0.5)">
                                            <span>Дневна Промоција</span>
                                            <h3 style="color: white;">{{$article->title}}</h3>
                                            @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                {{--namalena cena--}}

                                                {{--<div style="font-size:18px; color:red;" class="product__inside__price price-box">Заштедувате:--}}
                                                {{--{{(int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}--}}
                                                {{--ден.--}}

                                                {{--</div>--}}
                                                <div class="product__inside__price" style="font-size: 18px;"> {{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}} ден.
                                                    <span style="text-decoration: line-through; color: #cf3a3a; font-weight: 600"> {{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        ден.</span>
                                                </div>
                                            @else
                                                <div class="product__inside__price ">{{$article->price}}ден.
                                                </div>
                                        @endif      <!-- /product price -->
                                        </div>
                                        </a>
                                    </div>
                                    </a>

                                    <button value="{{$article->id}}"
                                            data-add-to-cart="" class="btn btn-md" style="background-color: #cf3a3a; width: 100%; padding-top: 5px; padding-bottom: 5px; color: white; font-family: Roboto Condensed;">Купи</button>
                                    <br><br>
                                    <div id="clockdiv">

                                        <div>
                                            <span class="hours"></span>
                                            <div class="smalltext">Часови</div>
                                        </div>
                                        <div>
                                            <span class="minutes"></span>
                                            <div class="smalltext">Минути</div>
                                        </div>
                                        <div>
                                            <span class="seconds"></span>
                                            <div class="smalltext">Секунди</div>
                                        </div>
                                    </div>



                                    <!-- /product image -->
                                    <!-- product name -->
                                    {{--<div class="product__inside__name">--}}
                                        {{--<h2><a href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h2>--}}
                                    {{--</div>--}}
                                    <!-- /product name -->
                                    <!-- product price -->
                                    {{--@if( EasyShop\Models\Product::hasDiscount( $article->discount ) )--}}
                                        {{--namalena cena--}}

                                        {{--<div style="font-size:18px; color:red;" class="product__inside__price price-box">Заштедувате:--}}
                                            {{--{{(int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}--}}
                                            {{--ден.--}}

                                        {{--</div>--}}
                                        {{--<div class="product__inside__price price-box"> {{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}} ден.--}}
                                            {{--<span class="price-box__old"> {{number_format($article->$myPriceGroup, 0, ',', '.')}}--}}
                                                {{--ден.</span>--}}
                                        {{--</div>--}}
                                    {{--@else--}}
                                        {{--<div class="product__inside__price price-box">{{$article->price}}ден.--}}
                                        {{--</div>--}}
                                    {{--@endif      <!-- /product price -->--}}

                                    <!-- /product price -->
                                    {{--<div class="product__inside__hover">--}}
                                        {{--<!-- product info -->--}}
                                        {{--<div class="product__inside__info">--}}
                                            {{--<div class="product__inside__info__btns">--}}

                                                {{--<button value="{{$article->id}}"--}}
                                                        {{--data-add-to-cart="" id="add_to_cart"--}}
                                                        {{--class="btn btn--ys btn--xl">--}}
                                                    {{--<span class="icon icon-shopping_basket"></span>--}}
                                                    {{--Купи--}}
                                                {{--</button>--}}
                                                {{--<a href="{{route('product',[$article->id,$article->url])}}"--}}
                                                   {{--class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span--}}
                                                            {{--class="icon icon-visibility"></span> Прегледај</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<!-- /product info -->--}}
                                        {{--<div class="rating"></div><!-- /product rating -->--}}
                                        {{--<!-- product rating -->--}}

                                    {{--</div>--}}
                                </div>
                            </div>
                                @endforeach
                    </div>

                    <!--======= /banner-asid =======-->
                    <div class="divider divider--lg hidden-lg hidden-md"></div>
                    <div class="divider divider--lg hidden-lg hidden-md"></div>

                    <!--======= facebook =======-->
                    {{--<div class="text-center hidden-sm  hidden-xs">--}}
                    {{--<div class="display-inline-block">--}}
                        {{--<a href="/assets/mojoutlet/Garancija.pdf" target="_blank">--}}
                        {{--<a>--}}
                              {{--<img style="border:none; overflow:hidden; width:auto; height:256px;" src="/assets/mojoutlet/images/14dena.png">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                            {{--<iframe src="https://www.facebook.com/plugins/likebox.php?id=134612429900944&amp;width=270px&amp;connections=9&amp;stream=false&amp;header=false&amp;height=216"--}}
                                    {{--style="border:none; overflow:hidden; width:270px; height:216px;"></iframe>--}}
                            {{--<div style="border:none; overflow:hidden; width:270px; height:216px;" class="fb-page" data-href="https://www.facebook.com/mojoutlet.mk/" data-small-header="false"--}}
                                 {{--data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">--}}
                                {{--<blockquote cite="https://www.facebook.com/mojoutlet.mk/" class="fb-xfbml-parse-ignore"><a--}}
                                            {{--href="https://www.facebook.com/mojoutlet.mk/">mojoutlet.mk</a></blockquote>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!--======= /facebook =======-->
                    {{--<div class="divider divider--lg hidden-sm  hidden-xs"></div>--}}
                    <!--======= testimonials =======-->
                    {{--<div class="mobile-menu-off fill-bg-custom aside-inner color-white">--}}
                        {{--<h4 class="text-center text-uppercase color-white mega">Што велат клиентите? </h4>--}}
                        {{--<div class="testimonialsAsid nav-dot nav-dot-invert">--}}
                            {{--<!-- slide-->--}}
                            {{--<a class="link-hover-block">--}}
                                {{--<div class="text-center">--}}
                                    {{--<img class="img-responsive-inline"--}}
                                         {{--src="/assets/mojoutlet/images/tes1.jpg" alt="">--}}
                                    {{--<p>--}}
                                        {{--<span class="icon"></span> Најголемата и најубавата Online продавница во македонија--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                        {{--<b>Баже</b><br>--}}
                                        {{--<em></em>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<!-- /slide-->--}}
                            {{--<!-- slide-->--}}
                            {{--<a  class="link-hover-block">--}}
                                {{--<div class="text-center">--}}
                                    {{--<img class="img-responsive-inline"--}}
                                         {{--src="/assets/mojoutlet/images/tes2.jpg" alt="">--}}
                                    {{--<p>--}}
                                        {{--<span class="icon"></span> Најголем избор на најразлични продукти за секојдневието!--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                        {{--<b>Јане</b><br>--}}
                                        {{--<em></em>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<!-- /slide-->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!--======= /testimonials =======-->
                    {{--<div class="divider divider--lg"></div>--}}
                    <!--======= carousel-new =======-->
                    <!-- title -->
                    {{--<h4 class="text-uppercase mega hidden-xs">Најнови совети</h4>--}}
                    {{--<!-- /title -->--}}
                    {{--<div class="carousel-products row layout-none-xl hidden-xs" id="postsCarousel">--}}
                        {{--<!-- slide-->--}}
                        {{--@foreach($lastBlogs as $blog)--}}
                             {{--<div class="col-sm-3 col-xl-6" style="">--}}
                                {{--<div class="recent-post-box">--}}
                                    {{--@if($blog->image)--}}
                                    {{--<div class="col-lg-12 col-xl-12">--}}
                                        {{--<a href="{{route('blog',[$blog->id,$blog->url])}}">--}}
                                        {{--<span class="figure">--}}
                                            {{--<img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'md_')}}" alt="">--}}
                                            {{--</span>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--@endif--}}

                                        {{--<div class="col-lg-12 col-xl-12">--}}
                                            {{--<div class="recent-post-box__text">--}}
                                                {{--<h4><a href="{{route('blog',[$blog->id,$blog->url])}}">{{$blog->title}}</a></h4>--}}
                                                {{--@if($blog->short_description)--}}
                                                    {{--<p>--}}
                                                        {{--{{$blog->short_description}}--}}
                                                    {{--</p>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- / -->--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                        {{--<!-- /slide -->--}}
                        {{--<!-- slide -->--}}
                    {{--</div>--}}
                    {{--<div class="carousel-products__button button-bottom carousel-products__button_aside hidden-xs">--}}
                        {{--<span class="btn-prev"></span>--}}
                        {{--<span class="btn-next"></span>--}}
                    {{--</div>--}}
                    {{--<!--======= /carousel-new =======-->--}}
                    {{--<div class="divider divider--lg visible-xs"></div>--}}

                </aside>
                <!--====================================== /left column ======================================-->
                <!--====================================== center column ======================================-->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-10" id="centerColumn">
                    <div class="divider divider--lg visible-sm visible-xs"></div>
                    <!-- Slider section -->

                    {{--<section class="offset-top-0" id="slider">--}}
                    <section>
                        @if(count($dailyPromotionsArticles)>0)
                        <div class="mobileHeight margin-mobile-banner swiper-container" style="height: 437px;">
                            @else
                                <div class="mobileHeight swiper-container" style="height: 437px;">
                            @endif
                            <div class="swiper-wrapper">
                                @foreach($sliderBanners as $banner)
                                {{-- <div class="swiper-slide">
                                    <img style="width:100%" src="/assets/mojoutlet/images/slides/golem baner.png">
                                </div> --}}
                                {{--<div class="swiper-slide">--}}
                                    {{--<img style="width:100%" src="/assets/mojoutlet/images/slides/mojoutlet-baner-ocila.jpg">--}}
                                {{--</div>--}}

                                {{--<div class="swiper-slide">--}}
                                    {{--<img style="width:100%" src="/assets/mojoutlet/images/slides/mojoutlet-golem-baner.jpg">--}}
                                {{--</div>--}}
                                <a href="{{$banner->url}}" class="swiper-slide">
                                    <img style="width:100%" src="{{\ImagesHelper::getBannerImage($banner, NULL, 'lg_')}}" alt="{{$banner->title}}">
                                </a>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </section>
                    {{--</section>--}}



                    <!-- END REVOLUTION SLIDER -->
                    <!-- category section -->
                    <div class="content-md">
                        {{--<div class="row">--}}
                            {{--<div class="category-carousel">--}}
                                {{--<div class="col-sm-4 col-md-4 col-lg-4">--}}
                                    {{--<a href="listing.html" class="banner zoom-in">--}}
										{{--<span class="figure">--}}
											{{--<img src="/assets/mojoutlet/images/custom/category-4.jpg" alt=""/>--}}
											{{--<span class="figcaption">--}}
												{{--<span class="block-table">--}}
													{{--<span class="block-table-cell">--}}
														{{--<span class="banner__title size6">Жени</span>--}}
													{{--</span>--}}
												{{--</span>--}}
											{{--</span>--}}
										{{--</span>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-4 col-md-4 col-lg-4">--}}
                                    {{--<a href="listing.html" class="banner zoom-in">--}}
										{{--<span class="figure">--}}
											{{--<img src="/assets/mojoutlet/images/custom/category-5.jpg" alt=""/>--}}
											{{--<span class="figcaption">--}}
												{{--<span class="block-table">--}}
													{{--<span class="block-table-cell">--}}
														{{--<span class="banner__title size6">Додатоци</span>--}}
													{{--</span>--}}
												{{--</span>--}}
											{{--</span>--}}
										{{--</span>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-4 col-md-4 col-lg-4">--}}
                                    {{--<a href="listing.html" class="banner zoom-in">--}}
										{{--<span class="figure">--}}
										{{--<img src="/assets/mojoutlet/images/custom/category-6.jpg" alt=""/>--}}
											{{--<span class="figcaption">--}}
												{{--<span class="block-table">--}}
													{{--<span class="block-table-cell">--}}
														{{--<span class="banner__title size6">Мажи</span>--}}
													{{--</span>--}}
												{{--</span>--}}
												{{--</span>--}}
											{{--</span>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    {{--<div class="divider divider--md visible-sm visible-xs"></div>--}}
                    <!-- /category section -->
                    <!--  -->
                    {{--<div class="content-sm">--}}
                        {{--<!-- title -->--}}
                        {{--<div class="title-with-button">--}}
                            {{--<div class="carousel-products__button pull-right"><span class="btn-prev"></span> <span--}}
                                        {{--class="btn-next"></span></div>--}}
                            {{--<h2 style="font-size:28px !important;" class="text-left text-uppercase title-default pull-left">Препорачани продукти</h2>--}}
                        {{--</div>--}}
                        {{--<!-- /title -->--}}
                        {{--<!-- carousel -->--}}
                        {{--<div class="carousel-products row" id="carouselFeatured">--}}
                            {{--@foreach($recommendedArticles as $article)--}}
                                {{--<div class="col-lg-3">--}}
                                    {{--<!-- product -->--}}

                                    {{--<div class="product">--}}
                                        {{--<div class="product__inside">--}}
                                            {{--<!-- product image -->--}}

                                            {{--<div class="product__inside__image">--}}
                                                {{--<a href="{{route('product',[$article->id,$article->url])}}">--}}
                                                    {{--<img class="home-image"--}}
                                                         {{--@if($isMobile)--}}
                                                         {{--onclick="location.href='{{route('product',[$article->id,$article->url])}}'"--}}
                                                         {{--@endif--}}
                                                         {{--src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="">--}}
                                                {{--</a>--}}
                                                {{--<!-- quick-view -->--}}
                                                {{--<a href="{{route('product',[$article->id,$article->url])}}" class="hidden-xs hidden-sm hidden-md quick-view"><b><span class="icon icon-visibility"></span>--}}
                                                        {{--Прегледај</b> </a>--}}
                                                {{--<!-- /quick-view -->--}}
                                            {{--</div>--}}
                                            {{--<!-- /product image -->--}}
                                            {{--@if( EasyShop\Models\Product::hasDiscount( $article->discount ) )--}}
                                            {{--<div class="product__label product__label--left product__label--sale"> <span>{{(int)(((int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0))--}}
                                            {{--/($article->$myPriceGroup) * 100)}}%--}}
                                                    {{--заштеда<br></span>--}}
                                            {{--</div>--}}
                                            {{--@endif--}}
                                            {{--<!-- product name -->--}}
                                            {{--<div class="product__inside__name">--}}
                                                {{--<h2><a class="limit-txt" href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h2>--}}
                                            {{--</div>--}}
                                            {{--<!-- /product name -->--}}
                                            {{--<!-- product price -->--}}
                                            {{--@if( EasyShop\Models\Product::hasDiscount( $article->discount ) )--}}
                                                {{--namalena cena--}}

                                                {{--<div style="font-size:18px; color:red;" class="product__inside__price price-box">Заштедувате:--}}
                                                    {{--{{(int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}--}}
                                                    {{--ден.--}}

                                                {{--</div>--}}
                                                {{--<div class="product__inside__price price-box"> {{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}} ден.--}}
                                                    {{--<span class="blok price-box__old"> {{number_format($article->$myPriceGroup, 0, ',', '.')}}--}}
                                                        {{--ден.</span>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div class="product__inside__price price-box">{{$article->price}}ден.--}}
                                                {{--</div>--}}
                                        {{--@endif      <!-- /product price -->--}}

                                        {{--<!-- /product price -->--}}
                                            {{--<div class="product__inside__hover">--}}
                                                {{--<!-- product info -->--}}
                                                {{--<div class="product__inside__info">--}}
                                                    {{--<div class="product__inside__info__btns">--}}

                                                        {{--<button value="{{$article->id}}"--}}
                                                                {{--data-add-to-cart="" id="add_to_cart"--}}
                                                                {{--class="btn btn--ys btn--xl">--}}
                                                            {{--<span class="icon icon-shopping_basket"></span>--}}
                                                                {{--Купи--}}
                                                        {{--</button>--}}
                                                        {{--<a href="{{route('product',[$article->id,$article->url])}}"--}}
                                                           {{--class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span--}}
                                                                    {{--class="icon icon-visibility"></span> Прегледај</a>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<!-- /product info -->--}}
                                                {{--<div class="rating"></div><!-- /product rating -->--}}
                                                {{--<!-- product rating -->--}}

                                            {{--</div>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}
                                    {{--<!-- /product -->--}}
                                {{--</div>--}}
                        {{--@endforeach--}}
                        {{--<!-- /carousel -->--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                <!-- / -->

                        </div>
                    </div>
                    <div id="container">
                            <div class="hidden-xs hidden-sm middle-content">
                                    <div class="container">
                                    <div class="col-lg-3 col-md-3">
                                    <div class="middle-shipp">
                                    <div style="width: 84px !important; border:none !important;" class="mid-border"><img class="img img-responsive" src="{{ url_assets('/mojoutlet/images/slika1.png') }}"></div>
                                    </div>
                                    <br>
                                    <h2><span style="color:#9F8AC2; font-size:17px;">СИГУРНА ДОСТАВА</span></h2>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                    <div class="middle-shipp">
                                    <div style="width: 80px !important; border:none !important;" class="mid-border"><img class="img img-responsive" src="{{ url_assets('/mojoutlet/images/percentage.png') }}"></div>
                                    </div>
                                    <br>
                                    <h2><span style="color:#9F8AC2; font-size:17px;">НАЈДОБРИ ПОНУДИ</span></h2>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                    <div class="middle-shipp">
                                    <div style="width: 80px !important; border:none !important;" class="mid-border"><img class="img img-responsive" src="{{ url_assets('/mojoutlet/images/credit-card.png') }}"></div>
                                    </div>
                                    <br>
                                    <h2><span style="color:#9F8AC2; font-size:17px;">ПЛАЌАЊЕ СО КАРТИЧКА</span></h2>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                    <div class="middle-shipp">
                                    <div style="width: 80px !important; border:none !important;" class="mid-border"><img class="img img-responsive" src="{{ url_assets('/mojoutlet/images/cash.png') }}"></div>
                                    </div>
                                    <br>
                                    <h2><span style="color:#9F8AC2; font-size:17px;">ПЛАЌАЊЕ ПРИ ДОСТАВА</span></h2>
                                    </div>
                                    </div>
                                    </div>
                    </div>
                    <!-- content
    ================================================== -->
<div id="content">

    <!-- End Collection -->

<!-- our work portfolio -->
            <div class="col-md-12 content-sm">
                <!-- title -->
                <div class="title-with-button">
                    {{--<div class="carousel-products__button pull-right"><span class="btn-prev"></span> <span--}}
                                {{--class="btn-next"></span></div>--}}
                    <h2 style="font-size:26px !important;" class="text-left text-uppercase title-default pull-left">Најпопуларни продукти</h2>
                </div>
                <!-- /title -->
                <!-- carousel -->
                <div class="carousel-products row" >
                    {{--id="carouselSale" - carousel-products--}}
                    @foreach($bestSellersArticles as $article)
                        <div class="col-md-3">
                            <!-- product -->
                            <div class="product ">
                                <div class="product__inside">
                                    <!-- product image -->
                                    <div class="product__inside__image">
                                        <a href="{{route('product',[$article->id,$article->url])}}">
                                            <img
                                                    @if($isMobile)
                                                    onclick="location.href='{{route('product',[$article->id,$article->url])}}'"
                                                    @endif
                                                    class="home-image" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="">
                                        </a>
                                        <!-- quick-view -->
                                        <a href="{{route('product',[$article->id,$article->url])}}" class="hidden-xs hidden-sm hidden-md quick-view"><b><span
                                                        class="icon icon-visibility"></span>
                                                Прегледај</b> </a>
                                        <!-- /quick-view -->
                                    </div>
                                    <!-- /product image -->
                                    <!-- label sale -->
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        <div class="product__label product__label--left product__label--sale"> <span>- {{(int)(((int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0))
                                            /($article->$myPriceGroup) * 100)}}%
                                                    <br></span>
                                        </div>
                                    @endif
                                <!-- /label sale -->
                                    <!-- product name -->
                                    <div class="product__inside__name">
                                        <h2><a class="limit-txt" href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a></h2>
                                    </div>
                                    <!-- /product name -->
                                    <!-- product price -->
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        {{--namalena cena--}}

                                        {{--<div style="font-size:18px; color:red;" class="product__inside__price price-box">Заштедувате:--}}
                                        {{--{{(int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)}}--}}
                                        {{--ден.--}}

                                        {{--</div>--}}
                                        <div class="product__inside__price price-box"> {{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}} ден.
                                            <span class="blok price-box__old"> {{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                ден.</span>
                                        </div>
                                    @else
                                        <div class="product__inside__price price-box">{{$article->price}}ден.
                                        </div>
                                @endif      <!-- /product price -->
                                    <!-- /product price -->
                                    <div class="product__inside__hover">
                                        <!-- product info -->
                                        <div class="product__inside__info">

                                            <div class="product__inside__info__btns">
                                                <button value="{{$article->id}}"
                                                        data-add-to-cart="" id="add_to_cart"
                                                        class="btn btn--ys btn--xl">
                                                    <span class="icon icon-shopping_basket"></span>
                                                    <span>Купи</span>
                                                </button>
                                                {{--<button value="{{$article->id}}"  data-add-to-cart="" id="add_to_cart" style="background-color: #D4362A"
                                                class="buy_home"><i class="fa fa-shopping-cart"></i> <span style="font-size:
                                                12px;">Купи во кошничка</span></button>--}}
                                                <a href="{{route('product',[$article->id,$article->url])}}"
                                                   class="btn btn--ys btn--xl  row-mode-visible hidden-xs">
                                                    <span class="icon icon-visibility"></span>Прегледај
                                                </a>
                                            </div>

                                        </div>
                                        <!-- /product info -->
                                        <!-- product rating -->
                                        <div class="rating"></div><!-- /product rating -->
                                        <!-- /product rating -->
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                        </div>
                    @endforeach
                </div>
                <!-- /carousel -->
            </div>
                </div>
            </div>



    <!--  -->

    <!-- End CONTENT section -->
@endsection