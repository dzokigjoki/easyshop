@extends('clients.mobiin.layouts.default')

@section('content')

    <div class="main">
        <div class="container">
            {{--<ul class="breadcrumb">--}}
            {{--<li><a href="index.html">Home</a></li>--}}
            {{--<li><a href="">Store</a></li>--}}
            {{--<li class="active">Cool green dress with red bell</li>--}}
            {{--</ul>--}}
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-9 margin-bottom-40">
                    <div class="product-page">
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                                <div class="main-image" style="position: relative">
                                    <a class="easyzoom" href="{{$product->image}}">
                                        <img src="{{$product->mediumImage}}" alt="{{$product->title}}"/>
                                    </a>
                                    {{--data-BigImgsrc="{{$product->largeImage}}"--}}
                                </div>
                                @if($product->images)
                                    <div class="product-other-images">
                                        <a class="fancybox-button" rel="photos-lib" href="{{$product->image}}"
                                           title="{{$product->title}}">
                                            <img src="{{$product->image}}" title="{{$product->title}}"
                                                 alt="{{$product->title}}"/>
                                        </a>
                                        @foreach($product->images as $img)
                                            <a class="fancybox-button" rel="photos-lib"
                                               href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                               title="{{$product->title}}">
                                                <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}"
                                                     title="{{$product->title}}" alt="{{$product->title}}"/>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <h1>{{$product->title}}
                                    <div style="    font-size: 16px;margin-top: 10px;font-weight: normal;color: #999;">
                                        Шифра ({{$product->unit_code}})
                                    </div>
                                </h1>

                                <div class="price-availability-block clearfix">
                                    <div class="price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <strong>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} <span>{{\Session::get('selectedCurrency')}}</span></strong>
                                            <strong><div style="display: inline-block;text-decoration: line-through; margin-left: 15px;color: #999;font-weight: 400;">{{number_format($product->$myPriceGroup)}}</div> <span style="color: #999;">{{\Session::get('selectedCurrency')}}</span></strong>
                                        @else
                                            <strong>{{number_format($product->$myPriceGroup)}} <span>{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></strong>
                                        @endif
                                    </div>
                                    {{--<div class="availability">--}}
                                        {{--На залиха: <strong>{{$product->total_stock > 0 ? 'Да' : 'Не'}}</strong>--}}
                                    {{--</div>--}}
                                </div>

                                <?php $variations = $product->variationValuesAndIds() ?>
                                {{--@if(!empty($variations))--}}
                                    {{--<div class="product-page-options">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<label class="control-label">Големина:</label>--}}
                                            {{--<select data-product-variation="" name="product_variation" class="form-control input-sm">--}}
                                                {{--@foreach($variations as $variation)--}}
                                                    {{--<option value="{{$variation->id}}">{{$variation->value}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                                <div class="product-page-cart margin-top-20">
                                    <div class="product-quantity">
                                        <input data-product-quantity="" type="text" value="1" readonly
                                               class="form-control input-sm"/>
                                    </div>
                                    <button data-add-to-cart="" class="btn btn-primary" type="submit">Додади во
                                        кошничка
                                    </button>
                                </div>
                                <ul class="social-icons">
                                    <li><a class="facebook" target="_blank" data-original-title="facebook"
                                           href="https://www.facebook.com/mobiinShoesBags/"></a></li>
                                    <li><a class="instagram" target="_blank" data-original-title="instagram"
                                           href="https://www.instagram.com/mobiinshoesbags/"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="product-page-content">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active"><a href="#Description" data-toggle="tab"
                                                              aria-expanded="true">Опис на производот</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade active in" id="Description">


                                            @if($product->attributes)
                                                <div class="row">
                                                    @foreach($product->attributes as $name => $attributeList)
                                                        <div class="col-sm-4 col-xs-12 product-attribute">
                                                            <div class="product-attribute-value-wrap">
                                                        <span class="product-attribute-name">
                                                            {{$name}}:
                                                        </span>
                                                                @foreach($attributeList as $attribute)
                                                                    <span class="product-attribute-value">
                                                            {{$attribute->value}}
                                                            </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif

                                            {!! $product->description !!}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->

                <!-- BEGIN SIDEBAR & CONTENT -->
                {{--<div class="row margin-bottom-40">--}}
                    {{--<!-- BEGIN SIDEBAR -->--}}
                    {{--<div class="sidebar col-md-3 col-sm-5">--}}
                        {{--<div class="sidebar-products clearfix">--}}
                            {{--<h2>Најпродавано</h2>--}}
                            {{--@foreach($bestSellerProducts as $product)--}}
                                {{--<div class="item">--}}
                                    {{--<a href="{{ route('product', [$product->id, $product->url]) }}"><img--}}
                                                {{--src="{{\ImagesHelper::getProductImage($product)}}"--}}
                                                {{--alt="{{$product->title}}"></a>--}}

                                    {{--<h3>--}}
                                        {{--<a href="{{ route('product', [$product->id, $product->url]) }}">{{$product->title}}</a>--}}
                                    {{--</h3>--}}

                                    {{--<div class="price">{{number_format($product->price / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- END SIDEBAR -->--}}

                {{--</div>--}}
                <!-- END SIDEBAR & CONTENT -->

                <!-- BEGIN SIMILAR PRODUCTS -->
                <div class="row margin-bottom-40">
                    <div class="col-md-12 col-sm-12">
                        <h2>Продукти од иста категорија</h2>

                        <div class="owl-carousel owl-carousel4">
                            @foreach($relatedProducts as $product)
                                <div class="product-item">
                                    <a class="pi-img-wrapper"
                                       href="{{route('product', [$product->id, $product->url])}}">
                                        <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive"
                                             alt="{{$product->title}}">

                                        <div>
                                            <span class="btn btn-default">Преглед</span>
                                        </div>
                                    </a>

                                    <h3>
                                        <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                    </h3>

                                    <div class="pi-price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            <s style="margin-left: 10px;color: #999;">{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                                        @else
                                            <span>{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                        @endif
                                    </div>
                                    <span class="add-to-cart-btn" data-add-to-cart="" value="{{$product->id}}">
                                        Додади во кошничка
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- END SIMILAR PRODUCTS -->
            </div>
        </div>


@endsection