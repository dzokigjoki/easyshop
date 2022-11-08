@extends('clients.dorikele.layouts.default')
@section('content')
    <!-- Intro Title Section 2 -->
    <!--<div class="section-block intro-title-2 intro-title-2-3">-->

    <div class="row">
        <div class="column width-12">
            <div class="title-container">

            </div>
        </div>
    </div>
    <!--</div>-->
    <!-- Intro Title Section 2 End -->

    <!-- Checkout -->
    <div style="padding:50px;margin-top:100px;text-align: justify;" class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="column width-12">
            <div style="text-align: center; margin: 0 auto;" class="shopping-cart-page text-center">
                <i style="font-size:200px;" class="fa fa-cart-arrow-down empty-cart-icon" id="empty-cart-icon"></i>
                <div>
                    <h2><strong>Вашата кошничка е празна!</strong></h2>
                    <br>
                    <a href="{{route('home')}}"><button class="hoverCrno button pill add-to-cart-button">Започнете со купување</button></a>
                    <p style="margin-top: 100px;">

                </div>
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- Checkout End -->
@endsection