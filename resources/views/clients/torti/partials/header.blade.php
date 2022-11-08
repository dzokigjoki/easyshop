<style>
  .logo {
    max-width: 120px !important;
    width: 120px !important;
    height: auto !important;
  }
</style>
<header id="header" class="header-section container-fluid no-padding">
  <div class="container-fluid no-padding menu-block">
    <div class="container">
      <nav class="navbar navbar-default ow-navigation">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
            class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" class="navbar-brand">
            <img class="logo margin-top-logo" src="{{ url_assets('/torti/images/logo-white.png') }}" alt="">
          </a>
        </div>
        <div class="menu-icon">
          <div class="search">
            <a href="#" id="search" title="Search">
              {{-- <i class="icon icon-Search"></i> --}}
            </a>
          </div>
          <div class="cart">
            <button aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" title="Cart" id="language"
              type="button" class="btn dropdown-toggle">
              <?php
            $totalProducts = 0;
            $totalPrice = 0;
             ?>
              @if (Session::has('cart_products'))
              @foreach(session()->get('cart_products') as $pid =>
              $product)
              <?php $product = (object)$product; 
                if(isset($product) && isset($product->additional) && !is_null($product->additional)) {
                  $product->price = $product->additional['price'];
                }
              $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
              @endforeach
              @endif
              <i class="icon icon-ShoppingCart"></i><span data-amount-value>{{ $totalProducts }}</span>
            </button>
            <ul class="dropdown-menu no-padding" id="shoppingCart">
              @if (Session::has('cart_products'))
              @foreach(session()->get('cart_products') as $product)
              <?php $product = (object)$product; 
                if(isset($product) && isset($product->additional) && !is_null($product->additional)) {
                  $product->price = $product->additional['price'];
                }
              ?>
              <li class="flex-justified-center mt-20 mini_cart_item">
                @if(isset($product) && isset($product->additional) && !is_null($product->additional) &&
                isset($product->additional['cake_form']))
                <img style="height:70px; position: absolute; z-index: 500;"
                  src="{{ url_assets('/torti/images/decorations/fill/'.$product->additional['cake_form'].'/'.$product->additional['fill'].'.png') }}"
                  alt="">
                <img style="height:70px; position:absolute; z-index: 500"
                  src="{{ url_assets('/torti/images/decorations/bottom/'.$product->additional['bottom_decoration_design'].'/'.$product->additional['cake_form'].'/'.$product->additional['bottom_decoration_color'].'.png') }}"
                  alt="">
                <img style="height:70px; position: absolute; z-index: 500"
                  src="{{ url_assets('/torti/images/decorations/top/'.$product->additional['top_decoration_design'].'/'.$product->additional['cake_form'].'/'.$product->additional['top_decoration_color'].'.png') }}"
                  alt="">
                <img style="height:70px; position: relative;"
                  src="{{ url_assets('/torti/images/decorations/shlag/'.$product->additional['cake_form'].'/'.$product->additional['cake_color'].'.png') }}"
                  alt="">
                @else
                <img class="pl-34 normal-cart-image attachment-shop_thumbnail" src="{{ $product->image }}">
                @endif

                <div class="cart-padding cart-detail">
                  <a href="#">{{ $product->title }}
                  </a>
                  <span class="quantity">{{ $product->quantity }} &#215; <span class="amount">{{ $product->price }}
                      ден.</span></span>
                </div>
              </li>
              @endforeach
              @else
              <label>Вашата кошничка е празна</label>
              @endif
              <li class="cart-padding subtotal">
                <h5>Вкупно <span>{{ $totalPrice }} ден.</span></h5>
              </li>
              <li class="flex-justified-center justify-content-center cart-padding button">
                <a href="{{ route('cart') }}">Види кошничка</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="navbar-collapse collapse navbar-right" id="navbar">
          <ul class="nav navbar-nav">
            <li class="dropdown active">
              <a href="/" title="Pages" role="button" aria-haspopup="true" aria-expanded="false">Почетна</a>
            </li>
            @foreach($menuCategories as $mc)
            <li class="dropdown">
              <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
            </li>
            @endforeach
            <li class="dropdown">
              <a href="{{route('page.contact')}}" role="button" aria-haspopup="true" aria-expanded="false">Контакт</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="search-box">
        <span><i class="icon_close"></i></span>
        <form><input type="text" class="form-control" placeholder="Enter a keyword and press enter..." /></form>
      </div>
    </div>
  </div>
</header>