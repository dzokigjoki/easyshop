@extends('clients.barbakan.layouts.default')
@section('content')




<!-- Post / Single -->
<article class="post single">
    <div class="post-image bg-parallax"><img src="/uploads/posts/{{$blog->id}}/lg_{{$blog->image}}" alt=""></div>
    <div class="container container-md">
        <div class="post-content">
            <ul class="post-meta">
                <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('d, M, Y') }}</li>
            </ul>
            <h1 class="post-title">{{ $blog->title }}</h1>
            <hr>
            {!! $blog->description !!}

        </div>
    </div>
</article>
@stop