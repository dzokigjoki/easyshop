@extends('clients.e-commerce.layouts.default')

@section('content')
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- header -->
		{{-- <header id="header" class="position-relative">
			<!-- headerHolderCol -->
			<div class="headerHolderCol pt-lg-4 pb-lg-5 py-3">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-4">
							<a href="javascript:void(0);" class="tel d-flex align-items-end"><i class="icon-call mr-2"></i>  Hotline: (602) 462 8889</a>
						</div>
						<div class="col-12 col-sm-4 text-center">
							<span class="txt d-block">Wellcome To Botanical Store</span>
						</div>
						<div class="col-12 col-sm-4">
							<!-- langListII -->
							<ul class="nav nav-tabs langListII justify-content-end border-bottom-0">
								<li class="dropdown">
									<span>Currency: </span>
									<a class="d-inline dropdown-toggle text-uppercase" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">USD</a>
									<div class="dropdown-menu text-uppercase pl-4 pr-4 border-0">
										<a class="dropdown-item" href="javascript:void(0);">USD</a>
										<a class="dropdown-item" href="javascript:void(0);">VND</a>
										<a class="dropdown-item" href="javascript:void(0);">euro</a>
									</div>
								</li>
								<li class="dropdown m-0">
									<span>Languages: </span>
									<a class="d-inline dropdown-toggle text-uppercase" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">EN</a>
									<div class="dropdown-menu pl-4 pr-4">
										<a class="dropdown-item" href="javascript:void(0);">English</a>
										<a class="dropdown-item" href="javascript:void(0);">Vietnamese</a>
										<a class="dropdown-item" href="javascript:void(0);">French</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- headerHolder -->
			<div class="headerHolder container pt-lg-5 pb-lg-7 py-4">
				<div class="row">
					<div class="col-6 col-sm-2">
						<!-- mainLogo -->
						<div class="logo">
							<a href="javascript:void(0);"><img src="images/logo.png" alt="Botanical" class="img-fluid"></a>
						</div>
					</div>
					<div class="col-6 col-sm-7 col-lg-8 static-block">
						<!-- mainHolder -->
						<div class="mainHolder pt-lg-5 pt-3 justify-content-center">
							<!-- pageNav2 -->
							<nav class="navbar navbar-expand-lg navbar-light p-0 pageNav2 position-static">
								<button type="button" class="navbar-toggle collapsed position-relative" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarNav">
									<ul class="navbar-nav mx-auto text-uppercase d-inline-block">
										<li class="nav-item dropdown">
											<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">home</a>
											<ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
												<li class="d-block mx-0"><a href="home.html">Home 1</a></li>
												<li class="d-block mx-0"><a href="home2.html">Home 2</a></li>
												<li class="d-block mx-0"><a href="home3.html">Home 3</a></li>
											</ul>
										</li>
										<li class="nav-item active dropdown">
											<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Store</a>
											<ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
												<li class="d-block mx-0"><a href="shop.html">Shop Left Sidebar</a></li>
												<li class="d-block mx-0"><a href="shop-detail.html">Single Product</a></li>
											</ul>
										</li>
										<li class="nav-item">
											<a class="d-block" href="about-us.html">About</a>
										</li>
										<li class="nav-item dropdown">
											<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
											<ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
												<li class="d-block mx-0"><a href="blog.html">Blog Left Sidebar</a></li>
												<li class="d-block mx-0"><a href="blog-detail.html">Blog Detail</a></li>
											</ul>
										</li>
										<li class="nav-item dropdown">
											<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
											<ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">
												<li class="d-block mx-0"><a href="cart-page.html">Cart Page</a></li>
											</ul>
										</li>
										<li class="nav-item">
											<a class="d-block" href="contact-us.html">contact</a>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
					<div class="col-sm-3 col-lg-2">
						<ul class="nav nav-tabs wishListII pt-5 justify-content-end border-bottom-0">
							<li class="nav-item ml-0"><a class="nav-link icon-search" href="javascript:void(0);"></a></li>
							<li class="nav-item"><a class="nav-link position-relative icon-cart" href="javascript:void(0);"><span class="num rounded d-block">2</span></a></li>
							<li class="nav-item"><a class="nav-link icon-profile" href="javascript:void(0);"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</header> --}}
		<!-- main -->
		<main>
			<!-- introBannerHolder -->
			<section class="introBannerHolder d-flex w-100 bgCover" style="background-image: url(http://placehold.it/1920x300);">
				<div class="container">
					<div class="row">
						<div class="col-12 pt-lg-23 pt-md-15 pt-sm-10 pt-6 text-center">
							<h1 class="headingIV fwEbold playfair mb-4">Shop</h1>
							<ul class="list-unstyled breadCrumbs d-flex justify-content-center">
								<li class="mr-2"><a href="home.html">Home</a></li>
								<li class="mr-2">/</li>
								<li class="active">Shop</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- twoColumns -->
			<div class="twoColumns container pt-lg-23 pb-lg-20 pt-md-16 pb-md-4 pt-10 pb-4">
				<div class="row">
					<div class="col-12 col-lg-9 order-lg-3">
						<!-- content -->
						<article id="content">
							<!-- show-head -->
							<header class="show-head d-flex flex-wrap justify-content-between mb-7">
								<ul class="list-unstyled viewFilterLinks d-flex flex-nowrap align-items-center">
									<li class="mr-2"><a href="javascript:void(0);" class="active"><i class="fas fa-th-large"></i></a></li>
									<li class="mr-2"><a href="javascript:void(0);"><i class="fas fa-list"></i></a></li>
									<li class="mr-2">Showing 1–9 of 24 results</li>
								</ul>
								<!-- sortGroup -->
								<div class="sortGroup">
									<div class="d-flex flex-nowrap align-items-center">
										<strong class="groupTitle mr-2">Sort by:</strong>
										<div class="dropdown">
											<button class="dropdown-toggle buttonReset" type="button" id="sortGroup" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Default sorting</button>
											<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="sortGroup">
												<li><a href="javascript:void(0);">Default Order</a></li>
												<li><a href="javascript:void(0);">Default Order</a></li>
												<li><a href="javascript:void(0);">Default Order</a></li>
												<li><a href="javascript:void(0);">Default Order</a></li>
											</ul>
										</div>
									</div>
								</div>
							</header>
							<div class="row">
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold"><del>80.50 $</del>68.00 $</span>
											<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">HOT</span>
											<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block ml-8">Sale</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">58.00 $</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">60.00 $</span>
											<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">HOT</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold"><del>80.50 $</del>68.00 $</span>
											<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">58.00 $</span>
											<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">60.00 $</span>
											<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">HOT</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">68.00 $</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">58.00 $</span>
											<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">Hot</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold"><del>80.50 $</del>68.00 $</span>
											<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold"><del>80.50 $</del>68.00 $</span>
											<span class="hotOffer green fwEbold text-uppercase text-white position-absolute d-block">Sale</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">58.00 $</span>
										</div>
									</div>
								</div>
								<!-- featureCol -->
								<div class="col-12 col-sm-6 col-lg-4 featureCol mb-7">
									<div class="border">
										<div class="imgHolder position-relative w-100 overflow-hidden">
											<img src="http://placehold.it/270x300" alt="image description" class="img-fluid w-100">
											<ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-cart d-block"></a></li>
												<li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
												<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li>
											</ul>
										</div>
										<div class="text-center py-5 px-4">
											<span class="title d-block mb-2"><a href="shop-detail.html">Pellentesque aliquet</a></span>
											<span class="price d-block fwEbold">58.00 $</span>
											<span class="hotOffer fwEbold text-uppercase text-white position-absolute d-block">Hot</span>
										</div>
									</div>
								</div>
								<div class="col-12 pt-3 mb-lg-0 mb-md-6 mb-3">
									<!-- pagination -->
									<ul class="list-unstyled pagination d-flex justify-content-center align-items-end">
										<li><a href="javascript:void(0);"><i class="fas fa-chevron-left"></i></a></li>
										<li class="active"><a href="javascript:void(0);">1</a></li>
										<li><a href="javascript:void(0);">2</a></li>
										<li>...</li>
										<li><a href="javascript:void(0);"><i class="fas fa-chevron-right"></i></a></li>
									</ul>
								</div>
							</div>
						</article>
					</div>
					<div class="col-12 col-lg-3 order-lg-1">
						<!-- sidebar -->
						<aside id="sidebar">
							<!-- widget -->
							<section class="widget overflow-hidden mb-9">
								<form action="javascript:void(0);" class="searchForm position-relative border">
									<fieldset>
										<input type="search" class="form-control" placeholder="Search product...">
										<button class="position-absolute"><i class="icon-search"></i></button>
									</fieldset>
								</form>
							</section>
							<!-- widget -->
							<section class="widget overflow-hidden mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-5">PRODUCT CATEGORIES</h3>
								<ul class="list-unstyled categoryList mb-0">
									<li class="mb-5 overflow-hidden"><a href="javascript:void(0);">Dried <span class="num border float-right">6</span></a></li>
									<li class="mb-5 overflow-hidden"><a href="javascript:void(0);">Vegetables <span class="num border float-right">8</span></a></li>
									<li class="mb-4 overflow-hidden"><a href="javascript:void(0);">Fruits <span class="num border float-right">9</span></a></li>
									<li class="mb-5 overflow-hidden"><a href="javascript:void(0);">Juice <span class="num border float-right">6</span></a></li>
									<li class="overflow-hidden"><a href="javascript:void(0);">Uncategorized <span class="num border float-right">1</span></a></li>
								</ul>
							</section>
							<!-- widget -->
							<section class="widget mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-6">Filter by price</h3>
								<!-- filter ranger form -->
								<form action="javascript:void(0);" class="filter-ranger-form">
									<div id="slider-range"></div>
									<input type="hidden" id="amount1" name="amount1">
									<input type="hidden" id="amount2" name="amount2">
									<div class="get-results-wrap d-flex align-items-center justify-content-between">
										<button type="button" class="btn btnTheme btn-shop fwEbold md-round px-3 pt-1 pb-2 text-uppercase">Filter</button>
										<p id="amount" class="mb-0"></p>
									</div>
								</form>
							</section>
							<!-- widget -->
							<section class="widget mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-6">top rate</h3>
								<ul class="list-unstyled recentListHolder mb-0 overflow-hidden">
									<li class="mb-6 d-flex flex-nowrap">
										<div class="alignleft">
											<a href="shop-detail.html"><img src="http://placehold.it/70x80" alt="image description" class="img-fluid"></a>
										</div>
										<div class="description-wrap pl-1">
											<h4 class="headingVII mb-1"><a href="shop-detail.html">Vitamin C face wash</a></h4>
											<strong class="price fwEbold d-block;">21.00 $</strong>
										</div>
									</li>
									<li class="mb-6 d-flex flex-nowrap">
										<div class="alignleft">
											<a href="shop-detail.html"><img src="http://placehold.it/70x80" alt="image description" class="img-fluid"></a>
										</div>
										<div class="description-wrap pl-1">
											<h4 class="headingVII mb-1"><a href="shop-detail.html">Organic vegetables</a></h4>
											<strong class="price fwEbold d-block;">21.00 $</strong>
										</div>
									</li>
									<li class="mb-6 d-flex flex-nowrap">
										<div class="alignleft">
											<a href="shop-detail.html"><img src="http://placehold.it/70x80" alt="image description" class="img-fluid"></a>
										</div>
										<div class="description-wrap pl-1">
											<h4 class="headingVII mb-1"><a href="shop-detail.html">Organic cabbage</a></h4>
											<strong class="price fwEbold d-block;">21.00 $</strong>
										</div>
									</li>
									<li class="mb-6 d-flex flex-nowrap">
										<div class="alignleft">
											<a href="shop-detail.html"><img src="http://placehold.it/70x80" alt="image description" class="img-fluid"></a>
										</div>
										<div class="description-wrap pl-1">
											<h4 class="headingVII mb-1"><a href="shop-detail.html">Organic vegetables</a></h4>
											<strong class="price fwEbold d-block;">21.00 $</strong>
										</div>
									</li>
									<li class="d-flex flex-nowrap">
										<div class="alignleft">
											<a href="shop-detail.html"><img src="http://placehold.it/70x80" alt="image description" class="img-fluid"></a>
										</div>
										<div class="description-wrap pl-1">
											<h4 class="headingVII mb-1"><a href="shop-detail.html">Vitamin C face wash</a></h4>
											<strong class="price fwEbold d-block;">21.00 $</strong>
										</div>
									</li>
								</ul>
							</section>
							<!-- widget -->
							<section class="widget mb-9">
								<h3 class="headingVII fwEbold text-uppercase mb-5">product tags</h3>
								<ul class="list-unstyled tagNavList d-flex flex-wrap mb-0">
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Plant</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Floor</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Indoor</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Green</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Healthy</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Cactus</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">House plant</a></li>
									<li class="text-center"><a href="javascript:void(0);" class="md-round d-block">Office tree</a></li>
								</ul>
							</section>
						</aside>
					</div>
				</div>
			</div>
			<div class="container mb-lg-24 mb-md-16 mb-10">
				<!-- subscribeSecBlock -->
				<section class="subscribeSecBlock bgCover col-12 pt-lg-24 pb-lg-12 pt-md-16 pb-md-8 py-10" style="background-image: url(http://placehold.it/1170x465)">
					<header class="col-12 mainHeader mb-9 text-center">
						<h1 class="headingIV playfair fwEblod mb-4">Subscribe Our Newsletter</h1>
						<span class="headerBorder d-block mb-5"><img src="images/hbdr.png" alt="Header Border" class="img-fluid img-bdr"></span>
						<p class="mb-6">Enter Your email address to join our mailing list and keep yourself update</p>
					</header>
					<form class="emailForm1 mx-auto overflow-hidden d-flex flex-wrap">
						<input type="email" class="form-control px-4 border-0" placeholder="Enter your mail...">
						<button type="submit" class="btn btnTheme btnShop fwEbold text-white py-3 px-4 py-md-3 px-md-4">Shop Now <i class="fas fa-arrow-right ml-2"></i></button>
					</form>
				</section>
			</div>
		
			
		</main>
		</div>
</body>
</html>

@stop