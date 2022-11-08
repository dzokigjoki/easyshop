<header class="header-v2">
    <div class="container-menu-desktop">
        @if(Request::segment(1) != '')
            <div class="wrap-menu-desktop" style="background-color: rgba(34,34,34,0.9);">
                @else
                    <div class="wrap-menu-desktop">
                        @endif
                        <nav class="limiter-menu-desktop">
                            <div class="left-header">
                                <!-- Logo desktop -->
                                <div class="logo">
                                    <a href="{{route('home')}}"><img src="{{ url_assets('/bloomtea/images/bloom-logo.png') }}" alt="IMG-LOGO"></a>
                                </div>
                            </div>

                            <div class="center-header">
                                <!-- Menu desktop -->
                                <div class="menu-desktop">
                                    <ul class="main-menu">
                                        <li><a href="{{route('home')}}">Почетна</a></li>
                                        @foreach($menuCategories as $item)
                                            <li>
                                                @if($item['id']===5)
                                                    <a href="{{route('blog', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                                @else

                                                    @if($item['id']===1)
                                                        <a href="{{route('product',[1,'super-green-detox-tea'])}}">Чаеви</a>
                                                    @else
                                                        <a href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                                        @if(isset($item['children']))
                                                            <ul class="sub-menu">
                                                                @foreach($item['children'] as $subItem)
                                                                    <li class="yamm-content">
                                                                        <a href="{{route('category', [$subItem['id'], $subItem['url']])}}">
                                                                            {{$subItem['title']}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    @endif
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            <div class="right-header">
                                <!-- Icon header -->
                                <?php
                                $totalProducts = 0;
                                $totalPrice = 0;?>



                                @if (Session::has('cart_products'))
                                    @foreach(session()->get('cart_products') as $pid => $product)
                                        <?php
                                        $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity);
                                        $totalProducts = $totalProducts + $product->quantity; ?>
                                    @endforeach
                                @endif

                                <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click p-t-8">
                                    <div class="h-full flex-m">
                                        <div class="wrap-cart-header h-full flex-m m-l-10 menu-click">
                                            <div class="icon-header-item flex-c-m trans-04 icon-header-noti"
                                                 id="">
                                                <img src="{{ url_assets('/bloomtea/images/icon-cart-3.png') }}" alt="CART">
                                            </div>
                                            <span data-amount-value id="totalProd">{{$totalProducts}}</span>
                                            @if (Session::has('cart_products'))
                                                <div class="cart-header menu-click-child trans-04" id="shoppingCart">
                                                    <div class="bo-b-1 bocl15">
                                                        <div class="size-h-2 js-pscroll m-r--15 p-r-15">
                                                            <!-- cart header item -->
                                                            @foreach(session()->get('cart_products') as $product)
                                                                <?php $product = (object)$product; ?>
                                                                <div class="flex-w flex-str m-b-25">
                                                                    <div class="size-w-15 flex-w flex-t">
                                                                        <a href="{{route('product',[$product->id,$product->url])}}"
                                                                           class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                                                            <img src="{{$product->image}}"
                                                                                 alt="PRODUCT">
                                                                        </a>

                                                                        <div class="size-w-17 flex-col-l">
                                                                            <a href="{{route('product',[$product->id,$product->url])}}"
                                                                               class="txt-s-108 cl3 hov-cl10 trans-04 limit-text">
                                                                                {{$product->title}}
                                                                            </a>
                                                                            <span class="txt-s-101 cl9">{{$product->price}} ден.</span>

                                                                            <span class="txt-s-109 cl12">
                                                                            x{{$product->quantity}}
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="size-w-14 flex-b">
                                                                        <a  href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="lh-10">
                                                                            <img src="{{ url_assets('/bloomtea/images/icon-close.png') }}"
                                                                                 alt="CLOSE">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            {{--@endif--}}
                                                        </div>
                                                    </div>

                                                    <div class="flex-w flex-sb-m p-b-31">
                                           <span class="txt-m-111 cl10">
							                    <?php $totalProducts = 0;
                                               $totalPrice = 0;
                                               ?>@if (Session::has('cart_products'))
                                                   @foreach(session()->get('cart_products') as $pid => $product)
                                                       <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                                   @endforeach
                                               @endif
                                               {{--                                               {{$totalPrice}} ден.--}}
							            </span>
                                                        <span class="txt-m-103 cl3 p-r-20">
											Вкупно:
										</span>

                                                        <span class="txt-m-111 cl10" data-cart-total-price>
											{{$totalPrice}} ден.
										</span>
                                                    </div>

                                                    <a href="{{URL::to('/cart')}}"
                                                       class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                                        Види кошничка
                                                    </a>
                                                </div>

                                            @else
                                                <div class="cart-header menu-click-child trans-04" id="shoppingCart">
                                                    <div class="bo-b-1 bocl15">
                                                        <div class="size-h-2 js-pscroll m-r--15 p-r-15">
                                                            <!-- cart header item -->
                                                            <span>Вашата кошничка е празна</span>
                                                        </div>
                                                    </div>

                                                    <div class="flex-w flex-sb-m p-b-31">
                                           <span class="txt-m-111 cl10">
							                    <?php $totalProducts = 0;
                                               $totalPrice = 0;
                                               ?>@if (Session::has('cart_products'))
                                                   @foreach(session()->get('cart_products') as $pid => $product)
                                                       <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                                   @endforeach
                                               @endif
                                               {{--                                               {{$totalPrice}} ден.--}}
							            </span>

                                                        @if(Session::has('cart_products'))
                                                            <span class="txt-m-103 cl3 p-r-20">
											Вкупно:
										</span>

                                                            <span class="txt-m-111 cl10" data-cart-total-price>
											{{$totalPrice}} ден.
										</span>
                                                    </div>

                                                    <a href="{{URL::to('/cart')}}"
                                                       class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                                        Види кошничка
                                                    </a>
                                                </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </nav>
                    </div>
            </div>

            <!-- Header Mobile -->
            <div class="wrap-header-mobile">
                <!-- Logo moblie -->
                <div class="logo-mobile">
                    <a href="{{route('home')}}"><img src="{{ url_assets('/bloomtea/images/bloom-logo-square.png') }}" alt="BloomTea"></a>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
                    {{--<div class="h-full flex-m">--}}
                    {{--<div class="icon-header-item flex-c-m trans-04 js-show-modal-search">--}}
                    {{--<img src="/assets/bloomtea/images/icon-search.png" alt="SEARCH">--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <?php
                    $totalProducts = 0;
                    $totalPrice = 0;
                    ?>@if (Session::has('cart_products'))
                        @foreach(session()->get('cart_products') as $pid => $product)
                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                        @endforeach
                    @endif

                    <div class="wrap-cart-header h-full flex-m m-l-5 menu-click">
                        <div class="icon-header-item flex-c-m trans-04 icon-header-noti">
                            <img src="{{ url_assets('/bloomtea/images/icon-cart-2.png') }}" alt="CART">
                            <span data-amount-value id="totalProdMob">{{$totalProducts}}</span>
                        </div>

                        <div class="cart-header menu-click-child trans-04" >
                            <div class="bo-b-1 bocl15" id="shoppingCart">
                                <!-- cart header item -->
                                @if (Session::has('cart_products'))
                                    @foreach(session()->get('cart_products') as $product)

                                        <?php $product = (object)$product; ?>
                                        <div class="flex-w flex-str m-b-25">

                                            <div class="size-w-15 flex-w flex-t">
                                                <a href="{{route('product',[$product->id,$product->url])}}"
                                                   class="wrap-pic-w bo-all-1 bocl12 size-w-16 hov3 trans-04 m-r-14">
                                                    <img src="{{$product->image}}" alt="PRODUCT">
                                                </a>

                                                <div class="size-w-17 flex-col-l">
                                                    <a href="product-single.html"
                                                       class="txt-s-108 cl3 hov-cl10 trans-04">
                                                        {{$product->title}}
                                                    </a>

                                                    <span class="txt-s-101 cl9">
											{{$product->price}} ден.
										</span>

                                                    <span class="txt-s-109 cl12">
											x{{$product->quantity}}
										</span>
                                                </div>
                                            </div>

                                            <div class="size-w-14 flex-b">
                                                <a  href="{{URL::to('cart/remove/')}}/{{$product->id}}" class="lh-10">
                                                    <img src="{{ url_assets('/bloomtea/images/icon-close.png') }}" alt="CLOSE">
                                                </a>
                                            </div>
                                        </div>
                                @endforeach
                            @endif

                            <!-- cart header item -->
                            </div>


                            <div class="flex-w flex-sb-m p-b-31">
							<span class="txt-m-103 cl3 p-r-20">
								Вкупно:
							</span>


                                <span data-cart-total-price class="txt-m-111 cl10">
                            {{$totalPrice}} ден.
							</span>
                            </div>

                            <a href="{{URL::to('/cart')}}"
                               class="flex-c-m size-a-8 bg10 txt-s-105 cl13 hov-btn2 trans-04">
                                Види кошничка
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Button show menu -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
                </div>
            </div>


            <!-- Menu Mobile -->
            <div class="menu-mobile">
                <ul class="main-menu-m">
                    <li>
                        <a href="{{route('home')}}">Дома</a>
                    </li>
                    @foreach($menuCategories as $mc)
                        <li>
                            @if($mc['id'] === 5)
                                <a href="{{route('blog', [$mc['id'], $mc['url'], 1])}}">{{$mc['title']}}</a>
                            @elseif ($mc['id'] === 1)
                                <a href="{{route('product',[1,'super-green-detox-tea'])}}">Чаеви</a>
                            @else
                                <a href="{{route('category', [$mc['id'], $mc['url'], 1])}}">{{$mc['title']}}</a>
                            @endif
                            @if (isset($item['children']))
                                <ul class="sub-menu-m">
                                    @foreach($mc['children'] as $ch)

                                        <li>
                                            <a href="{{route('category', [$ch['id'], $ch['url']])}}">{{$ch['title']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
                        </li>
                    @endforeach

                </ul>
            </div>
    </div>
</header>