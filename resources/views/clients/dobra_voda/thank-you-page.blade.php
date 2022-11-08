@extends('clients.dobra_voda.layouts.default')
@section('content')

<style>
    /* .best-seller {
    font-size: 11px;
    z-index: 9999 !important;
    position: absolute;
    background-color: #6EA4BF;
    color: white;
    padding: 4px;
    border-radius: 20px;
    left: 160px !important;
  } */
</style>


<div class="ps-main pt-60">
    <div class="container">
        <div class="row pb-30">

            <div class="col-md-12">
                <div class="text-center">
                    <img width="200" src="{{url_assets('/dobra_voda/images/shopping-cart.png')}}" alt="">
                </div>
            </div>


            <div class="col-md-12 pt-30">
                <div class="title-section text-center">
                    <p class="cart-empty">Ви благодариме за нарачката</p>
                </div>
            </div>

        </div>

    </div>
</div>
@stop