@extends('clients.ibutik.layouts.default')

@section('content')
    <div class="container">
        <div class="text-center"><i class="fa fa-check" style="font-size: 250px;"></i>
            <p class="lead">Вашата нарачка е успешна! Ви благодариме!</p>
            <a class="btn btn-primary btn-lg" href="{{route('home')}}">Дома <i class="fa fa-long-arrow-right"></i></a>
        </div>
        <div class="gap"></div>
    </div>
@endsection