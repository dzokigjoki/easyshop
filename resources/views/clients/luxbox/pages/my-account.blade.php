@extends('clients.luxbox.layouts.default')
@section('content')
<div class="page-content">
	<!-- Breadcrumb Section -->
	<section class="breadcrumb-contact-us breadcrumb-section section-box">
		<div class="container">
			<div class="breadcrumb-inner">
				<h1>Профил</h1>
				<ul class="breadcrumbs">
					<li><a class="breadcrumbs-1" href="/">Почетна</a></li>
					<li>
						<p class="breadcrumbs-2">Профил</p>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb Section -->

	<!-- My Account Section -->
	<section class="my-account-section section-box">
		<div class="woocommerce">
			<div class="container">
				<div class="content-area">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="entry-content">
								<h2 class="special-heading">Најава</h2>
								<form class="woocommerce-form-login js-contact-form" action="{{route('auth.login.post')}}" method="POST">
									{{csrf_field()}}
									<p class="woocommerce-form-row">
										<input type="text" class="woocommerce-Input input-text" name="email" id="email" value="" placeholder="Е-пошта *">
									</p>
									<p class="woocommerce-form-row">
										<input class="woocommerce-Input input-text" type="password" name="password" id="password" placeholder="Лозинка *">
									</p>
									<p class="form-button">
										<label>
											<button class="woocommerce-Button au-btn btn-small">Најава</button>
											<span class="arrow-right"><i class="zmdi zmdi-arrow-right"></i></span>
										</label>
										<label class="woocommerce-form__label">
											<input class="woocommerce-form__input" name="rememberme" type="checkbox" id="rememberme" value="forever">
											<span>Запомни ме</span>
										</label>
									</p>
									<p class="woocommerce-LostPassword">
										<a href="lost-password.html">Заборавена лозинка?</a>
									</p>
								</form>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="novas-form-signup">
								<h2 class="special-heading">Регистрација</h2>
								<form class="woocommerce-form-register js-contact-form" action="{{route('auth.register.post')}}" method="post">
									{{csrf_field()}}
									<p class="woocommerce-form-row">
										<input type="text" class="woocommerce-Input input-text" name="first_name" id="first_name" value="" placeholder="Име *">
									</p>
									<p class="woocommerce-form-row">
										<input type="text" class="woocommerce-Input input-text" name="last_name" id="last_name" value="" placeholder="Презиме *">
									</p>
									<p class="woocommerce-form-row">
										<input type="text" class="woocommerce-Input input-text" name="email" id="email" value="" placeholder="Е-пошта *">
									</p>
									<p class="woocommerce-form-row">
										<input class="woocommerce-Input input-text" type="password" name="password" id="password" placeholder="Лозинка *">
									</p>
									<p class="woocommerce-form-row">
										<input class="woocommerce-Input input-text" type="password" name="password_confirmation" id="password_confirmation" placeholder="Потврди лозинка *">
									</p>
									<p class="form-button">
										<button class="woocommerce-Button au-btn btn-small">Регистрација</button>
										<span class="arrow-right arrow-right-register"><i class="zmdi zmdi-arrow-right"></i></span>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End My Account Section -->

</div>
@stop