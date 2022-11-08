<header class="header header--1">
  <div class="flex-center-header ps-container-fluid" id="top-nav">
    <div class="left">
      <span class="item-label">
        <a href="/contact">
          <img class="top-header-img" src="{{url_assets('/mymoda/images/icons/help.png')}}" alt=""> Помош</a>
      </span>
      <span class="item-label">
        <a href="/contact">
          <img class="top-header-img" src="{{url_assets('/mymoda/images/icons/package.png')}}" alt=""> Следење на нарачка</a>
      </span>
    </div>
    <div class="right">
      <span class="item-label">
        <i class="fa fa-phone mobile-footer-icon"></i>071/683-682
      </span>
    </div>
  </div>

  <nav class="navigation">
    <div class="flex-center-header ps-container-fluid">
      <div class="hidden-xs hidden-sm hidden-md left">
        <form style="margin: 0" method="get" action="{{route('search')}}">
          <input type="text" name="search" style="margin: 0 auto; height:40px" class="form-control" placeholder="Пребарај..." name="" id="search-bar">
          <button class="btn btn-default" style="border:none; background-color:transparent; top:20px; left:27%; position:absolute" type="submit">
            <i style="color:black; font-weight:bold; font-size:16px;" class="fa fa-search"></i>
          </button>
        </form>
      </div>
      <div class="center">
        <a class="ps-logo" href="/">
          <img width="220" src="{{url_assets('/mymoda/images/logo.png')}}" alt="">
        </a>
      </div>
      <div class="hidden-lg center">
        <ul class="menu">
          @foreach ($menuCategories as $menuCategory)
          <li @if(isset($menuCategory['children'])) class="menu-item-has-children dropdown" @endif>
            <a href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}" @if($menuCategory['id']===80) style="color: #ED7B5B" @endif>{{ $menuCategory['title'] }}</a>
            @if(isset($menuCategory['children']))
            <ul class="sub-menu">
              @foreach($menuCategory['children'] as $ch)
              <li>
                <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
              </li>
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
          <li><a href="/kontakt">Контакт</a></li>
        </ul>
      </div>
      <div class="p-10-0 right">
        <div class="menu-toggle"><span></span></div>
        <ul style="align-items: center !important" class="flex-end text-right header__actions">
          <li class="mb-0 sidebar-item" style="margin-right:20px">

          </li>
          <li class="hidden-lg">
            <i style="color: black; font-size: 24px;" class="fa fa-search hidden-lg search-top-button"></i>
            <div style="" class="search-input" tabindex='1' id="searchModal">
              <form method="get" action="{{route('search')}}">
                <input id="fokus" class="inputce display-none-search form-control" type="text" placeholder="Пребарувај" name="search" value="">
                <button class="btn btn-primary btn-md pull-right" id="searchMobileButton" type="submit">
                  <i class="fa fa-search"></i>
                </button>
                {{-- <input class="inputce" type="submit" name="submit" value=""> --}}
              </form>
            </div>
          </li>

          @if(auth()->user())
          <li><a href="/wishlist" id="shopping-action"><i class="exist-heart"></i></a></li>
          @endif


          <li class="header__user"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="shopping-action"><i class="exist-user"></i></a>
            <ul class="dropdown-menu" aria-labelledby="shopping-action" id="shopping-action">
              @if(auth()->check())
              <li>
                <a href="{{route('profiles.get')}}">Профил</a>
              </li>
              <li>
                <a href="{{route('order.history')}}">Историја на нарачки</a>
              </li>
              <li><a href="{{route('auth.logout.get')}}">Одјава</a>
              </li>
              @else
              <li><a href="/login">Најава</a></li>
              <li><a href="/register">Регистрација</a></li>
              @endif
            </ul>
          </li>
          <?php
          $totalProducts = 0;
          $totalPrice = 0;
          ?>@if (Session::has('cart_products'))
          @foreach(session()->get('cart_products') as $pid => $product)
          <?php $product = (object)$product;
          $totalPrice = $totalPrice + ($product->price * $product->quantity);
          $totalProducts = $totalProducts + $product->quantity; ?>
          @endforeach
          @endif
          <li class="header__cart"><a class="ps-shopping" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id=""><i class="exist-minicart"></i>
              <span>
                <i data-amount-value>
                  {{$totalProducts}}</i>
              </span></a>
            <ul class="dropdown-menu" aria-labelledby="shoppingCart" id="shoppingCart">
              @if (Session::has('cart_products'))
              @foreach(session()->get('cart_products') as $product)
              <?php $product = (object)$product; ?>
              <li><span class="ps-product--shopping-cart"><a class="ps-product__thumbnail" href="/p/{{$product->id}}/{{$product->url}}">
                    <img src="{{$product->image}}" alt="{{$product->title}}"></a><span class="ps-product__content"><a class="ps-product__title" href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a>
                    <span class="ps-product__quantity">{{ $product->quantity }} x
                      <span>{{ number_format($product->price, 0, ',', '.')}} МКД</span></span>
                  </span>
                  <a class="ps-product__remove" href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif"><i class="fa fa-trash"></i></a>
                </span>
              </li>
              @endforeach

              <?php
              $totalProducts = 0;
              $totalPrice = 0;
              ?> @if (Session::has('cart_products'))
              @foreach(session()->get('cart_products') as $pid =>
              $product)
              <?php $product = (object)$product;
              $totalPrice = $totalPrice + ($product->price * $product->quantity);
              $totalProducts = $totalProducts + $product->quantity; ?>
              @endforeach
              @else
              @endif
              <li class="total">
                <p>Вкупно:<span> {{ number_format($totalPrice, 0, ',', '.')}} МКД</span></p><a class="ps-btn" href="/cart">Види кошничка</a>
              </li>
              @else
              <h5>Вашата кошничка е моментално празна</h5>
              @endif
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="pt-30 hidden-xs hidden-sm hidden-md text-center col-lg-12">
      <ul class="menu">
        @foreach ($menuCategories as $menuCategory)
        <li @if(isset($menuCategory['children'])) class="menu-item-has-children dropdown" @endif>
          <a href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}" @if($menuCategory['id']===80) style="color: #ED7B5B" @endif>{{ $menuCategory['title'] }}</a>
          @if(isset($menuCategory['children']))
          <ul class="sub-menu">
            @foreach($menuCategory['children'] as $ch)
            <li>
              <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
            </li>
            @endforeach
          </ul>
          @endif
        </li>
        @endforeach
        <li class="menu-item-has-children dropdown">
          <a href="#">Контакт</a>
          <ul class="sub-menu">
            <li>
              <a href="tel:0038971683682"><i class="fa fa-phone dropdown-contact"></i>071/683-682</a>
              <a href="mailto:info@mymoda.mk"><i class="fa fa-envelope dropdown-contact"></i>info@mymoda.mk</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>