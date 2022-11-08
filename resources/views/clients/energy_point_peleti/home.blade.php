@extends('clients.energy_point_peleti.layouts.default')
@section('content')

<link rel="stylesheet" href="{{url_assets('/energy_point_peleti/plugins/slick-new/slick/slick.css')}}">
<link rel="stylesheet" href="{{url_assets('/energy_point_peleti/plugins/slick-new/slick/slick-theme.css')}}">
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
                        <div class="wpb_column column_container col-sm-12">
                            <div class="wpb_wrapper">
                                <div id="banner-slider" data-autorun="yes" data-duration="6000" class="carousel slide fade dhslider dhslider-custom " data-height="650">
                                    <div class="dhslider-loader">
                                        <div class="fade-loading">
                                            <i></i><i></i><i></i><i></i>
                                        </div>
                                    </div>
                                    <div class="carousel-inner dhslider-wrap">
                                        <div class="item slider-item active">
                                            <div class="slide-bg slide-bg-1"></div>
                                            <div class="slider-caption caption-align-left">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row home-default-about">
                        <div class="col-sm-12">
                            <div class="container">
                                <div class="row offers">
                                    <div class="col-sm-6">
                                        <div class="text-center content_element align_center">
                                            <div class="single_image-wrapper box_border_grey">
                                                <img src="{{url_assets('/energy_point_peleti/images/banners/special-offer.jpg')}}"
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
                <p class="text-justify">Специјална понуда само за вас! Пред нас е најубавиот период во годината. Прво нешто на што сега помисливте веројатно е пронаоѓањето на совршен костим за капење, па токму денес, ве запознаваме со најубавите модели за оваа сезона. Во нашата неодолива колекција секоја девојка може да си го најде својот вистински модел.
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
                                            @include('clients.energy_point_peleti.partials.product')
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> --}}
<div class="footer-services custom_heading_top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center custom_heading">Зошто да одберете пелети?</h2>
                <div class="separator content_element separator_align_center sep_width_10 sep_border_width_2 sep_pos_align_center separator_no_text sep_color_black">
                    <span class="sep_holder sep_holder_l">
                        <span class="sep_line"></span>
                    </span>
                    <span class="sep_holder sep_holder_r">
                        <span class="sep_line"></span>
                    </span>
                </div>
            </div>


            <div class="col-sm-6 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-globe"></i>
                    <h3 class="footer-service-title">Енергетска ефикасност</h3>
                    <span class="footer-service-text">
                        Енергетска ефикасност всушност значи извршување иста или поголема низа активности со иста
                        или помала количина потрошена енергија (електрична, топлинска, светлосна, кинетичка)
                        и со помала емисија на јаглерод диоксид во атмосферата.
                    </span>
                </a>
            </div>
            <div class="col-sm-6 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-leaf"></i>
                    <h3 class="footer-service-title">Поквалитетна животна средина</h3>
                    <span class="footer-service-text">
                        Енергетската ефикасност доведува до поквалитетна животна средина
                        и го намалува ризикот од разни болести предизвикани
                        од штетни материи кои се резултат на енергетското производство.
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
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
                                            @include('clients.energy_point_peleti.partials.product')
                                            @endforeach
                                        </ul> --}}

                    <ul class="products columns-4" data-columns="4">
                        @foreach($recommendedArticles as $product)
                        @include('clients.energy_point_peleti.partials.product')
                        @endforeach
                    </ul>


                    {{-- <div class="caroufredsel product-slider" data-scroll-fx="" data-speed=""
                                            data-easing="" data-visible-min="1" data-scroll-item="" data-responsive="1"
                                            data-infinite="1" data-autoplay="0">
                                            <div class="caroufredsel-wrap">
                                                <div class="shop columns-4">
                                                    <ul class="products columns-4" data-columns="4">
                                                        @foreach($recommendedArticles as $product)
                                                        @include('clients.energy_point_peleti.partials.product')
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
<div class="row wpb_row row-fluid">
    <div class="wpb_column column_container col-sm-12">
        <div class="wpb_wrapper">
            <div class="container">
                <div class="row wpb_row inner row-fluid home-default-ads">
                    <div class="wpb_column column_container col-sm-6 col-xs-6 col-md-6 col-lg-6">
                        <div class="wpb_wrapper">
                            <div class="wpb_single_image content_element align_center margin_bottom_0">
                                <div class="wpb_wrapper">
                                    <a href="http://energy_point_peleti.mk/c/7/dvodelni">
                                        <div class="single_image-wrapper   box_border_grey">
                                            <img src="https://via.placeholder.com/570x485" alt="Energy Point Peleti" />
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column column_container col-sm-6 col-xs-6 col-md-6 col-lg-6">
                        <div class="wpb_wrapper">
                            <div class="wpb_single_image content_element align_center margin_bottom_0">
                                <div class="wpb_wrapper">
                                    <a href="http://energy_point_peleti.mk/c/6/ednodelni">
                                        <div class="single_image-wrapper  box_border_grey">
                                            <img src="https://via.placeholder.com/570x485" alt="Energy Point Peleti" />
                                        </div>
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
                        @include('clients.energy_point_peleti.partials.product')
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
                                    @include('clients.energy_point_peleti.partials.blog')
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
            <h3 class="text-center margin_bottom_35">@energy_point_peleti</h3>
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
        <div class="row">
            <div class="col-sm-4 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-send-o"></i>
                    <h3 class="footer-service-title">Бесплатна достава</h3>
                    {{-- <span class="footer-service-text">над 1000 мкд.</span> --}}
                </a>
            </div>
            <div class="col-sm-4 footer-service-item">
                <a class="footer-service-item-i" href="#">
                    <i class="footer-service-icon fa fa-life-bouy"></i>
                    <h3 class="footer-service-title">Гаранција</h3>
                    <span class="footer-service-text">
                        рок на враќање 30 дена.
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
<script src="{{url_assets('/energy_point_peleti/plugins/slick-new/slick/slick.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(window).resize(function() {
            if ($(window).width() > 991 && $(window).width() < 1100)
                $("._2p3a").css("width", "200px");
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