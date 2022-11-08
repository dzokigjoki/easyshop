<ul data-products-list="" class="products columns-4" data-columns="4">
    @foreach($products as $product)
    @include('clients.herline.partials.product')
    @endforeach
</ul>
<br>
@if($count > 0)
<div class="row">
    <div class="col-lg-12">
        <nav class="shop-pagination">
            <div class="paginate pull-left">
                <div class="paginate_links">
                    <a @if($productFilters->page == 1)style="visibility: hidden;"@endif
                        class="page-numbers"
                        href="javascript://"
                        data-page="{{$productFilters->page - 1}}"><i class="fa fa-angle-left"></i></a>
                    @foreach(range(1, $totalPages) as $page)
                    @if($productFilters->page == $page)
                    <a class="page-numbers current" href="javascript://">{{$page}}</a>
                    @elseif($page == 1)
                    <a class="page-numbers" href="javascript://" data-page="1">1...</a>
                    @elseif($productFilters->page >= ($page-3) && $productFilters->page <= ($page+3)) <a
                        class="page-numbers" href="javascript://" data-page="{{$page}}">{{$page}}</a>
                        @elseif($page == $totalPages)
                        <a class="page-numbers" href="javascript://" data-page="{{$totalPages}}">...{{$totalPages}}</a>
                        @endif
                        @endforeach
                        <a @if($productFilters->page == $totalPages)style="visibility:
                            hidden"@endif class="next page-numbers" href="javascript://"
                            data-page="{{$productFilters->page + 1}}">
                            <i class="fa fa-angle-right"></i>
                        </a>
                </div>
            </div>
        </nav>
    </div>
</div>
@endif