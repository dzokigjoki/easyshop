@extends('clients.matica.layouts.default')
@section('style')
<link rel="stylesheet" href="{{url_assets('/matica/css/product_page.css?v=1')}}">
<style>
  .red {
    color: #FF3333;
    font-weight: bold;
  }
</style>
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
      <div class="col-md-4">
        <div class="all">
          <div class="product_title_small">
            <h1>{{ $product->title }}</h1>
          </div>
          <div class="product_image">
            <img src="{{ $product->mediumImage }}" />
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <!-- /page_header -->
        <div class="prod_info">
          <div class="product_title_big">
            <h1>{{ $product->title }}</h1>
          </div>
          {{-- <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span> --}}
          <p class="pt-4">
            @if($product->manufacturer)
            Автор: <a
              href="{{route('manufacturer', [$product->manufacturer->id])}}">{{ $product->manufacturer->name }}</a>
            @endif
            <br>
            {!! nl2br($product->short_description) !!}
          </p>

          @if($product->total_stock <= 0 && \EasyShop\Models\AdminSettings::getField('allowMinusQuantity')==false && !$product->bundle)
            <h5 class="red">Артиклот моментално го нема на залиха.</h5>
            @endif

            @if($product->bundle)
            <input type="hidden" id="bundle_number" value="{{$product->bundle_products_number}}">
            @endif

            @if(isset($bundleProducts) && count($bundleProducts) > 0)
            <div style="padding-top: 15px;">
              <label style="padding-bottom: 5px;">
                Изберете книги за овој пакет:</label><br>
              @foreach($bundleProducts as $index => $bundleProduct)
              {{--  @if ($index==0) checked disabled @endif TODO: choose check by default --}}
              <div>
                <input name="bundle[]" type="checkbox" value="{{$bundleProduct->id}}" />
                {{$bundleProduct->title}}
                {{-- <a href="{{route('product', [$bundleProduct->id, $bundleProduct->url])}}">{{$bundleProduct->title}}<Br>
                --}}
              </div>
              @endforeach
            </div>
            @endif
            @if($product->total_stock > 0 || $product->bundle)
            <div class="prod_options">
              <div class="row">
                <label
                  class="col-xl-3 col-lg-3 col-sm-4  col-md-4 col-5 quantity_label"><strong>Количина</strong></label>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-4 col-7">
                  <div class="numbers-row--new">
                    <input type="text" value="1" readonly id="quantity_1" data-product-quantity class="qty2"
                      name="quantity_1">
                  </div>
                </div>
              </div>
            </div>
            @endif
            <div style="align-items:center;" class="row product_price">
              <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-5">
                @if($hasDiscount)
                <div class="price_main"><span class="new_price">{{ $discountPrice }} ден</span> <span
                    class="old_price">{{ $price }} ден</span></div>
                @else
                @if(isset($product->bundle_price_type) && $product->bundle_price_type == 'percent')
                <div class="price_main"><span class="new_price">{{ $price }}% попуст на вкупната сума</span></div>
                @else
                <div class="price_main"><span class="new_price">{{ $price }} ден</span></div>
                @endif
                @endif
              </div>
              @if($product->total_stock > 0 || $product->bundle)
              <div class="col-lg-4 col-md-6 col-sm-4 col-7">
                <div class="btn_add_to_cart"><a href="javascript://" class="btn_1" id="cart-button"
                    value="{{$product->id}}" data-add-to-cart>Додади во кошничка</a></div>
              </div>
              @endif
            </div>
            {{-- <img src="{{url_assets('/matica/img/banners/mal-baner-popust.jpg')}}" style="width:
            100%;margin-top: 40px;"> --}}
            <div class="product_price-separator"></div>

            @if($product->description)
            <div class="product_description">
              {!! $product->description !!}
            </div>
            @endif
        </div>
        <!-- /prod_info -->

      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->

  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Книги од истата категорија</h2>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
      @foreach($relatedProducts as $article)
      <div class="item">
        @include('clients.matica.partials.product', ['product' => $article])
      </div>
      @endforeach
      <!-- /item -->
    </div>
    <!-- /products_carousel -->
  </div>
  <!-- /container -->
</main>
<!-- /main -->
@stop

@section('scripts')
<script src="{{url_assets('/matica/js/carousel_with_thumbs.js')}}"></script>
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