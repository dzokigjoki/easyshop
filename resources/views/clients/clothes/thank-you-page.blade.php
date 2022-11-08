@extends('clients.clothes.layouts.default')
@section('content')
<style>
    .pt-30{
        padding-top: 30px;
    }
    .btn-thank-you-page-color{
        background-color:#CF5053 !important; 
        border-color: #CF5053 !important; 
        color: white;
    }
    .cart-color{
        color: #444444;
    }
</style>

    <div class="main pt-150 pb-100 pt-50 pb-50">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="shopping-cart-page text-center">
                        <i class="fa fa-shopping-cart font-size-100 cart-color" style="font-size: 240px;line-height: normal"></i>
                        <div class="shopping-cart-data clearfix pt-30">
                            <a class="btn btn-lg btn-thank-you-page-color" href="{{route('home')}}">{{trans('global.messages.thank_you_for_ordering')}} <i class="fas fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>
@endsection