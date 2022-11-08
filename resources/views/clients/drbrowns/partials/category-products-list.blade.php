@if(count($productsChunk) == 0)
    <section class="theme_box"><br>
        <div class="alert alert-warning">
            Нема артикли во оваа категорија
        </div>
    </section>
{{--@endif--}}
    @else
    <div class="row">
@foreach ($products as $item)
     <div style="min-height:448px;" class="item col-md-4 col-xs-6 first fadeInUp">
            <article>
                <figure>
                    <a href="{{route('product', [$item->id, $item->url])}}">
                        <img style="min-height:300px; min-width:300px;"
                             src="{{\ImagesHelper::getProductImage($item, NULL, 'lg_')}}" class="img-responsive"
                             alt="{{$item->title}}">
                    </a>
                    <figcaption>
                        @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                            <span class="product-price price"
                                  style="font-weight: bold;">
                                                <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($item, true, 0)}}
                                                    <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span>
                                            </span>

                            <span style="text-decoration: line-through; color: red; font-weight: bold; font-size: 16px; ">
                                                    <span style="color: #1481BD; font-weight: bold">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                                        <span class="amount">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>    </span></span>


                        @else


                            <span class="product-price price"
                                  style="font-weight: bold;"> <span
                                        id="current_price">{{number_format($item->$myPriceGroup, 0, ',', '.')}}
                                    <span class="amount">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></span></span>

                        @endif
                    </figcaption>
                </figure>
                <br>
                <button value="{{$item->id}}" data-add-to-cart="" id="add_to_cart"
                        class="button add_to_cart_button product_type_simple">Додади во Кошничка
                </button>
                <h4 class="title">
                    <a href="{{route('product', [$item->id, $item->url])}}">{{$item->title}}</a>
                </h4>
            </article>
        </div>
@endforeach
<div class="section-block pagination-3 column width-9 no-padding-top">
    <div class="row">
        @if($count > 0)
            <ul class="pagination">
                <li @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto"@endif><a
                            href="javascript://" data-page="{{$productFilters->page - 1}}"><i
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
    </div>
    @endif