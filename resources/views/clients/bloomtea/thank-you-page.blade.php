@extends('clients.bloomtea.layouts.default')
@section('content')
    <section class="sec-welcome bg0 p-t-145 p-b-95" style="background-image: url({{ url_assets('/bloomtea/images/blurred-backround.jpg') }})">
        <div class="container">
            <div class="size-a-1 flex-col-c-m p-b-90">
                <div class="txt-center txt-m-201 cl10 how-pos1-parent m-b-14">
                    <h1 style="color: white;">Вашата нарачка е успешна.</h1><br>
                    <div>
                        <img src="{{ url_assets('/bloomtea/images/empty-cart-icon-happy.png') }}">
                    </div>
                    <br>
                    <a href="{{route('home')}}" style="background-color: #016939;" class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10">
                        <span style="font-family: 'Roboto Condensed';">Назад на почетна</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection