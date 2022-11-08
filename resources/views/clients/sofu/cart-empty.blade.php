@extends('clients.sofu.layouts.default')
@section('content')

<div class="container container_empty">
    <div class="row">
        <div class="col-md-12">
            <div class="main-content">
                <div class="shop">
                    <p class="cart-empty">Вашата кошничка е празна</p>
                    <br>
                    <div class="text-center">
                        <img width="200" src="{{url_assets('/sofu/images/shopping-cart.png')}}" alt="">
                    </div>
                    <br>
                    <p class="return-to-shop text-center">
                        <a class="button" href="/">Започни со купување</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@stop