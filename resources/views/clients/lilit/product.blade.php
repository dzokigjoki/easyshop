@extends('clients.lilit.layouts.default')
@section('content')
    <div class="heading-container">
        <div class="container heading-standar">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li><span><a href="{{route('home')}}" class="home"><span>Home</span></a></span></li>
                    <li><span>{{$product->title}}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-container">
        <div class="container-full">
            <div class="row">
                <div class="col-md-12 main-wrap">
                    <div class="main-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 no-min-height"></div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="container">
                                <div class="row summary-container">
                                    <h1 style="text-align: center;" class="product_title entry-title">{{$product->title}}</h1>
                                    <br>
                                    <div class="col-md-8 col-sm-6 entry-image">
                                        <div class="single-product-images">
                                            <div class="single-product-images-slider">
                                                <div class="caroufredsel product-images-slider" data-synchronise=".single-product-images-slider-synchronise" data-scrollduration="500" data-height="variable" data-scroll-fx="none" data-visible="1" data-circular="1" data-responsive="1">
                                                    <div class="caroufredsel-wrap">
                                                        <ul class="caroufredsel-items">
                                                            <li class="caroufredsel-item">
                                                                <div class="thumb">
                                                                    <a href="{{$product->image}}" data-rel="magnific-popup-verticalfit"
                                                                       data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                                                                        <img width="800" height="850" src="{{$product->image}}" />
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            @foreach($product->images as $img)
                                                            <li class="caroufredsel-item">
                                                                <div class="thumb">
                                                                    <a href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                                       data-image="{{$product->image}}"
                                                                       data-zoom-image="{{$product->image}}" data-rel="magnific-popup-verticalfit">
                                                                        <img width="800" height="850"  src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" />
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <a href="#" class="caroufredsel-prev"></a>
                                                        <a href="#" class="caroufredsel-next"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-product-thumbnails">
                                                <div class="caroufredsel product-thumbnails-slider" data-visible-min="2" data-visible-max="4" data-scrollduration="500" data-direction="up" data-height="100%" data-circular="1" data-responsive="0">
                                                    <div class="caroufredsel-wrap">
                                                        <ul class="hidden-xs single-product-images-slider-synchronise caroufredsel-items">
                                                            <li class="caroufredsel-item selected">
                                                                <div class="thumb">
                                                                    <a href="{{$product->image}}" data-rel="1" title="Product-detail"
                                                                       data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                                                                        <img width="100" height="150" src="{{$product->image}}"/>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            @foreach($product->images as $img)
                                                            <li class="caroufredsel-item">
                                                                <div class="thumb">
                                                                    <a href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                                       data-image="{{$product->image}}"
                                                                       data-zoom-image="{{$product->image}}" data-rel="1" title="Product-detail">
                                                                        <img width="100" height="150"  src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" />
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 entry-summary">
                                        <div class="summary">
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <span class="price product-price-new-home"
                                                          style="font-size:30px; font-weight: bold;">
                                                <span id="price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="ammount price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                                    <span class="price" style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
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
                                            <br>
                                                    <div class="single_variation">
                                                            <span class="price"><span class="amount">
                                                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                        <div class="product__label product__label--left product__label--sale"> <span style="font-size:30px; color:#FE6367">Заштедувате:
                                                                                {{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}
                                                                                ден.<br></span>
                                                                        </div>
                                                                    @endif
                                                                </span></span>
                                                    </div>
                                            <div class="product-excerpt">
                                                <p>
                                                    {!! $product->short_description !!}
                                                </p>
                                                <br>
                                                <span style="font-size:20px;">Достапност: да</span>
                                            </div>
                                            <div class="product-actions res-color-attr">
                                                <form class="cart">
                                                    <div class="product-options-outer">
                                                        <div class="variation_form_section">
                                                            <div class="product-options icons-lg">
                                                                @if(!$product->variationValuesAndIds()->isEmpty())
                                                                    <div class="form-group required">
                                                                        <label class="control-label">Големина:</label>
                                                                        <select data-product-variation class="customSelect"
                                                                                id="input-option200" name="option[200]">
                                                                            @foreach($product->variationValuesAndIds() as $variations)
                                                                                <option value="{{$variations->id}}">{{$variations->value}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="customButtonMobile single_variation_wrap">

                                                        <div class="variations_button">
                                                            <div class="quantity">
                                                                <input type="number" data-product-quantity="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
                                                            </div>
                                                            <button style="background: #FE6367; border: 1px solid #FE6367; color:white;" value="{{$product->id}}"
                                                                    data-add-to-cart="" id="add_to_cart"
                                                                    type="submit" class="button">Додади во кошничка</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            {{--<div class="product_meta">--}}
                                                {{--<span class="sku_wrapper">SKU: <span class="sku">N/A</span></span>--}}
                                                {{--<span class="posted_in">Категорија: <a href="#">Aliquam</a></span>--}}
                                                {{--<span class="tagged_as">Tags: <a href="#">Men</a>, <a href="#">Women</a></span>--}}
                                                {{--<span class="posted_in">Brand: <a href="#">Adesso</a>, <a href="#">Carvela</a>.</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="shop-tab-container">--}}
                                                {{--<div class="container">--}}
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="tabbable shop-tabs">
                                                                <ul class="nav nav-tabs" role="tablist">
                                                                    <li class="active">
                                                                        <a data-toggle="tab" role="tab" href="#tab-description">Опис</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="tab-description">
                                                                        <h2>Опис за продуктот</h2>
                                                                        <h3>{{$product->title}}</h3>
                                                                        {!! $product-> description !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="related products">
                                            <div class="related-title">
                                                <h3><span>Препорачани продукти</span></h3>
                                            </div>
                                            <ul class="products columns-4" data-columns="4">
                                                @foreach($relatedProducts as $product)
                                                    <li class="product">
                                                        <div class="product-container">
                                                            <figure>
                                                                <div class="product-wrap">
                                                                    <div class="product-images">
                                                                        <div class="shop-loop-thumbnail">
                                                                            <a class="overlay-link" href="{{route('product', [$product->id, $product->url])}}">
                                                                                <img
                                                                                     src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="img-responsive"
                                                                                     alt="{{$product->title}}">
                                                                            </a>
                                                                        </div>
                                                                        <div class="middleCustom hidden-xs hidden-sm hidden-md yith-wcwl-add-to-wishlist">                                                                    {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                            {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                            {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                                            {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                                                            {{--ден.<br></span>--}}
                                                                            {{--</div>--}}
                                                                            {{--@endif--}}
                                                                            <div class="btn btn-danger"> <a style="color:white;" class="hoverA" href="{{route('product', [$product ->id, $product->url])}}"><span>Прегледај</span>
                                                                                    <br></a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="clear"></div>
                                                                        {{--<div class="shop-loop-quickview">--}}
                                                                        {{--@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )--}}
                                                                        {{--<div class="btn btn-danger"> <span>Заштедувате:--}}
                                                                        {{--{{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}--}}
                                                                        {{--ден.<br></span>--}}
                                                                        {{--</div>--}}
                                                                        {{--@endif--}}
                                                                        {{--</div>--}}
                                                                    </div>
                                                                </div>
                                                                <figcaption>
                                                                    <div class="shop-loop-product-info">
                                                                        <div class="">
                                                                            <div style="font-size:20px;" class="info-price">
                                                                            <span class="price">
                                                                                 @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                                    <span class="product-price-new-home"
                                                                                          style="font-weight: bold;">
                                                                                    <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                    </span>
                                                                                </span>
                                                                                    <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                    </span>
                                                                                </span>
                                                                                @else
                                                                                    <span class="product-price-new-home" style="font-weight: bold;">
                                                                                        <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                        </span>
                                                                                </span>
                                                                                @endif
                                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="info-title">
                                                                            <button value="{{$product->id}}"
                                                                                    data-add-to-cart="" id="add_to_cart"
                                                                                    class="btn btn-primary">Додади во кошничка</button>
                                                                            <h3 style="margin-top:10px;" class="product_title"><a href="{{route('product', [$product ->id, $product->url])}}">{{$product->title}}</a></h3>
                                                                        </div>

                                                                        {{--<div class="info-excerpt">--}}
                                                                        {{--Proin malesuada enim nulla, nec bibendum justo vestibulum non. Duis et ipsum convallis, bibendum enim a, hendrerit diam. Praesent tellus mi, vehicula et risus eget, laoreet tristique tortor. Fusce id…--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="list-info-meta clearfix">--}}
                                                                        {{--<div class="info-price">--}}
                                                                        {{--<span class="price">--}}
                                                                        {{--<span class="amount">$17.45</span>--}}
                                                                        {{--</span>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="list-action clearfix">--}}
                                                                        {{--<div class="loop-add-to-cart">--}}
                                                                        {{--<button class="btn btn-primary" href="#">Додади во кошничка</button>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="yith-wcwl-add-to-wishlist">--}}
                                                                        {{--<div class="yith-wcwl-add-button">--}}
                                                                        {{--<a href="#" class="add_to_wishlist">--}}
                                                                        {{--Add to Wishlist--}}
                                                                        {{--</a>--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection