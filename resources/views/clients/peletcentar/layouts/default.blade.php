<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    {{-- Meta tags --}}
    @include('clients._partials.meta')

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{url_assets('/peletcentar/css/bootstrap.css')}}" >

    <!-- Mega menu -->
    <link rel="stylesheet" type="text/css" href="{{url_assets('/peletcentar/css/megamenu.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{url_assets('/peletcentar/css/style.css')}}">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{url_assets('/peletcentar/css/colors/color1.css')}}" id="colors">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto+Condensed:400,700|Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">

    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{url_assets('/peletcentar/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url_assets('/peletcentar/css/jquery.fancybox.min.css')}}">

    <!-- Favicon and touch icons  -->
    <link href="{{url_assets('/peletcentar/icon/apple-touch-icon-48-precomposed.png')}}" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="{{url_assets('/peletcentar/icon/apple-touch-icon-32-precomposed.png')}}" rel="apple-touch-icon-precomposed">
    <link href="{{url_assets('/peletcentar/icon/icon.jpg')}}" rel="shortcut icon">
    <link rel="stylesheet" href="{{url_assets('/peletcentar/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{url_assets('/peletcentar/external/magnific-popup/magnific-popup.css')}}">

    @include('clients._partials.global-styles')

    {{-- <script src="{{url_assets('/peletcentar/javascript/html5shiv.js')}}"></script> --}}
    {{-- <script src="{{url_assets('/peletcentar/javascript/respond.min.js')}}"></script> --}}

    <!-- Facebook Pixel Code -->
    @include('clients._partials.pixel-init')
    <!-- End Facebook Pixel Code -->
        <style>
        </style>
</head>
@include('clients._partials.pixel-events')
<body>
@include('clients.peletcentar.partials.header')
<div id="content" class="post-wrap product-page  sidebar-left flat-reset">
@yield('content')
</div>
@include('clients.peletcentar.partials.footer')

<script src="{{url_assets('/peletcentar/js/swiper.min.js')}}"></script>

<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.easing.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/imagesloaded.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery-waypoints.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/main.js')}}"></script>
<script src="{{ url_assets('/peletcentar/js/owl.carousel.min.js')}}"></script>
<script src="{{ url_assets('/peletcentar/js/owl.carousel2.thumbs.js')}}"></script>
<script src="{{ url_assets('/peletcentar/js/owl.carousel.js')}}"></script>


<!-- Revolution Slider -->
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/slider.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/js/jquery.fancybox.min.js')}}"></script>
<script type="text/javascript" src="{{url_assets('/peletcentar/external/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{}}"></script> --}}
{{-- <script src="{{ url_assets('/peletcentar/js/owl.carousel2.thumbs.js')}}"></script>
<script src="{{ url_assets('/peletcentar/js/owl.carousel.js')}}"></script> --}}



@include('clients._partials.es-object')
@include('clients._partials.global-scripts')


<script>
    $(document).ready(function(){
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        items: 1,
      });
      
      // Custom Button
      $('.customNextBtn').click(function() {
        owl.trigger('next.owl.carousel');
      });
      $('.customPreviousBtn').click(function() {
        owl.trigger('prev.owl.carousel');
      });
      
    });</script>
<script>
    $("#zoom_01").elevateZoom({
        zoomType : "inner",
        cursor: "crosshair"
    });
</script>
<script>
    $(document).ready(function() {
        var swiper = new Swiper('#swipe1', {
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next i',
                prevEl: '.swiper-button-prev i',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });
        var swiper2 = new Swiper('#swipe2', {
            slidesPerView: 4,
            slidesPerGroup: 4,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
            loop: true,
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
        var swiper3 = new Swiper('#swipe3', {
            slidesPerView: 4,
            slidesPerGroup: 4,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
            loop: true,
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });

        
        var swiper4 = new Swiper('#swipe4', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 20000,
                disableOnInteraction: false,
            },
        });
        var swiper5 = new Swiper('#swipe5', {
            slidesPerView: 4,
            slidesPerGroup: 4,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
            loop: true,
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
        if($('#swipe2').length) {
            $(window).resize(function () {
                var ww = $(window).width()
                if (ww > 1000) {
                    swiper2.params.slidesPerView = 4;
                    swiper2.params.slidesPerGroup = 4;
                    swiper2.simulateTouch = false;
                }
                if (ww > 600 && ww <= 1000) {
                    swiper2.params.slidesPerView = 3;
                    swiper2.params.slidesPerGroup = 3;
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

        if($('#swipe3').length) {
            $(window).resize(function () {
                var ww = $(window).width()
                if (ww > 1000) {
                   swiper3.params.slidesPerView = 4;
                   swiper3.params.slidesPerGroup = 4;
                   swiper3.simulateTouch = false;
                }
                if (ww > 600 && ww <= 1000) {
                   swiper3.params.slidesPerView = 3;
                   swiper3.params.slidesPerGroup = 3;
                   swiper3.simulateTouch = false;
                }
                if (ww > 425 && ww <= 600) {
                   swiper3.params.slidesPerView = 2;
                   swiper3.params.slidesPerGroup = 2;
                   swiper3.simulateTouch = false;
                }
                if (ww <= 425) {
                   swiper3.params.slidesPerView = 1;
                   swiper3.params.slidesPerGroup = 1;
                   swiper3.simulateTouch = false;
                }
               swiper3.update()
            })
        }

        if($('#swipe5').length) {
            $(window).resize(function () {
                var ww = $(window).width()
                if (ww > 1000) {
                   swiper5.params.slidesPerView = 4;
                   swiper5.params.slidesPerGroup = 4;
                   swiper5.simulateTouch = false;
                }
                if (ww > 600 && ww <= 1000) {
                   swiper5.params.slidesPerView = 3;
                   swiper5.params.slidesPerGroup = 3;
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

        $("[data-fancybox]").fancybox({
            // Options will go here
        });
        if ($('.zoomGalleryActive').length) {
            $('.zoomGalleryActive').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                },
//            closeOnContentClick: true,
//            callbacks: {
//                imageLoadComplete: function () {
//                    // fires when image in current popup finished loading
//                    // avaiable since v0.9.0
//                    console.log('Image loaded');
//                },
//
//            }
            });
        }
    });

    
</script>

<script>
   $(function() {
        // contact form animations
        $('#contact').click(function() {
            $('#contactForm').fadeToggle();
        })
        $(document).mouseup(function (e) {
            var container = $("#contactForm");

            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                container.fadeOut();
            }
        });
});
</script>

<script>
    // function openForm() {
    //   document.getElementById("myForm").style.display = "block";
    // }
    
    function closeForm() {
      document.getElementById("contactForm").style.display = "none";
    }
    </script>
@section('scripts')
@show


</body>
</html>