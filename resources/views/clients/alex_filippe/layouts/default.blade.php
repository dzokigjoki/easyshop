<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    <style>
        .footer-text {
            text-align: justify !important;
        }

        .steps-block-orange {
            background-color: #BF244C;
        }
    </style>
    {{-- Meta tags --}}
    @include('clients._partials.meta')

    {{-- Favicon --}}
    @include('clients._partials.favicon')

    <!-- Fonts START -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="{{url_assets('/alex_filippe/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{url_assets('/alex_filippe/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/global/plugins/slider-layer-slider/css/layerslider.css') }}" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Page level plugin styles START -->
    <link href="{{url_assets('/alex_filippe/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css') }}" rel="stylesheet" type="text/css"><!-- for slider-range --> --}}
    <link href="{{url_assets('/alex_filippe/global/plugins/rateit/src/rateit.css') }}" rel="stylesheet" type="text/css">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    

    <link href="{{url_assets('/alex_filippe/global/css/components.css?v=2') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/frontend/layout/css/style.css?v=5') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/frontend/pages/css/style-shop.css?v=4') }}" rel="stylesheet" type="text/css">
    <link href="{{url_assets('/alex_filippe/frontend/pages/css/style-layer-slider.css') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/frontend/layout/css/style-responsive.css?v=2') }}" rel="stylesheet">
    <link href="{{url_assets('/alex_filippe/frontend/layout/css/themes/red.css?v=2') }}" rel="stylesheet" id="style-color">
    <link href="{{url_assets('/alex_filippe/frontend/layout/css/custom.css?v=2') }}" rel="stylesheet">
    <!-- Theme styles END -->
    <link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="{{url_assets('/alex_filippe/global/plugins/easyzoom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url_assets('/alex_filippe/global/plugins/slick/slick.css')}}" type="text/css" />
    
    @include('clients._partials.global-styles')

    <!-- Facebook Pixel Code -->
    @include('clients._partials.pixel-init')
    <!-- End Facebook Pixel Code -->
