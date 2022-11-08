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

        <div class="row products-row mb-4">

            @foreach($categoriesChunked as $categoriesRows)
            @foreach ($categoriesRows as $item)
            @if($item->parent == $category->id)
            <div class="product-col col-6 col-md-4 col-lg-3 mb-3 mb-lg-5">
                <div class="box-product bg-light product-animation h-100">
                    <a href="{{route('category', [$item->id, $item->url])}}" class="link link-dark">
                        <div class="animation-content mb-3">
                            <div class="img-wrapper product-img-wrapper justify-content-center">
                                @if($item->image)
                                <img class="img-fluid mb-4" src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                                @else
                                <img class="img-fluid mb-4" width="800" height="800" src="{{ url_assets('/herline/images/blog/blog-12.jpg')}}" alt="blog-12" />
                                @endif
                            </div>
                            <div class="text-center">
                                <p class="h5 product-title-1 font-weight-bold">{{ $item->title }}</p>
                            </div>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
            @endforeach

        </div>

    </div>
</section>
<hr class="my-0">
@endsection