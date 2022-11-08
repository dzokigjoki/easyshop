@extends('clients.crystal-bella.layouts.default')
@section('content')

    <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="not-found-wrapper">
                            <img src="{{ url_assets('/crystal-bella/images/cart-icon.png') }}">
                            <span class="not-found-title">Успешна нарачка!</span>
                            <h2>Ви благодариме за нарачката!</h2>
                            <button class="go_to_home_button" onclick='location.href="{{route('home')}}"'>Почетна</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection