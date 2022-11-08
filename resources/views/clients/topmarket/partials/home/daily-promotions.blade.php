@if(count($dailyPromotionsArticles))
<section class="section_offset">

    <div class="row">
        <div class="col-sm-4">
            <h3 class="offset_title"><a href="{{route('category', [129, 'blog'])}}">Блог >></a></h3>

            <div class="table_layout">
                <div class="table_row">
                    @if(isset($lastBlog))
                        <div class="table_cell">

                            <div class="product_item">

                                <h4><a href="{{route('blog', [$lastBlog->id, $lastBlog->url])}}">{{$lastBlog->title}}</a></h4>
                                <div class="image_wrap">

                                    <img src="{{\ImagesHelper::getBlogImage($lastBlog)}}" alt="{{$lastBlog->title}}">

                                    <div class="actions_wrap">

                                        <div class="centered_buttons">

                                            <a href="{{route('blog', [$lastBlog->id, $lastBlog->url])}}" class="button_green middle_btn add_to_cart">Повеќе</a>

                                        </div>

                                    </div>
                                </div>

                                <div class="description">
                                    <p>{{$lastBlog->short_description}} <a href="{{route('blog', [$lastBlog->id, $lastBlog->url])}}">Повеќе >></a></p>
                                </div>

                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <h3 class="offset_title">Дневна промоција</h3>
            <div class="table_layout">
            <div class="table_row">
                <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
                @foreach($dailyPromotionsArticles as $product)
                <div class="table_cell">
                    <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->

                    <div class="product_item">

                        <!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->

                        <div class="image_wrap">

                            <img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}">

                            <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->

                            <div class="actions_wrap">

                                <div class="centered_buttons">

                                    <a href="#" class="button_red middle_btn add_to_cart" value="{{$product->id}}" data-add-to-cart="">Во кошнишка</a>

                                </div><!--/ .centered_buttons -->

                                {{--<a href="#" class="button_dark_grey middle_btn def_icon_btn add_to_wishlist tooltip_container"><span class="tooltip right">Add to Wishlist</span></a>--}}


                            </div><!--/ .actions_wrap-->

                            <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->

                        </div><!--/. image_wrap-->

                        <!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->

                        <!-- - - - - - - - - - - - - - Label - - - - - - - - - - - - - - - - -->

                        {{--<div class="label_new">New</div>--}}

                        <!-- - - - - - - - - - - - - - End label - - - - - - - - - - - - - - - - -->

                        <!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->

                        <div class="description">

                            <a href="{{route('product', [$product->id, $product->url])}}">{{$product->short_description}}</a>

                            <div class="clearfix product_info">

                                @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                    <p class="product_price alignleft"><b>{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</b></p>
                                    <p class="product_price alignleft"><s>{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</s></p>
                                @else
                                    <p class="product_price alignleft"><b>{{$product->$myPriceGroup}}  {{\EasyShop\Models\AdminSettings::getField('currency')}}</b></p>
                                @endif
                            </div>

                        </div>

                        <!-- - - - - - - - - - - - - - End of product title & price - - - - - - - - - - - - - - - - -->

                    </div><!--/ .product_item-->

                    <!-- - - - - - - - - - - - - - End product - - - - - - - - - - - - - - - - -->
                    </div>
                    @endforeach
                </div>
            </div><!--/ .owl_carousel -->
        </div>
    </div>



</section><!--/ .section_offset -->
@endif

