@extends('clients.peletcentar.layouts.default')
@section('content')

    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->


    <div class="page_wrapper">
        <div class="container">


            <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
            <br>
            <ul style="margin-bottom: 0px !important;" class="breadcrumb">

                <li><a href="/">Почетна</a></li>
                <li>{{$product->title}}</li>

            </ul>
            <br>
        </div>
    </div>
    <div class="single-product">
        <div class="boxed">

            <div id="content" class="post-wrap sidebar-left flat-reset">
                <div id="primary" class="content-area">
                    <div class="product-view">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-name">
                                        <h2 style="text-align: center;" class="product-name">{{$product->title}}</h2>
                                        <br><br>
                                    </div>
                                    <div class="product-essential">
                                        <div itemscope="" class="product">
                                            <div class="product-img-box col-md-5 col-sm-12 col-xs-12">
                                                <div class="product-image">
                                                    <div class="pimg">
                                                        <a class="product-image">
                                                            <figure>
                                                                <img id="zoom_01" src="{{$product->image}}" data-zoom-image="{{$product->image}}"/>
                                                            </figure>
                                                        </a>
                                                        <!-- <div class="new-top-right">NEW</div>
                                                        <div class="sale-top-right">SALE</div> -->
                                                    </div> <!-- /.pimg -->
                                                    <div class="more-views">
                                                        <div class="slider-items-products">
                                                            <div class="more-views-items">
                                                                <ul>
                                                                    <li style="display: inline;">
                                                                        <a class="zoomGalleryActive" href="{{$product->image}}"
                                                                           data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                                                                            <img style="width:80px;" src="{{$product->image}}"
                                                                                 alt=""/>
                                                                        </a>
                                                                    </li>
                                                                    @foreach($product->images as $img)
                                                                        <li style="display: inline;">
                                                                            <a class="zoomGalleryActive"
                                                                               href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                                               data-image="{{$product->image}}"
                                                                               data-zoom-image="{{$product->image}}">
                                                                                <img style="width:80px;"
                                                                                     src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}"/>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-shop col-md-7 col-sm-12 col-xs-12">
                                                {{--<div class="product-name">--}}
                                                    {{--<h2 class="product-name">{{$product->title}}</h2>--}}
                                                {{--</div>--}}
                                                <br>
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
                                                <div itemprop="offers" class="price-block">
                                                    <br>
                                                    <br><br>
                                                    <span><b>Шифра:</b></span> {{$product->unit_code}}
                                                    <br>
                                                    <span><b>Достапност:</b></span> Да
                                                    <br>
                                                    <br>
                                                </div>

                                                {{--<div itemprop="description">--}}
                                                {{--<br>--}}
                                                {{--<h3>Краток опис</h3>--}}
                                                {{--<br>--}}
                                                {{--<span>{!! $product->short_description !!}</span>--}}
                                                {{--<br>--}}
                                                {{--<br>--}}
                                                {{--</div>--}}


                                                <div style="font-weight:bold;" class="add-to-box">
                                                    <div style="margin-bottom:10px;" class="add-to-cart">
                                                        {{-- <form class="cart">
                                                            <div class="pull-left">
                                                                <div class="custom pull-left">
                                                                    <div class="quantity">
                                                                        <div class="pull-left">
                                                                            <div class="custom pull-left">
                                                                                <div class="custom-quantity-input">
                                                                                    <span style="float: left;margin-top: 12px;padding-bottom: 20px;margin-right: -45px;"><strong>Количина:</strong></span>
                                                                                    <input type="number" name="quantity"
                                                                                           data-product-quantity=""
                                                                                           value="1" min="1"
                                                                                           style="font-size: 13px; margin-right:10px; text-align: center; height:36px;width: 80px;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="add-to-cart" value="87">
                                                                </div>
                                                            </div>

                                                            <div class="actions">
                                                                <ul class="add-to-links">
                                                                    <li class="link-add-to-cart-button"><a style="font-size: 9px; height: 37px;background-color: #D4362A !important;"
                                                                           class="add_to_cart_button" href="#"
                                                                           data-add-to-cart=""
                                                                           title="Add card">Додади во кошничка</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <br><br>
                                                            @if(!$product->variationValuesAndIds()->isEmpty())
                                                                <div class="form-group required">
                                                                    <label class="control-label">Големина:</label>
                                                                    <select data-product-variation class="form-control"
                                                                            id="input-option200" name="option[200]">
                                                                        @foreach($product->variationValuesAndIds() as $variations)
                                                                            <option value="{{$variations->id}}">{{$variations->value}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </form> --}}
                                                    </div>
                                                </div>
                                                <div id="productTabContent" class="tab-content">
                                                    <!-- DESCRIPTION CONTENT -->
                                                    @if(!$product->variationValuesAndIds()->isEmpty())
                                                        <div class="form-group required">
                                                            <label class="control-label">Големина:</label>
                                                            <select data-product-variation class="form-control"
                                                                    id="input-option200" name="option[200]">
                                                                @foreach($product->variationValuesAndIds() as $variations)
                                                                    <option value="{{$variations->id}}">{{$variations->value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                </div> <!-- /.tab-content -->
                                                <br>
                                                <div style="font-size:14px; font-weight: 600; font-family: Roboto;"
                                                     class="description">
                                                    <?php echo $product->description; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.product-view -->


                    {{--<div class="product-collateral">--}}
                    {{--<div class="container">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                    {{--<div class="add_info">--}}
                    {{--<div class="woocommerce-tabs">--}}
                    {{--<div class="tabs">--}}
                    {{--<ul class="tabs nav nav-tabs product-tabs">--}}
                    {{--<li class="description_tab"><a href="#tab-description">Опис</a></li>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div> <!-- /.tabs -->--}}
                    {{--<div id="productTabContent" class="tab-content">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div> <!-- /.product-collateral -->--}}

                    <div class="product-recommend">
                        <div class="container">
                            <h3>Продукти од иста категорија</h3>
                            <br>
                            <div class="row">
                                <main class="post-wrap" id="products_container">
                                    <ul class="clearfix products-grid products-grid-search flat-reset">
                                        @foreach($relatedProducts as $article)
                                            <li class="item col-md-3 wide-next">
                                                {{--<div class="panel panel-default">--}}
                                                <div style="padding-bottom: 20px; border: none !important;" class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info">
                                                            <div class="pimg" style="text-align: center; width: 185px; margin: 0 auto;">
                                                                <a href="" class="product-image">
                                                                    <img src="{{\ImagesHelper::getProductImage($article,null,'lg_')}}"
                                                                         class="attachment-shop_catalog" alt="Images">
                                                                </a>
                                                            </div> <!-- /.pimg -->

                                                            <div class="box-hover">
                                                                {{--<ul class="add-to-links">--}}
                                                                    {{--<li>--}}
                                                                        {{--<a href="{{route('product', [$article->id, $article->url])}}"--}}
                                                                           {{--data-toggle="modal" data-target=""--}}
                                                                           {{--class="buy_home quick-view">--}}
                                                                            {{--<span>--}}
                                                                            {{--<i class="fa fa-eye"></i>  Прегледај--}}
                                                                            {{--</span>--}}
                                                                        {{--</a>--}}
                                                                    {{--</li>--}}
                                                                {{--</ul>--}}
                                                            </div> <!-- /.box-hover --> <!-- /.box-hover -->
                                                        </div> <!-- /.item-img-info -->
                                                    </div> <!-- /.item-img -->
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            {{-- <button value="{{$product->id}}"  onclick='location.href="{{route('product', [$article->id, $article->url])}}"' id="add_to_cart"style="background-color: #D4362A" class="buy_home"><i class="fa fa-shopping-cart"></i> <span>Нарачај</span></button> --}}
                                                            <div class="flat-our-products item-title">
                                                                <a href="{{route('product', [$article->id, $article->url])}}"
                                                                   style="color:black !important;"
                                                                   class="limit_text auto-for-500">{{$article -> title}}</a>
                                                                <div class="product-price" style="text-align: center">
                                                                    @if( EasyShop\Models\Product::hasDiscount( $article->discount ) )
                                                                        <span class="product-price-new-home"
                                                                              style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($article, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                                                        <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                                                    @else


                                                                        <span class="product-price-new-home"
                                                                              style="font-weight: bold;"> <span
                                                                                    id="current_price">{{number_format($article->$myPriceGroup, 0, ',', '.')}}
                                                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                                                    @endif
                                                                </div>
                                                            </div> <!-- /.item-title -->

                                                        </div> <!-- /.info-inner -->
                                                    </div> <!-- /.item-info -->
                                                </div> <!-- /.item-inner -->
                                                {{--</div>--}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </main> <!-- /.post-wrap -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection

