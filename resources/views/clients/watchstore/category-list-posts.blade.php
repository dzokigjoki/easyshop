@extends('clients.watchstore.layouts.default')
@section('content')
    <section class="laest-blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>{{$category->title}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-sm-4">
                        <div style="min-height: auto !important;" class="blog-single">
                            <div class="blog-image">
                                <a href="{{route('blog', [$post->id, $post->url])}}">
                                    <img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}">
                                </a>
                            </div>
                            <div class="blog-text">
                                <h3><a href="{{route('blog', [$post->id, $post->url])}}">{{$post->title}}</a></h3>
                                <hr class="blog-text-h3">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection