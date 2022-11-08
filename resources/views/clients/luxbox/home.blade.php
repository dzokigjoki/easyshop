@extends('clients.luxbox.layouts.default')
@section('content')

<style>
  .mt-60 {
    margin-top: 60px;
  }

  .owl-dots {
    width: 100%;
  }

  .darkGray {
    color: #333 !important;
  }
</style>

<div class="page-content">
  <section class="style-home-slider-hp-2 style-home-slider-hp-6">


    <div class="banner_desktop slider_desktop">
      @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
      <a href="{{ $banner->url }}"><img src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt=""></img></a>
      @endforeach
    </div>





    <div class="mobilen_desktop slider_mobile">
      @foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
      <a href="{{ $banner->url }}"><img class="mobilen_desktop" src="{{ '/uploads/banners/' . $banner->id . '/md_' . $banner->mobile_image }}" alt=""></img></a>
      @endforeach
    </div>

  </section>
  <section class="items-hp-6 featured-hp-1 section-box">
    <div class="container">
      <div class="row hide_mobilna">
        <div class="col-md-12">
          <h2 class="special-heading">Мебел и аксесоари изработени од мермер</h2>
        </div>

        <div class="col-md-6 col-sm-12 col_pad_0">
          <div class="underBanerText">
            <p>Мермерот е уметничко дело на природата, а ние сме
              тука да создадеме дизајн и тоа дело да го оформиме
              во функционално парче мебел кое ќе го разубави
              секојдневието во домот.</p>
            <br>
            <p>Секое парче мермер е уникатно, секоја шара единствена,
              па така и секој наш производ се разликува од останатите.</p>
            <div class="underBanerButton"><a href="/c/22/za-nas" class="au-btn btn-small ">Дознај повеќе <i class="zmdi zmdi-arrow-right"></i></a></div>
          </div>
          <a href="/p/48/circle-silver"><img style="display: none" class="underBaner1" src="{{url_assets('/luxbox/images/home/underBaner1.jpg')}}" alt=""></a>

        </div>
        <div class="col-md-6 col-sm-12 col_pad_0">
          <a href="/p/41/console-d-ice"><img style="display: none" class="underBaner2" src="{{url_assets('/luxbox/images/home/underBaner2.jpg')}}" alt=""></a>
          <a href="/p/7/luxbox-ice-low"><img style="display: none" class="underBaner3" src="{{url_assets('/luxbox/images/home/underBaner3.jpg')}}" alt=""></a>
        </div>

      </div>

      <div class="col-sm-12 col-xs-12 padding_col_10 pt_35">
        <h6 class="text-center special-heading text-under-banner pb-4 hide_desktop darkGray">Мебел и аксесоари изработени од мермер</h6>
        <div id="slider_products" class="owl-carousel owl-theme">
          @foreach($recommendedArticles as $product)
          @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
          <?php
          $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
          $discountPercentage = (($product->price - $discount) / $product->price) * 100;
          ?>
          @endif

          <div class="product-innercotent" data-link="/p/{{$product->id}}/{{$product->url}}" style="margin:10px;">
            <a style="width: 100%; height: 100%; display: block;" class="image_overlay_a" href="/p/{{$product->id}}/{{$product->url}}">
              <div class="image_overlay"></div>
            </a>
            <a href="/p/{{$product->id}}/{{$product->url}}">
              <img class="hover_image" src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt="">
              @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
              <div class="price-badge">-{{number_format($discountPercentage,0,'.','')}}%</div>
              @endif
            </a>
            <div class="info-product info_product_hover">
              <h3 class="title-product"><a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a></h3>
              @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
              <?php
              $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
              $discountPercentage = (($product->price - $discount) / $product->price) * 100;
              ?>

              <span class="price-product">
                <span class="discounted-price">
                  <strong>{{number_format($discount, 0, ',', '.')}} МКД</strong>
                </span>
                <del class="old-price">
                  {{number_format($product->price, 0, ',', '.')}} МКД
                </del>
              </span>
              @else
              <span class="price-product"><strong>{{number_format($product->price, 0, ',', '.')}} МКД</strong></span>
              @endif
              <a class="ts-viewdetail" href="#"><span class="icon icon-arrows-slim-right"></span></a>
            </div>
            <div class="ts-product-button info_product_hover">
              <a value="{{$product->id}}" data-add-to-cart="" class="btn-add-to-cart button add_to_cart_button product_added product_type_simple"></a>
            </div>
            <div class="ts-wishlist-button info_product_hover">
              <a data-add-to-wish-list="" value="{{$product->id}}" class="btn-add-to-cart button add_to_cart_button product_added product_type_simple"></a>
            </div>
          </div>




          @endforeach
        </div>
      </div>
    </div>
    <div class="container">

      <div class="items-content woocommerce pt_0">
        <div class="content-area">
          <div class="row margin_0">

            <section class="items-hp-6 pt_0 featured-hp-1 section-box hide_mobilna">
              <div class="items-content woocommerce pt_0">
                <div class="content-area">
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 padding-col_0 pt_15">
                      <div class="items-left-1">
                        <span>BEST SELLER</span>
                        <h2>Колекција Luxbox</h2>
                        <p class="text_collection">Евоцирајќи го гламурот на дизајните на италијанскиот мебел од 1950 година, LuxBox мермерните маси се одликуваат со целосна мермерна обвивка на која елегантно
                          прикажаните природни вени внесуваат софистицираност и свежина во секој ентериер.</p>
                        <a href="/c/5/luxbox-masi" class="au-btn btn-small">Види повеќе<i class="zmdi zmdi-arrow-right"></i></a>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pt_15 padding_top_0 padding-col-0 align_vertical col_pad_0">
                      <div class="items-right-1">
                        <a href="/c/5/luxbox-masi" class="images width_100"><img src="{{url_assets('/luxbox/images/home/kolekcija.jpg')}}" alt="items"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <hr class="w-100">

            <div class="col-sm-12 col-xs-12 pt_100">
              <h6 class="special-heading">Производи</h6>
            </div>
            <div class="col-sm-12 col-xs-12 pt_35 col_pad_0">
              <div class="row slider_categories owl-carousel owl-theme">
                <div class="col-12 col_padding items-right-1 categories_hover">
                  <a href="/c/4/masi" class="images width_100"><img src="{{url_assets('/luxbox/images/home/kategorija_1.jpg')}}" alt="items"></a>
                  <div class="text-wrapper-photos">
                    <a href="/c/4/masi" target="_self" title="Маси">
                      <div class="text-wrapper-title">Маси</div>
                    </a>
                  </div>
                </div>
                <div class="col-12 col_padding items-right-1 categories_hover">
                  <a href="/c/20/konzoli-i-polici" class="images width_100"><img src="{{url_assets('/luxbox/images/home/kategorija_2.jpg')}}" alt="items"></a>
                  <div class="text-wrapper-photos">
                    <a href="/c/20/konzoli-i-polici" target="_self" title="Конзоли и полици">
                      <div class="text-wrapper-title">Конзоли и полици</div>
                    </a>
                  </div>
                </div>
                <div class="col-12 col_padding items-right-1 categories_hover">
                  <a href="/naskoro" class="images width_100"><img src="{{url_assets('/luxbox/images/home/kategorija_3.jpg')}}" alt="items"></a>
                  <div class="text-wrapper-photos">
                    <a href="/naskoro" target="_self" title="Аксесоари">
                      <div class="text-wrapper-title">Аксесоари</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="w-100">
    </div>
  </section>

  <section class="items-hp-6 featured-hp-1 section-box pt_0_mob">

    <div class="container">
      <div class="row">
        <div class="col-md-4 items-right-1 align_vertical display_none_mob">
          <a href="#" class="images width_100"><img src="{{url_assets('/luxbox/images/home/dizajn.jpg')}}" alt="items"></a>
        </div>
        <div class="col-md-8">
          <h2 class="special-heading pt_35">Дизајнирајте го својот производ!</h2>
          <p class="text_design">Видовте производ што Ви се допаѓа, но не е во соодветна димензија или пак боја за Вашиот простор? Можеби имате визија за дизајн на маса од мермер која ние ја немаме? Споделете
            ја Вашата идеја, ние ќе ја реализираме за Вас.</p>
          <div class="text_design design_button"><a href="/po-naracka" class="au-btn btn-small ">Дознај повеќе <i class="zmdi zmdi-arrow-right"></i></a></div>
        </div>
      </div>
      {{-- <div class="row hide_desktop">  --}}
      {{-- <a href="/po-naracka"><img class="design_mobilna" src="{{url_assets('/luxbox/images/home/dizajnirajMob.jpg')}}" alt=""></a> --}}
      {{-- </div>  --}}
    </div>
  </section>
  @if(isset($instagramItems))
  <section class="insta-hp-1 section-box mt-60 pb-0">
    <div class="container">
      <div class="insta-content">
        <div class="col-sm-12 col-xs-12">
          <h6 class="special-heading">Нашиот Инстаграм</h6>
        </div>
        {{-- <a href="//www.instagram.com/luxbox.mk/" target="_blank">@luxbox.mk</a> --}}
        <div class="row">
          <?php $counter = 0 ?>
          @foreach($instagramItems->data as $instagramPost)
          <?php $counter = $counter + 1 ?>
          <div class="col">
            <div class="insta-detail">
              <a href="{{ $instagramPost->link }}" target="_blank" class="insta-image">
                <img src="{{ $instagramPost->images->standard_resolution->url }}" style="width: 220px; height: 220px;" alt="insta-1">
                <div class="overlay"></div>
              </a>
            </div>
          </div>
          @if($counter == 5)
          @break
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- Banner Section -->
  {{-- <section class="banner-hp-6">
    <div class="container-fluid">
      <div class="banner-content">
        <div class="row">

          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="banner-details">
              <a href="#" class="bg-image">
                <img src="{{url_assets('/luxbox/images/hp-6-banner-1.jpg')}}" alt="banner">
  </a>
  <div class="info">
    <a href="shop-full-width.html" class="shop">Види повеќе<i class="zmdi zmdi-arrow-right"></i></a>
  </div>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
  <div class="banner-details">
    <a href="#" class="bg-image">
      <img src="{{url_assets('/luxbox/images/hp-6-banner-1.jpg')}}" alt="banner">
    </a>
    <div class="info">
      <a href="shop-full-width.html" class="shop">Види повеќе<i class="zmdi zmdi-arrow-right"></i></a>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section> --}}
