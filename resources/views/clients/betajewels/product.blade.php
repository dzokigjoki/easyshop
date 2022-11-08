@extends('clients.betajewels.layouts.default')
@section('content')

<link rel="stylesheet" href="{{ url_assets('/betajewels/css/glasscase.minf195.css') }}">
<style>
    .qty-label {
        color: #000000;
    }
</style>

<div class="single-product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-product-details">
                    <div class="row">
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <div class="product-img-detail">

                                <div class="single_product_image">
                                    <input type="hidden" id="__VIEWxSTATE" />
                                    <ul id='zoom1' class="border-none">
                                        <li>
                                            <img src="{{$product->image}}" />
                                        </li>
                                        @if(count($product->images) > 0)
                                        @foreach($product->images as $img)
                                        <li>
                                            <img
                                                src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="single-product-content">
                                <h2 class="color-black"><b>{{$product->title}}</b></h2>
                                <div class="product-review">

                                    @if($product->proizvoditel)
                                    <h4>Производител:
                                        <b>{{$product->proizvoditel->name}}</b>
                                    </h4>
                                    @endif
                                    <br>
                                    <div class="product-wid-price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span class="product-price price"><span
                                            id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                            <span
                                                class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                                        <span style="" id="product-page-outer-discount">
                                            <span id="product-page-inner-discount"
                                                class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span
                                                    class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                                        @else

                                        <span class="product-price price"><span
                                                id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span
                                                    class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>
                                        @endif
                                    </div>
                                    @if($product->short_description)
                                    <p>{!! $product->short_description !!}</p>
                                    @endif
                                </div>

                                <div class="single-color">
                                    @if(!$product->variationValuesAndIds()->isEmpty())
                                    <div style="padding-right:10px;" class="product-size">
                                        <p>Боја :</p>
                                        <select>
                                            @foreach($product->variationValuesAndIds() as $variations)
                                            <option value="{{$variations->id}}">{{$variations->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <div class="product-size">
                                        <div class="row">
                                            <div class="col-md-2 col-xs-4" id="qty">
                                                <span for="quantity"
                                                    class="qty-label">Количина:
                                                </label>
                                            </div>
                                            <div class="col-md-3 col-xs-4">

                                                <input type="number"
                                                    class="form-control pull-left" min="1" id="quantity" name="quantity"
                                                    data-product-quantity="" value="1">
                                            </div>
                                            <div class="col-md-6 col-xs-12" id="add_to_cart_button">
                                                <button id="add-to-cart-btn"
                                                    value="{{$product->id}}" data-add-to-cart=""
                                                    class="customBtn">{{trans('betajewels.add_to_cart')}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                        <div class="product-tab product-tab-single">
                            <div class="tab-content">
                                <div class="text-justify" role="tabpanel" class="tab-pane active" id="home">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-50">
            <div class="col-md-12">
                @if(count($relatedProducts) > 0)
                <div class="headline">
                    <h2>{{trans('betajewels.maybe_interested')}}</h2>
                </div>
                <div class="menclothing-carousel">
                    @foreach($relatedProducts as $product)
                    <div class="men-single product-single">
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""
                                alt="{{$product->title}}">
                        </a>
                        <div class="text-center hot-wid-rating">
                            <h4 class="title-height">
                                <a href="{{route('product', [$product->id, $product->url])}}">
                                    {{$product->title}}
                                </a>
                            </h4>
                            <div class="text-center product-wid-price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="product-price price color-black">
                                    <span
                                        id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>

                                <span class="outer-discount">
                                    <span class="inner-discount"
                                        class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>

                                @else

                                <span class="product-price price color-black"> <span
                                        id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection
@section('scripts')

<script src="{{ url_assets('/betajewels/js/jquery.glasscase.minf195.js') }}"></script>

<script type="text/javascript">
    $(function () {
            $("#zoom1").glassCase({
                'widthDisplay': 1000,
                'isSlowZoom': true,
                'isDownloadEnabled' : false,
            });
        });
</script>


@stop