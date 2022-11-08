
    <div class="row product-list">
        @foreach($products as $product)
            <!-- PRODUCT ITEM START -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="product-item">
                    <a class="pi-img-wrapper" href="{{route('product', [$product->id, $product->url])}}" >
                        <img src="{{\ImagesHelper::getProductImage($product)}}" class="img-responsive" alt="{{$product->title}}">
                        <div>
                            <span class="btn btn-default">Преглед</span>
                        </div>
                    </a>
                    <h3><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></h3>
                    <div class="pi-price">
                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                            <span>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0))}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                            <s style="margin-left: 10px;color: #999;">{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                        @else
                            <span>{{number_format($product->$myPriceGroup)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                        @endif
                    </div>
                    @if($product->is_exclusive)
                    @endif
                    <span class="add-to-cart-btn" data-add-to-cart="" value="{{$product->id}}">
                        Додади во кошничка <i class="fa fa-shopping-cart"></i>
                    </span>
                </div>
            </div>

            <!-- PRODUCT ITEM END -->
        @endforeach
    </div>

            <!-- END PRODUCT LIST -->
    <!-- BEGIN PAGINATOR -->
    @if ($count > 0)
    <div class="row">
        {{--<div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>--}}
        <div class="col-xs-12">
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
