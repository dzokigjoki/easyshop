@extends('clients.clarissabalkan.layouts.default')
@section('styles')
    <link href="{{url_assets('/clarissabalkan/css/blog.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="text-center row">
            <div class="col-lg-10 offset-lg-1">
                <div class="singlepost">
                    <figure>
                        @if($blog->image)
                        <img class="width-100 img-fluid" src="/uploads/posts/{{$blog->id}}/lg_{{$blog->image}}" alt="{{ $blog->$title }}">
                        @else
                        <img alt="" class="width-100 img-fluid" src="{{url_assets('/clarissabalkan/img/blog-single.jpg')}}">
                        @endif
                    </figure>
                    <h1>{{ $blog->title_lang1 }}</h1>
                    <div class="postmeta">
                        <ul>
                            <li><a href="#"><i class="ti-folder"></i> {{ $blog->categories[0]->title_lang1 }}</a></li>
                            <li><i class="ti-calendar"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M') }}</li>
                            <li><a href="#"><i class="ti-user"></i> {{ $blog->author->name }}</a></li>
                        </ul>
                    </div>
                    <div class="post-content">
                        <div class="dropcaps text-justify">
                            {!! $blog->description_lang1 !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop