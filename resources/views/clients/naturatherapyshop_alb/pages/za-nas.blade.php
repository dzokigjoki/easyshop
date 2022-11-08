@extends('clients.naturatherapyshop_alb.layouts.default')
@section('content')
    <style>
        .testimonials .testimonial-text {
            font-size: 14px !important;
        }

        ul li {
            padding-bottom: 9px;
        }

    </style>
    <section class="page-title text-center bg-light">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1 class="uppercase">
                        {!! trans('naturatherapy/global.about_us') !!}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content-wrapper oh">
        <section class="section-wrap intro pb-0">
            <div class="container">
                <div class="row">
                    <div class="text-justify col-sm-6 mb-50">
                        <h3 class="intro-heading">Natura Therapy</h3>
                        <p> {!! trans('naturatherapy/global.about_p1') !!}</p>

                        <p>{!! trans('naturatherapy/global.about_p2') !!}</p>

                        <p>{!! trans('naturatherapy/global.about_p3') !!}</p>

                        <p>{!! trans('naturatherapy/global.about_p4') !!}</p>

                        <p>{!! trans('naturatherapy/global.about_p5') !!}</p>
                    </div>
                    <div style="margin-top: 90px;" class="col-sm-5 col-sm-offset-1">
                        <img src="{{ url_assets('/naturatherapyshop/img/za-nas.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <hr class="mb-0">
    </div>
    </section>
    <section style="padding: 0 !important" class="section-wrap">
        <div>
            <img src="{{ url_assets('/naturatherapyshop/img/about-header.jpg') }}" alt="">
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading"></span>
                    <h3 class="heading bottom-line">
                        {!! trans('naturatherapy/global.our_team') !!}
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/sasko-drvosanski.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">{!! trans('naturatherapy/global.name_1') !!}</h4>
                                <span>{!! trans('naturatherapy/global.nutricionist_manager') !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/simona-ristevska.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">
                                    {!! trans('naturatherapy/global.name_2') !!}
                                </h4>
                                <span>{!! trans('naturatherapy/global.call_center_manager') !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/miodrag_ivanoski.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">
                                    {!! trans('naturatherapy/global.name_3') !!}</h4>
                                <span>{!! trans('naturatherapy/global.commercy_health_manager') !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-xxs-12">
                    <div class="col-sm-6 mb-50">
                        <img class="img img-responsive" src="{{ url_assets('/naturatherapyshop/img/about-us-2.jpg') }}"
                            alt="">
                    </div>
                    <div class="col-sm-6 mb-50">
                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab-one" data-toggle="tab">
                                        {!! trans('naturatherapy/global.mission') !!}</a>
                                </li>
                                <li>
                                    <a href="#tab-two" data-toggle="tab">
                                        {!! trans('naturatherapy/global.vision') !!}</a>
                                </li>
                                <li>
                                    <a href="#tab-three" data-toggle="tab">{!! trans('naturatherapy/global.purpose') !!}</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-one">
                                    <h4>{!! trans('naturatherapy/global.mission') !!}</h4>
                                    <p>{!! trans('naturatherapy/global.about_p6') !!}</p>

                                    <p><strong>{!! trans('naturatherapy/global.about_p7') !!}<p>

                                            <p>{!! trans('naturatherapy/global.about_p8') !!}</p>
                                </div>
                                <div class="tab-pane fade" id="tab-two">
                                    <h4>{!! trans('naturatherapy/global.vision') !!}</h4>
                                    <p>{!! trans('naturatherapy/global.about_p9') !!}</p>
                                </div>
                                <div class="tab-pane fade" id="tab-three">
                                    <h4>{!! trans('naturatherapy/global.purpose') !!}</h4>
                                    <p>{!! trans('naturatherapy/global.about_p10') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap testimonials">
        <div class="container">
            <div class="row heading-row mb-20">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h3 class="heading bottom-line">{!! trans('naturatherapy/global.user_experiences') !!}</h3>
                </div>
            </div>
            <div id="owl-testimonials" class="owl-carousel owl-theme owl-dark-dots text-center">
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">{!! trans('naturatherapy/global.user_experience_1') !!}</p>
                        <span>{!! trans('naturatherapy/global.happy_user_3') !!}</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">{!! trans('naturatherapy/global.user_experience_2') !!}
                        </p>
                        <span>{!! trans('naturatherapy/global.happy_user_4') !!}</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">{!! trans('naturatherapy/global.user_experience_3') !!}<br></p>
                        <span>{!! trans('naturatherapy/global.happy_user_5') !!}</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">{!! trans('naturatherapy/global.user_experience_6') !!}
                        </p>
                        <span>{!! trans('naturatherapy/global.happy_user_6') !!}</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">{!! trans('naturatherapy/global.user_experience_7') !!}
                        </p>
                        <span>{!! trans('naturatherapy/global.happy_user_7') !!}</span>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial">
                        <p class="testimonial-text">{!! trans('naturatherapy/global.user_experience_8') !!}
                        </p>
                        <span>{!! trans('naturatherapy/global.happy_user_8') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading"></span>
                    <h3 class="heading bottom-line">
                        {!! trans('naturatherapy/global.professional_associates') !!}
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/snezana-spirovska.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">{!! trans('naturatherapy/global.dr_1') !!}</h4>
                                <span>{!! trans('naturatherapy/global.specialist_microbolog') !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/ankica-stanojkovska.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">{!! trans('naturatherapy/global.dr_2') !!}</h4>
                                <span>{!! trans('naturatherapy/global.professional_associates') !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6 col-xxs-12 mb-40">
                    <div class="team-wrap">
                        <div class="team-member">
                            <div class="team-img hover-trigger">
                                <img src="{{ url_assets('/naturatherapyshop/img/team/zoran-mihailovski.jpg') }}" alt="">
                            </div>
                            <div class="team-details text-center">
                                <h4 class="team-title">{!! trans('naturatherapy/global.dr_3') !!}</h4>
                                <span>{!! trans('naturatherapy/global.professional_associates') !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap pb-40 our-team">
        <div class="container">
            <div class="row heading-row">
                <div class="col-md-12 text-center">
                    <span class="subheading"></span>
                    <h3 class="heading bottom-line">
                        {!! trans('naturatherapy/global.professional_associates') !!}
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>
                        {!! trans('naturatherapy/global.headquarters') !!}</h5>
                    <ul>
                        <li>
                            Myslym Shyrri nr.20, Tiranë
                        </li>
                    </ul>
                    <h5>
                        {!! trans('naturatherapy/global.street_2') !!}
                    </h5>
                    <ul>
                        <li>
                            Ngjitur me UKT - Astir, Tiranë

                        </li>
                        <li>
                            Brryli - rr.Arkitekt Kasemi, Tiranë
                        </li>
                        <li>
                            Rreth Rrotullimi i Tiranës së re, Sheshi Wilson, Tiranë
                        </li>
                        <li>
                            Busti Ayem Hajdarit, rr.Elektrikut, Durrës
                        </li>
                        <li>
                            Lgj. Luigj Gurakuqi nr.2/91, Elbasan.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    </div>
@stop
