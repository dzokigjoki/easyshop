@extends('clients.naturatherapyshop_al.layouts.default')
@section('content')
    <style>
        .panel-body p {
            font-size: 16px !important;
        }
        @media(max-width:991px) {
            .product-title {
                font-size: 18px !important;
                margin: 0 !important;
            }
        }
    </style>
    <div class="content-wrapper oh">
        <section class="section-wrap pt-40 single-product">
            <div class="container-fluid semi-fluid">
                <div class="row">
                    <div class="col-12">
                        <h3 class="product-title pb-20 text-center">{{ $product->title }}</h3>
                    </div>
                    <div class="col-md-5 col-xs-12 product-slider mb-60"> 
                        <div class="product-image-slider">
                            <div class="text-center">
                                <img class="width_81" src="{{ $product->image }}" alt="product picture" />
                                <i class="ui-zoom zoom-icon"></i>
                            </div>
                            @if ($product->images)
                                @foreach ($product->images as $img)
                                    <div class="text-center">
                                        <img class="width_81"
                                            src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                            alt="product picture" />
                                        <i class="ui-zoom zoom-icon"></i>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="product-thumbs-slider width_81">
                            <div class="text-center">
                                <img src="{{ $product->image }}" alt="product picture" />
                            </div>
                            @if ($product->images)
                                @foreach ($product->images as $img)
                                    <div class="text-center">
                                        <img class="width_81"
                                            src="{{ \ImagesHelper::getProductImage($img->filename, $product->id, 'lg_') }}"
                                            alt="product picture" />
                                        <i class="ui-zoom zoom-icon"></i>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-7 col-xs-12 product-description-wrap">
                        <span class="price">
                            @if (\EasyShop\Models\Product::hasDiscount($product->discount))
                                <?php
                                $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                                
                                $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                                ?>
                                <del>
                                    <span>{{ number_format($product->price, 2, ',', '.') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</span>
                                </del>
                                <ins>
                                    <span class="amount">{{ $discount }}@if($price_multiplier == 1) &#128; @else LEK  @endif</span>
                                </ins>
                            @else
                                <ins>
                                    <span class="amount">{{ number_format($product->price, 2, ',', '.') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</span>
                                </ins>
                            @endif
                        </span>
                        <div class="product-actions">
                            <span class="pr-10">{!! trans('naturatherapy/global.quantity') !!}:</span>

                            <div class="quantity buttons_added">
                                <input type="number" data-product-quantity="" step="1" min="0" value="1" title="Qty" class="input-text qty text" />
                                <div class="quantity-adjust">
                                    <a href="#" class="plus">
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                    <a href="#" class="minus">
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="#" value="{{ $product->id }}" data-add-to-cart=""
                                class="btn btn-dark btn-lg add-to-cart"><span>{!! trans('naturatherapy/global.add_to_cart') !!}</span></a>

                            <a href="#" data-add-to-wish-list="" value="{{ $product->id }}"
                                class="product-add-to-wishlist"><i class="fa fa-heart"></i></a>
                        </div>
                        <div class="product_meta">
                            @if (isset($product->sku))
                                <span class="sku">{!! trans('naturatherapy/global.code') !!}: <a href="#">{{ $product->sku }}</a></span>
                            @endif
                            @if (isset($categories_for_product))
                                @foreach ($categories_for_product as $productCategory)

                                    <span class="brand_as">{!! trans('naturatherapy/global.categories') !!}:{{ $productCategory->$title }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="panel-group accordion mb-50" id="accordion1">
                            <div class="panel">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne"
                                        class="minus">{!! trans('naturatherapy/global.description') !!}<span>&nbsp;</span>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (file_exists(public_path() . '/uploads/products/' . $product->id . '/pdf.pdf'))
                            <div class="panel-group accordion mb-50" id="accordion2">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"
                                            class="plus collapsed">{!! trans('naturatherapy/global.declaration') !!}<span>&nbsp;</span>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <embed class="hide_the_document" style="margin: auto;"
                                                src="{{ asset('uploads/products') }}/{{ $product->id }}/pdf.pdf"
                                                width="100%" height="500" type="application/pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>
        <section class="section-wrap pt-0 pb-30 shop-items-slider">
            <div class="container">
                <div class="row heading-row">
                    <div class="col-md-12 text-center">
                        <h3 class="product-title heading bottom-line">
                        {!! trans('naturatherapy/global.maybe_should_like') !!}
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div id="owl-related-items" class="owl-carousel owl-theme">
                        @foreach ($relatedProducts as $product)
                            @include('clients.naturatherapyshop_al.partials.product')
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.product-image-slider').slick({
                dots: true,
                infinite: false,
                speed: 300,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.product-thumbs-slider',
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true
                    }
                }]
            });
            $('.product-thumbs-slider').slick({
                dots: false,
                infinite: false,
                speed: 300,
                arrows: true,
                slidesToShow: 4,
                focusOnSelect: true,
                slidesToScroll: 1,
                asNavFor: '.product-image-slider',
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                    }
                }, {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                    }
                }]
            });

            $('.product-thumbs-slider .slick-slide').removeClass('slick-active');

            $('.product-thumbs-slider .slick-slide').eq(0).addClass('slick-active');

            $('.slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                var mySlideNumber = nextSlide;
                $('.product-thumbs-slider .slick-slide').removeClass('slick-active');
                $('.product-thumbs-slider .slick-slide').eq(mySlideNumber).addClass('slick-active');
            });

            $('.accordion').on("click", function(){
                var sign = $(this).find("a");
                var attr = sign.attr("class");
                if(attr == "minus"){
                    sign.attr("class", "");
                    sign.attr("class", "plus collapsed");
                    
                }
                if(attr == "plus collapsed"){
                    sign.attr("class", "");
                    sign.attr("class", "minus");
                }
            });
        });
    </script>
@stop
