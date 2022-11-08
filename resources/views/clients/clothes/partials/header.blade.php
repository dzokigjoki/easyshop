<style>
    .caps-header{
        text-transform: uppercase;
        font-weight: bold !important;
    }

    .font-header{
        font-size: 15px !important;
    }
</style>
<header>
        <div class="container">
            <a class="logo" href="/">
                <img src="{{ url_assets('/clothes/images/logo.png')}}" alt="img" />
            </a>
            <!-- /.logo -->
            <div class="header-social">
                <ul class="list-social">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="vk"><i class="fa fa-vk"></i></a></li>
                    <li><a href="#" class="behance"><i class="fa fa-behance"></i></a></li>
                </ul>
                <!-- /.list-social -->
            </div>
            <!-- /.header-social -->
            <div class="top-cart">
                    <?php
                    $totalProducts = 0;
                    $totalPrice = 0;
                    ?>@if (Session::has('cart_products'))
                        @foreach(session()->get('cart_products') as $pid => $product)
                            <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                        @endforeach
                    @endif
                <a href="{{route('cart')}}">
                    <i class="pe-7s-cart"></i>
                    <span>{{$totalProducts}}</span>
                </a>
            </div>
            <!-- /.top-cart -->
            <nav class="main-nav">
                <div class="minimal-menu">
                    <ul class="menu">
                        <li class="current-menu-item caps-header"><a href="/" class="font-header">ПОЧЕТНА</a></li>
                            @foreach($menuCategories as $mc)
                                @if(isset($mc['children']))
                                    <li class="current-menu-item submenu caps-header"><a class="font-header" href="#">{{$mc['title']}} </a>
                                        <ul class="sub-menu">
                                            @if(isset($mc['children']))
                                                @foreach($mc['children'] as $ch)
                                                <li>
                                                        <a class="font-header" href="{{route('category',[$ch['id'],$ch['url']])}}">{{$ch['title']}} </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a class="font-header" href="{{route('category', [$mc['id'], $mc['url']])}}">
                                            {{$mc['title']}}
                                        </a>
                                    </li>
                                @endif   

                            @endforeach
                           
                            <li class="current-menu-item caps-header"><a href="/contact" class="font-header">КОНТАКТ</a></li>
                            <li class="hidden-xs">
                                <div class="wrap-search">
                                    <form action="{{route('search')}}" class="search-form">
                                        <input type="text" placeholder="Search.." search-input name="search"/>
                                        <button type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <!-- /.search-form -->
                            </li>
                    </ul>
                </div>
                <!-- /.minimal-menu -->
            </nav>
            <!-- /.main-nav -->
        </div>
    </header>