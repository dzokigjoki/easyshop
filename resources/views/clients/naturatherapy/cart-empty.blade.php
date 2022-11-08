@extends('clients.naturatherapy.layouts.default')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="text/javascript" src="{{ url_assets('/naturatherapy/javascript/cart.js') }}"></script>
@endsection


@section('content')


<section class="breadcrumb-section bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-2 py-lg-3">
                <li class="breadcrumb-item">
                    <a href="/">{!! trans('naturatherapy/global.home') !!}
                    </a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">{!! trans('naturatherapy/cart.cart') !!}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="shop-section section elements py-5 py-xl-100">
    <div class="element-top">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="element-bottom">
        <img src="{{ url_assets('/naturatherapy/images/flower-element-2-right.svg') }}" class="element-img element-img-lg">
    </div>
    <div class="container" data-content="partial">

        <div class="text-center">
            <h2 class="h1 mb-4 mb-lg-5">
            {!! trans('naturatherapy/cart.productsincart') !!}</h2>
            <p class="mb-4 mb-lg-5">{!! trans('naturatherapy/cart.noprodincart') !!}</p>
            <a href="/c/3/produkte" class="btn btn-secondary">
            {!! trans('naturatherapy/cart.backtoproducts') !!}</a>
        </div>
    </div>
</section>
<hr class="my-0">
@endsection