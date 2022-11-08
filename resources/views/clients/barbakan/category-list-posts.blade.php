@extends('clients.barbakan.layouts.default')
@section('content')




<!-- Page Title -->
<div class="page-title bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-4">
                <h1 class="mb-0">{{ $category->title }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="page-content bg-light">

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                @foreach($posts as $post)
                <!-- Post / Item -->
                <article class="post post-wide animated" data-animation="fadeIn">
                    <div class="post-image"><img src="/uploads/posts/{{$post->id}}/lg_{{$post->image}}" alt=""></div>
                    <div class="post-content">
                        <ul class="post-meta">
                            <li>{{ \Carbon\Carbon::parse($post->publish_at)->format('d, M, Y') }}</li>
                        </ul>
                        <h4><a href="blog-post.html">{{ $post->title }}</a></h4>
                        <p>{{ $post->short_description }}</p>
                        <a href="/b/{{$post->id}}/{{$post->url}}" class="btn btn-primary"><span>Види повеќе</span></a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

</div>
@stop