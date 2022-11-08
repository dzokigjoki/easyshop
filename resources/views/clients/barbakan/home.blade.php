@extends('clients.barbakan.layouts.default')
@section('content')

@section('style')
    <style>
        .section-main-2 {
            
            background: url({{ url_assets('/barbakan/img/Artboard.jpg') }});
            background-size: cover;
        }

        #logo2 {
            width: 20%;
            height: 20%;
        }

        .container-fluid {
            padding: 0;
        }

        @media only screen and (max-width:991px) {
            #content {
                margin: 0 !important;
            }
        }
        .naskoro{
            background-color: #017d41;
            color: inherit;
            width: 30%;
            height: 80%;
            padding-bottom: 3%;
            padding-top: 3%;
            margin-left: 35%;
        }
    </style>
@stop

<!-- Section - Main -->
<div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-sm-12 col-lg-6 col-xxs-12">
            <div class="split left">
                <div class="centered">
                    <section class="section section-main section-main-2 bg-dark dark">

                        <!-- BG Video -->
                        <div class="bg-video dark-overlay" data-src="{{ url_assets('/barbakan/img/video.mp4') }}"
                            data-type="video/mp4"></div>
                        <div class="section-content container v-center text-center">
                            <img src="{{ url_assets('/barbakan/img/logo.png') }}" alt="" class="logo_banner">
                            <h1 class="display-2 mb-2">Бистро Барбакан</h1>
                            <h4 class="text-muted mb-5">Највкусната храна во градот</h4>
                            <div class="naskoro" style="font-size: x-large"><span>Наскоро</span></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 col-xxs-12 ">
            <div class="split right">
                <div class="centered">
                    <section class="section section-main section-main-2 bg-dark dark">
                        <div class="section-content container v-center text-center">
                            <img id="logo2" src="{{ url_assets('/barbakan/img/logo2.png') }}" alt=""
                                class="logo_banner">
                            <h1 class="display-2 mb-2">Тобако<br> Шише Штека Шоп</h1>
                            <h4 class="text-muted mb-5">За секоја прилика</h4>
                            <a href="/c/22/{slug}" class="btn btn-outline-primary btn-lg"><span>Нарачај онлајн</span></a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div>
    @stop
