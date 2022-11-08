@extends('clients.ibutik.layouts.default')
@section('content')

<div class="container">
    <header class="page-header">
        <h1 class="page-title">{{$category->title}}</h1>
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="{{route('home')}}">Почетна</a></li>
            <i class="fa fa-angle-right"></i>
            <li class="active">{{$category->title}}</li>
        </ol>
    </header>

    <div class="row">
        <div class="col-md-12">
            @foreach($categoriesChunked as $categoriesRow)
            <div class="row" data-gutter="15">
                @foreach($categoriesRow as $item)
                <div class="col-md-3">
                    <div class="product ">
                        <ul class="product-labels"></ul>
                        <div class="product-img-wrap">
                            {{--<img class="product-img" src="/public/uploads/category/{{$item->id}}/{{$item->image}}" alt="Image Alternative text" title="Image Title" />--}}
                            <img class="product-img" src="{{\ImagesHelper::getCategoryImage($item)}}">
                        </div>
                        <a class="product-link" href="{{route('category', [$item->id, $item->url])}}"></a>
                        <div class="product-caption">
                            <h5 class="product-caption-title">{{$item->title}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>


    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
</div>

@endsection