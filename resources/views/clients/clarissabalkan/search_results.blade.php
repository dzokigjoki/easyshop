@extends('clients.clarissabalkan.layouts.default')
@section('styles')
<link href="{{url_assets('/clarissabalkan/css/listing.css')}}" rel="stylesheet">
@stop
@section('content')
<main>
  <div id="stick_here"></div>
  <div class="toolbox elemento_stick">
    <div class="container text-center">
      <h4 class="relative">Пребарување по "{{ $search }}"</h4>
    </div>
  </div>
  <div class="container margin_30">
    <div class="row">
      <div class="col-lg-12">
        @include('clients.clarissabalkan.partials.list-products', ['search' => true])
      </div>
    </div>
    @if(count($products))
    <div class="pagination__wrapper no_border add_bottom_30">
      <ul class="pagination">
        <li>
          {{$products->appends(['search' => $search, 'results_limit' => $results_limit, 'sort_by' => $order_by])->links()}}
        </li>
      </ul>
    </div>
    @endif
  </div>
</main>
@stop