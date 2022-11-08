@extends('clients.kliknikupi.layouts.default')
@section('content')

    <div id="pageContent">
        <div class="container offset-80">
            <div class="on-duty-box">
                <img src="/assets/kliknikupi/images/empty-shopping-cart-icon.png" alt="">
                <h1 class="block-title large">Вашата кошничка е празна</h1>
                {{--<div class="description">--}}
                    {{--You have no items in your shopping cart.--}}
                {{--</div>--}}
                <a class="btn btn-border color-default" href="{{route('home')}}">ПОЧНЕТЕ СО КУПУВАЊЕ </a>
            </div>
        </div>
    </div>


@endsection
