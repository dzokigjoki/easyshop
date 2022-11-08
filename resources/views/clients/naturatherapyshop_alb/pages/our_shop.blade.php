@extends('clients.naturatherapyshop_alb.layouts.default')
@section('styles')
    <link rel="stylesheet" href="{{ url_assets('/naturatherapyshop/css/cssbox.css') }}">
    <style>
        .col-md-4 {
            padding-top: 2%;
        }
        #Last{
          margin-bottom: 5%;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="cssbox">
                    <a id="image1" href="#image1">
                        <img class="cssbox_thumb"
                            src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/1.jpg') }}">
                        <span class="cssbox_full">
                            <img src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/1.jpg') }}">
                        </span>
                    </a>
                    <a class="cssbox_close" href="#void"></a>
                    <a class="cssbox_next" href="#image2">></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cssbox">
                    <a id="image2" href="#image2">
                        <img class="cssbox_thumb"
                            src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/2.jpg') }}">
                        <span class="cssbox_full">
                            <img src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/2.jpg') }}">
                        </span>
                    </a>
                    <a class="cssbox_close" href="#void"></a>
                    <a class="cssbox_prev" href="#image1"><</a>
                    <a class="cssbox_next" href="#image3">></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cssbox">
                    <a id="image3" href="#image3">
                        <img class="cssbox_thumb"
                            src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/3.jpg') }}">
                        <span class="cssbox_full">
                            <img src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/3.jpg') }}">
                        </span>
                    </a>
                    <a class="cssbox_close" href="#void"></a>
                    <a class="cssbox_prev" href="#image2"><</a>
                    <a class="cssbox_next" href="#image4">></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cssbox">
                    <a id="image4" href="#image3">
                        <img class="cssbox_thumb"
                            src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/4.jpg') }}">
                        <span class="cssbox_full">
                            <img src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/4.jpg') }}">
                        </span>
                    </a>
                    <a class="cssbox_close" href="#void"></a>
                    <a class="cssbox_prev" href="#image3"><</a>
                    <a class="cssbox_next" href="#image5">></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cssbox">
                    <a id="image5" href="#image3">
                        <img class="cssbox_thumb"
                            src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/5.jpg') }}">
                        <span class="cssbox_full">
                            <img src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/5.jpg') }}">
                        </span>
                    </a>
                    <a class="cssbox_close" href="#void"></a>
                    <a class="cssbox_prev" href="#image4"><</a>
                    <a class="cssbox_next" href="#image6">></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cssbox">
                    <a id="image6" href="#image3">
                        <img class="cssbox_thumb"
                            src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/6.jpg') }}">
                        <span class="cssbox_full">
                            <img src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/6.jpg') }}">
                        </span>
                    </a>
                    <a class="cssbox_close" href="#void"></a>
                    <a class="cssbox_prev" href="#image5"><</a>
                    <a class="cssbox_next" href="#image7">></a>
                </div>
            </div>
            <div id="Last" class="col-md-4">
                <div class="cssbox">
                    <a id="image7" href="#image3">
                        <img class="cssbox_thumb"
                            src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/7.jpg') }}">
                        <span class="cssbox_full">
                            <img src="{{ url_assets('/naturatherapyshop/img/our_shops_gallery/7.jpg') }}">
                        </span>
                    </a>
                    <a class="cssbox_close" href="#void"></a>
                    <a class="cssbox_prev" href="#image6"><</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
