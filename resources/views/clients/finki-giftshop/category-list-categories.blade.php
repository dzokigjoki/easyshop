@extends('clients.finki-giftshop.layouts.default')
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
                            <li class="item col-md-3 wide-first">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <div class="pimg">
                                                <a href="{{route('product',[$item->id,$item->url])}}" class="product-image">
                                                    {{--<img src="{{\ImagesHelper::getProductImage($item)}}"--}}
                                                         {{--class="attachment-shop_catalog" alt="Images">--}}
                                                </a>
                                            </div> <!-- /.pimg -->

                                            {{--<div class="box-hover">--}}
                                            {{--<ul class="add-to-links">--}}
                                            {{--<li><a href="#" class="link-wishlist" title="WishList"><i--}}
                                            {{--class="fa fa-heart"></i></a></li>--}}
                                            {{--<li><a class="add_to_cart_button" href="#" title="Add card"><i--}}
                                            {{--class="fa fa-shopping-cart"></i></a></li>--}}
                                            {{--<li><a title="Quick View" class="quickview link-quickview"><i--}}
                                            {{--class="fa fa-compress"></i></a></li>--}}
                                            {{--</ul>--}}
                                            {{--</div> <!-- /.box-hover -->--}}
                                        </div> <!-- /.item-img-info -->
                                    </div> <!-- /.item-img -->

                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="{{route('product',[$item->id,$item->url])}}">{{$item->title}}</a>
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