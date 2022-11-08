<div class="row small-gutters">
  @if(count($products))
  @foreach($products as $product)
  <div class="col-6 col-md-3 col-xl-3">
    @include('clients.hotspot.partials.product', ['product' => $product])
  </div>
  @endforeach
  @else
  <img src="{{url_assets('/hotspot/img/products/no-products.jpg')}}" style="width:100%;align-self:flex-start;" />
  @endif
</div>
<!-- /row -->

@if($count > 0)

<div class="pagination__wrapper">
  <ul class="pagination">
    <li @if($productFilters->page == 1)style="visibility: hidden;"@endif><a href="javascript://"
        data-page="{{$productFilters->page - 1}}" class="prev">&#10094;</i></a></li>
    @foreach(range(1, $totalPages) as $page)
    @if($productFilters->page == $page)
    <li class="active"><a href="javascript://" class="active">{{$page}}</a></li>
    @elseif($page == 1)
    <li><a href="javascript://" data-page="1">1...</a></li>
    @elseif($productFilters->page >= ($page-3) && $productFilters->page <= ($page+3)) <li><a href="javascript://"
        data-page="{{$page}}">{{$page}}</a></li>
      @elseif($page == $totalPages)
      <li><a href="javascript://" data-page="{{$totalPages}}">...{{$totalPages}}</a></li>
      @endif
      @endforeach
      <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif>
        <a href="javascript://" data-page="{{$productFilters->page + 1}}">&#10095;</a>
      </li>
  </ul>
</div>
@endif