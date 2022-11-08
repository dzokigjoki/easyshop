@extends('clients.topmarketmk.layouts.default')

@section('content')

    <section id="content">
        <div id="breadcrumb-container">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">Дома</a></li>
                    <li class="active">{{ $blog->title }}</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="content-title">
                        <h1 class="title">
                            {{ $blog->title }}
                        </h1>
                    </header>
                    <div class="xs-margin"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-112 col-xs-12 articles-container single-post">
                            <article>
                                @if(isset($blog->image) && !is_null($blog->image))
                                <figure class="article-media-container">
                                    <img src="{{\ImagesHelper::getBlogImage($blog, NULL, 'lg_')}}" alt="{{$blog->title}}">
                                </figure>
                                @endif

                                <h2 style="margin-top: 20px;">
                                    {!! $blog->meta_description !!}
                                </h2>

                                <div class="article-content-container">
                                    <p style="text-align: justify">
                                        {!! $blog->description !!}
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection