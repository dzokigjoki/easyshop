@extends('clients.accessories.layouts.default')
@section('content')
<style>
    .pt-30{
        padding-top: 30px;
    }

    .color-cart{
        color:#595959 !important;
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
                        <h3 class="color-cart">Вашата кошничка е празна!</h3>
                        <div class="shopping-cart-data clearfix pt-30">
                            <a class="btn btn-primary btn-lg btn-thank-you-page-color" href="{{route('home')}}">Почетна</a>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>
@endsection