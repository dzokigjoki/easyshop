<header id="navbar-spy" class="header header-topbar header-transparent header-fixed">
        <div id="top-bar" class="top-bar">
        <div class="container">
            <div class="bottom-bar-border">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 top--contact hidden-xs">
                        <ul class="list-inline mb-0 ">
                            <li>
                                <i class="lnr lnr-clock"></i><span>Mon - Fri  9.00 : 17.00</span>
                            </li>
                            <li>
                                <i class="lnr lnr-phone-handset"></i> <span>(04) 491 570 110</span>
                            </li>
                        </ul>
                    </div><!-- .col-md-6 end -->
                    <div class="col-xs-12 col-sm-6 col-md-6 top--info text-right text-center-xs">
                        {{-- <span class="top--login"><i class="lnr lnr-exit"></i><a href="#">Login</a> / <a href="#">Register</a></span> --}}
                        <span class="top--social">
                            <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
                        <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                        </span>
                    </div><!-- .col-md-6 end -->
                </div>
            </div>
        </div>
    </div>
        <nav id="primary-menu" class="navbar navbar-fixed-top">
            <div class="container">
                <div class="">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="/">
                        <img class="logo-light" src="{{ url_assets('/barber_shop/images/logo/logo-light.png')}}" alt="Hairy Logo">
                        <img class="logo-dark" src="{{ url_assets('/barber_shop/images/logo/logo-light.png')}}" alt="Hairy Logo">
                    </a>
                </div>
                
                <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                    <ul class="nav navbar-nav nav-pos-right nav-bordered-right snavbar-left">
                        <li class="has-dropdown active"><a href="/">Почетна</a></li>
                        @foreach($menuCategories as $mc)
                            @if(isset($mc['children']))
                                <li class="has-dropdown active">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">{{$mc['title']}} </a>
                                    <ul class="dropdown-menu">
                                        @if(isset($mc['children']))
                                            @foreach($mc['children'] as $ch)
                                                <li>
                                                    <a href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}}</a>
                                                </li>
                                             @endforeach
                                        @endif

                                    </ul>
                                </li>
                                @else
                                    <li>
                                        <a href="{{route('category', [$mc['id'], $mc['url']])}}">
                                            {{$mc['title']}}
                                        </a>
                                    </li>
                            @endif
                        @endforeach
                    </ul>

    <div class="module module-cart pull-left">
        <span>
            <?php
            $totalProducts = 0;
            $totalPrice = 0;
            ?>@if (Session::has('cart_products'))
                @foreach(session()->get('cart_products') as $pid => $product)
                    <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                @endforeach
            @endif
        </span>
        <div class="module-icon cart-icon">
            <i class="lnr lnr-store"></i>
            <span class="title">shop cart</span>
            <label class="module-label">{{ $totalProducts }}</label>
        </div>
       
        <div class="module-content module-box cart-box">
            <div class="cart-overview">
                @if (Session::has('cart_products'))
                    <ul class="list-unstyled">
                        @foreach(session()->get('cart_products') as $product)
                            <li>
                                <?php $product = (object)$product; ?>
                                <a href="{{$product->url}}">
                                    <img class="img-responsive" src="{{$product->image}}" alt="product"/>
                                </a>
                                <div class="product-meta">
                                    <h5 class="product-title"><a href="{{$product->url}}">{{$product->title}}</a></h5>
                                    <p class="product-price">{{ number_format($product->price, 0, ',', '.')}}ден. x {{$product->quantity}} </p>
                                    {{-- <div class="quantity">Количина: {{$product->quantity}}</div> --}}
                                </div>
                                <a class="cart-cancel" href="{{URL::to('cart/remove/')}}/{{$product->id}}@if($product->variation)/{{$product->variation}}@endif">cancel</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div id="shoppingCart">
                        <div class="hover-cart">
                            <div class="hover-box">
                                <br>
                                <div class="subtotal">
                                    Вашата кошничка е празна!
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="cart-total">
                <div class="total-desc">
                    Вкупно:
                </div>
                <div class="total-price">
                        {{number_format($totalPrice, 0, ',', '.')}} ден.
                </div>
            </div>
            <div class="clearfix">
            </div>
            <div class="cart--control">
                <a class="btn btn--primary btn--bordered btn--rounded btn--block" href="{{route('cart')}}">Види кошничка</a>
            </div>
        </div>
    </div>
    <!-- .module-cart end -->
                    <!-- Module Search -->
    <div class="module module-search pull-left">
        <div class="module-icon search-icon">
            <i class="lnr lnr-magnifier"></i>
            <span class="title">search</span>
        </div>
        <div class="module-content module-fullscreen module--search-box">
            <div class="pos-vertical-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                            <form action="{{route('search')}}" class="form-search">
                                <input type="text" class="form-control"  placeholder="Внеси збор..." search-input name="search" >
                                <button class="btn" type="button"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a class="module-cancel" href="#"><i class="lnr lnr-cross"></i></a>
        </div>
    </div>
    <!-- .module-search end -->
                    <!-- Module Cart -->
                    <div class="module module-cart pull-left">
                        <div class="module-icon">
                            <a class="btn btn--white btn--bordered btn--rounded" href="/contact">Закажи термин</a>
                        </div>
                    </div>
                    <!-- .module-cart end -->
                </div>
                <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
    
    </header>