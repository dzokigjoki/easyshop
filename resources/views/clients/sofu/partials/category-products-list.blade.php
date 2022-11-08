<div class="shop-product-wrap grid gridview-3 row">

  @foreach($products as $product)

  @if(is_null($product->parent_product))
  @include('clients.sofu.partials.product')
  @endif

  @endforeach
</div>

@if($count > 0)
<div class="row navigation pagination">
  <div class="col-lg-12">
    <a @if($productFilters->page == 1)
      style="visibility: hidden; margin: 0 auto"
      @endif
      data-page="{{$productFilters->page - 1}}" class="page-numbers current">
      <span>
        <i class="fas fa-chevron-left"></i>
      </span> </a> @foreach(range(1, $totalPages) as $page) @if($productFilters->page == $page)
    <a class="page-numbers current">
      <span>
        {{$page}}
      </span></a>
    @else
    <a data-page="{{$page}}" class="page-numbers">
      <span>
        {{$page}}
      </span></a>
    @endif
    @endforeach
    <a data-page="{{$productFilters->page + 1}}" class="page-numbers" @if($productFilters->page == $totalPages)
      style="visibility: hidden"
      @endif
      ><i class="fas fa-chevron-right"></i></a>
  </div>
</div>
@endif