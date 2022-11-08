@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link rel="stylesheet" href="{{url_assets('/easycms/clarissabalkan/css/product_page.css?v=2')}}">
@stop
@section('content')
<main>
    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
    <?php 
        $hasDiscount = true;
        $price = number_format($product->$myPriceGroup, 0, ',', '.');
        $discountPrice = EasyShop\Models\Product::getPriceRetail1($product, true, 0); 
        $discountPercentage = '-' . ((int)(($price - $discountPrice) / $price) * 100) . '%';
    ?>
    @else
    <?php
        $price = number_format($product->$myPriceGroup, 0, ',', '.');
        $hasDiscount = false;
    ?>
    @endif 
    <div class="container margin_30 product_container">
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="product_title_small">
                        <h1>{{ $product->title }}</h1>
                    </div>
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            <div style="background-image: url({{$product->image}});"
                                class="item-box"></div>
                            <?php $product_gallery = $product->images?>
                            @if($product_gallery)
                            @foreach($product_gallery as $image)
                            <div style="background-image: url({{\ImagesHelper::getProductImage($image->filename, $product->id)}});"
                                class="item-box"></div>
                            @endforeach
                            @endif
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <div style="background-image: url({{$product->image}});"
                                class="item"></div>
                            @if($product_gallery)
                            @foreach($product_gallery as $image)
                            <div style="background-image: url({{\ImagesHelper::getProductImage($image->filename, $product->id)}});"
                                class="item">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="prod_info">
                    <div class="product_title_big">
                        <h1>{{ $product->title }}</h1>
                    </div>
                    <p class="pt-4">
                        Производител: /
                        <br>
                        {!! nl2br($product->short_description) !!}
                    </p>
                    <div class="prod_options">
                        <div class="row">
                            <label
                                class="col-xl-3 col-lg-3 col-sm-4  col-md-4 col-5 quantity_label"><strong>Количина</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-4 col-7">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" data-product-quantity class="qty2"
                                        name="quantity_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product_price">
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-5">
                            @if($hasDiscount)
                            <div class="price_main"><span class="new_price">{{ $discountPrice }} ден</span>
                                <span class="old_price">{{ $price }} ден</span></div>
                            @else
                            <div class="price_main"><span class="new_price">{{ $price }} ден</span></div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-7">
                            <div class="btn_add_to_cart">
                                <button class="btn_1" id="cart-button"
                                    value="{{$product->id}}" data-add-to-cart>Додади во кошничка</button></div>
                        </div>
                    </div>
                    <div class="product_price-separator"></div>

                    @if($product->description)
                    <div class="text-justify product_description">
                        {!! $product->description !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(count($relatedProducts) > 0)
    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Производи од истата категорија</h2>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach($relatedProducts as $product)
            <div class="item">
                @include('clients.clarissabalkan.partials.product', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
    @endif
</main>
@stop

@section('scripts')
<script src="{{url_assets('/easycms/clarissabalkan/js/carousel_with_thumbs.js')}}"></script>
<script>
    $(document).ready(function() {
      /* Input incrementer*/
      $(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
      $(".button_inc").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
          var newVal = parseFloat(oldValue) + 1;
        } else {
          // Don't allow decrementing below zero
          if (oldValue > 2) {
            var newVal = parseFloat(oldValue) - 1;
          } else {
            newVal = 1;
          }
        }
        $button.parent().find("input").val(newVal);
      });
    });
</script>
@stop