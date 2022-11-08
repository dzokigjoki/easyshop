@extends('clients.naturatherapy.layouts.default')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
@endsection

@section('content')




<section class="breadcrumb-section bg-light">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb py-2 py-lg-3">
				<li class="breadcrumb-item">
					<a href="/">{!! trans('naturatherapy/global.home') !!}
					</a>
				</li>
				<li class="breadcrumb-item">
					<a href="/c/3/produkte">Provuar shkencërisht
					</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">P BRFITIMET USHQIMORE DHE SH HENDETSORE T C LABKS!
				</li>
			</ol>
		</nav>
	</div>
</section>

<section class="section product-section elements py-5 py-xl-100">
	<div class="element-top">
		<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-1.svg') }}" class="element-img element-img-lg">
	</div>
	<div class="element-bottom">
		<img src="{{ url_assets('/naturatherapy/images/slider/flower-element-2.svg') }}" class="element-img element-img-lg element-img-rotate-1">
	</div>
	<div class="container position-relative">
		<div class="post-content dynamic-content row">

			<div class="col-md-4">
				<img src="/uploads/posts/{{$blog->id}}/lg_{{$blog->image}}" class="w-100">
			</div>
			<div class="col-md-8">
				{!! $blog->description !!}
			</div>
		</div>

	</div>
</section>
<hr class="my-0">

@endsection