@extends('clients.dobra_voda.layouts.default')
@section('content')
<div class="quicky-content_wrapper pt-90 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="shop">
                        <p class="cart-empty">Вашата кошничка е празна</p>
                        <br>
                        <div class="text-center">
                            <img width="200" src="{{url_assets('/dobra_voda/images/shopping-cart.png')}}" alt="">
                        </div>
                        <br>
                        <p class="return-to-shop">
                            <a class="button" href="/">Започни со купување</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop