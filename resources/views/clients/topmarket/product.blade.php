@extends('clients.topmarket.layouts.default')
@section('content')

    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->


    <div class="page_wrapper">
        <div class="container">


            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$product->title}}</li>

            </ul>
            <br>
            <!-- - - - - - - - - - - - - - End of breadcrumbs - - - - - - - - - - - - - - - - -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">


                            <div id="product-image-container" class="panel panel-default">
                                <figure>
                                    <img src="{{$product->image}}"
                                         data-zoom-image="{{$product->image}}"
                                         alt="{{$product->title}}"
                                         id="product-image">

                                </figure>
                            </div>

                            <div id="product-image-carousel-container">
                                <ul id="product-carousel" class="celastislide-list">
                                    @foreach($product->images as $img)
                                        <li class="active-slide thumbnail_li" style="padding: 1px">
                                            <a href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                               data-rel='prettyPhoto[product]'
                                               data-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                               data-zoom-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                                <img class="thumbnail_picture panel panel-default"
                                                     src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}"
                                                     data-large-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                     alt="">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- product-image-container -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6 col-sm-12 col-xs-12 product">
                            <div class="lg-margin visible-sm visible-xs"></div><!-- Space -->
                            <h1 class="product-name">{{$product->title}}</h1>
                            <span>{!! $product->short_description !!}</span>
                            <ul class="product-list">
                                {{--<li><span>Достапност:</span>--}}
                                    {{--@if($product->total_stock)--}}
                                        {{--<span class="btn-small btn-success"--}}
                                              {{--style="padding-right: 10px; padding-left: 10px; padding-top: 3px; padding-bottom: 3px; border-radius: 5px;">Достапно</span>--}}
                                    {{--@else--}}
                                        {{--<span class="btn-small btn-danger"--}}
                                              {{--style="padding-right: 10px; padding-left: 10px; padding-top: 3px; padding-bottom: 3px; border-radius: 5px;">Нема на залиха</span>--}}
                                    {{--@endif</li>--}}
                                <li><span>Шифра:</span>{{$product->unit_code}}</li>
                                {{--<li><span>Производител:</span>placheolder</li>--}}
                                <li>@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <br>


                                        <h4 class="product_price_old">

                                            Стара цена:

                                            <span style="text-decoration: line-through; color: #000000"><span
                                                        style="color: #d9534f ;" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                        </h4>

                                        <h3 class="product_price_new">

                                            Намалена цена:

                                            <span class="price"> <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                        </h3>


                                    @else
                                        <br>
                                        <h3>

                                            Цена:     <span class="price"> <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        </span>
                                            </span>
                                        </h3>
                                    @endif</li>
                            </ul>
                            <hr>
                            <div class="product-add clearfix">
                                <h5>Количина:</h5>
                                <div class="custom-quantity-input">
                                    <input type="number" name="quantity" data-product-quantity="" value="1" min="1" style="font-size: 26px;">
                                </div>
                                {{--@if($product->total_stock)--}}
                                    <button class="btn btn-custom-2" data-add-to-cart="">Нарачај тука</button>
                                {{--@else--}}
                                    {{--<button class="btn btn-disabled" data-add-to-cart="" disabled>Нарачај тука--}}
                                    {{--</button>--}}
                                {{--@endif--}}
                                <br><br>
                                @if(!$product->variationValuesAndIds()->isEmpty())
                                    <div class="form-group required">
                                        <label class="control-label">Големина:</label>
                                        <select data-product-variation class="form-control" id="input-option200" name="option[200]">
                                            @foreach($product->variationValuesAndIds() as $variations)
                                                <option value="{{$variations->id}}">{{$variations->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="panel panel-default">
                                    @if($product->description)
                                        <div class="panel-body" id="desc">
                                            {!!$product->description!!}
                                        </div>
                                    @endif
                                </div>


                            </div><!-- .product-add -->
                            <div class="md-margin"></div><!-- Space -->
                            <div class="product-extra clearfix">

                                <div class="md-margin visible-xs"></div>
                                <!-- End .share-button-group -->
                            </div>
                        </div><!-- End .col-md-6 -->


                    </div><!-- End .row -->


                </div><!-- End .row --></div>
            <div class="latest-items carousel-wrapper">
                <header class="content-title">
                    <div class="title-bg">
                        <h2 class="title">Продукти од иста категорија</h2>
                    </div><!-- End .title-bg -->

                </header>

                <div class="carousel-controls">
                    <div id="latest-items-slider-prev" class="carousel-btn carousel-btn-prev">
                    </div><!-- End .carousel-prev -->
                    <div id="latest-items-slider-next"
                         class="carousel-btn carousel-btn-next carousel-space">
                    </div><!-- End .carousel-next -->
                </div><!-- End .carousel-controls -->

                <div class="latest-items-slider owl-carousel" >
                    @foreach($relatedProducts as $article)

                        <div class="item item-hover">
                            <div class="item-image-wrapper">
                                <figure class="item-image-container panel panel-default">
                                    <a href="{{route('product', [$article->id, $article->url])}}">
                                        <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                             alt="item1"
                                             class="item-image">
                                        <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                             alt="item1Hover" class="item-image-hover"></a>
                                </figure>


                            </div><!-- End .item-image-wrapper -->

                            <!-- End .rating-container -->
                            <h3 class="item-name"><a
                                        href="{{route('product', [$article->id, $article->url])}}">{{$article->title}}</a>
                            </h3>
                            <div class="product-price" style="text-align: center">
                                @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                    <span class="product-price-new-home" style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                    <span style="text-decoration: line-through; color: #000000; font-weight: bold" >
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                @else


                                    <span class="product-price-new-home" style="font-weight: bold;"> <span
                                                id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                @endif
                            </div>

                            <div style="text-align: center">
                                <button id="buy_home" data-add-to-cart="" class="btn btn-custom-2" type="button" value="{{$article->id}}" onClick=""><span>Нарачај тука</span></button>

                            </div>

                            <!-- End .item-meta-container -->
                        </div><!-- End .item -->
                        <!-- End .item -->
                @endforeach
                <!-- End .item -->

                    <!-- End .item-action-inner -->
                </div><!-- End .item-action -->
            </div>


            <div class="row">

                <main class="col-md-9 col-sm-8">

                    <!-- - - - - - - - - - - - - - Product images & description - - - - - - - - - - - - - - - - -->

                    <section class="section_offset">

                        <div class="clearfix">

                            <!-- - - - - - - - - - - - - - Product image column - - - - - - - - - - - - - - - - -->

                            <div class="single_product">

                                <!-- - - - - - - - - - - - - - Image preview container - - - - - - - - - - - - - - - - -->

                                <div class="image_preview_container">

                                    <img data-zoom-image="{\ImagesHelper::getProductImage($product)}}"
                                         src="{{\ImagesHelper::getProductImage($product)}}" alt="">


                                </div><!--/ .image_preview_container-->

                                <!-- - - - - - - - - - - - - - End of image preview container - - - - - - - - - - - - - - - - -->

                                <!-- - - - - - - - - - - - - - Prodcut thumbs carousel - - - - - - - - - - - - - - - - -->

                                {{--<div class="product_preview">--}}
                                {{--@if($product->images)--}}
                                {{--<div class="owl_carousel" id="thumbnails">--}}

                                {{--<a href="#" data-image="{{$product->image}}"--}}
                                {{--data-zoom-image="{{$product->image}}">--}}
                                {{--<img src="{{$product->image}}" data-large-image="{{$product->image}}"--}}
                                {{--alt="{{$product->title}}">--}}
                                {{--</a>--}}

                                {{--@foreach($product->images as $img)--}}
                                {{--<a href="#"--}}
                                {{--data-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"--}}
                                {{--data-zoom-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">--}}
                                {{--<img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"--}}
                                {{--data-large-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"--}}
                                {{--alt="">--}}
                                {{--</a>--}}
                                {{--@endforeach--}}

                                {{--</div><!--/ .owl-carousel-->--}}
                                {{--@endif--}}

                                {{--</div><!--/ .product_preview-->--}}
                            </div>
                        </div>
                        <!-- End .item-meta-container -->

                    </section>
                </main>
            </div><!-- End .item -->
        </div>


    </div><!--/ .row-->


    <!--/ .page_wrapper-->

    <!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->





@endsection

