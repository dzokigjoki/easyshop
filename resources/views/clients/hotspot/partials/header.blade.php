<style>
  .scroll-vertically {
    max-height: 500px;
    overflow-y: auto;
  }
  .custom-img-circle {
    width: 30px !important;
    margin-right: 10px;
  }
  .m-hr {
    margin: 0 auto !important;
  }
  @media(max-width: 991px) {
    .m-hr {
      display: none !important;
    }
  }
  .menu-acc-style {
    color: rgba(0, 0, 0, 0.3) !important;
    text-align: center;
  }
  .loggedUser {
    padding: 4px;
    border-radius: 50%;
    background: #DF5D10;
    color: white;
    font-weight: bold;
    padding-right: 8px;
  }

  .mr-5 {
    margin-right: 5px !important;
  }
  .mr-15 {
    margin-right: 15px !important;
  }

  .mr-10 {
    margin-right: 5px !important;
  }

  .pl-15 {
    padding-left: 15px;
  }

  
  .color-red {
    color: red !important;
  }

  @media(max-width: 768px) {
    .second {
      margin-top: 0 !important;
    }
  }

  @media(min-width: 769px) {

    /* .second */
    .second::-webkit-scrollbar {
      width: 5px;
      -webkit-appearance: none;
    }

    /* Track */
    .second::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    .second::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    .second::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  }

  @media(max-width: 991px) {
    .text-align-devices {
      text-align: center !important;
    }
  }

  @media(min-width: 992px) {
    .text-align-devices {
      text-align: right !important;
    }
    
    .mt-pc-10 {
      margin-top: 10px;
    }
  }
