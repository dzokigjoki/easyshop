<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Hairy is a pixel perfect creative barber html5 tempalte  based on designed with great attention to details, flexibility and performance. It is ultra professional, smooth and sleek, with a clean modern layout.">
    <link href="http://demo.zytheme.com/hairy/assets/images/favicon/favicon.png" rel="icon">
    @include('clients._partials.meta')

    <!-- Fonts
    ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/vendor/fontawesome-stars.css')}}">

    <!-- Stylesheets
    ============================================= -->
    <link href="{{ url_assets('/barber_shop/css/external.css')}}" rel="stylesheet">
    <link href="{{ url_assets('/barber_shop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url_assets('/barber_shop/css/style.css')}}" rel="stylesheet">
    <link href="{{ url_assets('/barber_shop/css/_contact.scss')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url_assets('/barber_shop/css/swiper.min.css')}}">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Hairy | Barber Html5 Template</title>
    @include('clients._partials.global-styles')
    @include('clients._partials.pixel-init')
</head>

@include('clients._partials.pixel-events')
<body>
    {{-- <div class="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> --}}

    <div id="wrapper" class="wrapper clearfix">
        @include('clients.barber_shop.partials.header')
        @yield('content')
        @include('clients.barber_shop.partials.footer')
    </div>

    <script src="{{ url_assets('/barber_shop/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{ url_assets('/barber_shop/js/plugins.js')}}"></script>
    <script src="{{ url_assets('/barber_shop/js/functions.js')}}"></script>
    <script src="{{ url_assets('/barber_shop/js/swiper.min.js')}}"></script>
    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')
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
        
        var swiper = new Swiper('#swipe1', {
          slidesPerView: 3,
          spaceBetween: 30,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        });
        if($('#swipe1').length) {
            $(window).resize(function () {
                var ww = $(window).width();
                
                if (ww > 1000) {
                    swiper.params.slidesPerView = 4;
                    swiper.params.slidesPerGroup = 1;
                    swiper.simulateTouch = true;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper.params.slidesPerView = 1;
                    swiper.params.slidesPerGroup = 1;
                    swiper.simulateTouch = true;
                }
                if (ww > 425 && ww <= 600) {
                    swiper.params.slidesPerView = 2;
                    swiper.params.slidesPerGroup = 2;
                    swiper.simulateTouch = true;
                }
                if (ww <= 425) {
                    swiper.params.slidesPerView = 1;
                    swiper.params.slidesPerGroup = 1;
                    swiper.simulateTouch = true;
                }
                swiper.update()
            })
        }
        $(window).trigger('resize');

        var swiper2 = new Swiper('#swipe2', {
          slidesPerView: 3,
          spaceBetween: 30,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        });
        if($('#swipe2').length) {
            $(window).resize(function () {
                var ww = $(window).width();
                
                if (ww > 1000) {
                    swiper2.params.slidesPerView = 4;
                    swiper2.params.slidesPerGroup = 1;
                    swiper2.simulateTouch = true;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper2.params.slidesPerView = 1;
                    swiper2.params.slidesPerGroup = 1;
                    swiper2.simulateTouch = true;
                }
                if (ww > 425 && ww <= 600) {
                    swiper2.params.slidesPerView = 2;
                    swiper2.params.slidesPerGroup = 2;
                    swiper2.simulateTouch = true;
                }
                if (ww <= 425) {
                    swiper2.params.slidesPerView = 1;
                    swiper2.params.slidesPerGroup = 1;
                    swiper2.simulateTouch = true;
                }
                swiper2.update()
            })
        }
        $(window).trigger('resize');

        var swiper3 = new Swiper('#swipe3', {
          slidesPerView: 3,
          spaceBetween: 30,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        });
        if($('#swipe3').length) {
            $(window).resize(function () {
                var ww = $(window).width();
                
                if (ww > 1000) {
                    swiper3.params.slidesPerView = 4;
                    swiper3.params.slidesPerGroup = 1;
                    swiper3.simulateTouch = true;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper3.params.slidesPerView = 1;
                    swiper3.params.slidesPerGroup = 1;
                    swiper3.simulateTouch = true;
                }
                if (ww > 425 && ww <= 600) {
                    swiper3.params.slidesPerView = 2;
                    swiper3.params.slidesPerGroup = 2;
                    swiper3.simulateTouch = true;
                }
                if (ww <= 425) {
                    swiper3.params.slidesPerView = 1;
                    swiper3.params.slidesPerGroup = 1;
                    swiper3.simulateTouch = true;
                }
                swiper3.update()
            })
        }
        $(window).trigger('resize');
        </script>
        
</body>