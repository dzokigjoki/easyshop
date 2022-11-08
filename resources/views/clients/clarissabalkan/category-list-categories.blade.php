@extends('clients.clarissabalkan.layouts.default')
@section('content')
<style>
    .p-0 {
        padding: 0 !important;
    }
</style>
<main class="ps-main" style="padding-top: 30px">
    <div class="container p-0">
        <div class="page_header">
            <h1>{{ $category->title }}</h1>
        </div>
        <div class="ps-shop row">



            @if(count($categoriesChunked) > 0)
            @foreach($categoriesChunked as $categoriesRows)
            @foreach ($categoriesRows as $item)
            @if($item->parent == $category->id)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                <div class="grid_item">
                    <a href="/c/{{$item->id}}/{{$item->url}}">
                        <div class="ps-product--1" data-mh="product-item">
                            <div class="ps-product__thumbnail">
                                @if($item->image)
                                <img width="300" class="img img-responsive" src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                                @else
                                <img width="300" class="img img-responsive category-image"
                                    src="https://axiomoptics.com/wp-content/uploads/2019/08/placeholder-images-image_large.png"
                                    alt="">
                                @endif
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title"
                                    href="/c/{{$item->id}}/{{$item->url}}">
                                    <h5 class="font-24 text-center">{{$item->title}}</h5>
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
            @endif
        </div>
    </div>
</main>

@stop