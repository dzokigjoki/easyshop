@extends('clients.kliknikupi.layouts.default')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{route('home')}}">Дома</a></li>
                {{--                <li><a href="/">{{$product->category}}</a></li>--}}
                <li><a href="#">{{$product->title}}</a></li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <div id="pageContent">
        {{--<div class="productPrevNext hidden-xs hidden-sm">--}}
            {{--<a href="#" class="product-prev"><img src="images/product/product-01.jpg" alt=""/></a>--}}
            {{--<a href="#" class="product-next"><img src="images/product/product-01.jpg" alt=""/></a>--}}
        {{--</div>--}}
        <div class="container offset-0">
            <div class="row">
                <div class="col-md-5 hidden-xs">
                    <div class="product-main-image">
                        <div class="product-main-image-item">
                            <img class="zoom-product" src="{{$product->image}}" data-zoom-image="{{$product->image}}"
                                 alt=""/>
                        </div>
                    </div>
                    <div class="product-images-carousel">
                        {{--<ul id="smallGallery" style="float: left;">--}}
                            {{--<li>--}}
                                {{--<a class="zoomGalleryActive" href="{{$product->image}}">--}}
                                    {{--<img src="{{$product->image}}">--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{----}}
                            {{--<li><a href="#" data-image="images/product/product-big-2.jpg" data-zoom-image="images/product/product-big-2-zoom.jpg"><img src="images/product/product-small-2.jpg" alt="" /></a></li>--}}
                            {{--<li><a href="#" data-image="images/product/product-big-3.jpg" data-zoom-image="images/product/product-big-3-zoom.jpg"><img src="images/product/product-small-3.jpg" alt="" /></a></li>--}}
                            {{--<li>--}}
                            {{--<div class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/JuO-wy0YxIs">--}}
                            {{--<img src="images/product/product-small-empty.png" alt="" />--}}
                            {{--<div>--}}
                            {{--<span class="icon icon-videocam"></span>--}}
                            {{--<span class="title">Video<br>Review</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<div class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="images/slides/video/video.mp4">--}}
                            {{--<img src="images/product/product-small-empty.png" alt="" />--}}
                            {{--<div>--}}
                            {{--<span class="icon icon-videocam"></span>--}}
                            {{--<span class="title">Video<br>Review</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        <div id="gallery-slick">


                                @foreach($product->images as $img)

                                        <a class="zoomGalleryActive" href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                            <img style="width: 70px;" src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}" />
                                        </a>

                                @endforeach

                        </div>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="visible-xs">
                        <div class="clearfix"></div>
                        <ul class="mobileGallery-product">
                            <li><img src="{{$product->image}}" alt=""/></li>
                            @foreach($product -> images as $img)
                                {{--<li>--}}
                                <li><a class="zoomGalleryActive" href="#"
                                       data-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                       data-zoom-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"><img
                                                src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                alt=""/></a></li>
                                {{--</li>--}}
                            @endforeach

                            {{--<li><img src="/assets/kliknikupi/img/product/product-big-3.jpg" alt="" /></li>--}}


                            {{--<li>--}}
                            {{--<div class="video-carusel">--}}
                            {{--<img src="images/product/product-small-empty.png" alt="" />--}}
                            {{--<div>--}}
                            {{--<iframe src="http://www.youtube.com/embed/JuO-wy0YxIs"></iframe>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                    <div class="product-info">
                        <h1 class="title vendor-top">{{$product->title}}</h1>
                        <div class="price">
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                    ден.</span><span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                    ден.</span>
                            @else
                                <span class="new-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                    ден.</span>

                            @endif
                        </div>
                        <div class="add-info">
                            <ul class="productvendorsmallinfo">
                                <li><span>Шифра:</span> {{$product->unit_code}}</li>
                                <li><span>Достапност:</span> Да</li>
                            </ul>
                        </div>
                        @if(!$product->variationValuesAndIds()->isEmpty())
                            <div class="wrapper">
                                <div class="pull-left"><label class="qty-label">Големина:</label></div>
                                <div class="pull-left">
                                    <select data-product-variation class="form-control" id="input-option200"
                                            name="option[200]">
                                        @foreach($product->variationValuesAndIds() as $variations)
                                            <option value="{{$variations->id}}">{{$variations->value}}</option>
                                        @endforeach
                                    </select></div>
                            </div>
                        @endif


                        <div class="wrapper">
                            <div class="pull-left"><label class="qty-label">Количина</label></div>
                            <div class="pull-left">
                                <div class="style-2 input-counter">
                                    <span class="minus-btn"></span>
                                    <input type="text" name="quantity" data-product-quantity="" value="1" size="100"/>
                                    <span class="plus-btn"></span>
                                </div>
                            </div>
                            {{--<div class="pull-left">--}}


                            {{--<br><br>--}}
                            {{--@if(!$product->variationValuesAndIds()->isEmpty())--}}
                            {{--<div class="form-group required">--}}
                            {{--<label class="control-label">Големина:</label>--}}
                            {{--<select data-product-variation class="form-control" id="input-option200"--}}
                            {{--name="option[200]">--}}
                            {{--@foreach($product->variationValuesAndIds() as $variations)--}}
                            {{--<option value="{{$variations->id}}">{{$variations->value}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--@endif--}}


                            <button type="button" id="cart-button" value="{{$product->id}}"
                                    class="btn btn-md btn-addtocart"
                                    data-add-to-cart="">
                                <span class="icon icon-shopping_basket"></span>
                                Додади во кошничка
                            </button>
                            {{--</div>--}}
                        </div>


                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                            <div class="promo">
                                <div class="pull-left">
                                    <div class="block-table">
                                        <div class="block-table-cell">
                                            Заштедувате
                                            <?php $discount = (int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)?>
                                            {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                            {{$discount}}
                                            ден.

                                        </div>
                                    </div>
                                </div>


                                <div class="pull-right">
                                    <div class="countdown_box">
                                        <div class="countdown_inner" style="vertical-align: middle; font-size: 25px;">
                                            <?php $percent = $discount/$product->$myPriceGroup * 100 ?>
                                       <span style="margin-top: 50px">{{(int)$percent}}% попуст</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="description">
                            <?php echo $product->description; ?>
                        </div>
                        {{--<div class="wrapper">--}}
                        {{--<div class="title-options">SIZE<span class="color-required">*</span></div>--}}
                        {{--<ul class="tags-list">--}}
                        {{--<li><a href="#">XS</a></li>--}}
                        {{--<li class="active"><a href="#">S</a></li>--}}
                        {{--<li><a href="#">M</a></li>--}}
                        {{--<li><a href="#">L</a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}


                    </div>
                </div>
            </div>
            <br>
            <h2 class="block-title text-left small">Можеби ќе ве интересира</h2>
            <div class="carousel-products-5 carouselTab slick-arrow-top slick-arrow-top1 products-mobile-arrow  row">

                @foreach($relatedProducts as $article)
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 slick-slide" style="">
                        <div class="style_prevu_kit">
                            <div class="product">
                                <div class="product_inside">
                                    <div class="image-box">

                                        <img class="home-image" src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            <div class="label-sale">Заштеда <?php $percent = ((int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0)) / (int)$article->$myPriceGroup * 100?>
                                                {{(int)$percent}}%
                                            </div>
                                        @endif

                                        <a href="{{route('product', [$article->id, $article->url])}}"
                                           data-toggle="modal" data-target="" class="quick-view">
                                            <span><span class="icon icon-visibility"></span>Прегледај</span>

                                            <a class="btn btn-product_addtocart" data-add-to-cart="" value="{{$article->id}}"><i class="fa fa-cart"></i> Додади во кошничка</a>
                                        </a>

                                    </div>

                                    <h2 class="title">
                                        <a href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                                    </h2>

                                    <div class="price view">
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            {{--namalena cena--}}
                                            {{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                            <span class="price_currency"> ден.</span>
                                            {{--stara cena--}}
                                            <span class="old-price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                ден.</span>

                                        @else
                                            {{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span class="price_currency"> ден.</span>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>


    </div>
@endsection