@extends('clients.mobiin.layouts.default')

@section('content')

    <style>
        .irs-slider {
            background: #777;
        }
        .irs-diapason {
            background: #FFB848;
        }
    </style>


    <div class="title-wrapper" style="background: url('/assets/mobiin/test-sliki/mobiin-golema1.jpg') center;">
        <div class="container"><div class="container-inner">
                <h1><span>{{$category->title}}</span> <!--CATEGORY--></h1>
                {{--<em>Over 4000 Items are available here</em>--}}
            </div></div>
    </div>

    <div class="main">
        <div class="container">
        {{--<ul class="breadcrumb">--}}
        {{--<li><a href="index.html">Дома</a></li>--}}
        {{--<li><a href="">Store</a></li>--}}
        {{--<li class="active">Кондури</li>--}}
        {{--</ul>--}}
        <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">

                <div class="col-md-12 col-sm-12">
                @foreach($categoriesChunked as $categoriesRows)
                    @foreach ($categoriesRows as $item)
                    <!-- PRODUCT ITEM START -->
                        <div class="cat-item col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <a class="pi-img-wrapper" href="{{route('category', [$item->id, $item->url])}}" >
                                    <img src="/uploads/category/{{$item->image}}" class="img-responsive" alt="{{$item->title}}">
                                    <div>
                                        <span class="btn btn-default">Преглед</span>
                                    </div>
                                </a>
                                <h2 class="text-center margin-top-10"><a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a></h2>
                            </div>
                        </div>

                        <!-- PRODUCT ITEM END -->
                    @endforeach
                @endforeach
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>


@endsection