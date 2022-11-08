@extends('clients.lilit.layouts.default')
@section('content')
    <title>Ви Благодариме::Butik Lilit</title>
    <div id="wrapper" class="wide-wrap">
        <div class="content-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 main-wrap">
                        <div class="main-content">
                            <div class="shop">
                                <p  class="return-to-shop"><i style="font-size:300px;" class="fa fa-shopping-cart"></i></p>
                                <p class="cart-empty">Вашата нарачка е успешна! Ви благодариме!</p>
                                <p class="return-to-shop">
                                    <a class="button wc-backward" href="{{route('home')}}">ПОЧЕТНА</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection