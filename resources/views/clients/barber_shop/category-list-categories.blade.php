@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="{{ url_assets('/barber_shop/images/page-titles/6.jpg') }}" alt="Background" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="title text-center">
                        <div class="title--heading">
                            <h1>{{$category->title}}</h1>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb">
                            <li><a href="/">Почетна</a></li>
                            <li class="active">{{$category->title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="gallery" class="gallery gallery-masonry gallery-3col">
        <div class="container">
            <div id="gallery-all">
                <div class="row">
                    @foreach($categoriesChunked as $categoriesRows)
                        @foreach ($categoriesRows as $item)
                        <div class="col-lg-4">
                            <h3><a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a></h3>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection