@extends('clients.tehnopolis.layouts.default')
@section('content')
    <div class="secondary_page_wrapper">

        <div class="container" style="height: 300px;">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="shopping-cart-page align_center" style="text-align: center">

                        <div>
                            <img src="assets\tehnopolis\images\checkmark.png" style="width: 200px; height: 200px">
                        </div>
                        <div style="font-size: 24px;" class="shopping-cart-data clearfix align_center">
                            Вашата нарачка е успешна!
                            {{--</a>--}}
                        </div>
                        <div style="font-size: 24px;">
                            Ви благодариме!
                        </div>
                        <br>
                        <div>
                            <a class="btn btn-danger" href="https://tehnopolis.mk">
                                <i style="font-size: 24px;" class="fa fa-shopping-cart"> </i>
                                &nbsp;
                                &nbsp;
                                <span style=" font-size: 26px;cursor: pointer;">Назад на почетна</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

        </div>
    </div>
@endsection