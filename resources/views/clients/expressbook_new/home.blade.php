@extends('clients.expressbook_new.layouts.default')

@section('content')
    <!-- main slider start -->
    <section class="bg-light">
        <div class="main-slider dots-style theme1">
            <div class="slider-item bg-img bg-img1">
                <div class="container">
                    <div class="row align-items-center slider-height">
                        <div class="col-12">
                            <div class="slider-content">
                                <p class="text animated" data-animation-in="fadeInDown" data-delay-in=".300">
                                    Стручен англиски
                                </p>
                                <h2 class="title animated">
                                    <span class="animated d-block" data-animation-in="fadeInLeft"
                                        data-delay-in=".800">English for 21st Century Skills</span>
                                    <span class="animated font-weight-bold" data-animation-in="fadeInRight"
                                        data-delay-in="1.5">Sophia Mavridi & Daniel Xerri</span>
                                </h2>
                                <a href="/p/148/english-for-21st-century-skills"
                                    class="btn btn-outline-primary btn--lg animated mt-45 mt-sm-25"
                                    data-animation-in="fadeInLeft" data-delay-in="1.9">Дознај повеќе</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main slider end -->
    <!-- staic media start -->
    <section class="static-media-section py-80 bg-white">
        <div class="container">
            <div class="static-media-wrap theme-bg">
                <div class="row values-slider-init text-center">
                        <div class="d-flex static-media2 flex-column flex-sm-row">
                            
                            <div class="media-body">
                                <img class="align-self-center mb-2 mb-1 m-auto"
                                src="{{ url_assets('/expressbook_new/img/icon/2.png') }}" alt="icon" />
                                <h4 class="title">Бесплатна испорака</h4>
                                <p class="text">На сите нарачки над 1200 денари</p>
                            </div>
                        
                    </div>
                        <div class="d-flex static-media2 flex-column flex-sm-row">
                            
                            <div class="media-body">
                                <img class="align-self-center mb-2 mb-1 m-auto"
                                src="{{ url_assets('/expressbook_new/img/icon/7.png') }}" alt="icon" />
                                <h4 class="title">Плаќање во готово</h4>
                                <p class="text">Наплатете ги вашите нарачки при достава</p>
                            </div>
                        
                    </div>
                        <div class="d-flex static-media2 flex-column flex-sm-row">
                            
                            <div class="media-body">
                                <img class="align-self-center mb-2 mb-1 m-auto"
                                src="{{ url_assets('/expressbook_new/img/icon/4.png') }}" alt="icon" />
                                <h4 class="title">Поддршка 24/7</h4>
                                <p class="text">Контактирајте не во секое време</p>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- staic media end -->

    <!-- common banner  start -->
    <div class="common-banner bg-white pb-45">
        <div class="container">
            <div class="row photos-slider-init">
                <div class="col-sm-6 mb-30 hidden-md">
                    <div class="banner-thumb">
                        <a href="/c/1/struchen-angliski" class="zoom-in d-block overflow-hidden">
                            <img src="{{ url_assets('/expressbook_new/img/banner/1mob.jpg') }}" alt="banner-thumb-naile" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 mb-30 hidden-sm">
                    <div class="banner-thumb">
                        <a href="/c/1/struchen-angliski" class="zoom-in d-block overflow-hidden">
                            <img src="{{ url_assets('/expressbook_new/img/banner/1.jpg') }}" alt="banner-thumb-naile" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-3 mb-30">
                    <div class="banner-thumb">
                        <a href="/c/3/knigi-za-svetot" class="zoom-in d-block overflow-hidden">
                            <img src="{{ url_assets('/expressbook_new/img/banner/2.jpg') }}" alt="banner-thumb-naile" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-3 mb-30">
                    <div class="banner-thumb">
                        <a href="/c/2/knigi-za-deca" class="zoom-in d-block overflow-hidden">
                            <img src="{{ url_assets('/expressbook_new/img/banner/3.jpg') }}" alt="banner-thumb-naile" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- common banner  end -->
    <!-- product tab repetation start -->
    <section class="bg-white theme1 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section-title start -->
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Најпродавани производи</h2>
                        {{-- <p class="text">
                            Погледнети ги нашите најпродавани производи 
                        </p> --}}
                    </div>
                    <!-- section-title end -->
                    <div class="product-slider-init theme1 slick-nav">
                        @foreach ($bestSellersArticles as $article)
                            @include('clients.expressbook_new.partials.product')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product tab repetation end -->
    <!-- product tab repetation start -->
    <section class="bg-white theme1 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section-title start -->
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Книги на месецот</h2>
                    </div>
                    <!-- section-title end -->
                    <div class="product-slider-init theme1 slick-nav">
                        @foreach ($recommendedArticles as $article)
                            @include('clients.expressbook_new.partials.product')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product tab repetation end -->
@stop
