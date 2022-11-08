@extends('clients.e-commerce.layouts.default')

@section('content')

    <body>
        <!-- pageWrapper -->
        <div id="pageWrapper">
            <!-- header -->

            <!-- main -->
            <main>
                <!-- introBannerHolder -->
                <section class="introBannerHolder d-flex w-100 bgCover" {{-- style="background-image: url(http://placehold.it/1920x300);" --}}>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 pt-md-15 pt-sm-10 pt-6 text-center">
                                <h1 class="headingIV fwEbold playfair mb-4">{{ $product->title }}</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- twoColumns -->
                <div class="twoColumns container pt-xl-23 pb-xl-20 pt-lg-20 pb-lg-20 py-md-16 py-10">
                    <div class="row mb-6">
                        <div class="col-12 col-lg-6 order-lg-1">
                            <!-- productSliderImage -->
                            <div class="productSliderImage mb-lg-0 mb-4">
                                <div>

                                    <img src="{{ $product->image }}" alt="" />
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-6 order-lg-3">
                            <!-- productTextHolder -->
                            <div class="productTextHolder overflow-hidden">
                                {{-- <h2 class="fwEbold mb-2">{{ $product->title }}</h2> --}}

                                <strong class="price d-block mb-5 text-green">{{ $product->price }}.00 $</strong>

                                <p class="mb-5">{{ $product->short_description }}</p>
                                <ul class="list-unstyled productInfoDetail mb-5 overflow-hidden">
                                    <li class="mb-2">Product Code: <span>{{ $product->unit_code }}</span></li>
                                    <li class="mb-2">Quantity: <span>{{ $product->total_stock }}</span></li>

                                </ul>


                                <div class="holder overflow-hidden d-flex flex-wrap mb-6">
                                    <input type="number" placeholder="{{ $product->total_stock }}">
                                    <a href="javascript:void(0);"
                                        class="btn btnTheme btnShop fwEbold text-white md-round py-3 px-4 py-md-3 px-md-4">Add
                                        To Cart <i class="fas fa-arrow-right ml-2"></i></a>
                                </div>


                            </div>

                        </div>
                    </div>
                    {{-- <div class="row">
					<div class="col-12">
						<!-- paggSlider -->
						<div class="paggSlider">
							<div>
								<div class="imgBlock">
									<img src="" alt="image description" class="img-fluid">
								</div>
							</div>
							<div>
								<div class="imgBlock">
									<img src="" alt="image description" class="img-fluid">
								</div>
							</div>
							<div>
								<div class="imgBlock">
									<img src="" alt="image description" class="img-fluid">
								</div>
							</div>
							<div>
								<div class="imgBlock">
									<img src="" alt="image description" class="img-fluid">
								</div>
							</div>
							<div>
								<div class="imgBlock">
									<img src="" alt="image description" class="img-fluid">
								</div>
							</div>
							<div>
								<div class="imgBlock">
									<img src="" alt="image description" class="img-fluid">
								</div>
							</div>
							<div>
								<div class="imgBlock">
									<img src="" alt="image description" class="img-fluid">
								</div>
							</div>
						</div>
					</div>
				</div> --}}
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- tabSetList -->
                            <ul class="list-unstyled tabSetList d-flex justify-content-center mb-9">
                                <li class="mr-md-20 mr-sm-10 mr-2">
                                    <a href="#tab1-0" class="active playfair fwEbold pb-2">Description</a>
                                </li>

                            </ul>
                            <!-- tab-content -->
                            <div class="tab-content mb-xl-11 mb-lg-10 mb-md-8 mb-5">
                                <div id="tab1-0" class="active">
                                    <p>{{ $product->description }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- featureSec -->
                <section
                    class="featureSec container overflow-hidden pt-xl-12 pb-xl-29 pt-lg-10 pb-lg-14 pt-md-8 pb-md-10 py-5">
                    <div class="row">
                        <!-- mainHeader -->
                        <header class="col-12 mainHeader mb-5 text-center">
                            <h1 class="headingIV playfair fwEblod mb-4">Related products</h1>
                        </header>
                    </div>
                    <div class="row">
                        <!-- featureCol -->
                        <div class="col-12 p-0 overflow-hidden d-flex flex-wrap">
                            @foreach ($relatedProducts as $product)
                                <div class="featureCol px-3 mb-6">
                                    <div class="border">
                                        <div class="imgHolder position-relative w-100 overflow-hidden">
                                            @include('clients.e-commerce.partials.product')
                                            <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">

                                                <li class="mr-2 overflow-hidden addToCart"><a href="javascript:void(0);" class="icon-cart d-block kupi" style="font-size: 20px; font-weight:bold;" data-add-to-cart="" productId="{{$product->id}}" productTitle="{{$product->title}}" productImage="{{$product->image}}"><span class="buyText">Buy</span></a></li>
                                                    

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
        </div>
        <div class="row">

            <!-- end slider -->

        </div>
        </section>

        <!-- footerHolder -->
        <aside class="footerHolder overflow-hidden bg-lightGray pt-xl-23 pb-xl-8 pt-lg-10 pb-lg-8 pt-md-12 pb-md-8 pt-10">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-7">Contact Us</h3>
                        <ul class="list-unstyled footerContactList mb-3">
                            <li class="mb-3 d-flex flex-nowrap pr-xl-20 pr-0"><span class="icon icon-place mr-3"></span>
                                <address class="fwEbold m-0">Address: London Oxford Street, 012 United Kingdom.</address>
                            </li>
                            <li class="mb-3 d-flex flex-nowrap"><span class="icon icon-phone mr-3"></span> <span
                                    class="leftAlign">Phone : <a href="javascript:void(0);">(+032) 3456 7890</a></span></li>
                            <li class="email d-flex flex-nowrap"><span class="icon icon-email mr-2"></span> <span
                                    class="leftAlign">Email: <a
                                        href="javascript:void(0);">Botanicalstore@gmail.com</a></span></li>
                        </ul>
                        <ul class="list-unstyled followSocailNetwork d-flex flex-nowrap">
                            <li class="fwEbold mr-xl-11 mr-md-8 mr-3">Follow us:</li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-facebook-f"></a>
                            </li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-twitter"></a>
                            </li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-pinterest"></a>
                            </li>
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
        </aside>
        </main>
        <!-- footer -->

        </div>


    </body>

@stop
