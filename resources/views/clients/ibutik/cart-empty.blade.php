@extends('clients.ibutik.layouts.default')

@section('content')
    <div class="container">
        <div class="text-center"><i class="fa fa-cart-arrow-down empty-cart-icon"></i>
            <p class="lead">Вашата кошничка е празна!</p><a class="btn btn-primary btn-lg" href="{{route('home')}}">Започни со купување <i class="fa fa-long-arrow-right"></i></a>
        </div>
        <div class="gap"></div>
    </div>
@endsection