@extends('clients.shopathome.layouts.default')
@section('content')

<style>
    .zoomWindowContainer {
        width: 100% !important;
    }


    #quantity {
        width: 70px !important;
        padding: 10px 12px !important;
    }

    #add_to_cart {
        margin-right: 10px !important;
    }
</style>
<div id="content">

    <div class="product-page container">

        <div class="row">
            <div style="text-align: center;" class="middle-single">

                <h1>{{$product->title}}</h1>
                <div class="clear"></div>

            </div>
            <div class="col-md-6">
                <div class="single-img">
                    <div class="">
                        <a href="{{$product->image}}" class="popup" title="{{ $product->title_lang1 }}">
                            <img width="600" height="499" data-rel="1" data-elavate-zoom=""
                                data-zoom-image="{{$product->image}}" src="{{$product->image}}" />
                        </a>
                        @foreach($product->images as $img)
                        <a href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" class="popup"
                            title="{{ $product->title_lang1 }}">
                            <img style="width:100px !important; height:auto !important" data-rel="1"
                                src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" />
                        </a>
                        @endforeach
                    </div>
                    <div id="test"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-desc">
                    <div class="top-single">
                        <span>Дома / {{$product->title}}</span>
                        {{--<div class="right-arrows">--}}
                        {{--<a href="#"><i class="fa fa-angle-left"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-angle-right"></i></a>--}}
                        {{--</div>--}}
                        <div class="clear"></div>
                    </div>
                    <div class="single-price">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <span class="price product-price-new-home" style="font-size:30px; font-weight: bold;">
                            <span
                                id="price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                <span
                                    class="ammount price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                        </span>

                        <span class="price"
                            style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                            <span style="color: #62BDAB; font-weight: bold"
                                class="new-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                <span
                                    class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            </span></span>

                        @else


                        <span class="price product-price-new-home" style="font-size:30px; font-weight: bold;"> <span
                                id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                <span
                                    class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                        </span>
                        @endif
                    </div>

                    <div class="single-infos">
                        {{--<p><span>Бренд:</span> Iphone </p>--}}
                        <p><span>Достапност:</span> Да </p>
                    </div>

                    {{--<div class="single-inputs row">--}}
                    {{--<div class="col-md-6">--}}
                    {{--<select class="select">--}}
                    {{--<option value="Select Size">Select Size</option>--}}
                    {{--<option value="S">S</option>--}}
                    {{--<option value="M">M</option>--}}
                    {{--<option value="L">L</option>--}}
                    {{--<option value="XL">XL</option>--}}
                    {{--<option value="XXL">XXL</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                    {{--<select class="select">--}}
                    {{--<option value="Select Color">Select Color</option>--}}
                    {{--<option value="White">White</option>--}}
                    {{--<option value="Black">Black</option>--}}
                    {{--<option value="Red">Red</option>--}}
                    {{--<option value="Blue">Blue</option>--}}
                    {{--<option value="Green">Green</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="prod-end">
                        @if(!$product->variationValuesAndIds()->isEmpty())
                        <div style="padding-right:10px;" class="pull-left"><label
                                class="hidden-md qty-label">Боја:</label></div>
                        <div style="padding-right: 42px;" class="paddingIpadPro bottomMobile pull-left">
                            <select data-product-variation class="form-control" id="input-option200" name="option[200]">
                                @foreach($product->variationValuesAndIds() as $variations)
                                <option value="{{$variations->id}}">{{$variations->value}}</option>
                                @endforeach
                            </select></div>

                        @endif
                        <button value="{{$product->id}}" data-add-to-cart="" id="add_to_cart" type="submit"
                            class="medium-button button-red add-cart">Додади во кошничка</button>
                        <input  data-product-quantity="" name="quantity" value="1" type="number" min="1"
                            title="Qty" class="form-control" size="4" id="quantity">
                        <div class="clear"></div>

                    </div>
                    <div class="tabs-single">
                        {{--<div class="container">--}}

                        <div id="tabs">
                            <ul>
                                <li class="active"><a>Опис</a></li>
                            </ul>
                            <div class="tab-border"></div>
                            <div id="tabs-1">
                                <p>
                                    {!! $product->description !!}
                                </p>
                            </div>
                        </div>
                        <!-- End First Tabs -->

                        {{--</div>--}}
                    </div>
                    {{--<div class="single-descript">--}}
                    {{--<p>--}}
                    {{--{!! $product->short_description !!}--}}
                    {{--</p>--}}
                    {{--</div>--}}

                </div>
            </div>
        </div>

    </div>
    <!-- End Product Single -->


    <!-- End tab Signle -->

    @if($relatedProducts)
    <div class="mb30">
        <div class="container">
            <h1>Можеби ќе ве интересира</h1>
            {{-- <div class="list_carousel1"> --}}
            <div id="swipe6" class="demo1 clearfix swiper-container">
                <ul class="clearfix swiper-wrapper">
                    @foreach($relatedProducts as $product)
                    <li class="swiper-slide class2 " style="width:200px !important;">
                        <div class="arrival-overlay">
                            {{--<img src="/assets/shopathome/upload/arrival2.jpg" alt="">--}}
                            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="img-responsive"
                                alt="{{$product->title}}">
                            {{--<img src="/assets/shopathome/upload/sale.png" alt="" class="sale">--}}
                            <div style="background:#62BDAB" class="sale">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <div style="background:#62BDAB" class="discountCustom btn btn-danger"> <span>
                                        -
                                        {{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}
                                        ден.<br></span>
                                </div>
                                @endif
                            </div>
                            <div class="arrival-mask">
                                <a href="{{route('product',[$product->id,$product->url])}}"
                                    class="medium-button button-red add-cart">Прегледај</a>
                            </div>
                        </div>
                        <div class="arr-content">
                            <button value="{{$product->id}}" data-add-to-cart="" id="add_to_cart"
                                class="medium-button button-red centeredButton">Додади во кошничка</button>

                            <a href="#">
                                <p>{{$product->title}}</p>
                            </a>
                            <ul>
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="product-price-new-home" style="font-weight: bold;">
                                    <span
                                        id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>
                                <span
                                    style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                    <span style="color: #62BDAB; font-weight: bold"
                                        class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>
                                @else
                                <span class="product-price-new-home" style="font-weight: bold;">
                                    <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="clearfix"></div>
            {{--<div class="arrows">--}}
            {{--<a id="prev1" class="prev1" href="#"><i class="fa fa-angle-left"></i></a>--}}
            {{--<a id="next1" class="next1" href="#"><i class="fa fa-angle-right"></i></a>--}}
            {{--</div>--}}
            <br>
            {{-- </div> --}}
            <!-- End List Carousel -->
        </div>
    </div>
    <!-- feat-items -->
    @endif
</div>
<!-- End content -->
@endsection