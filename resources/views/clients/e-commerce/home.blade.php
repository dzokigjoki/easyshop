@extends('clients.e-commerce.layouts.default')

@section('content')
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<style>
  .ps-btn:
    hover, .ps-btn:focus, button.ps-btn:hover, button.ps-btn:focus {
    background-color: #000;
    color: #FFFFFF;
	}	
</style>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- pageHeader -->
		
		<!-- main -->
		
		<main>
			<!-- introBlock -->
		
			
			<section class="introBlock position-relative">
				<div class="slick-fade">
					
					<div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image:url({{ url_assets('/e-commerce/images/b-bg2.jpg') }})">
							<!-- holder -->							
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<span class="title d-block text-uppercase fwEbold position-relative pl-2 mb-lg-5 mb-sm-3 mb-1">wellcome to our shop</span>
											<h2 class="fwEbold position-relative mb-xl-7 mb-lg-5">Eliminate the toxic,<span class="text-break d-block">try the organic</span></h2>
											<p class="mb-xl-15 mb-lg-10">Great Skin Care Starts With Pure Ingredients</p>
											{{-- <a href="/p/84/josie-maran-argan-black-oil-mascara" class="btn btnTheme btnShop fwEbold text-white md-round py-2 px-3 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></a> --}}
										</div>
									</div>
									<div class="imgHolder">
										<img src="{{ url_assets('/e-commerce/images/homepic3.png') }}" alt="homepic3"
											class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					{{-- <div>
						<div class="align w-100 d-flex align-items-center bgCover" style="background-image:url({{ url_assets('/e-commerce/images/b-bg3.jpg') }})"> 
							<!-- holder -->
							<div class="container position-relative holder pt-xl-10 pt-0">
								<!-- py-12 pt-lg-30 pb-lg-25 -->
								<div class="row">
									<div class="col-12 col-xl-7">
										<div class="txtwrap pr-lg-10">
											<span class="title d-block text-uppercase fwEbold position-relative pl-2 mb-lg-5 mb-sm-3 mb-1">wellcome to botanical</span>
											<h2 class="fwEbold position-relative mb-xl-7 mb-lg-5">Plants for healthy</h2>
											<p class="mb-xl-15 mb-lg-10">Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
											<a href="shop.html" class="btn btnTheme btnShop fwEbold text-white md-round py-2 px-3 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></a>
										</div>
									</div>
									<div class="imgHolder">
										<img src="{{ url_assets('/e-commerce/images/homepic3.png') }}" alt="homepic3" class="img-fluid w-100">
									</div>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
				{{-- <div class="slickNavigatorsWrap">
					<a href="#" class="slick-prev"><i class="icon-leftarrow"></i></a>
					<a href="#" class="slick-next"><i class="icon-rightarrow"></i></a>
				</div> --}}
			</section>
			<!-- chooseUs-sec -->
			
			
			<section class="chooseUs-sec container pt-xl-22 pt-lg-20 pt-md-16 pt-10 pb-xl-12 pb-md-7 pb-2">
				<header class="col-12 mainHeader mb-7 text-center">
					<h1 class="headingIV playfair fwEblod mb-4">Why Choose us ?</h1>
					<span class="headerBorder d-block mb-md-5 mb-3"><img src="{{ url_assets('/e-commerce/images/hbdr.png') }}" alt="Header Border"
						class="img-fluid img-bdr">
					</span>
				</header>
				<div class="row">
					<div class="col-12 col-lg-6 mb-lg-0 mb-4">
						<img src="{{ url_assets('/e-commerce/images/whychooseus.jpg') }}" alt="image description" class="img-fluid whychooseus">
					</div>
					
					<div class="col-12 col-lg-6 pr-4">
						
						{{-- <p class="mb-xl-14 mb-lg-10">We have been changing the beauty industry since 2005 with its organic<br> and natural clinically validated skincare collection. All of the products in this<br> line are vegan and cruelty-free. Our brands also utilizes sustainable<br> energy sources for production and are USDA certified organic company.<br> You can feel good about what you’re putting on your skin with the detailed ingredients list and options for different skin types.<a href="javascript:void(0);" class="btnMore"></a></p> --}}
						<!-- chooseList -->
						<ul class="list-unstyled chooseList">
							<li class="d-flex justify-content-start mb-xl-7 mb-lg-5 mb-3">
								<i class="flaticon-lipstick-1" style="font-size:60px;color:#A1D030;"></i>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Get the lips you want</h3>
									<p>Each of these lipstick brands is committed to organic & natural ingredients, ethical practices, and eco-friendly packaging. By using pure ingredients, the natural healing properties of various enzymes, vitamins, and antioxidants help with healthy skin, too.</p>
								</div>
							</li>
							<li class="d-flex justify-content-start mb-xl-6 mb-lg-5 mb-4">
								<i class="flaticon-make-up" style="font-size:60px;color:lightblue;"></i>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Believe In Beauty</h3>
									<p>The best makeup brands blend natural, effective ingredients with nourishing vitamins and oils in skin care. Our natural cosmetic lines are making formulas from scratch to ensure your makeup is the cleanest it can be, and it’s dedicated to sustainability and ethics every step of the way.</p>
								</div>
							</li>
							<li class="d-flex justify-content-start">
								<i class="flaticon-skin-care" style="font-size:60px;color:#FCBFBB;"></i>
								<div class="alignLeft d-flex justify-content-start flex-wrap">
									<h3 class="headingIII fwEbold mb-2">Alive every moment</h3>
									<p>Organic skin care is made with ingredients that meet the same  standards as organic food. This means no harsh chemicals, pesticides, or fertilizers. Many chemical ingredients used as a cheap fillers actually do more harm than good. Your skin might look brighter for a couple weeks, but in the long run synthetic ingredients can cause irritation, increased sensitivity, and clogged pores. When you choose organic skin care, you are using ingredients that work in harmony with your body, allowing your skin to better balance and mend itself. .</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<!-- featureSec -->
			<section class="featureSec container-fluid overflow-hidden pt-xl-12 pt-lg-10 pt-md-80 pt-5 pb-xl-10 pb-lg-4 pb-md-2 px-xl-14 px-lg-7">
				<!-- mainHeader -->
				<header class="col-12 mainHeader mb-7 text-center">
					<h1 class="headingIV playfair fwEblod mb-4">Featured Product</h1>
					<span class="headerBorder d-block mb-md-5 mb-3"><img src="{{ url_assets('/e-commerce/images/hbdr.png') }}" alt="Header Border"
						class="img-fluid img-bdr">
					</span>
				</header>
				<div class="col-12 p-0 overflow-hidden d-flex flex-wrap">
					@foreach ($bestSellersArticles as $product)
					<div class="featureCol px-3 mb-6 lol">
						<div class="">
							
							<div class="imgHolder position-relative w-100 overflow-hidden" style="width: 100%;">
								@include('clients.e-commerce.partials.product')
							</div>
							
						</div>
					</div>
					@endforeach
				</div>
			</section>
			<!-- contactListBlock -->
			<div class="contactListBlock container overflow-hidden pt-xl-8 pt-lg-10 pt-md-8 pt-4 pb-xl-12 pb-lg-10 pb-md-4 pb-1">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-van"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Free shipping order</strong>
								<p class="m-0">On orders over  $100</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-gift"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Special gift card</strong>
								<p class="m-0">The perfect gift idea</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-4 px-md-2 px-3 d-flex">
							<span class="icon icon-recycle"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Return &amp; exchange</strong>
								<p class="m-0">Free return within 3 days</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
						<!-- contactListColumn -->
						<div class="contactListColumn border overflow-hidden py-xl-5 py-md-3 py-2 px-xl-6 px-md-3 px-3 d-flex">
							<span class="icon icon-call"></span>
							<div class="alignLeft pl-2">
								<strong class="headingV fwEbold d-block mb-1">Support 24 / 7</strong>
								<p class="m-0">Customer support</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<div class="partnerSec container-fluid overflow-hidden pt-xl-12 pb-xl-23 pt-lg-10 pt-md-8 pt-5 pb-lg-20 pb-md-16 pb-10">
				<div class="row">
					<div class="col-12">
						<!-- partnerSlider -->
						<div class="partnerSlider d-flex flex-wrap">
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="{{ url_assets('/e-commerce/images/brendce1.png') }}" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="{{ url_assets('/e-commerce/images/brendce2.png') }}" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="{{ url_assets('/e-commerce/images/brendce3.png') }}" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="{{ url_assets('/e-commerce/images/brendce4.png') }}" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="{{ url_assets('/e-commerce/images/brendce5.png') }}" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="{{ url_assets('/e-commerce/images/brendce6.png') }}" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
							<div>
								<div class="logoColumn d-flex align-items-center justify-content-center">
									<a href="javascript:void(0);"><img src="{{ url_assets('/e-commerce/images/brendce7.png') }}" alt="Partner Logo" class="img-fluid"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		   
			{{-- <div class="container-fluid px-xl-20 px-lg-14">
				<!-- subscribeSecBlock -->
				<section class="subscribeSecBlock bgCover col-12 pt-xl-24 pb-xl-12 pt-lg-20 pt-md-16 pt-10 pb-md-8 pb-5" style="background-image: url(http://placehold.it/1720x465)">
					<header class="col-12 mainHeader mb-sm-9 mb-6 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
						<span class="headerBorder d-block mb-md-5 mb-3"><img src="{{ url_assets('/e-commerce/images/hbdr.png') }}" alt="Header Border"
							class="img-fluid img-bdr"></span>
						<p class="mb-sm-6 mb-3">Enter Your email address to join our mailing list and keep yourself update</p>
					</header>
					<form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap">
						<input type="email" class="form-control px-4 border-0" placeholder="Enter your mail...">
						<button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
					</form>
				</section>
			</div> --}}
			
	</div>

</body>
   

@stop
