@foreach($products as $product)
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
  @include('clients.luxbox.partials.single-product')
</div>
@endforeach
@if($count > 0)
<div class="row navigation pagination">
  <div class="col-lg-12 page-numbers">
    <a @if($productFilters->page == 1)
      style="visibility: hidden; margin: 0 auto"
      @endif
      data-page="{{$productFilters->page - 1}}" class="page-numbers current">
      <span>
        <i class="zmdi zmdi-chevron-left"></i>
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
      ><i class="zmdi zmdi-chevron-right"></i></a>
  </div>
</div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.product-image').mouseenter(function() {
      $(this).children('.wp-post-image').children('.product_photo').hide();
      $(this).children('.wp-post-image').children('.product_photo_gallery').show();
    })
    $('.product-image').mouseleave(function() {

      $(this).children('.wp-post-image').children('.product_photo_gallery').hide();
      $(this).children('.wp-post-image').children('.product_photo').show();

    })
  });
</script>