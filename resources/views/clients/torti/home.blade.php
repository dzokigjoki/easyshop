@extends('clients.torti.layouts.default')
@section('content')


<style>
  .slick-slide img {
    width: 100% !important;
  }

  .ammount {
    font-family: 'Montserrat' !important;
    color: #C87D81 !important;
  }

  #top-banner {
    background-image:url('{{ url_assets('/torti/images/background-trimmed.png') }}');
  }

  .banner-icon {
    padding-top: 40px !important;
    padding-bottom: 40px !important;
  }
</style>

<main>
  {{-- <div class="slider single-item" id="first-banner">
    <div>
      <img @if((new Jenssegers\Agent\Agent)->isMobile())
      @elseif((new Jenssegers\Agent\Agent)->isDesktop())
      src="{{ url_assets('/torti/images/banner_new.png') }}" alt=""
  @endif
  >
  </div>
  </div> --}}
  {{-- <div class="slider single-item" id="second-banner">
    <div>
      <img @if((new Jenssegers\Agent\Agent)->isMobile())
      src="{{ url_assets('/torti/images/banner2-mobile.png') }}" alt=""
  @elseif((new Jenssegers\Agent\Agent)->isDesktop())
  src="{{ url_assets('/torti/images/banner2-desktop.png') }}" alt=""
  @endif
  >
  </div>
  </div> --}}


  <div>
    <div class="row pt-0" id="top-banner">
      <div class="col-sm-12 col-xs-12">
        <img src="{{ url_assets('/torti/images/banner_new.jpg') }}" alt="">
      </div>
    </div>
  </div>



  <div class="product-section woocommerce container-fluid">
    <div class="container">
      <div class="section-header">
        <h5>ПЕРСОНАЛИЗИРАНИ ТОРТИ</h5>
        <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
      </div>
      <ul class="products">
        @foreach(array_reverse($exclusiveArticles) as $product)
        <li class="product">
          <a href="/p/{{$product->id}}/{{$product->url}}">
            <div class="product-img-box">
              <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{ $product->title }}" />
            </div>
            <div class="detail-box">
              <h3>{{ $product->title }}</h3>
            </div>
          </a>
          <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
              href="/p/{{$product->id}}/{{$product->url}}">Декорирај</a></span>
          <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
            href="/p/{{$product->id}}/{{$product->url}}">Декорирај</a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="product-section woocommerce container-fluid">
    <div class="container">
      <div class="section-header">
        <h5>СТАНДАРДНИ ТОРТИ</h5>
        <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
      </div>
      <ul class="products">
        @foreach($recommendedArticles as $product)
        <li class="product">
          <a href="/p/{{$product->id}}/{{$product->url}}">
            <div class="product-img-box">
              <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{ $product->title }}" />
            </div>
            <div class="detail-box">
              <h3>{{ $product->title }}</h3>
            </div>
          </a>

          <span class="price">
            <span class="ammount">
              400
              МКД
            </span>
            /
            <span class="ammount">
              800
              МКД
            </span>
            {{-- <del class="price">
              {{number_format($product->price, 0, ',', '.')}} МКД
            </del> --}}
          </span>

          <span value="{{$product->id}}" data-add-to-cart="" id="add_to_cart" class="cursor hidden-xs order"><a
              class="button product_type_simple add_to_cart_button">Нарачај</a></span>
          <a value="{{$product->id}}" data-add-to-cart="" id="add_to_cart"
            class="cursor hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button">Нарачај</a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>


  <div class="product-section woocommerce container-fluid">
    <div class="container">
      <div class="section-header">
        <h5>ДЕКОРАТИВНИ ТОРТИ</h5>
        <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
      </div>

      <ul class="products">
        <li class="product hidden-xs"></li>
        <li class="product">
          <a href="/c/7/torti-za-posebna-prigoda">
            <div class="product-img-box">
              <img src="https://torti.mk/uploads/category/5e7c957970031.jpg" />
            </div>
            <div class="detail-box">
              <h3>ТОРТИ ЗА ПОСЕБНА ПРИГОДА</h3>
            </div>
          </a>


          <a
            class="cursor hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button">Прегледај</a>
        </li>
        <li class="product">
          <a href="/c/6/rodendenski-torti">
            <div class="product-img-box">
              <img src="https://torti.mk/uploads/category/5e7c941e89feb.jpg" />
            </div>
            <div class="detail-box">
              <h3>РОДЕНДЕНСКИ ТОРТИ</h3>
            </div>
          </a>


          <a
            class="cursor hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button">Прегледај</a>
        </li>
        <li class="product hidden-xs"></li>
      </ul>
    </div>
  </div>






  <div class="counter-section mb-0 container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="counter-box">
            <i><img src="{{ url_assets('/torti/images/cake.png') }}" alt="cointer-ic"></i>
            <p>Торти</p>
            <h3><span class="count" id="statistics_count-1" data-statistics_percent="3762"> &nbsp;</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="counter-box">
            <i><img src="{{ url_assets('/torti/images/old/counter-ic-2.png') }}" alt="cointer-ic"></i>
            <p>Задоволни купувачи</p>
            <h3><span class="count" id="statistics_count-2" data-statistics_percent="1520"> &nbsp;</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="counter-box">
            <i><img src="{{ url_assets('/torti/images/experience.png') }}" alt="cointer-ic"></i>
            <p>Години искуство</p>
            <h3><span class="count" id="statistics_count-3" data-statistics_percent="8"></span></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="service-section container-fluid">
    <div class="container">
      <div class="section-header">
        <h3>Квалитети зад нашиот бренд</h3>
        <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
      </div>
      <div class="col-md-10">
        <div class="service-box">
          <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
            <div class="service-content">
              <i><img src="{{ url_assets('/torti/images/old/srv-ic-6.png') }}" alt="srv-ic"></i>
              <h3>Навремена испорака</h3>
              <p>Најбрза изработка на вашата нарачка</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
            <div class="service-content">
              <i><img src="{{ url_assets('/torti/images/old/srv-ic-2.png') }}" alt="srv-ic"></i>
              <h3>Голем избор</h3>
              <p>Одберете од нашите многубројни торти и колачи </p>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
            <div class="service-content">
              <i><img src="{{ url_assets('/torti/images/old/srv-ic-4.png') }}" alt="srv-ic"></i>
              <h3>Задоволни купувачи</h3>
              <p>Задоволниот клиент е најдобриот извор на рекламирање</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 no-padding">
            <div class="service-content">
              <i><img src="{{ url_assets('/torti/images/old/srv-ic-5.png') }}" alt="srv-ic"></i>
              <h3>Загарантиран квалитет</h3>
              <p>Нашата долгодишна традиција зборува за нашиот квалитет </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>




  {{-- <div class="product-section woocommerce container-fluid">
    <div class="container">
      <div class="section-header">
        <h5>НАШИТЕ ТОРТИ</h5>
        <img src="{{ url_assets('/torti/images/old/header-seprator.png') }}" alt="seprator">
  </div>
  <ul class="products">
    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="Правоаголник" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>

    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="menu" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>

    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="menu" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>

    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="Срце" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>
    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="Торта" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>
    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="Торта" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>
    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="Торта" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>
    <li class="product">
      <a href="shop-detail.html">
        <div class="product-img-box">
          <img src="{{ url_assets('/torti/images/old/menu-1.png') }}" alt="Торта" />
        </div>
        <div class="detail-box">
          <h3>Торта</h3>
        </div>
      </a>
      <span class="hidden-xs order"><a class="button product_type_simple add_to_cart_button"
          href="#">Декорирај</a></span>
      <a class="hidden-sm hidden-md hidden-lg visible-xs button product_type_simple add_to_cart_button"
        href="#">Декорирај</a>
    </li>
  </ul>
  </div>
  </div> --}}
</main>


@section('scripts')
<script>
  $(document).ready(function(){
      $('#first-banner').slick({
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear'
          
      });
      // $('#second-banner').slick({
      //     infinite: true,
      //     speed: 500,
      //     fade: true,
      //     cssEase: 'linear'
          
      // });
    })
</script>
@stop

@stop