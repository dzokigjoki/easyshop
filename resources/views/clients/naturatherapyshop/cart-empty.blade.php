@extends('clients.naturatherapyshop.layouts.default')
@section('content')


<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Вашата кошничка е празна</h1>
        <img class="pt-30" width=200 src="{{ url_assets('/yeppeuda/img/shop/shopping-cart.png') }}" alt="">
        <br>
        <a href="/" class="btn btn-lg mt-30 btn-dark"><span>Започни со купување</span></a>
      </div>
    </div>
  </div>
</section>

@stop 