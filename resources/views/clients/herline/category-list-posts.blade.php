@extends('clients.herline.layouts.default')
@section('content')
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="text-center col-md-12 main-wrap">
                <h2>{{ $category->title }}</h2>
            </div>
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="posts masonry" data-layout="masonry" data-masonry-column="3">
                                <div class="posts-wrap masonry-wrap posts-layout-masonry row">
                                    @foreach($posts as $post)
                                    <article class="masonry-item col-md-4 col-sm-6 hentry">
                                        <div class="hentry-wrap">
                                            <div class="entry-featured">
                                                <a href="/b/{{$post->id}}/{{$post->url}}">
                                                    <img src="/uploads/posts/{{$post->id}}/lg_{{$post->image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="entry-info">
                                                <div class="entry-header">
                                                    <h2 class="entry-title">
                                                        <a href="/b/{{$post->id}}/{{$post->url}}">{{ $post->title }}</a>
                                                    </h2>
                                                    <div class="entry-meta icon-meta">
                                                        <span class="meta-date">
                                                            <time datetime="2015-08-11T06:27:49+00:00">
                                                                <i class="fa fa-clock-o"></i>
                                                                {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d H:i') }}
                                                            </time>
                                                        </span>
                                                        <span class="meta-category">
                                                            <i class="fa fa-folder-open-o"></i>
                                                            {{ $category->title }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="entry-content">
                                                    {!! $post->short_description !!}
                                                </div>
                                                <div class="readmore-link">
                                                    <a href="/b/{{$post->id}}/{{$post->url}}">Види повеќе</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop