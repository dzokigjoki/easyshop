<style>
	.izvestuvanje{
	width: 190px;
    height: 57px;
    background: green;
    color: white;
    float: right;
    text-align: center;
    padding-top: 14px;
    border-radius: 8px;
    font-weight: 400;
	cursor: pointer;
	transition: 1s;
	opacity: 0.7;
	display: none;
	/* position: fixed;
	left: 74rem; */
	
	}
	.izvestuvanje:hover{
		box-shadow: 1px 2px 12px 0px #888888;
		color:#e6dede;
		transition: 1s;
		
	}
	
   
	.listaProdukt{
		display: flex;
    	align-items: center;
	}
	.slikaKosnica{
		border-radius: 10px;
   	 	position: relative;
    	right: 10px;
	}
	.naslovProdukt{
		color: #508e00;
		text-transform: uppercase;
		cursor: pointer;
	}
	#brisiProdukt{
		color: #508e00;
		cursor: pointer;
		position: relative;
		left: 5px;
	}
	.konKosnica{
		background: #508e00;
    	border: transparent;
    	width: 100%;
    	position: relative;
   	 	bottom: 15px;
    	height: 40px;
    	border-radius: 10px;
    	left: 14px;
	}
	.konKosnica a{
		color: #e5e9e0;
		text-transform: uppercase;
		font-weight: 500;
	}
</style>
<header id="header" class="position-relative">
    <!-- headerHolderCol -->

    <!-- headerHolder -->
    <div class="headerHolder container pt-lg-5 pb-lg-7 py-4">
        <div class="row">
            <div class="col-6 col-sm-2">
                <!-- mainLogo -->
                <div class="logo">
                    <a href="home.html"><img src="{{ url_assets('/e-commerce/images/logo.jpg') }}" alt="Botanical"
                            class="img-fluid"></a>
                </div>
            </div>
            <div class="col-6 col-sm-7 col-lg-8 static-block">
                <!-- mainHolder -->
                <div class="mainHolder pt-lg-5 pt-3 justify-content-center">
                    <!-- pageNav2 -->
                    <nav class="navbar navbar-expand-lg navbar-light p-0 pageNav2 position-static">
                        <button type="button" class="navbar-toggle collapsed position-relative" data-toggle="collapse"
                            data-target="#navbarNav" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav mx-auto text-uppercase d-inline-block">
                                @foreach ($menuCategories as $menuCategory)
                                    <li class="dropdown">
                                        {{-- href="{{ route('category', [$menuCategory['id'], $menuCategory['url']]) }}" --}}
                                        <a>{{ $menuCategory['title'] }}</a>
                                        <i class="fa fa-angle-down dropdown-trigger"></i>


                                        @if (isset($menuCategory['children']))
                                            <ul class="dropdown-menu">
                                                @foreach ($menuCategory['children'] as $ch)
                                                    <li><a
                                                            href="{{ route('category', [$ch['id'], $ch['url']]) }}">{{ $ch['title'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach

                                <li class="nav-item">
                                    <a class="d-block" href="/about">About</a>
                                </li>
                                {{-- <li class="nav-item dropdown">
									<a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
								</li> --}}

                                <li class="nav-item">
                                    <a class="d-block" href="/contact">contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-sm-3 col-lg-2">
                <!-- wishListII -->
                <?php
                $sessionProducts = session('cart_products');
                
                if (isset($sessionProducts)) {
                    $total = count(session('cart_products'));
                } else {
                    $total = 0;
                }
                ?>
                <ul class="nav nav-tabs wishListII pt-5 justify-content-end border-bottom-0">
                    <li class="nav-item"><a class="nav-link position-relative icon-cart navCart"
                            href="javascript:void(0);"><span class="num rounded d-block">{{$total}}</span></a></li>

                </ul>
                
            </div>

        </div>
        <div class="uspesenProizvod izvestuvanje">Article added succesfully!</div>
        <div class="poleKosnica" id="shoppingCart">
            {{-- <ul class="redi"></ul> --}}
            @include('clients.e-commerce.cart-partial')
        </div>
    </div>
   
</header>
