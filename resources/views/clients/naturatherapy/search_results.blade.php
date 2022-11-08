@extends('clients.naturatherapy.layouts.default')

@section('content')

<section class="banner-section">
  <div class="banner banner-md bg-image" style="background-image: url('{{ url_assets('/naturatherapy/images/banners/top-banner.jpg') }}');">
    <div class="banner-content text-white text-center py-5">
      <div class="container">
        <h2 class="h1">Rezultatet e kërkimit - "{{$search}}"</h2>
      </div>
    </div>
  </div>
</section>

<section class="section product-section elements py-5 py-xl-100">
  <div class="element-top">
    <img src="{{ asset('assets/images/flower-element-1-left.svg') }}" class="element-img element-img-lg">
  </div>
  <div class="element-bottom">
    <img src="{{ asset('assets/images/flower-element-2-right.svg') }}" class="element-img element-img-lg element-img-rotate-1">
  </div>
  <div class="container">
    <div class="row">


      @if(isset($products) && count($products) > 0)

      @foreach($products as $product)
      @include('clients.naturatherapy.partials.product')
      @endforeach
      @else
      <h4 class="h3 font-weight-bold mb-4">
        Nuk ka asnjë produkt që përmban <span class="text-green">„{{ $query }}“</span>
        në emrin e vet.</h4>

      <p class="mb-4">
        Por produktet e tjera mund t'i shikoni në produktin tjetër.</p>
      <a href="{{ route('products') }}" class="btn btn-secondary btn-arrow">
        Të gjitha produktet</a>
      @endif
    </div>
  </div>
</section>
<hr class="my-0">
@endsection