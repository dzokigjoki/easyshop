@extends('clients.crystal-bella.layouts.default')
@section('content')
    <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="not-found-wrapper">
                            <img src="{{ url_assets('/crystal-bella/images/cart-empty.png') }}">
                            <span class="not-found-title">Вашата кошничка е празна!</span>
                            <h2>Разгледајте ја нашата продавница!</h2>
                            <button class="go_to_shop_button">Продавница</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection