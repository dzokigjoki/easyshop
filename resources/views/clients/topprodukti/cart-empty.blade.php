@extends('clients.topprodukti.layouts.default')
@section('content')
<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="shopping-cart-page text-center">
                    <i class="fa fa-cart-arrow-down empty-cart-icon" style="font-size: 240px;line-height: normal"></i>
                    <div class="shopping-cart-data clearfix">
                        <p>{{trans('topprodukti.emptyCart')}}</p>
                        <a class="btn btn-primary btn-lg" href="{{route('home')}}">{{trans('topprodukti.startShopping')}} <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

    </div>
</div>
@endsection