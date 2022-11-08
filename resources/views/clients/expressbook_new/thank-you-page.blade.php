@extends('clients.expressbook_new.layouts.default')
@section('content')
    <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 main-wrap">
                    <div class="main-content">
                        <div class="shop">
                            <h3 class="cart-empty text-center pt-45">Вашата нарачка е успешна извршена</h3>
                            <br>
                            <div class="text-center">
                                <img width="200" src="{{ url_assets('/bellina/images/icons/shopping-cart.png') }}" alt="">
                            </div>
                            <br>
                            <h5 class="return-to-shop text-center pb-45">
                                <a class="btn btn-secondary btn--lg d-block d-sm-inline-block mr-sm-2" href="/">Назад кон почетна</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
