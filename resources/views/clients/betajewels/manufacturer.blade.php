@extends('clients.betajewels.layouts.default')
@section('content')
    <div class="search-result-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="headline">
                                <h2>{{$manufacturer->name}}</h2>
                            </div>
                            <div class="product-tab">
                                @if(count($products) == 0)
                                    <section class="theme_box"><br>
                                        <div class="alert alert-warning">
                                            {{trans('betajewels.emptyCategory')}}
                                        </div>
                                    </section>
                                @endif
                            <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="row">
                                            @if(count($products) > 0)
                                                @foreach($products as $product)
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="product-single">
                                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                            <div class="custom-discount">
                                                                {{(int)((((int)EasyShop\Models\Product::getPriceRetail1($product, false, 0) - $product->$myPriceGroup)/$product->$myPriceGroup)*100)}}%
                                                            </div>
                                                        @endif
                                                        <a href="{{route('product', [$product->id, $product->url])}}">
                                                            <img
                                                                    src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""
                                                                    alt="{{$product->title}}">
                                                        </a>
                                                        {{--<div class="tag new">--}}
                                                        {{--<span>new</span>--}}
                                                        {{--</div>--}}
                                                        <div class="text-center hot-wid-rating pl-0">
                                                            <h4 class="title-height">
                                                                <a href="{{route('product', [$product->id, $product->url])}}">
                                                                    {{$product->title}}
                                                                </a>
                                                            </h4>
                                                            <div class="text-center product-wid-price">
                                                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                    <span class="product-price price color-black">
                                                                                            <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                                                                    </span>
                                            
                                                                    <span class="outer-discount">
                                                                                        <span class="price inner-discount">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                                                        </span>
                                                                                    </span>
                                            
                                                                @else
                                            
                                                                    <span class="product-price price color-black"> <span
                                                                                id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                            <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                    {{-- <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <div class="product-single">
                                                            <a href="{{route('product', [$product->id, $product->url])}}">
                                                                <img    style="height:230px; width:254px;"
                                                                        src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}"
                                                                        class=""
                                                                        alt="{{$product->title}}">
                                                            </a>
                                                            <div class="hot-wid-rating">
                                                                <h4 style="height:41px;">
                                                                    <a href="{{route('product',[$product->id,$product->url])}}">
                                                                        {{$product->title}}
                                                                    </a>
                                                                </h4>
                                                                <div class="product-wid-price">
                                                                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                        <span class="product-price price"
                                                                              style="color:black;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                                                                        <span style="text-decoration: line-through; color: #000000; font-size: 16px; ">
                                            <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                                                                    @else


                                                                        <span class="product-price price"
                                                                              style="color:black;"> <span
                                                                                    id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection