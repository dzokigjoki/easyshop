@extends('clients.expressbook_new.layouts.default')
@section('content')
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-35 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-4 text-dark text-capitalize">Кошничка</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Почетна</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Кошничка</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 main-wrap">
                    <div class="main-content">
                        <div class="shop">
                            <h5 class="cart-empty text-center pt-45">Вашата кошничка е празна</h5>
                            <br>
                            <div class="text-center">
                                <img width="200" src="{{ url_assets('/bellina/images/icons/shopping-cart.png') }}" alt="">
                            </div>
                            <br>
                            <h5 class="return-to-shop text-center pb-45">
                                <a class="btn btn-secondary btn--lg d-block d-sm-inline-block mr-sm-2" href="/">Започни со купување</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
