@extends('clients.hotspot.layouts.default')
@section('content')
<div class="container text-center">
  <h3 class="pt-4">
    Вашата кошничка моментално е празна
  </h3>
  <br>
  <div>
    <img  style="width: 100%;max-width:200px;position: relative;left: -10px;" src="{{url_assets('/mymoda/images/icons/shopping-cart.png')}}" >
  </div>
  <div class="text-center pb-4 inverse-btn pt-3">
    <a href="/" class="btn_1">
      Започни со купување
    </a>
  </div>
</div>
@stop