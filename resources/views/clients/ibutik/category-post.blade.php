@extends('clients.ibutik.layouts.default')
@section('content')
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">{{$category->title}}</h1>
            <ol class="breadcrumb page-breadcrumb">
                <li><a href="{{route('home')}}">Почетна</a>
                </li>
                <i class="fa fa-angle-right"></i>
                <li class="active">{{$category->title}}</li>
            </ol>
        </header>
        <span>{!! $category->description !!}</span>
    </div><br>
@endsection
