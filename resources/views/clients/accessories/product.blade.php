@extends('clients.accessories.layouts.default')
@section('content')
<style>
    .color-info{
        color:#be8658;
        font-weight: normal;
    }
</style>
    
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{$product->title}}</h2>
                <ul>
                    {{-- <li><a href="/">Почетна</a></li> --}}
                    {{-- <li class="active">Single Product</li> --}}
                </ul>
            </div>
        </div>
    </div>
    
        <div class="sp-area">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="sp-img_area">
                                <div class="zoompro-border" style="text-align: center; width: 300px; margin: 0 auto;">
                                    <img  class="zoompro" src="{{$product->image}}" alt="{{$product->title}}" data-zoom-image="{{$product->image}}"  />
                                </div>
                                @if($product->images)
                                    <div id="gallery" class="sp-img_slider">
                                        {{-- <a class="active" href="{{$product->image}}" data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                                            <img src="{{$product->image}}" alt="{{$product->title}}">
                                        </a> --}}
                                        @foreach($product->images as $img)
                                                <a   class="active" rel="photos-lib"
                                                data-image="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                   title="{{$product->title}}">
                                                    <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'sm_')}}"
                                                         title="{{$product->title}}" alt="{{$product->title}}"/>
                                                </a>
                                        @endforeach
                                    </div>
                                @endif
                                    
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="sp-content">
                                <div class="sp-heading">
                                    <h5>{{$product->title}}</h5>
                                </div>
                               
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Шифра:  <span class="color-info">({{$product->unit_code}})</span></li>
                                        <li>Достапност: <span class="color-info">Да</span></li>
                                        {{-- <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                        <li>Reward Points: <a href="javascript:void(0)">600</a></li>
                                        <li>Availability: <a href="javascript:void(0)">In Stock</a></li> --}}
                                    </ul>
                                </div>
                               
                                <div class="quantity">
                                    <label>Количина</label>
                                    <div class="cart-plus-minus">
                                        <input data-product-quantity="" class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <div class="qty-btn_area">
                                    <ul>
                                        <li><a class="qty-cart_btn" href="" value="{{$product->id}}" data-add-to-cart="">Додади во кошничка</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Single Product Area End Here -->
    
        <!-- Begin Hiraola's Single Product Tab Area -->
        <div class="hiraola-product-tab_area-2 sp-product-tab_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav ">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-toggle="tab" href="#description"><span>Опис на производот</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content hiraola-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
                                        <ul>
                                            <li>
                                                 {!! $product->description !!}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hiraola's Single Product Tab Area End Here -->
    
    
        <!-- Begin Hiraola's Product Area Two -->
        @if(count($relatedProducts) > 0)
        <div class="hiraola-product_area hiraola-product_area-2 section-space_add">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hiraola-section_title">
                            <h4>Продукти од иста категорија</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hiraola-product_slider-3">
                            <!-- Begin Hiraola's Slide Item Area -->
                            @foreach($relatedProducts as $product)
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img" style="text-align: center; width: 185px; margin: 0 auto;">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}">
                                            <img class="secondary-img" src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}">
                                        </a>
                                        {{-- <span class="sticker-2">Sale</span> --}}
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="" value="{{$product->id}}" data-add-to-cart="" data-toggle="tooltip" data-placement="top" title="Додади во кошничка"><i class="ion-bag"></i></a>
                                                </li>
                                                <li class="quick-view-btn" ><a href="{{route('product',[$product->id,$product->url])}}"  title="Прегледај"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name" href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h6>
                                            <div class="price-box">
                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                    <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                            <span class="price_currency">{{config(\EasyShop\Models\AdminSettings::getField('currency'))}}</span>
                                                    </span>
                                                    
                                                    @else
                                                    <span>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                            <span class="price_currency">{{config(\EasyShop\Models\AdminSettings::getField('currency'))}}</span>
                                                    </span>
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
            </div>
        </div>
        @endif
@stop