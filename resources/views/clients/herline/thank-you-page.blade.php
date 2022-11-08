@extends('clients.herline.layouts.default')
@section('content')
<div class="heading-container">
    <div class="container heading-standar">
        <div class="page-breadcrumb">
            <ul class="breadcrumb">
                <li><span><a href="/" class="home"><span>Почетна</span></a></span></li>
                <li><span>Кошничка</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-wrap">
                <div class="main-content">
                    <div class="shop">
                        <p class="cart-empty">Ви благодариме за нарачката</p>
                        <br>
                        <div class="text-center">
                            <img width="200" src="{{url_assets('/herline/images/shopping-cart.png')}}" alt="">
                        </div>
                        <br>
                        <p class="return-to-shop">
                            <a class="button" href="/">Вратете се на почетна</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop