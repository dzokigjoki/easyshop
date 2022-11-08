<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    {{-- Meta tags --}}
    @include('clients._partials.meta')

    {{-- Favicon --}}
    @include('clients._partials.favicon')

    <!-- Fonts START -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="/assets/mobiin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/mobiin/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="/assets/mobiin/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="/assets/mobiin/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/assets/mobiin/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Page level plugin styles START -->
    <link href="/assets/mobiin/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="/assets/mobiin/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/assets/mobiin/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
    <link href="/assets/mobiin/global/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="/assets/mobiin/global/css/components.css" rel="stylesheet">
    <link href="/assets/mobiin/frontend/layout/css/style.css" rel="stylesheet">
    <link href="/assets/mobiin/frontend/pages/css/style-shop.css?v=1" rel="stylesheet" type="text/css">
    <link href="/assets/mobiin/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
    <link href="/assets/mobiin/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="/assets/mobiin/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="/assets/mobiin/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <link href="/assets/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="/assets/mobiin/global/plugins/easyzoom.css" rel="stylesheet" type="text/css" />

    <!-- Slick slider styles -->
    <link href="/assets/mobiin/slick-master/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="/assets/mobiin/slick-master/slick/slick-theme.css" rel="stylesheet" type="text/css" />

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
                    <li style="border-right: none;"><a href="javascript://" >Контакт: </a></li>
                    <li><a href="tel:0038978333123" ><i class="fa fa-phone"></i><span>+389 78 333 123</span></a></li>
                    <li style="border-right: none;"><a>Плаќање</a></li>
                    <li><a href="" ><i class="fa fa-truck"></i><span>При достава</span></a></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->

        </div>
    </div>
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
@include('clients.mobiin.partials.header')
<!-- Header END -->

    <!-- ============================================================= HEADER : END ============================================================= -->

    @yield('content')

    <!-- ============================================================= FOOTER ============================================================= -->

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <!-- InstaWidget -->
                <a href="https://instawidget.net/v/user/mobi_in" id="link-6ba41b9eeba1cdc92e6245cfdde210d36d43374ad6f7c542bd927923081ba7e9">@mobi_in</a>
                <script src="https://instawidget.net/js/instawidget.js?u=6ba41b9eeba1cdc92e6245cfdde210d36d43374ad6f7c542bd927923081ba7e9&width=300px"></script>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->

            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <div class="fb-page" data-href="https://www.facebook.com/Mobiinskopje?fref=ts" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Mobiinskopje?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Mobiinskopje?fref=ts">Mobi In</a></blockquote></div>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->

            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>Контакт</h2>
                <address class="margin-bottom-10">
                    Т. Ц. Зебра<br>
                    Мобилен: 078 369 636
                    <br><br>
                    Email: <a href="mailto:info@mobi-in.mk">info@mobi-in.mk</a>
                </address>

            </div>
            <!-- END BOTTOM CONTACTS -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-3 col-sm-3 padding-top-10">
                {{ date('Y') }} © MOBIIN. ALL Rights Reserved.
            </div>
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                <a style="margin-right: 10px;" href="{{route('blog', [3, 'pravila-za-kupuvanje'])}}">Правила за купување</a>
                <a href="{{route('blog', [4, 'politika-na-privatnost'])}}">Политика на приватност</a>
            </div>
            {{--<div class="col-md-1 col-sm-1 padding-top-10">--}}
                {{--<a class="ipadMargins"><img style="width:100px;" src="/assets/mobiin/images/cardsnovi.png"></a>--}}
            {{--</div>--}}
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <div class="col-md-2 col-sm-2 padding-top-10 text-right">
                Powered by <a href="https://easyshop.mk" target="_blank"><img src="https://assets.smartsoft.mk/easyshop/logo.png" height="23"></a>
            </div>
            <!-- END PAYMENTS -->
        </div>
    </div>
</div>
<input id="direct_buy" type="hidden" name="direct_buy" value="1">
<!-- END FOOTER -->

@include('clients._partials.es-object')

<!-- END fast view of a product -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="/assets/mobiin/global/plugins/respond.min.js"></script>
<![endif]-->
<script src="/assets/mobiin/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/assets/mobiin/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/assets/mobiin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/mobiin/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
<script src="/assets/mobiin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="/assets/mobiin/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="/assets/mobiin/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<script src='/assets/mobiin/global/plugins/easyzoom.js' type="text/javascript"></script><!-- product zoom -->
<script src="/assets/mobiin/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="/assets/mobiin/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/mobiin/global/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

<!-- BEGIN LayerSlider -->
<script src="/assets/mobiin/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
<script src="/assets/mobiin/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="/assets/mobiin/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
<script src="/assets/mobiin/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
<!-- END LayerSlider -->

<script src="/assets/mobiin/slick-master/slick/slick.min.js" type="text/javascript"></script>

<script src="/assets/mobiin/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        LayersliderInit.initLayerSlider();
        Layout.initImageZoom();
        Layout.initTouchspin();
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/mk_MK/sdk.js#xfbml=1&version=v3.0';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script>

    $(".s-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: true
    });

</script>

@include('clients._partials.global-scripts')

@section('scripts')
@show

<input id="direct_buy" type="hidden" name="direct_buy" value="1">
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>