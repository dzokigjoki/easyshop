<div class="col-md-9 paginate" style="padding-bottom: 150px;">

    @if(count($productsChunk)==0)
        <div class="alert alert-danger">
            Нема продукти во оваа категорија
        </div>
        @endif
    <div class="items">
        @foreach($productsChunk as $articleRow)
            <div class="row" data-gutter="15">
                @foreach($articleRow as $item)
                    <div class="col-md-4">
                        <div class="product ">
                            <ul class="product-labels"></ul>
                            <div style="border: 1px solid #eee;" class="product-img-wrap">
                                {{--<img class="product-img" src="{{\ImagesHelper::getProductImage($item)}}" alt="{{$item->title}}" />--}}
                                <img class="product-img" src="{{\ImagesHelper::getProductImage($item)}}" />
                            </div>

                            <a class="product-link" href="{{route('product', [$item->id, $item->url])}}"></a>
                            <div class="product-caption">

                                <h5 class="product-caption-title">{{$item->title}}</h5>
                                @if( EasyShop\Models\Product::hasDiscount( $item->discount ) )
                                    {{--prvicna cena--}}
                                    <span class="product-caption-price">
                                                <span class="product-caption-price-new">
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}}
                                                    ден.
                                                    </span>
                                            </span>

                                    <span class="product-caption-price">
                                           <span class="product-caption-price-old">
                                               <span class="old-price-gray">
                                                   {{number_format($item->$myPriceGroup)}} ден.
                                               </span>
                                           </span>
                                       </span>
                                    {{--popust--}}
                                @else
                                    <span class="product-caption-price">
                                            <span class="product-caption-price-new">
                                                {{number_format($item->$myPriceGroup)}} ден.</span>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <a value="{{$item->id}}" style="width: 100%" data-add-to-cart="" id="add_to_cart" class="btn btn-lg btn-primary" href="#">
                            <i class="fa fa-shopping-cart"></i>Додади во кошничка
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    @if ($count > 0)
    <div class="row">
        <div class="col-xs-12">
            <nav>
                <ul class="pagination category-pagination pull-right">
                    @if($productFilters->page > 1)
                        <li class="first"><a href="javascript:;" data-page="1"><i class="fa fa-long-arrow-left"></i></a></li>
                    @endif

                    @foreach(range(1, $totalPages) as $page)
                        @if($productFilters->page == $page)
                            <li class="active"><a href="javascript://">{{$page}}</a></li>
                        @else
                            <li><a href="javascript:;" data-page="{{$page}}">{{$page}}</a></li>
                        @endif
                    @endforeach


                    @if($productFilters->page < $totalPages)
                        <li class="last"><a href="javascript:;"  data-page="{{$totalPages}}"><i class="fa fa-long-arrow-right"></i></a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    @endif
</div>