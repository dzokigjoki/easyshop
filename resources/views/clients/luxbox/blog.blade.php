@extends('clients.luxbox.layouts.default')
@section('content')
<style>
    .blog-sidebar-right.section-box {
        padding: 35px 0 !important;
    }
</style>
<div class="page-content">
    <section class="blog-sidebar-right blog-no-sidebar section-box">
        <div class="container">
            <div class="woocommerce">
                <div class="row">
                    <div class="col-12">
                        <div class="content-area">
                            <div class="standard-post">
                                @if($blog->image)
                                <div class="text-center blog-images">
                                    <a href="/b/{{$blog->id}}/{{$blog->url}}">
                                        <img src="/uploads/posts/{{$blog->id}}/lg_{{$blog->image}}"
                                            alt="{{ $blog->title }}">
                                    </a>
                                </div>
                                @endif
                                <h4 class="text-center">
                                    <a href="/b/{{$blog->id}}/{{$blog->url}}">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                                <div class="text-center calendar">
                                    <span class="date"><i
                                            class="zmdi zmdi-calendar-check"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</span>
                                </div>
                                <p class="text-justify">
                                    {!! $blog->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection