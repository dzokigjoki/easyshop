<style>
    .text-height {
        line-height: 1.5em;
        height: 3em;       /* height is 2x line-height, so two lines will display */
        overflow: hidden;
    }
</style>

@if(count($productsChunk) == 0)
    <section class="theme_box"><br>
        <div class="alert alert-warning">
            Нема продукти во одбраната категорија.
        </div>
    </section>
@endif
<div class="category-item-container">
    <div class="row">
@foreach ($products as $item)
    <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="item">
            <div class="item-image-wrapper">
                <figure class="item-image-container">
                    <a href="{{route('product', [$item->id, $item->url])}}">
                        {{--<img src="/assets/topmarketmk/images/products/item5.jpg" alt="item1" class="">--}}
                        <img src="{{\ImagesHelper::getProductImage($item, NULL, 'lg_')}}" class=""
                        alt="{{$item->title}}">
                    </a>
                </figure>
                <div class="item-price-container">

                    @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                        <span class="old-price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}<span class="sub-price"></span>мкд.</span>
                        <span class="item-price">{{EasyShop\Models\Product::getPriceRetail1($item, true, 0)}}<span class="sub-price">мкд.</span></span>
                    @else
                        <span class="item-price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}<span class="sub-price">мкд.</span></span>
                    @endif
                </div><!-- End .item-price-container -->
                @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                    {{--<div class="discount-rect">--}}
                        {{--{{(int)(((EasyShop\Models\Product::getPriceRetail1($item, false, 0)/$item->$myPriceGroup)*100)}}%--}}
                    {{--</div>--}}
                @endif
            </div><!-- End .item-image-wrapper -->
            <div class="item-meta-container">
                <h3 class="text-height item-name"><a href="{{route('product', [$item->id, $item->url])}}">{{$item->title}}</a></h3>
                <div class="item-action">
                    <a href="" value="{{$item->id}}" data-add-to-cart="" class="item-add-btn" id="add_to_cart">
                        <span class="icon-cart-text">Купи</span>
                    </a>
                </div><!-- End .item-action -->
            </div><!-- End .item-meta-container -->
        </div><!-- End .item -->
    </div><!-- End .col-md-4 -->
@endforeach
    </div>
</div>
<div class="pagination-container clearfix">
    <div class="row pull-right">
        @if($count > 0)
            <ul class="pagination">
                <li @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto"@endif><a href="javascript://" data-page="{{$productFilters->page - 1}}"><i
                                class="fa fa-arrow-left"></i></a></li>
                {{--<li @if($productFilters->page == 1)style="visibility: hidden"@endif class="active"><a href="#" data-page="{{$productFilters->page - 1}}"></a></li>--}}
                @foreach(range(1, $totalPages) as $page)
                    @if($productFilters->page == $page)
                        <li class="active"><a href="javascript://">{{$page}}</a></li>
                    @else
                        <li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>
                    @endif
                @endforeach
                <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif><a href="javascript://"
                                                                                                 data-page="{{$productFilters->page + 1}}"><i
                                class="fa fa-arrow-right"></i> </a></li>

            </ul>
            <!-- End .view-count-box -->
        @endif
    </div>
</div>