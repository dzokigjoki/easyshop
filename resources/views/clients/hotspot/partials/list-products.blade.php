<div class="row small-gutters">
  @if(count($products))
  @foreach($products as $product)
  <div class="col-6 col-md-2 col-sm-3">
    @include('clients.hotspot.partials.product', ['product' => $product])
  </div>
  @endforeach
  @else
  @if(isset($search) && $search === true)
  <div style="width: 100%;" class="text-center">
     <img src="{{url_assets('/hotspot/img/products/no-search.jpg')}}" style="width:100%;align-self:flex-start;" /> 
  </div>
  @else
   <img src="{{url_assets('/hotspot/img/products/no-products.jpg')}}" style="width:100%;align-self:flex-start;" /> 
  @endif
  @endif
</div>
<!-- /row -->