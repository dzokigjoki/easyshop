<style>
    .mt-35 {
        margin-top: 35px !important;
    }
</style>
<div class="row products-row mb-4">
    @foreach($products as $product)
    <div class="col-md-4">
        @include('clients.naturatherapyshop_alb.partials.product')
    </div>
    @endforeach
</div>
@if($count > 0)
<div class="mt-35 text-right row navigation pagination">
    <div class="col-lg-12 page-numbers">
        @if((int)$productFilters->page != 1)
        <a style="padding: 5px !important;" data-page="{{$productFilters->page - 1}}" class="page-numbers current">
            <i class="fa fa-chevron-left"></i>
        </a>
        @endif
        @foreach(range(1, $totalPages) as $page) @if($productFilters->page == $page)
        <a style="padding: 5px !important;" class="page-numbers current">
            {{$page}}
        </a>
        @else
        <a style="padding: 5px !important;" data-page="{{$page}}" class="page-numbers">
            {{$page}}
        </a>
        @endif
        @endforeach
        @if((int)$productFilters->page != (int)$totalPages)
        <a style="padding: 5px !important;" data-page="{{$productFilters->page + 1}}" class="page-numbers"
            style="visibility: hidden !important"><i class="fa fa-chevron-right"></i></a>
        @endif
    </div>
</div>
@endif