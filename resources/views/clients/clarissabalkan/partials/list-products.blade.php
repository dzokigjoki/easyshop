<div class="row small-gutters">
    @if(count($products))
      @foreach($products as $product)
      <div class="col-6 col-md-2 col-sm-3">
        @include('clients.clarissabalkan.partials.product', ['product' => $product])
      </div>
      @endforeach
    @else
      @if(isset($search) && $search === true)
      <img src="{{url_assets('/clarissabalkan/img/banners/no-search.jpg')}}" style="width:100%;align-self:flex-start;" />
      @else
      <img src="{{url_assets('/clarissabalkan/img/banners/no-products.png')}}" style="width:100%;align-self:flex-start;" />
      @endif
    @endif
  </div>
  <!-- /row -->