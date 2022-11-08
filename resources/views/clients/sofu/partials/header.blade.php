<!-- @if(Route::currentRouteName()=='home' )
<div class="row row_news">
   <div class="col-12 text-center">
      <a href="#">Новости и попусти во оваа секција</a>
   </div>
</div>
@endif -->
<header id="header1" class="header header-v1">

   <div class="main-header">

      <div class="logo"><a href="/"><img class="logo_header" src="{{ url_assets('/sofu/images/logo.png') }}" alt="logo" /></a></div>
      <div class="header-right">
         <a href="#" class="button-toggle toggle-mainmenu" data-toggle="nr-mainmenu">
            <div class="nr-menu-bar">
               <span class="menu-bar"></span>
               <span class="menu-bar"></span>
               <span class="menu-bar"></span>
            </div>
            <span class="icon icon-arrows-slim-up"></span>
         </a>
         <a href="" class="button-toggle toggle-cart" data-toggle="nr-cart-header">
            <div class="cart-number">
               <span class="icon icon-ecommerce-bag"></span>
               <?php
               $sessionProducts = session('cart_products');

               if (isset($sessionProducts)) {
                  $total = count(session('cart_products'));
               } else {
                  $total = 0;
               }
               ?>
               <span class="number-cart" data-amount-value>{{$total}}</span>
            </div>
            <span class="icon icon-arrows-slim-up"></span>
         </a>
         <a href="#" class="button-toggle toggle-loginform" data-toggle="nr-account">
            <span class="icon icon-software-layers2"></span>
            <span class="icon icon-arrows-slim-up"></span>
         </a>
         <a href="#" class="button-toggle toggle-searchform" data-toggle="nr-search-head">
            <span class="icon icon-basic-magnifier"></span>
            <span class="icon icon-arrows-slim-up"></span>
         </a>
         <nav class="navigation-north-2">
            <ul>
               <li>
                  <a href="/" title="">Почетна</a>

               </li>
               @foreach ($menuCategories as $menuCategory)
               <li @if(isset($menuCategory['children'])) class="menu-item-has-children" @endif>
                  <a href="{{route('category', [$menuCategory['id'], $menuCategory['url']])}}">{{ $menuCategory['title'] }}</a>
                  @if(isset($menuCategory['children']))
                  <ul class="sub-menu">
                  @foreach($menuCategory['children'] as $ch)
                     <li><a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a></li>
                     @endforeach
                  </ul>
                  @endif
               </li>
               @endforeach
               <li>
                  <a href="/dizajniraj">По нарачка</a>
               </li>
               <li>
                  <a href="/za-nas">За нас</a>
               </li>
               <li>
                  <a href="/kontakt">Контакт</a>
               </li>
            </ul>
         </nav>
      </div>
   </div>
   <!-- /.main-header -->
   <div class="toggle-header">
      <div id="nr-account" class="nr-account fullheight not-logged-in">
         <div class="ts-my-account">
            <div class="inner-my-acount">
               <div class="ts-login-form ts-my-account-form show slide">
                  <div class="inner-login">
                     @if(!(auth()->check()))
                     @include('clients.'.config( 'app.client').'.partials.errors')
                     <span class="title">Најави се</span>
                     <form method="POST" action="{{route('auth.login.post')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                           <label for="username">Е-Пошта * </label>
                           <input type="email" name="email" style="background: #262626" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="password">Лозинка * </label>
                           <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button>Најава</button>
                        <div class="bottom-login pt_15">
                           <div class="checkbox-remember">
                              <input type="checkbox">Запомни ме
                           </div>
                           <a href="{{ route('auth.email_password.get') }}" style="color: red;">Заборавена лозинка ?</a>
                        </div>

                     </form>
                     <a href="{{route('auth.register.get')}}" class="ts-register">Регистрација</a>
                     @else
                     <?php
                     $first_name = auth()->user()->first_name;
                     $last_name = auth()->user()->last_name;
                     ?>
                     <span class="title text-center">Здраво {{$first_name}} {{$last_name}}</span>
                     <a href="/profile" class="ts-register">Мој профил</a>
                     <a href="{{route('auth.logout.get')}}" class="ts-register">Одјава</a>
                     @endif
                  </div>
               </div>
               <!-- /.ts-login-form -->
               <!-- /ts-register-form -->
            </div>
            <!-- /.inner-my-acount -->
         </div>
         <!-- /.ts-my-account -->
      </div>
      <!-- /.content-inner -->
      <div id="nr-search-head" class="nr-search-head fullheight just-hidden search_visibillity">
         <div class="ts-serch-inner">
            <form class="ts-search-form search-form" method="get" action="{{route('search')}}">
               <input type="search" value="" placeholder="Пребарувај..." class="search" name="search">
               <span><button type="submit" class="search-submit"><i class="icon icon-arrows-slide-right2"></i></button></span>
            </form>
         </div>
      </div>
      <div id="nr-mainmenu" class="nr-mainmenu fullheight">
         <div class="ts-mainmenu-inner">
            <nav class="navigation-north">
               <div class="toggle-dropdown-menu">
                  <ul>
                     <li>
                        <a href="/" title="">Почетна</a>
                     </li>
                     @foreach ($menuCategories as $menuCategory)
                     <li @if(isset($menuCategory['children'])) class="lever0 item-toggle-dropdown has-sub" @endif>
                        <a href="{{route('category', [$menuCategory['id'], $menuCategory['url']])}}">{{ $menuCategory['title'] }}</a>
                        @if(isset($menuCategory['children']))
                        <div class="item-toggle-menu">
                           <ul class="sub-menu">
                              @foreach($menuCategory['children'] as $ch)
                              <li><a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a></li>
                              @endforeach
                           </ul>
                        </div>
                        @endif
                     </li>
                     @endforeach
                     <li>
                        <a href="/dizajniraj">По нарачка</a>
                     </li>
                     <li>
                        <a href="/za-nas">За нас</a>
                     </li>
                     <li>
                        <a href="/kontakt">Контакт</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
         <!-- /.ts-mainmenu-inner -->
      </div>
      <!-- /nr-mainmenu -->
      <div id="nr-cart-header" @if (!((Session::has('cart_products') && count(session()->get('cart_products'))>0))) class="nr-cart-header fullheight empty_120""
         @else
         class="nr-cart-header fullheight"
         @endif>
         <div id="shoppingCart" class="widget shoping-cart-widget">
            @include('clients.sofu.cart-partial')
         </div>
      </div>
   </div>
   <!-- /.toggle-header -->
</header>