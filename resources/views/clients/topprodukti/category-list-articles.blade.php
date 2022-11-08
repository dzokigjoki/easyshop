@extends('clients.topprodukti.layouts.default')
@section('content')
    <div class="row">
        <!--Left Part Start -->
        @include('clients.topprodukti.category-list-article-leftSide')
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
            <h1 class="title">{{$category->title}}</h1>
            @include('clients.topprodukti.category-list-article-filters')
            <div  data-products-list="">
                @include('clients.topprodukti.partials.category-products-list')
            </div>

            <!--Middle Part End -->
        </div>
        @endsection
        @section('scripts')
@endsection