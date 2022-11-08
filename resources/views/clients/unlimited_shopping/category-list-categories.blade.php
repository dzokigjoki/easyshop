@extends("clients.unlimited_shopping.layouts.default")

@section("content")

    <div class="container">
        <div class="row" style="padding-bottom: 30px; min-height: 200px;">
            <div class="col-md-12">
                <h1 class="text-center mb-20 mt-20 naslov">{{$category->title}}</h1>
            </div>
            @foreach($categoriesChunked as $categoriesRows)
                @foreach ($categoriesRows as $item)
                    <div class="col-sm-6 col-sm-offset-0 col-xs-8 col-xs-offset-2 single-category pt-15 pb-15">
                        <a href="{{route('category', [$item->id, $item->url])}}">
                            <div class="cat-img-cont">
                                <img src="/uploads/category/{{$item->image}}" alt="{{$item->title}}">
                                <div class="orange-bg"></div>
                            </div>
                        </a>
                        <a href="{{route('category', [$item->id, $item->url])}}">
                            <h2 class="text-center mt-10 mb-20">{{$item->title}}</h2>
                        </a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

@endsection