</style>
<header class="version_1">
  <div class="layer"></div>
  {{-- <div class="main_header">
    <div class="container">
      <div class="row small-gutters">
        <div style="justify-content:center" class="col-xl-12 col-lg-12 d-lg-flex align-items-center">
          <div id="logo">
            <a href="/"><img style="padding: 15px;" width="130" height="auto"
                src="{{url_assets('/hotspot/img/logo.png')}}" alt=""></a>
  </div>
  </div>
  <nav class="col-xl-10 col-lg-10 text-align-devices">
    <a class="open_close" href="javascript:void(0);">
      <div class="hamburger hamburger--spin">
        <div class="hamburger-box">
          <div class="hamburger-inner"></div>
        </div>
      </div>
    </a>
    <div class="main-menu">
      <div id="header_menu">
        <a href="/"><img src="{{url_assets('/hotspot/img/logo.png')}}" alt="" height="55"></a>
        <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
      </div>
      <ul>
        <li>
          <a href="/kontakt">Контакт</a>
        </li>
        <li>
          <a href="/za-nas">За нас</a>
        </li>
        <li>
          <a href="/faq">FAQ</a>
        </li>
      </ul>
    </div>
  </nav>
  </div>
  </div>
  </div> --}}



  <div class="main_nav Sticky">
    <div class="container">
      <div class="row small-gutters">
        <div class="col-xl-4 col-lg-4 col-md-4 align-items-center flex flex-start">
          <nav class="categories w-100">
            <ul class="clearfix">
              <li class="w-100">
                <span>
                  <a class="header-color">
                    <span class="hamburger hamburger--spin">
                      <span class="hamburger-box">
                        <span class="hamburger-inner header-background"></span>
                      </span>
                    </span>
                    Мени
                  </a>
                </span>

                <div id="menu">
                  <ul style="min-height: 400px;" id="main">
                    <li class="hidden-xs hidden-sm mt-pc-10">
                      <span class="pl-15 menu-acc-style">КАТЕГОРИИ</span>
                      <hr class="m-hr">
                    </li>
                    <?php $counter = 0; ?>
                    @foreach ($menuCategories as $menuCategory)
                    <li>
                      <span><a href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}">
                          @if($menuCategory['image'])
                          <img width="30" class="mr-10 img img-responsive"
                            src="/uploads/category/{{$menuCategory['image']}}" alt="{{$menuCategory['title']}}">
                          @else
                          <img width="30" class="mr-10 img img-responsive category-image"
                            src="https://axiomoptics.com/wp-content/uploads/2019/08/placeholder-images-image_large.png"
                            alt="">
                          @endif
                          {{ $menuCategory['title'] }}
                        </a>
                      </span>
                      @if(isset($menuCategory['children']))

                      <?php $childrenCount = count($menuCategory['children']); ?>
                      <ul class="second" style="box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.175);
                                              max-height: 500px;overflow-y: auto; height:{{$childrenCount * 45}}px;">
                        <?php $counter1 = 0; ?>
                        @foreach($menuCategory['children'] as $ch)
                        <li>
                          <a style="font-size: 16px !important;" href="{{route('category', [$ch['id'], $ch['url']])}}">
                            @if($ch['image'])
                            <img width="50" class="mr-15 img img-responsive" src="/uploads/category/{{$ch['image']}}"
                              alt="{{$ch['title']}}">
                            @else
                            <img width="50" class="mr-15 img img-responsive category-image"
                              src="https://axiomoptics.com/wp-content/uploads/2019/08/placeholder-images-image_large.png"
                              alt="">
                            @endif
                            {{$ch['title']}}
                          </a>
                          @if(isset($ch['children']))
                          <?php $counter1 = 0; ?>
                          <ul class="third">
                            @foreach($ch['children'] as $ch1)
                            @if($counter1 < 3) <li style="width:100% !important">
                              <a href="{{route('category', [$ch1['id'], $ch1['url']])}}">{{$ch1['title']}}</a>
                        </li>
                        @else
                        <li style="width:100% !important">
                          <a style="font-size:16px !important; text-decoration: underline !important"
                            href="{{route('category', [$ch['id'], $ch['url']])}}">
                            Види повеќе
                          </a>
                        </li>
                        @break
                        @endif
                        <?php $counter1 ++; ?>
                        @endforeach
                      </ul>
                      @endif
                    </li>
                    @endforeach
                  </ul>
                  <?php $counter++; ?>
                  @endif
              </li>
              @endforeach
              <li class="mt-pc-10">
                <span class="pl-15 menu-acc-style">АКАУНТ</span>
                <hr class="m-hr">
              </li>
              @if(auth()->check() && auth()->user()->role != 'admin')
              <li>
                <a href="{{route('order.history')}}"><img class="custom-img-circle" src="{{ url_assets('/hotspot/img/orders.png') }}" alt="">Моите
                  нарачки</a>
              </li>
              <li>
                <a href="{{route('profiles.get')}}"><img class="custom-img-circle" src="{{ url_assets('/hotspot/img/user.png') }}" alt=""> Мојот профил</a>
              </li>
              <li><a href="{{route('auth.logout.get')}}"><img class="custom-img-circle" src="{{ url_assets('/hotspot/img/logout.png') }}" alt="">Одјава</a></li>
              @else
              <li>
                <a href="/login"><img class="custom-img-circle" src="{{ url_assets('/hotspot/img/user.png') }}" alt=""> Најава / Регистрација</a>
              </li>
              @endif
            </ul>
        </div>
        </li>
        </ul>
        </nav>
      </div>
      <div class="position-mob col-xs-4 col-md-4 col-lg-4 flex flex-centered">
        <div id="logo">
          <a href="/"><img height="auto" src="{{url_assets('/hotspot/img/logo.png')}}" class="img-pos custom-width"
              alt=""></a>
        </div>
      </div>
      {{-- <div class="text-center col-xl-4 col-lg-4 col-md-4 d-none d-md-block">
        <div class="custom-search-input">
          <form method="get" action="{{route('search')}}">
      <input type="text" name="search" placeholder="Пребарај...">
      <button type="submit"><i class="header-icon_search_custom"></i></button>
      </form>
    </div>
  </div> --}}
  <div class="col-xl-4 col-lg-4 col-md-4 align-items-center pb-15-mob flex flex-end">
    <?php
                  $totalProducts = 0;
                  $totalWishlistProducts = 0;
                  $totalPrice = 0;
                  ?>@if (Session::has('cart_products'))
    @foreach(session()->get('cart_products') as $pid => $product)
    <?php
                  $product = (object)$product;
                  $totalPrice = $totalPrice + ($product->price * $product->quantity);
                  $totalProducts = $totalProducts + $product->quantity;
                  ?>
    @endforeach
    @endif
    @if(auth()->user())
    <?php
                  $pids = \EasyShop\Models\Wishlist::where('user_id', auth()->user()->id)->pluck('product_id');
                  $wishlistProducts = \EasyShop\Models\Product::whereIn('id', $pids)->get();
                  $totalWishlistProducts = count($wishlistProducts);
                  ?>
    @endif
    <ul class="top_tools">
      <li>
        <div class="dropdown dropdown-cart">
          <a href="/cart" class="cart_bt header-color flex-centered"><strong data-amount-value>
              {{$totalProducts}}</strong></a>
          <div class="scroll-vertically dropdown-menu">
            <ul aria-labelledby="shoppingCart" id="shoppingCart">
              @include('clients.hotspot.cart-partial')
            </ul>
          </div>
        </div>
      </li>
      @if(auth()->user())
      <li>
        <a href="/wishlist" class="wishlist header-color flex-centered"><strong data-amount-wishlist-value>
            {{$totalWishlistProducts}}</strong></a>
      </li>
      @endif
      <li>
        <a href="javascript:void(0);" class="btn_search_mob header-color flex-centered"><span>Пребарај</span></a>
      </li>
      <li>
        <a href="#menu" class="btn_cat_mob flex-centered header-color">
          <span style="display: inline-block" class="hamburger hamburger--spin">
            <span class="hamburger-box">
              <span class="hamburger-inner header-background"></span>
            </span>
          </span>
          Мени
        </a>
      </li>
    </ul>
  </div>
  </div>
  </div>
  <div class="custom_search_input search_mob_wp">
    <form class="flex-centered" method="get" action="{{route('search')}}">
      <input type="text" style="border-radius: 0;" class="mb-0 form-control" name="search" placeholder="Пребарај...">
      <input type="submit" style="background: #DF5D10;" class="mb-0 btn_1" value="Пребарај">
    </form>
  </div>
  </div>
</header>