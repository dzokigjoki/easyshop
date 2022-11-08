@extends('clients.naturatherapy.layouts.default')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection




@section('content')

<section class="shop-section section elements py-10 py-xl-200">
  <div class="element-top">
    <img src="{{ url_assets('/naturatherapy/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
  </div>
  <div class="element-bottom">
    <img src="{{ url_assets('/naturatherapy/images/flower-element-2-right.svg') }}" class="element-img element-img-lg">
  </div>
  <div class="container" data-content="partial">

    <div class="text-center">
      <h2 class="h1 mb-4 mb-lg-5">
        Porosi e suksesshme!</h2>
      <p class="mb-4 mb-lg-5">
        Porosia juaj është përfunduar me sukses! Për më tepër, ju do të kontaktoheni nga ekipi i Natura Therapies.</p>
      <a href="/" class="btn btn-secondary">Mbrapa</a>
    </div>

  </div>
</section>
<hr class="my-0">
@endsection