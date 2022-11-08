<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
  @include('clients._partials.meta')

  <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Nunito+Sans:200,300,400,600,700,900&display=swap&subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/exist-font/style.css?v=2')}}">
  <!-- CSS Library-->
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/owl-carousel/assets/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/slick/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/magnific-popup/dist/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/animate.css/animate.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/jquery-ui/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/revolution/css/settings.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/revolution/css/layers.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/revolution/css/navigation.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/css/sliders/slider-2.css')}}">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">



  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

  <!-- Custom-->
  <link rel="stylesheet" href="{{url_assets('/mymoda/css/additional.css?v=5')}}">

  <link rel="stylesheet" href="{{url_assets('/mymoda/css/main.css?v=22')}}">
  <style>
    .ps-badge.ps-badge--sale-hot.ps-badge--1st {
      background-color: #CA2028;
    }

    .slideshow{

      cursor: pointer;
    }
    #main-content {
      width: 100% !important;
    }

    .discounted-price {
      color: #000;
      font-weight: 700;
    }

    .old-price {
      opacity: 1 !important;
      font-weight: 700;
    }

    @media(max-width: 767px) {
      table.table-shopping-cart.table-responsive {
        border: none;
      }
    }

    @media(max-width: 460px) {
      .ps-product__content {
        min-height: 85px;
        height: 85px;
      }
    }
  </style>


  <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
  <!--WARNING: Respond.js doesn't work if you view the page via file://-->
  <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->

  @include('clients._partials.global-styles')
  @include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">


  @include('clients.mymoda.partials.header')
  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=104387700050274";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  <div id="main-content">
    @yield('content')
  </div>

  @include('clients.mymoda.partials.footer')


  <div id="back2top" class="hidden-xs">Најгоре <i class="exist-rightarrow"></i></div>
  <!-- JS Library-->
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/bootstrap/dist/js/bootstrap.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/owl-carousel/owl.carousel.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/masonry.pkgd.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/imagesloaded.pkgd.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/isotope.pkgd.min.js')}}"></script>

  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/jquery.matchHeight-min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/wow.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/gmap3.min.js')}}"></script>
  <!-- Custom scripts-->
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}">
  </script>
  <script src="{{url_assets('/mymoda/js/slider_2.js')}}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAckIeA7eVaNv2fKmIKl-udHqlZW2tYxME&amp;region=GB"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/slick/slick/slick.min.js')}}"></script>

  <script type="text/javascript" src="{{url_assets('/mymoda/js/main.js?v=5')}}"></script>

  {{-- <script src="{{url_assets('/mymoda/plugins/jquery.elevateZoom-3.0.8.min.js')}}"></script> --}}
  @include('clients._partials.es-object')
  @include('clients._partials.global-scripts')
  <script>
    $(document).ready(function() {
      $(".search-top-button").click(function() {
        $('#searchModal').toggle();
        $('#fokus').focus();
      });
    });
  </script>

  @section('scripts')
  @show
</body>

</html>