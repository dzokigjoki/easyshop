 {{--Side Navigation Menu --}}
<aside class="side-navigation-wrapper enter-right" data-no-scrollbar data-animation="push-in">
    <div class="side-navigation-scroll-pane">
        <div class="side-navigation-inner">
            <div class="side-navigation-header">
                <div class="navigation-hide side-nav-hide">
                    <a href="#">
                        <span class="icon-cancel medium"></span>
                    </a>
                </div>
            </div>
            <nav class="side-navigation">
                <ul style="padding:10px;">
                    <li class="current">
                        <a href="{{route('home')}}">Почетна</a>

                    </li>




                    @foreach($menuCategories as $mc)
                        @if(isset($mc['children']))
                            <li class="parent">
                        @else
                            <li>
                                @endif
                                <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                @if(isset($mc['children']))
                                    <ul class="sub-menu">
                                        @foreach($mc['children'] as $ch)
                                            <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                </ul>
            </nav>
            <nav class="side-navigation nav-block">
                {{--KOSHNICKA--}}
            </nav>
        </div>
    </div>
</aside>
{{-- Side Navigation Menu End --}}

<div class="wrapper">
    <div class="wrapper-inner">

         {{--Header --}}
        <header style="background-color: #202020;" class="header header-fixed  header-transparent" data-bkg-threshold="100"
                data-compact-threshold="100">
            <div class="header-inner">
                <div class="row nav-bar">
                    <div class="column width-12 nav-bar-inner">
                        <div class="logo">
                            <div class="logo-inner">
                                <a href="{{route('home')}}"><img src="https://assets.smartsoft.mk/easyshop/dorikele/images/DK_logoSKRATENO.png"/></a>
                                <a href="{{route('home')}}"><img src="https://assets.smartsoft.mk/easyshop/dorikele/images/DK_logoCELOSNO.png"/></a>
                            </div>
                        </div>
        <nav class="navigation nav-block secondary-navigation nav-right">
                    <ul>
                     <li>

                        {{-- Dropdown Cart Overview --}}
                         
                         <a href="{{route('cart')}}" class="nav-icon cart no-page-fade">
                         <span>
                                              <?php
                             $totalProducts = 0;
                             $totalPrice = 0;
                             ?>@if (Session::has('cart_products'))
                                 @foreach(session()->get('cart_products') as $pid => $product)
                                     <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                 @endforeach
                             @endif
                             <span
                                         class="cart-indication"><span
                                             class="fa fa-shopping-cart"></span> <span class="badge"><i
                                                 style="font-style: normal;"
                                                 data-amount-value>{{$totalProducts}}</i></span></span>
                                    </span>
                         </a>
                         {{--<div id="shoppingCart">--}}
                             @if (Session::has('cart_products'))
                        <ul id="shoppingCart" class="sub-menu custom-content cart-overview">
                            @foreach(session()->get('cart_products') as $product)
                                <?php $product = (object)$product; ?>
                            <li class="cart-item">
                                <a class="product-thumbnail" href="{{$product->url}}">
                                    <img style="height: 37px; width: 34px;" src="{{$product->image}}"/>
                                </a>
                                <div class="product-details">
                                    <a href="{{$product->url}}" class="product-title">
                                        {{$product->title}}
                                    </a>
                                    <span class="product-quantity">x {{$product->quantity}}</span>
                                    <span class="product-price"><span class="currency"></span>{{ number_format($product->price, 0, ',', '.')}} мкд.</span>
                                </div>
                            </li>
                                    <div>
                            @endforeach
                                <?php
                                $totalProducts = 0;
                                $totalPrice = 0;
                                ?>@if (Session::has('cart_products'))
                                    @foreach(session()->get('cart_products') as $pid => $product)
                                        <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                    @endforeach
                                @endif
                                <li class="cart-subtotal">
                                    Вкупно
                                    <span class="amount"><span class="currency"></span><i style="font-style: normal;" data-cart-total-price>{{$totalPrice}}</i> мкд.</span>
                                </li>
                                <li class="cart-actions">
                                    <a href="{{route('cart')}}" class="view-cart mt-10"><button class="prebaraj btn btn-primary">Види кошничка</button></a>
                                </li>
                                    </div>
                        </ul>
                         @else
                                 <ul id="shoppingCart" class="sub-menu custom-content cart-overview">
                                     <li>
                                         <br>
                                         <div class="product-details">
                                             <h5 style="color:#A6A6A6;">Вашата кошничка е празна</h5>
                                         </div>
                                     </li>
                                     <li class="cart-actions">
                                         <br>
                                         <a href="{{route('cart')}}" class="view-cart mt-10"><button class="prebaraj btn btn-primary">Види кошничка</button></a>
                                     </li>
                                 </ul>
                         @endif
                         {{--</div>--}}
                    </li>
                    <li>
                        {{-- Search --}}
                        <a href="#search-modal" data-content="inline" data-toolbar=""
                           data-aux-classes="tml-search-modal" data-modal-mode data-modal-width="1000"
                           data-lightbox-animation="fade" data-nav-exit="false"
                           class="lightbox-link nav-icon">
                            <span class="fa fa-search"></span>
                        </a>
                    </li>
                    <li class="aux-navigation hide">
                        {{-- Aux Navigation --}}
                        <a href="#" class="navigation-show side-nav-show nav-icon">
                            <span class="icon-menu"></span>
                        </a>
                    </li>
                </ul>

        </nav>

                        <nav class="navigation nav-block primary-navigation nav-center">
                            <ul>
                                <li class="current">
                                    <a href="{{route('home')}}">Почетна</a>

                                </li>




                                @foreach($menuCategories as $mc)
                                    @if(isset($mc['children']))
                                        <li class="parent">
                                    @else
                                        <li>
                                            @endif
                                            <a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a>
                                            @if(isset($mc['children']))
                                                <ul class="sub-menu">
                                                    @foreach($mc['children'] as $ch)
                                                        <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- Search Modal End --}}
            <div id="search-modal" class="hide">
                <div class="row">
                    <div class="column width-12 center">
                        <div class="search-form-container site-search">
                            <form method="GET" class="search-form" action="{{route('search')}}"
                                  style="margin-top: 5px;">
                                <div class="row">
                                    <div class="column width-12">
                                        <div class="field-wrapper">
                                            <input tabindex="1" type="text" name="search" class="form-search form-element"
                                                   placeholder="Кликни и внеси текст...">
                                            <span class="border"></span>
                                        </div>
                                    </div>
                                </div>
                                <p style="margin-top: 20px;"></p>
                                <button class="prebaraj btn btn-primary" type="submit" style="color:black;">Пребарај</button></a>
                                <a href="#" class="prebaraj btn btn-primary tml-aux-exit"><button class="prebaraj btn btn-primary" style="color:black;">Затвори</button></a>

                            </form>
                            <div class="form-response"></div>
                        </div>
                         </div>
                </div>
            </div>
            {{-- Search Modal End --}}
        </header>
        {{-- Header End --}}
    </div>
</div>