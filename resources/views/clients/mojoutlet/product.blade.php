@extends('clients.shopathome.layouts.default')
@section('content')
    <div class="breadcrumbs hidden-xs">
        <div class="container">
            <ol class="breadcrumb breadcrumb--ys pull-left">
                <li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>
                <li><a href="{{route('home')}}">Дома</a></li>
                <li class="active">{{$product->title}}</li>
            </ol>
        </div>
    </div>
    <!-- /breadcrumbs -->
    <!-- CONTENT section -->
    <div id="pageContent">
        <section class="content offset-top-0">
            <div class="container">
                <div class="row product-info-outer">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-5 col-xl-6">
                                <div class="product-info__title hidden-md hidden-sm hidden-lg">
                                    <h2>{{$product->title}}</h2>
                                </div>
                                <div class="product-main-image" style="position:relative">
                                    {{--<a class="easyzoom" href="{{$product->image}}">--}}
                                    <div class="product__label product__label--left product__label--sale"> <span>- {{(int)(((int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0))
                                            /($product->$myPriceGroup) * 100)}}%
                                                    <br></span>
                                    </div>
                                    <img @if(!$isMobile)id="zoom_01" @endif src="{{$product->image}}" alt="{{$product->title}}" data-zoom-image="{{$product->image}}"/>
                                    {{--</a>--}}
                                </div>
                                <div class="hidden-xs product-images-carousel">
                                    <ul id="hidden-xs smallGallery" style="float: left;">
                                        <li style="display: inline;">
                                            <a class="zoomGalleryActive" href="{{$product->image}}"
                                               data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                                                <img style="width:98px; height: 98px;" src="{{$product->image}}"
                                                     alt=""/>
                                            </a>
                                        </li>
                                        @foreach($product->images as $img)
                                            <li style="display: inline;">
                                                <a class="zoomGalleryActive"
                                                   href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                   data-image="{{$product->image}}"
                                                   data-zoom-image="{{$product->image}}">
                                                    <img style="width:98px; height: 98px;"
                                                         src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}"/>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info col-sm-6 col-md-6 col-lg-7 col-xl-6">

                                <div class="product-info__title hidden-xs">
                                    <h2>{{$product->title}}</h2>
                                </div>
                                <div class="wrapper visible-xs">
                                    {{--<div class="product-info__sku pull-left">SKU: <strong>mtk012c</strong></div>--}}
                                    {{--<div class="product-info__availability pull-right">Availability:   <strong class="color">In Stock</strong></div>--}}
                                </div>
                                <div class="visible-xs mobile-menu-off">
                                    <div class="clearfix"></div>
                                    <ul id="mobileGallery">
                                        <li style="display: inline;">
                                            <a class="zoomGalleryActive" href="{{$product->image}}" data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                                                <img style="width:98px; height: 98px;" src="{{$product->image}}" />
                                            </a>
                                        </li>
                                        @foreach($product->images as $img)
                                            <li style="display: inline;">
                                                <a class="zoomGalleryActive"
                                                   href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                   data-image="{{$product->image}}"
                                                   data-zoom-image="{{$product->image}}">
                                                    <img style="width:98px; height: 98px;"
                                                         src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}"/>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>



                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <div class="price-box product-info__price"><span class="price-box__new">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                            ден.</span>
                                        <span class="price-box__old">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                            ден.</span></div>
                                    {{--<div style="font-size:18px; color:red;" class="price-box__new">Заштедувате:--}}
                                    {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                    {{--ден.--}}

                                    {{--</div>--}}
                                @else
                                    <div class="price-box product-info__price"><span class="price-box__new">{{$product->price}}
                                            ден.</span></div>
                                @endif

                                <div class="divider divider--xs product-info__divider hidden-xs"></div>

                                <div class="wrapper">
                                    {{--<div class="pull-left"><span class="option-label">COLOR:</span>  Red + $10.00 *</div>--}}
                                    {{--<div class="pull-right required">* Required Fields</div>--}}
                                </div>

                                {{--<div class="wrapper">--}}
                                {{--<div class="pull-left"><span class="option-label">SIZE:</span></div>--}}
                                {{--<div class="pull-left required">*</div>--}}
                                {{--</div>--}}
                                {{--<ul class="options-swatch options-swatch--size options-swatch--lg">--}}
                                {{--<li><a href="#">S</a></li>--}}
                                {{--<li><a href="#">M</a></li>--}}
                                {{--<li><a href="#">L</a></li>--}}
                                {{--<li><a href="#">XL</a></li>--}}
                                {{--<li><a href="#">2XL</a></li>--}}
                                {{--<li><a href="#">3XL</a></li>--}}
                                {{--</ul>--}}
                                <div class="divider divider--sm"></div>
                                <div class="wrapper">
                                    <div class="pull-left"><span class="qty-label">Количина:</span></div>
                                    <div class="pull-left">
                                        <!--  -->
                                        <div class="number input-counter">
                                            <span class="minus-btn"></span>
                                            <input type="text" name="quantity" title="Qty" class="quantity" data-product-quantity="" value="1" size="5"/>
                                            <span class="plus-btn"></span>
                                        </div>
                                        <!-- / -->
                                    </div>
                                    <div class="pull-left btnIpad">
                                        <button value="{{$product->id}}" data-add-to-cart="" id="add_to_cart"
                                                class="btn btn--ys btn--xl  dodadi_vo_kosnicka">

                                            <span class="icon icon-shopping_basket add-to-cart-button">Купи</span>
                                        </button>
                                    </div>
                                    <ul class="product-link">
                                        {{--<li class="text-right"><a href="#"><span class="icon icon-favorite_border  tooltip-link"></span><span class="text">Add to wishlist</span></a></li>--}}
                                        {{--<li class="text-left"><a href="#"><span class="icon icon-sort  tooltip-link"></span><span class="text">Add to compare</span></a></li>--}}
                                    </ul>
                                </div>
                                <div class="product-info__description">
                                    <br>
                                    {{--<div class="product-info__description__brand"><img src="images/custom/brand.png"  alt="" /> </div>--}}
                                    <div class="product-info__description__text">{!! $product->description !!}</div>
                                </div>
                                <div class="divider divider--xs product-info__divider"></div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>

        @if(count($relatedProducts))
        <!-- related products -->
        <section class="content">
            <div class="container">
                <!-- title -->
                <div class="title-with-button">
                    <div class="carousel-products__center pull-right"><span class="btn-prev"></span> <span
                                class="btn-next"></span></div>
                    <h2 class="text-left text-uppercase title-under pull-left">Можеби ќе ве интересира</h2>
                </div>
                <!-- /title -->
                <!-- carousel -->
                <div class="carousel-products row" id="carouselFeatured">
                    @foreach($relatedProducts as $article)
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 col-xl-one-six">
                            <!-- product -->
                            <div class="product" id="related-product">
                                <div class="product__inside">
                                    <!-- product image -->
                                    <div class="product__inside__image">
                                        <a class="limit-txt" href="{{route('product',[$article->id,$article->url])}}">
                                            <img
                                                    @if($isMobile)
                                                    onclick="location.href='{{route('product',[$article->id,$article->url])}}'"
                                                    @endif
                                                    class="home-image"
                                                 src="{{\ImagesHelper::getProductImage($article, NULL, 'lg_')}}" alt="">
                                        </a>
                                        <!-- quick-view -->
                                        <a href="{{route('product',[$article->id,$article->url])}}"
                                           class="hidden-xs hidden-sm hidden-md quick-view"><b><span
                                                        class="icon icon-visibility"></span>
                                                Прегледај</b> </a>
                                        <!-- /quick-view -->
                                    </div>
                                    <!-- /product image -->
                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                        <div class="product__label product__label--left product__label--sale"> <span>- {{(int)(((int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($article, false, 0))
                                            /($article->$myPriceGroup) * 100)}}%
                                                    <br></span>
                                        </div>
                                        @endif
                                                <!-- product name -->
                                        <div class="product__inside__name">
                                            <h2>
                                                <a href="{{route('product',[$article->id,$article->url])}}">{{$article->title}}</a>
                                            </h2>
                                        </div>
                                        <!-- /product name -->                 <!-- product description -->
                                        <!-- visible only in row-view mode -->
                                        <div class="product__inside__description row-mode-visible"> {!!
                                            $article->short_description !!}
                                        </div>
                                        <!-- /product description -->                 <!-- product price -->
                                        @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                            {{--namalena cena--}}
                                            {{--<div style="font-size:18px; color:red;" class="product__inside__price price-box">Заштедувате:--}}
                                            {{--{{(int)$article->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                            {{--ден.--}}

                                            {{--</div>--}}
                                            <div class="product__inside__price price-box"> {{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                ден.
                                        <span class="blok price-box__old"> {{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                            ден.</span>
                                            </div>
                                        @else
                                            <div class="product__inside__price price-box">{{$article->price}}ден.
                                            </div>
                                        @endif
                                        <div class="product__inside__hover">
                                            <!-- product info -->
                                            <div class="product__inside__info">
                                                <div class="product__inside__info__btns">
                                                    <button value="{{$article->id}}"
                                                            data-add-to-cart="" id="add_to_cart"
                                                            class="btn btn--ys btn--xl">
                                                        <span class="icon icon-shopping_basket"></span>
                                                          Купи
                                                    </button>

                                                    <a href="{{route('product',[$article->id,$article->url])}}"
                                                       class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span
                                                                class="icon icon-visibility"></span>Прегледај</a>
                                                </div>

                                            </div>
                                            <!-- /product info -->
                                            <!-- product rating -->
                                            <div class="rating"></div>
                                            <!-- /product rating -->
                                            <!-- /product rating -->
                                        </div>
                                </div>
                            </div>
                            <!-- /product -->
                        </div>
                    @endforeach
                </div>
                <!-- /carousel -->
            </div>
        </section>
        @endif
        <!-- /related products -->
    </div>

@endsection