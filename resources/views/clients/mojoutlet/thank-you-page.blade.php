@extends('clients.shopathome.layouts.default')
@section('content')
    {{--<div class="breadcrumbs">--}}
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb breadcrumb--ys pull-left">--}}
                {{--<li class="home-link"><a href="{{route('home')}}" class="icon icon-home"></a></li>--}}
                {{--<li><a href="{{route('home')}}">Дома</a></li>--}}
                {{--<li class="active">Кошничка</li>--}}
            {{--</ol>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div id="pageContent">
        <div class="container">
            <!-- title -->
            <div class="title-box">
                <h1 class="text-center text-uppercase title-under">Ви благодариме за нарачката</h1>
            </div>
            <!-- /title -->
            <div class="text-center">
                <img src="{{ url_assets('/mojoutlet/images/empty-cart-icon-happy.png') }} " alt="empty cart icon" class="img-responsive-inline" />
                <div class="divider divider--lg"></div>
                <h4 class="color">Погледнете ги сите продукти</h4>
                <div class="divider divider--lg"></div>
                <a class="btn btn--ys" href="{{route('home')}}"><span class="icon icon-keyboard_arrow_left"></span>Продолжи со купување</a>
            </div>
        </div>
    </div>

@endsection