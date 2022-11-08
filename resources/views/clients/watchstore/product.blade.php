@extends('clients.watchstore.layouts.default')
@section('content')



{{--<link rel="stylesheet" href="{{ url_assets('/watchstore/css/glasscase.css') }}">--}}
<link rel="stylesheet" href="{{ url_assets('/watchstore/css/glasscase.minf195.css') }}">

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
                                    <ul id='zoom1' class='' style="border: none;">
                                        <li>
                                            <img src="{{$product->image}}" />
                                        </li>
                                        @if(count($product->images) > 0)
                                        @foreach($product->images as $img)
                                        <li>
                                            {{--<a href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">--}}
                                            <img
                                                src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}">
                                            {{--</a>--}}
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <div class="single-product-content">
                                <h2 style="color:#000000"><b>{{$product->title}}</b></h2>
                                <div class="product-review">
                                    <h4>{{trans('watchstore.availability')}}:
                                        @if($product->total_stock)
                                        <span class="label label-success" style="color:white;"> Yes</span>
                                        @else
                                        <span class="label label-danger" style="color:white"> No</span>
                                        @endif
                                    </h4>

                                    @if($product->proizvoditel)
                                    <h4>Производител:
                                        <b>{{$product->proizvoditel->name}}</b>
                                    </h4>
                                    @endif
                                    <br>
                                    <div class="product-wid-price">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                        <span class="product-price price" style="color:black;">
                                            <span style="color: #000000;font-size:30px; padding-right:10px; "
                                                id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                <span style="color: #000000"
                                                    class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                        </span>

                                        <span style="text-decoration: line-through; color: #000000; font-size: 16px; ">
                                            <span style="font-size:20px;  color: #d9534f; font-weight: bold"
                                                class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                <span
                                                    class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span>
                                        </span>

                                        @else

                                        <span class="product-price price" style="color:black;"> <span
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
                                            <div class="col-md-2 col-xs-4" style="vertical-align: middle">
                                                <label for="quantity"
                                                    style="margin-top: 3px; clear: both;float:left;vertical-align: middle">{{trans('watchstore.quantity')}}:
                                                </label>
                                            </div>
                                            <div class="col-md-3 col-xs-4">

                                                <input style="border-radius: 0" type="number"
                                                    class="form-control pull-left" min="1" id="quantity" name="quantity"
                                                    data-product-quantity="" value="1">
                                            </div>
                                            <div class="col-md-6 col-xs-12" id="add_to_cart_button">
                                                <button style="font-size:14px !important;padding:5px 15px;"
                                                    value="{{$product->id}}" data-add-to-cart=""
                                                    class="customBtn">{{trans('watchstore.add_to_cart')}}
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
                                <div style="text-align: justify" role="tabpanel" class="tab-pane active" id="home">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-12">
                @if(count($relatedProducts) > 0)
                <div class="headline">
                    <h2>{{trans('watchstore.maybe_interested')}}</h2>
                </div>
                <div class="menclothing-carousel">
                    @foreach($relatedProducts as $product)
                    <div class="men-single product-single">
                        <a href="{{route('product', [$product->id, $product->url])}}">
                            <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class=""
                                alt="{{$product->title}}">
                        </a>
                        {{--<div class="tag new">--}}
                        {{--<span>new</span>--}}
                        {{--</div>--}}
                        <div class="text-center hot-wid-rating">
                            <h4 style="min-height:40px !important;">
                                <a href="{{route('product', [$product->id, $product->url])}}">
                                    {{$product->title}}
                                </a>
                            </h4>
                            <div class="text-center product-wid-price">
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="product-price price" style="color:black;">
                                    <span
                                        id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                </span>

                                <span style="text-decoration: line-through; color: #000000; font-size: 16px; ">
                                    <span style="color: #d9534f; font-weight: bold"
                                        class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span
                                            class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                    </span>
                                </span>

                                @else

                                <span class="product-price price" style="color:black;"> <span
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

<script src="{{ url_assets('/watchstore/js/jquery.glasscase.minf195.js') }}"></script>

{{--<script src="{{ url_assets('/watchstore/js/jquery.zoom.min.js') }}"></script>--}}

<script type="text/javascript">
    $(function () {
            //ZOOM
            $("#zoom1").glassCase({
                'widthDisplay': 1000,
                'isSlowZoom': true,
                'isDownloadEnabled' : false,
            });
        });
</script>


@stop