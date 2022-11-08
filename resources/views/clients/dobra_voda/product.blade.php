@extends('clients.dobra_voda.layouts.default')



@section('style')
<!-- Slick CSS -->
<link rel="stylesheet" href="{{ url_assets('/dobra_voda/css/plugins/slick.css') }}">
@stop
@section('content')
<div class="sp-area pt-100">
    <div class="container">
        <div class="sp-nav">
            <div class="row">
                <div class="col-lg-5">
                    <div class="sp-img_area">
                        <div class="sp-img_slider slick-img-slider quicky-element-carousel" data-slick-options='{
                                                                            "slidesToShow": 1,
                                                                            "arrows": false,
                                                                            "fade": true,
                                                                            "draggable": false,
                                                                            "swipe": false,
                                                                            "asNavFor": ".sp-img_slider-nav"
                                                                            }'>
                            <div class="single-slide red zoom">
                                <img src="{{$product->image}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="sp-content ml-lg-4">
                        <div class="sp-heading">
                            <a href="#">
                                <h2 class="product_title">{{ $product->title }}</h2>
                            </a>
                        </div>
                        <p class="zabeleski">

                            @if(!is_null($product->package))

                            Производот се продава во пакет кој содржи
                            {{$product->package}}
                            @if(($product->package)==1)
                            парче!
                            @else
                            парчиња!
                            @endif

                            @endif
                        </p>
                        <div class="price-box pt_15">
                            @if (EasyShop\Models\Product::hasDiscount($product->discount))
                            <?php
                            $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                            ?>
                            <span class="new-price">{{ $discount }} МКД</span>
                            <span class="old-price">{{ number_format($product->price, 0, ',', '.') }}
                                МКД</span>
                            @else
                            <span class="new-price">{{ number_format($product->price, 0, ',', '.') }}
                                МКД</span>
                            @endif
                        </div>
                        <div class="sp-essential_stuff">
                            <ul>
                                <li>Категорија:
                                    @foreach ($product->categories()->get() as $i)
                                    <a href="javascript:void(0)">{{ $i->title }} </a>
                                    @endforeach
                                </li>
                                <li>
                                    Шифра: <a href="javascript:void(0)">{{ $product->unit_code }}</a>
                                </li>

                                @if (!is_null($product->short_description))
                                <li>{!! $product->short_description !!}</li>
                                @endif
                            </ul>
                        </div>
                        <div style="display: inline-flex;">
                            <div class="quantity">
                                <div class="cart-plus-minus">
                                    <input data-product-quantity name="quantity" type="number" class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="zmdi zmdi-chevron-down"></i></div>
                                    <div class="inc qtybutton"><i class="zmdi zmdi-chevron-up"></i></div>
                                </div>
                            </div>

                            <div class="qty-btn_area">
                                <ul>
                                    <li><a class="qty-cart_btn" data-add-to-cart="" href="#">Додади во кошничка</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-30">
                            {!! $product->description !!}
                        </div>
                        @if (isset($product->manufacturer_id))
                        <div class="ps-product__divider"></div>
                        <img align="center" class="img img-responsive pr-35" width="120" src="/uploads/manufacturers/{{ $product->manufacturer_id }}/{{ $product->manufacturer->image }}" alt="">
                        <div class="ps-product__divider"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Quicky's Single Product Area End Here -->

<!-- Begin Product Area Seven -->
@if (count($relatedProducts))
<div class="product-area-13 pb-60 pt-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3 class="heading pb-30">Поврзани производи</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="quicky-element-carousel product-slider" data-slick-options='{
                                                                    "slidesToShow": 3,
                                                                    "slidesToScroll": 1,
                                                                    "infinite": false,
                                                                    "arrows": false,
                                                                    "autoplay" : true,
                                                                    "dots": false,
                                                                    "spaceBetween": 30
                                                                    }' data-slick-responsive='[
                                                                    {"breakpoint":992, "settings": {
                                                                    "slidesToShow": 2
                                                                    }},
                                                                    {"breakpoint":768, "settings": {
                                                                    "slidesToShow": 2
                                                                    }}
                                                                ]'>
                    @foreach ($relatedProducts as $product)
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="/p/{{ $product->id }}/{{ $product->url }}">
                                    <img src="{{ \ImagesHelper::getProductImage($product, null, 'md_') }}" alt=""></a>
                                @if ($product->discount)
                                <?php
                                $discount =
                                EasyShop\Models\Product::getPriceRetail1($product, true, 0);
                                $discountPercentage = (($product->price - $discount) / $product->price) *
                                    100;
                                ?>
                                <span class="sticker-2">-{{ (int) $discountPercentage }}%</span>
                                @endif
                                <div class="add-actions hover-right_side">
                                    <ul>
                                        @if ($product->discount)
                                        <li class="quick-view-btn" data-toggle="modal" data-product="{{ json_encode($product) }}" data-newprice="{{ $discount }} МКД" data-oldprice="{{ number_format($product->price, 0, ',', '.') }} МКД" data-image="{{ \ImagesHelper::getProductImage($product, null, 'md_') }}" data-title="{{ $product->title }}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                                        </li>
                                        @else
                                        <li class="quick-view-btn" data-toggle="modal" data-product="{{ json_encode($product) }}" data-newprice="{{ number_format($product->price, 0, ',', '.') }} МКД" data-image="{{ \ImagesHelper::getProductImage($product, null, 'md_') }}" data-title="{{ $product->title }}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                                        </li>
                                        @endif
                                        <li><a href="#" value="{{ $product->id }}" data-add-to-cart=""><i class="icon-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="/p/{{ $product->id }}/{{ $product->url }}">{{ $product->title }}</a>
                                    </h3>
                                    <div class="price-box">
                                        @if ($product->discount)
                                        <span class="old-price">{{ number_format($product->price, 0, ',', '.') }}
                                            МКД</span>
                                        <span class="new-price">{{ $discount }} МКД</span>
                                        @else
                                        <span class="new-price">{{ number_format($product->price, 0, ',', '.') }}
                                            МКД</span>
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
<!-- Product Area Seven End Here -->
@endif




@stop

@section('scripts')
<!-- Slick Slider JS -->
<script src="{{ url_assets('/dobra_voda/js/plugins/slick.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.zoom').zoom();
    });
</script>
@stop
