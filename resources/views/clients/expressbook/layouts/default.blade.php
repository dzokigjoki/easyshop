<!DOCTYPE html>
<html lang="mk">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    {{-- Meta tags --}}
    @include('clients._partials.meta')

    {{-- Favicon --}}
    @include('clients._partials.favicon')

    <!-- Bootstrap -->
    <link href="{{ url_assets('/expressbook/assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url_assets('/expressbook/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url_assets('/expressbook/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url_assets('/expressbook/assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url_assets('/expressbook/assets/css/main.css') }}" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet'
        type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fira+Sans:400,300,300italic,400italic,500,500italic,700,700italic'
        rel='stylesheet' type='text/css'>

    @include('clients._partials.global-styles')

    <!-- Facebook Pixel Code -->
    @include('clients._partials.pixel-init')
    <!-- End Facebook Pixel Code -->
</head>

<body>
    <div id="wrapper">
        <div id="page-content-wrapper" class="st-pusher">
            <div class="st-pusher-after"></div>

            <!-- ============================================== HEADER ============================================== -->
            @include('clients.expressbook.partials.header')
            <!-- ============================================== HEADER : END ============================================== -->
            {{--<div class="container">--}}
            <div id="fb-root"></div>
            <script>
                (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            </script>
            @yield('content')
            {{--</div>--}}
            <!-- ============================================== FOOTER ============================================== -->
            <footer class="footer clearfix" style="display: none">
                <div class="margin-top-10">
                    <div class="container inner-top-vs">
                        <!-- ============================================== FOOTER-TOP ============================================== -->
                        <div class="row">
                            {{--<div class="col-md-4 col-sm-4">--}}
                            {{--<div class="footer-module">--}}
                            {{--<h4 class="footer-module-title">За ExpressPublishing</h4>--}}
                            {{--<div class="footer-module-body m-t-20 clearfix">--}}
                            {{--<p><span class="pull-left">Експрес Бук е приватна трговска фирма основана--}}
                            {{--во 2011 година во Скопје и е официјален дистрибутер на Express Publishing--}}
                            {{--во Македонија. Наша одговорност е дистрибуција на книгите, како и промоција--}}
                            {{--и рекламирање на истите. Преку нашата дистрибутивна мрежа во можност сме--}}
                            {{--сами да ја испорачаме секоја нарачка во Скопје. </span></p>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-lg-4">
                                <div class="footer-module">
                                    <a href="/"><img class="center"
                                            src="{{ url_assets('/expressbook/images/logo.png') }}"
                                            height="80" /></a><br>
                                    <p><span class="pull-left" style="padding-top:15px; color: white; text-align: justify;">
                                            Експрес Бук е официјален дистрибутер на издавачката куќа Express Publishing
                                            во Македонија. Наша одговорност е дистрибуција на книгите, како и промоција
                                            и рекламирање на истите. Преку нашата дистрибутивна мрежа во можност сме
                                            сами да ја испорачаме секоја нарачка во Скопје.
                                        </span></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4  col-sm-4">
                                <div class="footer-module">
                                    <h4 class="footer-module-title">Категории</h4>
                                    <div class="footer-module-body clearfix">
                                        <ul class="list-unstyled link-list">
                                            <li class="active"><a href="/">Почетна</a></li>
                                            @foreach($menuCategories as $item)
                                            <li
                                                {{ url()->current() == route('category', [$item['id'], $item['url']]) ? 'class="active"' : ''  }}>
                                                <a
                                                    href="{{route('category', [$item['id'], $item['url']])}}">{{$item['title']}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-3 col-md-offset-1 col-md-12 center">
                                <div class="gettouch  pad-bot-footer pad-center">
                                    <div style="border:none; overflow:hidden; width:270px !important; height:216px !important;"
                                        class="fb-page"
                                        data-href="https://www.facebook.com/ekspresbuk/?__tn__=%2Cd%2CP-R&eid=ARDKwNaF2mknHTjnihTyjtoBiK9_QPCFgSsHXgrojzF1AQ9Yd2E58Pu_pB679jVAYnnq3bHFDt4RywZs"
                                        data-small-header="false" data-adapt-container-width="true"
                                        data-hide-cover="false" data-show-facepile="true">
                                        <blockquote
                                            cite="https://www.facebook.com/ekspresbuk/?__tn__=%2Cd%2CP-R&eid=ARDKwNaF2mknHTjnihTyjtoBiK9_QPCFgSsHXgrojzF1AQ9Yd2E58Pu_pB679jVAYnnq3bHFDt4RywZs"
                                            class="fb-xfbml-parse-ignore"><a
                                                href="https://www.facebook.com/ekspresbuk/?__tn__=%2Cd%2CP-R&eid=ARDKwNaF2mknHTjnihTyjtoBiK9_QPCFgSsHXgrojzF1AQ9Yd2E58Pu_pB679jVAYnnq3bHFDt4RywZs">
                                            </a></blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================== FOOTER-TOP : END ============================================== -->
                        <hr>
                        <!-- ============================================== FOOTER-BOTTOM ============================================== -->
                        <div class="row">
                            <div class="col-md-12">
                                {{--<div class="pull-left">--}}
                                {{--<ul class="payment-list list-unstyled">--}}
                                {{--<li><a href="#"><img src="/assets/expressbook/assets/images/payments/1.png" class="img-responsive" height="22" alt=""></a></li>--}}

                                {{--</ul>--}}
                                {{--</div>--}}
                                <span class="pull-left">
                                    <ul class="footer-links">
                                        <a href="{{route('category', [9, 'pravila-na-kupuvanje'])}}">
                                            <li>Правила на купување</li>
                                        </a>
                                        <a href="{{route('category', [10, 'politika-na-privatnost'])}}">
                                            <li> Политика на приватност</li>
                                        </a>
                                    </ul>
                                </span>
                                <p class="copyright-footer pull-right">&copy; {{ date('Y') }} ExpressBook. All rights
                                    reserved. Powered by
                                    <a href="https://generadevelopment.com" target="_blank">
                                        <img width='70'
                                            src="{{ url_assets('/expressbook/assets/images/genera_logo.png') }}">
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- ============================================== FOOTER-BOTTOM : END ============================================== -->
                    </div>
                </div>
            </footer>
            <!-- ============================================== FOOTER : END ============================================== -->
        </div><!-- /.st-pusher -->
        <!-- ============================================== TOGGLE RIGHT CONTENT ============================================== -->

        <div id="cart-dropdown-wrapper">
            <nav id="menu1" class="cart-dropdown">
                <h2 class="shopping-cart-heading">Кошничка</h2>
                <div class="cart-items">
                    <div class="cart-items-list">
                        <div id="shoppingCart">
                            <ul> @if (Session::has('cart_products'))

                                @foreach(session()->get('cart_products') as $product)
                                <?php $product = (object)$product;
                                    //                                    $bodytag = str_replace("%body%", "black", "<body text='%body%'>");
                                    $image_old = $product->image;
                                    $image = str_replace("sm_", "lg_", $image_old);
                                    ?>
                                <li class="media">
                                    <div class="clearfix book cart-book">
                                        <a href="{{$product->url}}" class="media-left">
                                            <div class="book-cover">
                                                <img width="140" height="212" alt="" src="{{$image}}"
                                                    data-echo="{{$image}}">
                                            </div>
                                        </a>
                                        <div class="media-body book-details">
                                            <div class="book-description">
                                                <h3 class="book-title"><a
                                                        href="single-book.html">{{$product->title}}</a></h3>
                                                {{--<p class="book-subtitle"><a href="single-book.html">Cormac McCarthy</a></p>--}}
                                                <p class="price m-t-20">
                                                    {{--<div class="qty">--}}
                                                    {{$product->quantity}} x
                                                    {{--</div>--}}
                                                    {{ number_format($product->price, 0, ',', '.')}} мкд.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                @endforeach
                            </ul>
                            <div class="cart-item-footer">
                                <?php $totalPrice = 0;
                            $totalProducts = 0;
                            ?>@if (Session::has('cart_products'))
                                @foreach(session()->get('cart_products') as $pid => $product)
                                <?php $product = (object)$product; $totalPrice = $totalPrice + ($product->price * $product->quantity); $totalProducts = $totalProducts + $product->quantity; ?>
                                @endforeach
                                @endif
                                <h3 class='total text-center'>Вкупно: <span>{{$totalPrice}} ден.</span></h3>
                                <div class="proceed-to-checkout text-center">
                                    <a href="{{URL::to('/cart')}}">
                                        <button type="button" class="btn btn-primary btn-uppercase">Види
                                            кошничка</button>
                                    </a>
                                </div>
                            </div>

                            @else
                            <h4>Вашата кошничка е празна.</h4>

                            @endif

                        </div>
                    </div>

                </div>

            </nav>
        </div>

        <!-- ============================================== TOGGLE RIGHT CONTENT : END ============================================== -->


    </div><!-- /#wrapper -->

    <script src="{{ url_assets('/expressbook/assets/js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/jquery.customSelect.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/wow.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/echo.min.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/scripts.js') }}"></script>
    <script src="{{ url_assets('/expressbook/assets/js/jquery.magnific-popup.min.js') }}"></script>
    {{--<script>--}}
    <script>
        $(document).ready(function () {

        if ($('.zoomGalleryActive').length) {
            $('.zoomGalleryActive').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                },
                closeOnContentClick: true,
                callbacks: {
                    imageLoadComplete: function () {
                        // fires when image in current popup finished loading
                        // avaiable since v0.9.0
                        console.log('Image loaded');
                    },

                }
            });
        }

        var $form = $('#checkoutForm');
        var $button = $('[data-pay-button]');


        $('[data-payment-type]').on('click', function () {
            console.log($(this).val());
        });

        $button.on('click', function (event) {

            var paymentType = $('[name=paymentType]:checked').val();

            if (paymentType === 'casys') {

                $form.attr('action', $form.data('cpay-action'));

                $.ajax({
                    url: 'checkout/generate',
                    method: 'POST',
                    data: {
                        'FirstName': $("input[name='FirstName']").val(),
                        'LastName': $("input[name='LastName']").val(),
                        'Email': $("input[name='Email']").val(),
                        'Telephone': $("input[name='Telephone']").val(),
                        'Country': $("select[name='Country']").val(),
                        'City': $("[name='City']").val(),
                        'Zip': $("input[name='Zip']").val(),
                        'Address': $("input[name='Address']").val(),
                        'AmountToPay': $("input[name='AmountToPay']").val(),
                        'AmountCurrency': $("input[name='AmountCurrency']").val(),
                        'Details1': $("input[name='Details1']").val(),
                        'PayToMerchant': $("input[name='PayToMerchant']").val(),
                        'MerchantName': encodeURIComponent($("input[name='MerchantName']").val()),
                        'OriginalAmount': $("input[name='OriginalAmount']").val(),
                        'OriginalCurrency': $("input[name='OriginalCurrency']").val(),
                        'PaymentOKURL': $("input[name='PaymentOKURL']").val(),
                        'PaymentFailURL': $("input[name='PaymentFailURL']").val(),
                        'type_delivery': $("input[name='type_delivery']:checked").val(),
                        'paymentType': $("input[name='paymentType']:checked").val()

                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (result) {
                        if (result.status === 'success') {

                            fbq('track', 'InitiateCheckout', {
                                value: result.totalPrice,
                                currency: window.ES.facebook_pixels_currency,
                                num_items: result.productIds.length,
                                content_ids: result.productIds,
                                content_type: 'product'
                            });

                            $("input[name='FirstName']").remove();
                            $("input[name='LastName']").remove();
                            $("input[name='Email']").remove();
                            $("input[name='Telephone']").remove();
                            $("select[name='Country']").remove();
                            $("input[name='City']").remove();
                            $("input[name='Zip']").remove();
                            $("input[name='Address']").remove();
                            $("input[name='type_delivery']").remove();
                            $("input[name='paymentType']").remove();
                            $("input[name='Details2']").remove();
                            $("input[name='CheckSumHeader']").remove();
                            $("input[name='CheckSum']").remove();
                            $("input[name='AmountToPay']").remove();
                            $("input[name='OriginalAmount']").remove();

                            $form.append('<input type="hidden" name="Details2" value="' + result.documentId + '" />');
                            $form.append('<input type="hidden" name="CheckSumHeader" value="' + result.header + '" />');
                            $form.append('<input type="hidden" name="CheckSum" value="' + result.checksum + '" />');
                            $form.append('<input type="hidden" name="AmountToPay" value="' + result.totalPriceFull + '" />');
                            $form.append('<input type="hidden" name="OriginalAmount" value="' + result.totalPrice + '" />');
                               $form.submit();

                        }
                        else if (result.status === 'not_enough_stock') {
                            toastr.error("Продуктите " + result.productNames + ' моментално ги нема на залиха.');
                        }
                    },
                    error: function (val) {
                        toastr.error("Внесете ги сите полиња!");
                    }
                });

            } else if (paymentType === 'gotovo') {
                $form.attr('action', $form.data('cash-action'));
                $form.submit();
                return true;
            }
        });

    
            // $('#City').on('change', function(){ 
            //         var city_id = $('#City').val();
            //         if(parseInt(city_id) == 27) {
            //                 $('#cargo_price').text('0');     
            //         }
            // });

    });

    // function changeCargoPrice(cargoPrice) {
    //                 var city_id = $('#City').val();
    //                 if(parseInt(city_id) == 27) {
    //                         cargoPrice = 0;     
    //                 }
    //                 return cargoPrice;
    // }

    </script>


    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    @section('scripts')
    @show

</body>

</html>