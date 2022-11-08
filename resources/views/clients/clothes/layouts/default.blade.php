<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <![endif]-->
        <title>Home</title>
        <meta name="keywords" content="keywords" />
        <meta name="description" content="description" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
        @include('clients._partials.meta')
        <link href="{{ url_assets('/clothes/styles/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        {{-- <link rel="stylesheet" href="{{ url_assets('/accessories/css/vendor/font-awesome.css')}}"> --}}


        <link href="{{ url_assets('/clothes/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/pe-icon-7-stroke/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/minimal-menu.css')}}" rel="stylesheet" type="text/css" />
      
        <link href="{{ url_assets('/clothes/styles/flat-form.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/fancySelect.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/allinone_bannerRotator.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/easy-responsive-tabs.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url_assets('/clothes/styles/styles.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ url_assets('/clothes/scripts/libs/prefixfree.min.js')}}"></script>
        <script src="{{ url_assets('/clothes/scripts/libs/modernizr.js')}}"></script>
        <!--[if lt IE 9]>
        <script src="assets/scripts/libs/html5shiv.js"></script>
        <script src="assets/scripts/libs/respond.js"></script>
        <![endif]-->
        @include('clients._partials.global-styles')
        @include('clients._partials.pixel-init')
    </head>
    @include('clients._partials.pixel-events')
    <body class="home1">
            <div class="topbar">
                <div class="container">
                    <div class="left-topbar">
                        WELCOME GUEST! <a href="login-register.html">LOG IN</a> OR <a href="login-register.html">REGISTER</a>
                    </div>
                    <!-- /.left-topbar -->
                    <div class="right-topbar">
                        <ul class="list-inline">
                        </ul>
                    </div>
                    <!-- /.right-topbar -->
                </div>
            </div>
            @include('clients.clothes.partials.header')
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
            @include('clients.clothes.partials.footer')
            <script src="{{ url_assets('/clothes/scripts/libs/jquery-1.11.2.min.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/jquery-ui-1.11.4/jquery-ui.min.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/jquery.easing.1.3.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/bootstrap.min.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/fancySelect.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/jquery.fancybox.pack.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/jquery.ui.touch-punch.min.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/jquery.mousewheel.min.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/allinone_bannerRotator.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/owl.carousel.min.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/jquery.countdown.min.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/easyResponsiveTabs.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/libs/jquery.raty-fa.js')}}"></script>
            <script src="{{ url_assets('/clothes/scripts/functions.js')}}"></script>
            
            @include('clients._partials.es-object')
            @include('clients._partials.global-scripts')
    
            @section('scripts')
            
            @show
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
                
    </body>
</html>