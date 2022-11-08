<!DOCTYPE html>
<html lang="en">

<head>
    @include('clients._partials.favicon')
    @include('clients._partials.meta')

    <meta charset="utf-8">

    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link
        href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic"
        rel="stylesheet">


    <style>
        input:focus {
            outline: 0 !important;
        }
        button:focus {
            outline: 0 !important;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/bootstrap.css') }}"
        media="screen">

    <!-- REVOLUTION BANNER CSS SETTINGS -->

    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/fullwidth.css?v=1') }}"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/settings.css?v=1') }}"
        media="screen" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css?v=1" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/font-awesome.css') }}"
        media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/jquery.bxslider.css') }}"
        media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/style.css?v=25') }}"
        media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/responsive.css?v=1') }}"
        media="screen">
    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/magnific-popup.css?v=1') }}"
        media="screen">


    {{--<link rel="icon" href="{{ url_assets('/shopathome/images/favicon.png') }}" type="image/x-icon">--}}
    <link rel="stylesheet" href="{{ url_assets('/shopathome/css/swiper.min.css?v=7') }}">
    {{-- <link rel="stylesheet" href="{{ url_assets('/shopathome/owl-carousel/owl.carousel.css') }}"> --}}

    <!-- REVOLUTION BANNER CSS SETTINGS -->

    <link rel="stylesheet" type="text/css" href="{{ url_assets('/shopathome/css/flexslider.css?v=1') }}"
        media="screen">

    @include('clients._partials.global-styles')
    @include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')

<body>
    <div id="container">
        @include('clients.shopathome.partials.header')
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
        @include('clients.shopathome.partials.footer')
    </div>

    <script type="text/javascript" src="{{ url_assets('/shopathome/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.superfish.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.bxslider.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/bootstrap.js') }}"></script>
    {{--<script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.nicescroll.min.js') }}">
    </script>
    --}}
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.isotope.min.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.imagesloaded.min.js') }}">
    </script>
    <!-- jQuery KenBurn Slider  -->
    {{--<script type="text/javascript" src="{{ url_assets('/shopathome/js/retina-1.1.0.min.js') }}"></script>
    --}}
    <script type="text/javascript"
        src="{{ url_assets('/shopathome/js/jquery.themepunch.revolution.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/plugins-scroll.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.countTo.js') }}"></script>

    {{--<script src="js/jquery.parallax.js"></script>--}}


    @include('clients._partials.es-object')
    @include('clients._partials.global-scripts')
    <!--
##############################
 - ACTIVATE THE BANNER HERE -
