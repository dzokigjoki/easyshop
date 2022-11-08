<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
  @include('clients._partials.favicon')
  @include('clients._partials.meta')

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link href="apple-touch-icon.png" rel="apple-touch-icon">
  <link href="favicon.png" rel="icon">
  <meta name="author" content="Nghia Minh Luong">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>My Moda</title>
  <!-- Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Nunito+Sans:200,300,400,600,700,900&display=swap&subset=cyrillic-ext" rel="stylesheet">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/exist-font/style.css')}}">
  <!-- CSS Library-->
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/owl-carousel/assets/owl.carousel.css')}}">
  <link rel="stylesheet"
    href="{{url_assets('/mymoda/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
  <link rel="stylesheet"
    href="{{url_assets('/mymoda/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/slick/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/magnific-popup/dist/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/animate.css/animate.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/jquery-ui/jquery-ui.min.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/revolution/css/settings.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/revolution/css/layers.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/plugins/revolution/css/navigation.css')}}">
  <link rel="stylesheet" href="{{url_assets('/mymoda/css/sliders/slider-2.css')}}">
  <!-- Custom-->
  <link rel="stylesheet" href="{{url_assets('/mymoda/css/main.css')}}">
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
  @yield('content')
  @include('clients.mymoda.partials.footer')



  <div class="ps-modal" id="quick-view">
    <div class="ps-modal__container"><a class="ps-modal__remove" href="#"></a>
      <div class="ps-modal__content">
        <div class="ps-product--detail bottom quick">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
              <div class="ps-product__thumbnail">
                <div class="ps-product__large">
                  <div class="ps-product__video"><a class="video-popup"
                      href="https://www.youtube.com/watch?v=4ZighUyrsRU"><i class="exist-play"></i></a></div>
                  <div class="ps-product__images-large">
                    <div class="item"><img src="images/product-creative-content/main-1.jpg" alt=""><a
                        class="ps-product__zoom single-image-popup" href="images/product-creative-content/main-1.jpg"><i
                          class="exist-zoom"></i></a></div>
                    <div class="item"><img src="images/product-creative-content/main-1.jpg" alt=""><a
                        class="ps-product__zoom single-image-popup" href="images/product-creative-content/main-1.jpg"><i
                          class="exist-zoom"></i></a></div>
                    <div class="item"><img src="images/product-creative-content/main-1.jpg" alt=""><a
                        class="ps-product__zoom single-image-popup" href="images/product-creative-content/main-1.jpg"><i
                          class="exist-zoom"></i></a></div>
                  </div>
                </div>
                <div class="ps-product__nav">
                  <div class="item"><img src="images/product-creative-content/thumbnail-1.jpg" alt=""></div>
                  <div class="item"><img src="images/product-creative-content/thumbnail-2.jpg" alt=""></div>
                  <div class="item"><img src="images/product-creative-content/thumbnail-3.jpg" alt=""></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
              <div class="ps-product__info">
                <h1 class="ps-product__title">Baby blue t-shirt</h1>
                <h4 class="ps-product__price">$19.00</h4>
                <div class="ps-product__rating">
                  <select class="ps-rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select><span>(2 customers review)</span>
                </div>
                <div class="ps-product__short-desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed fermentum nibh, vel aliquet
                    massa. Etiam in magna id risus lacinia luctus eget eu est.</p>
                </div>
                <div class="ps-product__variants">
                  <div class="form-group">
                    <h5>Color</h5>
                    <div class="ps-radio ps-radio--inline black">
                      <input class="form-control" type="radio" id="color-1" name="type-1">
                      <label for="color-1"></label>
                    </div>
                    <div class="ps-radio ps-radio--inline white">
                      <input class="form-control" type="radio" id="color-2" name="type-1">
                      <label for="color-2"></label>
                    </div>
                    <div class="ps-radio ps-radio--inline brown">
                      <input class="form-control" type="radio" id="color-3" name="type-1">
                      <label for="color-3"></label>
                    </div>
                    <div class="ps-radio ps-radio--inline gray">
                      <input class="form-control" type="radio" id="color-4" name="type-1">
                      <label for="color-4"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <h5> Size</h5>
                    <ul class="ps-product__size">
                      <li><a href="#"><span>xs</span></a></li>
                      <li><a href="#"><span>S</span></a></li>
                      <li class="current"><a href="#"><span>M</span></a></li>
                      <li><a href="#"><span>
                            <del>L</del></span></a></li>
                      <li><a href="#"><span>
                            <del>XL</del></span></a></li>
                    </ul>
                  </div>
                </div>
                <div class="ps-product__divider"></div>
                <div class="ps-product__shopping">
                  <div class="form-group form-group--number">
                    <input class="form-control" type="text" value="1"><span class="down">-</span><span
                      class="up">+</span>
                  </div>
                  <button class="ps-btn ps-btn--black"><i class="exist-minicart mr-5"></i> Add to cart</button>
                  <ul class="ps-product__cart-action">
                    <li><a href="#"><i class="exist-heart"></i>Add to Whishlist</a></li>
                    <li><a href="#"><i class="exist-compare"></i>Compare</a></li>
                  </ul>
                  <p><strong>SKU:</strong>N/A</p>
                  <p><strong>Category:</strong><a href="#">Woman</a>,<a href="#">Top</a></p>
                </div>
                <div class="ps-product__divider"></div>
                <p class="ps-product__sharing">Share:<a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i
                      class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="back2top">Најгоре <i class="exist-rightarrow"></i></div>
  <!-- JS Library-->
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/bootstrap/dist/js/bootstrap.min.js')}}">
  </script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/owl-carousel/owl.carousel.min.js')}}">
  </script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/masonry.pkgd.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/imagesloaded.pkgd.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/isotope.pkgd.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/slick/slick/slick.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/jquery.matchHeight-min.js')}}"></script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/wow.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{url_assets('/mymoda/plugins/gmap3.min.js')}}"></script>
  <!-- Custom scripts-->
  <script type="text/javascript" src="{{url_assets('/mymoda/js/main.js')}}"></script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}">
  </script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}">
  </script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}">
  </script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}">
  </script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}">
  </script>
  <script type="text/javascript"
    src="{{url_assets('/mymoda/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}">
  </script>
  <script src="{{url_assets('/mymoda/js/slider_2.js')}}"></script>
  <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAckIeA7eVaNv2fKmIKl-udHqlZW2tYxME&amp;region=GB"></script>

  @include('clients._partials.es-object')
  @include('clients._partials.global-scripts')

  @section('scripts')w
  @show
</body>

</html>