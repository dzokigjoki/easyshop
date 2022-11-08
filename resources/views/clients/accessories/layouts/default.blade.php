
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Accessories</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    @include('clients._partials.meta')

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/vendor/bootstrap.min.css')}}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/vendor/font-awesome.css')}}">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/vendor/fontawesome-stars.css')}}">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/vendor/ion-fonts.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/plugins/slick.css')}}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/plugins/animate.css')}}">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/plugins/jquery-ui.min.css')}}">
    <!-- Lightgallery -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/plugins/lightgallery.min.css')}}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/plugins/nice-select.css')}}">

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{ url_assets('/accessories/css/style.css')}}">
    <!--<link rel="stylesheet" href="assets/css/style.min.css')}}">-->
    @include('clients._partials.global-styles')
    @include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')


<body class="template-color-2">

    <div class="main-wrapper">
        <!-- Begin Loading Area -->
        {{-- <div class="loading">
            <div class="text-center middle">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div> --}}

        @include('clients.accessories.partials.header')
        @yield('content')
        @include('clients.accessories.partials.footer')




        <script src="{{ url_assets('/accessories/js/vendor/jquery-1.12.4.min.js')}}"></script>


        <!-- Modernizer JS -->
        <script src="{{ url_assets('/accessories/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <!-- Popper JS -->
        <script src="{{ url_assets('/accessories/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ url_assets('/accessories/js/vendor/bootstrap.min.js')}}"></script>
   
        <!-- Slick Slider JS -->
        <script src="{{ url_assets('/accessories/js/plugins/slick.min.js')}}"></script>
        <!-- Countdown JS -->
        <script src="{{ url_assets('/accessories/js/plugins/countdown.js')}}"></script>
        <!-- Barrating JS -->
        <script src="{{ url_assets('/accessories/js/plugins/jquery.barrating.min.js')}}"></script>
        <!-- Counterup JS -->
        <script src="{{ url_assets('/accessories/js/plugins/jquery.counterup.js')}}"></script>
        <!-- Nice Select JS -->
        <script src="{{ url_assets('/accessories/js/plugins/jquery.nice-select.js')}}"></script>
        <!-- Sticky Sidebar JS -->
        <script src="{{ url_assets('/accessories/js/plugins/jquery.sticky-sidebar.js')}}"></script>
        <!-- Jquery-ui JS -->
        <script src="{{ url_assets('/accessories/js/plugins/jquery-ui.min.js')}}"></script>
        <script src="{{ url_assets('/accessories/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
        <!-- Lightgallery JS -->
        <script src="{{ url_assets('/accessories/js/plugins/lightgallery.min.js')}}"></script>
        <!-- Scroll Top JS -->
        <script src="{{ url_assets('/accessories/js/plugins/scroll-top.js')}}"></script>
        <!-- Theia Sticky Sidebar JS -->
        <script src="{{ url_assets('/accessories/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
        <!-- Waypoints JS -->
        <script src="{{ url_assets('/accessories/js/plugins/waypoints.min.js')}}"></script>
        <!-- Instafeed JS -->
        <script src="{{ url_assets('/accessories/js/plugins/instafeed.min.js')}}"></script>
        <!-- Instafeed JS -->
        <script src="{{ url_assets('/accessories/js/plugins/jquery.elevateZoom-3.0.8.min.js')}}"></script>
    {{-- <script src="{{ url_assets('/accessories/js/vendor/vendor.min.js')}}"></script> --}}
    <script src="{{ url_assets('/accessories/js/plugins/plugins.min.js')}}"></script>
        <!-- Main JS -->
        <script src="{{ url_assets('/accessories/js/main.js')}}"></script>
        
        @include('clients._partials.es-object')
        @include('clients._partials.global-scripts')

        @section('scripts')
        @show
    </div>

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
