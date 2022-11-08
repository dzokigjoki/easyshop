@extends('clients.e-commerce.layouts.default')

@section('content')
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		
		<main>
			<!-- introBannerHolder -->
			<section class="d-flex w-100 bgCover">
				<div class="container-fluid">
					<div class="row bgTitle">
						<div class="col-12 pt-lg-10 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">About Us</h1>
						</div>
					</div>
				</div>
			</section>
			<section class="abtSecHolder container pt-xl-24 pb-xl-12 pt-lg-20 pb-lg-10 pt-md-16 pb-md-8 pt-10 pb-5">
				<div class="row">
					<div class="col-12 col-lg-6 pt-xl-12 pt-lg-8">
						<h2 class="playfair fwEbold position-relative mb-7 pb-5">
							<strong class="d-block">A Minimal Team</strong>
							<strong class="d-block">For a Better World</strong>
						</h2>
						<p class="pr-xl-16 pr-lg-10 mb-lg-0 mb-6">Lorem Khaled Ipsum is a major key to success. The ladies always say Khaled you smell good, I use no cologne. Cocoa butter is the key. To succeed you must believe. When you believe, you will succeed. They will try to close the door on you, just open it. The key is to drink coconut, fresh coconut, trust me. It’s important to use cocoa butter. It’s the key to more success, why not live smooth?</p>
					</div>
					<div class="col-12 col-lg-6">
						<img src="{{ url_assets('/e-commerce/images/matejco.png') }}" alt="image description" class="img-fluid" style="border: 1px solid black; border-radius: 78px;">
					</div>
				</div>
			</section>
			<section class="counterSec container pt-xl-12 pb-xl-24 pt-lg-10 pb-lg-20 pt-md-8 pb-md-16 pt-5 pb-10">
				<div class="row">
					<div class="col-12">
						<!-- progressCounter -->
						<ul class="progressCounter list-unstyled mb-2 d-flex flex-wrap text-capitalize text-center">
							<li class="mb-md-0 mb-3">
								<strong class="d-block fwEbold counter mb-2">229</strong>
								<strong class="d-block text-uppercase txtWrap">Happy Clients</strong>
							</li>
							<li class="mb-md-0 mb-3">
								<strong class="d-block fwEbold counter mb-2">109</strong>
								<strong class="d-block text-uppercase txtWrap">completed project</strong>
							</li>
							<li class="mb-md-0 mb-3">
								<strong class="d-block fwEbold counter mb-2">22</strong>
								<strong class="d-block text-uppercase txtWrap">awesome staff</strong>
							</li>
							<li class="mb-md-0 mb-3">
								<strong class="d-block fwEbold counter mb-2">11</strong>
								<strong class="d-block text-uppercase txtWrap">winning awards</strong>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<div class="section-about-us text-center pt-20">
				<div class="container">
					<div class="row">
							<div class="col-lg-6">
								<img src="{{ url_assets('/e-commerce/images/sara.png') }}" alt="" style="border: 1px solid black; border-radius: 78px;">
							</div>
							<div class="col-lg-6 ">
								<h2 class="playfair fwEbold position-relative mb-7 pb-5">
									<strong class="d-block" style="color: black;">Кои сме ние ?</strong>
								</h2>
								</h4>
								<div class="section-about-us-desc">
									<p>E-комерц решение е составен oд стручен и добро обучен кадар кој ви стои на располагање
										како
										во
										Скопје
										така и низ целата држава.
									</p>
									<p>Од своето основање па се до денес, Е-комерц решение континуирано работи на подобрување и
										проширување
										на продажниот асортиман на производите кои ги нуди и секако постојано усовршување на
										услугата
										кон
										своите купувачи и партнери, бидејќи задоволните купувачи се нашиот највисок приоритет..
									</p>
									{{-- <p>Без оглед на големината на вашата компанија или организација, ние сме посветени да ви
										обезбедиме
										највисоко ниво на услуга..
									</p> --}}
								</div>
								
							</div>
						
					</div>
				</div>
			</div>
			<section class="processStepSec container pt-xl-23 pb-xl-10 pt-lg-20 pb-lg-10 pt-md-16 pb-md-8 pt-10 pb-0">
				<div class="row">
					<header class="col-12 mainHeader mb-3 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Delivery Process</h1>
						<span class="headerBorder d-block mb-5"><img src="{{ url_assets('/e-commerce/images/hbdr.png') }}" alt="Header Border" class="img-fluid img-bdr"></span>
					</header>
				</div>
				<div class="row">
					<div class="col-12 pl-xl-23 mb-lg-3 mb-10">
						<div class="stepCol position-relative bg-lightGray py-6 px-6">
							<strong class="mainTitle text-uppercase mt-n8 mb-5 d-block text-center py-1 px-3">step 01</strong>
							<h2 class="headingV fwEblod text-uppercase mb-3">Choose your products</h2>
							<p class="mb-5">There are many variations of passages of lorem ipsum available, but the majority have suffered alteration in some form, by injected humour. Both betanin</p>
						</div>
					</div>
					<div class="col-12 pr-xl-23 mb-lg-3 mb-10">
						<div class="stepCol rightArrow position-relative bg-lightGray py-6 px-6 float-right">
							<strong class="mainTitle text-uppercase mt-n8 mb-5 d-block text-center py-1 px-3">step 02</strong>
							<h2 class="headingV fwEblod text-uppercase mb-3">Connect nearest stored</h2>
							<p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
						</div>
					</div>
					<div class="col-12 pl-xl-23 mb-lg-3 mb-10">
						<div class="stepCol position-relative bg-lightGray py-6 px-6">
							<strong class="mainTitle text-uppercase mt-n8 mb-5 d-block text-center py-1 px-3">step 03</strong>
							<h2 class="headingV fwEblod text-uppercase mb-3">Share your location</h2>
							<p class="mb-5">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
						</div>
					</div>
					<div class="col-12 pr-xl-23 mb-lg-3 mb-10">
						<div class="stepCol rightArrow position-relative bg-lightGray py-6 px-6 float-right">
							<strong class="mainTitle text-uppercase mt-n8 mb-5 d-block text-center py-1 px-3">step 04</strong>
							<h2 class="headingV fwEblod text-uppercase mb-3">Get delivered fast</h2>
							<p class="mb-5">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
						</div>
					</div>
				</div>
			</section>
			
			
			{{-- <!-- footerHolder -->
			<aside class="footerHolder overflow-hidden bg-lightGray pt-xl-23 pb-xl-8 pt-lg-10 pb-lg-8 pt-md-12 pb-md-8 pt-10">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-6 col-lg-4 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-7">Contact Us</h3>
							<ul class="list-unstyled footerContactList mb-3">
								<li class="mb-3 d-flex flex-nowrap pr-xl-20 pr-0"><span class="icon icon-place mr-3"></span> <address class="fwEbold m-0">Address: London Oxford Street, 012 United Kingdom.</address></li>
								<li class="mb-3 d-flex flex-nowrap"><span class="icon icon-phone mr-3"></span> <span class="leftAlign">Phone : <a href="javascript:void(0);">(+032) 3456 7890</a></span></li>
								<li class="email d-flex flex-nowrap"><span class="icon icon-email mr-2"></span> <span class="leftAlign">Email:  <a href="javascript:void(0);">Botanicalstore@gmail.com</a></span></li>
							</ul>
							<ul class="list-unstyled followSocailNetwork d-flex flex-nowrap">
								<li class="fwEbold mr-xl-11 mr-md-8 mr-3">Follow  us:</li>
								<li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
								<li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
								<li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-pinterest"></a></li>
								<li class="mr-2"><a href="javascript:void(0);" class="fab fa-google-plus-g"></a></li>
							</ul>
						</div>
						<div class="col-12 col-sm-6 col-lg-3 pl-xl-14 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-6">Information</h3>
							<ul class="list-unstyled footerNavList">
								<li class="mb-1"><a href="javascript:void(0);">New Products</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Top Sellers</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Our Blog</a></li>
								<li class="mb-2"><a href="javascript:void(0);">About Our Shop</a></li>
								<li><a href="javascript:void(0);">Privacy policy</a></li>
							</ul>
						</div>
						<div class="col-12 col-sm-6 col-lg-3 pl-xl-12 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-7">My Account</h3>
							<ul class="list-unstyled footerNavList">
								<li class="mb-1"><a href="javascript:void(0);">My account</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Discount</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Orders history</a></li>
								<li><a href="javascript:void(0);">Personal information</a></li>
							</ul>
						</div>
						<div class="col-12 col-sm-6 col-lg-2 pl-xl-18 mb-lg-0 mb-4">
							<h3 class="headingVI fwEbold text-uppercase mb-5">PRODUCTS</h3>
							<ul class="list-unstyled footerNavList">
								<li class="mb-2"><a href="javascript:void(0);">Delivery</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Legal notice</a></li>
								<li class="mb-2"><a href="javascript:void(0);">Prices drop</a></li>
								<li class="mb-2"><a href="javascript:void(0);">New products</a></li>
								<li><a href="javascript:void(0);">Best sales</a></li>
							</ul>
						</div>
					</div>
				</div>
			</aside> --}}
		</main>
		{{-- <!-- footer -->
		<footer id="footer" class="overflow-hidden bg-dark">
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
</html>

@stop