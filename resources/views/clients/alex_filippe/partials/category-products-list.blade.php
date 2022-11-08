
@foreach($productsChunk as $product)
            <!-- PRODUCT ITEM START -->
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="product-item">
                    <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                        <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                        <div>
                            <span class="btn btn-default">Преглед</span>
                        </div>
                    </a>
                    <h3 class="text-center"><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                    <div class="pi-price text-center">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                            <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0) / \Session::get('selectedCurrencyDivider'), 0, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                            <s style="margin-left: 10px;color: dimgray;">{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</s>
                        @else
                            <span>{{number_format($product->$myPriceGroup / \Session::get('selectedCurrencyDivider'), 2, ',', '.')}} {{\Session::get('selectedCurrency')}}</span>
                        @endif
                        <br>
                        <button style="margin-top: 10px;" value="{{$product->id}}" id="add_to_cart" type="submit" data-add-to-cart="" class="btn btn-primary">Додади во кошничка</button>    
                    </div>
                    @if($product->is_exclusive)
                    @endif
                </div>
            </div>

            <!-- PRODUCT ITEM END -->
    @endforeach

            <!-- END PRODUCT LIST -->
    <!-- BEGIN PAGINATOR -->
    @if ($count > 0)
    <div class="row">
        {{--<div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>--}}
        <div class="col-xs-12">
            <br><br>
            <ul class="pagination pull-right">
                @if($productFilters->page == 1)
                    <li><a href="javascript:;" data-page="{{$productFilters->page - 1}}">&laquo;</a></li>
                @endif
                @foreach(range(1, $totalPages) as $page)
                    @if($productFilters->page == $page)
                        <li><span>{{$page}}</span></li>
                    @else
                        <li><a href="javascript:;" data-page="{{$page}}">{{$page}}</a></li>
                    @endif
                @endforeach
                @if($productFilters->page == $totalPages)
                    <li><a href="javascript:;"  data-page="{{$productFilters->page - 1}}">&raquo;</a></li>
                @endif
            </ul>
        </div>
    </div>
    @endif
    <!-- END PAGINATOR -->
