@extends('clients.betajewels.layouts.default')
@section('content')
    <section class="laest-blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>{{$category->title}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categoriesChunked as $categoriesRows)
                    @foreach($categoriesRows as $item)
                        <div class="col-sm-4">
                            <div style="min-height: auto !important;" class="blog-single">
                                <div style="text-align:center;" class="blog-image">
                                    <a class="" href="{{route('category', [$item->id, $item->url])}}">
                                        <img style="height:155px;" src="/uploads/category/{{$item->image}}" class=""
                                        alt="{{$item->title}}">
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <h3><a href="{{route('product', [$item->id, $item->url])}}">{{$item->title}}</a></h3>
                                    <hr class="blog-text-h3">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endsection