@extends('clients.peletcentar.layouts.default')

@section('content')
    <div class="container">
        <div class="text-center"><i style="font-size: 250px; color:black;" class="fa fa-cart-arrow-down"></i>
            <p class="lead">Вашата кошничка е празна!</p>
            <br>
            <a class="emptycart buy_home" href="{{route('home')}}">Започни со купување <i class="fa fa-long-arrow-right"></i></a>
        </div>
       <br><br>
    </div>
@endsection