@extends('clients.herline.layouts.default')
@section('content')

<link rel="stylesheet" href="{{url_assets('/herline/plugins/slick-new/slick/slick.css')}}">
<link rel="stylesheet" href="{{url_assets('/herline/plugins/slick-new/slick/slick-theme.css')}}">
<style>
    #recommended {
        padding: 0 20px 0 20px;
    }

    .slick-slide {
        padding: 10px !important;
    }
</style>

<div class="content-container no-padding">
    <div class="container-full">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="row wpb_row row-fluid banner">
                        <div class="hidden-xs slideshow" id="main_banner">
                            @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
                            <div class="banner-img slide" @if($banner->url) onclick="location.href='{{ $banner->url }}'" @endif>
                                <img src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="hidden-sm hidden-md hidden-lg slideshow" id="main_banner_mob">
                            @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
                            <div class="banner-img slide" @if($banner->url) onclick="location.href='{{ $banner->url }}'" @endif>
                                <img src="{{ '/uploads/banners/' . $banner->id . '/md_' . $banner->mobile_image }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="row home-default-about">
                        <div class="col-sm-12">
                            <div class="container">
                                <div class="row offers">
                                    <div class="col-sm-6">
                                        <div class="text-center content_element align_center">
                                            <div class="single_image-wrapper box_border_grey">
                                                <img src="{{url_assets('/herline/images/banners/special-offer.jpg')}}"
                    alt="home-bg" />
                </div>
            </div>
        </div>
        <div class="col-sm-6 offer-text">
            <h2 class="custom_heading">Специјална понуда</h2>
            <h4 class="custom_heading">
                20% Попуст на категорија
            </h4>
            <div class="content_element">
                <p class="text-justify">Специјална понуда само за вас! Пред нас е најубавиот период во годината. Прво
                    нешто на што сега помисливте веројатно е пронаоѓањето на совршен костим за капење, па токму денес,
                    ве запознаваме со најубавите модели за оваа сезона. Во нашата неодолива колекција секоја девојка
                    може да си го најде својот вистински модел.
                </p>
            </div>
            <button class="btn btn-black-outline btn-lg btn-align-left" type="button">
                <span>Нарачајте сега!</span>
            </button>
        </div>
    </div>
</div>
</div>
</div> --}}
{{-- <div class="row">
                        <div class="col-sm-12">
                            <div class="container">
                                <div class="row home-default-products">
                                    @if(count($newestArticles) > 0)
                                    <div class="col-sm-12">
                                        <h2 class="text-center custom_heading">Најново</h2>
                                        <div
                                            class="separator content_element separator_align_center sep_width_10 sep_border_width_2 sep_pos_align_center separator_no_text sep_color_black">
                                            <span class="sep_holder sep_holder_l">
                                                <span class="sep_line"></span>
                                            </span>
                                            <span class="sep_holder sep_holder_r">
                                                <span class="sep_line"></span>
                                            </span>
                                        </div>
                                        <ul id="newest" class="products" data-columns="4">
                                            @foreach($newestArticles as $product)
                                            @include('clients.herline.partials.product')
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> --}}
<div class="row">
    <div class="col-sm-12">
        <div class="container">
            <div class="row home-default-products">
                <div class="col-sm-12">
                    <h2 class="text-center custom_heading">Препорачано</h2>
                    <div class="separator content_element separator_align_center sep_width_10 sep_border_width_2 sep_pos_align_center separator_no_text sep_color_black">
                        <span class="sep_holder sep_holder_l">
                            <span class="sep_line"></span>
                        </span>
                        <span class="sep_holder sep_holder_r">
                            <span class="sep_line"></span>
                        </span>
                    </div>

                    {{-- <ul id="recommended" class="products" data-columns="4">
                                            @foreach($recommendedArticles as $product)
                                            @include('clients.herline.partials.product')
                                            @endforeach
                                        </ul> --}}

                    <ul class="products columns-4" data-columns="4">
                        @foreach($recommendedArticles as $product)
                        @include('clients.herline.partials.product')
                        @endforeach
                    </ul>


                    {{-- <div class="caroufredsel product-slider" data-scroll-fx="" data-speed=""
                                            data-easing="" data-visible-min="1" data-scroll-item="" data-responsive="1"
                                            data-infinite="1" data-autoplay="0">
                                            <div class="caroufredsel-wrap">
                                                <div class="shop columns-4">
                                                    <ul class="products columns-4" data-columns="4">
                                                        @foreach($recommendedArticles as $product)
                                                        @include('clients.herline.partials.product')
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <a href="#" class="caroufredsel-prev"></a>
                                                <a href="#" class="caroufredsel-next"></a>
                                            </div>
                                        </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@if(count(\BannerHelper::getBannerByCategory('between-products')) > 0)
<div class="row wpb_row row-fluid">
    <div class="wpb_column column_container col-sm-12">
        <div class="wpb_wrapper">
            <div class="container">
                <div class="row wpb_row inner row-fluid home-default-ads">
                    @foreach (\BannerHelper::getBannerByCategory('between-products') as $banner)
                    <div class="wpb_column column_container col-sm-6 col-xs-6 col-md-6 col-lg-6">
                        <div class="wpb_wrapper">
                            <div class="wpb_single_image content_element align_center margin_bottom_0">
                                <div class="wpb_wrapper">
                                    <a href="{{ $banner->url }}">
                                        <div class="single_image-wrapper   box_border_grey">
                                            <img src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt="{{ $banner->title }}" />
                                        </div>
                                    </a>
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
<div class="row">
    <div class="col-sm-12">
        <div class="container">
            <div class="row home-default-products">
                <div class="col-sm-12">
                    <h2 class="text-center custom_heading">Најпродавано</h2>
                    <div class="separator content_element separator_align_center sep_width_10 sep_border_width_2 sep_pos_align_center separator_no_text sep_color_black">
                        <span class="sep_holder sep_holder_l">
                            <span class="sep_line"></span>
                        </span>
                        <span class="sep_holder sep_holder_r">
                            <span class="sep_line"></span>
                        </span>
                    </div>
                    <ul class="products columns-4" data-columns="4">
                        @foreach($bestSellersArticles as $product)
                        @include('clients.herline.partials.product')
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@if(count($lastBlogs) > 0)
<div class="row wpb_row row-fluid">
    <div class="wpb_column column_container col-sm-12">
        <div class="wpb_wrapper">
            <div class="container">
                <div class="row wpb_row inner row-fluid home-default-blog">
                    <div class="wpb_column column_container col-sm-12">
                        <div class="wpb_wrapper">
                            <h2 class="text-center custom_heading">Новости</h2>
                            <div class="separator content_element separator_align_center sep_width_10 sep_border_width_2 sep_pos_align_center separator_no_text sep_color_black">
                                <span class="sep_holder sep_holder_l">
                                    <span class="sep_line"></span>
                                </span>
                                <span class="sep_holder sep_holder_r">
                                    <span class="sep_line"></span>
                                </span>
                            </div>
                            <div class="wpb_text_column content_element ">
                                <div class="wpb_wrapper">
                                    <p class="text-center">
                                        Platea hac egestas himenaeos mi non libero lacus mollis, a
                                        lacinia dapibus turpis curae neque ut fringilla lacinia,
                                        feugiat non eu
                                    </p>
                                    <p class="text-center">
                                        nostra tristique vulputate consectetur.
                                    </p>
                                </div>
                            </div>
                            <div class="posts masonry" data-paginate="no" data-layout="masonry" data-masonry-column="3">
                                <div class="posts-wrap masonry-wrap posts-layout-masonry row">

                                    @foreach($lastBlogs as $blog)
                                    @include('clients.herline.partials.blog')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(isset($instagramItems))
<div class="row instagram-wrapper">
    <div class="col-sm-12">
        <div class="icon_element icon_element-outer icon_element-align-center">
            <div class="icon_element-inner icon_element-size-lg">
                <span class="icon_element-icon fa fa-instagram"></span>
            </div>
        </div>
        <div class="title">
            <h3 class="text-center margin_bottom_35">@herline</h3>
        </div>
        <div class="instagram">
            <div class="instagram-wrap">
                <div class="caroufredsel caroufredsel-item-no-padding" data-height="variable" data-scroll-fx="scroll" data-scroll-item="1" data-visible-min="1" data-visible-max="6" data-responsive="1" data-infinite="1" data-autoplay="0" data-circular="1">
                    <div class="caroufredsel-wrap">
                        <ul class="caroufredsel-items row">
                            <?php $counter = 0 ?>
                            @foreach($instagramItems->data as $instagramPost)
                            <?php $counter = $counter + 1 ?>
                            <li class="caroufredsel-item col-lg-2 col-sm-3 col-xs-6 text-center">
                                <a href="{{ $instagramPost->link }}" target="_blank" class="insta-image">
                                    <img src="{{ $instagramPost->images->standard_resolution->url }}" class="insta_img" alt="insta-1">
                                    <div class="overlay"></div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <a href="#" class="caroufredsel-prev"></a>
                        <a href="#" class="caroufredsel-next"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="footer-services">
    <div class="container">
        <div class="row services_footer">
            <div class="col-sm-4 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-send-o"></i>
                    <h3 class="footer-service-title">Бесплатна достава</h3>
                    <span class="footer-service-text">над 1500 мкд.</span>
                </a>
            </div>
            <div class="col-sm-4 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-life-bouy"></i>
                    <h3 class="footer-service-title">Гаранција</h3>
                    <span class="footer-service-text">
                        рок на враќање 15 дена.
                    </span>
                </a>
            </div>
            <div class="col-sm-4 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-clock-o"></i>
                    <h3 class="footer-service-title">Рок на достава</h3>
                    <span class="footer-service-text">
                        3-7 работни дена.
                    </span>
                </a>
            </div>
            <div class="col-sm-4 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-home"></i>
                    <h3 class="footer-service-title">Безбедно и Сигурно</h3>
                    <span class="footer-service-text">
                        Безбедна достава низ цела Македонија.
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

@stop

@section('scripts')
<script src="{{url_assets('/herline/plugins/slick-new/slick/slick.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(window).resize(function() {
            if ($(window).width() > 991 && $(window).width() < 1100)
                $("._2p3a").css("width", "200px");
        });


        $('#main_banner').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplay: true,
            speed: 300,
        });

        $('#main_banner_mob').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplay: true,
            speed: 300,
        });

        $('#recommended').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        $('#newest').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        $('#best-sellers').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    })
</script>
@stop