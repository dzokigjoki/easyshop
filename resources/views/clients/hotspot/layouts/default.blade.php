<!DOCTYPE html>
<html lang="en">

<head>
  @include('clients._partials.meta')

  <!-- GOOGLE WEB FONT -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

  <!-- BASE CSS -->
  <link href="{{url_assets('/hotspot/css/bootstrap.custom.min.css')}}" rel="stylesheet">
  <link href="{{url_assets('/hotspot/css/style.css?v=14')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ url_assets('/hotspot/plugins/slick/slick.css') }}" />
  <link rel="stylesheet" href="{{ url_assets('/hotspot/plugins/slick/slick-theme.css') }}" />

  <!-- YOUR CUSTOM CSS -->
  <link href="{{url_assets('/hotspot/css/custom.css')}}" rel="stylesheet">
  @include('clients._partials.global-styles')
  <style>
    .toast-success {
      background-color: #A1BE95 !important;
      color: #222 !important;
      box-shadow: -5px 5px 10px #999 !important;
    }

    #toast-container>.toast-success {
      background-image: url('{{ url_assets("/easycms/pneumatik/img/tick.png") }}') !important;
      background-size: 20px !important;
    }

    .box-shadow-hotspot {
      box-shadow: 0px 10px 27px 0px rgba(154, 161, 171, 0.18);
      -webkit-transition: all .2s ease-in-out;
      -moz-transition: all .2s ease-in-out;
      -ms-transition: all .2s ease-in-out;
      -o-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      position: relative;
      display: block;
      top: 0;
      padding: 15px;
    }

    .toast-success {
      background-color: #000 !important;
      color: #fff !important;
      box-shadow: -5px 5px 10px #333 !important;
    }

    #toast-container>.toast-success {
      background-image: url('{{ url_assets("/hotspot/img/tick.png") }}') !important;
      background-size: 20px !important;
    }
    }
  </style>

  @section('style')
  @show

  @include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')

<body>
  <div id="page">
    @include('clients.hotspot.partials.header')
    @yield('content')
    @include('clients.hotspot.partials.footer')
  </div>
  <!-- page -->

  <div id="toTop"></div><!-- Back to top button -->
  <!-- COMMON SCRIPTS -->
  <script src="{{url_assets('/hotspot/js/common_scripts.min.js')}}"></script>
  <script type="text/javascript" src="{{ url_assets('/hotspot/plugins/slick/slick.min.js')}}"></script>
  <script src="{{url_assets('/hotspot/js/main.js?v=3')}}"></script>
  @include('clients._partials.es-object')
  @include('clients._partials.global-scripts')

  @section('scripts')
  @show
</body>

</html>