<!DOCTYPE HTML>
<html>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    {{-- Meta tags --}}
    @include('clients._partials.meta')

    {{-- Favicon --}}
    @include('clients._partials.favicon')

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="//assets.smartsoft.mk/easyshop/ibutik/css/bootstrap.css">
    <link rel="stylesheet" href="//assets.smartsoft.mk/easyshop/ibutik/css/font-awesome.css">
    <link rel="stylesheet" href="https://assets.smartsoft.mk/easyshop/ibutik/css/styles.css?v=4">
    {{--<link rel="stylesheet" href="/assets/ibutik/styles.css?v=2">--}}
    {{--<link rel="stylesheet" href="//assets.smartsoft.mk/easyshop/ibutik/css/mystyles.css">--}}
    <link rel="stylesheet" href="//assets.smartsoft.mk/easyshop/ibutik/css/magnific-popup.css">
    {{--<link rel="stylesheet" href="//assets.smartsoft.mk/easyshop/ibutik/css/owl.carousel.min.css">--}}
    <link rel="stylesheet" href="//assets.smartsoft.mk/easyshop/ibutik/css/responsiveslides.css">
    <link rel="stylesheet" href="//assets.smartsoft.mk/easyshop/ibutik/css/rev1.css">
    <link href="//assets.smartsoft.mk/easyshop/ibutik/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
    @include('clients._partials.global-styles')
</head>

<body>
<div style="font-size: 13px; font-family: 'Roboto Condensed"  class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-7 col-sm-7 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><a href="{{route('blog', [1, 'za-nas'])}}" >За нас</a></li>
                    <li><a href="{{route('blog', [2, 'kako-da-naracham'])}}">Како да нарачам</a></li>
                    <li style="border-right: none;">Контакт:</li>
                    <li><a href="tel:0038977908080" ><i class="fa fa-phone"></i><span>+389 77 908 080</span></a></li>
                    <li><a href="" ><i class="fa fa-envelope"></i><span>ibutikmk@gmail.com</span></a></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-4 col-md-offset-1 col-sm-4 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @if(!Auth::check())
                        <li><a href="{{route('auth.login.get')}}" >Најава</a></li>
                        <li><a href="{{route('auth.register.get')}}" >Регистрација</a></li>
                    @else
                        <li><a href="{{route('profiles.get')}}">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a> </li>
                        <li><a href="{{route('order.history')}}">Историја</a></li>
                        <li><a href="{{route('auth.logout.get')}}" >Одјави се</a></li>
                    @endif

                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<div class="global-wrapper clearfix" id="global-wrapper"
     style="background-image: url(https://assets.smartsoft.mk/easyshop/ibutik/img/patterns/binding_light.png);">

    @include('clients.ibutik.partials.header')

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    @yield('content')

