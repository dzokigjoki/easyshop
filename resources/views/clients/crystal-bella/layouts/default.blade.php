<!doctype html>
<html lang="en-US">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <title>CrystalBella.mk</title>
    {{--<link rel="shortcut icon" href="{{ url_assets('') }}/assets/crystal-bella/images/logo-smaleno.png">--}}

    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/settings.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/swatches-and-photos.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/prettyPhoto.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/jquery.selectBox.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/font-awesome.min.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/elegant-icon.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/style.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/commerce.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/custom.css') }}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/css/magnific-popup.css') }}' type='text/css' media='all'/>

    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/slick/slick.css') }}' type='text/css' media='all'/>

    <link rel='stylesheet' href='{{ url_assets('/crystal-bella/slick/slick-theme.css') }}' type='text/css' media='all'/>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ url_assets('/crystal-bella/js/magnify-master/dist/css/magnify.css') }}">

    @include('clients._partials.global-styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @include('clients._partials.pixel-events')
</head>
<body>



@include('clients.crystal-bella.partials.header')

@yield('content')

@include('clients.crystal-bella.partials.footer')


    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery-migrate.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.themepunch.tools.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.themepunch.revolution.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/easing.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/imagesloaded.pkgd.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/bootstrap.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/superfish-1.7.4.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.appear.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/script.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/swatches-and-photos.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.cookie.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.prettyPhoto.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.prettyPhoto.init.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.selectBox.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.touchSwipe.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.transit.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.carouFredSel.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/jquery.magnific-popup.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/isotope.pkgd.min.js') }}'></script>

    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.video.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.slideanims.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.actions.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.layeranimation.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.kenburn.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.navigation.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.migration.min.js') }}'></script>
    <script type='text/javascript' src='{{ url_assets('/crystal-bella/js/extensions/revolution.extension.parallax.min.js') }}'></script>

    <script src="{{ url_assets('/crystal-bella/js/magnify-master/dist/js/jquery.magnify.js') }}"></script>

    <script type='text/javascript' src='{{ url_assets('/crystal-bella/slick/slick.min.js') }}'></script>
    <script type="text/javascript">

        var tpj = jQuery;
        var $ = jQuery;

        var revapi7;
        tpj(document).ready(function() {
            if(tpj("#rev_slider").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider");
            }else{
                revapi7 = tpj("#rev_slider").show().revolution({
                    sliderType:"standard",
                    sliderLayout:"fullwidth",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation:"off",
                        onHoverStop:"on",
                        touch:{
                            touchenabled:"on",
                            swipe_threshold: 75,
                            swipe_min_touches: 50,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style:"gyges",
                            enable:true,
                            hide_onmobile:true,
                            hide_under:600,
                            hide_onleave:true,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            tmp:'',
                            left: {
                                h_align:"left",
                                v_align:"center",
                                h_offset:30,
                                v_offset:0
                            },
                            right: {
                                h_align:"right",
                                v_align:"center",
                                h_offset:30,
                                v_offset:0
                            }
                        }
                        ,
                        bullets: {
                            enable:true,
                            hide_onmobile:true,
                            hide_under:600,
                            style:"hephaistos",
                            hide_onleave:true,
                            hide_delay:200,
                            hide_delay_mobile:1200,
                            direction:"horizontal",
                            h_align:"center",
                            v_align:"bottom",
                            h_offset:0,
                            v_offset:30,
                            space:5,
                            tmp:''
                        }
                    },
                    gridwidth:1170,
                    gridheight:600,
                    lazyType:"smart",
                    parallax: {
                        type:"mouse",
                        origo:"slidercenter",
                        speed:2000,
                        levels:[2,3,4,5,6,7,12,16,10,50],
                    },
                    shadow:0,
                    spinner:"off",
                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,
                    shuffle:"off",
                    autoHeight:"off",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    startWithSlide:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        nextSlideOnWindowFocus:"off",
                        disableFocusListener:false,
                    }
                });
            }
        });	/*ready*/

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
<script>

    $(".more-filters input").on("click", function(){
        $(".filters-container").slideToggle();
    });

    if($(window).width() <= 450) {
        $("th.product-thumbnail").attr("colspan", "1");
        $(".total-cart-info td[colspan]").attr("colspan", "3");
    }

    $(document).ready(function(){

        $("#bag").on("click", function(){
            $("#shoppingCart").css('transform', 'translate3d(0, 0, 0)');
        });

        $(".close-button-side-cart i").on("click", function(){
            $("#shoppingCart").css('transform', 'translate3d(290px, 0, 0)');
        });

        $("ul.products.columns-4").slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            responsive: [
                {
                    breakpoint: 951,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 731,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 471,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.zoom').magnify({
            speed: 100,
            magnifiedWidth: 750,
            magnifiedHeight: 750
        });

        // $(".tp-caption.white-button.rev-btn").each(function(){
        //     var ww = $( window ).width();
        //     var tw = $(this).width();
        //     var x = (ww - tw) / 2;
        //     console.log("ww "+ww);
        //     console.log("tw "+tw);
        //     console.log("x "+x);
        //     //$(this).attr("data-x", x);
        // });
    });

</script>






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



                            @if(\EasyShop\Models\AdminSettings::getField('pixelCode'))
                            fbq('track', 'InitiateCheckout', {
                                value: result.totalPrice,
                                currency: window.ES.facebook_pixels_currency,
                                num_items: result.productIds.length,
                                content_ids: result.productIds,
                                content_type: 'product'
                            });
                            @endif

                            $("input[name='FirstName']").remove();
                            $("input[name='LastName']").remove();
                            $("input[name='Email']").remove();
                            $("input[name='Telephone']").remove();
                            $("select[name='Country']").remove();
                            $("[name='City']").remove();
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

</body>
</html>