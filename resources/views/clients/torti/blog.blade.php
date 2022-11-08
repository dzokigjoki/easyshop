@extends('clients.torti.layouts.default')
@section('content')
<div class="container mt-35">
    <h3 class="text-center mb-35">{{ $blog->title }}</h3>
    <div class="col-md-offset-2 content-area blog-section col-md-9 col-sm-8 col-xs-12">
        <article class="type-post">
            <div class="entry-cover">
                @if(\ImagesHelper::getBlogImage($blog))
                <a href="{{route('blog', [$blog->id, $blog->url])}}">
                    <img src="{{\ImagesHelper::getBlogImage($blog)}}" alt="{{$blog->title}}">
                </a>
                @endif
            </div>
            <div class="blog-content">
                <div class="entry-header">
                    <a href="#" class="post-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M') }}</a>
                    {{-- <div class="entry-meta">
                        <div class="post-like"><a href="#" title="16 Likes"><i
                                    class="fa fa-eye"></i>{{ $blog->visits }}</a></div>
                    </div> --}}
                    {{-- <h3 class="entry-title">
                        <a href="{{route('blog', [$blog->id, $blog->url])}}">{{$blog->title}}</a>
                    </h3> --}}
                </div>
                <div class="entry-content">
                    <p>
                        {!! $blog->description !!}
                    </p>
                </div>
            </div>
        </article>
    </div>
</div>
@stop