@extends('clients.naturatherapyshop.layouts.default')
@section('content')
<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Вашата нарачка беше успешна, Ви благодариме!</h1>
        <img class="pt-30" width=200 src="{{ url_assets('/naturatherapyshop/img/shop/check.png') }}" alt="">
        <br>
        <a href="/cart" class="btn btn-lg mt-30 btn-dark"><span>Назад на почетна</span></a>
      </div>
    </div>
  </div>
</section>
@stop