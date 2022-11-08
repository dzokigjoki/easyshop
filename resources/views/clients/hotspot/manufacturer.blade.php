@extends('clients.hotspot.layouts.default')
@section('style')
<link href="{{url_assets('/hotspot/css/listing.css')}}" rel="stylesheet">
@stop
@section('content')
<main>
    <div id="stick_here"></div>
    <div class="toolbox elemento_stick">
      <div class="container">
        <span>&nbsp;</span>
        <h4>{{ $manufacturer->name }}</h4>
      </div>
    </div>
    <!-- /toolbox -->
    
    <div class="container margin_30">
    
    <div class="row">
      <!-- /col -->
      <div class="col-lg-12">
        @include('clients.hotspot.partials.list-products')
      </div>
    </div>
    <!-- /row -->			


    <div class="pagination__wrapper no_border add_bottom_30">
        <ul class="pagination">
            <li>{{$products->links()}}</li>
        </ul>
    </div>

      
    </div>
  <!-- /container -->
</main>
<!-- /main -->
@stop
