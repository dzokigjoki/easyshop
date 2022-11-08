@extends('clients.alex_filippe.layouts.default')
@section('content')
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="shopping-cart-page text-center">
                        <i class="fa fa-shopping-cart " style="font-size: 240px;line-height: normal"></i>
                        <div class="shopping-cart-data clearfix">
                            <a class="btn btn-primary btn-lg" href="{{route('home')}}">{{trans('global.messages.thank_you_for_ordering')}} <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>
@endsection