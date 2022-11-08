@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/blog.css')}}" rel="stylesheet">
@stop
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <h1>{{ $category->title }}</h1>
        </div>
        <?php
        // The logic is here so we don't need specific function in the controllers
            $posts = \App\Post::where('active', '=', 1)->with('author')->with('categories')->orderBy('publish_at', 'desc')->simplePaginate(10);
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
                    </div>
                </div>
                <div class="row">
                    <?php 
                        $title = 'title_'.$lang;
                        $short_description = 'short_description_'.$lang; 
                        $url = 'url_'.$lang;      
                    ?>
                    @foreach($posts as $post)
                    <div class="col-md-4">
                        <article class="blog">
                            <figure>
                                <a href="{{ $urlLang }}/b/{{$post->id}}/{{$post->$url}}"><img
                                        src="{{url_assets('/clarissabalkan/img/blog-1.jpg')}}" alt="">
                                    <div class="preview"><span>Види повеќе</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                <small>{{ $category->title }} -
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d M') }}</small>
                                <h2><a href="{{ $urlLang }}/b/{{$post->id}}/{{$post->$url}}">{{$post->$title}}</a></h2>
                                <p>{!! $post->short_description_lang1 !!}</p>
                                <ul>
                                    <li>
                                        <div class="thumb">
                                            @if($post->author->image)
                                                <img src="{{ \ImagesHelper::getUserImage($blog->author) }}" alt="">
                                            @else
                                                <img src="{{url_assets('/clarissabalkan/img/avatar.jpg')}}" alt="">
                                            @endif
                                        </div>
                                        {{ $post->author->name }}
                                    </li>
                                    <li></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@stop