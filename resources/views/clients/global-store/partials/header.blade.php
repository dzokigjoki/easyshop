<header class="header">
    <div class="hidden-xs header__top">
        <div class="container-fluid">
            <div class="row">
                <div style="width:100%" class="contact-header">
                    <p class="col-lg-2 inline colorLogo"><i class="fa fa-envelope"></i>Е-пошта: <a href="mailto:info@global-store.co">info@global-store.co</a></p>
                    <p class="inline colorLogo col-lg-2">Най-добрите оферти!</p>
                    <p class="inline colorLogo col-lg-2">Купете без риск!</p>
                    <p class="inline colorLogo col-lg-2">Доставка до вашия дом!</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="{{route('home')}}"><img src="/assets/global-store/images/gs-logo.png" alt=""></a></div>
            </div>

            <div class="navigation__column right">
                <div class="ps-cart__toggle hidden-lg hidden-sm hidden-md">
                    <i class="ps-icon-search search-top-button"></i>
                </div>
                <form class="ps-search--header" action="{{route('search')}}" method="get">
                    <input class="form-control" type="text" name="search" placeholder="{{trans('globalstore.search')}}">
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
                                    <?php $vkupno = 0; ?>
                                    @foreach(session()->get('cart_products') as $product)
                                        <?php $product = (object)$product; $vkupnoProdukti += $product->quantity; $vkupno += $product->price * $product->quantity; ?>
                                        <div class="ps-cart-item"><a class="ps-cart-item__close" title="{{trans('globalstore.remove')}} {{$product->title}}" href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif"></a>
                                            <div class="ps-cart-item__thumbnail"><a href="{{$product->url}}"></a><img src="{{$product->image}}" alt=""></div>
                                            <div class="ps-cart-item__content">
                                                <a class="ps-cart-item__title" href="{{$product->url}}">
                                                    {{$product->title}}
                                                    @if(isset($product->variation_value))
                                                        ({{$product->variation_value}})
                                                    @endif
                                                </a>
                                                <p><span>{{trans('globalstore.quantity')}}:<i>{{$product->quantity}}</i></span><span>{{trans('globalstore.total')}}:<i>{{$product->price * $product->quantity}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</i></span></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="ps-cart__total">
                                    <p>{{trans('globalstore.numberOfProducts')}}:<span>{{$vkupnoProdukti}}</span></p>
                                    <p>{{trans('globalstore.totalPrice')}}:<span>{{$vkupno}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span></p>
                                </div>
                                <div class="paddingPC ps-cart__footer"><a class="ps-btn" href="{{route('cart')}}">{{trans('globalstore.gotocart')}}<i class="ps-icon-arrow-left"></i></a></div>
                            @else
                                <p class="prazna">{{trans('globalstore.emptyCart')}}</p>
                            @endif
                        </div>
                     </div>
                </div>
                <div class="menu-toggle"><span></span></div>
            </div>
            <div style="display:none; position: absolute; top: 75px;
        left: -75px; width:100%; z-index: 9999;" class="search-input" tabindex='1' id="searchModal">
                <form method="get" action="{{route('search')}}">
                    <input id="fokus" class="inputce" type="text" placeholder="{{trans('globalstore.search')}}" name="search" value="">
                    {{--<input class="inputce" type="submit" name="submit" value="">--}}
                </form>
            </div>
            <?php
            $navCategories = [];
            if (config( 'app.client') === 'globalstore_mk') {
                $navCategories = $menuCategories[0];
            } else if (config( 'app.client') === 'globalstore_rs') {
                $navCategories = $menuCategories[1];
            } else if (config( 'app.client') === 'globalstore_bg') {
                $navCategories = $menuCategories[2];
            } else if (config( 'app.client') === 'globalstore_hr') {
                $navCategories = $menuCategories[3];
            } else if (config( 'app.client') === 'globalstore_si') {
                $navCategories = $menuCategories[8];
            } else if (config( 'app.client') === 'globalstore_sk') {
                $navCategories = $menuCategories[7];
            } else if (config( 'app.client') === 'globalstore_hu') {
                $navCategories = $menuCategories[4];
            } else if (config( 'app.client') === 'globalstore_pl') {
                $navCategories = $menuCategories[6];
            } else if (config( 'app.client') === 'globalstore_cz') {
                $navCategories = $menuCategories[5];
            } else if (config( 'app.client') === 'globalstore_ro') {
                $navCategories = $menuCategories[9];
            }
            ?>


            <div class="navigation__column center">
                <ul class="main-menu menu">
                    @if($navCategories['children'])
                        @foreach($navCategories['children'] as $mc)
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
                    @endif
                </ul>
            </div>

        </div>
    </nav>
</header>
