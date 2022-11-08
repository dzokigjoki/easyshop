@extends('clients.naturatherapyshop_al.layouts.default')
@section('content')
<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">{!! trans('naturatherapy/global.thank') !!}</h1>
        <img class="pt-30" width=200 src="{{ url_assets('/naturatherapyshop/img/shop/check.png') }}" alt="">
        <br>
        <a href="{{ $urlLang }}" class="btn btn-lg mt-30 btn-dark"><span>Homepage</span></a>
      </div>
    </div>
  </div>
</section>
@stop