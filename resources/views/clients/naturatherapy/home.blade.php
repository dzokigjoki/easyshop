@extends('clients.naturatherapy.layouts.default')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="text/javascript" src="{{ url_assets('/naturatherapy/javascript/cart.js') }}"></script>
@endsection


@section('content')
<section class="section slide-section position-relative mb-5 mb-xl-100">
	<div id="home-slider" class="slider bg-light">
		{{--
			<div class="slide-wrapper bg-light">
				<div class="slider-content">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-slide-content col-lg-5 col-xl-4">
								<p class="h4 text-red mb-3">{!! trans('naturatherapy/home.banner_heading') !!}
</p>
								<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">Paketa Immuno</h1>
								<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">{!! trans('naturatherapy/home.banner_price') !!} 2.980 &#128; / 1.990 ден</p>
								<div class="pt-lg-2">
									<a href="#" class="btn btn-secondary btn-arrow">
									Porosit tani</a>
								</div>
							</div>
							<div class="col-slide-image col-lg-7 col-xl-8">
								<div class="slider-product elements py-lg-80 py-xxl-150">
									<div class="slider-img">
										<div class="img-wrapper bg-image bg-size-contain" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
		<img src="{{ url_assets('/naturatherapy/images/slider/imuno-paket.png') }}" class="img-fluid mx-auto">
	</div>
	</div>
	<div class="element-top">
		<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
	</div>
	<div class="element-bottom">
		<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	--}}
	<!-- <div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">
							{!! trans('naturatherapy/home.banner_heading') !!}</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">{!! trans('naturatherapy/home.banner_text_1') !!}</h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">{!! trans('naturatherapy/home.banner_price') !!} 48.00 &#128; / 32.00 &#128;</p>
						<div class="pt-lg-2">
							<a href="/c/3/produkte" class="btn btn-secondary btn-arrow">
								{!! trans('naturatherapy/global.ordernow') !!}</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/1.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">
							{!! trans('naturatherapy/home.banner_heading') !!}
						</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">
							{!! trans('naturatherapy/home.banner_text_2') !!} </h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">
							{!! trans('naturatherapy/home.banner_price') !!}  {{ number_format(29.90 * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
						<div class="pt-lg-2">
							<a href="/p/6/xhel-aloe-vera-me-ekstrakt-nga-aronia-500ml" class="btn btn-secondary btn-arrow">Porosit tani</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain px-4 px-xl-5" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/2.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">
							{!! trans('naturatherapy/home.banner_heading') !!}</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">{!! trans('naturatherapy/home.banner_text_3') !!}</h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">{!! trans('naturatherapy/home.banner_price') !!}
						{{ number_format(29.90 * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
						<div class="pt-lg-2">
							<a href="/p/7/snail-complex-30-kapsula" class="btn btn-secondary btn-arrow">
								Porosit tani</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain px-4 px-xl-5" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/3.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">
							{!! trans('naturatherapy/home.banner_heading') !!}</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">{!! trans('naturatherapy/home.banner_text_4') !!}</h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">
							{!! trans('naturatherapy/home.banner_price') !!} {{ number_format(14.90 * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
						<div class="pt-lg-2">
							<a href="/p/21/maske-e-arte-24-karat-me-kolagjen" class="btn btn-secondary btn-arrow">
								Porosit tani</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain px-4 px-xl-5" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/4.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">
							{!! trans('naturatherapy/home.banner_heading') !!}</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">
							{!! trans('naturatherapy/home.banner_text_5') !!}</h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">
							{!! trans('naturatherapy/home.banner_price') !!} {{ number_format(29.90 * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
						<div class="pt-lg-2">
							<a href="/p/8/kurkumin-i-lengshem-500ml" class="btn btn-secondary btn-arrow">
								Porosit tani</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain px-4 px-xl-5" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/5.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">{!! trans('naturatherapy/home.banner_heading') !!}</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">
							{!! trans('naturatherapy/home.banner_text_6') !!}</h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">
							{!! trans('naturatherapy/home.banner_price') !!} {{ number_format(29.90 * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
						<div class="pt-lg-2">
							<a href="/p/10/ekstrakt-nga-noni-500ml" class="btn btn-secondary btn-arrow">
								Porosit tani</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain px-4 px-xl-5" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/6.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">{!! trans('naturatherapy/home.banner_heading') !!}</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">
							{!! trans('naturatherapy/home.banner_text_7') !!}</h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">
							{!! trans('naturatherapy/home.banner_price') !!} {{ number_format(39.90 * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
						<div class="pt-lg-2">
							<a href="/p/9/kolagjen-i-lengshem-500ml" class="btn btn-secondary btn-arrow">
								Porosit tani</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain px-4 px-xl-5" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/7.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="slide-wrapper bg-light">
		<div class="slider-content">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-slide-content col-sm-6 col-md-6 col-lg-6 order-2 order-sm-1">
						<p class="h4 slider-text text-red mb-3">{!! trans('naturatherapy/home.banner_heading') !!}</p>
						<h1 class="h1 slider-title mb-3 mb-lg-4 text-uppercase">
							{!! trans('naturatherapy/home.banner_text_8') !!}</h1>
						<p class="h4 slider-text text-red mb-3 mb-md-4 mb-lg-5">
							{!! trans('naturatherapy/home.banner_price') !!} {{ number_format(29.90 * $price_multiplier, 2, '.', '') }} @if($price_multiplier == 1) &#128; @else LEK  @endif</p>
						<div class="pt-lg-2">
							<a href="/p/12/gastro-complex-250ml" class="btn btn-secondary btn-arrow">
								Porosit tani</a>
						</div>
					</div>
					<div class="col-slide-image col-sm-6 col-md-6 col-lg-6 order-1 order-sm-2">
						<div class="slider-product elements py-lg-50 py-xl-80 py-xxl-150">
							<div class="slider-img">
								<div class="img-wrapper bg-image bg-size-contain px-4 px-xl-5" style="background-image: url('{{ url_assets('/naturatherapy/images/slider/product-bg.svg') }}');">
									<img src="{{ url_assets('/naturatherapy/images/slider/8.png') }}" class="img-fluid mx-auto">
								</div>
							</div>
							<div class="element-top">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
							</div>
							<div class="element-bottom">
								<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="slider-nav">
		<a href="#" class="slick-slider slick-prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
		<a href="#" class="slick-slider slick-next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
	</div>
</section>
<section class="section mb-5 mb-xl-100">
	<div class="container mb-5">
		<div class="row justify-content-center">
			<div class="col-sm-4 col-md-4 mb-3 mb-md-0">
				<div class="box d-flex h-100 text-sm-center text-xl-left">
					<a class="link link-primary">
						<div class="row align-items-center">
							<div class="col-auto col-sm-12 col-xl-auto mb-3 mb-xl-0">
								<img src="{{ url_assets('/naturatherapy/images/icons/dostava-icon.svg') }}" class="icon icon-md">
							</div>
							<div class="col col-sm-12 col-xl">
								<h5 class="h4 h4-to-h6-md h4-to-h6-sm h4-to-h6 box-text link mb-2 mb-xl-3">{!! trans('naturatherapy/home.col1_heading') !!}</h5>
								<p class="text-dark-light mb-0">{!! trans('naturatherapy/home.col1_text') !!}
								</p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 mb-3 mb-md-0">
				<div class="box d-flex h-100 text-sm-center text-xl-left">
					<a class="link link-primary">
						<div class="row align-items-center">
							<div class="col-auto col-sm-12 col-xl-auto mb-3 mb-xl-0">
								<img src="{{ url_assets('/naturatherapy/images/icons/dezinfekcija-icon.svg') }}" class="icon icon-md">
							</div>
							<div class="col col-sm-12 col-xl">
								<h5 class="h4 h4-to-h6-md h4-to-h6-sm h4-to-h6 box-text link mb-2 mb-xl-3">{!! trans('naturatherapy/home.col2_heading') !!}</h5>
								<p class="text-dark-light mb-0">
									{!! trans('naturatherapy/home.col2_text') !!}</p>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
				<div class="box d-flex h-100 text-sm-center text-xl-left">
					<a class="link link-primary">
						<div class="row align-items-center">
							<div class="col-auto col-sm-12 col-xl-auto mb-3 mb-xl-0">
								<img src="{{ url_assets('/naturatherapy/images/icons/poddrska-icon.svg') }}" class="icon icon-md">
							</div>
							<div class="col col-sm-12 col-xl">
								<h5 class="h4 h4-to-h6-md h4-to-h6-sm h4-to-h6 box-text link mb-2 mb-xl-3">{!! trans('naturatherapy/home.col3_heading') !!}<br>
									për ty</h5>
								<p class="text-dark-light mb-0">{!! trans('naturatherapy/home.col3_text') !!}</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="bg-primary mb-5 py-5 py-xl-100 mb-lg-100">
	<div class="container">
		<div class="mb-4 mb-md-5 mb-xl-50">
			<h4 class="h4 text-center text-red font-weight-bold mb-2 text-uppercase">{!! trans('naturatherapy/home.curcumin_heading') !!}</h4>
			<h2 class="h1 text-center font-weight-bold">
				{!! trans('naturatherapy/home.curcumin_heading_big') !!}</h2>
		</div>
		<div class="row align-items-lg-center justify-content-center mb-lg-5 mb-xl-50">
			<div class="col-sm-10 col-md-4 col-lg-4 order-2 order-md-1">
				<div class="mb-3 mb-md-4">
					<div class="text-lg-right">
						<h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">
							{!! trans('naturatherapy/home.curcumin_h1') !!}</h4>
						<p class="text-dark-light mb-0">
							{!! trans('naturatherapy/home.curcumin_t1') !!}</p>
					</div>
					<hr class="mt-3 mt-md-4 mb-0">
				</div>
				<div class="mb-3 mb-md-4 mb-lg-0">
					<div class="text-lg-right">
						<h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">{!! trans('naturatherapy/home.curcumin_h2') !!}</h4>
						<p class="text-dark-light mb-0">
							{!! trans('naturatherapy/home.curcumin_t2') !!}</p>
					</div>
					<hr class="d-lg-none mt-3 mt-md-4 mt-lg-0 mb-0">
				</div>
			</div>
			<div class="col-10 col-sm-8 col-md-4 col-lg-4 d-flex align-items-center order-1 order-md-2 mb-4">
				<img src="{{ url_assets('/naturatherapy/images/slider/5.png') }}" alt="" class="w-100">
			</div>
			<div class="col-sm-10 col-md-4 col-lg-4 order-2 order-md-3">
				<div class="mb-3 mb-md-4">
					<div class="">
						<h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">{!! trans('naturatherapy/home.curcumin_h3') !!}</h4>
						<p class="text-dark-light mb-0">
							{!! trans('naturatherapy/home.curcumin_t3') !!}</p>
					</div>
					<hr class="mt-3 mt-md-4 mb-0">
				</div>
				<div class="">
					<div class="">
						<h4 class="h3 h3-to-h5-sm font-weight-bold mb-lg-3">{!! trans('naturatherapy/home.curcumin_h4') !!}</h4>
						<p class="text-dark-light mb-0">
							{!! trans('naturatherapy/home.curcumin_t4') !!}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="btn-wrapper text-center mt-4 md-md-5 mt-lg-0">
			<a href="/p/8/kurkumin-i-lengshem-500ml" class="btn btn-secondary btn-arrow">
				{!! trans('naturatherapy/home.read_more') !!}</a>
		</div>
	</div>
</section>
<section class="bg-primary py-5 py-xl-100">
	<div class="container">
		<h1 class="h1 text-center font-weight-bold mb-4 mb-md-5">
			{!! trans('naturatherapy/home.natura_products') !!}</h1>

		<div class="row products-row mb-4">

			@foreach( $recommendedArticles as $product)

			@include('clients.naturatherapy.partials.product')

			@endforeach
		</div>

		<div class="btn-wrapper text-center">
			<a href="/c/3/produkte" class="btn btn-secondary btn-arrow">
				{!! trans('naturatherapy/home.all_products') !!}</a>
		</div>
	</div>
</section>
<section class="section product-section elements mb-5 mb-xl-100">
	<div class="element-top">
		<img src="{{ url_assets('/naturatherapy/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
	</div>
	<div class="element-bottom">
		<img src="{{ url_assets('/naturatherapy/images/flower-element-2-right.svg') }}" class="element-img element-img-lg">
	</div>
	<div class="container position-relative mb-5">
		<h1 class="h1 text-center font-weight-bold mb-4 mb-md-5">
			{!! trans('naturatherapy/home.natura_recommended_packages') !!}</h1>
		<div class="row products-row mb-4">

			@foreach( $exclusiveArticles as $product)

			@include('clients.naturatherapy.partials.product')

			@endforeach
		</div>
		<div class="btn-wrapper text-center">
			<a href="/c/2/paketa" class="btn btn-secondary btn-arrow">
				{!! trans('naturatherapy/home.all_packages') !!}</a>
		</div>
	</div>
</section>
<section class="banner-section">
	<div class="banner bg-image bg-image-hide-sm py-5 py-lg-100" style="background-image:url('{{ url_assets('/naturatherapy/images/naucno-dokazano-bg.jpg') }}')">
		<div class="banner-subbanner overlay-primary d-sm-none" style="background-image:url('{{ url_assets('/naturatherapy/images/banners/sidebanner.png') }}');background-position: center bottom;"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-7 col-lg-6 col-xl-5">
					<h2 class="h1 font-weight-bold mb-4 mb-lg-5">{!! trans('naturatherapy/home.naucnodokazano') !!}
					</h2>
					<p>
						{!! trans('naturatherapy/home.naucnodokazano_text') !!}
					</p>
					<div class="img-wrapper mb-4 mb-lg-5">
						<img src="{{ url_assets('/naturatherapy/images/potpis-drvoshanski.png') }}" class="signature signature-md" alt="">
					</div>
					<a href="/za-nas" class="btn btn-secondary btn-arrow">
						{!! trans('naturatherapy/home.read_more') !!}</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="bg-primary py-5 py-xl-100">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-xl-9">
				<h2 class="h1 text-center font-weight-bold mb-lg-5">{!! trans('naturatherapy/home.experience_users') !!}</h2>
				<div id="testemonials-slider" class="testimonials-quote dots-style-1 px-4 pt-4{{-- mb-4 mb-lg-5 --}}">
					<div>
						<p class="text-center">
							{!! trans('naturatherapy/home.experience_p_1') !!}
						</p>
						<div class="text-center mt-4">
							<img src="{{ url_assets('/naturatherapy/images/testimonials/sefije-selmani.jpg') }}" alt="" class="rounded-circle user-img mb-4">
							<p class="h6 text-center text-uppercase user-name">
								{!! trans('naturatherapy/home.experience_1') !!}</p>
							<p class="h6 text-center user-status"><i>
									{!! trans('naturatherapy/home.happyuser') !!}</i></p>
						</div>
					</div>
					<div>
						<p class="text-center">
							{!! trans('naturatherapy/home.experience_p_2') !!}
						</p>
						<div class="text-center mt-4">
							<img src="{{ url_assets('/naturatherapy/images/testimonials/stanka-kuc.jpg') }}" alt="" class="rounded-circle user-img mb-4">
							<p class="h6 text-center text-uppercase user-name">
								{!! trans('naturatherapy/home.experience_2') !!}</p>
							<p class="h6 text-center user-status"><i>{!! trans('naturatherapy/home.happyuser') !!}
								</i></p>
						</div>
					</div>
					<div>
						<p class="text-center">
							{!! trans('naturatherapy/home.experience_p_3') !!}
						</p>
						<div class="text-center mt-4">
							<img src="{{ url_assets('/naturatherapy/images/testimonials/zora-mladenovska.jpg') }}" alt="" class="rounded-circle user-img mb-4">
							<p class="h6 text-center text-uppercase user-name">
								{!! trans('naturatherapy/home.experience_3') !!}</p>
							<p class="h6 text-center user-status"><i>
									{!! trans('naturatherapy/home.happyuser') !!}</i></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection