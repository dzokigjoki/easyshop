@extends('clients.shopathome.layouts.default')
@section('content')
    {{--<div class="breadcrumbs">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb breadcrumb--ys pull-left">--}}
                {{--<li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>--}}
                {{--<li><a href="#">Дома</a></li>--}}
                {{--<li class="active">{{$category->title}}</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <div class="container">
            <!-- two columns -->
            <div class="row">
                <!-- left column -->    <!-- /left column -->
                <!-- center column -->
                <aside class="col-md-12 col-lg-12 col-xl-12" id="centerColumn">
                    <!-- title -->
                    <div class="title-box">
                        <h2 class="text-center text-uppercase title-under">{{$category->title}}</h2>
                    </div>
                    <!-- /title -->
                    <!-- filters row -->

                    <!-- /filters row -->
                    <div class="product-listing row">
                        @foreach($categoriesChunked as $categoriesRows)
                            @foreach ($categoriesRows as $item)
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                                    <!-- product -->
                                    <div class="product product--zoom">
                                        <div class="product__inside">
                                            <!-- product image -->
                                            <div class="product__inside__image">
                                                <!-- product image carousel -->
                                                <div class="product__inside__carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="item active"><a>
                                                                <img class="img img-responsive"
                                                                     @if($isMobile)
                                                                     onclick="location.href='{{route('category',[$item->id,$item->url])}}'"
                                                                     @endif
                                                                     data-src="/uploads/category/{{$item->image}}" alt=""></a>
                                                        </div>
                                                        <div class="item"><a href="{{route('category', [$item->id, $item->url])}}"><img
                                                                        src="images/product/product-2.jpg" alt=""></a>
                                                        </div>
                                                        <div class="item"><a href="{{route('category', [$item->id, $item->url])}}"><img
                                                                        src="images/product/product-3.jpg" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <!-- Controls -->

                                                </div>
                                                <!-- /product image carousel -->
                                                <!-- quick-view -->
                                                {{--<a href="{{route('category',[$item->id,$item->url])}}" class="hidden-xs hidden-sm hidden-md quick-view"><b><span class="icon icon-visibility"></span>--}}
                                                        {{--Прегледај</b> </a>--}}
                                                <!-- /quick-view -->
                                                <!-- countdown_box -->

                                                <!-- /countdown_box -->
                                            </div>
                                            <!-- /product image -->
                                            <!-- label news -->

                                            <!-- /label news -->
                                            <!-- label sale -->

                                            <!-- /label sale -->
                                            <!-- product name -->
                                            <div class="product__inside__name">
                                                <h2><a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a></h2>
                                            </div>
                                            <!-- /product name -->
                                            <!-- product description -->
                                            <!-- visible only in row-view mode -->

                                            <a href="{{route('category',[$item->id,$item->url])}}" class="hidden-xs hidden-sm hidden-md quick-view"><b><span class="icon icon-visibility"></span>
                                                    Прегледај</b> </a>
                                        </div>

                                    </div>
                                    <!-- /product info -->
                                    <!-- product rating -->

                                    <!-- /product rating -->
                                </div>


                                <!-- /product -->

                        @endforeach
                    @endforeach


                    <!-- filters row -->
                    </div>
                    <!-- /filters row -->
                </aside>
                <!-- center column -->
            </div>
            <!-- /two columns -->
        </div>
    </div>


@endsection