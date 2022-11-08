@extends('clients.expressbook.layouts.default')
@section('content')
    {{--<div class="container">--}}
    <div class="breadcrumb">
        <div class="container">
            <ul class="breadcrumb ">
                <li><a href="{{route('home')}}">Дома</a></li>
                <li class="active">{{$category->title}}</li>
            </ul>
            <span>{!! $category->description !!}</span>
        </div>
    </div>
    {{--</div><br><br>--}}
@endsection