<!-- End Banner Section -->

<section id="newsletter" class="newsletter-hp-4">

  <div class="container">
    <hr class="w-100">
    <div  class="newsletter-content">
      <div class="newsletter-details">
        <div class="row" style="width: 100%;">

          @if(session()->has('success'))
          <div class="col-12">
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
          </div>
          @endif
          @if(session()->has('error'))
          <div class="col-12">
            <div class="alert alert-danger">
              {{ session()->get('error') }}
            </div>
          </div>
          @endif

          <div class="col-lg-7 p_newsletter">
            <div class="row" style="height: 100%;">
              <div class="col-sm-12 align_vertical">

                <p class="font-16">Бидете во тек со новостите и промоциите на LuxBox.</p>
              </div>
            </div>

          </div>
          <div class="col-lg-5 d-flex">
            <form style="display: contents;" method="POST" action="{{ route('newsletter.subscribe') }}">
              {{csrf_field()}}
              <input type="text" required name="email" class="form-control" placeholder="Внесете ја вашата е-пошта...">
              <button class="au-btn au-btn-black "><i class="zmdi zmdi-arrow-right"></i></button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

@stop


@section('scripts')
<script>
  $(document).ready(function() {

    $('.slider_desktop').slick({
      dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
    });

    $('.slider_mobile').slick({
      dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
    });

    $(".product-innercotent").mouseenter(function() {
      $(this).children(".image_overlay_a").children(".image_overlay").addClass("show");
    });

    $(".product-innercotent").hover(function() {
      $(this).css("cursor", "pointer");
    });

    $(".product-innercotent").mouseleave(function() {
      $(this).children(".image_overlay_a").children(".image_overlay").removeClass("show");
    });

    $(window).scroll(function() {
      var hT = $('.underBaner1').offset().top,
        hH = $('.underBaner1').outerHeight(),
        wH = $(window).height(),
        wS = $(this).scrollTop();
      if (wS > (hT + hH - wH)) {

        $(".underBaner1").fadeIn(1500);
        $(".underBaner2").fadeIn(1500);
        $(".underBaner3").fadeIn(1500);

      }
    });
    $(".categories_hover").mouseenter(function() {
      $(this).children('.text-wrapper-photos').css({
        'padding': '65% 0',
        'margin-top': '0',
        'height': '100%',
        'top': '50%',
        'transition': 'all 0.7s',
        'cursor': 'pointer'
      });
      $(this).children('.text-wrapper-photos').click(function() {
        window.location.replace($(this).children("a").attr("href"));
      })
    });
    $(".categories_hover").mouseleave(function() {
      $(this).children('.text-wrapper-photos').css({
        'padding': '40px 0',
        'margin-top': '-52px',
        'height': '',
        'top': '100%',
        'transition': 'all 0.7s'
      });
    });
  });
</script>

@stop