@extends('clients.torti.layouts.default')
@section('content')
<main>
    <div class="container mt-35">
        <h3 class="text-center mb-35">{{ $category->title }}</h3>
        <div class="col-md-offset-2 content-area blog-section col-md-9 col-sm-8 col-xs-12">
            @foreach($posts as $post)
            <article class="type-post">
                <div class="entry-cover">
                    <a href="{{route('blog', [$post->id, $post->url])}}">
                        <img src="{{\ImagesHelper::getBlogImage($post)}}" alt="{{$post->title}}">
                    </a>
                </div>
                <div class="blog-content">
                    <div class="entry-header">
                        <a href="#" class="post-date">{{ \Carbon\Carbon::parse($post->created_at)->format('d M') }}</a>
                        <div class="entry-meta">
                            <div class="post-like"><a href="#" title="16 Likes"><i
                                        class="fa fa-eye"></i>{{ $post->visits }}</a></div>
                        </div>
                        <h3 class="entry-title">
                            <a href="{{route('blog', [$post->id, $post->url])}}">{{$post->title}}</a>
                        </h3>
                    </div>
                    <div class="entry-content">
                        <p>
                            {{$post ->short_description}}
                        </p>
                    </div>
                    <a class="read-more" href="{{route('blog', [$post->id, $post->url])}}"><i
                            class="fa fa-angle-right"></i> Види
                        повеќе</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</main>
@stop