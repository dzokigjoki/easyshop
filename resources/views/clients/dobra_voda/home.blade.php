@extends('clients.dobra_voda.layouts.default')



@section('style')
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ url_assets('/dobra_voda/css/plugins/slick.css') }}">
@stop
@section('content')





    @if (!Cookie::get('loader'))
        <div class="loading">
            <div class="text-center middle">
                <span class="loader">
                    <span class="loader-inner"></span>
                </span>
            </div>
        </div>
    @endif

    @if (!Cookie::get('loader'))
        <?php Cookie::queue('loader', 'cookie_created', 35); ?>
    @endif

    <div class="slider-area slider-area-2">

        <!-- Large modal -->
        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                    <div class="headerModal">
                        <div class="headerHeading">
                            <h1 class="headerInfo">НОВО на</h1>
                            <img class="magstoreLogo" src="{{ url_assets('/dobra_voda/images/logo1.png') }}" alt="Novo">
                        </div>
                        <p class="headerPara" style="font-size: 1.5rem;">Ултра премиум руска вотка Hammer + Sickle <br> и извонредно ирско виски The Irishman</p>
                    </div>
                    <div class="row contentPopup">
                        <div class="logoAlcohol">
                            <a href="https://magstore.mk/c/19/votka">
                                <img src="{{ url_assets('/dobra_voda/images/vodkalogo.png') }}" alt="Vodka"></a>
                            </a>
                        </div>
                        <div class="col-lg-4 viski">
                            <a href="https://magstore.mk/p/77/votka-hammer-sickle-175l">
                                <img src="{{ url_assets('/dobra_voda/images/vodka1.jpg') }}" alt="Vodka"></a>
                            </a>
                        </div>
                        <div class="col-lg-4 viski">
                            <a href="https://magstore.mk/p/75/votka-hammer-sickle-075l">
                                <img src="{{ url_assets('/dobra_voda/images/vodka2.jpg') }}" alt="Vodka"></a>
                            </a>
                        </div>
                        <div class="col-lg-4 viski">
                            <a href="https://magstore.mk/p/76/votka-hammer-sickle-1l">
                                <img src="{{ url_assets('/dobra_voda/images/vodka3.png') }}" alt="Vodka"></a>
                            </a>
                        </div>
                    </div>
                    <div class="row contentPopup">
                        <div class="logoAlcohol">
                            <a href="https://magstore.mk/c/18/viski">
                                <img src="{{ url_assets('/dobra_voda/images/irishman-logo.png') }}" alt="Viski"></a>
                            </a>
                        </div>
                        <div class="col-lg-4 viski">
                            <a href="https://magstore.mk/p/78/the-irishman-founders-reserve-07l">
                                <img src="{{ url_assets('/dobra_voda/images/slika1.png') }}" alt="Viski"></a>
                            </a>
                        </div>
                        <div class="col-lg-4 viski">
                            <a href="https://magstore.mk/p/80/the-irishman-single-malt-12-yo-07l">
                                <img src="{{ url_assets('/dobra_voda/images/slika2.png') }}" alt="Viski"></a>
                            </a>
                        </div>
                        <div class="col-lg-4 viski">
                            <a href="https://magstore.mk/p/79/the-irishman-single-malt-07l">
                                <img src="{{ url_assets('/dobra_voda/images/slika3.png') }}" alt="Viski"></a>
                            </a>
                        </div>
                    </div>
            <div class="kopcinja">  
                <button class="buttonStyle" id="button"> <a href="https://magstore.mk/c/17/alkoholni-pijalaci"
                        style="color: white; text-decoration: none;">Види повеќе</a></button>
                <br>  
                <button id="closeModal">Продолжи кон страната</button> 
                </div> 
              </div>
            </div>
          </div>

        {{-- <div id="modalOverlay">
            <div class="modalPopup">
                <div class="headerBar">

                </div>
                <div class="modalContent">
                    <h1>НОВО на <img src="{{ url_assets('/dobra_voda/images/logo1.png') }}" alt="Pekabesko"
                            class="logo-type-2" height="130"
                            style="max-width: 50%; height: 66px; padding-bottom: 5px;"></a></h1>

                    <p style="font-size: 23px;">Ултра премиум руска вотка Hammer + Sickle и
                        <br>
                        извонредно ирско виски The Irishman</p>



                    <div class="headerBar">
                        <a href="https://magstore.mk/c/19/votka">
                            <img src="{{ url_assets('/dobra_voda/images/vodkalogo.png') }}" alt="Pekabesko"
                                class="logo-type-2" height="130" style="position: relative;bottom: 18px;"></a>
                        </a>

                    </div>
                    <div class="row red" style="margin-top: -30px;">
                        <div class="col-lg-4 viski offset-lg-1">
                            <a href="https://magstore.mk/p/77/votka-hammer-sickle-175l">
                                <img src="{{ url_assets('/dobra_voda/images/vodka1.jpg') }}" alt="Vodka"
                                    class="logo-type-2" height="130"></a>
                            </a>

                        </div>
                        <div class="col-lg-4 viski offset-lg-1">
                            <a href="https://magstore.mk/p/75/votka-hammer-sickle-075l">
                                <img src="{{ url_assets('/dobra_voda/images/vodka2.jpg') }}" alt="Vodka"
                                    class="logo-type-2" height="130"></a>
                            </a>

                        </div>
                        <div class="col-lg-4 viski offset-lg-1">
                            <a href="https://magstore.mk/p/76/votka-hammer-sickle-1l">
                                <img src="{{ url_assets('/dobra_voda/images/vodka3.png') }}" alt="Vodka"
                                    class="logo-type-2" height="130" style="width: 178px;"></a>
                            </a>

                        </div>
                    </div>
                    <div class="headerBar">
                        <a href="https://magstore.mk/c/18/viski">
                            <img src="{{ url_assets('/dobra_voda/images/irishman-logo.png') }}" alt="Pekabesko"
                                class="logo-type-2" height="130" style="max-width: 50%;height: 116px;width: 167px;"></a>
                        </a>

                    </div>
                    <div class="row red">
                        <div class="col-lg-4 viski offset-lg-1">
                            <a href="https://magstore.mk/p/78/the-irishman-founders-reserve-07l">
                                <img src="{{ url_assets('/dobra_voda/images/slika1.png') }}" alt="Whiskey"
                                    class="logo-type-2" height="130"></a>
                            </a>

                        </div>
                        <div class="col-lg-4 viski offset-lg-1">
                            <a href="https://magstore.mk/p/80/the-irishman-single-malt-12-yo-07l">
                                <img src="{{ url_assets('/dobra_voda/images/slika2.png') }}" alt="Whiskey"
                                    class="logo-type-2" height="130"></a>
                            </a>

                        </div>
                        <div class="col-lg-4 viski offset-lg-1">
                            <a href="https://magstore.mk/p/79/the-irishman-single-malt-07l">
                                <img src="{{ url_assets('/dobra_voda/images/slika3.png') }}" alt="Whiskey"
                                    class="logo-type-2" height="130"></a>
                            </a>

                        </div>
                    </div>

                    <div class="kopcinja">
                         
                        <button class="buttonStyle" id="button"> <a href="https://magstore.mk/c/17/alkoholni-pijalaci"
                                style="color: white; text-decoration: none;">Види повеќе</a></button>
                        <br> 
                        <a href="#" class="modal-close" aria-hidden="true"></a> 
                        <button  id="buttons">
                            Продолжи кон страната</button> 
                    </div> 
                    {{-- text-decoration: none; --}}
                    {{-- margin-top: 10px; --}}
                    {{-- font-size: 15px;  --}}

                </div>
            </div>
        </div>



        <div class="quicky-element-carousel home-slider home-slider-2 arrow-style" data-slick-options='{
                                        "slidesToShow": 1,
                                        "slidesToScroll": 1,
                                        "infinite": true,
                                        "arrows": false,
                                        "dots": true,
                                        "autoplay": true,
                                        "autoplaySpeed" : 5000,
                                        "pauseOnHover" : false,
                                        "pauseOnFocus" : false 
                                        }' data-slick-responsive='[
                                        {"breakpoint":768, "settings": {
                                        "slidesToShow": 1
                                        }},
                                        {"breakpoint":575, "settings": {
                                        "slidesToShow": 1
                                        }}
                                    ]'>
            <a href="/c/19/votka">
                <div class="slide-item animation-style-02 position-relative bg-8">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/c/18/viski">
                <div class="slide-item animation-style-02 position-relative bg-9">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/c/8/prirodna-izvorska-voda">
                <div class="slide-item animation-style-01 position-relative bg-2">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                        <h2 class="text_banner freestyle-script display_block">Голтка здрав живот</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/c/9/prirodna-mineralna-voda">
                <div class="slide-item animation-style-02 position-relative bg-3">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                        <h2 class="text_banner freestyle-script dark_blue">Шише полно живот</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </a><a href="/c/10/gazirana-funkcionalna-voda">
                <div class="slide-item animation-style-02 position-relative bg-5">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                        <h2 class="text_banner freestyle-script orange">Повеќе од вода</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/c/14/pivo">
                <div class="slide-item animation-style-02 position-relative bg-4">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                        <h2 class="text_banner freestyle-script">Произведено во Чешка</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/c/15/med">
                <div class="slide-item animation-style-02 position-relative bg-6">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                        <h2 class="text_banner freestyle-script orange">Мед</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/c/15/med">
                <div class="slide-item animation-style-02 position-relative bg-7">
                    <div class="text_banner_container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- Slider Area Two End Here -->

    <!-- Begin Service Area -->
    <div class="service_area_desktop_1">

        <a class="odberi_proizvod" href="/allCategories">
        </a>

    </div>
    <!-- <div class="service-area pt-60 pb-30 service_area_mobilen">
                            <div class="container">
                                <div class="row">
                                    <div class="quicky-element-carousel width_100" data-slick-options='{
                                        "slidesToShow": 1,

                                                "slidesToScroll": 1,
                                                "infinite": true,
                                                "arrows": false,
                                                "autoplay" : true,
                                                "dots": false,
                                                "spaceBetween": 30
                                                }' data-slick-responsive='[
                                                {"breakpoint":992, "settings": {
                                                "slidesToShow": 1
                                                }},
                                                {"breakpoint":480, "settings": {
                                                "slidesToShow": 1
                                                }}
                                            ]'>

                                        <div class="col-12">
                                            <div class="service-item">
                                                <div class="service-img">
                                                    <img class="service_img" src="{{ url_assets('/dobra_voda/images/service/1.png') }}" alt="">
                                                </div>
                                                <div class="service-content">
                                                    <h3 class="heading">Одбери производ</h3>
                                                    <p class="short-desc"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="service-item">
                                                <div class="service-img">
                                                    <img class="service_img" src="{{ url_assets('/dobra_voda/images/service/2.png') }}" alt="">
                                                </div>
                                                <div class="service-content">
                                                    <h3 class="heading">Плати онлајн</h3>
                                                    <p class="short-desc">Сигурно и едноставно плаќање преку интернет</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="service-item">
                                                <div class="service-img">
                                                    <img class="service_img" src="{{ url_assets('/dobra_voda/images/service/3.png') }}" alt="">
                                                </div>
                                                <div class="service-content">
                                                    <h3 class="heading">Брза достава</h3>
                                                    <p class="short-desc">Брза и навремена достава на територија на цела Македонија</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div> -->

    <!-- <div class="banner-area-4 pt-30 pb-30 bottles_desktop">
                            <div class="container">
                                <div class="row">
                                    <div class="col-8 custom-xxs-col">
                                        <div class="row banner-wrap">
                                            <div class="col-6 custom-xxs-col">
                                                <div class="banner-item">
                                                    <div class="banner-img">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ url_assets('/dobra_voda/images/banner/ladna.jpg') }}" alt="none">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 custom-xxs-col">
                                                <div class="banner-item">
                                                    <div class="banner-img">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ url_assets('/dobra_voda/images/banner/dobra.jpg') }}" alt="none">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row banner-wrap">
                                            <div class="col-12">
                                                <div class="banner-item">
                                                    <div class="banner-img">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ url_assets('/dobra_voda/images/banner/bud.jpg') }}" alt="none">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 custom-xxs-col">
                                        <div class="row"></div>
                                        <div class="banner-item">
                                            <div class="banner-img">
                                                <a href="javascript:void(0)">
                                                    <img class="pb-15 bottles_img" src="{{ url_assets('/dobra_voda/images/Slika1_1.jpg') }}" alt="none">
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <img class="pb-15 bottles_img" src="{{ url_assets('/dobra_voda/images/Slika2.jpg') }}" alt="none">
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <img class="bottles_img" src="{{ url_assets('/dobra_voda/images/Slika3.jpg') }}" alt="none">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
    <!-- Begin Banner Area Four -->
    <!-- <div class="banner-area-4 bottles_mobilen">
                            <div class="container">
                                <div class="ps-product__divider"></div>
                                <div class="row text_align_center">
                                    <div class="col-4">
                                        <div class="row banner-wrap">
                                            <div class="col-12">
                                                <div class="banner-item">
                                                    <div class="banner-img">
                                                        <a href="javascript:void(0)">
                                                            <img class="width_75" src="{{ url_assets('/dobra_voda/images/banner/1.jpg') }}" alt="none">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row banner-wrap">
                                            <div class="col-12">
                                                <div class="banner-item">
                                                    <div class="banner-img">
                                                        <a href="javascript:void(0)">
                                                            <img class="width_75" src="{{ url_assets('/dobra_voda/images/banner/2.jpg') }}" alt="none">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row banner-wrap">
                                            <div class="col-12">
                                                <div class="banner-item">
                                                    <div class="banner-img">
                                                        <a href="javascript:void(0)">
                                                            <img class="width_75" src="{{ url_assets('/dobra_voda/images/banner/3.jpg') }}" alt="none">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product__divider"></div>
                            </div>
                        </div> -->
    <!-- Banner Area Four End Here -->

    <!-- Begin Product Area -->

    @if (count($exclusiveArticles) > 0)
        <div class="product-area-4 pt-60 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3 class="heading pb-10">Производи на акција</h3>
                            <p class="short-desc">Погледнете ги нашите производи на акција и нарачајте веднаш!</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="quicky-element-carousel product-slider" data-slick-options='{
                                                    "slidesToShow": 4,
                                                    "slidesToScroll": 1,
                                                    "infinite": false,
                                                    "arrows": false,
                                                    "autoplay" : true,
                                                    "dots": false,
                                                    "spaceBetween": 30
                                                    }' data-slick-responsive='[
                                                    {"breakpoint":992, "settings": {
                                                    "slidesToShow": 2
                                                    }},
                                                    {"breakpoint":480, "settings": {
                                                    "slidesToShow": 2
                                                    }}
                                                ]'>

                            @foreach ($exclusiveArticles as $product)
                                <?php
                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                ?>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="/p/{{ $product->id }}/{{ $product->url }}">
                                                <img src="{{ \ImagesHelper::getProductImage($product, null, 'md_') }}"
                                                    alt=""></a>
                                            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                <?php
                                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                                ?>
                                                <span class="sticker-2">-{{ (int) $discountPercentage }}%</span>
                                            @endif
                                            <div class="add-actions hover-right_side">
                                                <ul>
                                                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                        <li class="quick-view-btn" data-toggle="modal"
                                                            data-product="{{ json_encode($product) }}"
                                                            data-newprice="{{ $discount }} МКД"
                                                            data-oldprice="{{ number_format($product->price, 0, ',', '.') }} МКД"
                                                            data-image="{{ \ImagesHelper::getProductImage($product, null, 'md_') }}"
                                                            data-title="{{ $product->title }}"
                                                            data-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                                data-toggle="tooltip" data-placement="left"
                                                                title="Quick View"><i class="icon-magnifier"></i></a>
                                                        </li>
                                                    @else
                                                        <li class="quick-view-btn" data-toggle="modal"
                                                            data-product="{{ json_encode($product) }}"
                                                            data-newprice="{{ number_format($product->price, 0, ',', '.') }} МКД"
                                                            data-image="{{ \ImagesHelper::getProductImage($product, null, 'md_') }}"
                                                            data-title="{{ $product->title }}"
                                                            data-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                                data-toggle="tooltip" data-placement="left"
                                                                title="Quick View"><i class="icon-magnifier"></i></a>
                                                        </li>
                                                    @endif
                                                    <li><a href="#" value="{{ $product->id }}" data-add-to-cart=""><i
                                                                class="icon-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h3 class="product-name"><a
                                                        href="/p/{{ $product->id }}/{{ $product->url }}">{{ $product->title }}</a>
                                                </h3>
                                                <div class="price-box">
                                                    @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                                        <span
                                                            class="old-price">{{ number_format($product->price, 0, ',', '.') }}
                                                            МКД</span>
                                                        <span class="new-price">{{ $discount }} МКД</span>
                                                    @else
                                                        <span
                                                            class="new-price">{{ number_format($product->price, 0, ',', '.') }}
                                                            МКД</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade modal-wrapper" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area sp-area row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="sp-img_area">
                                <img id="image_modal" src="" alt="Quicky's Product Image">

                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="sp-content">
                                <div class="sp-essential_stuff">
                                    <h4 class="pb-30" id="title_modal"></h4>
                                    <div class="price-box pb-60">
                                        <span class="old-price" id="old_price_modal"></span>
                                        <span class="new-price" id="new_price_modal"></span>

                                    </div>
                                    <h5>Опис:</h5>
                                    <div id="description_modal"></div>
                                </div>
                                <div class="quicky-group_btn">
                                    <ul>
                                        <li><a href="#" id="modal_button" data-add-to-cart="" class="add-to_cart">Додади
                                                во кошничка</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quicky's Modal Area End Here -->
    <!-- Scroll To Top Start -->
@stop

@section('scripts')
    <!-- Slick Slider JS -->
    <script src="{{ url_assets('/dobra_voda/js/plugins/slick.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            console.log($("#modalce").text());
            $("#modalce").on("click", function() {});
            $('#exampleModalCenter').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var product = button.data('product');
                var newprice = button.data('newprice');
                var oldprice = button.data('oldprice');
                var image_modal = button.data('image');
                var modal = $(this);
                modal.find('.modal-body #image_modal').attr('src', image_modal);
                modal.find('.modal-body #modal_button').attr('value', product['id']);
                modal.find('.modal-body #title_modal').text(product['title']);
                modal.find('.modal-body #description_modal').html(product['description']);
                if (!(typeof oldprice === "undefined")) {

                    modal.find('.modal-body #old_price_modal').text(oldprice);
                } else {

                    modal.find('.modal-body #old_price_modal').remove();
                }
                modal.find('.modal-body #new_price_modal').text(newprice);
            })
        });
    </script>
    <script>
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
        $('#closeModal').on('click', function() {
            $('#myModal').modal('hide');
        });
    </script>
    <div id="alertCookiePolicy" class="alert-cookie-policy">
        <div class="alert alert-secondary mb-0  align-items-center " role="alert">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span class="mr-auto">Веб страната на MagStore користи колачиња за да се осигура дека ќе го
                        добиете
                        најдоброто искуство на нашата веб страна.Прочитајте ја нашата политика на колачиња на следниот
                        <a href="/politika-na-kolacinja" class="alert-link">линк</a></span>
                </div>
                <div class="col-sm-12 button-cookie ">
                    <button id="btnAcceptCookiePolicy" class="btn btn-primary align-center button-mar "
                        data-dismiss="alert" type="button" aria-label="Close">Се согласувам</button>
                    <button id="btnDeclineCookiePolicy" class="btn btn-light align-center  " data-dismiss="alert"
                        type="button" aria-label="Close">Не се согласувам</button>
                </div>
            </div>


        </div>





        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
        <script src="{{ url_assets('/pekabesko/js/jquery-ui.min.js') }}"></script>
        <!-- samo za vo kontakt -->
        <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCOJxqBTpjRXdgM8UM0UXuLCmK_AKF9NPs"></script>
        <script src="{{ url_assets('/pekabesko/js/jarallax.js') }}"></script>
        <!-- samo za vo kontakt -->
        <script type="application/javascript" src="https://server/cookies.js"></script>
        <script src="{{ url_assets('/pekabesko/js/jscolor.min.js') }}"></script>
        <script src="{{ url_assets('/pekabesko/js/jquery.knob.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="{{ url_assets('/pekabesko/js/jquery.throttle.js') }}"></script>
        <script src="{{ url_assets('/pekabesko/js/jquery.classycountdown.js') }}"></script>
        <script src="{{ url_assets('/pekabesko/js/all.js') }}"></script>
        <script src="{{ url_assets('/pekabesko/js/color.picker.js') }}"></script>

    @stop