</div>
<div class="steps-block steps-block-blue">
    <div class="container">
        <div class="row">
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-truck" ></i>
                <div>
                    <h2>Бесплатна достава</h2>
                    <em>во сите градови во Македонија</em>
                </div>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-gift"></i>
                <div>
                    <h2>Неделни и месечни попусти</h2>
                    {{--<em>проверувајте ги нашaта Facebook и веб страна</em>--}}
                </div>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-check"></i>
                <div>
                    <h2>Направете нарачка 24/7</h2>
                    {{--<em>проверувајте ги нашaта Facebook и веб страна</em>--}}
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="main-footer">
        <div class="container">
            <div class="row row-col-gap" data-gutter="60">
                <div class="col-md-3">
                    <h4 class="widget-title-sm">iButik.mk</h4>
                    <p>Телефони и таблети: ПРОДАЖБА, ОТКУП, ЗАМЕНИ и СЕРВИС</p>
                    <p>Булевар Партизански Одреди, 1000 Скопје</p>
                    <p>тел .+389 77 908 080</p>
                    <p>ibutikmk@gmail.com</p>

                    <ul class="main-footer-social-list">
                        <li>
                            <a class="fa fa-facebook" target="_blank" href="https://www.facebook.com/ibutik.mk/"></a>
                        </li>
                        <li>
                            <a class="fa fa-instagram pull-left" href="https://www.instagram.com/ibutikmk/"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-offset-1 col-md-5 col-sm-6 pre-footer-col" style="margin-top: 20px;">
                    <div class="fb-page" data-href="https://www.facebook.com/ibutik.mk/" data-small-header="false"
                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/ibutik.mk/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/ibutik.mk/">ibutik.mk</a></blockquote>
                    </div>
                </div>
                {{--<div class="col-md-3">--}}
                {{--<h4 class="widget-title-sm">Newsletter</h4>--}}
                {{--<form>--}}
                {{--<div class="form-group">--}}
                {{--<label>Sign up to the newsletter</label>--}}
                {{--<input class="newsletter-input form-control" placeholder="Your e-mail address" type="text" />--}}
                {{--</div>--}}
                {{--<input class="btn btn-primary" type="submit" value="Sign up" />--}}
                {{--</form>--}}
                {{--</div>--}}
            </div>
            <ul class="main-footer-links-list">
                <li>
                    <a href="#">Како да нарачам</a>
                    <a href="#">Политика на приватност</a>
                    <a href="#">Политика на купување</a>
                </li>

            </ul>
            <img class="main-footer-img" src="https://assets.smartsoft.mk/easyshop/ibutik/images/footer.png"/>
        </div>
    </footer>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="copyright-text">Copyright &copy; <a href="#">iButik</a> {{date('Y')}}. Powered by <a
                                href="http://easyshop.mk" target="_blank"><img src="https://assets.smartsoft.mk/easyshop/logo.png" height="25"></a>.  Сите права се задржани</p>
                </div>

            </div>
        </div>
    </div>

@include('clients._partials.es-object')

<script src="//assets.smartsoft.mk/easyshop/ibutik/js/jquery.js"></script>
<script>
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/bootstrap.js"></script>
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/icheck.js"></script>
{{--<script src="https://assets.smartsoft.mk/easyshop/ibutik/js/jqzoom.js"></script>--}}
{{--<script src="https://assets.smartsoft.mk/easyshop/ibutik/js/card-payment.js"></script>--}}
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/owl-carousel.js"></script>
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/magnific.js"></script>
{{--<script src="https://assets.smartsoft.mk/easyshop/ibutik/js/pagination.js"></script>--}}
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/custom.js"></script>
{{--<script src="https://assets.smartsoft.mk/easyshop/ibutik/js/jquery.ba-bbq.min.js"></script>--}}
{{--<script src="https://assets.smartsoft.mk/easyshop/ibutik/js/paginga.jquery.js"></script>--}}
{{--<script src="https://assets.smartsoft.mk/easyshop/ibutik/js/jquery.autocomplete.js"></script>--}}
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/responsiveslides.min.js"></script>
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/bootstrap-dropdownhover.min.js"></script>
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/jquery.magnific-popup.js"></script>
<script src="//assets.smartsoft.mk/easyshop/ibutik/js/jquery.magnific-popup.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        $("#slider4").responsiveSlides({
            auto: true,
            pager: false,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });
//        $("#slider3").responsiveSlides({
//            auto: true,
//            pager: true,
//            nav: true,
//            speed: 500,
//            namespace: "callbacks",
//
//        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#elevate-zoom-pic").elevateZoom({
            // zoomType : "lens",
            lensShape : "square",
            lensSize    : 200,
            lensFadeIn: true,
            borderSize: 1
            });
        $('.zoomGalleryActive').magnificPopup({
            type: 'image',
            // gallery: {
            //     enabled: true
            // },
            closeOnContentClick:true,
            callbacks: {
                imageLoadComplete: function() {
                    // fires when image in current popup finished loading
                    // avaiable since v0.9.0
                    console.log('Image loaded');
                },

            }
        });
    })
    $('#zaHover').hover(function(){
        $('#hoverKoshnicka').show();
        $('#hoverKoshnicka').addClass("hpposition")
        }, function() {
        $('#hoverKoshnicka').hide();
    });
    $('#hoverKoshnicka').hover(function(){
        $('#hoverKoshnicka').show();
    }, function() {
        $('#hoverKoshnicka').hide();
    });
</script>
@include('clients._partials.global-scripts')

@section('scripts')
@show

</body>
</html>
