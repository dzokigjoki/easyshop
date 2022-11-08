<!DOCTYPE html>
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
{{-- Meta tags --}}
    @include('clients._partials.meta')
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/topprodukti/js/bootstrap/css/bootstrap.min.css?v=2" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/topprodukti/css/font-awesome/css/font-awesome.min.css?v=2" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/topprodukti/css/stylesheet.css?v=7" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/topprodukti/css/owl.carousel.css?v=3" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/topprodukti/css/owl.transitions.css?v=3" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/topprodukti/css/responsive.css?v=3" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/topprodukti/css/stylesheet-skin3.css?v=3" />
<link href='//fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<!-- CSS Part End-->
@include('clients._partials.global-styles')

<!-- Facebook Pixel Code -->
@include('clients._partials.pixel-init')
<!-- End Facebook Pixel Code -->
</head>
@include('clients._partials.pixel-events')

<body class="{{isset($pageName) ? $pageName : ''}}">
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    @include('clients.topprodukti.partials.topbar')
    <!-- Top Bar End-->
    @include('clients.topprodukti.partials.header')
    <!-- Main Menu Start-->
    @include('clients.topprodukti.partials.navmenu')
    <!-- Main Menu End-->
  </div>
  <div id="container">
    <div class="container">
        <div class="row">
            <!--Middle Part Start-->
            @if (session('success_message'))
                <div style="text-align:center" class="alert alert-success">
                    {{ session('success_message') }}
                </div>
            @endif

            <div id="content" class="col-xs-12">
              @yield('content')
            </div>
        </div>
    </div>
  </div>
  @include('clients.topprodukti.partials.footer')
</div>
  @section('scripts')
  @show

<div class="social-grp">
    <a target="_blank"
    @if(config( 'app.client') === 'topprodukti_mk')
    href="https://www.facebook.com/Продукти-Мк-447795322093597"
    @else
    href="https://business.facebook.com/Top-Top-Store-1469874556643385"
    @endif
    >
        <img width="50" src="/assets/topprodukti/image/socialicons/fb_btn.jpg" />
    </a>
</div>

</body>
</html>