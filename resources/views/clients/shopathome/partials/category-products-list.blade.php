@if(count($products) == 0)
    <section class="theme_box"><br>
        <div class="alert alert-warning">
            Нема артикли во оваа категорија
        </div>
    </section>
    {{--@endif--}}
@else
    {{--@foreach($products as $product)--}}
    <div class="shop-grid">
        @foreach($products as $product)
        <div class="heightLaptop col-md-4 grid-item mb30">
            <div class="arrival-overlay">
                {{--<img src="/assets/shopathome/upload/arrival2.jpg" alt="">--}}
                <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" class="img-responsive"
                     alt="{{$product->title}}">
                {{--<img src="/assets/shopathome/upload/sale.png" alt="" class="sale">--}}
                <div style="background:#EA5748" class="sale">
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <div style="background:#EE5233" class="discountCustom btn btn-danger"> <span>
                                                      - {{(int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}
                                ден.<br></span>
                        </div>
                    @endif
                </div>
                <div class="arrival-mask">
                    <a href="{{route('product',[$product->id,$product->url])}}" class="medium-button button-red add-cart">Прегледај</a>
                </div>
            </div>
            <div class="arr-content">
                <button  value="{{$product->id}}"
                         data-add-to-cart="" id="add_to_cart"
                         class="medium-button button-red centeredButton">Додади во кошничка</button>

                <a href="#"><p>{{$product->title}}</p></a>
                <ul>
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                        <span class="product-price-new-home"
                              style="font-weight: bold;">
                            <span id="current_price">{{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            </span>
                        </span>
                        <span style="text-decoration: line-through; color: #000000; font-weight: bold; font-size: 16px; ">
                            <span style="color: #EE5233; font-weight: bold" class="price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            </span>
                        </span>
                        @else
                        <span class="product-price-new-home" style="font-weight: bold;">
                            <span id="current_price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                <span class="price_currency">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            </span>
                        </span>
                    @endif
                </ul>
            </div>
        </div>
        @endforeach
    </div>
@endif

        <div class="shop-pag">
            <div class="pagination-cont">
            <div class="right-pag">
                <div class="pagenation clearfix">
                    @if($count > 0)
                        <ul>
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
                            <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif>
                                <a href="javascript://"
                                    data-page="{{$productFilters->page + 1}}">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End .view-count-box -->
                    @endif
                </div>
                <div class="clear"></div>
            </div>
            </div>
            <div class="clear"></div>
        </div>