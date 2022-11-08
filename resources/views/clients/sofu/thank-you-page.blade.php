@extends('clients.sofu.layouts.default')
@section('content')
<div class="content-container container_empty">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="shop">
                        <p class="cart-empty">Ви благодариме за нарачката</p>
                        <br>
                        <div class="text-center">
                            <img width="200" src="{{url_assets('/sofu/images/shopping-cart.png')}}" alt="">
                        </div>
                        <br>
                        <p class="return-to-shop text-center">
                            <a class="button" href="/">Вратете се на почетна</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop