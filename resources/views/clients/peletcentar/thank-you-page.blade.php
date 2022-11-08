@extends('clients.peletcentar.layouts.default')
@section('content')
    <div id="pageContent">
        <div class="container offset-80">
            <div class="on-duty-box text-center" style="padding: 10vh 0;">
                <h1 class="block-title large" style="margin-bottom: 20px;">Вашата нарачка е успешна!</h1>
                <div class="description" style="font-size: 20px;">
                    Ви благодариме.
                </div>
                <a class="btn btn-border color-default go-to-home-btn" href="{{route('home')}}">ПОЧЕТНА</a>
            </div>
        </div>
    </div>
@endsection