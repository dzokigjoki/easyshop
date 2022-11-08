@extends('clients.energy_point_peleti.layouts.default')
@section('content')
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="text-center col-md-12 main-wrap">
                <h2>{{ $blog->title }}</h2>
            </div>
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <article class="hentry">
                        <div class="hentry-wrap">
                            <div class="entry-featured">
                                <img src="/uploads/posts/{{$blog->id}}/lg_{{$blog->image}}" alt="{{ $blog->title }}" />
                            </div>
                            <div class="entry-header">
                                <div class="entry-meta icon-meta">
                                    <span class="meta-date">
                                        <time datetime="2015-08-11T06:27:22+00:00">
                                            <i class="fa fa-clock-o"></i>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d H:i') }}
                                        </time>
                                    </span>
                                </div>
                            </div>
                            <div class="entry-content">
                                {!! $blog->description !!}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@stop