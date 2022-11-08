@extends('clients.naturatherapy.layouts.default')

@section('scripts')
<script type="text/javascript" src="{{ url_assets('/naturatherapy/javascript/cart.js') }}"></script>
@endsection

@section('content')
<section class="banner-section">
    <div class="banner banner-sm bg-image" style="background-image: url( {{ url_assets('/naturatherapy/images/banners/top-banner.jpg') }}">
        <div class="banner-content text-white text-center py-5">
            <div class="container">
                <h2 class="h1">{{ $category->title }}</h2>
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
                <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
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

        @include('clients.naturatherapy.partials.category-products-list')

    </div>
</section>
<hr class="my-0">
@endsection