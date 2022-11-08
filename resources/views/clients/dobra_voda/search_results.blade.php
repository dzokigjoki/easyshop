@extends('clients.dobra_voda.layouts.default')
@section('content')

<style>
    /* .best-seller {
    font-size: 11px;
    z-index: 9999 !important;
    position: absolute;
    background-color: #6EA4BF;
    color: white;
    padding: 4px;
    border-radius: 20px;
    left: 160px !important;
  } */
</style>


<div class="ps-main pt-100">
    <div class="container">
        <div class="row pb-30">
            <div class="col-md-12">
                <div class="title-section text-center">
                    <h1 class=" search_title title">Резултати од пребарување - {{ $search }}</h1>
                </div>
            </div>
        </div>
        <div style="margin-top: 35px;" class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="/p/{{$product->id}}/{{$product->url}}">
                                    <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt=""></a>
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <?php
                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                ?>
                                <span class="sticker-2">-{{ (int)$discountPercentage }}%</span>
                                @endif
                                <div class="add-actions hover-right_side">
                                    <ul>
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <li class="quick-view-btn" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{$discount}} МКД" data-oldprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                                        </li>
                                        @else
                                        <li class="quick-view-btn" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                                        </li>
                                        @endif
                                        <li><a href="cart.html" value="{{$product->id}}" data-add-to-cart=""><i class="icon-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a></h3>
                                    <div class="price-box">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span class="old-price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                        <span class="new-price">{{$discount}} МКД</span>
                                        @else
                                        <span class="new-price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                                        @endif
                                    </div>
                                    <span class="manufacture-product">Handcraft</span>
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
@stop