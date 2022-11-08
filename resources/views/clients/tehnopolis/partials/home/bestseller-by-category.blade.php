<section class="section_offset">

    <h3 class="offset_title">Најпродавано</h3>

    <div class="tabs type_3 products">


        <!-- - - - - - - - - - - - - - Navigation of tabs - - - - - - - - - - - - - - - - -->

        <ul class="theme_menu tabs_nav clearfix">

            @foreach($bestSellersByCategoryArticles as $title => $value)
                <li class="has_submenu"><a href="#tab-dnevna-promocija-{{md5($title)}}">{{$title}}</a></li>
            @endforeach

        </ul>

        <!-- - - - - - - - - - - - - - End navigation of tabs - - - - - - - - - - - - - - - - -->

        <!-- - - - - - - - - - - - - - Tabs container - - - - - - - - - - - - - - - - -->

        <div class="tab_containers_wrap">

            @foreach($bestSellersByCategoryArticles as $title => $categoryArticles)

                <div id="tab-dnevna-promocija-{{md5($title)}}" class="tab_container">

                    <!-- - - - - - - - - - - - - - Carousel of today's deals - - - - - - - - - - - - - - - - -->

                    <div class="owl_carousel carousel_in_tabs type_3">

                        @foreach($categoryArticles as $product)
                            <!-- - - - - - - - - - - - - - Product - - - - - - - - - - - - - - - - -->
                            <div class="product_item">
                                <!-- - - - - - - - - - - - - - Thumbnail - - - - - - - - - - - - - - - - -->
                                <div class="image_wrap">
                                    <a href="{{route('product', [$product->id, $product->url])}}"><img src="{{\ImagesHelper::getProductImage($product)}}" alt="{{$product->title}}"></a>
                                </div><!--/. image_wrap-->
                                <!-- - - - - - - - - - - - - - End thumbnail - - - - - - - - - - - - - - - - -->
                                <!-- - - - - - - - - - - - - - Label - - - - - - - - - - - - - - - - -->
                                {{--<div class="label_new">Ново</div>--}}
                                <!-- - - - - - - - - - - - - - End label - - - - - - - - - - - - - - - - -->
                                <!-- - - - - - - - - - - - - - Product description - - - - - - - - - - - - - - - - -->
                                <div class="description align_center">
                                    <p><a href="{{route('product', [$product->id, $product->url])}}">{{$product->title}}</a></p>
                                    <div class="clearfix product_info">
                                        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
                                            <p class="product_price alignleft">
                                                <s>{{number_format($product->$myPriceGroup, 0, ',', '.')}}
                                                    <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}
                                                    </span>
                                                </s>
                                            rig
                                            <p class="product_price alignleft" style="margin-left: 10px;">
                                                <b>
                                                    {{number_format(EasyShop\Models\Product::getPriceRetail1($product, false, 0), 0, ',', '.')}}
                                                    <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span>
                                                </b>
                                            </p>
                                        @else
                                            <p class="product_price alignleft"><b>{{number_format($product->$myPriceGroup, 0, ',', '.')}} <span class="product_price_cur">{{\EasyShop\Models\AdminSettings::getField('currency')}}</span></b></p>
                                        @endif
                                    </div><!--/ .clearfix.product_info-->
                                </div>
                                <!-- - - - - - - - - - - - - - End of product description - - - - - - - - - - - - - - - - -->
                            </div><!--/ .product_item-->
                            <!-- - - - - - - - - - - - - - End product - - - - - - - - - - - - - - - - -->
                        @endforeach


                    </div><!--/ .owl_carousel-->

                    <!-- - - - - - - - - - - - - - End of carousel of today's deals - - - - - - - - - - - - - - - - -->

                </div><!--/ #tab-dnevna-promocija-1-->

            @endforeach

        </div>

        <!-- - - - - - - - - - - - - - End of tabs containers - - - - - - - - - - - - - - - - -->

    </div>

</section>
