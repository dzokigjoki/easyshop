<!doctype html>
<html lang="en-US">

<head>
    @include('clients._partials.meta')
    @include('clients._partials.favicon')
    <link rel="icon" type="images/favicon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/linea-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/linea-basic.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/linea-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/linea-basic-elaboration.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/linea-music.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/linea-software.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/slick-theme.css?v=1') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/chosen.css?v=3') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/woocommerce.css?v=11') }}">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/animate.min.css?v=1') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/sofu/css/style.css?v=45') }}">

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="102385948343984" theme_color="#bda47d">
    </div>

    @include('clients._partials.global-styles')

    @section('style')
    @show

    @include('clients._partials.pixel-init')
    @include('clients._partials.global-styles')
</head>


<body>
    @include('clients.sofu.partials.header')


    @yield('content')



    @include('clients.sofu.partials.footer')

    <div class="modal fade modal-wrapper" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area sp-area row">
                        <div class="col-xl-5 col-sm-6">
                            <div class="sp-img_area">
                                <img id="image_modal" src="">
                            </div>
                        </div>
                        <div class="col-xl-7 col-sm-6">
                            <div class="sp-content">
                                <div class="sp-essential_stuff">
                                    <h5 class="pb-30" id="title_modal"></h5>
                                    <div class="price-box pb-60">
                                        <span class="old-price" id="old_price_modal"></span>
                                        <span class="new-price" id="new_price_modal"></span>

                                    </div>
                                    <h5>Опис:</h5>
                                    <div id="description_modal"></div>
                                </div>
                                <div class="variations_button">
                                    <button id="modal_button" data-add-to-cart="" class="single_add_to_cart_button product_added button alt" type="submit">Додади во кошничка</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input id="direct_buy" type="hidden" name="direct_buy" value="1">
    <!-- JS
============================================ -->
    <script type="text/javascript" src="{{ url_assets('/sofu/js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/sofu/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="https://kit.fontawesome.com/3a7a251dd0.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url_assets('/sofu/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{url_assets('/sofu/js/jquery.zoom.min.js')}}"></script>
    <script type="text/javascript" src="{{url_assets('/sofu/js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{ url_assets('/sofu/js/jquery.debouncedresize.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/sofu/js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/sofu/js/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/sofu/js/packery-mode.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/sofu/js/nicescroll/jquery.nicescroll.min.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ url_assets('/sofu/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>


    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')

    @section('scripts')
    @show
    <script src="{{ url_assets('/sofu/js/front-end.min.js') }}"></script>
    <script src="{{ url_assets('/sofu/js/custom.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $(".toggle-searchform").click(function() {
                $('.nr-search-head').toggleClass('search_visibillity');
            })
            $('.product_added').click(function() {
                $("#nr-cart-header").removeClass('empty_120');
            })
            var $stickyMenu = $('#header1');

            var stickyNavTop = $($stickyMenu).offset().top;



            //Get Height of Navbar Div
            var navHeight = $($stickyMenu).height();

            var stickyNav = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > stickyNavTop) {
                    $($stickyMenu).addClass('header-sticky');
                    $('html').css('padding-top', navHeight + 'px');
                } else {
                    $($stickyMenu).removeClass('header-sticky');
                    $('html').css('padding-top', 0);
                }
            };
            $(".product-innercotent").mouseenter(function() {
                $(this).children(".image_overlay_a").children(".image_overlay").addClass("show");
            });

            $(".product-innercotent").hover(function() {
                $(this).css("cursor", "pointer");
            });

            $(".product-innercotent").mouseleave(function() {
                $(this).children(".image_overlay_a").children(".image_overlay").removeClass("show");
            });
            stickyNav();

            $(window).scroll(function() {
                stickyNav();
            });


            $(".footer_link").click(function() {

                if ($(this).children("i").hasClass("fa-chevron-right")) {
                    $(this).children("i").removeClass("fa-chevron-right");
                    $(this).children("i").addClass("fa-chevron-down");

                } else if ($(this).children("i").hasClass("fa-chevron-down")) {
                    $(this).children("i").removeClass("fa-chevron-down");
                    $(this).children("i").addClass("fa-chevron-right");
                }
            })

            $('#exampleModalCenter').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var product = button.data('product');
                var newprice = button.data('newprice');
                var oldprice = button.data('oldprice');
                var image_modal = button.data('image');
                var modal = $(this);
                modal.find('.modal-body #image_modal').attr('src', image_modal);
                modal.find('.modal-body #modal_button').attr('value', product['id']);
                modal.find('.modal-body #title_modal').text(product['title']);
                modal.find('.modal-body #description_modal').html(product['description']);
                if (!(typeof oldprice === "undefined")) {

                    modal.find('.modal-body #old_price_modal').text(oldprice);

                } else {

                    modal.find('.modal-body #old_price_modal').remove();
                }
                modal.find('.modal-body #new_price_modal').text(newprice);
            })
        });

        function cookiesPolicyPrompt() {

            if (!getCookie('cookies')) {
                $("#alertCookiePolicy").show();
            }
            $('#btnAcceptCookiePolicy').on('click', function() {
                $("#alertCookiePolicy").hide("slow");
                setCookie('cookies', '1', 7)
            });
            $('#btnDeclineCookiePolicy').on('click', function() {
                $("#alertCookiePolicy").hide("slow");
                setCookie('cookies', '1', 7)
            });
        }

        $(document).ready(function() {
            cookiesPolicyPrompt();
        });



        function setCookie(name, value, minutes) {
            var expires = "";
            if (minutes) {
                var date = new Date();
                console.log(date.toUTCString());
                date.setTime(date.getTime() + minutes * 60 * 1000);
                console.log(date.toUTCString());
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }
    </script>

</body>

</html>