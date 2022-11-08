<div class="shop-product-wrap grid gridview-3 row">
    @foreach($products as $product)
    <div class="col-4">
        <?php
        $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
        $discountPercentage = (($product->price - $discount) / $product->price) * 100;
        ?>
        <div class="product-item">
            <div class="single-product">
                <div class="product-img">
                    <a href="/p/{{$product->id}}/{{$product->url}}">
                        <img src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" alt=""></a>
                    @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                    <?php
                    $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
                    $discountPercentage = (($product->price - $discount) / $product->price) * 100;
                    ?>
                    <span class="sticker-2">-{{ (int)$discountPercentage }}%</span>
                    @endif
                    <div class="add-actions hover-right_side">
                        <ul>
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                            <li class="quick-view-btn" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{$discount}} МКД" data-oldprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                            </li>
                            @else
                            <li class="quick-view-btn" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                            </li>
                            @endif
                            <li><a href="#" value="{{$product->id}}" data-add-to-cart="" data-toggle="tooltip" data-placement="left" title="Add To cart"><i class="icon-bag"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="product-desc_info">
                        <p class="zabeleski">
                            @if(!is_null($product->package))
                            {{$product->package}}
                            @if(($product->package)==1)
                            парче
                            @else
                            парчиња
                            @endif
                            во пакет!
                            @endif
                        </p>
                        <h3 class="product-name"><a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a></h3>
                        <div class="price-box">
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                            <span class="old-price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                            <span class="new-price">{{$discount}} МКД</span>
                            @else
                            <span class="new-price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-product_item">
            <div class="single-product">
                <div class="product-img">
                    <a href="/p/{{$product->id}}/{{$product->url}}">
                        <img @if($product->image)
                        src="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}"
                        @else
                        src="https://axiomoptics.com/wp-content/uploads/2019/08/placeholder-images-image_large.png"
                        style="border: 1px solid #dddddd"
                        @endif
                        alt="">
                    </a>
                </div>
                <div class="quicky-product-content">
                    <div class="product-desc_info">
                        <h6 class="product-name"><a href="single-product.html">{{$product->title}}</a>
                        </h6>
                        <div class="price-box">
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                            <span class="old-price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                            <span class="new-price">{{$discount}} МКД</span>
                            @else
                            <span class="new-price">{{number_format($product->price, 0, ',', '.')}} МКД</span>
                            @endif
                        </div>
                        <div class="product-short_desc">
                            {!!$product->description!!}
                        </div>
                    </div>
                    <div class="add-actions">
                        <ul>
                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                            <li class="quick-view-btn" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{$discount}} МКД" data-oldprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                            </li>
                            @else
                            <li class="quick-view-btn" data-toggle="modal" data-product="{{json_encode($product)}}" data-newprice="{{number_format($product->price, 0, ',', '.')}} МКД" data-image="{{\ImagesHelper::getProductImage($product, NULL, 'md_')}}" data-title="{{$product->title}}" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="icon-magnifier"></i></a>
                            </li>
                            @endif
                            <li><a href="#" value="{{$product->id}}" data-add-to-cart=""><i class="icon-bag"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if($count > 0)
<div class="row">
    <div class="col-lg-12">
        <div class="quicky-paginatoin-area">
            <ul class="quicky-pagination-box">
                <li @if($productFilters->page == 1)style="visibility: hidden;"@endif><a href="javascript://" data-page="{{$productFilters->page - 1}}"><i class="fa fa-angle-left"></i></a></li>
                @foreach(range(1, $totalPages) as $page)
                @if($productFilters->page == $page)
                <li class="active"><a href="javascript://">{{$page}}</a></li>
                @elseif($page == 1)
                <li><a href="javascript://" data-page="1">1...</a></li>
                @elseif($productFilters->page >= ($page-3) && $productFilters->page <= ($page+3)) <li><a href="javascript://" data-page="{{$page}}">{{$page}}</a></li>
                    @elseif($page == $totalPages)
                    <li><a href="javascript://" data-page="{{$totalPages}}">...{{$totalPages}}</a></li>
                    @endif
                    @endforeach
                    <li @if($productFilters->page == $totalPages)style="visibility: hidden"@endif>
                        <a href="javascript://" data-page="{{$productFilters->page + 1}}">
                            <i class="ion-chevron-right"></i>
                        </a>
                    </li>
            </ul>
        </div>
    </div>
</div>
@endif
<div class="modal fade modal-wrapper" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area sp-area row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="sp-img_area">
                            <img id="image_modal" src="" alt="Quicky's Product Image">

                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="sp-content">
                            <div class="sp-essential_stuff">
                                <h4 class="pb-30" id="title_modal"></h4>
                                <div class="price-box pb-60">
                                    <span class="old-price" id="old_price_modal"></span>
                                    <span class="new-price" id="new_price_modal"></span>

                                </div>
                                <h5>Опис:</h5>
                                <div id="description_modal"></div>
                            </div>
                            <div class="quicky-group_btn">
                                <ul>
                                    <li><a href="#" id="modal_button" data-add-to-cart="" class="add-to_cart">Додади во кошничка</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quicky's Modal Area End Here -->
<!-- Scroll To Top Start -->