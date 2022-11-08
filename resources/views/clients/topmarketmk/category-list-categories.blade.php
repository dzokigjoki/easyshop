@extends('clients.topmarketmk.layouts.default')
@section('content')
    <section id="content">
        <div id="breadcrumb-container">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">Дома</a></li>
                    <li class="active">Категории</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="content-title">
                        <h1 class="title">{{$category->title}}</h1>
                    </header>
                    <div class="row portfolio-item-container"  data-maxcolumn="3">
                        <br>
                        @foreach($categoriesChunked as $categoriesRows)
                            @foreach($categoriesRows as $item)
                                <div class="col-md-4 col-sm-4 col-xs-6 portfolio-item photography">
                                    <figure>
                                        <a href="{{route('category', [$item->id, $item->url])}}">
                                            <img src="/uploads/category/{{$item->image}}" class=""
                                                 alt="{{$item->title}}">
                                        </a>
                                        <figcaption>
                                            <a href="{{route('category', [$item->id, $item->url])}}" class="like-button"><span>ПРЕГЛЕДАЈ</span></a>
                                        </figcaption>
                                    </figure>
                                    <h2><a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a></h2>
                                </div><!-- End .portfolio-item -->
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection