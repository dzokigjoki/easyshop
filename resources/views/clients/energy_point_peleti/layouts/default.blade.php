<!doctype html>
<html lang="en-US">

<head>
	@include('clients._partials.meta')
	@include('clients._partials.favicon')
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<link rel="stylesheet" href="{{url_assets('/energy_point_peleti/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
	{{--  <link rel="stylesheet" href="{{url_assets('/energy_point_peleti/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">  --}}
	<link rel='stylesheet' href='{{url_assets('/energy_point_peleti/css/settings.css')}}' type='text/css' media='all' />
	<link rel='stylesheet' href='{{url_assets('/energy_point_peleti/css/swatches-and-photos.css')}}' type='text/css'
		media='all' />
	<link rel='stylesheet' href='{{url_assets('/energy_point_peleti/css/font-awesome.min.css')}}' type='text/css'
		media='all' />
	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap"
		rel="stylesheet" media="all">
	{{-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Montserrat%3A400%2C700&#038;' type='text/css' media='all'/> --}}
	<link rel='stylesheet' href='{{url_assets('/energy_point_peleti/css/layout.css')}}' type='text/css' media='all' />
	<link rel='stylesheet' href='{{url_assets('/energy_point_peleti/css/elegant-icon.css')}}' type='text/css'
		media='all' />
	<link rel='stylesheet' href='{{url_assets('/energy_point_peleti/css/style.css?v=11')}}' type='text/css' media='all' />
	<link rel='stylesheet' href='{{url_assets('/energy_point_peleti/css/shop.css?v=4')}}' type='text/css' media='all' />
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


	<style>
		#footer-logo {
			width: 100px;
		}

		#header-desktop-logo {
			width: 50px;
			padding-top: 5px;
		}
	</style>


	@section('style')
	@show

	@include('clients._partials.pixel-init')
	@include('clients._partials.global-styles')
</head>
@include('clients._partials.pixel-events')

<body>
	@include('clients.energy_point_peleti.partials.mobile-header')
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v7.0'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
	</script>
	<div id="wrapper" class="wide-wrap">
		<div class="offcanvas-overlay"></div>
		@include('clients.energy_point_peleti.partials.header')
		@yield('content')
		@include('clients.energy_point_peleti.partials.footer')
	</div>

	<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery-migrate.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.themepunch.tools.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.themepunch.revolution.min.js')}}'>
	</script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/easing.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/imagesloaded.pkgd.min.js')}}'></script>
	<script type="text/javascript" src="{{url_assets('/energy_point_peleti/plugins/bootstrap/dist/js/bootstrap.min.js')}}">
	</script>
	{{--  <script type="text/javascript" src="{{url_assets('/energy_point_peleti/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>  --}}
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/superfish-1.7.4.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.appear.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/script.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/swatches-and-photos.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.prettyPhoto.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.prettyPhoto.init.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.selectBox.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.parallax.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.touchSwipe.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.transit.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/jquery.carouFredSel.min.js')}}'></script>
	<script type='text/javascript' src='{{url_assets('/energy_point_peleti/js/isotope.pkgd.min.js')}}'></script>
	@include('clients._partials.es-object')
	@include('clients._partials.global-scripts')
	@section('scripts')
	@show
</body>

</html>