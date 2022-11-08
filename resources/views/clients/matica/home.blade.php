@extends('clients.matica.layouts.default')
@section('style')
<link href="{{url_assets('/matica/css/home_1.css?v=9')}}" rel="stylesheet">

<style>

.slick-slide img{

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
      <div class="col-6 col-md-3 col-xl-2">
        @include('clients.matica.partials.product', ['product' => $product])
      </div>
      @endforeach
      <!-- /col -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->

  <ul id="banners_grid" class="clearfix">
    <li>
      <a class="img_container" href="{{ route('category', [31, 'novi-izdanija']) }}">
        <img src="{{url_assets('/matica/img/banners/bm1.png')}}" />
      </a>
    </li>
    <li>
      <a href="{{ route('category', [32, 'nash-predlog']) }}" class="img_container">
        <img src="{{url_assets('/matica/img/banners/bm2.png')}}" />
      </a>
    </li>
    <li>
      <a href="{{ route('category', [33, 'najprodavani']) }}" class="img_container">
        <img src="{{url_assets('/matica/img/banners/bm3.png')}}" />
      </a>
    </li>
  </ul>
  <!--/banners_grid -->

  <div class="container margin_60_35">
    <div class="main_title">
      <h2>Наш избор</h2>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
      @foreach($recommendedArticles as $product)
      <div class="item">
        @include('clients.matica.partials.product', ['product' => $product])
      </div>
      <!-- /item -->
      @endforeach
    </div>
    <!-- /products_carousel -->
  </div>
  <!-- /container -->

  <div class="bg_gray">
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
      <h2>#Bukmarker</h2>
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
<script src="{{url_assets('/matica/js/carousel-home.js?v=1')}}"></script>


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