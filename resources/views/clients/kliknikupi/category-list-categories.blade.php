@extends('clients.kliknikupi.layouts.default')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{route('home')}}">Дома</a></li>
                <li>{{$category->title}}</li>
            </ul>
        </div>
    </div>
    <?php $i = 0; ?>
    <div class="container offset-0">
        <div class="row">
            @foreach($categoriesChunked as $categoriesRows)
                @foreach ($categoriesRows as $item)
                    <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                        <div class="product">
                            <div class="product_inside">
                                <div class="image-box">
                                    <a href="{{route('category', [$item->id, $item->url])}}">
                                        <img data-src="/uploads/category/{{$item->image}}" alt="">
                                    </a>

                                </div>
                                <h2 class="title">
                                    <a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a>
                                </h2>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection