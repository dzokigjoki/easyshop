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

    <!-- Stylesheets
    ============================================= -->
    <link href="{{ url_assets('/barber_shop/css/external.css')}}" rel="stylesheet">
    <link href="{{ url_assets('/barber_shop/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url_assets('/barber_shop/css/style.css')}}" rel="stylesheet">
    <link href="{{ url_assets('/barber_shop/css/_contact.scss')}}" rel="stylesheet">


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
    <div class="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div id="wrapper" class="wrapper clearfix">
            <header id="navbar-spy" class="header header-topbar header-transparent header-fixed" style="background-color:#303030;">
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
                                <a class="logo" href="index.html">
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
                                            <input type="text" class="form-control"  placeholder="Search for item..." search-input name="search" >
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
                <div class="main pt-150 pb-100 pt-50 pb-50">
                        <div class="container">
                            <!-- BEGIN SIDEBAR & CONTENT -->
                            <div class="row margin-bottom-40">
                                <!-- BEGIN CONTENT -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="shopping-cart-page text-center">
                                        <i class="fa fa-shopping-cart font-size-100 cart-color " style="font-size: 240px;line-height: normal"></i>
                                        <div class="shopping-cart-data clearfix pt-30">
                                            <a style="background-color: #BB8C4B;
                                            border-color: #BB8C4B;" class="btn btn-primary btn-lg btn-thank-you" href="{{route('home')}}">{{trans('global.messages.thank_you_for_ordering')}} </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END CONTENT -->
                            </div>
                            <!-- END SIDEBAR & CONTENT -->
                
                        </div>
                    </div>
                    <footer id="footer" class="footer">
                            <!-- Widget Section
                            ============================================= -->
                            <div class="footer-widget">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-about">
                                            <div class="footer--widget-content">
                                                <img class="mb-20" src="{{ url_assets('/barber_shop/images/logo/logo-light.png')}}" alt="logo">
                                                <p>Proin gravida nibh vel velit auctor aliquet anean lorem quis. bindum auctor, nisi elite conset ipsums sagtis id duis sed odio sit.</p>
                                                <div class="work--schedule clearfix">
                                                    <ul class="list-unstyled">
                                                        <li>Monday - Friday <span>9.00 : 17.00</span></li>
                                                        <li>Saturday <span>9.00 : 15.00</span></li>
                                                        <li>Sunday <span>9.00 : 13.00</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-contact">
                                            <div class="footer--widget-title">
                                                <h5>Категории</h5>
                                            </div>
                                            <div class="footer--widget-content">
                                                <ul class="list-unstyled mb-0">
                                                        <li><a href="{{route('blog', [5, 'za-nas'])}}">За Нас</a></li>
                                                        <li><a href="{{route('blog', [3, 'politika-na-privatnost'])}}">Политика на приватност</a></li>
                                                        <li><a href="{{route('blog', [2, 'pravila-za-kupuvanje'])}}">Правила на купување</a></li>
                                                        <li><a href="/contact">Контакт</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-contact">
                                            <div class="footer--widget-title">
                                                <h5>Контакт</h5>
                                            </div>
                                            <div class="footer--widget-content">
                                                <ul class="list-unstyled mb-0">
                                                    <li><i class="fa fa-map-marker"></i> 1220 Petersham town, Wardll St New South Wales Australia PA 6550.</li>
                                                    <li><i class="fa fa-phone"></i> (04) 491 570 110</li>
                                                    <li><i class="fa fa-envelope-o"></i> contact@zytheme.com</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- .col-md-4 end -->
                                    </div>
                                </div>
                                <!-- .container end -->
                            </div>
                            <!-- .footer-widget end -->
                            <!-- Copyrights
                            ============================================= -->
                            <div class="footer--copyright">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <span>&copy; 2019, All rights reserved.</span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                                            <div class="social">
                                                <div class="float-right-bottom center-bottom-footer">
                                                <span>Powered by: </span>    <a style="color:black;" href="https://generadevelopment.com" target="_blank"><img width="70" src="{{ url_assets('/barber_shop/images/logo/genera_logo.png') }}"></a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .container end -->
                            </div>
                        </footer>
    </div>

    <script src="{{ url_assets('/barber_shop/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{ url_assets('/barber_shop/js/plugins.js')}}"></script>
    <script src="{{ url_assets('/barber_shop/js/functions.js')}}"></script>
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
        
        </script>
        
</body>