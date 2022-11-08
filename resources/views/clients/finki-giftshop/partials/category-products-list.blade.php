    <main class="post-wrap" id="products_container">
    @if(count($productsChunk) == 0)
        <section class="theme_box"><br>
            <div class="alert alert-warning">
                Нема артикли во оваа категорија
            </div>
        </section>
    @endif
        <ul class="clearfix products-grid products-grid-search flat-reset">
            @foreach ($products as $item)
            <li class="item col-md-3 wide-first">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info">
                            <div class="pimg">
                                <a href="{{route('product',[$item->id,$item->url])}}" class="product-image">
                                    <img src="{{\ImagesHelper::getProductImage($item)}}"
                                         class="attachment-shop_catalog" alt="Images">
                                </a>
                            </div> <!-- /.pimg -->

                        </div> <!-- /.item-img-info -->
                    </div> <!-- /.item-img -->

                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title">
                                <a href="{{route('product',[$item->id,$item->url])}}">{{$item->title}}</a>
                            </div> <!-- /.item-title -->

                            <div class="item-content">
                                <div class="item-price">
                                    <div class="price-box">
                                        <ins><span class="amount">{{$item->price}} ден.</span></ins>
                                    </div>
                                </div> <!-- /.item-price -->

                            </div> <!-- /.item-content -->
                        </div> <!-- /.info-inner -->
                    </div> <!-- /.item-info -->
                </div> <!-- /.item-inner -->
            </li>
            @endforeach
    </ul>
</main> <!-- /.post-wrap -->

<div class="toolbox-pagination clearfix">
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


