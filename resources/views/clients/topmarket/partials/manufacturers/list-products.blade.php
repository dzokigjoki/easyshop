<div class="table_layout" id="products_container">
    @if(count($products) == 0)
        <section class="theme_box">
            <p>Нема артикли за овој производител</p>
        </section>
    @else
        <?php $i = 0; ?>
        @foreach($products as $product)

            @if($i == 0)
            <div class="table_row">
            @endif

                    <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->

                    <div class="table_cell">

                        <div class="product_item">

                            <!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->


                            <div class="image_wrap">

                                <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}">

                                <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->

                                <div class="actions_wrap">

                                    <div class="centered_buttons">

                                        <a href="#" class="button_red middle_btn add_to_cart"  value="{{$product->id}}" data-add-to-cart="">Во кошничка</a>

                                    </div><!--/ .centered_buttons -->

                                    {{--<a href="#" class="button_dark_grey def_icon_btn middle_btn add_to_wishlist tooltip_container"><span class="tooltip right">Add to Wishlist</span></a>--}}

                                </div><!--/ .actions_wrap-->

                                <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->

                            </div><!--/. image_wrap-->

                            <!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->

                            <!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->

                            <div class="description">

                                <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>

                                <div class="clearfix product_info">

                                    <div class="clearfix product_info">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <p class="product_price alignleft"><s>{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></s></p>
                                            <p class="product_price alignleft" style="margin-left: 10px;"><b>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0), 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></b></p>
                                        @else
                                            <p class="product_price alignleft"><b>{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></b></p>
                                        @endif
                                    </div>
                                                <!-- - - - - - - - - - - - - - Product rating - - - - - - - - - - - - - - - - -->



                                        <!-- - - - - - - - - - - - - - End of product rating - - - - - - - - - - - - - - - - -->

                                </div>

                            </div>

                            <!-- - - - - - - - - - - - - - End of product title & price - - - - - - - - - - - - - - - - -->

                            <!-- - - - - - - - - - - - - - Full description (only for list view) - - - - - - - - - - - - - - - - -->

                            <div class="full_description">

                                <a href="#" class="product_title">{{$product->title}}</a>


                                <p>{{$product->short_description}}</p>

                                <div style="padding-top: 20px;">

                                    <a href="{{route('product', [$product->id, $product->url])}}" class="button_blue middle_btn add_to_cart">Види продукт</a>
                                    <a href="#" class="button_red middle_btn add_to_cart"  value="{{$product->id}}" data-add-to-cart="">Додади во кошничка</a>

                                </div>
                            </div>

                            <!-- - - - - - - - - - - - - - End of full description (only for list view) - - - - - - - - - - - - - - - - -->


                        </div><!--/ .product_item-->

                    </div>

                    <!-- - - - - - - - - - - - - - End of product - - - - - - - - - - - - - - - - -->
            <?php $i++; ?>
            @if($i == 5)
            </div><!--/ .table_row -->
            <?php $i = 0; ?>
            @endif
        @endforeach
    @endif
</div>