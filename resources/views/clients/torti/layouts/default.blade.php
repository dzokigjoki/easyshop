<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="">
<!--<![endif]-->

<head>
	@include('clients._partials.meta')

	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="//fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap&subset=cyrillic-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">


	<link rel="stylesheet" href="{{ url_assets('/torti/revolution/css/settings.css?v=3') }}" type="text/css">

	<link rel="stylesheet" type="text/css" href="{{ url_assets('/torti/revolution/css/layers.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url_assets('/torti/revolution/css/navigation.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url_assets('/torti/libraries/lib.css?v=5') }}">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


	<link rel="stylesheet" type="text/css" href="{{ url_assets('/torti/css/plugins.css?v=4') }}">
	<link rel="stylesheet" type="text/css" href="{{ url_assets('/torti/css/navigation-menu.css?v=6') }}">

	<link rel="stylesheet" type="text/css" href="{{ url_assets('/torti/css/style.css?v=29') }}">
	<link rel="stylesheet" href="//unpkg.com/bs-stepper/dist/css/bs-stepper.min.css?v=1">


	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
	@include('clients._partials.global-styles')
	@include('clients._partials.pixel-init')
</head>
@include('clients._partials.pixel-events')

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<!-- Loader -->


	@if (!Cookie::get("loader"))
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="loader-inner ball-clip-rotate">
				<div></div>
			</div>
		</div>
	</div>
	@endif

	@if(!Cookie::get("loader"))
	<?php Cookie::queue('loader', 'cookie_created', 30); ?>
	@endif


	@include('clients.torti.partials.header')
	@yield('content')
	@include('clients.torti.partials.footer')


	<input id="direct_buy" type="hidden" name="direct_buy" value="1">

	<script src="{{ url_assets('/torti/js/jquery.min.js')}}"></script>
	<script src="{{ url_assets('/torti/libraries/lib.js')}}"></script>
	<script src="{{ url_assets('/torti/js/functions.js')}}"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

	@include('clients._partials.es-object')
	@include('clients._partials.global-scripts')
	@section('scripts')
	@show
</body>

</html>