@extends('clients.topmarket.layouts.default')
@section('content')
    <div class="page_wrapper">

        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12" style="text-align: center">
                    <div>
                        <i class="fa fa-shopping-cart"
                           style="font-size: 260px;line-height: normal;"></i>

                        <div class="shopping-cart-data clearfix align_center" style="margin: 0 auto"><br>
                            <p style="font-size: 24px;margin-top: -50px;padding: 15px 0;">Вашата кошничка е празна!</p>
                            <a class="btn btn-custom-2 btn-block" id="start_shopping" href="{{route('home')}}">Започни со купување <i
                                        class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>
@endsection