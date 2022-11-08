<!DOCTYPE html>
<html>

<head>
    {{-- Meta tags --}}
    @include('clients._partials.meta')

    {{-- Favicon --}}
    @include('clients._partials.favicon')


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;1,800&display=swap" rel="stylesheet">

    <!--********************************** 
        all css files 
    *************************************-->

    <link rel="stylesheet" href="{{ url_assets('/expressbook_new/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/expressbook_new/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/expressbook_new/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/expressbook_new/css/plugins/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ url_assets('/expressbook_new/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/expressbook_new/css/plugins/plugins.css') }}" />
    <link rel="stylesheet" href="{{ url_assets('/expressbook_new/css/style.css') }}" />


    @include('clients._partials.global-styles')

</head>

<body>
    <!-- offcanvas-overlay start -->
    <div class="offcanvas-overlay"></div>
    <!-- offcanvas-overlay end -->
    <!-- offcanvas-mobile-menu start -->
    <div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
        <div class="inner">
            <div class="border-bottom mb-4 pb-4 text-right">
                <button class="offcanvas-close">×</button>
            </div>
            <div class="offcanvas-head mb-4">
                <nav class="offcanvas-top-nav">
                    <ul class="d-flex flex-wrap">
                        <?php
                        $totalProducts = 0;
                        $totalPrice = 0;
                        ?>@if (Session::has('cart_products'))
                            @foreach (session()->get('cart_products') as $pid => $product)
                                <?php
                                $product = (object) $product;
                                $totalPrice = $totalPrice + $product->price * $product->quantity;
                                $totalProducts = $totalProducts + $product->quantity;
                                ?>
                            @endforeach
                        @endif
                        <li class="my-2 mx-2">
                            @if (auth()->check())
                            <a href="/profile">
                                <i class="icon-user"></i> Профил</a>
                            @else
                            <a href="/login">
                                <i class="icon-user"></i> Најава</a>
                            @endif
                        </li>
                        <li class="my-2 mx-2">
                            <a href="/cart">
                                <i class="icon-bag"></i> Кошничка <span
                                    data-amount-value>{{ $totalProducts }}</span></a>
                        </li>
                        @if (auth()->check())
                            <?php $wishlistitemsnumber = count($wishlistItems); ?>
                            <li class="my-2 mx-2">
                                <a href="/profile#download">
                                    <i class="ion-android-favorite-outline"></i> Желби
                                    <span data-wishlist-value>{{ $wishlistitemsnumber }}</span></a>
                            </li>
                        @endif
                        <li class="my-2 mx-2">
                            <a class="search search-toggle" href="javascript:void(0)">
                                <i class="icon-magnifier"></i> Пребарување</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <nav class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="/about">За нас</a>
                    </li>
                    <li><a href="/contact">Контакт</a></li>

                    @foreach ($menuCategories as $category)
                        <li><a
                                href="/c/{{ $category['id'] }}/{{ $category['url'] }}">{{ $category['title'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="offcanvas-social py-30">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/ekspresbuk/" target="_blank"><i
                                class="icon-social-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- offcanvas-mobile-menu end -->
    <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist theme1">
        <div id="wishlist" class="inner">
            @include('clients.expressbook_new.wishlist-partial')

        </div>
    </div>
    <!-- OffCanvas Wishlist End -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
        <div id="shoppingCart" class="inner">
            @include('clients.expressbook_new.cart-partial')
        </div>
    </div>
    <!-- OffCanvas Cart End -->



    <div class="loader"></div>


    @include('clients.expressbook_new.partials.header')
    @yield('content')
    @include('clients.expressbook_new.partials.footer')


    <div class="modal fade theme1 style1" id="quick-view" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto col-lg-5 mb-5 mb-lg-0">
                            <div class="product-sync-init mb-20">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <img id="image_modal" src="" alt="product-thumb" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-7">
                            <div class="modal-product-info">
                                <div class="product-head">
                                    <h2 id="title_modal" class="title">
                                    </h2>
                                </div>
                                <div class="product-body">
                                    <span class="product-price mr-20"><del id="old_price_modal" class="del"></del>
                                        <span id="new_price_modal" class="onsale"></span></span>
                                    <div id="description_modal">

                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-count style d-flex flex-column flex-sm-row my-4">
                                        <div class="count d-flex">
                                            <input type="number" data-product-quantity="" min="1" max="10" step="1"
                                                value="1" />
                                            <div class="button-group">
                                                <button class="count-btn increment">
                                                    <i class="fas fa-chevron-up"></i>
                                                </button>
                                                <button class="count-btn decrement">
                                                    <i class="fas fa-chevron-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <button data-add-to-cart="" id="modal_button"
                                                class="btn btn-dark btn--xl mt-5 mt-sm-0">
                                                <span class="mr-2"><i class="ion-android-add"></i></span>
                                                Додади во кошничка
                                            </button>
                                        </div>
                                    </div>
                                    <div class="addto-whish-list">
                                        <a data-add-to-wish-list="" id="modal_button_wishlist"><i
                                                class="icon-heart"></i> Во листа на желби</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay">
        <div class="scale"></div>
        <form class="search-box" method="GET" action="{{ route('search') }}">
            <input type="text" name="search" placeholder="Пребарувај продукти..." />
            <button id="close" type="submit">
                <i class="ion-ios-search-strong"></i>
            </button>
        </form>
        <button class="close"><i class="ion-android-close"></i></button>
    </div>


    <script src="{{ url_assets('/expressbook_new/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook_new/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook_new/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook_new/js/popper.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook_new/js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook_new/js/bootstrap.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook_new/js/plugins/plugins.js') }}"></script>
    <script src="{{ url_assets('/expressbook_new/js/plugins/ajax-contact.js') }}"></script>
    <script>
        if (!sessionStorage.getItem('doNotShow')) {
            $(window).load(function() {
                $('.loader').fadeOut();
            });
            sessionStorage.setItem('doNotShow', true);
        } else {
            $('.loader').hide();
        }
    </script>
    <script src="{{ url_assets('/expressbook_new/js/main.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0"
        nonce="HwbanOCi">
    </script>


    <script>
        $(document).ready(function() {
            $('#quick-view').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var product = button.data('product');
                var newprice = button.data('newprice');
                var oldprice = button.data('oldprice');
                var image_modal = button.data('image');
                var modal = $(this);

                modal.find('.modal-body #image_modal').attr('src', image_modal);
                modal.find('.modal-body #modal_button').attr('value', product['id']);
                modal.find('.modal-body #modal_button_wishlist').attr('value', product['id']);
                modal.find('.modal-body #title_modal').text(product['title']);
                modal.find('.modal-body #description_modal').html(product['description']);
                if (oldprice != newprice) {

                    modal.find('.modal-body #old_price_modal').text(oldprice + " МКД");
                } else {

                    modal.find('.modal-body #old_price_modal').remove();
                }
                modal.find('.modal-body #new_price_modal').text(newprice + " МКД");
            })
        });
    </script>


    @yield('scripts')

    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')


</body>

</html>
