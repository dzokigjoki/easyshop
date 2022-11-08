<div class="offcanvas open">
    <div class="offcanvas-wrap">
        <nav class="offcanvas-navbar">
            <ul class="offcanvas-nav">
                <li><a href="{{route('home')}}">Дома</a></li>
                @if(isset($category))
                    @foreach($menuCategories as $mc)
                        @if(isset($mc['children']))
                            @if($category->id == $mc['id'])
                                <li class="selected-small-menu menu-item-has-children dropdown current-menu-ancestor">
                                    <a href="{{route('category',[$mc['id'],$mc['url']])}}" class="dropdown-hover">{{$mc['title']}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($mc['children'] as $ch)
                                            <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="menu-item-has-children dropdown current-menu-ancestor">
                                    <a href="{{route('category',[$mc['id'],$mc['url']])}}" class="dropdown-hover">{{$mc['title']}} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($mc['children'] as $ch)
                                            @if($category->id == $ch['id'])
                                                <li class="selected-small-submenu"><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                            @else
                                                <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @else
                            @if($category->id == $mc['id'])
                                <li class="selected-small-menu"><a href="{{route('category',[$mc['id'],$mc['url']])}}">{{$mc['title']}}</a></li>
                            @else
                                <li><a href="{{route('category',[$mc['id'],$mc['url']])}}">{{$mc['title']}}</a></li>
                            @endif
                        @endif
                    @endforeach
                    {{--<li><a href="{{route('category',[21,'blog'])}}">Совети</a></li>--}}
                @else
                    @foreach($menuCategories as $mc)
                        @if(isset($mc['children']))
                            <li class="menu-item-has-children dropdown current-menu-ancestor">
                                <a href="{{route('category',[$mc['id'],$mc['url']])}}" class="dropdown-hover">{{$mc['title']}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($mc['children'] as $ch)
                                        <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{route('category',[$mc['id'],$mc['url']])}}">{{$mc['title']}}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </nav>
    </div>
</div>

<div class="minicart-side" id="shoppingCart">
    <div class="close-button-side-cart">
        <i class="fa fa-times"></i>
    </div>
    <div class="minicart-side-title">
        <h4>Кошничка</h4>
    </div>
    <div class="minicart-side-content">
        <div class="minicart">
            <?php $vkupnoProdukti = 0; ?>
            @if(Session::has('cart_products'))
                <div class="minicart-body">
                    <?php $vkupno = 0; ?>
                    @foreach(session()->get('cart_products') as $product)
                        <?php $product = (object)$product; $vkupnoProdukti += $product->quantity; ?>
                        <div class="cart-product clearfix">
                            <div class="cart-product-image">
                                <a class="cart-product-img" href="{{$product->url}}">
                                    <img width="300" height="300" src="{{$product->image}}" alt=""/>
                                </a>
                            </div>
                            <div class="cart-product-details">
                                <div class="cart-product-title">
                                    <a href="{{$product->url}}">{{$product->title}}
                                        @if(isset($product->variation_value))
                                            ({{$product->variation_value}})
                                        @endif
                                    </a>
                                </div>
                                <div class="cart-product-quantity-price">
                                    Цена: {{$product->price}} ден. <br>
                                    Количина: {{$product->quantity}}
                                    {{--{{$product->quantity}} x <span class="amount">{{$product->price}} ден.</span>--}}
                                    <?php $vkupno += $product->quantity * $product->price; ?>
                                </div>
                            </div>
                            <a href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif" class="remove" title="Избриши {{$product->title}}"><!--&times;--> <i class="fa fa-trash"></i></a>
                        </div>
                    @endforeach
                </div>
                <div class="minicart-footer">
                    <div class="minicart-total">
                        <strong>
                            Вкупно: <span class="amount">{{$vkupno}} ден.</span>
                        </strong>
                    </div>
                    <div class="minicart-actions clearfix">
                        <a class="viewcart-button button" href="{{route('cart')}}">
                            <span class="text">Види кошничка</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="minicart">
                    <div class="minicart-header no-items show">
                        Вашата кошничка е празна
                    </div>
                    <div class="minicart-footer">
                        <div class="minicart-actions clearfix">
                            <a class="button no-item-button" href="{{route('home')}}">
                                <span class="text">Оди во продавница</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div id="wrapper" class="wide-wrap">
    <header class="header-container header-type-classic header-navbar-classic header-scroll-resize">
        <div class="topbar">
            <div class="container topbar-wap">
                <div class="row">
                    <div class="col-left-topbar">
                        <div class="left-topbar">
                            <a href="{{route('blog',[5,'za-nas'])}}">За Нас</a>
                        </div>
                    </div>
                    <div class="col-left-topbar">
                        <div class="left-topbar">
                            <a href="{{route('blog',[1,'kako-da-naracham?'])}}">Како да нарачам?</a>
                        </div>
                    </div>
                    <div class="col-left-topbar hide-1199">
                        <div class="left-topbar">
                            <a><i class="fa fa-map-marker"></i> Дирекција: ул. 9ти Мај 11</a>
                        </div>
                    </div>
                    <div class="col-left-topbar hide-1199">
                        <div class="left-topbar">
                            <p class="nacin-na-plakjanje-top">Начин на плаќање: <span class="so-border-right"><i class="fa fa-truck"></i> При достава</span> <i class="fa fa-credit-card"></i> Со картичка</p>
                        </div>
                    </div>
                    <div class="col-left-topbar gt">
                        <div class="left-topbar">
                            <div class="translator-wrap">
                                <div id="google_translate_element"></div>
                                <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                        new google.translate.TranslateElement({pageLanguage: 'mk', includedLanguages: 'en,sq', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                    }
                                </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                            </div>
                        </div>
                    </div>
                    <div class="col-left-topbar">
                        <div class="left-topbar">
                            <p>Контакт: <i class="fa fa-phone"></i> <span class="so-border-right"> <a href="tel:0038978808419" class="telefon-topbar">078/808-419</a> </span> <i class="fa fa-envelope"></i> <a href="mailto:info@crystalbella.mk" class="telefon-topbar">info@crystalbella.mk</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-container">
            <div class="navbar navbar-default navbar-scroll-fixed">
                <div class="navbar-default-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="navbar-default-col">
                                <div class="navbar-wrap">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar bar-top"></span>
                                            <span class="icon-bar bar-middle"></span>
                                            <span class="icon-bar bar-bottom"></span>
                                        </button>
                                        <a class="navbar-search-button search-icon-mobile" href="#">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a class="cart-icon-mobile" href="#" id="bag">
                                            <i class="elegant_icon_bag"></i><span data-amount-value="">{{$vkupnoProdukti}}</span>
                                        </a>
                                        <a class="navbar-brand" href="{{route('home')}}">
                                            <img class="logo" alt="WOOW" src="{{ url_assets('/crystal-bella/images/logo-koregirano.jpg') }}">
                                            <img class="logo-fixed" alt="WOOW" src="{{ url_assets('/crystal-bella/images/logo-koregirano.jpg') }}">
                                            <img class="logo-mobile" alt="WOOW" src="{{ url_assets('/crystal-bella/images/logo-koregirano.jpg') }}">
                                        </a>
                                    </div>
                                    <nav class="collapse navbar-collapse primary-navbar-collapse">
                                        <ul class="nav navbar-nav primary-nav">
                                            <li><a href="{{route('home')}}"><span class="underline">Дома</span></a></li>
                                            @if(isset($category))
                                                @foreach($menuCategories as $mc)
                                                    @if(isset($mc['children']))
                                                        @if($category->id == $mc['id'])
                                                            <li class="selected-big-menu current-menu-item menu-item-has-children dropdown">
                                                                <a href="{{route('category',[$mc['id'],$mc['url']])}}" class="dropdown-hover">
                                                                    <span class="underline">{{$mc['title']}}</span> <span class="caret"></span>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    @foreach($mc['children'] as $ch)
                                                                        <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @else
                                                            <li class="current-menu-item menu-item-has-children dropdown">
                                                                <a href="{{route('category',[$mc['id'],$mc['url']])}}" class="dropdown-hover">
                                                                    <span class="underline">{{$mc['title']}}</span> <span class="caret"></span>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    @foreach($mc['children'] as $ch)
                                                                        @if($ch['id'] == $category->id)
                                                                            <li class="selected-big-submenu"><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                                                        @else
                                                                            <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endif
                                                    @else
                                                        @if($category->id == $mc['id'])
                                                            <li class="selected-big-menu"><a href="{{route('category',[$mc['id'],$mc['url']])}}"><span class="underline">{{$mc['title']}}</span></a></li>
                                                        @else
                                                            <li><a href="{{route('category',[$mc['id'],$mc['url']])}}"><span class="underline">{{$mc['title']}}</span></a></li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                {{--<li><a href="{{route('category',[21,'blog'])}}"><span class="underline">Совети</span></a></li>--}}
                                            @else
                                                @foreach($menuCategories as $mc)
                                                    @if(isset($mc['children']))
                                                        <li class="current-menu-item menu-item-has-children dropdown">
                                                            <a href="{{route('category',[$mc['id'],$mc['url']])}}" class="dropdown-hover">
                                                                <span class="underline">{{$mc['title']}}</span> <span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                @foreach($mc['children'] as $ch)
                                                                    <li><a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li><a href="{{route('category',[$mc['id'],$mc['url']])}}"><span class="underline">{{$mc['title']}}</span></a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </nav>
                                    <div class="header-right">
                                        <div class="pecat-container">
                                            <img src="{{ url_assets('/crystal-bella/images/logobelo.png') }}" class="img-responsive"/>
                                        </div>
                                        <div class="navbar-search">
                                            <a class="navbar-search-button" href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <div class="search-form-wrap show-popup hide"></div>
                                        </div>
                                        <div class="navbar-minicart navbar-minicart-topbar">
                                            <div class="navbar-minicart">
                                                <a class="minicart-link" href="#">
                                                    <span class="minicart-icon">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span data-amount-value="">{{$vkupnoProdukti}}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-search-overlay hide">
                    <div class="container">
                        <div class="header-search-overlay-wrap">
                            <form class="searchform" action="{{route('search')}}">
                                <input type="search" class="searchinput" name="search" autocomplete="off" value="" placeholder="Пребарувајте продукти..."/>
                            </form>
                            <button type="button" class="close">
                                <i aria-hidden="true" class="fa fa-times"></i>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>