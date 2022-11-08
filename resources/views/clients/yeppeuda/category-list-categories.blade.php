@extends('clients.yeppeuda.layouts.default')
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

    <!-- Catalogue -->
    <section class="section-wrap pt-40 catalogue">
        <div class="container relative">

            <div class="row">
                <div class="col-md-12 catalogue-col right mb-50">
                    <div class="shop-catalogue grid-view">

                        <div class="row items-grid">
                            @foreach($categoriesChunked as $categoriesRows)
                            @foreach ($categoriesRows as $item)

                            <div class="col-md-4 col-xs-6 product-grid">
                                <div class="product-item clearfix">
                                    <div class="product-img hover-trigger">
                                        <a href="{{route('category', [$item->id, $item->url])}}">
                                            @if($item->image)
                                            <img class="category-image" src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                                            @else
                                            <img src="{{url_assets('/yeppeuda/img/placeholder.jpg')}}" alt="">
                                            @endif
                                        </a>
                                        <a href="{{route('category', [$item->id, $item->url])}}" class="product-quickview">Отвори</a>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @endforeach
                        </div> <!-- end row -->
                    </div> <!-- end grid mode -->

                </div> <!-- end col -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end catalog -->

</div>
@stop