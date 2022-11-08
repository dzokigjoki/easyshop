<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  @include('clients._partials.meta')
  
  <title>clarissabalkan DOO</title>
  
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

  <link href="{{url_assets('/clarissabalkan/css/bootstrap.custom.min.css')}}" rel="stylesheet">
  <link href="{{url_assets('/clarissabalkan/css/style.css?v=6')}}" rel="stylesheet">
  <link href="{{url_assets('/clarissabalkan/css/custom.css')}}" rel="stylesheet">

  <style>
    .toast-success {
      background-color: #ffffff !important;
      color: black !important;
      box-shadow: 0px 5px 10px #999 !important;
    }

    #toast-container>.toast-success {
      background-image: url('{{ url_assets("/pneumatik/img/tick.png") }}') !important;
      background-size: 20px !important;
    }
    }
  </style>
  @include('clients._partials.global-styles')
  @if(isset($facebook_pixel_code) && isset($facebook_pixel_currency))
  @include('clients._partials.pixel-init')
  @endif

  @section('styles')
  @show

</head>
{{-- @include('clients._partials.pixel-events') --}}
<body class="ps-loading">
  <div id="page">
    @include('clients.clarissabalkan.partials.header')
    @yield('content')
    @include('clients.clarissabalkan.partials.footer')
	</div>

  <div id="toTop"></div>

  <script src="{{url_assets('/clarissabalkan/js/common_scripts.min.js')}}"></script>
  <script src="{{url_assets('/clarissabalkan/js/main.js?v=2')}}"></script>
  
  @include('clients._partials.es-object')
  @include('clients._partials.global-scripts')

  @section('scripts')
  @show
</body>

</html>