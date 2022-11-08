@extends('clients.luxbox.layouts.default')
@section('content')

<style>
  @media(max-width:991px) {
    .bold {
      font-size: 12px;
      font-weight: 700;
    }

    .width-custom {
      width: 100% !important;
      display: block;
    }

    .customBackground {
      margin-top: 10px !important;
    }

    .flex-between {
      display: block;
    }
  }

  .flex-centered {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  @media(min-width:992px) {
    .width-custom {
      width: 33% !important;
    }

    .flex-between {
      display: flex;
      justify-content: space-between;
    }

    .bold {
      font-size: 10px;
      font-weight: 700;
    }
  }

  .mb-15 {
    margin-bottom: 15px;
  }

  .customBackground {
    background: #F2F2F2;
    padding: 10px !important;
  }

  #main-single-product {}

  #discount-price {
    color: #8b0000;
    font-size: 22px;
  }

  .cart-icon {
    width: 25px !important;
  }

  del {
    color: #8b0000;
  }

  .owl-carousel-product .owl-prev {
    background: transparent;
    width: 20px;
    height: 100%;
    position: absolute;
    top: 0;
    margin-left: -20px;
    display: block !important;
    border: 0 !important;
  }

  .owl-carousel-product .owl-next {
    background: transparent;
    width: 20px;
    height: 100%;
    position: absolute;
    top: 0;
    right: -20px;
    display: block !important;
    border: 0 !important;
  }

  .owl-carousel-thumbs .owl-prev {
    background: transparent;
    width: 20px;
    height: 100%;
    position: absolute;
    top: 0;
    margin-left: -20px;
    display: block !important;
    border: 0 !important;
  }

  .owl-carousel-thumbs .owl-next {
    background: transparent;
    width: 20px;
    height: 100%;
    position: absolute;
    top: 0;
    right: -5px;
    display: block !important;
    border: 0 !important;
  }

  @media(max-width: 767px) {
    .owl-carousel-thumbs .owl-next {
      right: -20px;
    }
  }

  .owl-prev i,
  .owl-next i {
    transform: scale(1, 2);
    color: #1a1a1a;
  }

  .owl-item {
    float: left;
  }

  .owl-carousel-thumbs, .owl-carousel-product {
    overflow: hidden;
  }

  .owl-carousel .owl-nav.disabled {
    display: block;
  }
</style>


<section id="main-single-product" class="shop-single-v1-section section-box featured-hp-1 featured-hp-4">
  <div class="woocommerce">
    <div class="container">
      <div class="content-area">
        <div class="row m-0">
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <div class="woocommerce-product-gallery">
              <div class="owl-carousel-product">
                <div class="item zoom">
                  <img src="{{ $product->image }}">
                  @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                    <?php
            $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
            ?>
                <div class="price-badge">-{{number_format($discountPercentage,0,'.','')}}%</div>
                @endif
                </div>
                @if(count($product->images) > 0)
                @foreach($product->images as $img)
                <div class="item zoom">
                  <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" />
                  @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                    <?php
            $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
            ?>
                <div class="price-badge">-{{number_format($discountPercentage,0,'.','')}}%</div>
                @endif
                </div>
                @endforeach
                @endif
              </div>
            </div>
            <br>
            <div class="woocommerce-product-gallery">
              <div class="owl-carousel-thumbs">
                <div class="item">
                  <img src="{{ $product->image }}">
                </div>
                @if(count($product->images) > 0)
                @foreach($product->images as $img)
                <div class="item">
                  <img src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}" />
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>
          <div style="padding-top:5px;" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">

            <div style="width:100%;" class="summary entry-summary">
              <h1 style="font-size: 22px; padding-bottom:30px; padding-top:30px" class="product_title entry-title">
                {{ $product->title }}</h1>
            </div>

            <div class="summary entry-summary">
              <p class="price">

                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                <ins>
                  <span class="woocommerce-Price-amount amount">
                    {{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}} МКД
                  </span>
                </ins>
                <del id="discount-price">
                  <span class="woocommerce-Price-amount amount">
                    {{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}
                    МКД
                  </span>
                </del>
                @else
                <ins>
                  <span class="woocommerce-Price-amount amount">

                    {{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}}
                    МКД
                  </span>
                </ins>

                @endif

              </p>
              @if($product->short_description)
              <div class="woocommerce-product-details__short-description">
                <p>{!! $product->short_description !!}</p>
              </div>
              @endif
              <div class="cart">
                <div class="quantity">
                  <input data-product-quantity="" type="number" name="quantity" id="quantity" value="1" min="1"
                    class="nput-text qty text">
                  <span class="modify-qty plus" onclick="Increase()">+</span>
                  <span class="modify-qty minus" onclick="Decrease()">-</span>
                </div>
                <button value="{{$product->id}}" data-add-to-cart
                  class="single_add_to_cart_button button alt au-btn btn-small">Додади во кошничка<i
                    class="zmdi zmdi-arrow-right"></i></button>
              </div>
              <div class="flex-between mb-15 product_meta">
                <span class="width-custom flex-centered customBackground bold">
                  <span style="padding-right: 15px; font-size: 24px;">✓</span>
                  <span>
                    БЕСПЛАТНА ИСПОРАКА <br> ОД 7- 14 ДЕНА
                  </span>
                </span>
                <span class="width-custom flex-centered customBackground bold">
                  <span style="padding-right: 15px; font-size: 24px;"> ✓ </span>
                  <span> МОЖНОСТ ЗА<br> ЗАМЕНА/РЕФУНДАЦИЈА</span>
                </span>
                <span class="width-custom flex-centered customBackground bold">
                  <span style="padding-right: 15px; font-size: 24px;"> ✓ </span>
                  <span> БЕЗБЕДНО ПЛАЌАЊЕ И<br> ЗАШТИТА НА ПОДАТОЦИ</span>
                </span>
              </div>

            </div>

            @if($product->description)
            <div class="woocommerce-tabs">
              <ul class="nav nav-tabs wc-tabs" id="myTab" role="tablist">
                <li class="nav-item description_tab" id="tab-title-description" role="tab"
                  aria-controls="tab-description" aria-selected="true">

                </li>

              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="woocommerce-Tabs-panel tab-pane fade show active" id="tab-description" role="tabpanel"
                  aria-labelledby="tab-title-description">
                  <ul>

                    @foreach( $product->attributes as $key => $attri )
                    <li><strong>{{$key}} : </strong>

                      @foreach( $attri as $key => $at)


                      <span>{{ $at->value }} @if(count($attri)!=($key+1)), @endif</span>

                      @endforeach
                    </li>
                    @endforeach
                  </ul>
                  <hr>
                  <p>{!! $product->description !!}</p>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="related">
          <h2 class="special-heading">Можеби ќе ви се допадне</h2>
          <div class="owl-carousel owl-theme" id="related-products">
            @foreach($relatedProducts as $product)
            <div class="item">
              @include('clients.luxbox.partials.single-product')
            </div>
            @endforeach

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- End Shop Section -->
</div>
@section('scripts')
<script>
  $(document).ready(function() {
    $('.zoom').zoom();
  });
</script>
@stop
@stop