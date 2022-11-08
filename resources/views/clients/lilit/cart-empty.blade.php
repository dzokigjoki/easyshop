@extends('clients.lilit.layouts.default')
@section('content')
<div id="wrapper" class="wide-wrap">
    <div class="heading-container">
        <div class="container heading-standar">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li><span><a href="#" class="home"><span>Дома</span></a></span></li>
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
                            <p  class="return-to-shop"><i style="font-size:300px;" class="fa fa-shopping-cart"></i></p>
                            <p class="cart-empty">Вашата кошничка е празна</p>
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