</head>
@include('clients._partials.pixel-events')
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-8 col-sm-8 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><a href="{{route('blog', [4, 'za-nas'])}}" >За нас</a></li>
                    <li><a href="{{route('blog', [3, 'kako-da-naracham'])}}">Како да нарачам</a></li>
                    <li style="border-right: none;"><a href="javascript://" >Контакт:</a></li>
                    <li><a href="tel:0038970214213" ><i class="fa fa-phone"></i><span>+389 70 214 213</span></a></li>
                    <li style="border-right: none;"><a>Плаќање</a></li>
                    <li><span><i class="fa fa-truck"></i><span>При достава</span></a></li>
                    {{-- <li><span><i class="fa fa-credit-card"></i><span>Со картичка</span></span></li> --}}
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-4 col-sm-4 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @if(!Auth::check())
                        {{--<li><a href="{{route('auth.login.get')}}" >Најава</a></li>--}}
                        {{--<li><a href="{{route('auth.register.get')}}" >Регистрација</a></li>--}}
                    @else
                        {{--<li><a href="{{route('profiles.get')}}">Профил</a></li>--}}
                        {{--<li><a href="{{route('cart')}}">Кошничка</a></li>--}}
                        {{--<li><a href="{{route('auth.logout.get')}}" >Одјави се</a></li>--}}
                    @endif
                        {{-- <li><div id="google_translate_element"></div><script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({pageLanguage: 'mk', includedLanguages: 'en,sq,sr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                }
                            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </li>
                        <li class="shop-currencies">
                            @foreach(config( 'clients.' . config( 'app.client') . '.currency_select_front') as $key => $value)
                            <a href="{{route('change.currency')}}?currency={{$key}}" class="bold
                            @if(\Session::get('selectedCurrency') === $key)
                            current
                            @endif
                            ">{{$key}}</a>
                            @endforeach
                        </li> --}}
                        <li><a href="{{route('cart')}}">Кошничка</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
@include('clients.alex_filippe.partials.header')
<!-- Header END -->

    <!-- ============================================================= HEADER : END ============================================================= -->

    @yield('content')

    <!-- ============================================================= FOOTER ============================================================= -->

<!-- BEGIN STEPS -->
<div class="steps-block steps-block-orange">
    <div class="container">
        <div class="row">
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-truck"></i>
                <div>
                    <h2>Бесплатна достава</h2>
                    <em>низ цела Македонија за 48 часа</em>
                </div>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-gift"></i>
                <div>
                    <h2>Висок квалитет</h2>
                    <em>по достапни цени</em>
                </div>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-phone"></i>
                <div>
                    <h2>
                        <a href="tel:0038970214213">+389 70 214 213</a>
                    </h2>
                    <em>контактирајте нè</em>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END STEPS -->


<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>За нас</h2>
                <p class="footer-text">
                        Проверен квалитет присутен на повеќе европски пазари!

                        Alex Filippe нуди најразлични видови стилски чорапи  во различни бои и дезени.
                        
                        Висококвалитетните материјали и одличната изработка гарантираат трајна долговечност и задоволство во вашето движење.
                        
                        Секој детаљ од нашиот производ е поставен на високо ниво за да ви овозможи висока удобност и слобода во вашето секојдневие.
                        
                        Дизајнирани се специјално за луѓе без граници и предрасуди.
                        
                        Нашите чорапи се направени од најдобриот памук. Составот е 85% памук, 12% полиамид и 3% спандекс.
                        
                        Шевовите на прстите се завршени рачно и на тој начин ви гарантираме крајна удобност во носењето. Петицата и прстите се засилени, со цел поголема издржливост.
                         
                        <div>Alex Filippe – затоа што е TOO GOOD TO MISS!</div>
                </p>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->

            <!-- BEGIN TWITTER BLOCK -->
            <div class="col-md-4 col-sm-6 text-center pre-footer-col">
                <div class="fb-page" data-href="https://www.facebook.com/AlexFilippeMK/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AlexFilippeMK/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AlexFilippeMK/">Alex Filippe</a></blockquote></div>
            </div>
            <!-- END TWITTER BLOCK -->

            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-4 col-sm-6 text-center pre-footer-col">
                <h2>Контакт</h2>
                <address class="margin-bottom-10">
                    Tелефон: +389 70 214 213
                    <br/>
                    Email: <a href="mailto:info@alexfilippe.mk">info@alexfilippe.mk</a>
                </address>
                <img style="margin-top:25px;" src="{{ url_assets('/alex_filippe/images/footer-image.png') }}" alt="">
            </div>
            <!-- END BOTTOM CONTACTS -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row text-center">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-3 col-sm-3 padding-top-10">
                {{ date('Y') }} © Alex Filippe. ALL Rights Reserved.
            </div>
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                <a style="margin-right: 10px;" href="{{route('blog', [1, 'pravila-za-kupuvanje'])}}">Правила за купување</a>
                <a href="{{route('blog', [2, 'politika-na-privatnost'])}}">Политика на приватност</a>
            </div>
            <div class="col-md-1 col-sm-1 padding-top-10">
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <div class="col-md-2 col-sm-2 padding-top-10">
                Powered by
                <a href="https://generadevelopment.com" target="_blank">
                    <img width='70' src="{{ url_assets('/alex_filippe/images/genera_logo.png') }}">
                </a>
            </div>
            <!-- END PAYMENTS -->
        </div>
    </div>
</div>
<!-- END FOOTER -->

@include('clients._partials.es-object')

<!-- END fast view of a product -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="{{url_assets('/alex_filippe/global/plugins/respond.min.js')}}"></script>
<![endif]-->
<script src="{{url_assets('/alex_filippe/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url_assets('/alex_filippe/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{url_assets('/alex_filippe/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url_assets('/alex_filippe/frontend/layout/scripts/back-to-top.js')}}" type="text/javascript"></script>
<script src="{{url_assets('/alex_filippe/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
@include('clients._partials.global-scripts')

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="{{url_assets('/alex_filippe/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
<script src="{{url_assets('/alex_filippe/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->
<script src='{{url_assets('/alex_filippe/global/plugins/easyzoom.js')}}' type="text/javascript"></script><!-- product zoom -->
{{--<script src="{{url_assets('/alex_filippe/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script><!-- Quantity -->--}}

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="{{url_assets('/alex_filippe/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{url_assets('/alex_filippe/global/plugins/rateit/src/jquery.rateit.js')}}" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

<script src="{{url_assets('/alex_filippe/frontend/layout/scripts/layout.js')}}" type="text/javascript"></script>

<!-- BEGIN LayerSlider -->
{{-- <script src="{{url_assets('/alex_filippe/global/plugins/slider-layer-slider/js/greensock.js')}}" type="text/javascript"></script><!-- External libraries: GreenSock -->
<script src="{{url_assets('/alex_filippe/global/plugins/slider-layer-slider/js/layerslider.transitions.js')}}" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="{{url_assets('/alex_filippe/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js')}}" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="{{url_assets('/alex_filippe/frontend/pages/scripts/layerslider-init.js')}}" type="text/javascript"></script> --}}
<!-- END LayerSlider -->
<script src="{{ url_assets('/alex_filippe/global/plugins/slick/slick.min.js') }}" type="text/javascript">></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.single-item').slick({
            autoplay: true,
            autoplaySpeed: 3500,
            arrows: false,
            infinite: true
        });
        
        Layout.init();
        Layout.initOWL();
        // LayersliderInit.initLayerSlider();
        Layout.initImageZoom();
        // Layout.initTouchspin();
        Layout.initTwitter();
        
        Layout.initUniform();
        Layout.initSliderRange();


        $('[search-btn]').on('click', function() {
            document.querySelector('[search-input]').focus();
        });
    });
</script>
<script>
    $(document).ready(function () {
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

    });

</script>




@section('scripts')
@show

<input id="direct_buy" type="hidden" name="direct_buy" value="1">
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>