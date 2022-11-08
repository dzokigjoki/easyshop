@extends('clients.hotspot.layouts.default')
@section('style')
<link href="{{url_assets('/hotspot/css/home_1.css?v=9')}}" rel="stylesheet">

<style>
  .owl-carousel .owl-item img {
    width: 50px !important;
    margin: 0 auto !important;
  }

  .branc-carousel_image {
    border-radius: 0 !important;
  }

  .slick-slide img {

    width: 100%;
  }
</style>
@stop
@section('content')
<main>
  <div class="banner_desktop slider_desktop">

    @foreach (\BannerHelper::getBannerByCategory('Top Slider') as $banner)
    <a href="{{ $banner->url }}"><img src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt=""></img></a>
    @endforeach
  </div>


  <div class="banner_mobilna slider_mobile">
    @foreach (\BannerHelper::getBannerByCategory('Top Slider') as $banner)
    <a href="{{ $banner->url }}"><img class="mobilen_desktop" src="{{ '/uploads/banners/' . $banner->id . '/md_' . $banner->mobile_image }}" alt=""></img></a>
    @endforeach
  </div>
  <!--/carousel-->

  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Најпродавани</h2>
    </div>
    <div class="row small-gutters">
      @foreach($bestSellersArticles as $product)
      <div class="col-6 col-md-3 col-xl-3">
        @include('clients.hotspot.partials.product', ['product' => $product])
      </div>
      @endforeach
    </div>
  </div>

  <div class="row m-0">
    <div class="col-lg-4 col-md-4 col-sm-12 p-0">
      <a class="img_container" href="{{ route('category', [1, 'futroli']) }}">
        <img src="{{url_assets('/hotspot/img/futroli.jpg')}}" />
      </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 p-0">
      <a href="{{ route('category', [3, 'slushalki']) }}" class="img_container">
        <img src="{{url_assets('/hotspot/img/slusalki-i-galanterija.jpg')}}" />
      </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 p-0">
      <a href="{{ route('category', [9, 'dodatoci']) }}" class="img_container">
        <img src="{{url_assets('/hotspot/img/elektricni-skuteri.jpg')}}" />
      </a>
    </div>
  </div>

  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Препорачани</h2>
    </div>
    <div class="row small-gutters">
      @foreach($recommendedArticles as $product)
      <div class="col-6 col-md-3 col-xl-3">
        @include('clients.hotspot.partials.product', ['product' => $product])
      </div>
      @endforeach
    </div>
  </div>

  <div>
    <div class="container margin_30">
      <div id="brands" class="owl-carousel owl-theme">
        @foreach ($menuCategories as $mc)
        <div class="item">
          <a href="{{ route('category', [$mc['id'], $mc['url']]) }}">
            <img class="branc-carousel_image" src="{{ \ImagesHelper::getCategoryImage($mc['image']) }}">
            <div class="brands_category">{{ $mc['title'] }}</div>
          </a>
        </div><!-- /item -->
        @endforeach
      </div><!-- /carousel -->
    </div><!-- /container -->
  </div>
  <!-- /bg_gray -->

  @if(count($lastBlogs))
  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Новости</h2>
      {{-- <p></p> --}}
    </div>
    <div class="row">
      @foreach ($lastBlogs as $blog)
      <div class="col-lg-6 col-md-6">
        <a class="box_news" href="{{ route('blog', [$blog->id, $blog->url]) }}">
          <figure>
            <img src="{{ \ImagesHelper::getBlogImage($blog) }}" alt="{{ $blog->title }}" />
          </figure>
          <ul>
            {{-- <li>by Mark Twain</li> --}}
            <li>{{ date('M d, Y', strtotime($blog->publish_at)) }}</li>
          </ul>
          <h4>{{ $blog->title }}</h4>
          <p>{{ $blog->short_description }}</p>
        </a>
      </div>
      @endforeach
    </div>
    <!-- /row -->
  </div>
  @endif
  <!-- /container -->
</main>

<!-- /main -->
@stop

@section('scripts')
<!-- SPECIFIC SCRIPTS -->
<script src="{{url_assets('/hotspot/js/carousel-home.js?v=1')}}"></script>


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
  });
</script>
@stop