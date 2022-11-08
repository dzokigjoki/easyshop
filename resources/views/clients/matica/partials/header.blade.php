<style>
  .loggedUser {
    padding: 4px;
    border-radius: 50%;
    background: white;
    color: #293133;
    font-weight: bold;
    padding-right: 8px;
  }

  .color-red {
    color: red !important;
  }

  .flexEnd {
    display: flex;
    align-items: center;
    justify-content: flex-end;
  }
</style>
<header class="version_1">
  <div class="layer"></div><!-- Mobile menu overlay mask -->
  <div class="main_header">
    <div class="container">
      <div class="row small-gutters">
        <div class="col-xl-2 col-lg-2 d-lg-flex align-items-center">
          <div id="logo">
            <a href="/"><img src="{{url_assets('/matica/logo.png')}}" width="100"></a>
          </div>
        </div>
        <nav class="col-xl-4 col-lg-4">
          <a class="open_close" href="javascript:void(0);">
            <div class="hamburger hamburger--spin">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
          </a>
          <!-- Mobile menu button -->
          <div class="main-menu">
            <div id="header_menu">
              <a href="/"><img src="{{url_assets('/matica/logo-crno.png')}}" width="100"></a>
              <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
            </div>
            <ul>
              <li class="megamenu submenu">
                <a href="javascript:void(0);" class="show-submenu-mega">Книги</a>
                <div class="menu-wrapper">
                  <?php $menuCategoriesChunked = array_chunk($menuCategories, ceil(count($menuCategories) / 3)) ?>
                  <div class="row small-gutters">
                    <h6 class="col-12">
                      <a href="{{route('category', [28, 'site-knigi'])}}">Сите книги</a>
                    </h6>
                    @foreach ($menuCategoriesChunked as $menuCategory)
                    <div class="col-lg-4">
                      <ul>
                        @foreach($menuCategory as $mc)
                        <li>
                          <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                    @endforeach
                  </div>
                  <!-- /row -->
                </div>
                <!-- /menu-wrapper -->
              </li>
              <li>
                <a href="{{ route('category', [34, 'promocii']) }}">Промоции</a>
              </li>
              <li>
                <a href="{{ route('category', [41, 'top-lista']) }}">Топ Листа</a>
              </li>
              <li>
                <a href="{{ route('blog.all') }}">#Bukmarker</a>
              </li>
            </ul>
          </div>
          <!--/main-menu -->
        </nav>
        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-lg-block">
          <div class="custom-search-input">
            <form method="GET" action="{{route('search')}}" autocomplete="off">
              {{-- @if(isset($search))
              <input type="hidden" data-manufacturer name="search_manufacturer" value="{{ isset($search_manufacturer) ? $search_manufacturer : '' }}"
              />
              <input type="hidden" data-sort-by name="sort_by" value="{{ isset($order_by) ? $order_by : '' }}" />
              <input type="hidden" data-order-by name="results_limit"
                value="{{ isset($results_limit) ? $results_limit : '' }}" />
              @endif --}}
              <input type="text" placeholder="Пребарувај книги" name="search" />
              <button type="submit"><i class="header-icon_search_custom"></i></button>
            </form>
          </div>
        </div>
        {{-- <div class="col-xl-2 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
          <a class="phone_top" href="tel:0038923221138"><strong><span>Контакт телефон:</span>02 3 22 11 38</strong></a>
        </div> --}}
        <?php
        $totalProducts = 0;
        if (\Session::has('cart_products')) {
          foreach (session()->get('cart_products') as $product) {
            $product = (object)$product;
            $totalProducts = $totalProducts + $product->quantity;
          }
        }
        ?>
        <ul class="flexEnd top_tools col-xl-3 col-lg-3">
          <li>
            <div class="dropdown dropdown-access">
              @if(auth()->check())
              <?php
                $first_name = explode(' ', auth()->user()->first_name);
                $last_name = explode(' ', auth()->user()->last_name);
                $initials = strtoupper(substr($first_name[0], 0, 2) . substr($last_name[0], 0, 2));
                ?>
              <a class=""><i class="loggedUser">{{ $initials }}</i></a>
              @else
              <a href="/login" class="access_link"><span>Акаунт</span></a>
              @endif
              <div style="padding-top: 0px !important;" class="dropdown-menu">
                @if(auth()->check())
                <ul>
                  <li>
                    <a class="profileDropdown" href="{{route('order.history')}}"><i class="ti-package"></i>Моите
                      нарачки</a>
                  </li>
                  <li>
                    <a class="profileDropdown" href="{{route('profiles.get')}}"><i class="ti-user"></i>Мојот профил</a>
                  </li>
                  <li><a class="profileDropdown" href="{{route('auth.logout.get')}}">Одјава</a></li>
                </ul>
                @else
                <a href="/login" style="margin: 10px 0;" class="btn_1">Најава / Регистрација</a>
                @endif
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown dropdown-cart">
              <a href="{{URL::to('/cart')}}" class="cart_bt"><strong data-amount-value>{{ $totalProducts }}</strong></a>
              <div class="dropdown-menu" id="shoppingCart">
                @include('clients.matica.cart-partial')
              </div>
            </div>
            <!-- /dropdown-cart-->
          </li>
          @if(auth()->user())
          <li>
            <a href="/wishlist" class="wishlist"></a>
          </li>
          @endif
          <li class="d-block d-lg-none d-xl-none">
            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
          </li>
        </ul>
      </div>
      <!-- /row -->
    </div>
  </div>
  <!-- /main_header -->

  <div class="main_nav inner Sticky d-none">
    <div class="search_mob_wp row">
      <div class="custom-search-input">
        <form method="GET" action="{{route('search')}}" autocomplete="off">
          {{-- @if(isset($search))
              <input type="hidden" data-manufacturer name="search_manufacturer" value="{{ isset($search_manufacturer) ? $search_manufacturer : '' }}"
          />
          <input type="hidden" data-sort-by name="sort_by" value="{{ isset($order_by) ? $order_by : '' }}" />
          <input type="hidden" data-order-by name="results_limit"
            value="{{ isset($results_limit) ? $results_limit : '' }}" />
          @endif --}}
          <input type="text" placeholder="Пребарувај книги" name="search" />
          <button type="submit"><i class="header-icon_search_custom"></i></button>
        </form>
      </div>
    </div>
    <!-- /search_mobile -->
  </div>


</header>
<!-- /header -->