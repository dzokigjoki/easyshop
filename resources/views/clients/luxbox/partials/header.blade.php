<style>
  #header-logo {
    width: 75px;
  }

  .cart-icon {
    width: 25px;
  }
</style>
<header class="header">
  <!-- Show Desktop Header -->
  <div class="show-desktop-header header-hp-1 style-header-hp-1">
    <div id="js-navbar-fixed" class="menu-desktop">
      <div class="container-fluid">
        <div class="menu-desktop-inner flex-centered">
          <!-- Logo -->
          <div class="logo">
            <a href="/"><img src="{{url_assets('/luxbox/images/logo/logo.png')}}" id="header-logo" alt="logo"></a>
          </div>
          <!-- Main Menu -->
          <nav class="main-menu">
            <ul>
              @foreach($menuCategories as $mc)
              <li class="menu-item">
                @if($mc['title']=="Аксесоари")
                <a href="/naskoro">
                  {{ $mc['title']}}
                </a>
                @else
                <a href="{{route('category', [$mc['id'], $mc['url']])}}">
                  {{ $mc['title']}}
                </a>
                @endif
                @if(isset($mc['children']))
                <ul class="sub-menu">
                  @foreach($mc['children'] as $ch)
                  @if($ch['title']=='П маси')
                  <li><a href="/naskoro">{{ $ch['title'] }}</a></li>
                  @else
                  <li><a href="{{route('category', [$ch['id'], $ch['url']])}}">{{ $ch['title'] }}</a></li>
                  @endif
                  @endforeach
                </ul>
                @endif
              </li>
              @if($mc['title']=="Аксесоари")
              <li class="menu-item">
                <a href="/po-naracka">Дизајнирај производ</a>
              </li>
              @endif
              @endforeach
            </ul>
          </nav>
          <!-- Header Right -->
          <div class="header-right">
            <div class="search-btn-wrap padding_icons">
              <button class="search-btn" data-toggle="modal" data-target="#searchModal">
                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-search" fill="blackr" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                </svg>
              </button>
            </div>
            <!-- Login -->
            <div class="user-btn-wrap padding_icons">
              <div class="user-btn">
                @if(!auth()->check())
                <a href="/login">
                  <svg width="1.7em" height="1.7em" viewBox="0 0 16 16" class="bi bi-person" fill="blackr" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                  </svg>
                </a>
                @else
                <a href="/profile">
                  <svg width="1.7em" height="1.7em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="blackr" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                  </svg>
                </a>
                @endif
              </div>
              <div class="widget_user" id="user">
              </div>
            </div>
            <!-- Cart -->
            <div class="site-header-cart padding_icons">
              <?php
              $totalProducts = 0;
              $totalPrice = 0;
              ?>@if (Session::has('cart_products'))
              @foreach(session()->get('cart_products') as $pid => $product)
              <?php $product = (object) $product;
              $totalPrice = $totalPrice + ($product->price * $product->quantity);
              $totalProducts = $totalProducts + $product->quantity; ?>
              @endforeach
              @endif

              <div class="cart-contents">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-basket2" fill="black" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
                  <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
                </svg>
                <span class="items_in_cart_number_padding" data-amount-value>{{$totalProducts}}</span>
              </div>

              <div class="widget_shopping_cart ">
                <div class="widget_shopping_cart_content" id="shoppingCart">
                  <ul class="woocommerce-mini-cart cart_list product_list_widget ">

                    @if (Session::has('cart_products'))
                    @foreach(session()->get('cart_products') as $product)
                    <?php $product = (object) $product; ?>
                    <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
                      <a class="product-image" href="#">
                        <img src="{{$product->image}}" alt="{{$product->title}}">
                      </a>
                      <a class="product-title" href="{{$product->url}}">
                        {{ $product->title }}</a>
                      <span class="quantity">
                        {{ $product->quantity }} ×
                        <span class="woocommerce-Price-amount amount">
                          {{ number_format($product->price, 0, ',', '.')}} МКД
                        </span>
                      </span>
                      <a href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="remove">
                        <span class="lnr lnr-cross"></span>
                      </a>
                    </li>
                    @endforeach
                    @endif
                  </ul>
                  <p class="woocommerce-mini-cart__total total">
                    <span>Вкупно:</span>
                    <span class="woocommerce-Price-amount amount">
                      {{ number_format($totalPrice,0,',','.') }}
                      МКД
                    </span>
                  </p>
                  <p class="woocommerce-mini-cart__buttons buttons">
                    <a href="/cart" class="button checkout wc-forward au-btn au-btn-black btn-small">Види кошничка</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="canvas canvas-btn-wrap">
              <button class="canvas-images canvas-btn" data-toggle="modal" data-target="#canvasModal">
                <img src="{{url_assets('/luxbox/images/icons/header-icon-3.png')}}" alt="canvas">
              </button>
            </div>
          </div>
        </div>
        <div class="modal fade" id="searchModal" role="dialog">
          <button class="close" type="button" data-dismiss="modal">
            <i class="zmdi zmdi-close"></i>
          </button>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <form id="searchModal__form" method="GET" action="{{route('search')}}">
                  <button id="searchModal__submit" type="submit">
                    <i class="zmdi zmdi-search"></i>
                  </button>
                  <input id="searchModal__input" type="text" name="search" placeholder="Пребарувај ..." />
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="canvasModal" role="dialog">
          <button class="close" type="button" data-dismiss="modal">
            <i class="zmdi zmdi-close"></i>
          </button>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <div class="canvas-content">
                  <div class="logo text-center">
                    <a href="/"><img src="{{url_assets('/luxbox/images/logo/logo.png')}}" alt="logo"></a>
                  </div>
                  <div class="contact">
                    <h4>Контакт</h4>
                    <div class="contact-inner">
                      <i class="zmdi zmdi-phone"></i>
                      <div class="contact-info">
                        <span><a href="tel:+38971384943"> (+389) 71 384 943</a</span> </div> </div> <div class="contact-inner">
                            <i class="zmdi zmdi-email"></i>
                            <div class="contact-info">
                              <span>luxboxmk@gmail.com</span>
                            </div>
                      </div>
                    </div>
                    <h4>Социјални мрежи</h4>
                    <div class="socials">
                      <a href="https://www.facebook.com/Luxbox-110326727242839/"><i class="zmdi zmdi-facebook"></i></a>
                      <a href="https://www.instagram.com/luxbox.mk/"><i class="zmdi zmdi-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Show Mobile Header -->
    <div id="js-navbar-mb-fixed" class="show-mobile-header">
      <!-- Logo And Hamburger Button -->
      <div class="mobile-top-header style-mobile-top-header">
        <div class="logo-mobile">
          <a href="/"><img width="50" src="{{url_assets('/luxbox/images/logo/logo.png')}}" alt="logo"></a>
        </div>

        <div class="cart-contents cart-contents-mobile pull-right">
          <a href="/cart">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-basket2" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z" />
              <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z" />
            </svg>
            <span class="items_in_cart_number_padding" data-amount-value="">0</span>
          </a>
        </div>

      </div>
      <!-- Au Navbar Menu -->
      <div class="au-navbar-mobile style-au-navbar-mobile navbar-mobile-1">
        <div class="au-navbar-menu">
          <ul>
            <li class="drop">
              <a class="drop-link" href="/">
                Почетна

              </a>

            </li>
            @foreach($menuCategories as $mc)
            <li class="drop">
              @if($mc['title']=="Аксесоари")
              <a class="drop-link" href="/naskoro">
                {{ $mc['title'] }}
                @if(isset($mc['children']))
                <span class="arrow">
                  <i class="zmdi zmdi-chevron-down"></i>
                </span>
                @endif
              </a>
              @else
              <a class="drop-link" href="{{route('category', [$mc['id'], $mc['url']])}}">
                {{ $mc['title'] }}
                @if(isset($mc['children']))
                <span class="arrow">
                  <i class="zmdi zmdi-chevron-down"></i>
                </span>
                @endif
              </a>
              @endif

              @if(isset($mc['children']))
              <ul class="drop-menu bottom-right">
                @foreach($mc['children'] as $ch)
                <li><a href="{{route('category', [$ch['id'], $ch['url']])}}">{{ $ch['title'] }}</a></li>
                @endforeach
              </ul>
              @endif
            </li>
            @endforeach
            <li>
              <a href="/po-naracka">Дизајнирај производ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
</header>