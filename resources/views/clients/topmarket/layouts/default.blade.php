<!doctype html>
<html lang="mk">
<head>

{{-- Meta tags --}}
@include('clients._partials.meta')

<!-- Google web fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:300,400,700&amp;subset=cyrillic"
          rel="stylesheet">


    <!-- Libs CSS
        ============================================ -->
    <link rel="stylesheet" href="/assets/topmarket/css/animate.css">
    <link rel="stylesheet" href="/assets/topmarket/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/topmarket/css/bootstrap-switch.css">
    <link rel="stylesheet" href="/assets/topmarket/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/topmarket/css/jquery.selectbox.css">
    <link rel="stylesheet" href="/assets/topmarket/css/owl.carousel.css">
    <link rel="stylesheet" href="/assets/topmarket/css/prettyPhoto.css">
    <link rel="stylesheet" href="/assets/topmarket/css/responsive.css">
    <link rel="stylesheet" href="/assets/topmarket/css/revslider.css">
    <link href="/assets/topmarket/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/topmarket/css/style.css?<?php echo filemtime('./assets/topmarket/css/style.css'); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{--<script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>--}}



@include('clients._partials.global-styles')

<!-- Facebook Pixel Code -->
@include('clients._partials.pixel-init')
<!-- End Facebook Pixel Code -->
</head>
@include('clients._partials.pixel-events')
<body class="{{isset($pageName) ? $pageName : ''}}">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="1417815528314701">
</div>
<!-- - - - - - - - - - - - - - Main Wrapper - - - - - - - - - - - - - - - - -->

<div class="wrapper">

    <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

@include('clients.topmarket.partials.header')
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- - - - - - - - - - - - - - End Header - - - - - - - - - - - - - - - - -->
    <section id="content">
    <!-- - - - - - - - - - - - - - Page Wrapper - - - - - - - - - - - - - - - - -->

    <div class="message-holder">
        @if (session('success'))
            <div class="alert_box success">
                {!! session('success') !!}
                <button class="close_alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert_box error">
                {!! session('error') !!}
                <button class="close_alert"></button>
            </div>
        @endif
    </div>
<div class="container">
@yield('content')
</div>

<!-- - - - - - - - - - - - - - End Page Wrapper - - - - - - - - - - - - - - - - -->
    </section>
</div><!--/ [layout]-->
    <!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->
<div class="steps-block steps-block-blue">
    <div class="container">
        <div class="row">
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-truck" ></i>
                <div>
                    <h2>110 ден. достава</h2>
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
                    <h2 style="padding-top: 15px;">
                        <a id="footer_phone" href="tel:0038971670203" style="color: white;">+389 71 670 203</a>
                        {{--<a href="tel:0038975492686">+389 75 492 686</a>--}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col"><br>
                <h2 style="color:white">Како да нарачам?</h2>
                <p>Сите производи кои ги имаме на залиха можете да ги купите со директна нарачка на нашиот сајт.
                    Изберете го посакуваниот производ и кликнете на копчето „Додај во кошничка“ на страницата на производот.
                    Вашата потрошувачка кошничка се наоѓа во десниот горен агол од сајтот. За да ги нарачате производите кои се наоѓаат
                    во Вашата кошничка, кликнете на копчето „Купи“.
                    Ќе добиете e-mail порака за потврда на нарачката.</p>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->

            <!-- BEGIN TWITTER BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col" style="margin-top: 20px;">
                    <div class="fb-page" data-href="https://www.facebook.com/topmarketmk/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/topmarketmk/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/topmarketmk/">TopMarket.mk</a></blockquote></div>
                </div>
            <!-- END TWITTER BLOCK -->

            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-4 col-sm-6 pre-footer-col"><br>
                <h2 style="color:white">Контакт</h2>
                <address class="margin-bottom-10">
                    Tелефон/Viber: 071/670-203
                    <br><br>
                    Email: <a href="mailto:info@topmarket.mk" style="color: white">info@topmarket.mk</a>
                </address>

            </div>
            <!-- END BOTTOM CONTACTS -->
        </div>
    </div>
</div>
@include('clients.topmarket.partials.footer')

<!-- - - - - - - - - - - - - - End Footer - - - - - - - - - - - - - - - - -->

<!-- - - - - - - - - - - - - - End Main Wrapper - - - - - - - - - - - - - - - - -->

<!-- Include Libs & Plugins
		============================================ -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/assets/topmarket/js/jquery.placeholder.js"></script>
<script src="/assets/topmarket/js/jquery.hoverIntent.min.js"></script>
<script src="/assets/topmarket/js/bootstrap.min.js"></script>
<script src="/assets/topmarket/js/smoothscroll.js"></script>
<script src="/assets/topmarket/js/jquery.debouncedresize.js"></script>
<script src="/assets/topmarket/js/twitter/jquery.tweet.min.js"></script>
<script src="/assets/topmarket/js/jquery.flexslider-min.js"></script>
<script src="/assets/topmarket/js/owl.carousel.min.js"></script>
<script src="/assets/topmarket/js/jflickrfeed.min.js"></script>
<script src="/assets/topmarket/js/jquery.prettyPhoto.js"></script>
<script src="/assets/topmarket/js/jquery.themepunch.tools.min.js"></script>
<script src="/assets/topmarket/js/jquery.themepunch.revolution.min.js"></script>
<script src="/assets/topmarket/js/main.js?<?php echo filemtime('./assets/topmarket/js/main.js'); ?>"></script>
{{--<script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>--}}
@include('clients._partials.es-object')
<script>
    $(function () {

        // Slider Revolution
        jQuery('#slider-rev').revolution({
            delay: 5000,
            startwidth: 1170,
            startheight: 600,
            onHoverStop: "true",
            hideThumbs: 250,
            navigationHAlign: "center",
            navigationVAlign: "bottom",
            navigationHOffset: 0,
            navigationVOffset: 20,
            soloArrowLeftHalign: "left",
            soloArrowLeftValign: "center",
            soloArrowLeftHOffset: 0,
            soloArrowLeftVOffset: 0,
            soloArrowRightHalign: "right",
            soloArrowRightValign: "center",
            soloArrowRightHOffset: 0,
            soloArrowRightVOffset: 0,
            touchenabled: "on",
            stopAtSlide: -1,
            stopAfterLoops: -1,
            dottedOverlay: "none",
            fullWidth: "on",
            spinned: "spinner2",
            shadow: 0,
            hideTimerBar: "on",
            // navigationStyle:"preview3"
        });

    });
</script>
@include('clients._partials.global-scripts')
@section('scripts')
@show


<input id="direct_buy" type="hidden" name="direct_buy" value="1">


</body>
</html>