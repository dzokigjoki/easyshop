@extends('clients.e-commerce.layouts.default')

@section('content')
<style>
	.product-img{
		width: 60% !important;
	}
	.product-item{
		display: flex;
    	flex-direction: column;
   		align-items: center;
	}
</style>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		
		<!-- main -->
		<main>
			<!-- introBannerHolder -->
			<section class=" d-flex w-100 bgCover">
				<div class="container-fluid">
					<div class="row bgTitle">
						<div class="col-12 pt-lg-10 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Shop</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- twoColumns -->
			<div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
				<div class="row">
					<div class="col-12">
						<!-- content -->
						<article id="content">
							<!-- show-head -->
						
							<div class="row">
								<!-- featureCol -->
								
									
										@include('clients.e-commerce.partials.category-products-list')
										{{-- <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
											<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
											<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
											<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
											<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
										</ul> --}}
										
										
									
								
									<!-- featureCol -->
							
									<div class="col-12 pt-3 mb-lg-0 mb-md-6 mb-3">
									
								</div>
							</div>
						</article>
					</div>
					
				</div>
			</div>
			
			<!-- footerHolder -->
			
		</main>
		<!-- footer -->
		{{-- <footer id="footer" class="overflow-hidden bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-12 copyRightHolder v-II text-center pt-md-3 pb-md-4 py-2">
						<p class="mb-0">Coppyright 2019 by <a href="javascript:void(0);">Botanical Store</a> - All right reserved</p>
					</div>
				</div>
			</div>
		</footer> --}}
	</div>

</body>
@stop