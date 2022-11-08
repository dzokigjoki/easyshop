@extends('clients.barber_shop.layouts.default')
@section('content')
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
        <div class="bg-section">
            <img src="{{ url_assets('/barber_shop/images/page-titles/3.jpg')}}" alt="Background" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                    <div class="title title-2 text-center">
                        <div class="title--content">
                            <div class="title--heading mb-20">
                                <h3 class="heading-color">{{$product->title}}</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ol class="breadcrumb breadcrumb-bottom">
                            <li><a href="/">Почетна</a></li>
                            <li class="active">{{$product->title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="product" class="shop shop-product pb-60">
        <div class="container">
            <div class="row mb-70">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="product-img">
                        <img class="img-responsive"  src="{{$product->image}}" alt="{{$product->title}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1">
                    <div class="product-title">
                        <h4>{{$product->title}}</h4>
                    </div>

                    <div class="product-meta mb-20">
                        <span class="product-price">Цена:
                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                </span>
                                @else
                                <span>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                </span>
                            @endif
                        </span><br>
                        <span class="product-price">
                            Достапност: <span>Да</span>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="product-desc">
                        <p> {!! $product->short_description !!}</p>
                    </div>
                    <div class="product-action clearfix">
                        <div class="product-quantity pull-left">
                            <span>
                         <span class="qant-plus"><i class="fa fa-caret-up"></i></span>
                            <input data-product-quantity="" class="cart-plus-minus-box" value="1" type="text">
                            <span class="qant-minus"><i class="fa fa-caret-down"></i></span>
                            </span>
                        </div>
                        <div class="product-cta">
                            <a  class="btn btn--secondary btn--rounded" href="" value="{{$product->id}}" data-add-to-cart=""  title="Додади во кошничка">Додади во кошничка</a>
                        </div>
                    </div>
                    {{-- <div class="product-share mt-30">
                        <a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="share-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                        <a class="share-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    </div> --}}
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Опис на производот</a></li>
                        </ul>
    
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active product-details" id="information">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <p>  {!! $product->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @if(count($relatedProducts) > 0)
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="product-related shop-categories">
                        <div class="product-related-title">
                            <h5>Продукти од иста категорија</h5>
                        </div>
                        <div class="row">
                            <div id="swipe3" class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($relatedProducts as $product)
                                        <div class="col-xs-12 col-sm-6 col-md-3 product-item swiper-slide">
                                            <div class="product--img">
                                                <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{ $product->title }}" />
                                                <div class="product--hover">
                                                    <div class="product--action">
                                                        <a  href="" value="{{$product->id}}" data-add-to-cart=""  title="Додади во кошничка">Додади во кошничка</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product--content">
                                                <div class="product--title">
                                                    <h3><a href="{{ $product->url }}">{{ $product->title }}</a></h3>
                                                </div>
                                                <div class="product--price">
                                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                        <span class="new-price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                        </span>
                                                        @else
                                                        <span>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>    
@endsection