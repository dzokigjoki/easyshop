@extends('clients.topmarketmk.layouts.default')
@section('content')
    <section id="content">
        <div id="breadcrumb-container">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}">Дома</a></li>
                    <li class="active">Кошничка</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                    <header style="text-align: center;" class="content-title">
                        <h1  class="">Вашата кошничка е моментално празна!</h1>
                    </header>
                    <div class="xs-margin"></div><!-- space -->
                <div style="text-align:center !important;">
                    <i style="font-size:400px; text-align: center !important;" class="fa fa-shopping-cart"></i>
                    <div class="item-action">
                        <a href="{{route('home')}}" class="item-add-btn" id="add_to_cart">
                            <span style="text-align: center; font-size:30px" class="icon-cart-text">Започни со купување</span>
                        </a>
                    </div><!-- End .item-action -->
                </div>
            </div>

        </div>
    </section>
@endsection