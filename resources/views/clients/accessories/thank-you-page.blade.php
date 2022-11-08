@extends('clients.accessories.layouts.default')
@section('content')
<style>
    .pt-30{
        padding-top: 30px;
    }
</style>

    <div class="main pt-150 pb-100 pt-50 pb-50">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="shopping-cart-page text-center">
                        <i class="fa fa-shopping-cart font-size-100 " style="font-size: 240px;line-height: normal"></i>
                        <div class="shopping-cart-data clearfix pt-30">
                            <a class="btn btn-primary btn-lg btn-thank-you-page-color" href="{{route('home')}}">{{trans('global.messages.thank_you_for_ordering')}} <i class="fas fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>
@endsection