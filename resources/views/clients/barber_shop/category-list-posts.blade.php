@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="{{ url_assets('/barber_shop/images/page-titles/6.jpg') }}" alt="Background" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="title text-center">
                        <div class="title--heading">
                            <h1>Совети</h1>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb">
                            <li><a href="/">Почетна</a></li>
                            <li class="active">Совети</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="gallery" class="gallery gallery-grid gallery-3col">
        <div class="container">
            <div id="gallery-all">
                @foreach($posts as $post)
                    <div class="col-xs-12 col-sm-6 col-md-4 gallery-item filter-Lineup">
                        <div class="gallery--img">
                            <a href="{{route('blog',[$post->id,$post->url])}}"><img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}"></a>
                            <div class="gallery--hover">
                                <div class="gallery--action">
                                    <div class="pos-vertical-center">
                                        <div class="gallery--title">
                                            <h4><a href="{{route('blog',[$post->id,$post->url])}}">{{$post->title}}</a></h4>
                                        </div>
                                        <div class="gallery--cat">
                                                {!! $post->short_description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop