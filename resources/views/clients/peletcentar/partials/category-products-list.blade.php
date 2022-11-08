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
                <li style="min-height: 430px;" class="item col-md-3 col-sm-12 wide-next">
                    {{--<div class="panel panel-default">--}}
                        <div style="padding: 15px 0; border: none !important;" class="item-inner ipadWidth">
                            <div class="item-img">
                                <div class="item-img-info">
                                    <div class="pimg" style="margin: 0 auto; width: 185px; text-align: center;">
                                        <a href="" class="product-image">
                                            <img src="{{\ImagesHelper::getProductImage($item,null,'lg_')}}"
                                                 class="attachment-shop_catalog" alt="Images">
                                        </a>
                                    </div> <!-- /.pimg -->

                                    <div class="box-hover">
                                        {{--<ul class="add-to-links">--}}
                                            {{--<li>--}}
                                                {{--<a href="{{route('product', [$item->id, $item->url])}}"--}}
                                                   {{--data-toggle="modal" data-target=""--}}
                                                   {{--class="buy_home quick-view">--}}
                                                                            {{--<span>--}}
                                                                            {{--<i class="fa fa-eye"></i>  Прегледај--}}
                                                                            {{--</span>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    </div>
                                </div> <!-- /.item-img-info -->
                            </div> <!-- /.item-img -->
                            <div class="item-info">
                                <div class="info-inner">
                                    {{-- <button value="{{$item->id}}"  onclick='location.href="{{route('product', [$item->id, $item->url])}}"' id="add_to_cart"style="background-color: #D4362A" class="buy_home"><i class="fa fa-shopping-cart"></i> <span>Нарачај</span></button> --}}

                                    
                                    <a value="{{$item->id}}"
                                        href="{{ route('product',[$item->id,$item->url])}}"
                                                    {{-- id="add_to_cart" --}}
                                                     style="background-color: #D4362A; padding: 10px"
                                                    class="buy_home">
                                                    {{-- <i class="fa fa-shopping-cart"></i> --}}
                                                <span>Повеќе</span></a>

                                    <div class="flat-our-products item-title">
                                        <a href="{{route('product', [$item->id, $item->url])}}"
                                           style="color:black !important;"
                                           class="limit_text">{{$item -> title}}</a>
                                        <div class="product-price" style="text-align: center">
                                            @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                                                <span class="product-price-new-home"
                                                      style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($item, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                                <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                                            @else


                                                <span class="product-price-new-home"
                                                      style="font-weight: bold;"> <span
                                                            id="current_price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                                            @endif
                                        </div>
                                    </div> <!-- /.item-title -->

                                </div> <!-- /.info-inner -->
                            </div> <!-- /.item-info -->
                        </div> <!-- /.item-inner -->
                    {{--</div>--}}
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


