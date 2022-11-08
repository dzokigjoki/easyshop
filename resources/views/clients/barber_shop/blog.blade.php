@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
    <div class="bg-section">
        <img src="{{ url_assets('/barber_shop/images/page-titles/1.jpg') }}" alt="Background" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <div class="title text-center">
                    <div class="title--content">
                        <div class="title--heading">
                            <h2 class="heading-color">{!! $blog->title !!}</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li><a href="/">Почетна</a></li>
                            <li class="active">{!! $blog->title !!}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="blog" class="blog blog-single pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <!-- Blog Entry -->
                <div class="blog-entry">
                    <div class="entry--title ">
                        <h3><a href="#"> {!! $blog->title !!}</a></h3>
                    </div>
                    <div class="entry--content text-justify">
                        <p>
                            {!! $blog->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop