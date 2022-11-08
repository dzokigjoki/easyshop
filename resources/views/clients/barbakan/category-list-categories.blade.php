@extends('clients.barbakan.layouts.default')
@section('content')
    <style>
        .category-image {
            border: 1px solid #dddddd;
        }
        .row{
            margin-bottom: 5rem;
        }
        .header{
            text-align: center;
            margin-bottom: 10rem;
            padding-left: 2rem; 
            padding-right: 2rem; 
        }
    </style>
    <h1 class="header"><br><strong>Сите Категории</strong></h1>
    <main class="ps-main" style="padding-top: 30px">
        <div class="container">
            <div class="ps-shop row">
                @if (count($categoriesChunked) > 0)
                    @foreach ($categoriesChunked as $categoriesRows)
                        @foreach ($categoriesRows as $item)
                            @if ($item->parent == $category->id)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 smaller_product_images">
                                    <a href="{{ $urlLang }}c/{{ $item->id }}/{{ $item->url }}">
                                        <div class="ps-product--1" data-mh="product-item">
                                            <div class="ps-product__thumbnail">
                                                <img
                                                @if ($item->image)
                                                    src="/uploads/category/{{ $item->image }}"
                                                @endif
                                                alt="{{ $item->title }}">
                                            @else
                                                <img class="category-image"
                                                    src="https://axiomoptics.com/wp-content/uploads/2019/08/placeholder-images-image_large.png"
                                                    alt="">
                            @endif
            </div>
            <div class="ps-product__content" style="text-align: center; font-size: xx-large">
                <a class="custom-category-title ps-product__title" href="{{ $urlLang }}c/{{ $item->id }}/{{ $item->url }}">{{ $item->title }}</a>
            </div>
        </div>
        </a>
        </div>
        @endforeach
        @endforeach

    @else
        <h1 class="no-active-label">Нема активни категории</h1>
        @endif
        </div>
        </div>
    </main>
@stop
