@extends('clients.finki-giftshop.layouts.default')
@section('content')
    <div id="content" class="post-wrap sidebar-left flat-reset">
        <div id="primary" class="content-area">
            <div class="product-view">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-essential">
                                <div itemscope="" class="product">
                                    <div class="product-img-box col-md-5">
                                        <div class="product-image">
                                            <div class="pimg">
                                                <a href="#" class="product-image">
                                                    <img src="{{$product->image}}" class="attachment-shop_catalog" alt="Images">
                                                </a>

                                            </div> <!-- /.pimg -->
                                            <div class="more-views">
                                                <div class="slider-items-products">

                                                   {{--Foreach gallery--}}
                                                    <div class="more-views-items">
                                                        <a href="#" class="cloud-zoom-gallery first" title="Image">
                                                            <img src="img/page/product_detail/6.jpg" class="attachment-shop_thumbnail size-shop_thumbnail" alt="Images" title="Images"></a>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-shop col-md-7">
                                        <div class="product-name">
                                            <h1 itemprop="name" class="product_title entry-title">{{$product->title}}</h1>
                                        </div>



                                        <div itemprop="offers" class="price-block">

                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <div class="price-box price"><ins><span class="amount">
                                                       {{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}}
                                                        ден.
                                                    </span></ins>
                                                <del><span class="amount">{{number_format($product->$myPriceGroup)}} ден.</span></del>
                                            </div>
                                                @else
                                                <div class="price-box price"><ins><span class="amount">
                                                         {{number_format($product->$myPriceGroup)}} ден.
                                                        </span></ins></div>

                                            @endif

                                           {{----}}
                                            {{--<meta itemprop="price" content="9.99">--}}
                                            {{--<meta itemprop="priceCurrency" content="USD">--}}
                                            {{--<link itemprop="availability" href="#">--}}
                                        </div>



                                            <p>
                                                {!! $product->description !!}
                                            </p>

                                            {{--<div class="model"><span>Model #:</span>9250320</div>--}}
                                            {{--<div class="dimensions"><span>Dimensions:</span>45"W x 38"D x 32"H</div>--}}
                                            {{--<div class="weight"><span>Weight:</span>88lbs</div>--}}



                                        <div class="add-to-box">
                                            <div class="add-to-cart">
                                                <form class="cart">
                                                    <div class="pull-left">
                                                        <div class="custom pull-left">
                                                            <div class="quantity">
                                                                <div class="pull-left">
                                                                    <div class="custom pull-left">
                                                                        <button class="reduced items-count" type="button"><i class="fa fa-minus"></i></button>
                                                                        <input type="text" name="quantity" value="2" title="количина" class="input-text qty text">
                                                                        <button class="increase items-count" type="button"><i class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="actions">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <button value="{{$product->id}}" class="flat" data-add-to-cart="">
                                                                    Додади во кошничка
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>


                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#" rel="nofollow" class="add_to_wishlist show">Add to Wishlist</a>
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide">
                                                <span class="feedback">Product added!</span>
                                                <a href="#" rel="nofollow" class="seoquake-nofollow">Browse Wishlist</a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="#" rel="nofollow" class="seoquake-nofollow">Browse Wishlist</a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>
                                        </div> <!-- /.yith-wcwl-add-to-wishlist -->

                                        <a href="#" class="compare button seoquake-nofollow">Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.product-view -->



            <div class="product-recommend">
                <div class="container">
                    <h3>Поврзани производи</h3>
                    <div class="row">
                        <div class="">
                            <ul class="products-grid flat-reset">

                                @foreach($relatedProducts as $article)
                                <li class="item wide-next">
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info">
                                                <div class="pimg">
                                                    <a href="#" class="product-image">
                                                        <img src="{{\ImagesHelper::getProductImage($article)}}" class="attachment-shop_catalog" alt="Images">
                                                    </a>

                                                </div> <!-- /.pimg -->

                                                <div class="box-hover">
                                                    <ul class="add-to-links">
                                                        <li><a title="Quick View" class="quickview link-quickview"><i class="fa fa-compress"></i></a></li>
                                                    </ul>
                                                </div> <!-- /.box-hover -->
                                            </div> <!-- /.item-img-info -->
                                        </div> <!-- /.item-img -->

                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title">
                                                    <a href="#">{{$article->title}}</a>
                                                </div> <!-- /.item-title -->

                                                <div class="item-content">
                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            <ins><span class="amount">{{$product->price}} ден.</span></ins><del>

                                                            </del>
                                                        </div>
                                                    </div> <!-- /.item-price -->

                                                </div> <!-- /.item-content -->
                                            </div> <!-- /.info-inner -->
                                        </div> <!-- /.item-info -->
                                    </div> <!-- /.item-inner -->
                                </li>
                                    @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection