@extends('clients.naturatherapyshop_al.layouts.default')
@section('content')
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase">{{ $category->title }}</h1>
            </div>
        </div>
    </div>
</section>
<div class="content-wrapper oh">
    <section class="section-wrap pt-40 catalogue">
        <div class="container relative">
            <div class="row">
                <div class="col-md-12 catalogue-col right mb-50">
                    <div class="shop-catalogue grid-view">
                        <div class="row items-grid">
                            @foreach($categoriesChunked as $categoriesRows)
                            @foreach ($categoriesRows as $item)
                            <div class="col-md-4 col-xs-6 product-grid">
                                <div style="position:relative !important;" class="product-item clearfix">
                                    <div class="product-img hover-trigger">
                                        <a href="{{ $urlLang }}c/{{ $item->id }}/{{ $item->url }}">
                                            @if($item->image)
                                            <img class="category-image" src="/uploads/category/{{$item->image}}"
                                                alt="{{$item->title}}">
                                            @else
                                            <img src="{{url_assets('/naturatherapyshop/img/placeholder.jpg')}}" alt="">
                                            @endif
                                        </a>
                                        <a href="{{ $urlLang }}c/{{ $item->id }}/{{ $item->url }}"
                                            class="product-quickview">{!! trans('naturatherapy/global.view_more') !!}</a>
                                    </div>
                                    
                                </div>
                                <h5 style="margin-top: 45px;" class="text-center">{{ $item->title }}</h5>
                            </div>
                            @endforeach
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop