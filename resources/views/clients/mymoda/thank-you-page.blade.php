@extends('clients.mymoda.layouts.default')
@section('content')
<style>
  #empty-cart-icon {
    width: 200px;
  }

  .pt-60 {
    padding-top: 60px !important;
  }

  .mb-60 {
    margin-bottom: 60px !important;
    padding-bottom: 0;
  }

  .ps-about-features {
    padding: 0;
  }

  #start-shopping {
    background-color: #ca2028;
    line-height: 20px;
    padding: 15px 30px;
    color: #fff;
  }
</style>


<div class="ps-breadcrumb ps-breadcrumb--2 hidden-xs">
  <div class="ps-container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
        <ol class="breadcrumb">
          <li><a href="/">Почетна</a></li>
          <li><a>Ви благодариме за нарачката</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="ps-about-features pt-60">
  <div class="ps-container-fluid">
    <div class="ps-section__header mb-60">
      <h2 class="font-weight-700 text-center">
        Вашата нарачка е успешна, ви благодариме!
      </h2>
      <br>
      <div>
        <img class="empty_cart_position" id="empty-cart-icon" src="{{url_assets('/mymoda/images/icons/shopping-cart.png')}}" alt="">
      </div>
      <br>
      <div class="row">
        <div class=" col-md-offset-3 col-md-12 col-lg-12 col-sm-12 col-sm-offset-3 col-xs-12 col-xs-offset-3 "> <a href="/" class="ps-btn" id="start-shopping">
          Почетна
        </a></div>
       
      </div>

    </div>
  </div>
</div>
@stop