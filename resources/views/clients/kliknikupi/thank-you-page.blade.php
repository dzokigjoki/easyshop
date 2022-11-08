@extends('clients.kliknikupi.layouts.default')
@section('content')
    <div id="pageContent">
        <div class="container offset-80">
            <div class="on-duty-box">
                <img src="/assets/kliknikupi/images/logo@2x.png" alt="">
                <h1 class="block-title large">Вашата нарачка е успешна!</h1>
                <div class="description">
                Ви благодариме.
                </div>
                <a class="btn btn-border color-default" href="{{route('home')}}">ПОЧЕТНА</a>
            </div>
        </div>
    </div>
    @endsection