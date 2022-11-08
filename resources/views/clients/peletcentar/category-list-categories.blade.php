@extends('clients.peletcentar.layouts.default')
@section('content')
    {{--<div class="boxed"></div>--}}
    {{--<div class="" id="">--}}
    <div class="page_wrapper">
        <div class="container">


            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul style="margin-bottom: 0px !important;" class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$category->title}}</li>

            </ul>
            <br>
        </div>
    </div>
    <?php $i = 0; ?>
    <div class="container offset-0">
                <ul class="clearfix products-grid products-grid-search flat-reset">
            @foreach($categoriesChunked as $categoriesRows)
                @foreach ($categoriesRows as $item)
                    <li style="height:100%" class="item col-md-3 wide-next">
                    <div style="padding-bottom: 30px; border: none !important;" class="item-inner">
                        <div class="item-img">
                            <div>
                                <div class="pimg">
                                    <a class="product-image" href="{{route('category', [$item->id, $item->url])}}">
                                        <img class="attachment-shop_catalog"  data-src="/uploads/category/{{$item->image}}" alt="">
                                    </a>
                                </div> <!-- /.pimg -->
                            </div> <!-- /.item-img-info -->
                        </div> <!-- /.item-img -->
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="flat-our-products item-title">
                                    <h2 style="color:black !important; height: 80px;" class="limit_text">
                                        <a href="{{route('category', [$item->id, $item->url])}}">{{$item->title}}</a>
                                    </h2>
                                </div> <!-- /.item-title -->
                            </div> <!-- /.info-inner -->
                        </div> <!-- /.item-info -->
                    </div> <!-- /.item-inner -->
                    </li>
                @endforeach
            @endforeach
                </ul>
        <br>
        <br>
    </div>
@endsection