@extends('clients.luxbox.layouts.default')
@section('content')
<div class="page-content">
    <section class="blog-masonry-section section-box">
        <div class="container">
            <div class="blog-content">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4 class="title">{{ $category->title }}</h4>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="standard-post col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="blog-images">
                                    <a href="/b/{{$post->id}}/{{$post->url}}">
                                        <img src="/uploads/posts/{{$post->id}}/lg_{{$post->image}}" alt="luxbox blog">
                                        <div class="overlay"></div>
                                    </a>
                                </div>
                                <h4>
                                    <a href="/b/{{$post->id}}/{{$post->url}}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <div class="calendar">
                                    <span class="date"><i class="zmdi zmdi-calendar-check"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection