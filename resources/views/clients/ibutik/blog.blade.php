@extends('clients.ibutik.layouts.default')
@section('content')
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">{{$blog->title}}</h1>
            <ol class="breadcrumb page-breadcrumb">
                <li><a href="{{route('home')}}">Почетна</a></li>
                <i class="fa fa-angle-right"></i>
                <li class="active">{{$blog->title}}</li>
            </ol>
        </header>
        <div class="row">
            <img class="product-img" src="{{\ImagesHelper::getBlogImage($blog)}}"
                 style="padding: 10px; width: 400px;"    align="left" alt=""/>
            <div>    {!! $blog->description !!}</div>
        </div>
    </div>

    <div class="gap"></div>

@endsection