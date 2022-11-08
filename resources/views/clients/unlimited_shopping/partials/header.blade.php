<style>
    .navigation__column.center {
        margin-top: 20px;
    }
</style>

<header class="header">
    <div class="hidden-xs header__top">
        <div class="container-fluid">
            <div class="row">
                <div style="width:100%" class="contact-header">
                    <p class="col-lg-2 inline colorLogo"><i class="fa fa-envelope"></i>Е-пошта: <a href="mailto:info@unlimitedshopping.mk">info@unlimitedshopping.mk</a></p>
                    <p class="inline colorLogo col-lg-2">Најдобри понуди!</p>
                    <p class="inline colorLogo col-lg-2">Купувајте без ризик!</p>
                    <p class="inline colorLogo col-lg-2">Достава до вашиот дом!</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="{{route('home')}}"><img src="{{url_assets('/unlimited_shopping/images/logo.png')}}" alt="Unlimited Shopping"></a></div>
            </div>

            <div class="navigation__column right">
                <div class="ps-cart__toggle hidden-lg hidden-sm hidden-md">
                    <i class="ps-icon-search search-top-button"></i>
                </div>
                <form class="ps-search--header" action="{{route('search')}}" method="get">
                    <input class="form-control" type="text" name="search" placeholder="Пребарај">
                    <button><i class="ps-icon-search"></i></button>
                </form>
                <?php $vkupnoProdukti = 0; ?>
                <?php
                    $tmp = 0;
                    if(Session::has('cart_products')) {
                        foreach (session()->get('cart_products') as $prod) {
                            $prod = (object)$prod;
                            $tmp += $prod->quantity;
                        }
                    }
                ?>
                <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span><i data-amount-value="">{{$tmp}}</i></span><i class="ps-icon-shopping-cart"></i></a>
                     <div id="shoppingCart" class="minicart-side">
                        <div class="ps-cart__listing">
                            @if(Session::has('cart_products'))
                                <div class="ps-cart__content">
                                    <?php $vkupno = 0; $vkupnoProdukti = 0;?>
                                    @foreach(session()->get('cart_products') as $product)
                                        <?php $product = (object)$product; $vkupnoProdukti += $product->quantity; $vkupno += $product->price * $product->quantity; ?>
                                        <div class="ps-cart-item"><a class="ps-cart-item__close" title="Избриши {{$product->title}}" href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif"></a>
                                            <div class="ps-cart-item__thumbnail"><a href="{{$product->url}}"></a><img src="{{$product->image}}" alt=""></div>
                                            <div class="ps-cart-item__content">
                                                <a class="ps-cart-item__title" href="{{$product->url}}">
                                                    {{$product->title}}
                                                    @if(isset($product->variation_value))
                                                        ({{$product->variation_value}})
                                                    @endif
                                                </a>
                                                <p><span>Количина:<i>{{$product->quantity}}</i></span><span>Вкупно:<i>
                                                    
                                                    {{number_format($product->price * $product->quantity)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                    
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="ps-cart__total">
                                    <p>Вкупно продукти:<span>{{$vkupnoProdukti}}</span></p>
                                    <p>Вкупно:<span>
                                        {{number_format($vkupno)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}    
                                    </span></p>
                                </div>
                                <div class="paddingPC ps-cart__footer"><a class="ps-btn" href="{{route('cart')}}">Кошничка<i class="ps-icon-arrow-left"></i></a></div>
                            @else
                                <p class="prazna">Вашата кошничка е празна!</p>
                            @endif
                        </div>
                     </div>
                </div>
                <div class="menu-toggle"><span></span></div>
            </div>
            <div style="display:none; position: absolute; top: 75px;
        left: -75px; width:100%; z-index: 9999;" class="search-input" tabindex='1' id="searchModal">
                <form method="get" action="{{route('search')}}">
                    <input id="fokus" class="inputce" type="text" placeholder="Пребарај" name="search" value="">
                    {{--<input class="inputce" type="submit" name="submit" value="">--}}
                </form>
            </div>
           


            <div class="navigation__column center">
                <ul class="main-menu menu">
                        @foreach($menuCategories as $mc)
                            @if(isset($mc['children']))
                                <li class="menu-item menu-item-has-children dropdown">
                                    <a href="{{route('category', [$mc['id'], $mc['url']])}}" {{ url()->current() == route('category', [$mc['id'], $mc['url']]) ? 'class="selected-item"' : ''  }}>
                                        {{$mc['title']}}
                                    </a>
                                    <ul class="sub-menu">
                                        @foreach($mc['children'] as $ch)
                                            <li class="menu-item">
                                                <a href="{{route('category',[$ch['id'],$ch['url']])}}" {{ url()->current() == route('category', [$ch['id'], $ch['url']]) ? 'class="selected-item"' : ''  }}>
                                                    {{$ch['title']}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="menu-item"><a href="{{route('category', [$mc['id'], $mc['url']])}}">{{$mc['title']}}</a></li>
                            @endif
                        @endforeach
                </ul>
            </div>

        </div>
    </nav>
</header>