##############################
-->
    <script type="text/javascript">
        $(document).ready(function() {
        var swiper = new Swiper('#swipe1', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: false,
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
        var swiper2 = new Swiper('#swipe2', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: false,
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
        var swiper5 = new Swiper('#swipe5', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: false,
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

        var swiper6 = new Swiper('#swipe6', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: false,
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

        var swiper4 = new Swiper('#swipe4', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: false,
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
        var swiperSlider = new Swiper('#swipeSlider', {
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
        if($('#swipe2').length) {
            $(window).resize(function () {
                var ww = $(window).width()
                if (ww > 1000) {
                    swiper2.params.slidesPerView = 4;
                    swiper2.params.slidesPerGroup = 1;
                    swiper2.simulateTouch = true;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper2.params.slidesPerView = 4;
                    swiper2.params.slidesPerGroup = 1;
                    swiper2.simulateTouch = false;
                }
                if (ww > 425 && ww <= 600) {
                    swiper2.params.slidesPerView = 2;
                    swiper2.params.slidesPerGroup = 2;
                    swiper2.simulateTouch = false;
                }
                if (ww <= 425) {
                    swiper2.params.slidesPerView = 1;
                    swiper2.params.slidesPerGroup = 1;
                    swiper2.simulateTouch = false;
                }
                swiper2.update()
            })
        }
        $(window).trigger('resize');
        if($('#swipe5').length) {
            $(window).resize(function () {
                var ww = $(window).width()
                if (ww > 1000) {
                    swiper5.params.slidesPerView = 4;
                    swiper5.params.slidesPerGroup = 1;
                    swiper5.simulateTouch = true;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper5.params.slidesPerView = 4;
                    swiper5.params.slidesPerGroup = 1;
                    swiper5.simulateTouch = false;
                }
                if (ww > 425 && ww <= 600) {
                    swiper5.params.slidesPerView = 2;
                    swiper5.params.slidesPerGroup = 2;
                    swiper5.simulateTouch = false;
                }
                if (ww <= 425) {
                    swiper5.params.slidesPerView = 1;
                    swiper5.params.slidesPerGroup = 1;
                    swiper5.simulateTouch = false;
                }
                swiper5.update()
            })
        }
        $(window).trigger('resize');
        if($('#swipe6').length) {
            $(window).resize(function () {
                var ww = $(window).width()
                if (ww > 1000) {
                    swiper6.params.slidesPerView = 4;
                    swiper6.params.slidesPerGroup = 1;
                    swiper6.simulateTouch = true;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper6.params.slidesPerView = 4;
                    swiper6.params.slidesPerGroup = 1;
                    swiper6.simulateTouch = false;
                }
                if (ww > 425 && ww <= 600) {
                    swiper6.params.slidesPerView = 2;
                    swiper6.params.slidesPerGroup = 2;
                    swiper6.simulateTouch = false;
                }
                if (ww > 300 && ww <= 425) {
                    swiper6.params.slidesPerView = 1;
                    swiper6.params.slidesPerGroup = 1;
                    swiper6.simulateTouch = false;
                }
                swiper6.update()
            })
        }
    });

    $(document).ready(function() {
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > 0) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

        if ($.fn.cssOriginal!=undefined)
            $.fn.css = $.fn.cssOriginal;

        var api = $('.fullwidthbanner').revolution(
            {
                delay:8000,
                startwidth:1170,
                startheight:625,

                onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off

                thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
                thumbHeight:50,
                thumbAmount:3,

                hideThumbs:0,
                navigationType:"bullet",				// bullet, thumb, none
                navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

                navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


                navigationHAlign:"center",				// Vertical Align top,center,bottom
                navigationVAlign:"bottom",					// Horizontal Align left,center,right
                navigationHOffset:30,
                navigationVOffset: 40,

                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:40,
                soloArrowLeftVOffset:0,

                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:40,
                soloArrowRightVOffset:0,

                touchenabled:"on",						// Enable Swipe Function : on/off


                stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
                stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

                hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
                hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
                hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


                fullWidth:"on",

                shadow:1								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

            });


        // TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
        // YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
        api.bind("revolution.slide.onloaded",function (e) {


            jQuery('.tparrows').each(function() {
                var arrows=jQuery(this);

                var timer = setInterval(function() {

                    if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
                        arrows.fadeOut(300);
                },3000);
            })

            jQuery('.tp-simpleresponsive, .tparrows').hover(function() {
                jQuery('.tp-simpleresponsive').addClass("mouseisover");
                jQuery('body').find('.tparrows').each(function() {
                    jQuery(this).fadeIn(300);
                });
            }, function() {
                if (!jQuery(this).hasClass("tparrows"))
                    jQuery('.tp-simpleresponsive').removeClass("mouseisover");
            })
        });
        // END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS
    });

    </script>
    <script>
        // $( "#tabs" ).tabs();
    // $( "#accordion" ).accordion();
    </script>
    <script>
        $('.hamburger').click (function(){
        $(this).toggleClass('open');
    });
    </script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/smoothproducts.min.js') }}"></script>
    <script>
        $(document).ready(function(){
        // console.log( $(".search-top-button"));
        $(".search-top-button").click(function(){
            $('#searchModal').toggle();
            $('#fokus').focus();
        });


        $( "#searchbar" ).click(function() {
         $("#searchbar_hidden").toggleClass( "searchbar_show" );
         $("#searchbar_hidden").toggleClass( "searchbar_hidden" );
         });
    
         $(document).scroll(function() {
   if($(window).scrollTop() == 0) {
     $('#myHeader').removeClass("sticky");

     $('#myHeader').addClass("navbar-container");
   }
});
        
    
    
    });
    </script>
    <script type="text/javascript">
        /* wait for images to load */
    $(window).load( function() {
        // $('.sp-wrap').smoothproducts();
        $('[data-elavate-zoom]').elevateZoom({
            zoomType: 'lens',
            cursor: 'pointer',
            zoomLevel: 3
        });
    });
    </script>
    {{--<script type="text/javascript" src="{{ url_assets('') }}/assets/shopathome/js/retina-1.1.0.min.js"></script>--}}
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.magnific-popup.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/plugins-scroll.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.countTo.js') }}"></script>
    <script src="{{ url_assets('/shopathome/js/jquery.parallax.js') }}"></script>
    <script src="{{ url_assets('/shopathome/js/jquery.elevatezoom.js') }}"></script>
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.carouFredSel.js') }}"></script>
    {{--<script type="text/javascript" src="{{ url_assets('') }}/assets/shopathome/js/jquery.mousewheel.min.js">
    </script>
    --}}
    <script type="text/javascript" src="{{ url_assets('/shopathome/js/jquery.touchSwipe.min.js') }}"></script>
    <script>
        $('.popup').magnificPopup({
            type: 'image'
        });
    </script>

    @section('scripts')
    @show
</body>

</html>