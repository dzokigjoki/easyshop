@extends('clients.drbrowns.layouts.default')
@section('content')
    <div class="container">
        <div class="text-center"><i style="font-size: 250px; color:#666" class="fa fa-shopping-cart"></i>
            <p class="lead">Вашата кошничка е празна!</p>
            <br>
            <a class="button add_to_cart_button product_type_simple" href="{{route('home')}}">Започни со купување <i class="fa fa-long-arrow-right"></i></a>
        </div>
        <br><br>
    </div>
@endsection