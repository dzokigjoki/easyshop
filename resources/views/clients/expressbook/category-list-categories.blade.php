@extends('clients.expressbook.layouts.default')
@section('content')
    <div class="container">
        <div class="row hidden-xs hidden-sm">

            {{--        @if()--}}


            <ul class="breadcrumb text-center">
                <li><a href="{{route('home')}}">Почетна</a></li>
                {{--<li><a href="books.html">Books</a></li>--}}
                <li class="active">{{$category->title}}</li>
            </ul>

            <div class="divider">
                <img class="img-responsive" src="{{ url_assets('/expressbook/images/shadow.png') }}" alt="">
            </div><!-- /.divider -->
        </div>
        <div class="module inner-top-sm wow fadeInUp" id="books-by-subject">

            <div class="module-body">


                @foreach($categoriesChunked as $categoriesRows)
                    @foreach ($categoriesRows as $item)
                        <div class="col-md-3 col-sm-4">
                            <div class="book">
                                <a href="{{route('category', [$item->id, $item->url])}}">
                                    <div class="book-cover">
                                        <img alt="" width="140" height="212"
                                             src="{{\ImagesHelper::getProductImage($item)}}"
                                             data-echo="{{\ImagesHelper::getProductImage($item)}}">
                                    </div>
                                </a>
                                <div class="book-details clearfix">
                                    <div class="book-description">
                                        <h3 class="book-title"><a
                                                    href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div></div>
@endsection