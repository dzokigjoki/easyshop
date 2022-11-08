@extends('clients.sofu.layouts.default')
@section('content')

<div class="ts-categories-grid grid-masonry w3-animate-opacity" data-layoutmode="packery">
	<div class="item-category banner grid banner_slider banner_desktop">
		@foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
		<img src="{{ '/uploads/banners/' . $banner->id . '/lg_' . $banner->image }}" alt=""></img>
		@endforeach
	</div>
	<div class="item-category banner grid banner_slider banner_mobilna">
		@foreach (\BannerHelper::getBannerByCategory('slider') as $banner)
		<img src="{{ '/uploads/banners/' . $banner->id . '/md_' . $banner->mobile_image }}" alt=""></img>
		@endforeach
	</div>

	<div class="category-info">
		<div class="row row_banner">
			<div class="col-sm-12 text-center pb_15">

				<h5 class="banner_text">Безвременски, рачно изработен мебел со современ SoFu карактер</h5>

			</div>
			<div class="col-sm-6 text-center">
				<a class="btn btn_banner btn-lg" href="/c/2/proizvodi">
					<p class="banner_text_button">ПРОИЗВОДИ</p>
				</a>
			</div>
			<div class="col-sm-6 text-center">
				<a class="btn btn_banner btn-lg" href="/dizajniraj">
					<p class="banner_text_button">ДИЗАЈНИРАЈ</p>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="sidenav">
	<a class="sidebar_item" href="https://www.facebook.com/Sofu-102385948343984/"><i class="fa fa-facebook"></i></a>
	<a class="sidebar_item" href="https://www.instagram.com/SOFU.MK/"><i class="fa fa-instagram"></i></a>
	<a class="sidebar_item" href="https://www.linkedin.com/company/sofu-mk"><i class="fa fa-linkedin"></i></a>
</div>
<section id="main-container" style="border-top:0 !important;" class="main-container">
	<div class="row section_about_sofu_home_page">
		<div class="col-md-12">
			<h4 class="text-center">МЕБЕЛ ИНСПИРИРАН ОД ВАС</h4>
		</div>
		<div class="col-md-12 pt_15">
			<p class="text-center">Секоj SoFu производ е рачно изработен по мерка- секое парче мебел се изработува по ваша идеја,
				димензија и спецификација.</p>
		</div>
		<div class="col-md-12 hidden-xs">
			<p class="text-center">Со цел комплетно да ги задоволиме вашите замисли, нашиот тим ве инволвира во текот на целиот процес
				на производство.</p>
		</div>
		<div class="col-md-12 hidden-xs">
			<p class="text-center">Доколку не можете да се пронајдете во некои од нашите дизајни исконтактирајте не и заедно ќе ја
				реализираме вашата уникатна идеја.</p>
		</div>
		<div class="col-md-12 pt_15 text-center">
			<button onclick="location.href='/c/2/proizvodi'" type="button" class="button_newletter">Sofu колекција</button>
		</div>
	</div>
	<div class="products products-grid-no-margin">
		<div class="row">
			<div class="slider slider_product_hide col-12">
				@foreach($recommendedArticles as $product)
				<?php
				$discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
				$discountPercentage = (($product->price - $discount) / $product->price) * 100;
				?>
				<div class="slider-item">
					<div class="product-innercotent" data-link="/p/{{$product->id}}/{{$product->url}}">
						@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
						<div class="product"><span class="onsale onsale_mobile">{{ number_format($discountPercentage, 0) }}%</span></div>
						@endif
						<a href="/p/{{$product->id}}/{{$product->url}}">
							<figure><img class="hover_image" src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt=""></figure>
						</a>
						<div class="ts-product-button">
							@if(auth()->check())
							<div class="yith-wcwl-add-to-wishlist">
								<div class="yith-wcwl-add-button button_product show" style="display:block">
									<a data-add-to-wish-list="" value="{{$product->id}}" class="add_to_wishlist">Add to Wishlist</a>
								</div>

							</div>
							@endif


							@if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
							<a class="button yith-wcqv-button" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{$discount}} МКД" data-oldprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"></a>
							@else
							<a class="button yith-wcqv-button" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"></a>
							@endif
						</div>
					</div>

					<div class="product_info text-center">
						<?php $productTitle = explode('-', $product->title); ?>
						<p class="product_title"><a href="/p/{{$product->id}}/{{$product->url}}">{{$productTitle[0]}}</a></p>
					</div>
				</div>
				@endforeach
			</div>
			<div class="slider_product_show">
				@foreach($recommendedArticles as $product)
				@if(is_null($product->parent_product))
				@include('clients.sofu.partials.product')
				@endif
				@endforeach
			</div>
		</div>
	</div>

	<!-- <div class="section-feature-2 ">
		<div class="row">
			<div class="col-sm-12 p_0">
				<div class="ts-feature feature-icon wow fadeInUp" data-wow-delay="0.4s">
					<figure class="showroom_desktop"><img alt="" src="{{ url_assets('/sofu/images/showroom.png') }}"></figure>
					<a href="/">
						<figure class="showroom_mobile"><img alt="" src="{{ url_assets('/sofu/images/Showroom_mobile.png') }}"></figure>
					</a>
					<a class="button_showroom" href="">МАПА</a>
				</div>
			</div>
		</div>
	</div> -->
	<div class="section-newsletter">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="ts-newsletter-shortcode text-center w3-animate-opacity">
						<h4>ДОБИЈТЕ 10% ПОПУСТ</h4>
						<p>со претплата на нашиот билтен</p>
						<form class="form-newsletter" method="POST" action="{{ route('newsletter.subscribe') }}">
							{{csrf_field()}}
							<input type="email" name="email" style="width: 100%" placeholder="Вашата е-пошта...">
							<span><button type="submit" class="button_newletter">Испрати</button></span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<!-- <div class="modal fade" id="promotionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal_background">

			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<a class="modal_click" href="/c/9/zakachalki"></a>
			</div>
		</div>
	</div>
</div> -->

@stop

@section('scripts')

<script>
	$(document).ready(function() {


		// if (!$.cookie('welcome_modal')) {
		// 	$('#promotionModal').modal('show');
		// }

		// $('#promotionModal').on('hidden.bs.modal', function() {
		// 	$.cookie('welcome_modal', 'true', {
		// 		expires: 0.00486111
		// 	});
		// })




		$('.banner_slider').slick({
			dots: true,
			infinite: true,
			speed: 1000,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: false,
			responsive: [{
				breakpoint: 767,
				settings: {
					autoplay: true,
					dots: false
				}
			}]
		});
		$('.slider').slick({
			dots: false,
			infinite: true,
			speed: 1000,
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2500,
			arrows: false,
			responsive: [{
					breakpoint: 767,
					settings: {
						autoplay: true,
					}
				}, {
					breakpoint: 600,
					settings: {
						autoplay: true,
						slidesToShow: 3,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 400,
					settings: {
						autoplay: true,
						arrows: false,
						slidesToShow: 2,
						slidesToScroll: 1
					}
				}
			]
		});
		$('.slider_showroom').slick({
			dots: false,
			infinite: true,
			speed: 1000,
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: false,
			responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				},

			]
		});

	});
</script>
@stop