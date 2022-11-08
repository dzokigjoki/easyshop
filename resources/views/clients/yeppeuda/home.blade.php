@extends('clients.yeppeuda.layouts.default')
@section('content')


<style id='marra-style-inline-css' type='text/css'>
    #qodef-page-inner {
        padding: 0px 60px 0px 60px;
    }

    @media only screen and (max-width: 1024px) {
        #qodef-page-inner {
            padding: 0px 20px 0px 20px;
        }
    }


    .modal-dialog {
        position: absolute;
        left: 50%;
        z-index: 9999;
        top: 50%;
        transform: translate(-50%, -50%) !important;
    }

    .close {
        position: relative;
        bottom: 35px;
        left: 10px;
        color: slategrey;
        font-size: 35px;
    }

    #qodef-top-area {
        background-color: rgba(255, 255, 255, 0);
    }

    #qodef-top-area-inner {
        padding-left: 60px;
        padding-right: 60px;
    }

    #qodef-top-area-wrapper {
        border-bottom-color: #cccccc;
        border-bottom-width: 1px;
    }

    .qodef-page-title {
        background-image: url(https://marra.qodeinteractive.com/wp-content/uploads/2020/08/portfolio-single.jpg);
    }

    .qodef-header--standard #qodef-page-header {
        height: 110px;
    }

    .modal-content,
    .modal-body,
    .newsletter-modal {
        background: #D0C8F7;
    }

    .modal-body {
        margin: 10px;
        padding: 30px 15px;
        border: 3.5px solid white;
    }

    .modal input[type="email"] {
        background-color: white;
        border: 1px solid grey;
    }

    .qodef-header--standard #qodef-page-header-inner {
        padding-left: 60px;
        padding-right: 60px;
    }

    #newsletter-form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

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

            @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
            <div style="position: relative">
                <a href="{{ $banner->url }}">
                    <img class="bannerdesktop" src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}">
                </a>
                <a href="{{ $banner->url }}">
                    <img class="bannermob" src="{{ '/uploads/banners/' . $banner->id . '/md_' . $banner->mobile_image }}">
                </a>
                <div class="text-banner">
                    <div>
                        <a href="/c/21/proizvodi" class="btn btn-banner-dark">Производи</a>
                        <a href="/c/4/brendovi" class="btn btn-banner-light">Брендови</a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </section>


    <section class="section-brands">
        <div class="brands-slider">
            <div class="text-center brand-item">
                <a href="/c/35/apieu">
                    <img src="{{ url_assets('/yeppeuda/img/brands/1.jpg')}}" alt="">

                </a>
            </div>
            <div class="text-center brand-item">
                <a href="/c/38/dr-jart">
                    <img src=" {{ url_assets('/yeppeuda/img/brands/4.jpg')}}" alt="">
                </a>
            </div>
            <div class="text-center brand-item">
                <a href="/c/34/haruharu">
                    <img src="{{ url_assets('/yeppeuda/img/brands/5.jpg')}}" alt="">
                </a>
            </div>
            <div class="text-center brand-item">
                <a href="/c/40/heimish">
                    <img src="{{ url_assets('/yeppeuda/img/brands/6.jpg')}}" alt="">
                </a>
            </div>
            <div class="text-center brand-item">
                <a href="/c/33/banila-co">
                    <img src="{{ url_assets('/yeppeuda/img/brands/2.jpg')}}" alt="">
                </a>
            </div>
            <div class="text-center brand-item">
                <a href="/c/37/beauty-of-joseon">
                    <img src="{{ url_assets('/yeppeuda/img/brands/3.jpg')}}" alt="">
                </a>
            </div>
            <div class="text-center brand-item">
                <a href="/c/42/nacific">
                    <img src="{{ url_assets('/yeppeuda/img/brands/8.jpg')}}" alt="">
                </a>
            </div>
            <div class="text-center brand-item">
                <a href="/c/39/skinrx-lab">
                    <img src="{{ url_assets('/yeppeuda/img/brands/9.jpg')}}" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- end hero slider -->

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
                    @include('clients.yeppeuda.partials.product')
                </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- end trendy products -->
    <div class="container">
        <div class="row">
            <div class="col-xs-4 width_100_xxs">
                <a class="img_wrapper" href="/c/28/kremi">
                    <img src="{{ url_assets('/yeppeuda/img/home/bottom-left.jpg') }}" alt="">
                    <div>
                        <h1>
                            КРЕМИ
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-xs-4 width_100_xxs">
                <a class="img_wrapper" href="/kviz">
                    <img src="{{ url_assets('/yeppeuda/img/home/bottom-middle.jpg') }}" alt="">
                    <div>
                        <h1 class="hover_heading">
                            КВИЗ
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-xs-4 width_100_xxs">
                <a class="img_wrapper" href="/c/22/chistachi">
                    <img src="{{ url_assets('/yeppeuda/img/home/bottom-right.jpg') }}" alt="">
                    <div>
                        <h1>
                            ЧИСТАЧИ
                        </h1>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <section class="section-wrap-sm new-arrivals pb-50 pt-50">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading">Погледни ги нашите најнови производи</span>
                    <h2 class="heading bottom-line">Најнови производи</h2>
                </div>
            </div>


            <div class="row items-grid products-slider">
                @foreach($newestArticles as $product)
                <div class="product-padding">
                    @include('clients.yeppeuda.partials.product')
                </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- Newsletter -->

    <section id="newsletter" class="newsletter" id="subscribe">
        <div class="container">
            <div class="row">
                @if(session()->has('success'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                </div>
                @endif
                @if(session()->has('error'))
                <div class="col-12">
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                </div>
                @endif
                <div class="col-sm-12 text-center">
                    <h4 class="col-sm-12">Бидете во тек со новостите и промоциите на Yeppeuda.</h4>
                    <form id="newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}" class="col-sm-12 d-flex justify-content-center relative newsletter-form">

                        {{csrf_field()}}

                        <input type="email" name="email" class="newsletter-input" placeholder="Внесете ја вашата е-пошта">
                        <div style="padding-bottom: 17px;" class="g-recaptcha" data-sitekey="{{ \EasyShop\Models\AdminSettings::getField('recaptchaSitekey') }}"></div>
                        <input type="submit" class="btn btn-lg btn-dark" value="Претплати се">
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{--  <div id="exampleModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <section class="newsletter-modal" id="subscribe">
                        @if(Auth()->check())
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h3 style="color: white; text-shadow: 1px 1px 3px grey;">Претплати се на нашиот Newsletter</h3>
                                <hr>
                                <p class="mt-10 mb-10" style="color: white; font-size: 17px; text-shadow: 1px 1px 3px grey;">Бидете во тек со новостите и промоциите на Yeppeuda.
                                </p>
                                <form method="POST" action="{{ route('newsletter.subscribe') }}" class="relative newsletter-form">

                                    {{csrf_field()}}

                                    <input type="email" name="email" class="newsletter-input" placeholder="Внесете ја вашата е-пошта">
                                    <input type="submit" class="btn btn-lg btn-dark newsletter-submit" value="Претплати се">
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h3 style="color: white; text-shadow: 1px 1px 3px grey;">10% попуст на Вашата прва нарачка!</h3>
                                <hr>
                                <p class="mt-10 mb-30" style="color: white; font-size: 17px; text-shadow: 1px 1px 3px grey;">Регистрирајте се и на вашиот мејл ќе добиете код за 10% попуст на Вашата прва нарачка!
                                </p>
                                <a href="/register" class="btn btn-banner-dark">Регистрација</a>
                            </div>
                        </div>
                        @endif
                    </section>
                </div>
            </div>

        </div>
    </div>  --}}
</div>

@stop
@section("scripts")
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $(document).ready(function() {

        if ($(window).width() > 767) {
            $(".img_wrapper").mouseenter(function() {
                $(this).children("div").children("h1").slideDown(500);
            });

            $(".img_wrapper").mouseleave(function() {
                $(this).children("div").children("h1").slideUp(500);
            });
        }


        $('.banner-slider').slick({
            dots: false,
            infinite: true,
            speed: 1000,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 3500,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
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
    });
</script>
@stop