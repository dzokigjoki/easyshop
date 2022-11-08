@extends('clients.ibutik.layouts.default')

@section('content')
    <div class="container">
        <header class="page-header">
            <ol class="breadcrumb page-breadcrumb">
                <li><a href="{{route('home')}}">Почетна</a>
                </li>
                <i class="fa fa-angle-right"></i>
                <li class="active">{{$product->title}}</li>
            </ol>
        </header>
        <div class="row">
            <div class="col-md-6">
                <div class="jqzoom-left clearfix">
                    <div class="product-page-product-wrap jqzoom-stage jqzoom-stage-lg" id="underpic">
                        <div class="clearfix">
                            <img id="elevate-zoom-pic" src="{{$product->image}}" alt="/"
                                 title="" style="width: 100%;" data-zoom-image="{{$product->image}}">
                        </div>
                    </div>
                </div>
                <ul class="jqzoom-list" id="picture-list-product" style="display: inline-block">
                    <li><a class="zoomGalleryActive" href="{{$product->image}}">
                            <img src="{{$product->image}}">
                        </a></li>
                    @foreach($product->images as $img)
                        <li> <a class="zoomGalleryActive" href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}" />
                            </a></li>
                    @endforeach
                </ul>
            </div>

            <div class=" col-md-6">
                <div class="_box-highlight">
                    <h1>{{$product->title}}</h1>
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        {{--Nova cena--}}
                        <span class="product-page-price">{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}}
                            ден.</span>
                        {{--Stara cena--}}
                        <span style="text-decoration: line-through;color: #DC291E; font-weight: bold;">
                            <span style="color: #727272; font-size: 24px;">
                                {{number_format($product->$myPriceGroup)}} ден.
                            </span>
                        </span>

                    @else
                        <p class="product-page-price">{{$product->price}} мкд.</p>
                        {{--<p class="text-muted text-sm">Free Shipping</p>--}}
                    @endif
                    <p class="product-page-desc-lg">{{$product->short_description}}</p>
                    <ul
                            class="product-page-option-list">
                        {{--<li class="clearfix">--}}
                        {{--<h5 class="product-page-option-title">Color</h5>--}}
                        {{--<select class="product-page-option-select">--}}
                        {{--<option selected>White</option>--}}
                        {{--<option>Black</option>--}}
                        {{--<option>Gold</option>--}}
                        {{--</select>--}}
                        {{--</li>--}}
                    </ul>

                    <ul class="product-page-actions-list">
                        <li class="quantity-label"><label>Количина:</label></li>
                        <li class="product-page-qty-item">
                            {{--<button class="product-page-qty product-page-qty-minus">-</button>--}}

                            <input data-product-quantity="" id="quantity"
                                   class="product-page-qty product-page-qty-input" type="number"
                                   value="1" min="1"/>
                            {{--<button class="product-page-qty product-page-qty-plus" onclick="add">+</button>--}}
                        </li>
                        <li class="button_product_page">
                            <a data-add-to-cart="" id="add_to_cart" class="btn btn-lg btn-primary add_to_cart_link" href="#">
                                <i class="fa fa-shopping-cart"></i>Додади во кошничка
                            </a>
                        </li>
                        {{--<li><a class="btn btn-lg btn-default" href="#"><i class="fa fa-star"></i>Додади во омилени</a>--}}
                        {{--</li>--}}
                    </ul>
                    <br>
                    @if($product->description)
                        <div class="tabbable product-tabs">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#tab-1" data-toggle="tab">Опис</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-1">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            @endif
                        </div>
                </div>
            </div>


            <div class="gap"></div>
            @if($relatedProducts)

                <h3 class="widget-title-lg">Продукти од иста категорија</h3>
                <div class="row" data-gutter="4">
                    <div class="col-md-12">
                        @foreach($relatedProducts as $product)
                            <div class="col-md-3">
                                <div class="product ">
                                    <ul class="product-labels">
                                        @if($product->is_exclusive)
                                            <li>Препорачано</li>
                                        @endif
                                    </ul>
                                    <div style="border: 1px solid #eee;" class="product-img-wrap">
                                        {{--<img class="product-img" src="{{$product->image}}" alt="Image Alternative text" title="Image Title" />--}}
                                        <img class="product-img" src="{{\ImagesHelper::getProductImage($product)}}"
                                             alt="Image Alternative text"/>
                                    </div>
                                    <a class="product-link" href="{{route('product', [$product->id, $product->url])}}"></a>
                                    <div class="product-caption">
                                        <h5 class="product-caption-title">{{$product->title}}</h5>
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            {{--prvicna cena--}}
                                            <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>


                                            {{--popust--}}
                                        @else
                                            <span class="product-caption-price">
                                            <span class="product-caption-price-new">
                                                {{number_format($product->$myPriceGroup)}} ден.</span>
                                        </span>
                                        @endif
                                        {{--<ul class="product-caption-feature-list">--}}
                                        {{--<li>2 left</li>--}}
                                        {{--<li>Free Shipping</li>--}}
                                        {{--</ul>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="gap"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{--<div class="gap"></div>--}}


    {{--</div>--}}
@endsection