<header class="one-edge-shadow">





    <?php
    $totalProducts = 0;
    if (\Session::has('cart_products')) {
        foreach (session()->get('cart_products') as $product) {
            $product = (object)$product;
            $totalProducts = $totalProducts + $product->quantity;
        }
    }
    ?>

    <div class="header-top d-none d-md-block bg-primary py-2">
        <div class="container">
            <ul class="list-inline text-right mb-0">
                <li class="list-inline-item mr-2 mr-md-3 mr-xl-4 float-left">
                    {!! trans('naturatherapy/header.free_delivery') !!}
                </li>
                <li class="list-inline-item"></li>
                <li class="list-inline-item mr-2 mr-md-3 mr-xl-4">
                <li class="list-inline-item mr-2 mr-md-3 mr-xl-4">
                    <a href="mailto:contact@naturatherapy.al" class="link link-dark mr-2"><i class="fa fa-envelope-o text-green mr-2" aria-hidden="true"></i>contact@naturatherapy.al</a>
                    <a href="mailto:contact@naturaks.com" class="link link-dark"><i class="fa fa-envelope-o text-green " aria-hidden="true"></i>contact@naturaks.com</a>

                </li>
                <li class="list-inline-item ">
                    <a href="tel:+383 45 956 000" class="link link-dark font-weight-medium"><i class="fa fa-phone text-green mr-2" aria-hidden="true"></i>{!! trans('naturatherapy/header.order_at') !!}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <nav class="navbar row navbar-expand-lg navbar-light navbar-bg-color align-items-md-center px-0">
            <div class="col order-1 order-lg-1">
                <a class="navbar-brand mx-0" href="{{ route('home') }}">
                    <img class="logo" src="{{ url_assets('/naturatherapy/images/logo.svg') }}" alt="Logo">
                </a>
            </div>
            <div class="col-lg-auto order-3 order-lg-2">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-lg-auto">
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="/za-nas">{!! trans('naturatherapy/header.about') !!}</a>
                        </li>
                        @foreach($menuCategories as $mc)
                        <li class="nav-item text-uppercase">
                            <a href="{{route('category', [$mc['id'], $mc['url']])}}" class="nav-link">
                                <span class="underline">{{$mc['title']}}</span>
                            </a>
                        </li>
                        @endforeach
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="/nutrigenetika">{!! trans('naturatherapy/header.nutrigenetika') !!}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="/c/3/produkte">{!! trans('naturatherapy/header.naucnodokazano') !!}</a>
                        </li>
                        <li class="nav-item text-uppercase">
                            <a class="nav-link" href="/faq">{!! trans('naturatherapy/header.faq') !!}</a>
                        </li>
                        {{--
						<li class="nav-item text-uppercase">
                        <a class="nav-link" href="#">{!! trans('naturatherapy/header.career') !!}</a>
                        </li>
                        --}}
                    </ul>

                    <ul class="navbar-nav d-md-none mt-auto mb-0">
                        <li class="nav-item">
                            <hr class="my-3">
                        </li>
                        <li class="nav-item">
                            <a href="mailto:contact@naturaks.com" class="nav-link"><i class="fa fa-envelope-o text-green mr-2" aria-hidden="true"></i>contact@naturaks.com</a>
                        </li>
                        <li class="nav-item">
                            <a href="tel:+383 45 956 000" class="nav-link font-weight-medium"><i class="fa fa-phone text-green mr-2" aria-hidden="true"></i>Porositni në: +383 45 956 000</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col order-2 order-lg-3">
                <ul class="list-inline shop-controls text-right mb-0">
                    {{--
					<li class="list-inline-item mr-3">
						<a href="#" class="shop-control" type="button" data-toggle="modal" data-target="#searchModal">
							<i class="fa fa-search"></i>
						</a>
					</li>
					--}}
                    <li class="list-inline-item">
                        <a href="{{ route('cart') }}" class="shop-control">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="badge badge-primary" data-amount-value data-cart-items>{{ $totalProducts }}</span>
                        </a>
                        {{--
						<div class="dropdown">
							<a href="#" class="shop-control" data-toggle="dropdown" id="dropdownCart">
								<i class="fa fa-shopping-cart"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCart">
								<a class="dropdown-item" href="{{ route('cart') }}">Shporta</a>
                        <a class="dropdown-item" href="#">Karrocë bosh</a>
            </div>
    </div>
    --}}
    </li>
    <li class="list-inline-item d-inline-block d-lg-none">
        <button class="navbar-toggler shop-control" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{ url_assets('/naturatherapy/images/menu.svg') }}" class="hamburger-menu-icon">
        </button>
    </li>
    </ul>
    </div>
    </nav>
    </div>
</header>
{{--

<div class="modal fade search-dialog" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<form id="search-dialog-form" class="search-dialog-form" method="GET" action="{{ route('search') }}">
@csrf
<div class="input-group">
    <input type="text" class="form-control" name="search-query" placeholder="Kërko..." aria-label="Kërko...">
    <div class="input-group-append">
        <button class="btn btn-form" type="submit">Kërko <i class="fa fa-search ml-2"></i></button>
    </div>
</div>
<p class="error-msg">Грешка</p>
</form>
</div>
</div>
</div>
</div>
--}}