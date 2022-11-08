@extends('clients.finki-giftshop.layouts.default')
@section('content')
    <div class="tp-banner-container hidden-xs" id="home" style="height: 500px;">
        <div class="tp-banner">
            <ul>
                <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000"
                    data-saveperformance="on">
                    <img style="margin-top: 300px;" src="/assets/finki-giftshop/img/banner.jpg" alt="slider-image"/>
                    <div class="tp-caption sfl title-slide flat-title-slider center" data-x="center" data-y="174"
                         data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        Добредојдовте
                    </div>
                    <div class="tp-caption sfr desc-slide center flat-desc" data-x="center" data-y="244"
                         data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                        на новиот gift shop на ФИНКИ
                    </div>

                </li>
            </ul>
        </div>
    </div>

    <!-- Iconbox -->
    <div class="flat-row-fix about">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="iconbox center circle lagre">
                        <div class="box-header">
                            <i class="fa fa-truck"></i>
                            <div class="box-title"><a href="#">БРЗА ДОСТАВА</a></div>
                        </div>
                        <div class="box-content">
                            До вашиот дом
                        </div>

                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-4 -->

                <div class="col-md-4">
                    <div class="iconbox center circle lagre">
                        <div class="box-header">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            <div class="box-title"><a href="#">СЕКОЈДНЕВНИ ПОПУСТИ</a></div>
                        </div>
                        <div class="box-content">
                            На најпопуларните купувани производи
                        </div>
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-4 -->

                <div class="col-md-4">
                    <div class="iconbox center circle lagre">
                        <div class="box-header">
                            <i class="fa fa-check"></i>
                            <div class="box-title"><a href="#">ЗАГАРАНТИРАН КВАЛИТЕТ</a></div>
                        </div>
                        <div class="box-content">
                            На целиот асортиман
                        </div>
                    </div><!-- /.iconbox -->
                </div><!-- /.col-md-4 -->
            </div>
        </div><!-- /.container -->
    </div>


    <div id="content" class="post-wrap product-page  sidebar-left flat-reset">
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <!-- /#secondary -->
                    <div class="flat-top-bar-shop flat-reset">
                        <div class="flat-left list-or-grid">
                            <h2>Најпродавано</h2>
                        </div> <!-- /.list-or-grid -->


                    </div> <!-- /.flat-top-bar-shop -->

                    <main class="post-wrap">
                        <ul class="products-grid flat-reset">
                            @foreach($bestSellersArticles as $product)


                            <li class="item col-md-3 wide-first">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <div class="pimg">
                                                <a href="{{route('product',[$product->id,$product->url])}}" class="product-image">
                                                    <img src="{{\ImagesHelper::getProductImage($product)}}"
                                                         class="attachment-shop_catalog" alt="Images">
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
                                                <a href="{{route('product',[$product->id,$product->url])}}">{{$product->title}}</a>
                                            </div> <!-- /.item-title -->

                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        <ins><span class="amount">{{$product->price}} ден.</span></ins>
                                                    </div>
                                                </div> <!-- /.item-price -->

                                            </div> <!-- /.item-content -->
                                        </div> <!-- /.info-inner -->
                                    </div> <!-- /.item-info -->
                                </div> <!-- /.item-inner -->
                            </li>
                            @endforeach

                        </ul>
                    </main>

                    <div style="height:60px;"></div>






                    <div class="flat-top-bar-shop flat-reset">
                        <div class="flat-left list-or-grid">
                            <h2>Препорачано</h2>
                        </div> <!-- /.list-or-grid -->


                    </div> <!-- /.flat-top-bar-shop -->

                    <main class="post-wrap">
                        <ul class="products-grid flat-reset">
                            @foreach($recommendedArticles as $product)


                                <li class="item col-md-3 wide-first">
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info">
                                                <div class="pimg">
                                                    <a href="product_detail.html" class="product-image">
                                                        <img src="{{\ImagesHelper::getProductImage($product)}}"
                                                             class="attachment-shop_catalog" alt="">
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
                                                    <a href="product_detail.html">{{$product->title}}</a>
                                                </div> <!-- /.item-title -->

                                                <div class="item-content">
                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            <ins><span class="amount">{{$product->price}} ден.</span></ins>
                                                        </div>
                                                    </div> <!-- /.item-price -->

                                                </div> <!-- /.item-content -->
                                            </div> <!-- /.info-inner -->
                                        </div> <!-- /.item-info -->
                                    </div> <!-- /.item-inner -->
                                </li>
                            @endforeach

                        </ul>
                    </main>

                    <div class="flat-top-bar-shop flat-reset">
                        <div class="flat-left list-or-grid">
                            <h2>Најново</h2>
                        </div> <!-- /.list-or-grid -->
                    </div> <!-- /.flat-top-bar-shop -->

                    <main class="post-wrap">
                        <ul class="products-grid flat-reset">
                            @foreach($newestArticles as $product)


                                <li class="item col-md-3 wide-first">
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info">
                                                <div class="pimg">
                                                    <a href="product_detail.html" class="product-image">
                                                        <img src="{{\ImagesHelper::getProductImage($product)}}"
                                                             class="attachment-shop_catalog" alt="Images">
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
                                                    <a href="product_detail.html">{{$product->title}}</a>
                                                </div> <!-- /.item-title -->

                                                <div class="item-content">
                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            <ins><span class="amount">{{$product->price}} ден.</span></ins>
                                                        </div>
                                                    </div> <!-- /.item-price -->

                                                </div> <!-- /.item-content -->
                                            </div> <!-- /.info-inner -->
                                        </div> <!-- /.item-info -->
                                    </div> <!-- /.item-inner -->
                                </li>
                            @endforeach

                        </ul>
                    </main>





                </div>
            </div>
        </div>
    </div>

    <div style="height:100px;"></div>



@endsection