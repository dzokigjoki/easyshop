{{--Listanje na produkti od dadena kategorija--}}

<div class="product-listing row">
    @if($products)
        {{--Produkt--}}
        {{--@foreach($productsChunk as $products)--}}
            @foreach($products as $product)
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-one-fifth">
                    <div class="product">
                        <div class="product_inside">
                            <div class="image-box">
                                <a href="{{route('product', [$product->id, $product->url])}}">
                                    <img src="{{\ImagesHelper::getProductImage($product, NULL, 'lg_')}}" alt="">
                                    @if(EasyShop\Models\Product::checkDiscount($product->id))
                                        <div class="label-sale">Заштеда <?php $percent = ((int)$product->$myPriceGroup - (int)EasyShop\Models\Product::getPriceRetail1($product, false, 0)) / (int)$product->$myPriceGroup * 100?>
                                            {{(int)$percent}}%
                                        </div>
                                    @endif
                                </a>
                                <a href="{{route('product', [$product->id, $product->url])}}"
                                   data-toggle="modal" data-target="" class="quick-view">
											<span>
											<span class="icon icon-visibility"></span>Прегледај
											</span>
                                </a>
                                @if($product->is_exclusive)
                                    <div class="countdown_box">
                                        <div class="countdown_inner">
                                            {{--Treba da se zeme datum od baza--}}

                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <?php $counter = (int)substr(json_decode($product->discount)->end,0,4);  ?>
                                            
                                            @if( $counter >= 2099)
                                                <div class="countdown"
                                                     data-date="{{\Carbon\Carbon::now()->addWeek(1)}}"></div>
                                            @else
                                                <div class="countdown"
                                                     data-date="{{$counter}}"></div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                @endif

                            </div>


                            <h2 class="title">

                                <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                            </h2>
                            <div class="price view">
                                @if(EasyShop\Models\Product::checkDiscount($product->id))
                                    {{--namalena cena--}}
                                    {{EasyShop\Models\Product::getPriceRetail1($product, true, 0)}}
                                    <span class="price_currency"> ден.</span>
                                    {{--stara cena--}}
                                    <span class="old-price">{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                        ден.</span>

                                @else
                                    {{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                    <span
                                            class="price_currency"> ден.</span>

                                @endif
                            </div>
                            <div class="product_inside_hover">
                                <button class="btn btn-product_addtocart" style="white-space: initial"
                                        data-add-to-cart="" value="{{$product->id}}" onClick="">
                                    <span class="icon icon-shopping_basket"></span>
                                    Додади во кошничка
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        {{--@endforeach--}}


    @else
        <div class="on-duty-box">
            <img src="/assets/kliknikupi/images/empty-search-icon.png" alt="">
            <h1 class="block-title large">Не постојат такви артикли!</h1>
            <div class="description">
                {{--Ви благодариме.--}}
            </div>
            {{--<a class="btn btn-border color-default" href="{{route('home')}}">ПОЧЕТНА</a>--}}


            @endif
        </div>
        <div class="content">
            <hr>
        </div>
        <div class="content offset-40">
            @if($count > 0)
                <div class="pagination">
                    <ul>
                        <li @if($productFilters->page == 1)style="visibility: hidden; margin: 0 auto"@endif><a
                                    href="javascript://" data-page="{{$productFilters->page - 1}}"><i
                                        class="fa fa-arrow-left"></i> </a></li>
                        @foreach(range(1, $totalPages) as $page)
                            @if($productFilters->page == $page)
                                <li class="active"><a href="javascript://">{{$page}}</a></li>
                            @else
                                <li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>
                            @endif
                        @endforeach
                        <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif>
                            <a href="javascript://" data-page="{{$productFilters->page + 1}}"><i
                                        class="fa fa-arrow-right"></i> </a></li>
                    </ul>
                    @endif
                </div>
        </div>


</div>