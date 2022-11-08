@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<style>
  .banner-img {
    width: 100%;
  }
</style>
<link href="{{url_assets('/clarissabalkan/css/home_1.css?v=3')}}" rel="stylesheet">
<link rel="stylesheet" href="{{url_assets('/clarissabalkan/plugins/slick-new/slick/slick.css')}}">
<link rel="stylesheet" href="{{url_assets('/clarissabalkan/plugins/slick-new/slick/slick-theme.css')}}">
@stop
@section('content')
<main>
  <div id="home-banners">
    <div><img class="banner-img" src="{{url_assets('/clarissabalkan/img/banners/Baner1.jpg')}}" alt=""></div>

    <div><img class="banner-img" src="{{url_assets('/clarissabalkan/img/banners/Baner2.jpg')}}" alt=""></div>

    <div><img class="banner-img" src="{{url_assets('/clarissabalkan/img/banners/Baner3.jpg')}}" alt=""></div>

    <div><img class="banner-img" src="{{url_assets('/clarissabalkan/img/banners/Baner4.jpg')}}" alt=""></div>

    <div><img class="banner-img" src="{{url_assets('/clarissabalkan/img/banners/Baner5.jpg')}}" alt=""></div>

    <div><img class="banner-img" src="{{url_assets('/clarissabalkan/img/banners/vosok1.jpg')}}" alt=""></div>

    <div><img class="banner-img" src="{{url_assets('/clarissabalkan/img/banners/vosok2.jpg')}}" alt=""></div>

  </div>
  {{-- <div id="carousel-home">
    <div class="owl-carousel owl-theme">
      <div class="owl-slide cover home-slide-1"></div>
      <div class="owl-slide cover home-slide-2"></div>
      <div class="owl-slide cover home-slide-3"></div>
      <div class="owl-slide cover home-slide-4"></div>
      <div class="owl-slide cover home-slide-5"></div>
      <div class="owl-slide cover home-slide-6"></div> --}}
  {{-- <div class="owl-slide cover"
        style="background-image: url({{ url_assets('/clarissabalkan/img/slides/slide_home_1.jpg') }});">
  <div class="opacity-mask d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center justify-content-md-start">
        <div class="col-lg-6 static">
          <div class="slide-text white">
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="owl-slide cover"
    style="background-image: url({{ url_assets('/clarissabalkan/img/slides/slide_home_3.jpg') }});">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
      <div class="container">
        <div class="row justify-content-center justify-content-md-start">
          <div class="col-lg-12 static">
            <div class="slide-text text-center black">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- </div> --}}
  <div id="icon_drag_mobile"></div>
  </div>
  <ul id="banners_grid" class="clearfix">
    <li>
      <a href="/c/81/Nega%20za%20telo" class="img_container">
        <img src="{{url_assets('/clarissabalkan/img/clarissabalkan_category_placeholder.jpg')}}"
          data-src="{{url_assets('/clarissabalkan/img/categories/cat2.jpg')}}" class="lazy">
        <div class="short_info opacity-mask">
          <div class="hidden-xs"><span class="btn_1">Види повеќе</span></div>
        </div>
      </a>
    </li>
    <li>
      <a href="/c/1/nokti" class="img_container">
        <img src="{{url_assets('/clarissabalkan/img/clarissabalkan_category_placeholder.jpg')}}"
          data-src="{{url_assets('/clarissabalkan/img/categories/cat1.jpg')}}" alt="" class="lazy">
        <div class="short_info opacity-mask">
          <div class="hidden-xs"><span class="btn_1">Види повеќе</span></div>
        </div>
      </a>
    </li>
    <li>
      <a href="/c/4/Kosa" class="img_container">
        <img src="{{url_assets('/clarissabalkan/img/clarissabalkan_category_placeholder.jpg')}}"
          data-src="{{url_assets('/clarissabalkan/img/categories/cat3.jpg')}}" alt="" class="lazy">
        <div class="short_info opacity-mask">
          <div class="hidden-xs"><span class="btn_1">Види повеќе</span></div>
        </div>
      </a>
    </li>
  </ul>

  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Најпродавани</h2>
      <span>производи</span>
      {{--  <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>  --}}
    </div>
    <div class="row small-gutters">
      @foreach($bestSellersArticles as $product)
      <div class="col-6 col-md-2 col-xl-2">
        @include('clients.clarissabalkan.partials.product')
      </div>
      @endforeach
    </div>
  </div>

  {{-- <div class="container">
    <div class="clearfix row">
      <div class="col-lg-6">
        <a class="hidden-xs img_container">
          <img style="width:100%;" src="{{url_assets('/clarissabalkan/img/clarissabalkan_category_placeholder.jpg')}}"
  data-src="{{url_assets('/clarissabalkan/img/categories/plakjanje_final.jpg')}}" alt="" class="lazy">
  </a>
  <a class="hidden-lg hidden-sm hidden-md img_container">
    <img style="width:100%;"
      src="{{url_assets('/clarissabalkan/img/clarissabalkan_category_placeholder.jpg')}}"
      data-src="{{url_assets('/clarissabalkan/img/categories/plakjanje_final_mobile.jpg')}}" alt=""
      class="lazy">
  </a>
  </div>
  <div class="col-lg-6">
    <a class="img_container">
      <img style="width:100%;"
        src="{{url_assets('/clarissabalkan/img/clarissabalkan_category_placeholder.jpg')}}"
        data-src="{{url_assets('/clarissabalkan/img/categories/dostava1.jpg')}}" alt="" class="lazy">
    </a>
  </div>
  </div>
  </div> --}}

  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Препорачани</h2>
      <span>производи</span>
      {{--  <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>  --}}
    </div>
    <div class="owl-carousel owl-theme products_carousel">
      @foreach($recommendedArticles as $product)
      <div class="item">
        @include('clients.clarissabalkan.partials.product')
      </div>
      @endforeach
    </div>
  </div>


  <div class="bg_gray hidden-xs">
    <div class="container margin_30">
      <div class="clearfix row">
        <div class="col-lg-3 col-md-6 text-center">
          <a class="img_container">
            <img style="width: 200px;" src="{{url_assets('/clarissabalkan/img/bezbedno.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/bezbedno.png')}}" alt="" class="lazy">
          </a>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <a class="img_container">
            <img style="width: 200px;" src="{{url_assets('/clarissabalkan/img/garancija.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/garancija.png')}}" alt="" class="lazy">
          </a>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <a class="img_container">
            <img style="width: 200px;" src="{{url_assets('/clarissabalkan/img/dostava.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/dostava.png')}}" alt="" class="lazy">
          </a>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <a class="img_container">
            <img style="width: 200px;" src="{{url_assets('/clarissabalkan/img/naracaj.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/naracaj.png')}}" alt="" class="lazy">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="bg_gray">
    <div class="container margin_30">
      <div id="brands" class="owl-carousel owl-theme">
        <div class="item">
          <a href="#0"><img src="{{url_assets('/clarissabalkan/img/brands/cattura.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/brands/cattura.png')}}" alt="" class="owl-lazy"></a>
        </div>
        <div class="item">
          <a href="#0"><img src="{{url_assets('/clarissabalkan/img/brands/ceriotti.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/brands/ceriotti.png')}}" alt="" class="owl-lazy"></a>
        </div>
        <div class="item">
          <a href="#0"><img src="{{url_assets('/clarissabalkan/img/brands/clarissa_professional.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/brands/clarissa_professional.png')}}" alt=""
              class="owl-lazy"></a>
        </div>
        <div class="item">
          <a href="#0"><img src="{{url_assets('/clarissabalkan/img/brands/giegi.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/brands/giegi.png')}}" alt="" class="owl-lazy"></a>
        </div>
        <div class="item">
          <a href="#0"><img src="{{url_assets('/clarissabalkan/img/brands/holiday.jpg')}}"
              data-src="{{url_assets('/clarissabalkan/img/brands/holiday.jpg')}}" alt="" class="owl-lazy"></a>
        </div>
        <div class="item">
          <a href="#0"><img src="{{url_assets('/clarissabalkan/img/brands/kemon.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/brands/kemon.png')}}" alt="" class="owl-lazy"></a>
        </div>
        <div class="item">
          <a href="#0"><img src="{{url_assets('/clarissabalkan/img/brands/supernail.png')}}"
              data-src="{{url_assets('/clarissabalkan/img/brands/supernail.png')}}" alt=""
              class="owl-lazy"></a>
        </div>
      </div>
    </div>
  </div>
</main>
@stop

@section('scripts')
{{-- <script src="{{url_assets('/clarissabalkan/js/carousel-home.js?v=1')}}"></script> --}}

<script src="{{url_assets('/clarissabalkan/plugins/slick-new/slick/slick.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#home-banners').slick({
        dots: true,
        arrows: true,
        infinite: true,
        // responsive: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        // prevArrow: true,
        // nextArrow: true
    });
  });
</script>
@stop