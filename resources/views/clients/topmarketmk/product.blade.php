@extends('clients.topmarketmk.layouts.default')
@section('content')
    <section id="content">
        <div id="breadcrumb-container">
            <div class="hidden-xs container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">Дома</a></li>
                    <li class="active">{{$product->title}}</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <h1 style="text-align: center" class="product-name">{{$product->title}}</h1><br>

                        <div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">

                            <div id="product-image-carousel-container">
                                <ul id="product-carousel" class="celastislide-list">
                                    <li class="active-slide">
                                        @foreach($product->images as $img)

                                               <img width='150' style="padding-bottom:10px" src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" class="small-product-img" />

                                        @endforeach
                                    </li>
                                </ul><!-- End product-carousel -->
                            </div>

                            <div id="product-image-container">
                                <figure class="mobileWidth">
                                    <img class="zoom" src="{{$product->image}}" data-magnify-src="{{$product->image}}" alt="Product Big image">
                                </figure>
                            </div><!-- product-image-container -->
                        </div><!-- End .col-md-6 -->

                        <div style="margin-top:10px;" class="col-md-6 col-sm-12 col-xs-12 product">
                                <span>
                                    <li>Нарачајте без никаков ризик </li>
                                    <li>Достава низ цела Македонија </li>
                                    <li>Плаќање при достава</li>
                                </span>
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <span class="product-name">Намалена цена: </span>
                                    <span class="price product-price-new-home"
                                          style="font-size:25px; font-weight: bold;">
                                                <span id="price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="ammount price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                    <br>
                                    <span class="product-name">Стара цена: </span>
                                    <span class="price" style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 20px; ">
                                                    <span style="color: #FE6367; font-weight: bold" class="new-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                @else


                                    <span class="price product-price-new-home"
                                          style="font-size:30px; font-weight: bold;"> <span
                                                id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                @endif
                            <ul>
                                <br>
                                <li><span>Достапност:</span>Да</li>
                                <li>
                                    <span>Шифра:</span> <span>{{$product->unit_code}}</span>
                                </li>
                                @if($product->proizvoditel)
                                    <li>
                                        <span>Производител:</span>
                                        <span>{{$product->proizvoditel->name}}</span>
                                    </li>
                                @endif
                            </ul>
                            <hr>

                            @if(!$product->variationValuesAndIds()->isEmpty())
                            <div class="product-color-filter-container">
                                <div class="xs-margin"></div>

                                    <select data-product-variation class="form-control" id="input-option200"
                                    name="option[200]">
                                    @foreach($product->variationValuesAndIds() as $variations)
                                        <option value="{{$variations->id}}">{{$variations->value}}</option>
                                    @endforeach
                                    </select>

                            </div><!-- End .product-color-filter-container-->
                            <hr>
                            @endif

                            <div class="product-add clearfix">
                                <div class="custom-quantity-input">
                                    <input type="text" name="quantity" data-product-quantity="" value="1">
                                    <a href="#" onclick="return false;" class="quantity-btn quantity-input-up"><i class="fa fa-angle-up"></i></a>
                                    <a href="#" onclick="return false;" class="quantity-btn quantity-input-down"><i class="fa fa-angle-down"></i></a>
                                </div>
                                <button value="{{$product->id}}" data-add-to-cart="" class="btn btn-custom-2">ДОДАДИ ВО КОШНИЧКА</button>
                            </div><!-- .product-add -->
                            <div class="md-margin"></div><!-- Space -->
                        </div><!-- End .col-md-6 -->

                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div style="    padding: 10px; color:black;" class="tab-container left product-detail-tab clearfix">
                                {!! $product->description !!}
                            </div><!-- End .tab-content -->
                        </div><!-- End .tab-container -->
                    </div><!-- End .col-md-9 -->

                    {{--<div class="lg-margin2x"></div><!-- End .space -->--}}

                    <div class="lg-margin2x"></div><!-- Space -->
            @if($relatedProducts)
                    <div class="purchased-items-container carousel-wrapper">
                        <header class="content-title">
                            <div class="title-bg">
                                <h2 class="title">Можеби ќе ве интересира</h2>
                            </div><!-- End .title-bg -->
                            <p class="title-desc">Разгледајте ги сличните продукти</p>
                        </header>

                        <div class="carousel-controls">
                            <div id="purchased-items-slider-prev" class="carousel-btn carousel-btn-prev"></div><!-- End .carousel-prev -->
                            <div id="purchased-items-slider-next" class="carousel-btn carousel-btn-next carousel-space"></div><!-- End .carousel-next -->
                        </div><!-- End .carousel-controllers -->
                        <div class="purchased-items-slider owl-carousel">
                            @foreach($relatedProducts as $product)
                            <div class="item item-hover">
                                <div class="item-image-wrapper">
                                    <figure class="item-image-container">
                                        <a href="{{route('product', [$product->id, $product->url])}}">
                                            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                            alt="{{$product->title}}" class="item-image">
                                            {{--<img src="/assets/topmarketmk/images/products/item2.jpg" alt="item1" class="">--}}
                                        </a>
                                    </figure>
                                    <div class="item-price-container">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price"></span>мкд.</span>
                                            <span class="item-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}<span class="sub-price">мкд.</span></span>
                                        @else
                                            <span class="item-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}<span class="sub-price">мкд.</span></span>
                                        @endif
                                    </div><!-- End .item-price-container -->
                                    {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                        {{--<div class="discount-rect">--}}
                                            {{--{{(int)(((EasyShop\Models\Product::getPriceRetail1($product, false, 0)-$product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                </div><!-- End .item-image-wrapper -->
                                <div class="item-meta-container">
                                    <div class="item-action">

                                        <a href="" value="{{$product->id}}" data-add-to-cart="" class="item-add-btn" id="add_to_cart">
                                            <span class="icon-cart-text">Купи</span>
                                        </a>
                                    </div><!-- End .item-action -->
                                    <br>
                                    <h3 class="item-name"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>

                                </div><!-- End .item-meta-container -->
                            </div><!-- End .item -->
                            @endforeach
                        </div><!--purchased-items-slider -->
                    </div><!-- End .purchased-items-container -->
                 @endif
                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

    </section><!-- End #content -->
@endsection