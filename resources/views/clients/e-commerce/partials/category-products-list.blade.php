
<style>
    .featureCol{
        width:33% !important;
    }
</style>
<div class="col-12 p-0 overflow-hidden d-flex flex-wrap">
    @foreach ($products as $product)
    <div class="featureCol px-3 mb-6">
        <div class="">
            <div class="imgHolder position-relative w-100 overflow-hidden" style="width: 100%;">
                @include('clients.e-commerce.partials.product-for-categories')
                <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
                   {{-- <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li> --}}
									<li class="mr-2 overflow-hidden addToCart" style=""><a href="javascript:void(0);" class="icon-cart d-block" style="font-size: 20px; font-weight:bold;"><span class="buyText">Buy</span></a></li>
									{{-- <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
									<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li> --}}
                </ul>
            </div>
            
        </div>
    </div>
    @endforeach
</div>

{{-- <div class="row">
    <div class="col-sm-12">
        @if($count > 0)
        <!-- Pagination -->
        <div class="pagination-wrap">
            <nav class="pagination right">
                <ul class="pagination right">
                    <li @if($productFilters->page == 1)style="visibility: hidden;"@endif><a href="javascript://" data-page="{{$productFilters->page - 1}}"><i class="fa fa-chevron-left"></i></a></li>
                    @foreach(range(1, $totalPages) as $page)
                    @if($productFilters->page == $page)
                    <li class="active"><a href="javascript://">{{$page}}</a></li>
                    @elseif($page == 1)
                    <li><a href="javascript://" data-page="1">1...</a></li>
                    @elseif($productFilters->page >= ($page-3) && $productFilters->page <= ($page+3)) <li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>
                        @elseif($page == $totalPages)
                        <li><a href="javascript://" data-page="{{$totalPages}}">...{{$totalPages}}</a></li>
                        @endif
                        @endforeach
                        <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif>
                            <a href="javascript://" data-page="{{$productFilters->page + 1}}">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </li>
                </ul>
            </nav>

        </div>
        @endif
    </div>
</div> --}}