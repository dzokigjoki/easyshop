@extends('clients.naturatherapy.layouts.default')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
@endsection

@section('content')

<section class="banner-section">
    <div class="banner banner-md bg-image" style="background-image: url( {{ url_assets('/naturatherapy/images/banners/top-banner.jpg') }} );">
        <div class="side-banner" style="background-image: url('{{ url_assets('/naturatherapy/images/banners/sidebanner') }}');"></div>
        <div class="banner-content text-white text-center py-lg-5">
            <div class="container">
                <h2 class="h1 my-lg-2">Provuar shkencërisht
                </h2>
                <img src="{{ url_assets('/naturatherapy/images/signature-white.png') }}" class="img-fluid signature signature-lg">
            </div>
        </div>
    </div>
</section>




<section class="breadcrumb-section bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2 py-lg-3">
                <li class="breadcrumb-item">
                    <a href="/">
                        {!! trans('naturatherapy/global.home') !!}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Provuar shkencërisht
                </li>
            </ol>
        </nav>
    </div>
</section>

<section class="section product-section elements py-5 py-xl-100">
    <div class="element-top">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="element-bottom">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-2-right.svg') }}" class="element-img element-img-lg element-img-rotate-1">
    </div>
    <div class="container">
        <div class="row mb-lg-5">
            @foreach($posts as $post)
            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-5">
                <div class="img-wrapper mb-3 mb-lg-4">
                    <a href="/b/{{$post->id}}/{{$post->url}}">
                        <img src="/uploads/posts/{{$post->id}}/lg_{{$post->image}}" class="img-fluid">
                    </a>
                </div>
                <p class="text-green text-sm mb-3">{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d H:i') }}</p>
                <a href="/b/{{$post->id}}/{{$post->url}}" class="link">
                    <p class="font-weight-medium mb-3 mb-lg-4">{{ $post->title }}</p>
                </a>

                <a href="/b/{{$post->id}}/{{$post->url}}" class="link link-secondary">Lexo më shumë</a>
            </div>
            @endforeach

        </div>

    </div>
</section>
<hr class="my-0">


@endsection