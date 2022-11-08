<div class="row">

    <aside class="home_videos col-md-3 col-sm-4">

        <!-- - - - - - - - - - - - - - Today's deals - - - - - - - - - - - - - - - - -->

        <section class="section_offset">
            <div class="m-b-20">
                <iframe style="width: 100%;" src="https://www.youtube.com/embed/I01O3HHyuho" frameborder="0" allowfullscreen></iframe>
                <div class="p-t-10"><a href="{{route('manufacturer', [6])}}">LUMINARC</a></div>
            </div>
            <div class="m-b-20">
                <iframe style="width: 100%;" src="https://www.youtube.com/embed/SI54aQdWSXg" frameborder="0" allowfullscreen></iframe>
                <div class="p-t-10"><a href="{{route('manufacturer', [18])}}">GRUNDIG</a></div>
            </div>
            <div class="m-b-20">
                <iframe style="width: 100%;" src="https://www.youtube.com/embed/4fWHosWNdE4" frameborder="0" allowfullscreen></iframe>
                <div class="p-t-10"><a href="{{route('manufacturer', [3])}}">BOHEMIA</a></div>
            </div>
            <div class="m-b-20">
                <iframe style="width: 100%;" src="https://www.youtube.com/embed/0NLeuygdptM" frameborder="0" allowfullscreen></iframe>
                <div class="p-t-10"><a href="{{route('manufacturer', [14])}}">RONA</a></div>
            </div>
            <div class="m-b-20">
                <iframe style="width: 100%;" src="https://www.youtube.com/embed/aeta7YmdxpI" frameborder="0" allowfullscreen></iframe>
                <div class="p-t-10"><a href="{{route('manufacturer', [26])}}">NACHTMANN</a></div>
            </div>
        </section><!--/ .section_offset.animated.transparent-->

        <!-- - - - - - - - - - - - - - End of today's deals - - - - - - - - - - - - - - - - -->


        <!-- - - - - - - - - - - - - - Banner - - - - - - - - - - - - - - - - -->

        {{--<div class="section_offset">--}}

            {{--<a href="#">--}}

                {{--<img src="/assets/tehnopolis/images/banner_img_10.png" alt="">--}}

            {{--</a>--}}

        {{--</div>--}}

        <!-- - - - - - - - - - - - - - End of banner - - - - - - - - - - - - - - - - -->

    </aside>

    <main class="col-md-9 col-sm-8">

        <!-- - - - - - - - - - - - - - Tabs - - - - - - - - - - - - - - - - -->

        <div class="tabs products section_offset">

            <!-- - - - - - - - - - - - - - Navigation of tabs - - - - - - - - - - - - - - - - -->

            <ul class="tabs_nav clearfix">

                <li><a href="#tab-1">Ново</a></li>
                <li><a href="#tab-2">Најпродавано</a></li>
                <li><a href="#tab-3">Препорачано</a></li>
                <li><a href="#tab-4">Ексклузивно</a></li>

            </ul>

            <!-- - - - - - - - - - - - - - End navigation of tabs - - - - - - - - - - - - - - - - -->

            <!-- - - - - - - - - - - - - - Tabs container - - - - - - - - - - - - - - - - -->

            <div class="tab_containers_wrap">

                <!-- - - - - - - - - - - - - - Featured products - - - - - - - - - - - - - - - - -->

                <div id="tab-1" class="tab_container">

                    <div class="table_layout">

                            @foreach($newestArticles as $newestArticlesChunk)
                                <div class="table_row">
                                @foreach($newestArticlesChunk as $product)
                                        <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
                                        <div class="table_cell">
                                            <div class="product_item">
                                                <!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->
                                                <div class="image_wrap">
                                                    <a href="{{route('product', [$product->id, $product->url])}}"><img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}"></a>
                                                    <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="actions_wrap">--}}
                                                        {{--<div class="centered_buttons">--}}
                                                            {{--<a href="#" class="button_red middle_btn add_to_cart" value="{{$product->id}}" data-add-to-cart="">Во Кошничка</a>--}}
                                                        {{--</div><!--/ .centered_buttons -->--}}
                                                    {{--</div><!--/ .actions_wrap-->--}}
                                                    <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->
                                                    <!-- - - - - - - - - - - - - - Label - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="label_new">Ново</div>--}}
                                                    <!-- - - - - - - - - - - - - - End label - - - - - - - - - - - - - - - - -->
                                                </div><!--/. image_wrap-->
                                                <!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->
                                                <!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->
                                                <div class="description">
                                                    <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                                    <div class="clearfix product_info">
                                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                            <p class="product_price alignleft"><s>{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></s></p>
                                                            <p class="product_price alignleft" style="margin-left: 10px;"><b>{{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0), 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></b></p>
                                                        @else
                                                            <p class="product_price alignleft"><b>{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></b></p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- - - - - - - - - - - - - - End of product title & price - - - - - - - - - - - - - - - - -->
                                            </div><!--/ .product_item-->
                                        </div>
                                        <!-- - - - - - - - - - - - - - End of product - - - - - - - - - - - - - - - - -->
                                @endforeach
                                </div>
                          @endforeach

                    </div>

                </div>

                <!-- - - - - - - - - - - - - - End of featured products - - - - - - - - - - - - - - - - -->

                <!-- - - - - - - - - - - - - - New products - - - - - - - - - - - - - - - - -->

                <div id="tab-2" class="tab_container">

                    <div class="table_layout">

                            @foreach($bestSellersArticles as $bestSellersArticlesChunk)
                                <div class="table_row">
                                @foreach($bestSellersArticlesChunk as $product)
                                        <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
                                        <div class="table_cell">
                                            <div class="product_item">
                                                <!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->
                                                <div class="image_wrap">
                                                    <a href="{{route('product', [$product->id, $product->url])}}"><img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}"></a>
                                                    <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="actions_wrap">--}}
                                                        {{--<div class="centered_buttons">--}}
                                                            {{--<a href="#" class="button_blue middle_btn add_to_cart" value="{{$product->id}}" data-add-to-cart="">Во Кошничка</a>--}}
                                                        {{--</div><!--/ .centered_buttons -->--}}
                                                    {{--</div><!--/ .actions_wrap-->--}}
                                                    <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->
                                                    <!-- - - - - - - - - - - - - - Label - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="label_new">Ново</div>--}}
                                                    <!-- - - - - - - - - - - - - - End label - - - - - - - - - - - - - - - - -->
                                                </div><!--/. image_wrap-->
                                                <!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->
                                                <!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->
                                                <div class="description">
                                                    <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                                    <div class="clearfix product_info">
                                                        <p class="product_price alignleft">
                                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                <s>{{$product->$myPriceGroup}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                                                                <b>{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</b>
                                                                @else
                                                                <b>{{$product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</b>
                                                                @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- - - - - - - - - - - - - - End of product title & price - - - - - - - - - - - - - - - - -->
                                            </div><!--/ .product_item-->
                                        </div>
                                        <!-- - - - - - - - - - - - - - End of product - - - - - - - - - - - - - - - - -->
                                @endforeach
                                </div>
                          @endforeach

                    </div>

                </div>

                <!-- - - - - - - - - - - - - - End of new products - - - - - - - - - - - - - - - - -->

                <!-- - - - - - - - - - - - - - Hot products - - - - - - - - - - - - - - - - -->

                <div id="tab-3" class="tab_container">

                    <div class="table_layout">

                            @foreach($recommendedArticles as $recommendedArticlesChunk)
                                <div class="table_row">
                                @foreach($recommendedArticlesChunk as $product)
                                        <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
                                        <div class="table_cell">
                                            <div class="product_item">
                                                <!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->
                                                <div class="image_wrap">
                                                    <a href="{{route('product', [$product->id, $product->url])}}"><img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}"></a>
                                                    <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="actions_wrap">--}}
                                                        {{--<div class="centered_buttons">--}}
                                                            {{--<a href="#" class="button_blue middle_btn add_to_cart" value="{{$product->id}}" data-add-to-cart="">Во Кошничка</a>--}}
                                                        {{--</div><!--/ .centered_buttons -->--}}
                                                    {{--</div><!--/ .actions_wrap-->--}}
                                                    <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->
                                                    <!-- - - - - - - - - - - - - - Label - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="label_new">Ново</div>--}}
                                                    <!-- - - - - - - - - - - - - - End label - - - - - - - - - - - - - - - - -->
                                                </div><!--/. image_wrap-->
                                                <!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->
                                                <!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->
                                                <div class="description">
                                                    <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                                    <div class="clearfix product_info">
                                                        <p class="product_price alignleft">
                                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                <s>{{$product->$myPriceGroup}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                                                                <b>{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</b>
                                                                @else
                                                                <b>{{$product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</b>
                                                                @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- - - - - - - - - - - - - - End of product title & price - - - - - - - - - - - - - - - - -->
                                            </div><!--/ .product_item-->
                                        </div>
                                        <!-- - - - - - - - - - - - - - End of product - - - - - - - - - - - - - - - - -->
                                @endforeach
                                </div>
                          @endforeach

                    </div>

                </div>

                <!-- - - - - - - - - - - - - - End of hot products - - - - - - - - - - - - - - - - -->

                <!-- - - - - - - - - - - - - - Top rated products - - - - - - - - - - - - - - - - -->

                <div id="tab-4" class="tab_container">

                    <div class="table_layout">

                            @foreach($exclusiveArticles as $exclusiveArticlesChunk)
                                <div class="table_row">
                                    @foreach($exclusiveArticlesChunk as $product)
                                        <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
                                        <div class="table_cell">
                                            <div class="product_item">
                                                <!-- - - - - - - - - - - - - - Thumbmnail - - - - - - - - - - - - - - - - -->
                                                <div class="image_wrap">
                                                    <a href="{{route('product', [$product->id, $product->url])}}"><img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}"></a>
                                                    <!-- - - - - - - - - - - - - - Product actions - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="actions_wrap">--}}
                                                        {{--<div class="centered_buttons">--}}
                                                            {{--<a href="#" class="button_blue middle_btn add_to_cart" value="{{$product->id}}" data-add-to-cart="">Во Кошничка</a>--}}
                                                        {{--</div><!--/ .centered_buttons -->--}}
                                                    {{--</div><!--/ .actions_wrap-->--}}
                                                    <!-- - - - - - - - - - - - - - End of product actions - - - - - - - - - - - - - - - - -->
                                                    <!-- - - - - - - - - - - - - - Label - - - - - - - - - - - - - - - - -->
                                                    {{--<div class="label_new">Ново</div>--}}
                                                    <!-- - - - - - - - - - - - - - End label - - - - - - - - - - - - - - - - -->
                                                </div><!--/. image_wrap-->
                                                <!-- - - - - - - - - - - - - - End thumbmnail - - - - - - - - - - - - - - - - -->
                                                <!-- - - - - - - - - - - - - - Product title & price - - - - - - - - - - - - - - - - -->
                                                <div class="description">
                                                    <a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a>
                                                    <div class="clearfix product_info">
                                                        <p class="product_price alignleft">
                                                            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                                                <s>{{$product->$myPriceGroup}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</s>
                                                                <b>{{EasyShop\Models\Product::getPriceRetail1($product, false, 0)}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</b>
                                                                @else
                                                                <b>{{$product->price}} {{\EasyShop\Models\AdminSettings::getField('currency')}}</b>
                                                                @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- - - - - - - - - - - - - - End of product title & price - - - - - - - - - - - - - - - - -->
                                            </div><!--/ .product_item-->
                                        </div>
                                        <!-- - - - - - - - - - - - - - End of product - - - - - - - - - - - - - - - - -->
                                    @endforeach
                                </div>
                          @endforeach

                    </div>


                </div>

                <!-- - - - - - - - - - - - - - End of top rated products - - - - - - - - - - - - - - - - -->

            </div>

            <!-- - - - - - - - - - - - - - End of tabs container - - - - - - - - - - - - - - - - -->

        </div>

        <!-- - - - - - - - - - - - - - End of tabs - - - - - - - - - - - - - - - - -->

    </main>

</div><!--/ .row-->