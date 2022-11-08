@extends('clients.fitactive.layouts.default')
@section('content')
<?php $title = 'title_'.$lang; $url = 'url_'.$lang?>
<div class="ps-breadcrumb ps-breadcrumb--2 hidden-xs">
    <div class="ps-container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
                <ol class="breadcrumb">
                    <li><a href="/">Почетна</a></li>
                    <li><a href="/c/{{ $blog->categories[0]->id }}/{{ $blog->categories[0]->$url  }}">
                            {{ $blog->categories[0]->$title }}</a></li>
                    <li><a>{{ $blog->$title }}</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<main class="ps-main">
    <?php 
    $title = 'title_'.$lang;
    $description = 'description_'.$lang; 
    $url = 'url_'.$lang;      
?>
    <div class="container">
        <div class="ps-blog">
            <div class="ps-blog__posts">
                <article class="ps-post--primary">
                    <div class="ps-post__content">
                        <h4 class="ps-post__title"><a href="#">{{ $blog->$title }}</a></h4>
                    </div>
                </article>
            </div>

            <div class="ps-post--single">
                <div class="ps-post__thumbnail"><img
                        src="{{ url_assets('/easycms/bellina/images/blog/primary-post.jpg') }}" alt="">
                    <div class="ps-post__posted">
                        <span class="date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                        <span class="month">{{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}</span>
                    </div>
                </div>

                <div class="ps-post__content">
                    <div class="ps-content">
                        <p class="ps-highlight">
                            {!! $blog->$description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop