<div class="row items-grid">
    @foreach($products as $product)
    <div class="col-md-3 col-xs-6 product product-grid">
        @include('clients.david_kompjuteri.partials.product-for-categories')
    </div>
    @endforeach
</div>

<div class="row">
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
</div>