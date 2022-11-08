@extends('clients.fitactive.layouts.default')
@section('content')

    <style>
        .card-home {
            font-weight: 400;
        }

        .exist-heart {
            cursor: pointer;
        }

        .exist-heart:hover {
            color: #ca2028;
        }

        @media(min-width: 768px) {

            .hidden-lg {

                display: none;
            }
        }

        img.below-banner-img {
            margin: 0 auto !important;
        }

        .product_photo_gallery {
            display: none;
        }

    </style>

    {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> --}}
    <link rel="stylesheet" href="{{ url_assets('/fitactive/plugins/slick-new/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/fitactive/plugins/slick-new/slick/slick-theme.css') }}">

    <div class="levelek"></div>

    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="hidden-xs slideshow" id="main-banner">
                @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
                    <div @if ($banner->url) onclick="location.href='{{ $banner->url }}'" @endif>
                        <img src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt="">
                    </div>
                @endforeach
            </div>
            <div class="hidden-sm hidden-md hidden-lg slideshow" id="main-banner-mob">
                @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
                    <div @if ($banner->url) onclick="location.href='{{ $banner->url }}'" @endif>
                        <img src="{{ '/uploads/banners/' . $banner->id . '/md_' . $banner->mobile_image }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="ps-section--collection-home-2 hidden-xs">
        <div class="ps-container-fluid">
            <div class="row">
                @foreach (\BannerHelper::getBannerByCategory('home-categories') as $banner)
                    <div class="text-center col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                        <div class="ps-collection--3"><img style="width: 100%" class="below-banner-img"
                                src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt=""><a
                                class="ps-btn" href="{{ $banner->url }}">Види
                                повеќе</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="ps-section--collection-home-2 hidden-lg">
        <div class="ps-container-fluid">
            <div class="row">
                @foreach (\BannerHelper::getBannerByCategory('home-categories') as $key => $banner)

                    @if ($key == 0)
                        <div class="text-center col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                            <div class="ps-collection--3"><img style="width: 100%" class="below-banner-img"
                                    src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt=""><a
                                    class="ps-btn" href="{{ $banner->url }}">Види
                                    повеќе</a></div>
                        </div>
                    @break
                @endif
                @endforeach
            </div>
        </div>
    </div>



    <div id="home-banner-1568964135014" class="home-banner layout-boxed bg-color-none effect-true"
        style="background: rgba(0,0,0,0);" data-section-id="1568964135014" data-section-type="reload_section">
        <div class="container border-none">
            <style type="text/css">
                #home-banner-1568964135014 .title-wrapper h3 {
                    font-size: 25px;
                }

            </style>

            <div class="home-banner-items p-3">
                <div class="home-banner-content home-banner-row-2">
                    <div class="row row-1 justify-content-center row-padding-20">
                        {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-12 padding-20">
                            <div class="banner-item text-box-overlay bottom-center">
                                <div class="image">
                                    <a href="#">
                                        <span class="image-lazysize" style="position:relative;padding-top:162.1621622%;">

                                            <img src="{{ url_assets('/fitactive/images/1.jpg') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                              
                            </div>

                        </div> --}}

                        <div class="col-lg-12 col-md-8 col-sm-8 col-12 padding-20">


                            <div class="banner-item text-box-overlay bottom-left">
                                <div class="image">
                                    <a href="#">
                                        <span class="image-lazysize"
                                            style="position:relative;padding-top:78.94736842105263%;">

                                            <video autoplay loop muted
                                                src="{{ url_assets('/fitactive/images/panzi.mp4') }}"></video>


                                            {{-- <img src="{{ url_assets('/fitactive/images/2.jpg') }}" alt=""> --}}
                                        </span>
                                    </a>
                                </div>
                                {{-- <div class="text text-left bg-color-none pob-10 pol-6 fix-btn-below" style="background:;">

                                    <div class="title big-size" style="color: #fcffff; font-size: 36px;">Нова Колекција!
                                    </div>
                                    <div class="subtitle bold-text big-size" style="color: #ffffff; font-size: 50px;">MOM
                                        JEANS</div>
                                    <a class="bold-text btn btn-banner" href="/c/21/farmerki"
                                        style="color: #000000; background: #fcffff; font-size: 16px;">ПОГЛЕДНИ</a>
                                </div> --}}





                            </div>

                        </div>

                        {{-- <div class="col-lg-8 col-md-8 col-sm-8 col-12 padding-20">


                            <div class="banner-item text-box-overlay bottom-left">

                                <div class="image">
                                    <a href="/c/1/bluzi">

                                        <span class="image-lazysize"
                                            style="position:relative;padding-top:78.94736842105263%;">
                                            

                                            <img src="{{ url_assets('/fitactive/images/3.jpg') }}" alt="">
                                        </span>

                                    </a>
                                </div>
                                
                                <div class="text text-left bg-color-none pob-12 pol-6 fix-btn-below" style="background: ;">
                                    <div class="title big-size" style="color: #ffffff; font-size: 30px;">Нова Колекција!
                                    </div>
                                    <div class="subtitle bold-text big-size" style="color: #ffffff; font-size: 80px;">МАИЦИ
                                    </div>
                                    <a class="bold-text btn btn-banner" href="/c/1/bluzi"
                                        style="color: #000000; background: #fcffff; font-size: 16px;">ПОГЛЕДНИ</a>
                                </div>


                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-12 padding-20">


                            <div class="banner-item text-box-overlay bottom-center">

                                <div class="image">
                                    <a href="/c/7/koshuli">

                                        <span class="image-lazysize" style="position:relative;padding-top:162.1621622%;">
                                            

                                            <img src="{{ url_assets('/fitactive/images/1.jpg') }}" alt="">
                                        </span>

                                    </a>
                                </div>
                                <div class="text text-center bg-color-none pob-10  fix-btn-below" style="background: ;">

                                    <div class="subtitle bold-text big-size" style="color: #ffffff; font-size: 30px;">НОВА
                                        КОЛЕКЦИЈА <br>КОШУЛИ</div>

                                    <a class="bold-text btn btn-banner" href="/c/7/koshuli"
                                        style="color: #000000; background: #fcffff; font-size: 16px;">ПОГЛЕДНИ</a>
                                </div>

                            </div>

                        </div> --}}



                    </div>


                    <div>
                    {{-- <div class="row seeProductsSection" style="">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="banner-item text-box-overlay bottom-center">
                                <div class="image">
                                    <a href="#">
                                        <span class="image-lazysize" style="position:relative;padding-top:162.1621622%;">

                                            <img src="{{ url_assets('/fitactive/images/3.jpg') }}"
                                                alt="">
                                        </span>
                                    </a>
                                </div>

                            </div>

                        </div> 

                        <div class="col-lg-12 col-md-8 col-sm-8 col-12">

                            <div class="text-box-overlay bottom-left">
                                <h2>Пронајдете ја вистинската храна за вашето куче</h2>
                                <p>Секоја формула е создадена за да обезбеди исхрана прилагодена на здравствените потреби на
                                    вашето куче без разлика на нивната големина, раса, возраст или начин на живот.</p>
                              <a href="/c/3/hrana-za-kuchinja">  <button type="button" class="seeProducts">Види ги сите продукти</button></a>
                            </div>

                        </div>

                    </div> --}}
                </div>



                </div>

            </div>
        </div>
    </div>

    <div class="ps-section--feature-products-1">
        <div class="ps-container-fluid">
            <div class="ps-section__header text-center">
                <h3 style="font-size:34px !important" class="ps-heading pb-10">Најнови производи</h3>
            </div>
            <div class="ps-section__content pb-30">
                <div class="row">

                    <div class="col-sm-1 hidden-xs"></div>
                    <div class="col-sm-10 col-xs-12">
                        <div class="row">

                            @foreach ($newestArticles as $product)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="/p/{{ $product->id }}/{{ $product->url }}">
                                        <div class="ps-product--1" data-mh="product-item">
                                            <div class="ps-product__thumbnail product-image">
                                                <a href="/p/{{ $product->id }}/{{ $product->url }}"
                                                    class="product-image-link">
                                                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                        <?php
                                                        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                        if ($product->price != 0) {
                                                            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                                        }
                                                        ?>
                                                        @if (isset($discountPercentage))
                                                            <div class="ps-badge ps-badge--sale-hot ps-badge--1st">
                                                                <span>-{{ (int) $discountPercentage }}%</span>
                                                            </div>
                                                        @endif
                                                    @endif

                                                    @if (\ImagesHelper::getSecondGalleryImage($product, null, 'lg_'))
                                                        <img class="product_photo"
                                                            src="{{ \ImagesHelper::getSecondGalleryImage($product, null, 'lg_') }}"
                                                            alt="">
                                                    @else
                                                        <img class="product_photo"
                                                            src="{{ \ImagesHelper::getProductImage($product, null, 'lg_') }}"
                                                            alt="">
                                                    @endif

                                                    @if (\ImagesHelper::getFirstGalleryImage($product, null, 'md_'))
                                                        <img class="product_photo_gallery"
                                                            src="{{ \ImagesHelper::getFirstGalleryImage($product, null, 'md_') }}"
                                                            alt="product">
                                                    @else
                                                        @if (\ImagesHelper::getSecondGalleryImage($product, null, 'md_'))
                                                            <img class="product_photo_gallery"
                                                                src="{{ \ImagesHelper::getSecondGalleryImage($product, null, 'lg_') }}"
                                                                alt="">
                                                        @else
                                                            <img class="product_photo_gallery"
                                                                src="{{ \ImagesHelper::getProductImage($product, null, 'lg_') }}"
                                                                alt="">
                                                        @endif
                                                    @endif
                                                    @if (auth()->user())
                                                        <a class="ps-product__wishlist" data-add-to-wish-list
                                                            value="{{ $product->id }}">
                                                            <i class="wishlist-custom far fa-heart-o"></i>
                                                        </a>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="/p/{{ $product->id }}/{{ $product->url }}">
                                                    <strong>{{ $product->title }}</strong></a>
                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                    <span class="ps-product__price product_price_home">
                                                        <span class="discounted-price">
                                                            {{ $discount }}
                                                            МКД
                                                        </span>
                                                        <del class="old-price text-muted">
                                                            {{ number_format($product->price, 0, ',', '.') }} МКД
                                                        </del>
                                                    </span>
                                                @else
                                                    <span
                                                        class="ps-product__price product_price_home">{{ number_format($product->price, 0, ',', '.') }}
                                                        МКД</span>
                                                @endif

                                            </div>
                                            {{-- <div class="text-center">
                    <a class="ps-btn visible-xs" style="margin-top: 10px;" href="/p/{{$product->id}}/{{$product->url}}"
                  value="{{$product->id}}"><i class="exist-minicart"></i>
              </a>
              <a class="ps-btn visible-xs" style="margin-top: 10px;" data-add-to-wish-list value="{{$product->id}}"><i class="fa fa-heart"></i></a>
            </div> --}}


                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-sm-2 hidden-xs"></div>

                </div>
                {{-- <div class="text-center mt-30"><a class="ps-btn ps-btn--black" href="#">Load more</a></div> --}}
            </div>
        </div>
    </div>

    {{-- <div class="ps-section--collection-home-2">
        <div class="ps-container-fluid">
            <div class="row text-center section_home_divider">
                <div class="col-sm-4">
                    <i class="fas fa-phone-volume"></i> Поддршка 24/7
                </div>
                <div class="col-sm-4">
                    <i class="fas fa-truck"></i> Бесплатна достава над 3.000 MKD
                </div>
                <div class="col-sm-4">
                    <i class="far fa-life-ring"></i> 100% сигурност
                </div>
            </div>
        </div>
    </div> --}}

    <div class="ps-section--collection-home-2 hidden-lg">
        <div class="ps-container-fluid">
            <div class="row">
                @foreach (\BannerHelper::getBannerByCategory('home-categories') as $key => $banner)

                    @if ($key == 1)
                        <div class="text-center col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                            <div class="ps-collection--3"><img style="width: 100%" class="below-banner-img"
                                    src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt=""><a
                                    class="ps-btn" href="{{ $banner->url }}">Види
                                    повеќе</a></div>
                        </div>
                    @break
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="ps-section--feature-products-1">
        <div class="ps-container-fluid">
            <div class="ps-section__header text-center">
                <h3 style="font-size:34px !important" class="ps-heading pb-10">Препорачани производи</h3>
            </div>
            <div class="ps-section__content pb-30">
                <div class="row">

                    <div class="col-sm-1 hidden-xs"></div>
                    <div class="col-sm-10 col-xs-12">
                        <div class="row">

                            @foreach ($recommendedArticles as $product)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="/p/{{ $product->id }}/{{ $product->url }}">
                                        <div class="ps-product--1" data-mh="product-item">
                                            <div class="ps-product__thumbnail product-image">
                                                <a href="/p/{{ $product->id }}/{{ $product->url }}"
                                                    class="product-image-link">
                                                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                        <?php
                                                        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                        if ($product->price != 0) {
                                                            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                                        }
                                                        ?>
                                                        @if (isset($discountPercentage))
                                                            <div class="ps-badge ps-badge--sale-hot ps-badge--1st">
                                                                <span>Попуст</span>
                                                            </div>
                                                        @endif
                                                    @endif

                                                    @if (\ImagesHelper::getSecondGalleryImage($product, null, 'lg_'))
                                                        <img class="product_photo"
                                                            src="{{ \ImagesHelper::getSecondGalleryImage($product, null, 'lg_') }}"
                                                            alt="">
                                                    @else
                                                        <img class="product_photo"
                                                            src="{{ \ImagesHelper::getProductImage($product, null, 'lg_') }}"
                                                            alt="">
                                                    @endif

                                                    @if (\ImagesHelper::getFirstGalleryImage($product, null, 'md_'))
                                                        <img class="product_photo_gallery"
                                                            src="{{ \ImagesHelper::getFirstGalleryImage($product, null, 'md_') }}"
                                                            alt="product">
                                                    @else
                                                        @if (\ImagesHelper::getSecondGalleryImage($product, null, 'md_'))
                                                            <img class="product_photo_gallery"
                                                                src="{{ \ImagesHelper::getSecondGalleryImage($product, null, 'lg_') }}"
                                                                alt="">
                                                        @else
                                                            <img class="product_photo_gallery"
                                                                src="{{ \ImagesHelper::getProductImage($product, null, 'lg_') }}"
                                                                alt="">
                                                        @endif
                                                    @endif
                                                    @if (auth()->user())
                                                        <a class="ps-product__wishlist" data-add-to-wish-list
                                                            value="{{ $product->id }}">
                                                            <i class="wishlist-custom far fa-heart-o"></i>
                                                        </a>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="/p/{{ $product->id }}/{{ $product->url }}">
                                                    <strong>{{ $product->title }}</strong></a>
                                                @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                    <span class="ps-product__price product_price_home">
                                                        <span class="discounted-price">
                                                            {{ $discount }}
                                                            МКД
                                                        </span>
                                                        <del class="old-price text-muted">
                                                            {{ number_format($product->price, 0, ',', '.') }} МКД
                                                        </del>
                                                    </span>
                                                @else
                                                    <span
                                                        class="ps-product__price product_price_home">{{ number_format($product->price, 0, ',', '.') }}
                                                        МКД</span>
                                                @endif

                                            </div>
                                            {{-- <div class="text-center">
                    <a class="ps-btn visible-xs" style="margin-top: 10px;" href="/p/{{$product->id}}/{{$product->url}}"
                  value="{{$product->id}}"><i class="exist-minicart"></i>
              </a>
              <a class="ps-btn visible-xs" style="margin-top: 10px;" data-add-to-wish-list value="{{$product->id}}"><i class="fa fa-heart"></i></a>
            </div> --}}


                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-sm-2 hidden-xs"></div>

                </div>
                {{-- <div class="text-center mt-30"><a class="ps-btn ps-btn--black" href="#">Load more</a></div> --}}
            </div>
        </div>
    </div>

    <div class="ps-section--collection-home-2 hidden-lg">
        <div class="ps-container-fluid">
            <div class="row">
                @foreach (\BannerHelper::getBannerByCategory('home-categories') as $key => $banner)

                    @if ($key == 2)
                        <div class="text-center col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                            <div class="ps-collection--3"><img style="width: 100%" class="below-banner-img"
                                    src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt=""><a
                                    class="ps-btn" href="{{ $banner->url }}">Види
                                    повеќе</a></div>
                        </div>
                    @break
                @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="levelek2"></div> --}}
    <div style="background-color: #f1f1f1;" class="partner-container type-carousel">
        <div class="container-fluid" style="padding: 0 0;">

            <div class="widget-image">
                <div class="banner-item text-box-overlay center-left">


                    <div class="image">
                        <a href="#">

                            <span class="image-lazysize">
                                <!-- noscript pattern -->


                                <img src="{{ url_assets('/fitactive/images/bottomBanner.jpg') }}" alt="">
                            </span>




                        </a>
                    </div>


                    {{-- <div class="text text7">


                        <div class="title bold-text" style="color: #000000; font-size: 29px;">ЛОРЕМ ипсум</div>



                        <div class="subtitle bold-text" style="color: #000000; font-size: 37px;">Лорем ипсум</div>



                        <a class="btn btn-banner" href="https://apps.apple.com/us/app/moda-mk/id1548200214"
                            style="color: #ffffff; background: #ca2028; ">Download IOS App</a>



                        <a class="btn btn-banner" href="https://play.google.com/store/apps/details?id=com.digiwrecks.modamk"
                            style="color: #ffffff; background: #ca2028; ">Download Android</a>


                    </div> --}}



                </div>

            </div>
        </div>
    </div>
@stop


@section('scripts')
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
    <script src="{{ url_assets('/fitactive/plugins/slick-new/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#main-banner').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 7000,
                prevArrow: true,
                nextArrow: true
            });

            $('#main-banner-mob').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                // prevArrow: true,
                // nextArrow: true
            });

            $('.product-image').mouseenter(function() {
                $(this).children('.product-image-link').children('.product_photo').hide();
                $(this).children('.product-image-link').children('.product_photo_gallery').show();
            })

            $('.product-image').mouseleave(function() {
                $(this).children('.product-image-link').children('.product_photo').show();
                $(this).children('.product-image-link').children('.product_photo_gallery').hide();
            })

        });
    </script>
@stop
