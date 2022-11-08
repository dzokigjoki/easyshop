@extends('clients.skin-care.layouts.default')
@section('content')


<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Вашата нарачка е успешна, ви благодариме!</h1>
        <img class="pt-30" width=200 src="{{ url_assets('/skin-care/img/shop/check.png') }}" alt="">
        <br>
        <a href="/cart" class="btn btn-lg mt-30 btn-dark"><span>Кон почетна</span></a>
      </div>
    </div>
  </div>
</section>

@stop