@extends('clients.shopathome.layouts.default')
@section('content')
    <div id="content">
        <div class="collection clearfix">
            <div class="container">
                <div class="row">
                    <p style="text-align: center;" class="return-to-shop"><i style="color:black;font-size:300px;" class="fa fa-shopping-cart"></i></p>
                    <h2 style="text-align: center;" class="cart-empty">Вашата нарачка е успешна, Ви благодариме!</h2>
                    <p class="return-to-shop">
                        <br>
                        <a class="medium-button button-red centeredButton" href="{{route('home')}}">ПОЧЕТНА</a>
                    </p>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
@endsection