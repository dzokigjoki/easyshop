@extends('clients.hotspot.layouts.default')
@section('style')
<link rel="stylesheet" href="{{url_assets('/hotspot/css/product_page.css?v=4')}}">
<link rel="stylesheet" href="{{url_assets('/hotspot/plugins/slick/slick.css')}}">
<link rel="stylesheet" href="{{url_assets('/hotspot/plugins/slick/slick-theme.css')}}">
<style>
  input.qty2 {
    width: 90px;
  }

  .accessories-table>tr>td {
    vertical-align: middle;
  }

  .variations-table>tr>td {
    vertical-align: middle;
  }

  .bundle {
    width: 120px;
    border-radius: 5px;
    margin-top: 10px;
    margin-bottom: 10px;

  }

  .btn_sold_out {
    border: none;
    color: #fff;
    background: #e01819;
    outline: none;
    display: inline-block;
    text-decoration: none;
    padding: 12px 25px;
    color: #fff;
    font-weight: 500;
    text-align: center;
    font-size: 14px;
    font-size: 0.875rem;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    line-height: normal;
  }

  .accessory-img {
    width: 80px;
  }

  .children-wrapper {
    padding-top: 80px;
  }

  .product-contact {
    text-decoration: underline;
    /*  */
    color: #083487;
  }

  .product-contact:hover {
    color: #162B4D;
  }

  .percent {
    font-size: 24px;
    padding: 8px;
    border-radius: 10px;
    background-color: #FF3333;
    color: #ffffff
  }

  .pt-10 {
    padding-top: 10px;
  }

  .position-custom {
    position: absolute;
    left: 20px;
    top: -10px;
  }

  .unit_code {
    padding-top: 10px;
    font-weight: 400;
  }
</style>
@stop
@section('content')
<main>
  @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
  <?php
  $hasDiscount = true;
  $price = $product->$myPriceGroup;
  $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
  $discountPercentage = round(($price - $discount) / $price * 100);
  ?>
  @else
  <?php
  $hasDiscount = false;
  ?>
  @endif
  <div class="container margin_30 product_container">
    <div class="page_header hidden-xs">
      <div class="breadcrumbs">
        <ul>
          <li><a href="/">Почетна</a></li>
          <li><a>Прозводи</a></li>
          @if(isset($product->categories) && count($product->categories) > 0)
          <li><a>{{ $product->categories[0]->title }}</a></li>
          @endif
          <li>{{ $product->title }}</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="all">
          <div class="product_title_small">

            <h1>{{ $product->title }} </h1>
          </div>

          <div class="slider">
            <div class="owl-carousel owl-theme main">
              <div style="background-image: url({{ $product->image }});" class="item-box"></div>
              @if(isset($discountPercentage)) <span class="position-custom percent">
                -{{(int)$discountPercentage}}%</span>
              @endif
              @if(isset($product->images) && count($product->images) > 0)
              @foreach($product->images as $image)
              <div style="background-image: url({{\ImagesHelper::getProductImage($image->filename, $product->id, 'lg_')}});" class="item-box"></div>
              @endforeach
              @endif
            </div>
            <div class="left nonl"><i class="ti-angle-left"></i></div>
            <div class="right"><i class="ti-angle-right"></i></div>
          </div>
          <div class="slider-two">
            <div class="owl-carousel owl-theme thumbs">
              <div style="background-image: url({{ $product->image }});" class="item active">
              </div>
              @if(isset($product->images) && count($product->images) > 0)
              @foreach($product->images as $image)
              <div style="background-image: url({{\ImagesHelper::getProductImage($image->filename, $product->id, 'lg_')}});" class="item"></div>
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
            <div class="row">
              <div class="col-sm-9 col-xs-12">
                <h1>{{ $product->title }}</h1>
                <h6 class="unit_code">Шифра: {{$product->unit_code}}</h6>
              </div>
              <div class="col-sm-3 col-xs-12 pt-10">
                @if(isset($discountPercentage)) <span class="percent">
                  -{{(int)$discountPercentage}}%</span>@endif

              </div>
            </div>

          </div>
          <div class="prod_options">
            <div class="row">
              <label class="col-6 quantity_label text-center"><strong>Количина</strong></label>
              <div class="col-6">
                <div class="numbers-row">
                  <input type="number" value="1" id="quantity_1" data-product-quantity class="qty2" name="quantity_1">
                </div>
              </div>
            </div>
          </div>
          <div class="row product_price">
            <div class="col-6">
              @if($hasDiscount && $product->price_discount < $product->price)
                <div class="price_main text-center"><span class="new_price">{{number_format($discount, 0, ',', '.' )}}
                    мкд.</span>
                  <br>
                  <span class="old_price text-center">{{number_format((int)$product->price, 0, ',', '.')}}
                    мкд.</span>

                </div>

                @else
                @if($product->price == 0 && !isset($product->prices))
                <br>
                <a href="/kontakt">
                  <h5 class="product-contact">Контактирајте нè за цена</h5>
                </a>

                @elseif($product->price == 0 && isset($product->prices))
                <div class="text-left">
                  @foreach($product->prices as $price)
                  <span>Мин.
                    @if($price['quantity'] == 0)
                    1
                    @else
                    {{$price['quantity']}}
                    @endif

                    - <b>{{$price['price']}}
                      мкд.</b>
                  </span><br>
                  @endforeach
                </div>

                @else
                <div class="price_main text-center"><span class="new_price">{{number_format((int)$product->price, 0, ',', '.')}}
                    мкд.</span></div>
                @endif

                @endif
            </div>

            @if($product->price != 0 || isset($product->prices))
            <div class="col-6">
              @if($product->sold_out)

              <div class="text-center">
                <div class="btn_sold_out">Продуктот го нема на залиха</div>
              </div>

              @else

              <div class="text-center btn_add_to_cart"><button class="btn_1" id="cart-button" value="{{$product->id}}" data-add-to-cart>Додади во кошничка</button></div>


              @endif
            </div>
            @endif
          </div>
          @if(isset($product->description))
          <div class="product_price-separator"></div>
          <div class="tabs_product">
            <div style="padding: 0;" class="container">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a id="description" href="#pane-description" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Опис</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="tab_content_wrapper">
            <div class="container">
              <div class="tab-content" role="tablist">
                <div id="pane-description" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                  <div class="card-header" role="tab" id="heading-A">
                    <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                        Опис
                      </a>
                    </h5>
                  </div>
                  <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                    <div class="card-body">
                      <div class="row justify-content-between">
                        <div class="col-lg-12">
                          <div class="text-justify product_description">
                            {!! $product->description !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

  @if(count($relatedProducts) > 0)
  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Поврзани производи</h2>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
      @foreach($relatedProducts as $relatedProduct)
      <div class="item">
        @include('clients.hotspot.partials.product', ['product' => (object) $relatedProduct])
      </div>
      @endforeach
    </div>
  </div>
  @endif
</main>
@stop

@section('scripts')
<script src="{{url_assets('/hotspot/js/carousel_with_thumbs.js')}}"></script>
<script src="{{url_assets('/hotspot/plugins/slick/slick.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $(".numbers-row").append('<div class="inc button_inc">+</div><div class="dec button_inc">-</div>');
    $(".button_inc").on("click", function() {
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