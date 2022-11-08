<div class="table_layout" id="products_container">
    @if(count($productsChunk) == 0)
        <section class="theme_box"><br>
            <div class="alert alert-warning">
                Нема артикли во оваа категорија
            </div>
        </section>
    @endif


    @foreach($productsChunk as $products)

        <div class="table_row">

            @foreach ($products as $item)
                <div class="item item-hover">
                    <div class="item-image-wrapper">
                        <figure class="item-image-container  panel panel-default">
                            <a href="{{route('product', [$item->id, $item->url])}}">
                                <img src="{{\ImagesHelper::getProductImage($item,null,'lg_')}}"

                                     class="item-image">
                                <img src="{{\ImagesHelper::getProductImage($item,null,'lg_')}}"
                                 class="item-image-hover"></a>
                            <!-- End .item-price-container -->
                        </figure>


                    </div><!-- End .item-image-wrapper -->

                    <!-- End .rating-container -->
                    <h3 class="item-name" style="position: absolute">
                        <a href="{{route('product', [$item->id, $item->url])}}" style="height: 80px;"
                           class="limit_text">{{$item -> title}}</a>
                        <div class="product-price" style="text-align: center">
                            @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                                <span class="product-price-new-home" style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($item, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                                <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px;">
                                                    <span style="color: #d9534f; font-weight: bold" class="price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                            </span></span>

                            @else


                                <span class="product-price-new-home" style="font-weight: bold;"> <span
                                            id="current_price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                        <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>
                            @endif
                        </div>
                        <div style="text-align: center">
                            {{--@if($item->total_stock)--}}
                                <div style="text-align: center">
                                    <button id="buy_home" data-add-to-cart class="btn btn-custom-2" type="button"
                                            value="{{$item->id}}" onClick=""><span>Нарачај тука</span></button>
                                </div>
                            {{--@else--}}
                                {{--<button id="buy_home_disabled" class="btn btn-disabled" data-add-to-cart="" disabled>--}}
                                    {{--Нарачај тука--}}
                                {{--</button>--}}
                            {{--@endif--}}
                        </div>
                    </h3>
                    <!-- End .item-action -->
                    <!-- End .item-meta-container -->
                </div>
                <!-- - - - - - - - - - - - - - End of subcategory - - - - - - - - - - - - - - - - -->

        @endforeach
        <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->

        </div><!--/ .table_row -->

    @endforeach
</div>

<br><br><br><br><br><br><br>
<div class="toolbox-pagination clearfix pull-left">
    @if($count > 0)
        <ul class="pagination">
            <li @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto"@endif><a href="javascript://"
                                                                                                   data-page="{{$productFilters->page - 1}}"><i
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


{{--<footer class="bottom_box on_the_sides">--}}

{{--<div class="left_side">--}}

{{--<p>Showing 1 to 3 of 45 (15 Pages)</p>--}}

{{--</div>--}}
{{--@if($count > 0)--}}
{{--<div class="right_side">--}}
{{--<ul class="pags">--}}
{{--<li @if($productFilters->page == 1)style="visibility: hidden"@endif><a href="#" data-page="{{$productFilters->page - 1}}"></a></li>--}}
{{--@endif--}}
{{--@foreach(range(1, $totalPages) as $page)--}}
{{--@if($productFilters->page == $page)--}}
{{--<li class="active"><a href="javascript://">{{$page}}</a></li>--}}
{{--@else--}}
{{--<li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>--}}
{{--@endif--}}
{{--@endforeach--}}
{{--<li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif><a href="javascript://" data-page="{{$productFilters->page + 1}}"></a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--@endif--}}
{{--</footer>--}}
